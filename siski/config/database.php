<?php
class Database {
    private $host = "localhost";
    private $database_name = "dasort";
    private $username = "root"; //username phpmyadmin
    private $password = ""; //password phpmyadmin
    public $conn; //alias koneksi

    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=". 
            $this->database_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Database could not be connected: " . $exception->getMessage();
        }
        return $this->conn;
    }
}