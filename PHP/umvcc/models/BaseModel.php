<?php

abstract class BaseModel
{
    protected static $db;

    function __construct()
    {
        if (!self::$db) {
            self::$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            self::$db->set_charset('utf8');
            if (self::$db->connect_errno) {
                die("Couldn't connect to the database.");
            }
        }
    }
}