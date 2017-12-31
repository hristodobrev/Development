<?php

namespace Driver;

use PDO;

class PDODatabase implements DatabaseInterface
{
    private $db;

    public function __construct(string $host,
                                string $dbName,
                                string $user,
                                string $pass)
    {
        $dsn = "mysql:host=" . $host . ";dbname=" . $dbName . ';charset=utf8';
        $this->db = new \PDO($dsn, $user, $pass);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function prepare($query) : DatabaseStatementInterface
    {
        return new PDODatabaseStatement($this->db->prepare($query));
    }

    public function errorInfo()
    {
        return $this->db->errorInfo();
    }

    public function lastId()
    {
        return $this->db->lastInsertId();
    }
}