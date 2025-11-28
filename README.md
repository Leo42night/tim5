SIGUDA - Sistem Informasi Gudang Fashion

SIGUDA (Sistem Informasi Gudang) adalah aplikasi berbasis web untuk mengelola inventori gudang fashion. Aplikasi ini dibangun menggunakan PHP OOP dengan arsitektur MVC dan PostgreSQL sebagai database.

Mata Kuliah: Pemrograman Berorientasi Objek (PPBO)
Kelompok: [SIGUDA]

# Fitur Utama
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



# Buat database
CREATE DATABASE gudang_fashion;

# Import schema
\i database.sql
Atau gunakan GUI seperti pgAdmin atau DBeaver.


# Login
URL: http://localhost:8000/index.php
Username: admin
Password: admin123

# Database Schema
Tabel Utama
users - Data admin/staff
kategori - Kategori produk (Kaos, Celana, dll)
produk - Data produk fashion
transaksi - Riwayat transaksi masuk/keluar
Relasi
kategori (1) ----< (N) produk
produk (1) ----< (N) transaksi

# Testing
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

Repository: https://github.com/Blackpa77/TUBES_PPBO_SIGUDA
