<main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4" id="formQuestion">
    <?php if(isset($_SESSION['success']) && $_SESSION['success'] == 'INSERT_SUCCESS'){
        unset ($_SESSION['success']); ?>
        <div class="alert alert-success" role="alert" id="notifySaveQuestion">
            Tạo mới thành công!
        </div>
    <?php } ?>
    <?php if(isset($_SESSION['false']) && $_SESSION['false'] == 'CREATE_FALSE'){
        unset ($_SESSION['false']); ?>
        <div class="alert alert-danger" role="alert" id="notifySaveQuestion">
            Lỗi! Tạo mới thất bại.
        </div>
    <?php } ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Tạo câu hỏi</h1>
        <form id="formCreateQuestion" method="get" action="">
            <input type="hidden" id="tab" name="tab" value="CreateQuestions" />
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
    <div class="row" >
        <?php if(isset($_GET['topicId']) && $_GET['topicId'] != 0){ ?>
            <div class="col-lg-4 col-md-6 col-sm-12 pr-0 mb-3" >
                <div class="card-collapsible card">
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead bg-primary text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col" style="width: 65%;">   Nội dung</th>
                                <th scope="col">Thể loại</th>
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
                                        <td><?php echo $row['typeOption'] == 0 ? "Text" : "Trắc nghiệm"; ?></td>
                                    </tr>
                                    <?php $count++; } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-6 col-sm-12 pr-0 mb-3">
                <div class="card-collapsible card">
                    <div class="card-header">
                        Nhập liệu câu hỏi <i class="fa fa-caret-down caret"></i>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-row">
                                <div class="col col-md-9">
                                    <label for="exampleFormControlTextarea1">Nhập nội dung câu hỏi:</label>
                                    <textarea name="contentQuestion" class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
                                    <div class="form-row mt-2 towOption">
                                        <div class="col">
                                            <input type="text" name="option1" value="" class="form-control" placeholder="Lựa chọn 1">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="option2" value="" class="form-control" placeholder="Lựa chọn 2">
                                        </div>
                                    </div>
                                    <div class="form-row mt-2 fourOption" hidden>
                                        <div class="col">
                                            <input type="text" name="option3" value="" class="form-control" placeholder="Lựa chọn 3">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="option4" value="" class="form-control" placeholder="Lựa chọn 4">
                                        </div>
                                    </div>
                                    <div class="form-row mt-2 sixOption" hidden>
                                        <div class="col">
                                            <input type="text" name="option5" value="" class="form-control" placeholder="Lựa chọn 5">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="option6" value="" class="form-control" placeholder="Lựa chọn 6">
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-md-3">
                                    <div class="form-group">
                                        <label for="optionType">Câu trả lời:</label>
                                        <select id="optionType" name="optionType" class="form-control">
                                            <option value="0" selected>Trắc nghiệm</option>
                                            <option value="1">Text</option>
                                        </select>
                                    </div>
                                    <div class="form-group numberOption">
                                        <label for="inputNumber" style="width: 130px;">Số Lượng:</label>
                                        <select id="inputNumber" name="numberOption" class="form-control">
                                            <option value="2" selected>2</option>
                                            <option value="4">4</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row mt-5">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-send"></i> Thêm câu hỏi
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
    $('#topicId').change(function() {
        submitForm();
    });
    function submitForm() {
        document.getElementById("formCreateQuestion").submit();
    }
</script>