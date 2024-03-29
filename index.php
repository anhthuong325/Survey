<?php
include 'controllers/questionController.php';
include 'enums/UserType.php';

error_reporting(0);
session_start();

if (!in_array($_SESSION['ROLE'], array(UserType::ADMIN))) {
    header("Location: login.php");
    die();
}
$tabs = array(
    array(
        'title'=>"Topics",
        'icon'=>'<i class="fa fa-book" aria-hidden="true"></i>',
        'name'=>"Chủ đề"
    ),
    array(
        'title'=>"Questions",
        'icon'=>'<i class="fa fa-question" aria-hidden="true"></i>',
        'name'=>'Danh sách câu hỏi'
    ),
    array(
        'title'=>"SurveyForms",
        'icon'=>'<i class="fa fa-window-maximize" aria-hidden="true"></i>',
        'name'=>'Form khảo sát'
    ),
    array(
        'title'=>"Users",
        'icon'=>'<i class="fa fa-users" aria-hidden="true"></i>',
        'name'=>'Quản lý người dùng'
    )
);

$current_tab = isset($_GET['tab']) ? $_GET['tab'] : $tabs[0]['title'];

//TODO: get list department and class (done)
$arrDepartment = QuestionController::getListDepartments();
$arrClass = QuestionController::getListClass(0);

//TODO: Create Topic (done)
$arrTopics = QuestionController::getAllTopics();
$userName = $_SESSION['USER_ACCOUNT'];
if(isset($_POST['contentTopic'])){
    $topic = $_POST['contentTopic'];
    $result = QuestionController::saveTopic($topic, $userName);
    if($result > 0){
        $_SESSION['success'] = 'CREATE_SUCCESS';
        header("Location: ?tab=Topics");
        die();
    }
    else {
        $_SESSION['FALSE'] = 'CREATE_FALSE';
    }
    $arrTopics = QuestionController::getAllTopics();
}

//TODO: Remove topics (done)
if(isset($_POST['topicIdRemove'])) {
    $result = QuestionController::removeTopic($_POST['topicIdRemove']);
    if($result > 0){
        $_SESSION['success'] = 'REMOVE_SUCCESS';
        header("Location: ?tab=Topics");
        die();
    } else {
        $_SESSION['false'] = 'REMOVE_FALSE';
    }
}

//TODO: Features
$topicId = 0;
$arrQuestions = array();
if(isset($_GET['topicId'])){
    $topicId = $_GET['topicId'];
    $arrQuestions = QuestionController::getListQuestion($_GET['topicId']);

    //TODO: Lấy dữ liệu đã submit (done)
    if(isset($_POST['contentQuestion']) && isset($_POST['optionType']) && isset($_POST['numberOption'])){
        $content = $_POST['contentQuestion'];
        $option = (int)$_POST['optionType'];
        $number = 0;
        $op1 = $op2 = $op3 = $op4 = $op5 = $op6 = "";
        if($content != "" && $option == 0){
            $number = (int)$_POST['numberOption'];
            if($number == 2){
                $op1 = $_POST['option1'];
                $op2 = $_POST['option2'];
            }
            if($number == 4){
                $op1 = $_POST['option1'];
                $op2 = $_POST['option2'];
                $op3 = $_POST['option3'];
                $op4 = $_POST['option4'];
            }
            if($number == 6){
                $op1 = $_POST['option1'];
                $op2 = $_POST['option2'];
                $op3 = $_POST['option3'];
                $op4 = $_POST['option4'];
                $op5 = $_POST['option5'];
                $op6 = $_POST['option6'];
            }
        }
        //TODO: Cập nhật câu hỏi (done)
        if(isset($_POST['editQuestionId'])) {
            $id = $_POST['editQuestionId'];
            $result = QuestionController::updateQuestion($id, $content, $op1, $op2, $op3, $op4, $op5, $op6, $number);
            if($result){
                $_SESSION['success'] = 'UPDATE_SUCCESS';
                header("Location: ?tab=Questions&topicId=".$topicId);
                die();
            } else {
                $_SESSION['false'] = 'UPDATE_FALSE';
                $notifyFalse = "Lỗi! Lưu không thành công.";
            }
        }
        //TODO: Thêm câu hỏi mới (done)
        else {
            $result = QuestionController::saveQuestion($content, $topicId, $op1, $op2, $op3, $op4, $op5, $op6, $number);
            if($result){
                $_SESSION['success'] = 'INSERT_SUCCESS';
                header("Location: ?tab=CreateQuestions&topicId=".$topicId);
                die();
            }
            else {
                $_SESSION['false'] = 'CREATE_FALSE';
            }
        }
    }

    //TODO: Remove câu hỏi (done)
    if(isset($_POST['questionIdRemove'])){
        $result = QuestionController::removeQuestion($_POST['questionIdRemove'], $topicId);
        if($result){
            $_SESSION['success'] = 'REMOVE_SUCCESS';
            header("Location: ?tab=Questions&topicId=".$topicId);
            die();
        }
        else {
            $_SESSION['false'] = 'REMOVE_FALSE';
        }
    }

    //TODO: Create FormSurvey (done)
    //xử lí lưu form
    if(isset($_POST['titleForm']) && isset($_POST['departmentSurvey']) && isset($_POST['classSurvey'])
        && isset($_POST['startDate']) && isset($_POST['endDate'])){
        $title = $_POST['titleForm'];
        $departmentId = $_POST['departmentSurvey'];
        $classId = $_POST['classSurvey'];
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        //
        $arrQuestionForm = array();
        foreach($arrQuestions as $item) {
            if(isset($_POST['checkRemove'.$item['id']])){
                $arrQuestionForm[$item['id']] = $_POST['checkRemove'.$item['id']];
            } else {
                $arrQuestionForm[$item['id']] = 1;
            }
        }
        //
        $allUser = 1;// disable get all user
        if($departmentId == 0 && $classId == 0){
            $allUser = 0;// enable get all user
        }
        $result = QuestionController::saveFormSurvey($title, $topicId, $startDate, $endDate, $departmentId, $classId, $allUser, $arrQuestionForm);
        if($result > 0){
            $_SESSION['success'] = 'CREATE_SUCCESS';
            header("Location: index.php?tab=SurveyForms");
            die();
        } else {
            $_SESSION['false'] = 'CREATE_FALSE';
        }
    }
}

