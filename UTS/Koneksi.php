<?php
class Koneksi {
    
    private $servername = "localhost";
    private $username   = "root";
    private $password   = "kmzwa3awaa";
    private $database   = "pw41";

    protected $koneksi;

    public function __construct()
    {
        try {
            $this->koneksi = new PDO(
                "mysql:host={$this->servername};dbname={$this->database}", 
                $this->username, 
                $this->password
            );

            $this->koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "Koneksi Gagal : " . $e->getMessage();
            exit;
        }
    }
}