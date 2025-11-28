📦 SIGUDA - Sistem Informasi Gudang Fashion
📋 Deskripsi Proyek
SIGUDA (Sistem Informasi Gudang) adalah aplikasi berbasis web untuk mengelola inventori gudang fashion. Aplikasi ini dibangun menggunakan PHP OOP dengan arsitektur MVC dan PostgreSQL sebagai database.

👥 Informasi Tim
Mata Kuliah: Pemrograman Berorientasi Objek (PPBO)
Kelompok: [SIGUDA]
✨ Fitur Utama
🔐 Autentikasi
Login dengan username dan password
Session management
Role-based access (Admin/Staff)
📊 Dashboard
Statistik total produk, kategori, dan transaksi
Alert stok menipis (< 10 unit)
Tampilan 5 transaksi terakhir
Estimasi nilai aset stok
🏷️ Manajemen Kategori
✅ CRUD (Create, Read, Update, Delete) kategori
Validasi kategori yang memiliki produk tidak bisa dihapus
📦 Manajemen Produk
✅ CRUD produk lengkap
Multi-atribut: kode produk, nama, ukuran, warna, stok, harga beli, harga jual
Filter stok menipis
Export laporan ke HTML dan PDF (menggunakan Dompdf)
🔄 Manajemen Transaksi
Transaksi Masuk (menambah stok)
Transaksi Keluar (mengurangi stok dengan validasi)
Riwayat transaksi lengkap
Cetak laporan transaksi berdasarkan periode
🎯 Penerapan Konsep OOP
1️⃣ Encapsulation
Lokasi: models/Admin.php, models/Produk.php

php
// Property PRIVATE dengan Getter & Setter
private $id;
private $username;
public function getId() { return $this->id; }
public function setId($id) { $this->id = $id; }
2️⃣ Inheritance
Lokasi: models/TransaksiMasuk.php, models/TransaksiKeluar.php

php
// Class child extends parent
class TransaksiMasuk extends Transaksi { ... }
class TransaksiKeluar extends Transaksi { ... }
3️⃣ Polymorphism
Lokasi: Method validateStock() dan save() di class Transaksi

php
// Method di parent class Transaksi
abstract public function validateStock();
abstract public function save();

// Override di TransaksiKeluar
public function validateStock() {
    // Logic khusus untuk validasi stok keluar
    return ($produk->stok >= $this->jumlah);
}
4️⃣ Abstract Class
Lokasi: models/Transaksi.php

php
abstract class Transaksi {
    abstract public function validateStock();
    abstract public function save();
}
5️⃣ Interface
Lokasi: models/LaporanInterface.php

php
interface LaporanInterface {
    public function readLaporan($start_date, $end_date);
    public function exportToPDF();
}
🗂️ Struktur Folder (MVC)
TUBES_PPBO_SIGUDA/
│
├── config/
│   └── database.php          # Konfigurasi koneksi database
│
├── models/                   # Model (Business Logic)
│   ├── Admin.php
│   ├── Produk.php
│   ├── Kategori.php
│   ├── Transaksi.php        # Abstract Class
│   ├── TransaksiMasuk.php   # Inheritance
│   ├── TransaksiKeluar.php  # Inheritance
│   └── LaporanInterface.php # Interface
│
├── controllers/              # Controller (Request Handler)
│   ├── DashboardController.php
│   ├── KategoriController.php
│   ├── ProdukController.php
│   └── TransaksiController.php
│
├── views/                    # View (Presentation)
│   ├── layouts/
│   │   └── navbar.php
│   ├── dashboard.php
│   ├── kategori/
│   ├── produk/
│   └── transaksi/
│
├── vendor/                   # Composer dependencies
│   └── dompdf/              # Library untuk export PDF
│
├── .gitignore
├── composer.json            # Dependency management
├── database.sql             # SQL Schema & Dummy Data
├── index.php                # Entry point (Login)
├── logout.php
└── README.md                # Dokumentasi (file ini)
🛠️ Teknologi yang Digunakan
Kategori	Teknologi
Backend	PHP 8.2+ (OOP)
Database	PostgreSQL 14+
Frontend	HTML5, CSS3, Bootstrap 5.3
Icons	Bootstrap Icons
Arsitektur	MVC (Model-View-Controller)
Dependency Manager	Composer
PDF Generator	Dompdf (dompdf/dompdf)
📦 Dependency (Composer)
1. Dompdf - Export PDF
Tujuan: Generate laporan dalam format PDF yang profesional
Lokasi Implementasi:

