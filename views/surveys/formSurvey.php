<main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4" id="formQuestion">
    <?php if(isset($_SESSION['success']) && $_SESSION['success'] == 'CREATE_SUCCESS'){
        unset ($_SESSION['success']); ?>
        <div class="alert alert-success" role="alert" id="notifySaveQuestion">
            Tạo mới khảo sát thành công!
        </div>
    <?php } ?>
    <?php if(isset($_SESSION['false']) && $_SESSION['false'] == 'CREATE_FALSE'){
        unset ($_SESSION['false']); ?>
        <div class="alert alert-danger" role="alert" id="notifySaveQuestion">
            Lỗi! Tạo mới khảo sát thất bại.
        </div>
    <?php } ?>
    <?php if(isset($_SESSION['success']) && $_SESSION['success'] == 'REMOVE_SUCCESS'){
        unset ($_SESSION['success']); ?>
        <div class="alert alert-success" role="alert" id="notifySaveQuestion">
            Xóa khảo sát thành công!
        </div>
    <?php } ?>
    <?php if(isset($_SESSION['false']) && $_SESSION['false'] == 'REMOVE_FALSE'){
        unset ($_SESSION['false']); ?>
        <div class="alert alert-danger" role="alert" id="notifySaveQuestion">
            Xóa khảo sát thất bại!
        </div>
    <?php } ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Danh sách form khảo sát</h1>
        <form id="formListQuestion" method="get" action="">
            <input type="hidden" id="tab" name="tab" value="Questions" />
        </form>
    </div>

    <div class="row" >
        <div class="col-lg-12 col-md-6 col-sm-12 pr-0 mb-3" >
            <div class="card-collapsible card">
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
                                <td class="row">
                                    <button class="btn btn-sm btn-secondary mr-1 col" title="undeveloped feature">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger col deleteFormSurvey" form-id="<?= $formSurvey['id']; ?>" title-form="<?= $formSurvey['title']; ?>">
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
</main>
<div class="modal fade" id="deleteFormSurvey">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST">
                <input type="hidden" name="formSurveyIdRemove" id="formSurveyIdRemove">
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
        $('#formSurveyIdRemove').val(formId);
        $('#deleteFormSurvey').modal('show');
    });
</script>