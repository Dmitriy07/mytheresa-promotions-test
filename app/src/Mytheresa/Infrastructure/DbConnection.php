<?php

namespace App\Mytheresa\Infrastructure;

use PDO;

final class DbConnection
{
    static private $instance = null;

    private function __construct()
    {
        $hostName = $_ENV['DATABASE_HOST_NAME'];
        $databaseName = $_ENV['DATABASE_NAME'];
        $username = $_ENV['DATABASE_USERNAME'];
        $password = $_ENV['DATABASE_PASSWORD'];
        self::$instance = new PDO("mysql:host=$hostName;dbname=$databaseName", $username, $password);
        self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            new DbConnection();
        }

        return self::$instance;
    }

    private function __clone()
    {
    }
}