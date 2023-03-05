<?php
include 'controllers/clientController.php';

if(isset($_GET['id'])){
    $arrQuestion = ClientController::getDetailSurvey($_GET['id']);
    print_r($arrQuestion);
}
?>