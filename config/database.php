<?php
class Database {
    // Sesuaikan dengan setting XAMPP Anda
    private $host = "localhost";
    private $db_name = "gudang_fashion"; // Pastikan nama database di phpMyAdmin sama dengan ini
    private $username = "root";          // Default XAMPP biasanya "root"
    private $password = "mkjw4004";              // Default XAMPP biasanya kosong

    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

<?php
// Railway menyediakan MySQL variables otomatis
return [
    'host' => getenv('MYSQLHOST') ?: 'localhost',
    'port' => getenv('MYSQLPORT') ?: '3306',
    'dbname' => getenv('MYSQLDATABASE') ?: 'mvc_db',
    'username' => getenv('MYSQLUSER') ?: 'root',
    'password' => getenv('MYSQLPASSWORD') ?: '',
    'charset' => 'utf8mb4'
];

?>