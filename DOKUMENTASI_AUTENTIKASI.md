# Dokumentasi Fitur Autentikasi - Senku E-Commerce

## Ringkasan

Dokumentasi ini menjelaskan secara rinci fitur autentikasi yang telah dibuat untuk website e-commerce Senku menggunakan framework Laravel. Sistem autentikasi mendukung 3 tipe pengguna: **Mahasiswa**, **Siswa**, dan **Umum**.

---

## 📋 Daftar Isi

1. [Fitur yang Telah Dibuat](#fitur-yang-telah-dibuat)
2. [Struktur Database](#struktur-database)
3. [File-File yang Dibuat/Dimodifikasi](#file-file-yang-dibuatdimodifikasi)
4. [Cara Kerja Setiap Fitur](#cara-kerja-setiap-fitur)
5. [Cara Menggunakan](#cara-menggunakan)
6. [Testing](#testing)

---

## ✅ Fitur yang Telah Dibuat

### 1. **Fitur Registrasi (Pendaftaran)**
- ✅ Form registrasi terpisah untuk 3 tipe user (Mahasiswa, Siswa, Umum)
- ✅ Validasi input sesuai tipe user
- ✅ Password hashing otomatis
- ✅ Auto-login setelah registrasi berhasil
- ✅ Redirect ke dashboard sesuai tipe user

### 2. **Fitur Login**
- ✅ Form login dengan validasi tipe user
- ✅ Rate limiting untuk mencegah brute force (maksimal 5 percobaan)
- ✅ Session management
- ✅ Remember me functionality
- ✅ Redirect ke dashboard sesuai tipe user setelah login

### 3. **Fitur Lupa Password (Password Reset)**
- ✅ Form request reset password
- ✅ Pengiriman email dengan link reset password
- ✅ Token reset password dengan expiry time (60 menit)
- ✅ Form reset password dengan validasi
- ✅ Update password baru dengan hashing

---

## 🗄️ Struktur Database

### Tabel: `users`

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | BIGINT | Primary key |
| user_type | ENUM | 'mahasiswa', 'siswa', 'umum' |
| name | VARCHAR(255) | Nama lengkap user |
| nim | VARCHAR(20) | NIM (khusus mahasiswa) - nullable, unique |
| nisn | VARCHAR(20) | NISN (khusus siswa) - nullable, unique |
| email | VARCHAR(255) | Email user - unique |
| password | VARCHAR(255) | Password (hashed) |
| jenis_kelamin | ENUM | 'L' atau 'P' |
| no_hp | VARCHAR(15) | Nomor HP |
| alamat | TEXT | Alamat lengkap |
| pekerjaan | VARCHAR(100) | Pekerjaan (khusus umum) - nullable |
| email_verified_at | TIMESTAMP | Waktu verifikasi email - nullable |
| remember_token | VARCHAR(100) | Token remember me - nullable |
| created_at | TIMESTAMP | Waktu pembuatan |
| updated_at | TIMESTAMP | Waktu update terakhir |
| deleted_at | TIMESTAMP | Soft delete timestamp - nullable |

### Tabel: `password_reset_tokens`

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| email | VARCHAR(255) | Email user (Primary key) |
| token | VARCHAR(255) | Token reset password |
| created_at | TIMESTAMP | Waktu pembuatan token |

### Tabel: `sessions`

| Kolom | Tipe | Keterangan |
|-------|------|------------|
| id | VARCHAR(255) | Session ID (Primary key) |
| user_id | BIGINT | Foreign key ke users - nullable |
| ip_address | VARCHAR(45) | IP address user |
| user_agent | TEXT | Browser user agent |
| payload | LONGTEXT | Session data |
| last_activity | INTEGER | Timestamp aktivitas terakhir |

---

## 📁 File-File yang Dibuat/Dimodifikasi

### **File Baru yang Dibuat:**

#### 1. **Migrations**
- `database/migrations/2025_01_12_000001_update_users_table_for_auth.php`
  - Menambahkan kolom-kolom yang diperlukan untuk autentikasi
  - Menambahkan soft deletes
  - **Menggunakan pengecekan `Schema::hasColumn()`** untuk mencegah duplikasi kolom
  
- `database/migrations/2025_01_12_000002_create_password_reset_tokens_table.php`
  - Membuat tabel untuk menyimpan token reset password
  - **Menggunakan pengecekan `Schema::hasTable()`** untuk mencegah duplikasi tabel
  
- `database/migrations/2025_01_12_000003_create_sessions_table.php`
  - Membuat tabel untuk session management
  - **Menggunakan pengecekan `Schema::hasTable()`** untuk mencegah duplikasi tabel

#### 2. **Controllers**
- `app/Http/Controllers/Auth/RegisterController.php`
  - **Method `showRegistrationForm($userType)`**: Menampilkan form registrasi sesuai tipe user
  - **Method `register(Request $request)`**: Memproses registrasi user baru
  - **Method `validator(array $data)`**: Validasi data registrasi
  - **Method `create(array $data)`**: Membuat user baru di database
  - **Method `registered(Request $request, $user)`**: Redirect setelah registrasi berhasil

- `app/Http/Controllers/Auth/ResetPasswordController.php`
  - **Method `showResetForm(Request $request, $token)`**: Menampilkan form reset password
  - **Method `reset(Request $request)`**: Memproses reset password

#### 3. **File yang Dimodifikasi:**

- `app/Http/Controllers/Auth/ForgotPasswordController.php`
  - **Method `showLinkRequestForm()`**: Menampilkan form request reset password
  - **Method `sendResetLinkEmail(Request $request)`**: Mengirim email reset password

- `app/Models/User.php`
  - Menambahkan field baru ke `$fillable` array
  - Field: name, nim, nisn, jenis_kelamin, no_hp, alamat, pekerjaan

- `routes/web.php`
  - Menambahkan route registrasi (GET dan POST)
  - Menambahkan route reset password (GET dan POST)

- `bootstrap/app.php`
  - Mendaftarkan middleware alias `check.user.type`

---

## ⚙️ Cara Kerja Setiap Fitur

### **1. Registrasi (Pendaftaran)**

#### Flow Registrasi:
```
User mengakses form → Mengisi data → Submit form → Validasi → 
Simpan ke database → Auto login → Redirect ke dashboard
```

#### Detail Proses:

**a. User mengakses halaman registrasi:**
- URL: `/mahasiswa/signup`, `/siswa/signup`, atau `/umum/signup`
- Route: `RegisterController@showRegistrationForm`
- View: `auth.daftar-mahasiswa`, `auth.daftar-siswa`, atau `auth.daftar-umum`

**b. User mengisi form dan submit:**
- Method: POST
- URL: `/register`
- Route: `RegisterController@register`

**c. Validasi data:**
- Email: wajib, format email, unique
- Password: wajib, minimal 6 karakter, harus ada konfirmasi
- Jenis kelamin: wajib, L atau P
- No HP: wajib
- Alamat: wajib

**Validasi khusus per tipe user:**
- **Mahasiswa**: NIM (wajib, unique)
- **Siswa**: NISN (wajib, unique)
- **Umum**: Pekerjaan (opsional)

**d. Simpan ke database:**
- Password di-hash menggunakan `Hash::make()`
- Email otomatis terverifikasi (`email_verified_at = now()`)
- Generate remember token

**e. Auto login:**
- Menggunakan `Auth::login($user)`
- Session dibuat otomatis

**f. Redirect:**
- Mahasiswa → `/mahasiswa/dashboard`
- Siswa → `/siswa/dashboard`
- Umum → `/umum/dashboard`

---

### **2. Login**

#### Flow Login:
```
User mengakses form → Input email & password → Submit → 
Validasi → Check credentials → Rate limiting → Login → Redirect
```

#### Detail Proses:

**a. User mengakses halaman login:**
- URL: `/login`, `/mahasiswa/login`, `/siswa/login`, atau `/umum/login`
- Route: `LoginController@showLoginForm`

**b. User submit form login:**
- Method: POST
- URL: `/login`
- Route: `LoginController@login`

**c. Rate Limiting:**
- Maksimal 5 percobaan login gagal
- Setelah 5 kali gagal, user harus menunggu 60 detik
- Key: email + IP address

**d. Validasi credentials:**
- Email harus ada di database
- Password harus cocok (di-compare dengan hash)
- User type harus sesuai
- User tidak boleh soft deleted

**e. Login berhasil:**
- Session di-regenerate untuk keamanan
- Rate limiter di-reset
- Redirect sesuai tipe user

**f. Login gagal:**
- Counter rate limiter bertambah
- Error message ditampilkan
- User tetap di halaman login

---

### **3. Lupa Password (Password Reset)**

#### Flow Lupa Password:
```
Request reset → Input email → Kirim link → Klik link di email → 
Input password baru → Submit → Password ter-update → Redirect login
```

#### Detail Proses:

**a. User request reset password:**
- URL: `/password/reset`
- Route: `ForgotPasswordController@showLinkRequestForm`
- View: `auth.lupa password`

**b. User input email dan submit:**
- Method: POST
- URL: `/password/email`
- Route: `ForgotPasswordController@sendResetLinkEmail`

**c. Validasi email:**
- Email wajib diisi
- Format email harus valid
- Email harus terdaftar di database

**d. Generate dan kirim token:**
- Laravel generate token unik
- Token disimpan di tabel `password_reset_tokens`
- Email dikirim dengan link reset (berisi token)
- Token valid selama 60 menit

**e. User klik link di email:**
- URL: `/password/reset/{token}?email=user@example.com`
- Route: `ResetPasswordController@showResetForm`
- View: `auth.lupa password-new pass`

**f. User input password baru:**
- Method: POST
- URL: `/password/reset`
- Route: `ResetPasswordController@reset`

**g. Validasi password baru:**
- Password wajib diisi
- Minimal 6 karakter
- Harus ada konfirmasi password
- Token harus valid dan belum expired

**h. Update password:**
- Password di-hash dengan `Hash::make()`
- Remember token di-regenerate
- Token reset dihapus dari database
- Event `PasswordReset` di-trigger

**i. Redirect ke login:**
- Success message ditampilkan
- User bisa login dengan password baru

---

## 🚀 Cara Menggunakan

### **Langkah 1: Jalankan Migration**

Jalankan migration untuk membuat/update tabel database:

```bash
php artisan migrate
```

Jika ada error, coba:
```bash
php artisan migrate:fresh
```

⚠️ **Peringatan**: `migrate:fresh` akan menghapus semua data!

### **Langkah 2: Konfigurasi Email (untuk Lupa Password)**

Edit file `.env` untuk konfigurasi email:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com
MAIL_PASSWORD=your-app-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your-email@gmail.com
MAIL_FROM_NAME="${APP_NAME}"
```

**Untuk testing tanpa email:**
Gunakan `log` driver (sudah default):
```env
MAIL_MAILER=log
```
Email akan disimpan di `storage/logs/laravel.log`

### **Langkah 3: Clear Cache**

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

### **Langkah 4: Jalankan Server**

```bash
php artisan serve
```

Server akan berjalan di `http://localhost:8000`

---

## 🧪 Testing

### **Test Registrasi:**

1. **Mahasiswa:**
   - Buka: `http://localhost:8000/mahasiswa/signup`
   - Isi semua field (NIM, Email, Password, dll)
   - Klik tombol Daftar
   - Seharusnya redirect ke `/mahasiswa/dashboard`

2. **Siswa:**
   - Buka: `http://localhost:8000/siswa/signup`
   - Isi semua field (NISN, Email, Password, dll)
   - Klik tombol Daftar
   - Seharusnya redirect ke `/siswa/dashboard`

3. **Umum:**
   - Buka: `http://localhost:8000/umum/signup`
   - Isi semua field (Nama, Email, Password, dll)
   - Klik tombol Daftar
   - Seharusnya redirect ke `/umum/dashboard`

### **Test Login:**

1. Buka: `http://localhost:8000/login`
2. Input email dan password yang sudah didaftarkan
3. Pilih tipe user yang sesuai
4. Klik Login
5. Seharusnya redirect ke dashboard sesuai tipe user

### **Test Lupa Password:**

1. Buka: `http://localhost:8000/password/reset`
2. Input email yang terdaftar
3. Klik Kirim Link Reset
4. Cek email atau file log (`storage/logs/laravel.log`)
5. Copy link reset password
6. Buka link tersebut di browser
7. Input password baru dan konfirmasi
8. Klik Reset Password
9. Seharusnya redirect ke halaman login
10. Login dengan password baru

### **Test Rate Limiting:**

1. Buka halaman login
2. Coba login dengan password salah 5 kali
3. Pada percobaan ke-6, seharusnya muncul pesan error "Terlalu banyak percobaan login"
4. Tunggu 60 detik
5. Coba login lagi

---

## 📝 Catatan Penting

### **Keamanan:**

1. **Password Hashing**: Semua password di-hash menggunakan bcrypt
2. **Rate Limiting**: Mencegah brute force attack pada login
3. **CSRF Protection**: Semua form dilindungi CSRF token
4. **Session Security**: Session di-regenerate setelah login
5. **Soft Delete**: User yang dihapus tidak bisa login

### **Validasi:**

1. Email harus unique (tidak boleh duplikat)
2. NIM harus unique untuk mahasiswa
3. NISN harus unique untuk siswa
4. Password minimal 6 karakter
5. Password harus ada konfirmasi

### **Middleware:**

- `auth`: Memastikan user sudah login
- `check.user.type`: Memastikan user mengakses dashboard sesuai tipe

### **Routes yang Perlu Form:**

Pastikan form HTML memiliki:
- `@csrf` token
- `method="POST"`
- `action` yang sesuai dengan route
- `name` attribute pada input sesuai dengan validasi

**Contoh form registrasi:**
```html
<form method="POST" action="{{ route('register') }}">
    @csrf
    <input type="hidden" name="user_type" value="mahasiswa">
    <input type="text" name="name" required>
    <input type="text" name="nim" required>
    <input type="email" name="email" required>
    <input type="password" name="password" required>
    <input type="password" name="password_confirmation" required>
    <!-- field lainnya -->
    <button type="submit">Daftar</button>
</form>
```

**Contoh form login:**
```html
<form method="POST" action="{{ route('login') }}">
    @csrf
    <input type="hidden" name="user_type" value="mahasiswa">
    <input type="email" name="email" required>
    <input type="password" name="password" required>
    <input type="checkbox" name="remember">
    <button type="submit">Login</button>
</form>
```

**Contoh form lupa password:**
```html
<form method="POST" action="{{ route('password.email') }}">
    @csrf
    <input type="email" name="email" required>
    <button type="submit">Kirim Link Reset</button>
</form>
```

**Contoh form reset password:**
```html
<form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="email" value="{{ $email }}" required>
    <input type="password" name="password" required>
    <input type="password" name="password_confirmation" required>
    <button type="submit">Reset Password</button>
</form>
```

---

## 🎯 Kesimpulan

Sistem autentikasi lengkap telah berhasil dibuat dengan fitur:
- ✅ Registrasi untuk 3 tipe user (Mahasiswa, Siswa, Umum)
- ✅ Login dengan rate limiting dan session management
- ✅ Lupa password dengan email reset link
- ✅ Middleware untuk proteksi route berdasarkan tipe user
- ✅ Validasi lengkap dan keamanan terjamin

Semua fitur sudah siap digunakan dan tinggal disesuaikan dengan tampilan (view) yang sudah ada.

---

**Dibuat pada:** 12 Januari 2025  
**Framework:** Laravel 11.x  
**Database:** MySQL
