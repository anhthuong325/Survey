<?php
include dirname(__DIR__).'/config/config.php';

class DatabaseUtil {
    public static function executeQuery($query) 
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
        $conn->set_charset("utf8");
        $result = $conn->query($query);
        $conn->close();
        return $result;
    }

    public static function executeQueryCheck($query)
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
        $result = $conn->query($query);
        $n = $conn->affected_rows;
        return $n;
        $conn->close();
    }

    public static function getConn()
    {
        $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
        $db->close();
    }

    public static function executeTransaction($query) 
    {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
        try 
        {
            $conn->begin_transaction();
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $conn->commit();
            $conn->close();
            return true;
        } 
        catch (Exception $ex) 
        {
            $conn->rollback();
            $conn->close();
        }
        return false;
    }
}

?>