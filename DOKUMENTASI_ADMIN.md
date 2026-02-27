# Dokumentasi Fitur Admin

## Deskripsi
Fitur admin memungkinkan administrator untuk mengelola layanan dan pesanan pengguna melalui panel admin yang terproteksi.

## Fitur yang Tersedia

### 1. Autentikasi Admin
- **Login Admin**: Admin dapat login menggunakan email dan password
- **Logout Admin**: Admin dapat logout dari sistem
- **Session Management**: Menggunakan Laravel session untuk autentikasi
- **API Authentication**: Mendukung Sanctum token untuk API

### 2. Manajemen Layanan (CRUD)
Admin dapat melakukan operasi berikut pada layanan:
- **Tambah Layanan**: Menambahkan layanan baru dengan detail lengkap
- **Edit Layanan**: Mengubah informasi layanan yang sudah ada
- **Hapus Layanan**: Menghapus layanan dari sistem
- **Lihat Daftar Layanan**: Melihat semua layanan yang tersedia

### 3. Manajemen Pesanan
Admin dapat melakukan operasi berikut pada pesanan:
- **Lihat Daftar Pesanan**: Melihat semua pesanan dengan detail user dan layanan
- **Lihat Detail Pesanan**: Melihat informasi lengkap pesanan tertentu
- **Update Status Pesanan**: Mengubah status pesanan (draft, pending, processing, completed, cancelled, selesai)
- **Tambah Catatan Admin**: Menambahkan catatan khusus untuk pesanan
- **Hapus Pesanan**: Menghapus pesanan dari sistem

### 4. Dashboard Admin
- Statistik total pesanan
- Statistik pesanan berdasarkan status
- Total revenue dari pesanan selesai
- Daftar pesanan terbaru
- Statistik bulanan

## Routes

### Web Routes (Session-based)

#### Autentikasi
```php
GET  /admin/login          - Menampilkan halaman login admin
POST /admin/login          - Proses login admin
POST /admin/logout         - Logout admin
```

#### Dashboard
```php
GET  /admin                - Dashboard admin (statistik dan overview)
```

#### Manajemen Layanan
```php
GET    /admin/layanan              - Daftar semua layanan
GET    /admin/layanan/tambah       - Form tambah layanan
POST   /admin/layanan              - Simpan layanan baru
GET    /admin/layanan/{id}/edit    - Form edit layanan
PUT    /admin/layanan/{id}         - Update layanan
DELETE /admin/layanan/{id}         - Hapus layanan
```

#### Manajemen Pesanan
```php
GET    /admin/order                - Daftar semua pesanan
GET    /admin/order/{id}           - Detail pesanan
GET    /admin/order/{id}/edit      - Form edit pesanan
PUT    /admin/order/{id}           - Update pesanan
PUT    /admin/order/{id}/status    - Update status pesanan
DELETE /admin/order/{id}           - Hapus pesanan
```

### API Routes (Token-based)

```php
POST /api/admin/register   - Register admin baru (API)
POST /api/admin/login      - Login admin (API)
POST /api/admin/logout     - Logout admin (API)
GET  /api/admin/me         - Get data admin yang sedang login
```

## Controllers

### 1. AdminLoginController
**Path**: `app/Http/Controllers/Auth/AdminLoginController.php`

**Methods**:
- `showLoginForm()`: Menampilkan halaman login
- `login(Request $request)`: Proses login dengan rate limiting
- `logout(Request $request)`: Logout dan hapus session

### 2. AdminLayananController
**Path**: `app/Http/Controllers/Admin/AdminLayananController.php`

**Methods**:
- `index()`: Menampilkan daftar layanan
- `create()`: Menampilkan form tambah layanan
- `store(Request $request)`: Menyimpan layanan baru
- `edit($id)`: Menampilkan form edit layanan
- `update(Request $request, $id)`: Update layanan
- `destroy($id)`: Hapus layanan

### 3. AdminOrderController
**Path**: `app/Http/Controllers/Admin/AdminOrderController.php`

**Methods**:
- `index()`: Menampilkan daftar pesanan
- `show($id)`: Menampilkan detail pesanan
- `edit($id)`: Menampilkan form edit pesanan
- `update(Request $request, $id)`: Update pesanan
- `updateStatus(Request $request, $id)`: Update status pesanan
- `destroy($id)`: Hapus pesanan
- `dashboard()`: Menampilkan dashboard dengan statistik

### 4. AdminAuthController (API)
**Path**: `app/Http/Controllers/Auth/AdminAuthController.php`

**Methods**:
- `register(Request $request)`: Register admin baru via API
- `login(Request $request)`: Login admin via API
- `me(Request $request)`: Get data admin yang login
- `logout(Request $request)`: Logout dan hapus token

## Models

### Admin Model
**Path**: `app/Models/Admin.php`

**Table**: `admins`

**Fillable Fields**:
- `nama_admin`: Nama admin
- `email`: Email admin (unique)
- `password`: Password (hashed)
- `remember_token`: Token untuk remember me

**Traits**:
- `HasFactory`: Factory support
- `Notifiable`: Notification support
- `HasApiTokens`: Sanctum API token support

## Middleware

### AdminMiddleware
**Path**: `app/Http/Middleware/AdminMiddleware.php`

**Fungsi**: Memproteksi route admin, hanya admin yang sudah login yang bisa akses

**Behavior**:
- Jika request API (expectsJson): Return JSON error 403
- Jika request web: Redirect ke halaman login admin

## Views

### Login Admin
**Path**: `resources/views/auth/login-admin.blade.php`

Form login dengan:
- Email field
- Password field
- Remember me checkbox
- Error messages display
- Success messages display

