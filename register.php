<?php
include 'controllers/clientController.php';

$arrDepartment = ClientController::getAllDepartments();
$arrClass = ClientController::getAllClasses();

if(isset($_POST['userName']) && isset($_POST['fullName']) && isset($_POST['birthday']) &&
    isset($_POST['email']) && isset($_POST['password']) && isset($_POST['opUser'])
    && isset($_POST['departmentId']) && isset($_POST['classId'])) {
    //
    $userName = $_POST['userName'];
    $fullName = $_POST['fullName'];
    $roleId = (int)$_POST['opUser'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];
    $password = $_POST['password'];
    $departmentId = $_POST['departmentId'];
    $classId = $_POST['classId'];
    // role = 1 is Student
    // role = 2 is Teacher
    // role = 3 is User
    if ($roleId == 1) {
        $result = ClientController::registerUser($userName, $fullName, $roleId, $email, $birthday, $password, $classId, $departmentId);
        if ($result > 0) {
            $notifySuccess = "Chúc mừng Sinh viên " . $fullName . " đã đăng ký thành công!";
        }
        else {
            $notifyFalse = "Lỗi! Đăng ký không thành công!";
        }
    }
    if ($roleId == 2) {
        $result = ClientController::registerUser($userName, $fullName, $roleId, $email, $birthday, $password, null, $departmentId);
        if ($result > 0) {
            $notifySuccess = "Chúc mừng Giáo viên " . $fullName . " đã đăng ký thành công!";
        }
        else {
            $notifyFalse = "Lỗi! Đăng ký không thành công!";
        }
    }
    if ($roleId == 3) {
        $result = ClientController::registerUser($userName, $fullName, $roleId, $email, $birthday, $password, null, null);
        if ($result > 0) {
            $notifySuccess = "Chúc mừng người dùng " . $fullName . " đã đăng ký thành công!";
        }
        else {
            $notifyFalse = "Lỗi! Đăng ký không thành công!";
        }
    }
}

?>
<html>
<head>
    <title>Survey | Register</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    
    <!-- JS -->
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>

</head>
<body style="background-color: #9fcdff">

<div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">

        <!-- Section: Design Block -->
        <section class="text-center">
            <!-- Background image -->
            <div class="p-5 bg-image" style="
                margin-top: -70px;
                background-image: url('assets/img/express.png');
                height: 350px;
                border-radius:10px;
                /*background-repeat:no-repeat;*/
                /*margin-bottom:100px;*/
                "></div>
            <!-- Background image -->

            <div class="card mx-4 shadow-5-strong" style="
                margin-top: -100px;
                background: hsla(0, 0%, 100%, 0.8);
                backdrop-filter: blur(30px);
                width:1000px;
                margin-bottom: 30px;
                ">
                <div class="card-body py-5 px-md-5">

                    <div class="row d-flex justify-content-center" id="formRegisterUser">
                        <div class="col-lg-8">
                            <?php if(isset($notifySuccess)){ ?>
                                <div class="alert alert-success" role="alert" id="notifyRegisterUser">
                                    <?php echo $notifySuccess; ?>
                                </div>
                            <?php } ?>
                            <?php if(isset($notifyFalse)){ ?>
                                <div class="alert alert-danger" role="alert" id="notifyRegisterUser">
                                    <?php echo $notifyFalse; ?>
                                </div>
                            <?php } ?>
                            <h2 class="fw-bold mb-4">Đăng ký tài khoản khảo sát</h2>
                            <form action="" method="post">
                                <div class="form-group">
                                    <input type="text" name="userName" class="form-control" id="" aria-describedby="emailHelp" placeholder="Nhập tên tài khoản">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="fullName" class="form-control" id="" placeholder="Họ và tên của bạn">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="date" name="birthday" placeholder="dd-mm-yyyy" value="" min="1960-01-01" max="<?php echo date("Y-m-d");?>">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="" placeholder="Nhập địa chỉ email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" id="" placeholder="Nhập mật khẩu">
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 form-check">
                                        <label class="radio-inline">
                                            <input class="form-check-input" type="radio" name="opUser" id="opStudent" value="1"><i class="fa fa-address-book-o ml-2" aria-hidden="true"></i> Sinh viên</label>
                                        <label class="radio-inline ml-4 mr-4">
                                            <input class="form-check-input" type="radio" name="opUser" id="opTeacher" value="2"><i class="fa fa-users ml-2" aria-hidden="true"></i> Giảng viên</label>
                                        <label class="radio-inline">
                                            <input class="form-check-input" type="radio" name="opUser" id="opUser" checked value="3"><i class="fa fa-mercury ml-2" aria-hidden="true"></i> Khác</label>
                                    </div>
                                </div>
                                <div class="form-group selectDepartment" hidden>
                                    <select class="custom-select" name="departmentId">
                                        <option value="0" selected>Chọn khoa của bạn</option>
                                        <?php foreach ($arrDepartment as $row){ ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['departmentName']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group selectClass" hidden>
                                    <select class="custom-select" name="classId">
                                        <option value="0" selected>Chọn lớp của bạn</option>
                                        <?php foreach ($arrClass as $row){ ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['className']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" id="btnRegist">Xác nhận đăng ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Design Block -->
    </div>
</div>
<?php include 'views/layouts/page_footer.php';?>
</body>
</html>
<script>
    $('#notifyRegisterUser').delay(3000).fadeOut();
    $('.form-check-input').click(function() {
        if($('#opStudent').is(':checked')){
            $(".selectDepartment").removeAttr("hidden");
            $(".selectClass").removeAttr("hidden");
        }
        if($('#opTeacher').is(':checked')){
            $(".selectDepartment").removeAttr("hidden");
            if ($(".selectClass").css("visibility") === "visible") {
                $(".selectClass").attr("hidden", true);
            }
        }
        if($('#opUser').is(':checked')){
            if ($(".selectDepartment").css("visibility") === "visible") {
                $(".selectDepartment").attr("hidden", true);
            }
            if ($(".selectClass").css("visibility") === "visible") {
                $(".selectClass").attr("hidden", true);
            }
        }
    });
</script>