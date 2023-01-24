<?php
include 'controllers/questionController.php';

$arrTopic = QuestionController::getAllTopics();
$userName = $_SESSION['USER_ACCOUNT'];
if(isset($_POST['contentTopic'])){
    $topic = $_POST['contentTopic'];
    $result = QuestionController::saveTopic($topic, $userName);
    if($result > 0){
        $notifySuccess = "Lưu thành công!";
    }
    else {
        $notifyFalse = "Lỗi! Lưu không thành công.";
    }
    $arrTopic = QuestionController::getAllTopics();
}

?>
<main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4" id="formQuestion">
    <?php if(isset($notifySuccess)){ ?>
        <div class="alert alert-success" role="alert" id="notifySaveQuestion">
            <?php echo $notifySuccess; ?>
        </div>
    <?php } ?>
    <?php if(isset($notifyFalse)){ ?>
        <div class="alert alert-danger" role="alert" id="notifySaveQuestion">
            <?php echo $notifyFalse; ?>
        </div>
    <?php } ?>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-crosshairs" aria-hidden="true"></i> Tạo chủ đề khảo sát</h1>
    </div>

    <div class="row" >
        <div class="col-lg-7 col-md-6 col-sm-12 pr-0 mb-3">
            <div class="card-collapsible card">
                <div class="card-header">
                    Danh sách chủ đề khảo sát<i class="fa fa-caret-down caret"></i>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead bg-primary text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width: 40%;">Tên chủ đề khảo sát</th>
                            <th scope="col">Người tạo</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1;
                        if(count($arrTopic) > 0) {
                                foreach ($arrTopic as $row) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $count; ?></th>
                                        <td><?php echo $row['topicName']; ?></td>
                                        <td><?php echo $row['createBy']; ?></td>
                                        <td><?php echo $row['createAt']; ?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="" class="btn btn-primary btn-flat">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a  href="?tab=SurveyForms&topicId=<?php echo $row['id']; ?>" class="btn btn-info btn-flat">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-flat delete_survey" data-id="<?php echo $row['id'] ?>">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                        <?php $count++; } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12 pr-0 mb-3">
            <div class="card-collapsible card">
                <div class="card-header">
                    Tạo chủ đề khảo sát<i class="fa fa-caret-down caret"></i>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-row">
                            <label for="exampleFormControlTextarea1">Nhập tên chủ đề khảo sát:</label>
                            <textarea name="contentTopic" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-10 mt-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-send"></i> Gửi đi
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>