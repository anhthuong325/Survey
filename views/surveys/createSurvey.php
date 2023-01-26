<?php
include 'controllers/questionController.php';

$arrFormSurvey = QuestionController::getAllSurveys();
$arrTopic = QuestionController::getAllTopics();
$arrUser = QuestionController::getAllUsers();
$arrDepartment = QuestionController::getAllDepartments();
$arrClass = QuestionController::getAllClasses();


if(isset($_POST['formTitle']) && isset($_POST['topicId'])
    && isset($_POST['departmentId']) && isset($_POST['classId'])
    && isset($_POST['typeSch']) && isset($_POST['typeObj']) && isset($_POST['userId'])
    && isset($_POST['startTime']) && isset($_POST['endTime'])) {
    //
    $formTitle = $_POST['formTitle'];
    $topicId = $_POST['topicId'];

    $departmentId = (int)$_POST['typeSch'];
    $classId = (int)$_POST['typeSch'];
    // School = 1 is Department
    // School = 2 is Class

    $userId = (int)$_POST['typeObj'];
    // Object = 1 is Student
    // Object = 2 is Teacher
    // Object = 3 is User

    $startTime = $_POST['startTime'];
    $endTime = $_POST['endTime'];

    if ($departmentId == 1) {
        $departmentId = $_POST['departmentId'];
        $result = QuestionController::saveSurvey($formTitle, $topicId, $departmentId, null, $userId, $startTime, $endTime);
        if ($result > 0) {
            $notifySuccess = "Tạo lập khảo sát " . $formTitle . " gửi đến khoa thành công!";
        }
        else {
            $notifyFalse = "Lỗi! Tạo lập khảo sát không thành công!";
        }
    }
    if ($classId == 2) {
        $departmentId = $_POST['departmentId'];
        $classId = $_POST['classId'];
        $result = QuestionController::saveSurvey($formTitle, $topicId, $departmentId, $classId, $userId, $startTime, $endTime);
        if ($result > 0) {
            $notifySuccess = "Tạo lập khảo sát " . $formTitle . " gửi đến các lớp thành công!";
        }
        else {
            $notifyFalse = "Lỗi! Tạo lập khảo sát không thành công!";
        }
    }

    if ($userId == 1) {
        $userId = $_POST['userId'];
        $result = QuestionController::saveSurvey($formTitle, $topicId, null, null, $userId, $startTime, $endTime);
        if ($result > 0) {
            $notifySuccess = "Tạo lập khảo sát " . $formTitle . " gửi đến sinh viên thành công!";
        }
        else {
            $notifyFalse = "Lỗi! Tạo lập khảo sát không thành công!";
        }
    }
    if ($userId == 2) {
        $userId = $_POST['userId'];
        $result = QuestionController::saveSurvey($formTitle, $topicId, null, null, $userId, $startTime, $endTime);
        if ($result > 0) {
            $notifySuccess = "Tạo lập khảo sát " . $formTitle . " gửi đến giảng viên thành công!";
        }
        else {
            $notifyFalse = "Lỗi! Tạo lập khảo sát không thành công!";
        }
    }
    if ($userId == 3) {
        $userId = $_POST['userId'];
        $result = QuestionController::saveSurvey($formTitle, $topicId, null, null, $userId, $startTime, $endTime);
        if ($result > 0) {
            $notifySuccess = "Tạo lập khảo sát " . $formTitle . " gửi đến người dùng thành công!";
        }
        else {
            $notifyFalse = "Lỗi! Đăng ký không thành công!";
        }
    }
    $arrFormSurvey = QuestionController::getAllSurveys();
}