File: views/produk/cetak_pdf.php
Fungsi: Export laporan stok produk ke PDF
Install: composer require dompdf/dompdf
json
{
    "require": {
        "php": "^8.2",
        "dompdf/dompdf": "^2.0"
    }
}
Cara Penggunaan:

Install dependency: composer install
Akses: Menu Produk → Klik tombol "Export PDF"
PDF akan otomatis ter-generate dan dapat di-download
🚀 Cara Instalasi & Menjalankan
Prerequisites
PHP 8.2 atau lebih tinggi
PostgreSQL 14+
Composer
Web Server (Apache/Nginx) atau PHP Built-in Server
Langkah-langkah
1️⃣ Clone Repository
bash
git clone https://github.com/Blackpa77/TUBES_PPBO_SIGUDA.git
cd TUBES_PPBO_SIGUDA
2️⃣ Install Dependencies
bash
composer install
Ini akan menginstall:

Dompdf untuk export PDF
Dependencies lainnya
3️⃣ Setup Database
bash
# Login ke PostgreSQL
psql -U postgres

# Buat database
CREATE DATABASE gudang_fashion;

# Import schema
\i database.sql
Atau gunakan GUI seperti pgAdmin atau DBeaver.

4️⃣ Konfigurasi Environment
Buat file .env atau set environment variables:

env
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=gudang_fashion
DB_USERNAME=postgres
DB_PASSWORD=your_password
Untuk deployment di Vercel/Railway, pastikan environment variables sudah di-set di dashboard platform.

5️⃣ Jalankan Aplikasi
Opsi 1: PHP Built-in Server

bash
php -S localhost:8000
Opsi 2: Apache/Nginx

Copy project ke folder htdocs atau www
Akses via http://localhost/TUBES_PPBO_SIGUDA
6️⃣ Login
URL: http://localhost:8000/index.php
Username: admin
Password: admin123
📊 Database Schema
Tabel Utama
users - Data admin/staff
kategori - Kategori produk (Kaos, Celana, dll)
produk - Data produk fashion
transaksi - Riwayat transaksi masuk/keluar
Relasi
kategori (1) ----< (N) produk
produk (1) ----< (N) transaksi
📸 Screenshot
Dashboard
Tampilkan Gambar

Manajemen Produk
Tampilkan Gambar

Export PDF (Dompdf)
Tampilkan Gambar

🧪 Testing
Manual Testing Checklist
✅ Login berhasil dengan kredensial valid
✅ CRUD Kategori berfungsi
✅ CRUD Produk berfungsi
✅ Transaksi masuk menambah stok
✅ Transaksi keluar mengurangi stok & validasi
✅ Export PDF laporan produk
✅ Dashboard menampilkan data real-time
🔒 Keamanan
✅ Password di-hash dengan password_hash() (bcrypt)
✅ Prepared Statement (mencegah SQL Injection)
✅ Session management untuk autentikasi
✅ Input sanitization dengan htmlspecialchars()
📝 Checklist Penilaian PPBO
No	Aspek	Status	Bukti
1	Encapsulation	✅	Admin.php, Produk.php - private property + getter/setter
2	Inheritance	✅	TransaksiMasuk & TransaksiKeluar extends Transaksi
3	Polymorphism	✅	Override validateStock() dan save()
4	Abstract Class	✅	Transaksi.php
5	Interface	✅	LaporanInterface.php
6	Arsitektur MVC	✅	Folder models/, controllers/, views/
7	CRUD Lengkap	✅	Produk, Kategori, Transaksi
8	Database PDO	✅	Database.php dengan prepared statement
9	Autentikasi	✅	Login + session di index.php
10	Composer Dependency	✅	Dompdf untuk export PDF
11	UI/UX Responsif	✅	Bootstrap 5 grid system
12	Dokumentasi	✅	README.md (file ini)
🎓 Kesimpulan
Aplikasi SIGUDA berhasil mengimplementasikan semua konsep OOP yang diajarkan dalam mata kuliah PPBO, termasuk Encapsulation, Inheritance, Polymorphism, Abstract Class, dan Interface. Arsitektur MVC memisahkan logika bisnis, kontrol, dan tampilan dengan baik. Penggunaan Composer dependency (Dompdf) menunjukkan kemampuan integrasi library pihak ketiga untuk fitur tambahan seperti export PDF.

📞 Kontak
Repository: https://github.com/Blackpa77/TUBES_PPBO_SIGUDA
Email: [email@example.com]
© 2025 SIGUDA PPBO - 