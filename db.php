<?php
class Database {
    private $host;
    private $username;
    private $password;
    private $dbname;
    public $conn;

    public function __construct() {
        if ($_SERVER['SERVER_NAME'] === 'localhost') {
            $this->host = "localhost";
            $this->username = "root";
            $this->password = "";
            $this->dbname = "tor";
        } else {
            $this->host = "live_server_host";  
            $this->username = "live_user";     
            $this->password = "live_password"; 
            $this->dbname = "live_dbname";     
        }

        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database Connection Error: " . $e->getMessage());
        }
    }
}

