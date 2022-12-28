<?php
include 'controllers/clientController.php';

$arrKhoa = ClientController::getAllKhoa();
$arrLop = ClientController::getAllLop();

$status = 0;

if(isset($_POST['textUsername']) && isset($_POST['textFullname']) &&
    isset($_POST['optRoleRadio']) && isset($_POST['textEmail']) && isset($_POST['textPassword'])
    || isset($_POST['lopHoc']) || isset($_POST['khoaGV']) || isset($_POST['khoaSV'])){
    $userName = $_POST['textUsername'];
    $fullName = $_POST['textFullname'];
    $idRole = $_POST['optRoleRadio'];
    $email = $_POST['textEmail'];
    $password = $_POST['textPassword'];
    $idKhoa = isset($_POST['khoaSV']) && $_POST['khoaSV'] != '0' ? $_POST['khoaSV'] : 0;
    $idLop = isset($_POST['lopHoc']) && $_POST['lopHoc'] != '0' ? $_POST['lopHoc'] : 0;
    if($idKhoa == 0){
        $idKhoa = isset($_POST['khoaGV']) && $_POST['khoaGV'] != '0' ? $_POST['khoaGV'] : 0;
    }
    if($userName != "" && $fullName != "" && $email != "" && $password != "" && $idRole > 1){
        $result = ClientController::registerUser($userName, $fullName, $idRole, $email, $password, $idLop, $idKhoa, $status);
        if($result > 0){
            $notifySuccess = "Đăng ký thành công!";
        }
    } else {
        $notifyFalse = "Lỗi! Đăng ký không hợp thành.";
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
                                <input type="hidden" value="0" id="khoaSV" name="khoaSV">
                                <input type="hidden" value="0" id="khoaGV" name="khoaGV">
                                <input type="hidden" value="0" id="lopHoc" name="lopHoc">
                                <div class="form-group">
                                    <input type="text" name="textUsername" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên tài khoản">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="textFullname" class="form-control" id="exampleInputPassword1" placeholder="Họ và tên của bạn">
                                </div>


                                <h5 class="mb-2 pb-1">Lựa chọn nhân vật: </h5>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label class="radio-inline"><input type="radio" name="optRoleRadio" id="opOne" value="2"><i class="fa fa-address-book-o ml-2" aria-hidden="true"></i> Sinh viên</label>
                                        <label class="radio-inline ml-4 mr-4"><input type="radio" name="optRoleRadio" id="opTwo" value="3"><i class="fa fa-users ml-2" aria-hidden="true"></i> Giảng viên</label>
                                        <label class="radio-inline"><input type="radio" name="optRoleRadio" id="opThree" checked value="4"><i class="fa fa-mercury ml-2" aria-hidden="true"></i> Khác</label>
                                    </div>
                                </div>
                                <div class="form-group" id="optionOneDiv" hidden>
                                    <select class="custom-select selectLop" name="idLop" id="optionOne" style="margin-bottom:15px;">
                                        <option value="0" selected>Chọn lớp của bạn</option>
                                        <?php foreach ($arrLop as $row) { ?>
                                            <option value="<?php echo $row['id']; ?>" ><?php echo $row['tenLop']; ?></option>
                                        <?php } ?>
                                    </select>
<!--                                    <input class="form-control" type="text" name="textClass" id="optionOne" placeholder="Nhập lớp cho sinh viên"><br>-->
                                    <select class="custom-select selectKhoaSV" name="idKhoa" id="optionTwo">
                                        <option value="0" selected>Chọn khoa trực thuộc của bạn</option>
                                        <?php foreach ($arrKhoa as $row) { ?>
                                            <option value="<?php echo $row['id']; ?>" ><?php echo $row['tenKhoa']; ?></option>
                                        <?php } ?>
                                    </select>
<!--                                    <input class="form-control" type="text" name="textApartment" id="optionOne" placeholder="Khoa trực thuộc của bạn">-->
                                </div>
                                <div class="form-group" id="optionTwoDiv" hidden>
                                    <select class="custom-select selectKhoaGV" name="idKhoa" id="optionTwo">
                                        <option value="0" selected>Chọn khoa trực thuộc của bạn</option>
                                        <?php foreach ($arrKhoa as $row) { ?>
                                            <option value="<?php echo $row['id']; ?>" ><?php echo $row['tenKhoa']; ?></option>
                                        <?php } ?>
                                    </select>
<!--                                    <input class="form-control" type="text" name="textApartment" id="optionTwo" placeholder="Khoa trực thuộc đối với giảng viên">-->
                                </div>
                                <div class="form-group" id="optionThreeDiv" hidden>
                                    <label class="control-label col-sm-3">Khác: <sup class="req">*</sup></label>
                                    <input class="form-control" type="text" name="textDifferent" id="optionThree">
                                </div>

                                <div class="form-group">
                                    <input type="email" name="textEmail" class="form-control" id="exampleInputPassword1" placeholder="Nhập địa chỉ email">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="textPassword" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu">
                                </div>
                                <button type="submit" class="btn btn-primary" id="btnRegist">Xác nhận đăng ký</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Design Block -->
    </div>
</div>

<script type="text/javascript">
    $('input[name="optRoleRadio"]:radio').change(function () {
        $('#optionOneDiv').toggle(this.id == 'opOne').removeAttr("hidden");
        $('#optionTwoDiv').toggle(this.id == 'opTwo').removeAttr("hidden");
        $('#optionThreeDiv').toggle(this.id == 'opThree');
    });
    $('#btnRegist').click(function() {
        const lopHoc = $('.selectLop :selected').val();
        const khoaSV = $('.selectKhoaSV :selected').val();
        const khoaGV = $('.selectKhoaGV :selected').val();

        $('#lopHoc').val(lopHoc);
        $('#khoaSV').val(khoaSV);
        $('#khoaGV').val(khoaGV);
    });
</script>

<?php include 'views/layouts/page_footer.php';?>
</body>
</html>