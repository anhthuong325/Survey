<?php
include 'controllers/questionController.php';

$arrChuDe = QuestionController::getAllChuDe();
$idChuDe = 0;
$arrCauHoi = array();
if(isset($_GET['idChuDe'])){
    $idChuDe = $_GET['idChuDe'];
    $arrCauHoi = QuestionController::getListQuestion($_GET['idChuDe']);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['questionId']) && isset($_POST['topicId'])) {
    $questionId = $_POST['questionId'];
    $topicId = $_POST['topicId'];
    QuestionController::removeQuestion($questionId, $topicId);
    $_SESSION['success'] = true;
    echo $topicId;
    header("Location: ?tab=Questions&idChuDe=".$topicId."&action=remove");
    die();
    return;
}
?>

<main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4" id="formQuestion">
    <?php
    if(isset($_SESSION['success']))
    {
        unset($_SESSION['success']);
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="removeQuestionSuccess">
            Successfully <?php echo $_GET['action'].' question '?>!
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    <?php } ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Danh sách câu hỏi</h1>
        <form id="formListQuestion" method="get" action="">
            <input type="hidden" id="tab" name="tab" value="Questions" />
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

    <?php if(isset($_GET['idChuDe']) && $_GET['idChuDe'] != 0){ ?>
        <div class="row" >
            <div class="col-lg-12 col-md-6 col-sm-12 pr-0 mb-3" >
                <div class="card-collapsible card">
                    <div class="card-header">
                        Danh sách câu hỏi  <a href="?tab=CreateQuestions">Thêm câu hỏi</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead bg-primary text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" style="width: 60%;">   Nội dung</th>
                                <th scope="col">Dạng câu trả lời</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
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
                                            <td>
                                                <a class="btn btn-sm btn-secondary" title="Edit" href="?tab=UpdateQuestions&idChuDe=1
                                                &content=<?php echo $row['noiDung']; ?>
                                                &option=<?php echo $row['loaiCauTraLoi'];?>&status=<?php echo $row['status']; ?>">
                                                    <i class="fa fa-pencil-square-o "></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger removeQuestion" question-id="<?php echo $row['id']; ?>"
                                                    topic-id=<?php echo $idChuDe; ?>>
                                                    <i class="fa fa-trash "></i>
                                                </button>
                                            </td>
                                        </tr>
                            <?php $count++; } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</main>
<div class="modal fade" id="deleteQuestion" tabindex="-1" role="dialog" aria-hidden="true">
    <form method="POST">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="" name="questionId" id="questionId" />
                    <input type="hidden" value="" name="topicId" id="topicId" />
                    Are you sure you want to remove this question ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger stretched-link">Yes, Remove</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $('#idChuDe').change(function() {
        submitForm();
    });
    function submitForm() {
        document.getElementById("formListQuestion").submit();
    }
    $('.removeQuestion').click(function() {
        const questionId = $(this).attr("question-id");
        const topicId = $(this).attr("topic-id");
        $('#questionId').val(questionId);
        $('#topicId').val(topicId);
        $('#deleteQuestion').modal('show');
    })
    $('#removeQuestionSuccess').delay(3000).fadeOut();
</script>