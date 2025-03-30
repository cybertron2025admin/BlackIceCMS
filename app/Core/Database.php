<?php
namespace App\Core;

use PDO;

class Database {
    private static $connection;

    public static function init($config) {
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8";
        self::$connection = new PDO($dsn, $config['user'], $config['pass']);
        self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getConnection() {
        return self::$connection;
    }
}