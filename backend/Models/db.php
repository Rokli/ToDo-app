<?php

class db {
    private $username = "root";
    private $password = "xrxc321";
    private $host = "localhost";
    private $dbname = "ToDo";
    public $connection;
    public function __construct() {
        try {
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo("Ошибка подключения к базе данных: " . $e->getMessage());
        }
    }
}