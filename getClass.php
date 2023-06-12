<?php
include 'controllers/questionController.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $arrClass = QuestionController::getListClass($id);
    echo json_encode($arrClass);
}
?>