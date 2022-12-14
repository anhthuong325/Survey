<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!--important link source from "https://bootstrapious.com/p/about-us-page"-->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/main.css">

    <script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
</head>
<body>
<?php include 'views/students/layouts/page_header.php';?>

<div class="container-fluid">
    <div class="row">
        <aside class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <?php include 'views/students/layouts/tagsiteclient.php';?>
                <h6 class="sidebar-heading">
                    <span>Khung hệ thống | Cập nhật tin tức</span>
                </h6>
                <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
                    <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link" href="#">
                                <span class="nav-icon"><i class="fa fa-home"></i></span>
                                <span class="nav-link-text">Trang chủ</span>
                            </a><!--//nav-link-->
                        </li><!--//nav-item-->
                        <li class="nav-item">
                            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                            <a class="nav-link" href="#">
                                <span class="nav-icon"><i class="fa fa-pencil-square-o"></i></span>
                                <span class="nav-link-text">Khảo sát đánh giá</span>
                            </a><!--//nav-link-->
                        </li><!--//nav-item-->
                    </ul><!--//app-menu-->
                </nav><!--//app-nav-->

                <h6 class="sidebar-heading">
                    <span>Danh mục người dùng</span>
                </h6>

                <ul class="nav flex-column">
                    <a class="nav-link" href="#">
                        <i class="fa fa-user-o"></i> Hồ sơ thông tin</i>
                    </a>
                    <li class="nav-item"><a class="nav-link" href="../../login.php?logout=true"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>

            </div>
        </aside>

        <div class="container pt-6">

            <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="container-xl">

                    <h1 class="app-page-title"><span class="nav-icon"><i class="fa fa-file"></i></span> Biểu mẫu khảo sát hiện hành</h1>


                    <div class="row g-4 mb-4">
                        <div class="col-12 col-md-12">
                            <div class="app-card app-card-settings shadow-sm p-4">
                                <div class="app-card-body">
                                    <form class="settings-form">
                                        <div class="mb-3">
                                            <label for="setting-input-3" class="form-label bg-info">Chủ đề 2</label>
                                            <div class="mb-3">
                                                <label for="setting-input-2" class="form-label">Câu hỏi của Chủ đề 2</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Lựa chọn 1
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        Lựa chọn 2
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        Lựa chọn 3
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        Lựa chọn 4
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="setting-input-3" class="form-label bg-info">Chủ đề 3</label>
                                                <div class="mb-3">
                                                    <label for="setting-input-2" class="form-label">Câu hỏi của Chủ đề 3</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                        </div>
                                    </form>
                                </div><!--//app-card-body-->

                            </div><!--//app-card-->
                        </div>
                    </div><!--//row-->
                </div><!--//container-fluid-->
            </div><!--//app-content-->

        </div><!--//container pt-3-->


    </div>
</div>

<?php include 'views/students/layouts/page_footer.php';?>
</body>
</html>