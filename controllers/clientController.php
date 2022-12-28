<?php
include 'utils/databaseUtil.php';
class ClientController
{
    public static function registerUser($userName, $fullName, $idRole, $email, $password, $idLop, $idKhoa, $status){
        try{
            $query = "INSERT INTO users (user_name, full_name, role_id, email, password, lop_id, khoa_id, active)
                        VALUES('$userName', '$fullName', $idRole, '$email', '$password', $idLop, $idKhoa, $status)";
            $result = DatabaseUtil::executeQuery($query);

            return $result;
        } catch (Exception $e){
            return $e;
        }
    }
    public static function getAllKhoa(){
        try{
            $db = DatabaseUtil::getConn();
            $query = "SELECT * FROM khoa";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrKhoa = array();
            foreach ($stmt->fetchAll() as $row){
                $arrKhoa[] = array(
                    'id'=>$row['id'],
                    'tenKhoa'=>$row['ten_khoa']
                );
            }
            return $arrKhoa;
        } catch (Exception $e){
            return $e;
        }
    }
    public static function getAllLop(){
        try{
            $db = DatabaseUtil::getConn();
            $query = "SELECT * FROM lop";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrLop = array();
            foreach ($stmt->fetchAll() as $row){
                $arrLop[] = array(
                    'id'=>$row['id'],
                    'tenLop'=>$row['ten_lop']
                );
            }
            return $arrLop;
        } catch (Exception $e){
            return $e;
        }
    }
    public static function getAllChuDe(){
        try{
            $db = DatabaseUtil::getConn();
            $query = "SELECT * FROM chude";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrChuDe = array();
            foreach ($stmt->fetchAll() as $row){
                $arrChuDe[] = array(
                    'id'=>$row['id'],
                    'tenChuDe'=>$row['ten_chu_de']
                );
            }
            return $arrChuDe;
        } catch (Exception $e){
            return $e;
        }
    }
    public static function getListQuestion($idChuDe){
        try{
            $db = DatabaseUtil::getConn();
            $query = "SELECT * FROM cauhoi WHERE id_chu_de = ".$idChuDe;
            $stmt = $db->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrCauHoi = array();
            foreach ($stmt->fetchAll() as $row){
                $arrCauHoi[] = array(
                    'id'=>$row['id'],
                    'noiDung'=>$row['noi_dung'],
                    'loaiCauTraLoi'=>$row['loai_cau_tra_loi']
                );
            }
            return $arrCauHoi;
        } catch (Exception $e){
            return $e;
        }
    }

}