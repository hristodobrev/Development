<?php

namespace Services;

use Core\Config;

class BaseService implements ServiceInterface
{
    private $db;

    public function __construct()
    {
        $this->db = new \mysqli(Config::DB_HOST, Config::DB_USER, Config::DB_PASS, Config::DB_NAME);
    }

    public function getDB()
    {
        return $this->db;
    }
}