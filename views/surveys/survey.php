<?php
include 'controllers/questionController.php';

$arrTopic = QuestionController::getAllTopics();
$arrFormSurvey = QuestionController::getAllSurveys();
$topicId = 0;
$formSurveyId = 0;
$arrQuestions = array();
if(isset($_GET['topicId'])){
    $topicId = $_GET['topicId'];
    $arrQuestions = QuestionController::getListQuestion($_GET['topicId']);
}
?>

<main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4" id="formSurvey">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Dựng mẫu khảo sát</h1>
    </div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin chi tiết khảo sát</h3>
                    </div>
                    <div class="card-body p-3 py-2">
                        <form id="formListSurvey" method="get" action="">
                            <input type="hidden" id="tab" name="tab" value="SurveyForms" />
                            <div class="btn-toolbar mb-2">
                                <div class="container-fluid">
                                    <select class="custom-select mt-3 mb-3" name="topicId" id="topicIdSelect">
                                        <option value="" selected>Chọn chủ đề</option>
                                        <?php foreach ($arrTopic as $row) { ?>
                                            <option value="<?php echo $row['id']; ?>" <?php if(isset($_GET['topicId']) && $_GET['topicId'] == $row['id']){ echo "selected"; } ?>><?php echo $row['topicName']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <select class="custom-select mt-3 mb-3" name="formSurveyId" id="formSurveyIdSelect">
                                        <option value="" selected>Chọn mẫu khảo sát</option>
                                        <?php foreach ($arrFormSurvey as $row) { ?>
                                            <option value="<?php echo $row['id']; ?>" <?php if(isset($_GET['formSurveyId']) && $_GET['formSurveyId'] == $row['id']){ echo "selected"; } ?>><?php echo $row['formTitle']; ?></option>
                                        <?php } ?>
                                    </select>
                                    <p>Ngày bắt đầu: <b>24/01/2023</b></p>
                                    <p>Ngày kết thúc: <b>24/02/2023</b></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php if(isset($_GET['topicId']) && $_GET['topicId'] != 0) { ?>
            <div class="col-md-8">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title"><b>Bảng mẫu câu hỏi khảo sát </b></h3>
                        <div class="card-tools">
                            <a href="?tab=CreateQuestions&topicId=<?php echo $topicId; ?>">Thêm câu hỏi</a>
                        </div>
                    </div>
                    <form action="" id="manage-sort">
                        <div class="card-body ui-sortable">
                            <?php foreach ($arrQuestions  as $row) { ?>
                                <div class="callout callout-info">
                                    <h5><?php echo $row['content'] ?></h5>
                                    <?php if($row['typeOption'] == 0) { ?>
                                        <div class="form-group">
                                            <textarea id="" cols="30" rows="4" class="form-control" placeholder="Write Something Here..."></textarea>
                                        </div>
                                    <?php } elseif($row['typeOption'] == 2) { ?>
                                        <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                <label class="form-check-label" for="inlineRadio1">1-Rất đồng ý</label>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</main>

<script>
    $('#topicIdSelect').change(function() {
        submitForm();
    });
    function submitForm() {
        document.getElementById("formListSurvey").submit();
    }
</script>