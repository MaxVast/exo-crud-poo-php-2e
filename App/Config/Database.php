<?php

namespace App\Config;

use \PDO;

class Database {
    private $host = 'localhost';
    private $dbname = 'my_database';
    private $username = 'root';
    private $password = '';
    private $pdo;

    public function __construct() {
        $this->pdo = new \PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection() {
        return $this->pdo;
    }
}
