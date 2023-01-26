<?php
include 'utils/databaseUtil.php';
class QuestionController
{
    public static function getAllTopics(){
        try{
            $db = DatabaseUtil::getConn();
            $query = "SELECT * FROM topics";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrTopics = array();
            foreach ($stmt->fetchAll() as $row){
                $arrTopics[] = array(
                    'id'=>$row['id'],
                    'topicName'=>$row['topic_name'],
                    'createAt'=>$row['created_at'],
                    'createBy'=>$row['created_by']
                );
            }
            return $arrTopics;
        } catch (Exception $e){
            return $e;
        }
    }
    public static function getAllSurveys(){
        try{
            $db = DatabaseUtil::getConn();
            $query = "SELECT * FROM form_survey";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrSurveys = array();
            foreach ($stmt->fetchAll() as $row){
                $arrSurveys[] = array(
                    'id'=>$row['id'],
                    'formTitle'=>$row['form_title'],
                    'startTime'=>$row['start_time'],
                    'endTime'=>$row['end_time']
                );
            }
            return $arrSurveys;
        } catch (Exception $e){
            return $e;
        }
    }
    public static function getAllUsers(){
        try{
            $db = DatabaseUtil::getConn();
            $query = "SELECT * FROM users";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrUsers = array();
            foreach ($stmt->fetchAll() as $row){
                $arrUsers[] = array(
                    'id'=>$row['id'],
                    'roleId'=>$row['role_id'],
                    'userName'=>$row['user_name']
                );
            }
            return $arrUsers;
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
    public static function getAllClasses(){
        try{
            $db = DatabaseUtil::getConn();
            $query = "SELECT * FROM classes";
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
    public static function getListQuestion($topicId){
        try{
            $db = DatabaseUtil::getConn();
            $query = "SELECT * FROM questions WHERE topic_id = :topicId";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':topicId', $topicId, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrCauHoi = array();
            foreach ($stmt->fetchAll() as $row){
                $arrCauHoi[] = array(
                    'id'=>$row['id'],
                    'content'=>$row['content'],
                    'op1'=>$row['option1'],
                    'op2'=>$row['option2'],
                    'op3'=>$row['option3'],
                    'op4'=>$row['option4'],
                    'op5'=>$row['option5'],
                    'op6'=>$row['option6'],
                    'topicId'=>$topicId,
                    'typeOption'=>$row['number_option']
                );
            }
            return $arrCauHoi;
        } catch (Exception $e){
            return $e;
        }
    }
    public static function saveQuestion($content, $topicId, $op1, $op2, $op3, $op4, $op5, $op6, $numberOption){
        $dateTimeNow = date("Y-m-d H:i:s");
        try{
            $query = "INSERT INTO questions(content, topic_id, option1, option2, option3, option4, option5, option6, number_option, created_at)
                        VALUES('$content', '$topicId', '$op1', '$op2', '$op3', '$op4', '$op5', '$op6', '$numberOption','$dateTimeNow')";
            $result = DatabaseUtil::executeQuery($query);

            return $result;
        } catch (Exception $e){
            return $e;
        }
    }
    public static function saveTopic($topicName, $username){
        $dateTimeNow = date("Y-m-d H:i:s");
        try{
            $query = "INSERT INTO topics(topic_name, created_at, created_by)
                        VALUES('$topicName','$dateTimeNow','$username')";
            $result = DatabaseUtil::executeQuery($query);

            return $result;
        } catch (Exception $e){
            return $e;
        }
    }
    public static function saveSurvey($formTitle, $topicId, $departmentId, $classId, $userId, $startTime, $endTime){
        $dateTimeNow = date("Y-m-d H:i:s");
        try{
            $query = "INSERT INTO form_survey(form_title, topic_id, department_id, class_id, user_id, start_time, end_time, active, created_at)
                        SELECT * FROM (SELECT '$formTitle' AS form_title, '$topicId' AS topic_id, '$departmentId' AS department_id, 
                                              '$classId' AS class_id, '$userId' AS user_id, '$startTime' AS start_time, 
                                              '$endTime' AS end_time, '1' AS active, '$dateTimeNow' AS created_at) AS temp
                        WHERE NOT EXISTS (
                            SELECT form_title FROM form_survey WHERE form_title = '$formTitle'
                        ) LIMIT 1;";
            $result = DatabaseUtil::executeQuery($query);
            return $result;
        } catch (Exception $e){
            return $e;
        }
    }
    public static function updateQuestion($idQuestion, $content, $op1, $op2, $op3, $op4, $op5, $op6, $numOption){
        $dateTimeNow = date("Y-m-d H:i:s");
        try{
            $query = "UPDATE questions SET content = '$content', option1 = '$op1', option2 = '$op2', option3 = '$op3', 
                        option4 = '$op4', option5 = '$op5', option6 = '$op6', number_option = '$numOption', updated_at = '$dateTimeNow'
                        WHERE id = '$idQuestion'";
            $result = DatabaseUtil::executeQuery($query);

            return $result;
        } catch (Exception $e){
            return $e;
        }
    }
    public static function removeQuestion($questionId, $topicId){
        $sql = "DELETE FROM questions WHERE id = '$questionId' AND topic_id = '$topicId'";
        $delete = DatabaseUtil::executeQueryCheck($sql);
        return $delete;
    }
}