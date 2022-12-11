<?php
include 'utils/databaseUtil.php';
class QuestionController
{
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
                    'ten_chu_de'=>$row['ten_chu_de']
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
    public static function saveQuestion($noiDung, $idChuDe, $loaiCauHoi){
        try{
            $query = "INSERT INTO cauhoi(noi_dung, id_chu_de, loai_cau_tra_loi)
                        VALUES('$noiDung', '$idChuDe', '$loaiCauHoi')";
            $result = DatabaseUtil::executeQuery($query);

            return $result;
        } catch (Exception $e){
            return $e;
        }
    }
}