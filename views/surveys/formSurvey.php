<?php
include 'controllers/questionController.php';

$arrFormSurveys = QuestionController::getAllFormSurvey();
//Delete form survey
if(isset($_POST['formSurveyId'])){
    $result = QuestionController::removeFormSurvey($_POST['formSurveyId']);
    if($result){
        header("Location: ?tab=SurveyForms");
    }
}

$userFeedback = questionController::getStatisticFeedBack();

?>
<main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4" id="formQuestion">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Danh sách form khảo sát</h1>
        <form id="formListQuestion" method="get" action="">
            <input type="hidden" id="tab" name="tab" value="Questions" />
            <div class="btn-toolbar mb-2 mb-md-0">

            </div>
        </form>
    </div>

    <div class="row" >
        <div class="col-lg-12 col-md-6 col-sm-12 pr-0 mb-3" >
            <div class="card-collapsible card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead bg-primary text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width: 30%;">Tiêu đề</th>
                            <th scope="col">Chủ đề</th>
                            <th scope="col">Bắt đầu</th>
                            <th scope="col">Kết thúc</th>
                            <th scope="col">Khoa</th>
                            <th scope="col">Lớp</th>
                            <th scope="col">Note</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(!$arrFormSurveys) { ?>
                            <tr>
                                <td colspan="100%" class="table-no-record">
                                    No Record Found
                                </td>
                            </tr>
                        <?php } else { $sn = 0;
                            foreach ($arrFormSurveys as $formSurvey) { $sn ++; ?>
                            <tr>
                                <td><?= $sn; ?></td>
                                <td><?= $formSurvey['title']; ?></td>
                                <td><?= $formSurvey['topicName']; ?></td>
                                <td><?= $formSurvey['timeStart']; ?></td>
                                <td><?= $formSurvey['timeEnd']; ?></td>
                                <td><?= $formSurvey['departmentName']; ?></td>
                                <td><?= $formSurvey['className']; ?></td>
                                <td><?= $formSurvey['allUser'] == 0 ? "All users" : ""; ?></td>
                                <td>
                                    <button class="btn btn-sm btn-secondary">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger deleteFormSurvey" form-id="<?= $formSurvey['id']; ?>" title-form="<?= $formSurvey['title']; ?>">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2><i class="fa fa-bar-chart" aria-hidden="true"></i>Thống kê phản hồi lượt khảo sát</h2>
        <table class="table table-info">
            <thead style="background-color: #9fcdff">
            <tr align="center">
<!--                <th>ID</th>-->
                <th>Tên tài khoản</th>
                <th>Mẫu khảo sát số</th>
                <th>Lần khảo sát</th>
                <th>Ngày khảo sát</th>
            </tr>
            </thead>
            <tbody>
            <?php $currentUser = null; ?>
            <?php $surveyData = []; ?>
            <?php foreach($userFeedback as $feedback): ?>
                <?php
                // Lấy số lần khảo sát của Form Survey ID của User Name hiện tại
                $numOfSurvey = questionController::countSurveyByFormIdAndUserName($feedback['formSurveyId'], $feedback['userName']);

                // Thêm dữ liệu vào mảng surveyData
                if (!array_key_exists($feedback['userName'], $surveyData)) {
                    $surveyData[$feedback['userName']] = $numOfSurvey;
                } else {
                    $surveyData[$feedback['userName']] += $numOfSurvey;
                }
                ?>
                <?php if ($currentUser !== $feedback['userName']): ?>
                    <?php $currentUser = $feedback['userName']; ?>
                    <tr align="center">
<!--                        <td>--><?php //echo $feedback['id']; ?><!--</td>-->
                        <td><?php echo $feedback['userName']?></td>
                        <td><?php echo $feedback['formSurveyId']; ?></td>
                        <td><?php echo $numOfSurvey; ?></td>
                        <td><?php echo $feedback['createdAt']; ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <canvas id="survey-chart" width="1200" height="200"></canvas>

</main>
<div class="modal fade" id="deleteFormSurvey">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST">
                <input type="hidden" name="formSurveyId" id="formSurveyId">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Do you want to delete [<span class="font-weight-bold" id="titleModal"></span>] ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $('.deleteFormSurvey').click(function(){
        const formId = $(this).attr("form-id");
        const titleForm = $(this).attr("title-form");
        $('#titleModal').text(titleForm);
        $('#formSurveyId').val(formId);
        $('#deleteFormSurvey').modal('show');
    });


    //Chart Maximum Survey Joined
    // Lấy thẻ canvas
    var ctx = document.getElementById('survey-chart').getContext('2d');

    // Tạo biểu đồ
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: Object.keys(<?php echo json_encode($surveyData); ?>),
    datasets: [{
        label: 'Thống kê chỉ số % khảo sát cao nhất và thấp nhất với từng người dùng',
        data: Object.values(<?php echo json_encode($surveyData); ?>),
        backgroundColor: 'rgba(54, 162, 235, 0.2)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 2
    }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
    });
</script>