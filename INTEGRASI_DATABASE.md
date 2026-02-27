# Dokumentasi Integrasi Database Admin

## Status Integrasi ✅

Semua fitur admin sudah **terintegrasi penuh** dengan database, tabel, dan kolom yang sesuai.

---

## 1. Tabel Layanans

### Struktur Database
```sql
CREATE TABLE layanans (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    nama_layanan VARCHAR(255) NOT NULL,
    kategori VARCHAR(255) NULL,
    deskripsi_layanan TEXT NOT NULL,
    harga_layanan DECIMAL(10,2) NOT NULL,
    gambar_layanan VARCHAR(255) NULL,
    slug VARCHAR(255) NULL UNIQUE,
    is_active BOOLEAN DEFAULT TRUE,
    order INT DEFAULT 0,
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

### Model: `App\Models\Layanan`
**Fillable Fields:**
- `nama_layanan` - Nama layanan
- `kategori` - Kategori layanan (nullable)
- `deskripsi_layanan` - Deskripsi lengkap layanan
- `harga_layanan` - Harga layanan (decimal)
- `gambar_layanan` - Path gambar layanan (nullable)
- `slug` - URL-friendly slug (auto-generated dari nama_layanan)
- `is_active` - Status aktif/nonaktif (boolean)
- `order` - Urutan tampilan (integer)

**Casts:**
- `harga_layanan` → `decimal:2`
- `is_active` → `boolean`

**Relations:**
- `pesanan()` → hasMany ke Pesanan

### Controller: `AdminLayananController`

#### ✅ Create (Tambah Layanan)
**Route:** `POST /admin/layanan`

**Form Fields yang Diterima:**
```php
- nama_layanan (required, string, max:255)
- kategori (nullable, string, max:100)
- deskripsi_layanan (required, string)
- harga_layanan (required, numeric, min:0)
- gambar_layanan (nullable, image, max:2MB)
- is_active (nullable, boolean)
- order (nullable, integer)
```

**Proses:**
1. Validasi input
2. Generate slug otomatis dari nama_layanan
3. Upload gambar ke `storage/app/public/layanan/`
4. Simpan ke database dengan semua field

#### ✅ Read (Lihat Layanan)
**Route:** `GET /admin/layanan`

**Query:**
```php
Layanan::orderBy('created_at', 'desc')->get()
```

**Data yang Ditampilkan:**
- Semua layanan dengan semua kolom
- Diurutkan berdasarkan created_at descending

#### ✅ Update (Edit Layanan)
**Route:** `PUT /admin/layanan/{id}`

**Form Fields yang Diterima:**
```php
- nama_layanan (required, string, max:255)
- kategori (nullable, string, max:100)
- deskripsi_layanan (required, string)
- harga_layanan (required, numeric, min:0)
- gambar_layanan (nullable, image, max:2MB)
- is_active (nullable, boolean)
- order (nullable, integer)
```

**Proses:**
1. Find layanan by ID
2. Update slug otomatis dari nama_layanan baru
3. Jika ada gambar baru, hapus gambar lama dan upload baru
4. Update semua field ke database

#### ✅ Delete (Hapus Layanan)
**Route:** `DELETE /admin/layanan/{id}`

**Proses:**
1. Find layanan by ID
2. Hapus file gambar dari storage jika ada
3. Delete record dari database

---

## 2. Tabel Pesanans

### Struktur Database
```sql
CREATE TABLE pesanans (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    kode_pesanan VARCHAR(255) UNIQUE NOT NULL,
    user_id BIGINT NOT NULL,
    layanan_id BIGINT NOT NULL,
    nama_pemesan VARCHAR(255) NOT NULL,
    email_pemesan VARCHAR(255) NOT NULL,
    telepon VARCHAR(255) NOT NULL,
    deskripsi_tugas TEXT NOT NULL,
    deadline DATE NOT NULL,
    total_harga DECIMAL(10,2) NOT NULL,
    harga_layanan DECIMAL(10,2) NOT NULL,
    status ENUM('pending','processing','completed','cancelled','selesai') DEFAULT 'pending',
    file_pendukung VARCHAR(255) NULL,
    catatan_admin TEXT NULL,
    rating INT NULL,
    ulasan TEXT NULL,
    payment_method VARCHAR(255) NULL,
    payment_proof VARCHAR(255) NULL,
    payment_uploaded_at TIMESTAMP NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (layanan_id) REFERENCES layanans(id) ON DELETE CASCADE
);
```

### Model: `App\Models\Pesanan`
**Fillable Fields:**
- `kode_pesanan` - Kode unik pesanan
- `user_id` - ID user pemesan (foreign key)
- `layanan_id` - ID layanan (foreign key)
- `nama_pemesan` - Nama pemesan
- `email_pemesan` - Email pemesan
- `telepon` - Nomor telepon
- `deskripsi_tugas` - Deskripsi tugas/pesanan
- `deadline` - Tanggal deadline
- `total_harga` - Total harga pesanan
- `harga_layanan` - Harga layanan saat order
- `status` - Status pesanan (enum)
- `file_pendukung` - Path file pendukung (nullable)
- `catatan_admin` - Catatan dari admin (nullable)
- `rating` - Rating dari user (nullable)
- `ulasan` - Ulasan dari user (nullable)
- `payment_method` - Metode pembayaran (nullable)
- `payment_proof` - Bukti pembayaran (nullable)
- `payment_uploaded_at` - Waktu upload bukti bayar (nullable)

**Casts:**
- `deadline` → `date`
- `total_harga` → `decimal:2`
- `harga_layanan` → `decimal:2`
- `payment_uploaded_at` → `datetime`

**Relations:**
- `user()` → belongsTo User
- `layanan()` → belongsTo Layanan
- `orderItems()` → hasMany OrderItem

**Status Enum Values:**
- `pending` - Menunggu Pembayaran
- `processing` - Sedang Diproses
- `completed` - Selesai
- `cancelled` - Dibatalkan
- `selesai` - Selesai & Dinilai

### Controller: `AdminOrderController`

#### ✅ Read (Lihat Semua Pesanan)
**Route:** `GET /admin/order`

**Query:**
```php
Pesanan::with(['user', 'layanan'])
    ->orderBy('created_at', 'desc')
    ->get()
