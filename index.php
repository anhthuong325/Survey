<?php
include 'enums/UserType.php';
session_start();

if (!in_array($_SESSION['ROLE'], array(UserType::ADMIN, UserType::STUDENT))) {
  header("Location: login.php");
  die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fa fa-book" aria-hidden="true"></i> Chủ đề
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-question" aria-hidden="true"></i>
                            Câu hỏi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-desktop"></i> Khảo sát
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fa fa-bar-chart"></i> Thống kê phản hồi
                        </a>
                    </li>
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
        <?php include 'views/surveys/question.php'; ?>
    </div>
</div>

<?php include 'views/layouts/page_footer.php';?>
</body>
</html>