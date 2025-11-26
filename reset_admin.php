<?php
// reset_admin.php
require_once 'config/database.php';

try {
    $database = new Database();
    $db = $database->getConnection();

    // 1. Hapus user admin lama
    $db->exec("DELETE FROM users WHERE username = 'admin'");

    // 2. Buat password hash baru untuk 'admin123'
    // Kodingan login kamu pakai password_verify, jadi database HARUS pakai password_hash
    $passHash = password_hash('admin123', PASSWORD_DEFAULT);

    // 3. Masukkan user baru
    $sql = "INSERT INTO users (username, password, nama_lengkap, role) VALUES ('admin', '$passHash', 'Administrator', 'admin')";
    $db->exec($sql);

    echo "<h1>SUKSES!</h1>";
    echo "User admin berhasil di-reset.<br>";
    echo "Silakan login dengan:<br>";
    echo "Username: <b>admin</b><br>";
    echo "Password: <b>admin123</b><br>";
    echo "<br><a href='index.php'>KLIK DISINI UNTUK LOGIN</a>";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>