```

**Data yang Ditampilkan:**
- Semua pesanan dengan relasi user dan layanan
- Diurutkan berdasarkan created_at descending

#### ✅ Read Detail (Lihat Detail Pesanan)
**Route:** `GET /admin/order/{id}`

**Query:**
```php
Pesanan::with(['user', 'layanan', 'orderItems'])
    ->findOrFail($id)
```

**Data yang Ditampilkan:**
- Detail lengkap pesanan
- Data user pemesan
- Data layanan
- Order items (jika ada)

#### ✅ Update Status (Update Status Pesanan)
**Route:** `PUT /admin/order/{id}/status`

**Form Fields yang Diterima:**
```php
- status (required, enum: pending|processing|completed|cancelled|selesai)
- catatan_admin (nullable, string)
```

**Proses:**
1. Find pesanan by ID
2. Update status pesanan
3. Update catatan_admin jika ada
4. Save ke database

#### ✅ Update (Update Pesanan Lengkap)
**Route:** `PUT /admin/order/{id}`

**Form Fields yang Diterima:**
```php
- status (required, enum: pending|processing|completed|cancelled|selesai)
- catatan_admin (nullable, string)
- total_harga (nullable, numeric, min:0)
```

**Proses:**
1. Find pesanan by ID
2. Update status, catatan_admin, dan total_harga
3. Save ke database

#### ✅ Delete (Hapus Pesanan)
**Route:** `DELETE /admin/order/{id}`

**Proses:**
1. Find pesanan by ID
2. Delete record dari database
3. Foreign key cascade akan menghapus order_items terkait

#### ✅ Dashboard (Statistik)
**Route:** `GET /admin`

**Data yang Ditampilkan:**
```php
- totalOrders: Total semua pesanan
- pendingOrders: Pesanan dengan status pending
- processingOrders: Pesanan dengan status processing
- completedOrders: Pesanan dengan status completed
- totalRevenue: Total pendapatan dari pesanan completed & selesai
- recentOrders: 10 pesanan terbaru dengan relasi user & layanan
- monthlyStats: Statistik per bulan (12 bulan terakhir)
```

**Query Statistik Bulanan:**
```php
Pesanan::select(
    DB::raw('YEAR(created_at) as year'),
    DB::raw('MONTH(created_at) as month'),
    DB::raw('COUNT(*) as total_orders'),
    DB::raw('SUM(total_harga) as total_revenue')
)
->whereIn('status', ['completed', 'selesai'])
->groupBy('year', 'month')
->orderBy('year', 'desc')
->orderBy('month', 'desc')
->limit(12)
->get()
```

---

## 3. Validasi & Keamanan

### Validasi Input Layanan
✅ **Nama Layanan**: Required, string, max 255 karakter
✅ **Kategori**: Optional, string, max 100 karakter
✅ **Deskripsi**: Required, text
✅ **Harga**: Required, numeric, minimal 0
✅ **Gambar**: Optional, image (jpeg,png,jpg,gif,svg), max 2MB
✅ **Is Active**: Optional, boolean
✅ **Order**: Optional, integer

### Validasi Input Pesanan
✅ **Status**: Required, harus salah satu dari enum values
✅ **Catatan Admin**: Optional, text
✅ **Total Harga**: Optional, numeric, minimal 0

### Keamanan
✅ **Middleware Protection**: Semua route admin dilindungi `auth:admin`
✅ **CSRF Protection**: Semua form menggunakan @csrf token
✅ **File Upload Security**: Validasi tipe dan ukuran file
✅ **SQL Injection Protection**: Menggunakan Eloquent ORM
✅ **XSS Protection**: Laravel auto-escape output

---

## 4. File Upload & Storage

### Gambar Layanan
**Path Storage:** `storage/app/public/layanan/`
**Public URL:** `storage/layanan/{filename}`
**Naming Convention:** `{timestamp}_{slug}.{extension}`

**Proses Upload:**
1. Validasi file (type, size)
2. Generate filename unik
3. Store ke `storage/app/public/layanan/`
4. Simpan path ke database

**Proses Delete:**
1. Cek apakah file exists di storage
2. Hapus file fisik dari storage
3. Delete record dari database

### Setup Storage Link
Pastikan symbolic link sudah dibuat:
```bash
php artisan storage:link
```

---

## 5. Testing Integrasi

### Test CRUD Layanan

#### Test Create
```bash
# Via form atau API
POST /admin/layanan
Content-Type: multipart/form-data

