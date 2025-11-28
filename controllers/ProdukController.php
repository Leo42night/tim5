<?php
// 2. MVC/Modular
session_start();
require_once '../config/database.php';
require_once '../models/Produk.php';
require_once '../models/Kategori.php';

if(!isset($_SESSION['user_id'])) { // untuk mengecek apakah user sudah login atau belum
    header("Location: ../index.php");
    exit();
}

$database = new Database();
$db = $database->getConnection();
$produk = new Produk($db);
$kategori = new Kategori($db);

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch($action) {
    case 'index':
        $stmt = $produk->readAll();
        include '../views/produk/index.php';
        break;
        
    case 'create':
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // 3. BUKTI ENCAPSULATION: Menggunakan SETTER untuk set data
            $produk->setIdKategori($_POST['kategori_id']);
            $produk->setKodeProduk($_POST['kode_produk']);
            $produk->setNamaProduk($_POST['nama_produk']);
            $produk->setUkuran($_POST['ukuran']);
            $produk->setWarna($_POST['warna']);
            $produk->setStok($_POST['stok']);
            $produk->setHargaBeli($_POST['harga_beli']);
            $produk->setHargaJual($_POST['harga_jual']);
            $produk->setDeskripsi($_POST['deskripsi']);
            
            if($produk->create()) {
                $_SESSION['success'] = "Produk berhasil ditambahkan";
                header("Location: ProdukController.php");
                exit();
            } else {
                $_SESSION['error'] = "Gagal menambah produk (Kode Produk mungkin duplikat)";
            }
        }
        
        $stmt_kategori = $kategori->readAll(); 
        include '../views/produk/create.php';
        break;
        
    case 'edit':
        if(isset($_GET['id'])) {
            // Set ID menggunakan setter
            $produk->setIdProduk($_GET['id']);
            $produk->readOne();
            
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Update menggunakan setter
                $produk->setIdKategori($_POST['kategori_id']);
                $produk->setKodeProduk($_POST['kode_produk']);
                $produk->setNamaProduk($_POST['nama_produk']);
                $produk->setUkuran($_POST['ukuran']);
                $produk->setWarna($_POST['warna']);
                $produk->setStok($_POST['stok']);
                $produk->setHargaBeli($_POST['harga_beli']);
                $produk->setHargaJual($_POST['harga_jual']);
                $produk->setDeskripsi($_POST['deskripsi']);
                
                if($produk->update()) {
                    $_SESSION['success'] = "Produk berhasil diupdate";
                    header("Location: ProdukController.php");
                    exit();
                } else {
                    $_SESSION['error'] = "Gagal mengupdate produk";
                }
            }
        }
        $stmt_kategori = $kategori->readAll();
        include '../views/produk/edit.php';
        break;
        
    case 'delete':
        if(isset($_GET['id'])) {
            $produk->setIdProduk($_GET['id']);
            
            if($produk->delete()) {
                $_SESSION['success'] = "Produk berhasil dihapus";
            } else {
                $_SESSION['error'] = "Gagal menghapus produk";
            }
        }
        header("Location: ProdukController.php");
        exit();
        
    case 'cetak':
        // Cetak HTML (untuk print browser)
        $stmt = $produk->readAll();
        include '../views/produk/cetak.php';
        break;
    
    case 'cetak_pdf':
        // Export ke PDF menggunakan DOMPDF
        $stmt = $produk->readAll();
        include '../views/produk/cetak_pdf.php';
        break;
        
    default:
        $stmt = $produk->readAll();
        include '../views/produk/index.php';
        break;
}
?>