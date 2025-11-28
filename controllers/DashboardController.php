<?php
session_start();
require_once '../config/database.php';
require_once '../models/Produk.php';
require_once '../models/TransaksiMasuk.php';
require_once '../models/TransaksiKeluar.php';
require_once '../models/Kategori.php';


// 4. fungsionalitas utama aplikasi - Autentikasi / login
if (!isset($_SESSION['user_id'])) { // mengecek apakah user sudah login atau belum
    header("Location: ../index.php");
    exit();
}

// 5. Integrasi Database - penerapan konsep OOP
$db = (new Database())->getConnection();
$produk = new Produk($db);
$kategori = new Kategori($db);
$masuk = new TransaksiMasuk($db);
$keluar = new TransaksiKeluar($db);

// ambil data seperti di dashboard.php
// 
// lalu
//2. struktur program & arsitektur - Pemisahan logika dan tampilan
include '../views/dashboard.php';