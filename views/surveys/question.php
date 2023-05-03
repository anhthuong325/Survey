<main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4" id="formQuestion">
    <?php if(isset($_SESSION['success']) && $_SESSION['success'] == 'UPDATE_SUCCESS'){
        unset ($_SESSION['success']); ?>
        <div class="alert alert-success" role="alert" id="notifySaveQuestion">
            Cập nhật thành công!
        </div>
    <?php } ?>
    <?php if(isset($_SESSION['false']) && $_SESSION['false'] == 'UPDATE_FALSE'){
        unset ($_SESSION['false']); ?>
        <div class="alert alert-danger" role="alert" id="notifySaveQuestion">
            Cập nhật thất bại!
        </div>
    <?php } ?>
    <?php if(isset($_SESSION['success']) && $_SESSION['success'] == 'REMOVE_SUCCESS'){
        unset ($_SESSION['success']); ?>
        <div class="alert alert-success" role="alert" id="notifySaveQuestion">
            Xóa thành công!
        </div>
    <?php } ?>
    <?php if(isset($_SESSION['false']) && $_SESSION['false'] == 'REMOVE_FALSE'){
        unset ($_SESSION['false']); ?>
        <div class="alert alert-danger" role="alert" id="notifySaveQuestion">
            Xóa thất bại!
        </div>
    <?php } ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Danh sách câu hỏi</h1>
        <form id="formListQuestion" method="get" action="">
            <input type="hidden" id="tab" name="tab" value="Questions" />
            <div class="btn-toolbar mb-2 mb-md-0">
                <select class="custom-select" name="topicId" id="topicIdSelect" style="width: 300px; height: 50px; border-color: blue; border-width: medium;">
                    <option value="" selected>Chọn chủ đề</option>
                    <?php foreach ($arrTopics as $row) { ?>
                        <option value="<?php echo $row['id']; ?>" <?php if(isset($_GET['topicId']) && $_GET['topicId'] == $row['id']){ echo "selected"; } ?>><?php echo $row['topicName']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </form>
    </div>

    <?php if(isset($_GET['topicId']) && $_GET['topicId'] != 0){ ?>
        <div class="row" >
            <div class="col-lg-12 col-md-6 col-sm-12 pr-0 mb-3" >
                <div class="card-collapsible card">
                    <div class="card-header">
                        Danh sách câu hỏi  <a href="?tab=CreateQuestions&topicId=<?php echo $topicId; ?>">Thêm câu hỏi</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead bg-primary text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" style="width: 40%;">   Nội dung</th>
                                <th scope="col">Option 1</th>
                                <th scope="col">Option 2</th>
                                <th scope="col">Option 3</th>
                                <th scope="col">Option 4</th>
                                <th scope="col">Option 5</th>
                                <th scope="col">Option 6</th>
                                <th scope="col">Dạng câu trả lời</th>
                                <th scope="col" style="width: 100px;">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                $count = 1;
                                if(count($arrQuestions) > 0){
                                    foreach ($arrQuestions as $row) { ?>
                                        <tr>
                                            <th scope="row"><?php echo $count; ?></th>
                                            <td><?php echo $row['content']; ?></td>
                                            <td><?php echo $row['op1']; ?></td>
                                            <td><?php echo $row['op2']; ?></td>
                                            <td><?php echo $row['op3']; ?></td>
                                            <td><?php echo $row['op4']; ?></td>
                                            <td><?php echo $row['op5']; ?></td>
                                            <td><?php echo $row['op6']; ?></td>
                                            <td><?php echo $row['typeOption'] == 0 ? "Text" : "Trắc nghiệm"; ?></td>
                                            <td>
                                                <a class="btn btn-sm btn-secondary btnEdit"
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
                                                   href="#">
                                                    <i class="fa fa-pencil-square-o "></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger removeQuestion" question-id="<?php echo $row['id']; ?>">
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
<!-- Modal -->
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
                    <input type="hidden" value="" name="questionIdRemove" id="questionIdRemove" />
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
<div class="modal fade" id="modalEditQuestion">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa câu hỏi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <label for="contentQuestion">Nhập nội dung câu hỏi:</label>
                            <input type="hidden" name="editQuestionId" id="editQuestionId" value="">
                            <textarea name="contentQuestion" class="form-control" id="contentQuestion" rows="6"></textarea>
                            <div class="form-row mt-2 towOption">
                                <div class="col">
                                    <input type="text" id="option1" name="option1" value="" class="form-control" placeholder="Option 1">
                                </div>
                                <div class="col">
                                    <input type="text" id="option2" name="option2" value="" class="form-control" placeholder="Option 2">
                                </div>
                            </div>
                            <div class="form-row mt-2 fourOption" hidden>
                                <div class="col">
                                    <input type="text" id="option3" name="option3" value="" class="form-control" placeholder="Option 3">
                                </div>
                                <div class="col">
                                    <input type="text" id="option4" name="option4" value="" class="form-control" placeholder="Option 4">
                                </div>
                            </div>
                            <div class="form-row mt-2 sixOption" hidden>
                                <div class="col">
                                    <input type="text" id="option5" name="option5" value="" class="form-control" placeholder="Option 5">
                                </div>
                                <div class="col">
                                    <input type="text" id="option6" name="option6" value="" class="form-control" placeholder="Option 6">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2 ml-2">
                            <label for="optionType" style="width: 130px;">Câu trả lời:</label>
                            <select id="optionType" name="optionType" class="form-control" style="width: 150px;">
                                <option value="0" selected>Trắc nghiệm</option>
                                <option value="1">Text</option>
                            </select>
                            <br>
                            <div class="numberOption">
                                <label for="inputNumber" style="width: 130px;">Số Lượng:</label>
                                <select id="inputNumber" name="numberOption" class="form-control">
                                    <option value="2" selected>2</option>
                                    <option value="4">4</option>
                                    <option value="6">6</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $('#topicIdSelect').change(function() {
        submitForm();
    });
    function submitForm() {
        document.getElementById("formListQuestion").submit();
    }
    $('.removeQuestion').click(function() {
        const questionId = $(this).attr("question-id");
        $('#questionIdRemove').val(questionId);
        $('#deleteQuestion').modal('show');
    });

    $('.btnEdit').click(function (){
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

        $("#contentQuestion").val(question);
        $("#editQuestionId").val(questionId);
        $("#option1").val(op1);
        $("#option2").val(op2);
        $("#option3").val(op3);
        $("#option4").val(op4);
        $("#option5").val(op5);
        $("#option6").val(op6);
        $("#optionType").val(option).change();
        $("#inputNumber").val(numOption).change();
        $("#modalEditQuestion").modal('show');
    });
    $('#removeQuestionSuccess').delay(3000).fadeOut();
</script>