<?php
include 'utils/databaseUtil.php';
class ClientController
{
    public static function getAllLuaChon(){
        try{
            $db = DatabaseUtil::getConn();
            $query = "SELECT * FROM luachon";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrLuaChon = array();
            foreach ($stmt->fetchAll() as $row){
                $arrLuaChon[] = array(
                    'id'=>$row['id'],
                    'tenLuaChon'=>$row['ten_lua_chon'],
                );
            }
            return $arrLuaChon;
        } catch (Exception $e){
            return $e;
        }
    }

}