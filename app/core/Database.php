<?php

class Database {

    /**
     * @var $instance
     */
    public static $instance;

    /**
     * Database constructor.
     */
    private function __construct() {
    }

    /**
     * @return PDO
     */
    public static function connect() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=localhost;dbname=mydatabase', 'root', '123', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }

        return self::$instance;
    }

}

