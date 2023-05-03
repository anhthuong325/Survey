<?php
include 'utils/authenticateUtil.php';

session_start();

// logout
if (isset($_GET['logout'])) {
    session_unset();
    $_SESSION = array();
    unset($_SESSION['USER_ACCOUNT']);
    unset($_SESSION['USER_NAME']);
    unset($_SESSION['ROLE']);
    unset($_SESSION['PASSWORD']);
    session_destroy();
    header("Location: login.php");
    die();
}
// login
if (isset($_POST['userLogin']) && isset($_POST['userPassword'])) {
    $username = $_POST['userLogin'];
    $password = $_POST['userPassword'];
    $data = Authenticate::authenticateUser($username, $password);
    if($data == null) {
        $error = "You are not authorized to access. Please contact admin for help!";
    } else {
        // login succeed
        if($data['ROLE'] == 1){
            $_SESSION['USER_ACCOUNT']   = $data['ACCOUNT'];
            $_SESSION['USER_NAME']      = $data['NAME'];
            $_SESSION['ROLE']           = $data['ROLE'];
            header("Location: index.php");
            die();
        }
        else if($data['ROLE'] == 2 || $data['ROLE'] == 3 || $data['ROLE'] == 4) {
            $_SESSION['USER_ACCOUNT']   = $data['ACCOUNT'];
            $_SESSION['USER_NAME']      = $data['NAME'];
            $_SESSION['ROLE']           = $data['ROLE'];
            header("Location: surveys.php");
            die();
        }
        else {
            header("Location: login.php");
            die();
        }
    }
}
?>
<html>
<head>
    <title>Survey | Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">

    <!-- JS -->
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>

</head>
<body>

<section class="vh-100">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="assets/img/symbol.png"
                     class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1 mb-5">

                <div class="d-flex align-items-center mb-3 pb-1">
                    <span class="h3 fw-bold mb-0" style="color: cornflowerblue">Khảo sát <br> Đại học Phú Yên</span>
                    <img src="assets/img/online-survey.ico"
                         class="img-fluid" alt="Sample image">
                </div>

                <h6 class="fw-normal" style="text-align:right; letter-spacing: 1px;">Đăng nhập vào tài khoản của bạn</h6>
                <?php if(isset($_SESSION['success']) && $_SESSION['success'] == 'CREATE_SUCCESS'){ ?>
                    <div class="alert alert-success" role="alert" id="notifyRegisterUser">
                        TTạo tài khoản thành công! Mời bạn đăng nhập vào hệ thống.
                    </div>
                <?php } ?>
                    <form action="login.php" method="post">

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Tài khoản</label>
                            <input type="text" name="userLogin" class="form-control form-control-lg"
                                   placeholder="Nhập tên tài khoản" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4">Mật khẩu</label>
                            <input type="password" name="userPassword" class="form-control form-control-lg"
                                   placeholder="Nhập mật khẩu" />
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <p class="small fw-bold mt-2 pt-1 mb-0">Đã có tài khoản? <a href="register.php"
                                                                                        class="link-danger">Đăng ký</a></p>
                        </div>

                        <div class="text-center text-lg-start mt-sm-3 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng nhập</button>
                            <?php if(isset($error)) { ?>
                                <div class="text-center text-danger pt-4"><?php echo $error; ?></div>
                            <?php } ?>
                        </div>

                    </form>

            </div>
        </div>
    </div>
</section>
</body>
<?php include 'views/layouts/page_footer.php';?>
</html>