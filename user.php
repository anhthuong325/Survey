<?php
include 'enums/UserType.php';
session_start();

if (!in_array($_SESSION['ROLE'], array(UserType::STUDENT))) {
    header("Location: login.php");
    die();
}
$tabs = array(
    array(
    'title'=>"News",
    'icon'=>'<i class="fa fa-home"></i>',
    'name'=>'Cập nhật tin tức'
    ),
    array(
    'title'=>"Surveys",
    'icon'=>'<i class="fa fa-pencil-square-o"></i>',
    'name'=>'Khảo sát đánh giá'
    ),
    array(
        'title'=>"History",
        'icon'=>'<i class="fa fa-history"></i>',
        'name'=>'Lịch sử khảo sát'
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
                    <a class="nav-link" href="#">
                        <i class="fa fa-user-o"></i> Hồ sơ thông tin</i>
                    </a>
                    <li class="nav-item"><a class="nav-link" href="./login.php?logout=true"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>

            </div>
        </aside>
        <?php
        if ($current_tab == "News") {
            include 'views/surveys/news.php';
        }
        if ($current_tab == "Surveys") {
            include 'views/surveys/clientSurvey.php';
        }
        if ($current_tab == "History") {
            include 'views/surveys/statistic.php';
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
</script>

<?php include 'views/layouts/page_footer.php';?>
</body>
</html>