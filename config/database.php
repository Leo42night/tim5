<?php

class Database {
    // 1. Properti Private
    private $host;
    private $db_name;
    private $username;
    private $password;
    private $port;
    
    public $conn;

    public function __construct() {
        // 7. Konfigurasi: Mengambil dari Environment Variables (Vercel/Supabase)
        // Jika tidak ada di env (lokal), gunakan default string kosong atau nilai defaultmu
        
        $this->host = getenv('DB_HOST');
        $this->port = getenv('DB_PORT') ? getenv('DB_PORT') : '5432'; // Port default Postgres
        $this->db_name = getenv('DB_DATABASE') ? getenv('DB_DATABASE') : 'postgres';
        $this->username = getenv('DB_USERNAME');
        $this->password = getenv('DB_PASSWORD');
    }

    public function getConnection() {
        $this->conn = null;
        
        try {
            // PENTING: Menggunakan driver 'pgsql' untuk PostgreSQL (Supabase)
            // Format DSN: pgsql:host=...;port=...;dbname=...
            $dsn = "pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name;
            
            // 5. Inisialisasi PDO
            $this->conn = new PDO($dsn, $this->username, $this->password);
            
            // Set Error Mode ke Exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            // Set fetch mode default ke Associative Array
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch(PDOException $exception) {
            // Tampilkan pesan error jika koneksi gagal
            echo "Database Connection Error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>