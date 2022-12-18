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
                    'tenChuDe'=>$row['ten_chu_de'],
                    'ngayTao'=>$row['created_at'],
                    'nguoiTao'=>$row['created_by']
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
                    'loaiCauTraLoi'=>$row['loai_cau_tra_loi'],
                    'status'=>$row['status']
                );
            }
            return $arrCauHoi;
        } catch (Exception $e){
            return $e;
        }
    }
    public static function saveQuestion($noiDung, $idChuDe, $loaiCauHoi, $status){
        $dateTimeNow = date("Y-m-d H:i:s");
        try{
            $query = "INSERT INTO cauhoi(noi_dung, id_chu_de, loai_cau_tra_loi, status, created_at)
                        VALUES('$noiDung', '$idChuDe', '$loaiCauHoi', $status, '$dateTimeNow')";
            $result = DatabaseUtil::executeQuery($query);

            return $result;
        } catch (Exception $e){
            return $e;
        }
    }
    public static function saveTopic($tenChuDe, $username){
        $dateTimeNow = date("Y-m-d H:i:s");
        try{
            $query = "INSERT INTO chude(ten_chu_de, created_at, created_by)
                        VALUES('$tenChuDe','$dateTimeNow','$username')";
            $result = DatabaseUtil::executeQuery($query);

            return $result;
        } catch (Exception $e){
            return $e;
        }
    }
    public static function removeQuestion($questionId, $topicId){
        $sql = "DELETE FROM cauhoi WHERE id='$questionId' AND id_chu_de = '$topicId'";
        $delete = DatabaseUtil::executeQueryCheck($sql);
        return $delete;
    }
}