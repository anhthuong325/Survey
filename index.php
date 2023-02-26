<?php
include 'enums/UserType.php';
include 'utils/databaseUtil.php';
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
        'title'=>"CreateQuestions",
        'icon'=>'<i class="fa fa-plus" aria-hidden="true"></i>',
        'name'=>'Tạo câu hỏi'
    ),
    array(
        'title'=>"CreateSurveyForms",
        'icon'=>'<i class="fa fa-pencil-square-o" aria-hidden="true"></i>',
        'name'=>'Tạo form khảo sát'
    )
);
$current_tab = isset($_GET['tab']) ? $_GET['tab'] : $tabs[0]['title'];
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
                    <span>Danh mục người dùng</span>
                </h6>

                <ul class="nav flex-column">
                    <a class="nav-link" href="#">
                        <i class="fa fa-user-o"></i> Hồ sơ thông tin</i>
                    </a>
                    <li class="nav-item"><a class="nav-link" href="./login.php?logout=true"><i class="fa fa-sign-out"></i> Logout</a></li>
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
</script>