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
    public static function getAllUsers(){
        try{
            $db = DatabaseUtil::getConn();
            $query = "SELECT * FROM users";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrUser = array();
            foreach ($stmt->fetchAll() as $row){
                $arrUser[] = array(
                    'id'=>$row['id'],
                    'full_name'=>$row['full_name'],
                    'email'=>$row['email'],
                    'birthdate'=>$row['birthdate']
                );
            }
            return $arrUser;
        } catch (Exception $e){
            return $e;
        }
    }
    public static function updateUser($id, $fullName, $email, $birthdate){
        $dateTimeNow = date("Y-m-d H:i:s");
        try{
            $query = "UPDATE users SET full_name = '$fullName', email = '$email', birthdate = '$birthdate', updated_at = '$dateTimeNow'
                        WHERE id = '$id'";
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
            $query = "SELECT C.id as 'class_id', D.id as 'department_id', D.department_name, C.class_name FROM class C INNER JOIN departments D ON C.department_id = D.id";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrLop = array();
            foreach ($stmt->fetchAll() as $row){
                $arrLop[$row['department_id']]['departmentName'] = $row['department_name'];
                $arrLop[$row['department_id']]['class'][] = array(
                    'id'=>$row['class_id'],
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
                    FROM form_surveys FS INNER JOIN users U
                    WHERE U.user_name = :userName AND (FS.department_id = U.department_id AND (FS.class_id = U.class_id OR FS.class_id = 0) OR FS.all_users = 0)
                    GROUP BY FS.id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':userName', $user, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrForm = array();
            //get surveys submitted
            $arrSurveysSubmitted = ClientController::getFormSurveySubmited($user);
            foreach ($stmt->fetchAll() as $row){
                $item['id'] = $row['id'];
                $item['title'] = $row['title'];
                $item['timeStart'] = $row['time_start'];
                $item['timeEnd'] = $row['time_end'];
                //0: not submit
                //1: submitted
                if(in_array($row['id'],$arrSurveysSubmitted)){
                    $item['status'] = 1;
                } else if(!in_array($row['id'],$arrSurveysSubmitted)) {
                    $item['status'] = 0;
                }
                $arrForm[$row['id']] = $item;
            }
            return $arrForm;
        } catch(Exception $e){
            return $e;
        }
    }
    private static function getFormSurveySubmited($user){
        try {
            $db = DatabaseUtil::getConn();
            $sql = "SELECT form_survey_id FROM user_feedback WHERE user_name = :userName";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':userName', $user, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arr = array();
            foreach ($stmt->fetchAll() as $row){
                array_push($arr, $row['form_survey_id']);
            }
            return $arr;
        } catch(Exception $e){
            return $e;
        }
    }
    public static function getDetailSurvey($idForm){
        try{
            $db = DatabaseUtil::getConn();
            $sql = "SELECT FS.id, FS.title, Q.id as 'question_id', Q.content, Q.option1, Q.option2, Q.option3, Q.option4, Q.option5, Q.option6, Q.number_option
                    FROM form_surveys FS INNER JOIN form_survey_logs FSL ON FS.id = FSL.form_id
                        INNER JOIN questions Q ON FSL.question_id = Q.id
                    WHERE FS.id = :formId AND FSL.status = 1";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':formId', $idForm, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $arrDetail = array();
            foreach ($stmt->fetchAll() as $row){
                $item = array();
                if($row['number_option'] > 0){
                    $item['content'] = $row['content'];
                    if($row['option1'] != null){
                        $item['option1'] = $row['option1'];
                    }
                    if($row['option2'] != null){
                        $item['option2'] = $row['option2'];
                    }
                    if($row['option3'] != null){
                        $item['option3'] = $row['option3'];
                    }
                    if($row['option4'] != null){
                        $item['option4'] = $row['option4'];
                    }
                    if($row['option5'] != null){
                        $item['option5'] = $row['option5'];
                    }
                    if($row['option6'] != null){
                        $item['option6'] = $row['option6'];
                    }
                    $item['numOption'] = $row['number_option'];
                } else {
                    $item['content'] = $row['content'];
                    $item['numOption'] = $row['number_option'];
                }
                $arrDetail['surveyId'] = $row['id'];
                $arrDetail['title'] = $row['title'];
                $arrDetail['questions'][$row['question_id']] = $item;
            }
            return $arrDetail;
        } catch (Exception $e){
            return $e;
        }
    }
    public static function saveFeedbackUser($arrFeedback){
        try {
            $userName = 'Anonymous';
            if (isset($_SESSION['USER_ACCOUNT'])) {
                $userName = $_SESSION['USER_ACCOUNT'];
            }
            $dateNow = date("Y-m-d H:i:s");
            $db = DatabaseUtil::getConn();
            //save into user_feedback
            $sql = "INSERT INTO user_feedback(user_name, form_survey_id, created_at)
                    VALUE(?, ?, ?)";
            $stmt = $db->prepare($sql);
            $stmt->execute(array(
                $userName,
                $arrFeedback['formSurveyId'],
                $dateNow
            ));
            $feedbackId = $db->lastInsertId();
            foreach ($arrFeedback['feedback'] as $questionId => $option){
                //save multiple choice question format
                if(isset($option['option'])){
                    $db_option = DatabaseUtil::getConn();
                    $sql_option = "INSERT INTO user_feedback_logs(user_feedback_id, question_id, option)
                                    VALUES (?, ?, ?)";
                    $stmt_option = $db_option->prepare($sql_option);
                    $stmt_option->execute(array(
                        $feedbackId,
                        $questionId,
                        $option['option']
                    ));
                }
                //save essay question format
                else if(isset($option['value'])){
                    $db_essay = DatabaseUtil::getConn();
                    $sql_essay = "INSERT INTO user_feedback_logs(user_feedback_id, question_id, value)
                                    VALUES (?, ?, ?)";
                    $stmt_essay = $db_essay->prepare($sql_essay);
                    $stmt_essay->execute(array(
                        $feedbackId,
                        $questionId,
                        $option['value']
                    ));
                }
            }
            return $feedbackId;
        } catch (Exception $e){
            return $e;
        }
    }
}