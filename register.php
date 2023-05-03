<?php
include 'controllers/clientController.php';

$arrDepartment = ClientController::getAllDepartments();
$arrClass = ClientController::getAllClass();

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
    // role = 2 is teacher
    // role = 3 is user
    if ($roleId == 1 || $roleId == 2 || $roleId == 3) {
        $result = ClientController::registerUser($userName, $fullName, $roleId, $email, $birthday, $password, $classId, $departmentId);
        if ($result > 0) {
            $_SESSION['success'] = 'CREATE_SUCCESS';
            header("Location: login.php");
            die();
        } else {
            $_SESSION['false'] = 'CREATE_FALSE';
        }
    } else {
        $_SESSION['error'] = 'ERRORS';
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
        <section class="vh-100">
            <!-- Background image -->
            <div class="p-5 bg-image" style="
                        margin-top: -80px;
                        padding-top: 70px;
                        background-image: url('assets/img/FunSurveyQuestions.png');
                        height: 250px;
                        border-radius: 10px;
                        background-repeat:no-repeat;
                        /*margin-bottom:1px;*/
                        "></div>
            <!-- Background image -->
            <div class="container-fluid h-custom">
                <div class="row d-flex justify-content-center align-items-center h-100">

                    <div class="card mx-4 shadow-5-strong" style="
                margin-top: -150px;
                background: hsla(0, 0%, 100%, 0.8);
                backdrop-filter: blur(30px);
                width:800px;
                padding-bottom: 3px;
                margin-bottom: 200px;
                ">
                        <div class="card-body py-5 px-md-5">

                            <div class="row d-flex justify-content-center" id="formRegisterUser">
                                <div class="col-lg-8">
                                    <?php if(isset($_SESSION['false']) && $_SESSION['false'] == 'CREATE_FALSE'){ ?>
                                        <div class="alert alert-success" role="alert" id="notifyRegisterUser">
                                            Tạo tài khoản không thành công!
                                        </div>
                                    <?php } ?>
                                    <?php if(isset($_SESSION['error']) && $_SESSION['error'] == 'ERRORS'){ ?>
                                        <div class="alert alert-success" role="alert" id="notifyRegisterUser">
                                            Có lỗi xảy ra, vui lòng thử lại!
                                        </div>
                                    <?php } ?>
                                    <h2 class="fw-bold mb-4">Đăng ký tài khoản khảo sát</h2>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <input type="text" name="userName" class="form-control" id="" aria-describedby="emailHelp" placeholder="Nhập tên tài khoản" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="fullName" class="form-control" id="" placeholder="Họ và tên của bạn" required>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" type="date" name="birthday" placeholder="dd-mm-yyyy" value="" min="1960-01-01" max="<?php echo date("Y-m-d");?>" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" id="" placeholder="Nhập địa chỉ email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" id="" placeholder="Nhập mật khẩu" required>
                                        </div>
                                        <div class="form-group" style="text-align: center">
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
                                                <?php foreach ($arrDepartment as $row){ ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['departmentName']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group selectClass" hidden>
                                            <select class="custom-select" name="classId">
                                                <?php if(count($arrClass) > 0) {
                                                    foreach ($arrClass as $class) { ?>
                                                        <option class="font-weight-bold" disabled><?= $class['departmentName']; ?></option>
                                                        <?php foreach ($class['class'] as $item) { ?>
                                                            <option value="<?php echo $item['id']; ?>">
                                                                <?php echo $item['className']; ?>
                                                            </option>
                                                        <?php } } } ?>
                                            </select>
                                        </div>
                                        <div class="text-center text-lg-start">
                                            <button type="submit" class="btn btn-primary" id="btnRegist">Xác nhận đăng ký</button>
                                        </div>
                                    </form>
                                    <div class="text-center font-weight-light">
                                        <a href="login.php">Đăng nhập</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Design Block -->
    </div>
</div>
</body>
<?php include 'views/layouts/page_footer.php';?>
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