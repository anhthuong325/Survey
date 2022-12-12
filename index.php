<?php
include 'enums/UserType.php';
session_start();

if (!in_array($_SESSION['ROLE'], array(UserType::ADMIN, UserType::STUDENT))) {
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
        'name'=>'Câu hỏi'
    ),
    array(
        'title'=>"SurveyForms",
        'icon'=>'<i class="fa fa-pencil-square-o"></i>',
        'name'=>'Mẫu khảo sát'
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
</head>
<body>
<?php include 'views/layouts/page_header.php';?>

<div class="container-fluid">
    <div class="row">
        <aside class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">

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
            if ($current_tab == "Questions") {
                include 'views/surveys/question.php';
            }
         ?>
    </div>
</div>

<?php include 'views/layouts/page_footer.php';?>
</body>
</html>