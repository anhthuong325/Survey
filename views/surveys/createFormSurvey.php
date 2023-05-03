<main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4" id="formQuestion">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-crosshairs" aria-hidden="true"></i> Tạo form khảo sát</h1>
        <form id="createFormSurvey" method="get" action="">
            <input type="hidden" id="tab" name="tab" value="CreateSurveyForms" />
            <div class="btn-toolbar mb-2 mb-md-0">
                <select class="custom-select" name="topicId" id="topicId" style="width: 300px; height: 50px; border-color: blue; border-width: medium;">
                    <option value="" selected>Chọn chủ đề</option>
                    <?php foreach ($arrTopics as $row) { ?>
                        <option value="<?php echo $row['id']; ?>" <?php if(isset($_GET['topicId']) && $_GET['topicId'] == $row['id']){ echo "selected"; } ?>><?php echo $row['topicName']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </form>
    </div>
    <?php if(isset($_GET['topicId']) && $_GET['topicId'] != 0){ ?>
        <form method="POST">
            <div class="row" >
                <div class="col-lg-6 col-md-6 col-sm-12 pr-0 mb-3">
                    <div class="card-collapsible card">
                        <div class="card-header">
                            Danh sách câu hỏi <i class="fa fa-caret-down caret"></i>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead bg-primary text-white">
                                <tr>
                                    <th scope="col">SN</th>
                                    <th scope="col" style="width: 60%;">Nội dung</th>
                                    <th scope="col">Type</th>
                                    <th scope="col" class="text-center">Action</th>
                                    <th scope="col"><i class="fa fa-ban" aria-hidden="true"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 1;
                                if(count($arrQuestions) > 0){
                                    foreach ($arrQuestions as $row) { ?>
                                        <tr>
                                            <th scope="row"><?php echo $count; ?></th>
                                            <td><?php echo $row['content']; ?></td>
                                            <td><?php echo $row['typeOption'] == 0 ? "Text" : "Trắc nghiệm"; ?></td>
                                            <td class="text-center"><button type="button" class="btn btn-sm btn-outline-dark border-0 viewDetail"
                                                                            question-id="<?php echo $row['id']; ?>"
                                                                            question="<?php echo $row['content']; ?>"
                                                                            op1 = "<?php echo $row['op1'];?>"
                                                                            op2 = "<?php echo $row['op2'];?>"
                                                                            op3 = "<?php echo $row['op3'];?>"
                                                                            op4 = "<?php echo $row['op4'];?>"
                                                                            op5 = "<?php echo $row['op5'];?>"
                                                                            op6 = "<?php echo $row['op6'];?>"
                                                                            num-option="<?php echo $row['typeOption']; ?>"
                                                                            option="<?php echo $row['typeOption'] > 0 ? 0 : 1; ?>"
                                                                            href="#" title="View detail">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <input type="checkbox" value="" name="checkRemove<?php echo $row['id']; ?>" class="checkRemove">
                                            </td>
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
                            Nhập liệu khảo sát <i class="fa fa-caret-down caret"></i>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <label for="titleFormSurvey">Nhập tiêu đề form:</label>
                                <textarea name="titleForm" required class="form-control" id="titleFormSurvey" rows="3"></textarea>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label>Khoa</label>
                                    <select class="form-control" name="departmentSurvey">
                                        <?php if(count($arrDepartment) > 0) {
                                            foreach ($arrDepartment as $item) { ?>
                                                <option value="<?= $item['id']; ?>"><?= $item['departmentName']; ?></option>
                                            <?php } } ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label>Lớp</label>
                                    <select class="form-control" name="classSurvey">
                                        <?php if(count($arrClass) > 0) {
                                            foreach ($arrClass as $class) { ?>
                                                <option class="font-weight-bold" disabled><?= $class['departmentName']; ?></option>
                                                <?php foreach ($class['class'] as $item) { ?>
                                                    <option value="<?php echo $item['id']; ?>">
                                                        <?php echo $item['className']; ?>
                                                    </option>
                                            <?php } } } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-6">
                                    <label for="startDate">Ngày bắt đầu:</label>
                                    <input type="date" required id="startDate" min="<?= date('Y-m-d'); ?>" name="startDate" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label for="endDate">Ngày kết thúc:</label>
                                    <input type="date" required placeholder="Bạn chưa chọn ngay kết thúc" id="endDate" min="<?= date('Y-m-d'); ?>" name="endDate" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-sm-10 mt-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-send"></i> Gửi đi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php } ?>
</main>
<div class="modal fade" id="viewDetailQuestion">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="typeQuestion"></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <h4 id="contentQuestion"></h4>
                </div>
                <div class="form-group row">
                    <label class="col-sm-6" id="option1"></label>
                    <label class="col-sm-6" id="option2"></label>
                </div>
                <div class="form-group row">
                    <label class="col-sm-6" id="option3"></label>
                    <label class="col-sm-6" id="option4"></label>
                </div>
                <div class="form-group row">
                    <label class="col-sm-6" id="option5"></label>
                    <label class="col-sm-6" id="option6"></label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $('#topicId').change(function() {
        submitForm();
    });
    function submitForm() {
        document.getElementById("createFormSurvey").submit();
    }
    $('.viewDetail').click(function () {
        const questionId = $(this).attr("question-id");
        const question = $(this).attr("question");
        const option = $(this).attr("option");
        const numOption = $(this).attr("num-option");
        const op1 = $(this).attr("op1");
        const op2 = $(this).attr("op2");
        const op3 = $(this).attr("op3");
        const op4 = $(this).attr("op4");
        const op5 = $(this).attr("op5");
        const op6 = $(this).attr("op6");

        if(numOption > 0){
            $('#typeQuestion').text('Trắc nghiệm');
        } else {
            $('#typeQuestion').text('Tự luận');
        }

        $('#contentQuestion').text(question);
        $('#option1').text(op1);
        $('#option2').text(op2);
        $('#option3').text(op3);
        $('#option4').text(op4);
        $('#option5').text(op5);
        $('#option6').text(op6);

        $('#viewDetailQuestion').modal('show');
    });

    $(".checkRemove").change(function() {
        if(this.checked === true){
            this.value = '0';
        }
        if(this.value === false) {
            this.value = '1';
        }
    });

</script>