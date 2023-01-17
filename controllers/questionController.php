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
}