//Lấy danh sách khảo sát
$arrFormSurveys = QuestionController::getAllFormSurvey();

//TODO: Delete form survey (done)
if(isset($_POST['formSurveyIdRemove'])){
    $result = QuestionController::removeFormSurvey($_POST['formSurveyIdRemove']);
    if($result > 0){
        $_SESSION['success'] = 'REMOVE_SUCCESS';
        header('Location: index.php?tab=SurveyForms');
        die();
    } else {
        $_SESSION['success'] = 'REMOVE_FALSE';
    }
}

//TODO: Thống kê khảo sát theo số lượng (done)
if(isset($_GET['formId'])){
    $arrStatistics = QuestionController::statisticSurvey($_GET['formId']);
    $numberForm = 0;
    foreach ($arrStatistics as $question){
        if($question['number_option'] > 0){
            $numberForm = $question['number_option1']
                            + $question['number_option2']
                            + $question['number_option3']
                            + $question['number_option4']
                            + $question['number_option5']
                            + $question['number_option6'];
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo PROJECT_NAME; ?> | ADMIN</title>
    <link rel="icon" href="assets/img/logo.ico">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!--important link source from "https://bootstrapious.com/p/about-us-page"-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/axios.min.js"></script>

</head>
<body>
<?php include 'views/layouts/page_header.php';?>
<div class="container-fluid">
    <div class="row">
        <aside class="col-md-2 d-none d-md-block bg-light sidebar">

            <div class="sidebar-sticky">
                <?php include 'views/layouts/tagsiteadmin.php';?>
                <h6 class="sidebar-heading">
                    <span>Danh mục chính</span>
                </h6>

                <ul class="nav flex-column">
                    <?php foreach ($tabs as $tab) { ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $tab['title'] == $current_tab ? 'active' : ''; ?>" href="?tab=<?php echo $tab['title']; ?>">
                                <?php echo $tab['icon']."  ".$tab['name']; ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>

                <h6 class="sidebar-heading">
                    <span>Hệ thống</span>
                </h6>

                <ul class="nav flex-column">
                    <a class="profile" href="#">
                        <div class="welcome-message"
                             style="display: inline-flex;
                                    justify-content: center;
                                    align-items: center;
                                    background-color: #f5f5f5;
                                    padding-top: 5px;
                                    padding-left: 10px;
                                    padding-right: 10px;
                                    margin-top: 10px;">
                            <p><span class="username" style="color: brown;font-weight: bold;text-align:center;"><?php echo $_SESSION['USER_NAME']; ?></span></p>
                        </div>
                    </a>
                    <li class="nav-item"><a class="nav-link" href="./login.php?logout=true"><i class="fa fa-sign-out"></i> Đăng xuất</a></li>
                </ul>

            </div>
        </aside>
        <?php
            if($current_tab == "Topics"){
                include 'views/surveys/topic.php';
            }
            if($current_tab == "Questions"){
                include 'views/surveys/question.php';
            }
            if($current_tab == "CreateQuestions"){
                include 'views/surveys/createQuestion.php';
            }
            if($current_tab == "CreateSurveyForms"){
                include 'views/surveys/createFormSurvey.php';
            }
            if($current_tab == "SurveyForms"){
                include 'views/surveys/formSurvey.php';
            }
            if($current_tab == "Statistics"){
                include 'views/surveys/statisticsSurvey.php';
            }
            if($current_tab == "Users"){
                include 'views/surveys/users.php';
            }
         ?>
    </div>
</div>

<?php include 'views/layouts/page_footer.php';?>
</body>
</html>
<script>
    $('#notifySaveQuestion').delay(3000).fadeOut();
    $('#optionType').change(function () {
        const optionSelected = $(this).find("option:selected");
        let valueSelected  = parseInt(optionSelected.val());
        if(valueSelected === 0){
            $(".numberOption").removeAttr("hidden");
            const optionNumber = $("#inputNumber").find("option:selected");
            let numberOption = parseInt(optionNumber.val());
            if(numberOption === 2){
                $(".towOption").removeAttr("hidden");
                if ($(".fourOption").css("visibility") === "visible") {
                    $(".fourOption").attr("hidden", true);
                }
                if ($(".sixOption").css("visibility") === "visible") {
                    $(".sixOption").attr("hidden", true);
                }
            }
            if(numberOption === 4){
                $(".towOption").removeAttr("hidden");
                $(".fourOption").removeAttr("hidden");
                if ($(".sixOption").css("visibility") === "visible") {
                    $(".sixOption").attr("hidden", true);
                }
            }
            if(numberOption === 6){
                $(".towOption").removeAttr("hidden");
                $(".fourOption").removeAttr("hidden");
                $(".sixOption").removeAttr("hidden");
            }
        }
        if(valueSelected === 1) {
            $(".numberOption").attr("hidden", true);
            if ($(".towOption").css("visibility") === "visible") {
                $(".towOption").attr("hidden", true);
            }
            if ($(".fourOption").css("visibility") === "visible") {
                $(".fourOption").attr("hidden", true);
            }
            if ($(".sixOption").css("visibility") === "visible") {
                $(".sixOption").attr("hidden", true);
            }
        }
    });
    $('#inputNumber').change(function () {
        const optionNumber = $(this).find("option:selected");
        let numberOption = parseInt(optionNumber.val());
        if(numberOption === 2){
            $(".towOption").removeAttr("hidden");
            if ($(".fourOption").css("visibility") === "visible") {
                $(".fourOption").attr("hidden", true);
            }
            if ($(".sixOption").css("visibility") === "visible") {
                $(".sixOption").attr("hidden", true);
            }
        }
        if(numberOption === 4){
            $(".towOption").removeAttr("hidden");
            $(".fourOption").removeAttr("hidden");
            if ($(".sixOption").css("visibility") === "visible") {
                $(".sixOption").attr("hidden", true);
            }
        }
        if(numberOption === 6){
            $(".towOption").removeAttr("hidden");
            $(".fourOption").removeAttr("hidden");
            $(".sixOption").removeAttr("hidden");
        }
    });

    $('.slt-department').on('change', function() {
        var departmentId = this.value;
        axios({
            method: 'get',
            url:'<?= BASE_DOMAIN; ?>/getClass.php?id='+departmentId,
            header:{
                'Content-Type':'application/json'
            }
        }).then(function (response){
            const result = response.data;
            let htmls = "";
            if(result.length > 0){
                for(let row in result){
                    htmls += `<option value="${result[row].id}">${result[row].class_name}</option>`;
                }
                var sltClass = document.getElementById("classByDepartment");
                sltClass.innerHTML = htmls;
                if(sltClass.disabled){
                    sltClass.disabled = false;
                }
            } else {
                htmls = `<option value = "0">Không có lớp</option>`;
                document.getElementById("classByDepartment").innerHTML = htmls;
                document.getElementById("classByDepartment").disabled = true;
            }
        }).catch(function(error){
            console.log(error)
        })
    });
</script>