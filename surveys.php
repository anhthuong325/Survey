<?php
include 'controllers/clientController.php';
include 'enums/UserType.php';

error_reporting(0);
session_start();

if (!in_array($_SESSION['ROLE'], array(UserType::STUDENT, UserType::TEACHER, UserType::USER))) {
    header("Location: login.php");
    die();
}

$tabs = array(
    array(
    'title'=>"Surveys",
    'icon'=>'<i class="fa fa-pencil-square-o"></i>',
    'name'=>'Khảo sát đánh giá'
    )
);
$current_tab = isset($_GET['tab']) ? $_GET['tab'] : $tabs[0]['title'];

//index form
if(isset($_SESSION['USER_ACCOUNT'])){
    $userName = $_SESSION['USER_ACCOUNT'];
    $arrForm = ClientController::getListSurvey($userName);
}

//type form survey
$idForm = 0;
$arrForms = array();
if(isset($_GET['id'])) {
    $idForm = $_GET['id'];
    $arrForms = ClientController::getDetailSurvey($idForm);
    //
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method === 'POST') {
        $arrFeedBack = array();
        $arrFeedBack['formSurveyId'] = $arrForms['surveyId'];
        foreach ($arrForms['questions'] as $questionId => $question) {
            $item = array();
            if (isset($_POST[$questionId . 'option'])) {
                $item['option'] = $_POST[$questionId . 'option'];
            }
            if (isset($_POST[$questionId . 'optionText'])) {
                $item['value'] = $_POST[$questionId . 'optionText'];
            }
            $arrFeedBack['feedback'][$questionId] = $item;
        }
        if ($arrFeedBack['formSurveyId'] = $idForm) {
            //submit thành công
            $result = ClientController::saveFeedbackUser($arrFeedBack);
            if ($result > 0) {
                $_SESSION['success'] = 'SUCCESS';
                $notifySuccess = "Form " . $arrForms['title'] . " đã ghi lại các phản hồi!";
                header("Location: surveys.php?tab=Surveys&notification=".$notifySuccess);
            } else {
                //thất bại
                $_SESSION['ERROR'] = 'ERROR';
                $notifyFalse = "Lỗi! Đăng ký không thành công!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!--important link source from "https://bootstrapious.com/p/about-us-page"-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'views/layouts/page_header.php';?>

<div class="container-fluid">
    <div class="row">
        <aside class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <?php include 'views/layouts/tagsiteclient.php';?>
                <h6 class="sidebar-heading">
                    <span>Khung hệ thống</span>
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
                    <span>Danh mục người dùng</span>
                </h6>
                <ul class="nav flex-column">
                    <a class="profile" href="profile.php">
                        <div class="welcome-message"
                             style= "display: inline-flex;
                                          background-color: #f5f5f5;
                                          padding-top: 5px;
                                          padding-left: 10px;
                                          padding-right: 10px;
                                          margin-top: 10px;">
                            <p>Xin chào, <span class="username" style="color: #007bff;font-weight: bold;"><?php echo $_SESSION['USER_NAME']; ?></span></p>
                        </div>
                    </a>
                    <li class="nav-item"><a class="nav-link" href="./login.php?logout=true"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
            </div>
        </aside>
        <?php
            if($current_tab == "Surveys"){
                if(isset($_GET['id'])){
                    include 'views/users/typeForm.php';
                } else {
                    include 'views/users/index.php';
                }
            }
        ?>
    </div>
</div>

<script>
    $('#idChuDe').change(function() {
        submitForm();
    });
    function submitForm() {
        document.getElementById("formListQuestion").submit();
    }
    $('#notifysaveFeedBack').delay(3000).fadeOut();
</script>
<?php include 'views/layouts/page_footer.php';?>
</body>
</html>