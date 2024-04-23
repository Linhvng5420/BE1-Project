<?php
class Db
{
    public static $connection;
    public function __construct()
    {
        if (!self::$connection) {
            self::$connection = new mysqli("localhost", "root", "", "backend1",PORT);
            self::$connection->set_charset(DB_CHARSET);
        }
        return self::$connection;
    }
}