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
    session_destroy();
    header("Location: login.php");
    die();
}

if(isset($_SESSION['USER_ACCOUNT'])) {
    header("Location: index.php");
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
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- JS -->
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="container">
                <h4 class="text-center" style="margin-top:20px;">
                    <div style="font-size: 40px;">User Login</div>
                </h4>
                <div class="card-body">
                    <p class="text-muted"></p>
                    <form action="login.php" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-user-o" aria-hidden="true"></i>
                                </span>
                            </div>
                            <input type="text" name="userLogin" class="form-control" placeholder="username" />
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                            </div>
                            <input type="password" name="userPassword" class="form-control" placeholder="password" />
                        </div>
                        <button type="submit" class="btn btn-success btn-block" style="font-size:1.2em;">Login</button>
                        <?php if(isset($error)) { ?>
                            <div class="text-center text-danger pt-4"><?php echo $error; ?></div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>