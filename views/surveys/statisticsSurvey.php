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
        <h1 class="h2"><i class="fa fa-server" aria-hidden="true"></i> Thống kê khảo sát</h1>
    </div>
    <?php if(isset($_GET['formId'])) { ?>
        <div class="row" >
            <div class="col-lg-12 col-md-6 col-sm-12 pr-0 mb-3" >
                <div class="card-collapsible card">
                    <div class="card-header">
                        <?= isset($arrFormSurveys) ? $arrFormSurveys[$_GET['formId']]['title'] : "None"; ?>
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