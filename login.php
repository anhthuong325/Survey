<?php
include 'utils/databaseUtil.php';

if(isset($_POST['userName']) && isset($_POST['password'])){
    $db = databaseUtil::getConn();
    $query = "SELECT * FROM users WHERE user_name = :userName AND password = :pass";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':userName', $_POST['userName'], PDO::PARAM_STR);
    $stmt->bindParam(':pass', $_POST['password'], PDO::PARAM_STR);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $users = $stmt->fetchAll();
    if($users){
        header("Location: index.php");
    }
    if(!$users ) {
        $error = "User name hoặc password bạn nhập không đúng!";
    }
}
?>
<html lang="en">
<head>
    <title>Login</title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.slim.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
</head>
<body>
<div class="login-form" >
    <form action="" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">User name</label>
            <input type="text" name="userName" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary float-right">Login</button>
        <?php if(isset($error)) { ?>
            <div class="text-center text-danger pt-4" id="noticationLogin" type="hidden"><?php echo $error; ?></div>
        <?php } ?>
    </form>
</div>
</body>
</html>