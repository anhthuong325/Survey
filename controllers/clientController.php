<?php
include 'utils/databaseUtil.php';
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
    public static function getListSurvey($user){
        try {
            $db = DatabaseUtil::getConn();
            $sql = "SELECT FS.*
                    FROM form_surveys FS INNER JOIN users U ON FS.class_id = U.class_id OR FS.department_id = U.department_id OR FS.all_users = 0
                    WHERE U.user_name = :userName
                    GROUP BY FS.id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':userName', $user, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrForm = array();
            foreach ($stmt->fetchAll() as $row){
                $item['id'] = $row['id'];
                $item['title'] = $row['title'];
                $item['timeStart'] = $row['time_start'];
                $item['timeEnd'] = $row['time_end'];
                $arrForm[] = $item;
            }
            return $arrForm;
        } catch(Exception $e){
            return $e;
        }
    }
    public static function getDetailSurvey($idForm){
        try{
            $db = DatabaseUtil::getConn();
            $sql = "SELECT FS.title, Q.id, Q.content, Q.option1, Q.option2, Q.option3, Q.option4, Q.option5, Q.option6, Q.number_option
                    FROM form_surveys FS INNER JOIN form_survey_logs FSL ON FS.id = FSL.form_id
                        INNER JOIN questions Q ON FSL.question_id = Q.id
                    WHERE FS.id = :formId AND FSL.status = 1";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':formId', $idForm, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrDetail = array();
            foreach ($stmt->fetchAll() as $row){
                $item['content'] = $row['content'];
                $item['option1'] = $row['option1'];
                $item['option2'] = $row['option2'];
                $item['option3'] = $row['option3'];
                $item['option4'] = $row['option4'];
                $item['option5'] = $row['option5'];
                $item['option6'] = $row['option6'];
                $item['numOption'] = $row['number_option'];
                $arrDetail['title'] = $row['title'];
                $arrDetail['questions'][$row['id']] = $item;
            }
            return $arrDetail;
        } catch (Exception $e){
            return $e;
        }
    }
}