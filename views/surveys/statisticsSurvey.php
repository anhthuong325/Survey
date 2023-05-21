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
                        <span class="font-weight-bold">
                            <?= isset($arrFormSurveys) ? $arrFormSurveys[0]['title'] : "None"; ?>
                        </span>
                        <span class="text-right font-weight-bold">
                            Số lượng người tham gia: <?= isset($numberForm) ? $numberForm : "None"; ?>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                            <?php if (isset($arrStatistics) && count($arrStatistics) > 0) { $sn = 0;
                                foreach ($arrStatistics as $question) { $sn++;
                                    if($question['number_option'] > 0){
                                        if($question['number_option'] == 2) { ?>
                                        <tr>
                                            <td class="font-weight-bold"><?= $sn; ?></td>
                                            <td><?= $question['content']; ?></td>
                                            <td><?= $question['option1'].' <span class="font-weight-bold">('.$question['number_option1'].')</span>'; ?></td>
                                            <td colspan="5"><?= $question['option2'].' <span class="font-weight-bold">('.$question['number_option2'].')</span>'; ?></td>
                                        </tr>
                                    <?php } else if($question['number_option'] == 4) { ?>
                                            <tr>
                                                <td class="font-weight-bold"><?= $sn; ?></td>
                                                <td><?= $question['content']; ?></td>
                                                <td><?= $question['option1'].' <span class="font-weight-bold">('.$question['number_option1'].')</span>'; ?></td>
                                                <td><?= $question['option2'].' <span class="font-weight-bold">('.$question['number_option2'].')</span>'; ?></td>
                                                <td><?= $question['option3'].' <span class="font-weight-bold">('.$question['number_option3'].')</span>'; ?></td>
                                                <td colspan="3"><?= $question['option4'].' <span class="font-weight-bold">('.$question['number_option4'].')</span>'; ?></td>
                                            </tr>
                                    <?php } else if($question['number_option'] == 6) { ?>
                                            <tr>
                                                <td class="font-weight-bold"><?= $sn; ?></td>
                                                <td><?= $question['content']; ?></td>
                                                <td><?= $question['option1'].' <span class="font-weight-bold">('.$question['number_option1'].')</span>'; ?></td>
                                                <td><?= $question['option2'].' <span class="font-weight-bold">('.$question['number_option2'].')</span>'; ?></td>
                                                <td><?= $question['option3'].' <span class="font-weight-bold">('.$question['number_option3'].')</span>'; ?></td>
                                                <td><?= $question['option4'].' <span class="font-weight-bold">('.$question['number_option4'].')</span>'; ?></td>
                                                <td><?= $question['option5'].' <span class="font-weight-bold">('.$question['number_option5'].')</span>'; ?></td>
                                                <td><?= $question['option6'].' <span class="font-weight-bold">('.$question['number_option6'].')</span>'; ?></td>
                                            </tr>
                                    <?php } ?>
                                <?php } else if($question['number_option'] == 0) {
                                        unset($question['number_option']); ?>
                                        <tr>
                                            <td class="font-weight-bold"><?= $sn; ?></td>
                                            <td colspan="7"><?= $question['content']; ?></td>
                                        <tr>
                                    <?php unset($question['content']);
                                        foreach ($question as $user_name => $value) { ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td colspan="6"><?= $user_name.' : <span class="text-muted">'.$value.'</span>';?></td>
                                            </tr>
                                <?php } } ?>
                            <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</main>