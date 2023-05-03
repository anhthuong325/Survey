<?php
include 'enums/UserType.php';
include 'controllers/clientController.php';
session_start();

if (!in_array($_SESSION['ROLE'], array(UserType::STUDENT, UserType::TEACHER, UserType::USER))) {
    header("Location: login.php");
    die();
}

// Lấy thông tin của người dùng hiện tại từ session
$userName = $_SESSION['USER_NAME'];

// Lấy danh sách người dùng từ cơ sở dữ liệu
$users = clientController::getAllUsers();

// Kiểm tra xem request có phải là POST không
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['editIdUser'])) {
        // Lấy các giá trị từ form
        $id = $_POST['editIdUser'];
        $full_name = $_POST['fullName'];
        $email = $_POST['email'];
        $birthdate = $_POST['birthdate'];

        // Gọi phương thức updateUser để thực hiện truy vấn cập nhật thông tin user
        $result = clientController::updateUser($id, $full_name, $email, $birthdate);

        if ($result === true) {
            $notifySuccess = "User information updated successfully, please login back again";
        } else {
            $notifyFalse = "Error updating user information: " . $result->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Info</title>
    <!-- Thêm link đến các file CSS của Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</head>
<body>

<!-- Thêm header của trang web -->
<?php include 'views/layouts/page_header.php';?>

<!-- Thêm nội dung của trang web -->
<div class="container mt-5" style="
    margin-top: 150px;
    margin-bottom: 175px;
    padding-top: 130px;
    padding-bottom: 130px;
    background-color: #f7d7f8;
    height: 550px;
    border-radius: 10px;
    background-image: url('assets/img/LeadershipMythsM.png');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.5);
">

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-body" style="background-color: #0072C6 ">
                    <!-- Hiển thị thông tin của session đăng nhập -->
                    <h3 class="card-title" style="color: white; text-align: center">Thông tin người dùng</h3>
                    <h5 class="card-text" style="color: white">Tên đăng nhập: <?php echo $userName; ?></h5>
                    <?php foreach ($users as $user) {
                    if ($userName == $user['full_name']) {?>
                    <h5 class="card-text" style="color: white">Email: <?php echo $user['email']; ?></h5>
                    <h5 class="card-text" style="color: white">Ngày sinh nhật: <?php echo $user['birthdate']; ?></h5>
                    <?php } } ?>
                </div>
            </div>
            <div class="text-end pt-3">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#editModal">Chỉnh sửa</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal chỉnh sửa thông tin người dùng -->
<?php if(isset($notifySuccess)){ ?>
    <div class="alert alert-success" role="alert" id="notifySaveQuestion">
        <?php echo $notifySuccess; ?>
    </div>
<?php } ?>
<?php if(isset($notifyFalse)){ ?>
    <div class="alert alert-danger" role="alert" id="notifySaveQuestion">
        <?php echo $notifyFalse; ?>
    </div>
<?php } ?>
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Chỉnh sửa thông tin người dùng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Đóng">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form chỉnh sửa thông tin người dùng -->
                <?php foreach ($users as $user) {
                    if ($userName == $user['full_name']) {?>
                        <form method="post" action="" >
                            <div class="form-group">
                                <label for="inputFullName">Họ tên đầy đủ</label>
                                <input type="hidden" name="editIdUser" id="editIdUser" value="<?php echo $user['id']; ?>">
                                <input type="text" class="form-control" id="inputFullName" name="fullName" value="<?php echo $user['full_name']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Địa chỉ email</label>
                                <input type="email" class="form-control" id="inputEmail" name="email" value="<?php echo $user['email']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="inputBirthdate">Ngày sinh nhật</label>
                                <input type="date" class="form-control" id="inputBirthdate" name="birthdate" value="<?php echo $user['birthdate']; ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                            </div>
                        </form>
                    <?php }} ?>
            </div>
        </div>
    </div>
</div>


<!-- Thêm link đến các file JavaScript của Bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
<?php include 'views/layouts/page_footer.php';?>

</html>

