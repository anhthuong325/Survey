<?php
session_start();
include 'utils/authenticateUtil.php';

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

if(isset($_SESSION['USER_ACCOUNT'])) {
    header("Location: user.php");
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
        $_SESSION['USER_ACCOUNT']   = $data['ACCOUNT'];
        $_SESSION['USER_NAME']      = $data['NAME'];
        $_SESSION['ROLE']           = $data['ROLE'];
        header("Location: index.php");
        die();
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
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

                <div class="d-flex align-items-center mb-3 pb-1">
                    <img src="assets/img/online-survey.ico"
                         class="img-fluid" alt="Sample image">
                    <span class="h3 fw-bold mb-0" style="color: cornflowerblue">Kh???o s??t ?????i h???c Ph?? Y??n</span>
                </div>

                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">????ng nh???p v??o t??i kho???n c???a b???n</h5>

                    <form action="login.php" method="post">

                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">T??i kho???n</label>
                            <input type="text" name="userLogin" class="form-control form-control-lg"
                                   placeholder="Nh???p t??n t??i kho???n" />
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4">M???t kh???u</label>
                            <input type="password" name="userPassword" class="form-control form-control-lg"
                                   placeholder="Nh???p m???t kh???u" />
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                <label class="form-check-label" for="form2Example3">
                                    Ghi nh???
                                </label>
                            </div>
                            <a href="#!" class="text-body">Qu??n m???t kh???u?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg"
                                    style="padding-left: 2.5rem; padding-right: 2.5rem;">????ng nh???p</button>
                            <?php if(isset($error)) { ?>
                                <div class="text-center text-danger pt-4"><?php echo $error; ?></div>
                            <?php } ?>
                            <p class="small fw-bold mt-2 pt-1 mb-0">???? c?? t??i kho???n? <a href="register.php"
                                                                                              class="link-danger">????ng k??</a></p>
                        </div>

                    </form>

            </div>
        </div>
    </div>
    <?php include 'views/layouts/page_footer.php';?>
</section>

</body>
</html>