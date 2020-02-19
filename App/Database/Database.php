<?php

namespace App\Database;

class Database {

    private static $instance;
    private $connection;

    private function __construct()
    {
        $this->connection = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    public static function getInstance()
    {
        if(self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    private function __clone()
    {
        throw new \Exception('You can\'t clone this class.');
    }

    public function connect()
    {
        return $this->connection;
    }
}