nama_layanan: "Jasa Pembuatan Website"
kategori: "Web Development"
deskripsi_layanan: "Pembuatan website profesional"
harga_layanan: 5000000
gambar_layanan: [file]
is_active: true
order: 1
```

**Expected Result:**
- Record baru di tabel `layanans`
- Slug auto-generated: "jasa-pembuatan-website"
- Gambar tersimpan di storage
- Redirect ke `/admin/layanan` dengan success message

#### Test Update
```bash
PUT /admin/layanan/1
Content-Type: multipart/form-data

nama_layanan: "Jasa Website Premium"
kategori: "Web Development"
deskripsi_layanan: "Website premium dengan fitur lengkap"
harga_layanan: 7500000
is_active: true
order: 1
```

**Expected Result:**
- Record terupdate di database
- Slug terupdate: "jasa-website-premium"
- Gambar lama terhapus jika upload gambar baru
- Redirect dengan success message

#### Test Delete
```bash
DELETE /admin/layanan/1
```

**Expected Result:**
- Record terhapus dari database
- File gambar terhapus dari storage
- Redirect dengan success message

### Test Manajemen Pesanan

#### Test View All Orders
```bash
GET /admin/order
```

**Expected Result:**
- Tampil semua pesanan dengan data user & layanan
- Diurutkan dari terbaru

#### Test Update Status
```bash
PUT /admin/order/1/status
Content-Type: application/json

{
    "status": "processing",
    "catatan_admin": "Pesanan sedang dikerjakan"
}
```

**Expected Result:**
- Status pesanan terupdate di database
- Catatan admin tersimpan
- Redirect dengan success message

#### Test Dashboard
```bash
GET /admin
```

**Expected Result:**
- Tampil statistik lengkap
- Total orders, pending, processing, completed
- Total revenue
- Recent orders (10 terbaru)
- Monthly stats (12 bulan)

---

## 6. Troubleshooting

### Error: Column not found
**Penyebab:** Kolom di database tidak sesuai dengan Model
**Solusi:** 
```bash
php artisan migrate:fresh
php artisan db:seed --class=AdminSeeder
```

### Error: SQLSTATE[23000]: Integrity constraint violation
**Penyebab:** Foreign key constraint
**Solusi:** Pastikan user_id dan layanan_id valid sebelum insert

### Error: Storage link not found
**Penyebab:** Symbolic link belum dibuat
**Solusi:**
```bash
php artisan storage:link
```

### Error: File upload failed
**Penyebab:** Permission folder storage
**Solusi:**
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

---

## 7. Checklist Integrasi ✅

### Layanan (CRUD)
- [x] Model Layanan dengan fillable fields lengkap
- [x] Controller dengan validasi sesuai kolom database
- [x] Create: Insert ke semua kolom yang diperlukan
- [x] Read: Query dengan semua kolom
- [x] Update: Update semua kolom yang bisa diubah
- [x] Delete: Hapus record dan file terkait
- [x] File upload terintegrasi dengan storage
- [x] Slug auto-generation
- [x] Validasi input sesuai tipe data database

### Pesanan (Manajemen)
- [x] Model Pesanan dengan fillable fields lengkap
- [x] Controller dengan validasi sesuai enum status
- [x] Read: Query dengan relasi user & layanan
- [x] Update Status: Sesuai dengan enum di database
- [x] Update: Field yang bisa diubah admin
- [x] Delete: Hapus record dengan cascade
- [x] Dashboard: Statistik dari database real
- [x] Foreign key relationships terimplementasi

### Security & Validation
- [x] Middleware protection
- [x] Input validation
- [x] CSRF protection
- [x] File upload security
- [x] SQL injection protection

---

## Kesimpulan

✅ **Semua fitur admin sudah terintegrasi penuh dengan database**
- Tabel: `layanans` dan `pesanans`
- Kolom: Sesuai dengan migration
- Validasi: Sesuai dengan tipe data database
- Relations: Foreign keys terimplementasi
- CRUD: Semua operasi berfungsi dengan database real

**Tidak ada hardcoded data atau dummy data. Semua data berasal dari dan disimpan ke database.**
