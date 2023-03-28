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
    public static function saveFormSurvey($title, $topicId, $timeStart, $timeEnd, $departmentId, $classId, $allUsers, $questions){
        try{
            $db = DatabaseUtil::getConn();
            $sql_form = "INSERT INTO form_surveys(title, topic_id, time_start, time_end, department_id, class_id, all_users)
                            VALUES(?, ?, ?, ?, ?, ?, ?)";
            $stmt = $db->prepare($sql_form);
            $stmt->execute(array(
                $title,
                $topicId,
                $timeStart,
                $timeEnd,
                $departmentId,
                $classId,
                $allUsers
            ));
            $formId = $db->lastInsertId();
            //
            foreach ($questions as $questionId => $status){
                $sql_log = "INSERT INTO form_survey_logs(question_id, form_id, status)
                            VALUES (?, ?, ?)";
                $stmt_log = $db->prepare($sql_log);
                $stmt_log->execute(array(
                    $questionId,
                    $formId,
                    $status
                ));
            }
            return 1;
        } catch(Exception $e){
            return $e;
        }
    }
    public static function getAllFormSurvey(){
        try{
            $db = DatabaseUtil::getConn();
            $sql = "SELECT FS.id, FS.title, T.topic_name, FS.time_start, FS.time_end, D.department_name, C.class_name, FS.all_users
                    FROM form_surveys FS, departments D, class C, topics T
                    WHERE FS.topic_id = T.id AND FS.department_id = D.id AND FS.class_id = C.id";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrForm = array();
            foreach ($stmt->fetchAll() as $row){
                $arrForm[] = array(
                    'id'=>$row['id'],
                    'title'=>$row['title'],
                    'topicName'=>$row['topic_name'],
                    'timeStart'=>$row['time_start'],
                    'timeEnd'=>$row['time_end'],
                    'departmentName'=>$row['department_name'],
                    'className'=>$row['class_name'],
                    'allUser'=>$row['all_users']
                );
            }
            return $arrForm;
        } catch(Exception $e) {
            return $e;
        }
    }
    public static function removeFormSurvey($id){
        try{
            $sql = "DELETE FROM form_surveys WHERE id = '$id'";
            $result = DatabaseUtil::executeQueryCheck($sql);
            $sql_log = "DELETE FROM form_survey_logs WHERE question_id = '$id'";
            $result = DatabaseUtil::executeQueryCheck($sql_log);
            return $result;
        } catch(Exception $e){
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
    public static function getStatisticFeedBack(){
        try{
            $db = DatabaseUtil::getConn();
            $query = "SELECT * FROM user_feedback";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrUserFeedBack = array();
            foreach ($stmt->fetchAll() as $row){
                $arrUserFeedBack[] = array(
                    'id'=>$row['id'],
                    'userName'=>$row['user_name'],
                    'formSurveyId'=>$row['form_survey_id'],
                    'createdAt'=>$row['created_at']
                );
            }
            return $arrUserFeedBack;
        } catch (Exception $e){
            return $e;
        }
    }

    public static function countSurveyByFormIdAndUserName($formSurveyId, $userName){
        try{
            $db = DatabaseUtil::getConn();
            $query = "SELECT COUNT(*) as count FROM user_feedback WHERE form_survey_id = :formSurveyId AND user_name = :userName";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':formSurveyId', $formSurveyId, PDO::PARAM_INT);
            $stmt->bindParam(':userName', $userName, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (Exception $e){
            return $e;
        }
    }
}