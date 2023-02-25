<?php 

namespace Classes;

use PDO;

class Bd {
    private static $conn;

    public static function getConn() {
        if (!self::$conn) {
            self::$conn = new PDO('mysql:host=' . BD_HOST . ':' .BD_PORT . ';dbname=' . BD_NAME, BD_USER, BD_PASS);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }
        
        return self::$conn;
    }

}