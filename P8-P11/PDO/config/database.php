<?php 

class Database 
{   
    private static $host    = "localhost";
    private static $dbname  = "test";
    private static $user    = "root";
    private static $pass    = "kmzwa3awaa";

    protected static $connection = null;

    public function  __construct() {
        
    }

    public static function start() {
        if(self::$connection == null) {
            try {
                self::$connection = new PDO(
                    "mysql:host=".self::$host.";dbname=".self::$dbname,
                    self::$user,
                    self::$pass
                );
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
                exit;
            }
        }

        return self::$connection;
    }

    public static function end() {
        self::$connection = null;
    }
}

?>