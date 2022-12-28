<?php
include 'controllers/clientController.php';

$arrChuDe = ClientController::getAllChuDe();
$idChuDe = 0;
$arrCauHoi = array();
if(isset($_GET['idChuDe'])){
    $idChuDe = $_GET['idChuDe'];
    $arrCauHoi = ClientController::getListQuestion($_GET['idChuDe']);
}
?>


<main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4" id="formQuestion">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Mẫu khảo sát chính thức quý IV năm 2022 </h1>
    </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <form id="formListQuestion" method="get" action="">
            <input type="hidden" id="tab" name="tab" value="Surveys" />
            <div class="btn-toolbar mb-2 mb-md-0">
                <select class="custom-select" name="idChuDe" id="idChuDe" >
                    <option value="" selected>Tên chủ đề</option>
                    <?php foreach ($arrChuDe as $row) { ?>
                        <option value="<?php echo $row['id']; ?>" <?php if(isset($_GET['idChuDe']) && $_GET['idChuDe'] == $row['id']){ echo "selected"; } ?>><?php echo $row['tenChuDe']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </form>
    </div>

    <?php if(isset($_GET['idChuDe']) && $_GET['idChuDe'] != 0){ ?>
        <!-- Tab panes -->
        <div class="tab-content">
            <table id="example1-tab2-dt" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Nội dung câu hỏi</th>
                    <th>Đồng ý</th>
                    <th>Không đồng ý</th>
                    <th>Không ý kiến</th>
                    <th>Theo số đông</th>
                </tr>
                </thead>
                <?php if(isset($_GET['idChuDe']) && $_GET['idChuDe'] != 0) { ?>
                <tbody>
                <?php foreach ($arrCauHoi as $row) { ?>
                    <tr>
                        <td><?php if($row['loaiCauTraLoi'] == 1) {
                                echo $row['noiDung']; ?>
                            </td>
                            <td><input type="radio" aria-label="Radio button for following text input"></td>
                            <td><input type="radio" aria-label="Radio button for following text input"></td>
                            <td><input type="radio" aria-label="Radio button for following text input"></td>
                            <td><input type="radio" aria-label="Radio button for following text input"></td>
                    </tr>
                <?php } } } ?>
                </tbody>
            </table>
        </div>
        <div class="tab-content">
                <table id="example1-tab2-dt" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>Nội dung câu hỏi</th>
                    <th>Câu trả lời văn bản</th>
                </tr>
                </thead>
                <?php if(isset($_GET['idChuDe']) && $_GET['idChuDe'] != 0) { ?>
                    <tbody>
                    <?php foreach ($arrCauHoi as $row) { ?>
                        <tr>
                        <td><?php } if ($row['loaiCauTraLoi'] == 2) {
                        echo $row['noiDung']; ?>
                    </td>
                    <td><input type="text" aria-label="Radio button for following text input"></td>
                    </tr>
                <?php } } ?>
            </tbody>
            </table>
        </div>
    <?php } ?>
</main>

