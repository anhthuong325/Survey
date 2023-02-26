<?php
include 'controllers/questionController.php';

$arrFormSurveys = QuestionController::getAllFormSurvey();
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
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Chủ đề</th>
                            <th scope="col">Bắt đầu</th>
                            <th scope="col">Kết thúc</th>
                            <th scope="col">Khoa</th>
                            <th scope="col">Lớp</th>
                            <th scope="col">Note</th>
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
                            </tr>
                        <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>