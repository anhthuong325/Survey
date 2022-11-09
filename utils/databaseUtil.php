<?php
include 'config/config.php';

class databaseUtil
{
    public static function executeQuery($query)
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
        $result = $conn->query($query);
        $conn->close();
        return $result;
    }
    public static function getConn()
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4', DB_USER, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
        $db->close();
    }
}