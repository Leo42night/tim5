<?php
class Database {
    // Settingan Fix untuk Localhost (Laragon/XAMPP)
    private $host = "localhost";
    private $db_name = "gudang_fashion";
    private $username = "root";
    private $password = ""; // KOSONGKAN string ini (jangan ada spasi)
    
    public $conn;

    public function getConnection() {
        $this->conn = null;
        
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $exception) {
            // Jika error, STOP program agar tidak muncul error "prepare() on null"
            echo "<h1>Gagal Koneksi Database</h1>";
            echo "Pesan Error: " . $exception->getMessage();
            exit; // PENTING: Berhenti di sini
        }

        return $this->conn;
    }
}
?>