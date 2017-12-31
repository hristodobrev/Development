<?php

namespace Driver;

class Database
{
    /**
     * @var \PDO[]
     */
    private static $instances = [];

    public function __construct()
    {
    }

    public static function setInstance($host, $user, $pass, $name)
    {
        $dsn = 'mysql:host=' . $host . ';dbname=' . $name;
        self::$instances[$dsn . $user . $pass] = new \PDO($dsn, $user, $pass);
    }

    public static function getInstance($host, $user, $pass, $name)
    {
        $dsn = 'mysql:host=' . $host . ';dbname=' . $name;
        return self::$instances[$dsn . $user . $pass];
    }
}