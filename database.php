<?php

// Class to get MySQL instance and offer the PDO object to the controllers 
namespace chatrobot;

Class Database {
    private static $db;
    private $pdo;
    private function __construct()
    {
        $this->pdo = new \PDO("mysql:host=localhost;dbname=chatrobot;charset=utf8", "root", "");
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    public static function getInstance()
    {
        if(!self::$db){
            self::$db = new Database();
        }
        return self::$db;
    }
    public function getPdo()
    {
        return $this->pdo;
    }
}
?>