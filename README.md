# SIGUDA - Sistem Informasi Gudang Fashion
# Deskripsi Proyek
SIGUDA (Sistem Informasi Gudang) adalah aplikasi berbasis web untuk mengelola inventori gudang fashion. Aplikasi ini dibangun menggunakan PHP OOP dengan arsitektur MVC dan PostgreSQL sebagai database.

# Informasi Tim

Mata Kuliah: Pemrograman Berorientasi Objek (PPBO)
Kelompok: SIGUDA
Anggota:

1. H1101241039 -  Florecita Wenny 
2. H1101241001 - Adhelia Issabel 
3. H1101241029 - Arjun Maheswara Paundra 
4. H1101241043 - Aurellya Yocelyn Prasista 
5. H1101241057 - Tesa Firna Ananta 



# Fitur Utama
# Autentikasi

Login dengan username dan password
Session management
Role-based access (Admin/Staff)

# Dashboard

Statistik total produk, kategori, dan transaksi
Alert stok menipis (< 10 unit)
Tampilan 5 transaksi terakhir
Estimasi nilai aset stok

# Manajemen Kategori

# CRUD (Create, Read, Update, Delete) kategori
Validasi kategori yang memiliki produk tidak bisa dihapus

# Manajemen Produk

# CRUD produk lengkap
Multi-atribut: kode produk, nama, ukuran, warna, stok, harga beli, harga jual
Filter stok menipis
Export laporan ke HTML dan PDF (menggunakan Dompdf)

# Manajemen Transaksi

Transaksi Masuk (menambah stok)
Transaksi Keluar (mengurangi stok dengan validasi)
Riwayat transaksi lengkap
Cetak laporan transaksi berdasarkan periode

# Penerapan Konsep OOP
1. Encapsulation
Lokasi: models/Admin.php, models/Produk.php
php// Property PRIVATE dengan Getter & Setter
private $id;
private $username;
public function getId() { return $this->id; }
public function setId($id) { $this->id = $id; }

2. Inheritance
Lokasi: models/TransaksiMasuk.php, models/TransaksiKeluar.php
php// Class child extends parent
class TransaksiMasuk extends Transaksi { ... }
class TransaksiKeluar extends Transaksi { ... }

3. Polymorphism
Lokasi: Method validateStock() dan save() di class Transaksi
php// Method di parent class Transaksi
abstract public function validateStock();
abstract public function save();

// Override di TransaksiKeluar
public function validateStock() {
    // Logic khusus untuk validasi stok keluar
    return ($produk->stok >= $this->jumlah);
}

4. Abstract Class
Lokasi: models/Transaksi.php
phpabstract class Transaksi {
    abstract public function validateStock();
    abstract public function save();
}

5. Interface
Lokasi: models/LaporanInterface.php
phpinterface LaporanInterface {
    public function readLaporan($start_date, $end_date);
    public function exportToPDF();
}


# Cara Penggunaan:

Install dependency: composer install
Akses: Menu Produk → Klik tombol "Export PDF"
PDF akan otomatis ter-generate dan dapat di-download

# Cara Instalasi & Menjalankan
Prerequisites: 
PHP 8.2 atau lebih tinggi
PostgreSQL 14+
Composer
Web Server (Apache/Nginx) atau PHP Built-in Server

# Langkah-langkah
1. Clone Repository
bashgit clone https://github.com/Blackpa77/TUBES_PPBO_SIGUDA.git
cd TUBES_PPBO_SIGUDA
2. Install Dependencies
bashcomposer install
Ini akan menginstall:

Dompdf untuk export PDF
Dependencies lainnya

3. Setup Database
bash# Login ke mysql
mysql -U 

# Buat database
CREATE DATABASE gudang_fashion;

# Import schema
\i database.sql
Atau gunakan GUI seperti pgAdmin atau DBeaver.
4. Konfigurasi Environment
Buat file .env atau set environment variables:
envDB_HOST=localhost
DB_PORT=5432
DB_DATABASE=gudang_fashion
DB_USERNAME=postgres
DB_PASSWORD=your_password
Untuk deployment di Vercel/Railway, pastikan environment variables sudah di-set di dashboard platform.
5. Jalankan Aplikasi
Opsi 1: PHP Built-in Server
bashphp -S localhost:8000
Opsi 2: Apache/Nginx

# project
dokumen : https://docs.google.com/document/d/1mTMhX8uBaTI0z1bTFjYZ2TCWiV2GJZW7ITvg3r7dA1o/edit?tab=t.0

Repository github: https://github.com/Blackpa77/TUBES_PPBO_SIGUDA

Demo : https://drive.google.com/file/d/11hGy3fDN1dMsLLIxJcppz2fa6ZidSn7w/view?usp=sharing 

Video presentasi : https://drive.google.com/file/d/11hGy3fDN1dMsLLIxJcppz2fa6ZidSn7w/view?usp=sharing 