?>
<main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4" id="formSurvey">
    <?php if(isset($notifySuccess)){ ?>
        <div class="alert alert-success" role="alert" id="notifySaveSurvey">
            <?php echo $notifySuccess; ?>
        </div>
    <?php } ?>
    <?php if(isset($notifyFalse)){ ?>
        <div class="alert alert-danger" role="alert" id="notifySaveSurvey">
            <?php echo $notifyFalse; ?>
        </div>
    <?php } ?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Quản lý khảo sát</h1>
    </div>

    <div class="row" >
        <div class="col-lg-12 col-md-8 col-sm-12 p-3 mb-3">
            <div class="card-collapsible card">
                <div class="card-header">
                    Tạo mẫu khảo sát<i class="fa fa-caret-down caret"></i>
                </div>
                <div class="col-lg-12 p-4">
                    <form action="" method="post" id="manage_survey">
                        <input type="hidden" name="id" value="">
                        <div class="row">
                            <div class="col-md-6 border-right">
                                <div class="form-group ml-5 mr-5">
                                    <label for="" class="control-label">Tên mẫu khảo sát</label>
                                    <input type="text" name="formTitle" id="" class="form-control" required value="" placeholder="Nhập tên mẫu khảo sát">
                                </div>
                                <div class="form-group ml-5 mr-5">
                                    <label for="" class="control-label">Thuộc chủ đề</label>
                                    <select class="custom-select" name="topicId" id="">
                                        <option value="0" selected>Chọn chủ đề khảo sát</option>
                                        <?php foreach ($arrTopic as $row){ ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['topicName']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group ml-5 mr-5">
                                    <label for="" class="control-label">Ngày bắt đầu</label>
                                    <input type="date" name="startTime" id="" class="form-control" required value="">
                                </div>
                                <div class="form-group ml-5 mr-5">
                                    <label for="" class="control-label">Ngày kết thúc</label>
                                    <input type="date" name="endTime" id="" class="form-control" required value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="typeSch">
                                    <div class="form-group">
                                        <div class="form-group col-md-7 ml-5">
                                            <label class="control-label" for="inputSchool">Phân hệ tham gia khảo sát</label>
                                            <select id="inputSchool" name="typeSch" class="form-control">
                                                <option value="0" selected>Tùy chọn phân hệ</option>
                                                <option value="1">Khoa</option>
                                                <option value="2">Lớp</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="typeObj">
                                    <div class="form-group">
                                        <div class="form-group col-md-7 ml-5">
                                            <label class="control-label" id="iTypeObj" for="inputObject">Đối tượng tham gia khảo sát</label>
                                            <select id="inputObject" name="typeObj" class="form-control">
                                                <option value="0" selected>Tùy chọn đối tượng</option>
                                                <option value="1">Sinh viên</option>
                                                <option value="2">Giảng viên</option>
                                                <option value="3">Người dùng cơ bản</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ml-5 mr-5 selectDepartment" hidden>
                                    <label for="" class="control-label">Khoa</label>
                                    <select class="custom-select" name="departmentId" id="">
                                        <option value="0" selected>Tùy chọn khoa phù hợp</option>
                                        <?php foreach ($arrDepartment as $row){ ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['departmentName']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group ml-5 mr-5 selectClass" hidden>
                                    <label for="" class="control-label">Lớp</label>
                                    <select class="custom-select" name="classId" id="">
                                        <option value="0" selected>Tùy chọn lớp phù hợp</option>
                                        <?php foreach ($arrClass as $row){ ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['className']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group ml-5 mr-5 selectStudent" hidden>
                                    <label for="" class="control-label">Người dùng cụ thể</label>
                                    <select class="custom-select" name="userId" id="">
                                        <option value="1" selected>Dành cho tất cả sinh viên</option>
                                        <?php foreach ($arrUser as $row){
                                            if($row['roleId'] == 1) { ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['userName']; ?></option>
                                            <?php } } ?>
                                    </select>
                                </div>
                                <div class="form-group ml-5 mr-5 selectTeacher" hidden>
                                    <label for="" class="control-label">Người dùng cụ thể</label>
                                    <select class="custom-select" name="userId" id="">
                                        <option value="2" selected>Dành cho tất cả giảng viên</option>
                                        <?php foreach ($arrUser as $row){
                                            if($row['roleId'] == 2) { ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['userName']; ?></option>
                                            <?php } } ?>
                                    </select>
                                </div>
                                <div class="form-group ml-5 mr-5 selectUser" hidden>
                                    <label for="" class="control-label">Người dùng cụ thể</label>
                                    <select class="custom-select" name="userId" id="">
                                        <option value="3" selected>Dành cho tất cả người dùng</option>
                                        <?php foreach ($arrUser as $row){
                                                if($row['roleId'] == 3) { ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['userName']; ?></option>
                                        <?php } } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-lg-12 text-right justify-content-center d-flex">
                            <button class="btn btn-primary mr-2" type="submit" id="btnAddSurvey">Nhập</button>
                            <button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?tab=CreateSurveys'">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-6 col-sm-12 pr-0 mb-3">
            <div class="card-collapsible card">
                <div class="card-header">
                    Danh sách mẫu khảo sát đã tạo <i class="fa fa-caret-down caret"></i>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead bg-primary text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width: 30%;">Tên lô khảo sát</th>
                            <th scope="col">Ngày bắt đầu</th>
                            <th scope="col">Ngày kết thúc</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1;
                        if(count($arrFormSurvey) > 0) {
                        foreach ($arrFormSurvey as $row) { ?>
                            <tr>
                                <th scope="row"><?php echo $count; ?></th>
                                <td><?php echo $row['formTitle']; ?></td>
                                <td><?php echo $row['startTime']; ?></td>
                                <td><?php echo $row['endTime']; ?></td>
                                <td class="text">
                                    <div class="btn-group">
                                        <a href="" class="btn btn-primary btn-flat">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a  href="?tab=SurveyForms&formSurveyId=<?php echo $row['id']; ?>" class="btn btn-info btn-flat">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-flat delete_survey" data-id="">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <?php $count++; } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</main>
<script>
    $('#notifySaveSurvey').delay(3000).fadeOut();
    $('#inputSchool').change(function () {
        if ($(".typeObj").css("visibility") === "visible") {
            $(".typeObj").attr("hidden", true);
        }
        const typeSchool = $(this).find("option:selected");
        let typeSch = parseInt(typeSchool.val());
        if(typeSch === 0){
            if ($(".typeObj").css("visibility") === "visible") {
                $(".typeObj").attr("hidden", false);
            }
            if ($(".selectDepartment").css("visibility") === "visible") {
                $(".selectDepartment").attr("hidden", true);
            }
            if ($(".selectClass").css("visibility") === "visible") {
                $(".selectClass").attr("hidden", true);
            }
            if ($(".selectStudent").css("visibility") === "visible") {
                $(".selectStudent").attr("hidden", true);
            }
            if ($(".selectTeacher").css("visibility") === "visible") {
                $(".selectTeacher").attr("hidden", true);
            }
            if ($(".selectUser").css("visibility") === "visible") {
                $(".selectUser").attr("hidden", true);
            }
        }
        // Department
        if(typeSch === 1){
            $(".selectDepartment").removeAttr("hidden");
            if ($(".selectClass").css("visibility") === "visible") {
                $(".selectClass").attr("hidden", true);
            }
            if ($(".selectStudent").css("visibility") === "visible") {
                $(".selectStudent").attr("hidden", true);
            }
            if ($(".selectTeacher").css("visibility") === "visible") {
                $(".selectTeacher").attr("hidden", true);
            }
            if ($(".selectUser").css("visibility") === "visible") {
                $(".selectUser").attr("hidden", true);
            }
        }
        // Class
        if(typeSch === 2){
            $(".selectDepartment").removeAttr("hidden");
            $(".selectClass").removeAttr("hidden");
            if ($(".selectStudent").css("visibility") === "visible") {
                $(".selectStudent").attr("hidden", true);
            }
            if ($(".selectTeacher").css("visibility") === "visible") {
                $(".selectTeacher").attr("hidden", true);
            }
            if ($(".selectUser").css("visibility") === "visible") {
                $(".selectUser").attr("hidden", true);
            }
        }
    });
    $('#inputObject').change(function () {
        if ($(".typeSch").css("visibility") === "visible") {
            $(".typeSch").attr("hidden", true);
        }
        const typeObject = $(this).find("option:selected");
        let typeObj = parseInt(typeObject.val());
        if(typeObj === 0){
            if ($(".typeSch").css("visibility") === "visible") {
                $(".typeSch").attr("hidden", false);
            }
            if ($(".selectDepartment").css("visibility") === "visible") {
                $(".selectDepartment").attr("hidden", true);
            }
            if ($(".selectClass").css("visibility") === "visible") {
                $(".selectClass").attr("hidden", true);
            }
            if ($(".selectStudent").css("visibility") === "visible") {
                $(".selectStudent").attr("hidden", true);
            }
            if ($(".selectTeacher").css("visibility") === "visible") {
                $(".selectTeacher").attr("hidden", true);
            }
            if ($(".selectUser").css("visibility") === "visible") {
                $(".selectUser").attr("hidden", true);
            }
        }
        // Student
        if(typeObj === 1){
            if ($(".selectDepartment").css("visibility") === "visible") {
                $(".selectDepartment").attr("hidden", true);
            }
            if ($(".selectClass").css("visibility") === "visible") {
                $(".selectClass").attr("hidden", true);
            }
            $(".selectStudent").removeAttr("hidden");
            if ($(".selectTeacher").css("visibility") === "visible") {
                $(".selectTeacher").attr("hidden", true);
            }
            if ($(".selectUser").css("visibility") === "visible") {
                $(".selectUser").attr("hidden", true);
            }
        }
        // Teacher
        if(typeObj === 2){
            if ($(".selectDepartment").css("visibility") === "visible") {
                $(".selectDepartment").attr("hidden", true);
            }
            if ($(".selectClass").css("visibility") === "visible") {
                $(".selectClass").attr("hidden", true);
            }
            if ($(".selectStudent").css("visibility") === "visible") {
                $(".selectStudent").attr("hidden", true);
            }
            $(".selectTeacher").removeAttr("hidden");
            if ($(".selectUser").css("visibility") === "visible") {
                $(".selectUser").attr("hidden", true);
            }
        }
        // User
        if(typeObj === 3){
            if ($(".selectDepartment").css("visibility") === "visible") {
                $(".selectDepartment").attr("hidden", true);
            }
            if ($(".selectClass").css("visibility") === "visible") {
                $(".selectClass").attr("hidden", true);
            }
            if ($(".selectStudent").css("visibility") === "visible") {
                $(".selectStudent").attr("hidden", true);
            }
            if ($(".selectTeacher").css("visibility") === "visible") {
                $(".selectTeacher").attr("hidden", true);
            }
            $(".selectUser").removeAttr("hidden");
        }
    });
</script>