<?php

namespace Controllers;

class DBController {
	private static $DB_HOST = 'localhost';
	private static $DB_USER = 'root';
	private static $DB_PASS = '956823627';
	private static $DB_NAME = 'test';

	protected static $db;

	public function __construct()
	{
		if (self::$db == null) {
            self::$db = new \mysqli(self::$DB_HOST, self::$DB_USER, self::$DB_PASS, self::$DB_NAME);
            self::$db->set_charset('utf8');
            if (self::$db->connect_errno) {
                die('Cannot connect to database.');
            }
		}
	}
}