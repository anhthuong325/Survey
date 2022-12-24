<?php
include 'controllers/questionController.php';

$arrChuDe = QuestionController::getAllChuDe();
$idChuDe = 0;
$arrCauHoi = array();
if(isset($_GET['idChuDe'])){
    $idChuDe = $_GET['idChuDe'];
    $arrCauHoi = QuestionController::getListQuestion($_GET['idChuDe']);
}
$status = 0;

if(isset($_POST['contentQuestion']) && isset($_POST['loaiCauTraLoi']) && isset($_POST['status'])){
    $content = $_POST['contentQuestion'];
    $loaiCauTraLoi = $_POST['loaiCauTraLoi'];
    $status = $_POST['status'];
    if($content != "" && $loaiCauTraLoi > 0){
        $result = QuestionController::saveQuestion($content, $idChuDe, $loaiCauTraLoi, $status);
        if($result){
            $notifySuccess = "Lưu thành công!";
        }
    } else {
        $notifyFalse = "Lỗi! Lưu không thành công.";
    }
    if(isset($_GET['idChuDe'])){
        $arrCauHoi = QuestionController::getListQuestion($_GET['idChuDe']);
    }
}
?>
<main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4" id="formQuestion">
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
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Tạo câu hỏi</h1>
        <form id="formCreateQuestion" method="get" action="">
            <input type="hidden" id="tab" name="tab" value="CreateQuestions" />
            <div class="btn-toolbar mb-2 mb-md-0">
                <select class="custom-select" name="idChuDe" id="idChuDe" style="width: 300px; height: 50px; border-color: blue; border-width: medium;">
                    <option value="" selected>Chọn chủ đề</option>
                    <?php foreach ($arrChuDe as $row) { ?>
                        <option value="<?php echo $row['id']; ?>" <?php if(isset($_GET['idChuDe']) && $_GET['idChuDe'] == $row['id']){ echo "selected"; } ?>><?php echo $row['tenChuDe']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </form>
    </div>
    <div class="row" >
        <?php if(isset($_GET['idChuDe']) && $_GET['idChuDe'] != 0){ ?>
            <div class="col-lg-6 col-md-6 col-sm-12 pr-0 mb-3" >
                <div class="card-collapsible card">
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead bg-primary text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" style="width: 60%;">   Nội dung</th>
                                <th scope="col">Dạng câu trả lời</th>
                                <th scope="col">Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 1;
                            if(count($arrCauHoi) > 0){
                                foreach ($arrCauHoi as $row) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $count; ?></th>
                                        <td><?php echo $row['noiDung']; ?></td>
                                        <td><?php echo $row['loaiCauTraLoi'] == 1 ? "Trắc nghiệm" : "Nhập câu trả lời"; ?></td>
                                        <td><?php echo $row['status'] == 1 ? "Active" : "Not active"; ?></td>
                                    </tr>
                                    <?php $count++; } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 pr-0 mb-3">
                <div class="card-collapsible card">
                    <div class="card-header">
                        Nhập liệu câu hỏi <i class="fa fa-caret-down caret"></i>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-9">
                                    <label for="exampleFormControlTextarea1">Nhập nội dung câu hỏi:</label>
                                    <textarea name="contentQuestion" class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                                </div>
                                <div class="form-group col-md-1 ml-2">
                                    <label for="inputState" style="width: 130px;">Câu trả lời:</label>
                                    <select id="inputState"name="loaiCauTraLoi" class="form-control" style="width: 150px;">
                                        <option value="1" selected>Trắc nghiệm</option>
                                        <option value="2">Nhập trả lời</option>
                                    </select>
                                    <br>
                                    <label for="inputStatus" style="width: 130px;">Trạng thái:</label>
                                    <select id="inputStatus"name="status" class="form-control" style="width: 150px;">
                                        <option value="0">Not active</option>
                                        <option value="1" selected>Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-send"></i> Gửi đi
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</main>

<script>
    $('#idChuDe').change(function() {
        submitForm();
    });
    function submitForm() {
        document.getElementById("formCreateQuestion").submit();
    }
</script>