<?php
//include 'utils/databaseUtil.php';
class ClientController
{
    public static function registerUser($userName, $fullName, $roleId, $email, $birthdate, $password, $classId, $departmentId){
        $dateTimeNow = date("Y-m-d H:i:s");
        try{
            $query = "INSERT INTO users(user_name, full_name, role_id, email, birthdate, password, class_id, department_id, active, created_at)
                        SELECT * FROM (SELECT '$userName' AS user_name, '$fullName' AS full_name, '$roleId' AS role_id, 
                                              '$email' AS email, '$birthdate' AS birthdate, '$password' AS password, 
                                              '$classId' AS class_id, '$departmentId' AS department_id, '1' AS active, '$dateTimeNow' AS created_at) AS temp
                        WHERE NOT EXISTS (
                            SELECT user_name FROM users WHERE user_name = '$userName'
                        ) LIMIT 1;";
            $result = DatabaseUtil::executeQuery($query);
            return $result;
        } catch (Exception $e){
            return $e;
        }
    }
    public static function getAllDepartments(){
        try{
            $db = DatabaseUtil::getConn();
            $query = "SELECT * FROM departments";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrKhoa = array();
            foreach ($stmt->fetchAll() as $row){
                $arrKhoa[] = array(
                    'id'=>$row['id'],
                    'departmentName'=>$row['department_name']
                );
            }
            return $arrKhoa;
        } catch (Exception $e){
            return $e;
        }
    }
    public static function getAllClass(){
        try{
            $db = DatabaseUtil::getConn();
            $query = "SELECT * FROM class";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrLop = array();
            foreach ($stmt->fetchAll() as $row){
                $arrLop[] = array(
                    'id'=>$row['id'],
                    'className'=>$row['class_name']
                );
            }
            return $arrLop;
        } catch (Exception $e){
            return $e;
        }
    }
}