### Dashboard Admin
**Path**: `resources/views/admin/dashboard.blade.php`

Menampilkan:
- Statistik pesanan
- Total revenue
- Pesanan terbaru
- Grafik statistik bulanan

### Manajemen Layanan
**Paths**:
- `resources/views/admin/layanan.blade.php` - Daftar layanan
- `resources/views/admin/tambah-layanan.blade.php` - Form tambah
- `resources/views/admin/edit-layanan.blade.php` - Form edit

### Manajemen Pesanan
**Paths**:
- `resources/views/admin/order.blade.php` - Daftar pesanan
- `resources/views/admin/update-order.blade.php` - Form update

## Configuration

### Auth Configuration
**Path**: `config/auth.php`

**Guard Admin**:
```php
'guards' => [
    'admin' => [
        'driver' => 'session',
        'provider' => 'admins',
    ],
],
```

**Provider Admin**:
```php
'providers' => [
    'admins' => [
        'driver' => 'eloquent',
        'model' => App\Models\Admin::class,
    ],
],
```

### Middleware Registration
**Path**: `bootstrap/app.php`

```php
$middleware->alias([
    'auth.admin' => \App\Http\Middleware\AdminMiddleware::class,
]);
```

## Cara Penggunaan

### 1. Membuat Admin Pertama
Gunakan tinker atau seeder untuk membuat admin pertama:

```php
php artisan tinker

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

Admin::create([
    'nama_admin' => 'Admin Utama',
    'email' => 'admin@senku.com',
    'password' => Hash::make('password123'),
]);
```

### 2. Login Admin
1. Akses: `http://localhost/admin/login`
2. Masukkan email dan password
3. Klik tombol Login
4. Akan redirect ke dashboard admin

### 3. Mengelola Layanan
1. Dari dashboard, klik menu "Layanan"
2. Untuk tambah: Klik "Tambah Layanan"
3. Untuk edit: Klik tombol edit pada layanan
4. Untuk hapus: Klik tombol hapus pada layanan

### 4. Mengelola Pesanan
1. Dari dashboard, klik menu "Pesanan"
2. Lihat daftar semua pesanan
3. Klik pesanan untuk melihat detail
4. Update status pesanan sesuai kebutuhan
5. Tambahkan catatan admin jika diperlukan

### 5. Logout
Klik tombol Logout di menu admin

## Validasi

### Login Admin
- Email: required, valid email format
- Password: required

### Tambah/Edit Layanan
- `nama_layanan`: required, string, max 255 karakter
- `deskripsi_layanan`: required, string
- `harga_layanan`: required, numeric, minimal 0
- `gambar_layanan`: optional, image (jpeg,png,jpg,gif,svg), max 2MB
- `kategori`: optional, string, max 100 karakter

### Update Status Pesanan
- `status`: required, harus salah satu dari: draft, pending, processing, completed, cancelled, selesai
- `catatan_admin`: optional, string

## Security Features

1. **Rate Limiting**: Login dibatasi 5 percobaan per 60 detik
2. **Password Hashing**: Password di-hash menggunakan bcrypt
3. **CSRF Protection**: Semua form dilindungi CSRF token
4. **Session Management**: Session di-regenerate setelah login
5. **Middleware Protection**: Semua route admin dilindungi middleware
6. **Guard Separation**: Admin dan User menggunakan guard terpisah

## Status Pesanan

- `draft`: Draft (belum selesai dibuat)
- `pending`: Menunggu Pembayaran
- `processing`: Sedang Diproses
- `completed`: Selesai
- `cancelled`: Dibatalkan
- `selesai`: Selesai & Dinilai

## Troubleshooting

### Admin tidak bisa login
- Pastikan email dan password benar
- Cek apakah admin sudah terdaftar di database
- Cek konfigurasi guard di `config/auth.php`

### Route admin tidak bisa diakses
- Pastikan middleware sudah terdaftar di `bootstrap/app.php`
- Clear cache: `php artisan config:clear`
- Clear route cache: `php artisan route:clear`

### Upload gambar gagal
- Pastikan folder `storage/app/public/layanan` ada
- Jalankan: `php artisan storage:link`
- Cek permission folder storage

## Testing

### Test Login Admin
```bash
# Via browser
http://localhost/admin/login

# Via API
POST http://localhost/api/admin/login
Content-Type: application/json

{
    "email": "admin@senku.com",
    "password": "password123"
}
```

### Test CRUD Layanan
```bash
# Lihat daftar layanan
GET http://localhost/admin/layanan

# Tambah layanan
POST http://localhost/admin/layanan
```

### Test Update Status Pesanan
```bash
# Update status
PUT http://localhost/admin/order/{id}/status
Content-Type: application/json

{
    "status": "processing",
    "catatan_admin": "Sedang dikerjakan"
}
```

## Catatan Penting

1. **Backup Database**: Selalu backup database sebelum melakukan operasi hapus
2. **Validasi Input**: Semua input sudah divalidasi di controller
3. **File Upload**: Gambar layanan disimpan di `storage/app/public/layanan`
4. **Session Timeout**: Session admin akan expire sesuai konfigurasi Laravel
5. **API Token**: Token API tidak expire secara otomatis, hapus manual saat logout

## Update Selanjutnya

Fitur yang bisa ditambahkan:
- [ ] Forgot password untuk admin
- [ ] Multi-role admin (super admin, admin biasa)
- [ ] Log aktivitas admin
- [ ] Export data pesanan ke Excel/PDF
- [ ] Notifikasi real-time untuk pesanan baru
- [ ] Bulk actions untuk pesanan
- [ ] Filter dan search yang lebih advanced
