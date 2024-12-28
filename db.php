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
            $this->host = "localhost";  
            $this->username = "u402017191_tor";     
            $this->password = "Trendsonrun@99"; 
            $this->dbname = "u402017191_tor";     
        }

        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database Connection Error: " . $e->getMessage());
        }
    }
}

