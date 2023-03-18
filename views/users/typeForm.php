<?php
include 'controllers/clientController.php';

$idForm = 0;
$arrForms = array();
if(isset($_GET['id'])) {
    $idForm = $_GET['id'];
    $arrForms = ClientController::getDetailSurvey($idForm);
    //
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method === 'POST') {
        $arrFeedBack = array();
        $arrFeedBack['formSurveyId'] = $arrForms['surveyId'];
        foreach ($arrForms['questions'] as $questionId => $question) {
            $item = array();
            if (isset($_POST[$questionId . 'option'])) {
                $item['option'] = $_POST[$questionId . 'option'];
            }
            if (isset($_POST[$questionId . 'optionText'])) {
                $item['value'] = $_POST[$questionId . 'optionText'];
            }
            $arrFeedBack['feedback'][$questionId] = $item;
        }
        if ($arrFeedBack['formSurveyId'] = $idForm) {
            //submit thành công
            $result = ClientController::saveFeedbackUser($arrFeedBack);
            if ($result > 0) {
                $notifySuccess = "Form " . $arrForms['title'] . " đã ghi lại các phản hồi!";
            } else {
                //thất bại
                $notifyFalse = "Lỗi! Đăng ký không thành công!";
            }
        }
    }
}
?>

<main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4" id="formFormSurvey">

    <?php if(isset($_GET['id']) && $_GET['id'] != 0){ ?>
        <section class="vh-100 pt-3 mb-5 pb-5" style="max-width: 80%; margin: 0 auto;background-color: black; background-image: linear-gradient(#b3cde0, #6497b1, #005b96); box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6);">
            <div class="container-fluid h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-xl-9 p-3">
                        <?php if(isset($notifySuccess)){ ?>
                            <div class="alert alert-success" role="alert" id="notifysaveFeedBack">
                                <?php echo $notifySuccess; ?>
                            </div>
                        <?php } ?>
                        <?php if(isset($notifyFalse)){ ?>
                            <div class="alert alert-danger" role="alert" id="notifysaveFeedBack">
                                <?php echo $notifyFalse; ?>
                            </div>
                        <?php } ?>
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-4 mb-4 border-bottom">
                            <h1 class="h2" style="color:blue;font-family: Times New Roman; text-shadow: 3px 3px white; letter-spacing: 2px; font-weight:bold;"><i class="fa fa-linode" aria-hidden="true"></i> Bắt đầu:
                                <?php echo isset($arrForms) ? $arrForms['title'] : ""; ?>
                            </h1>
                        </div>
                        <form class=" bg-white px-4 pt-3" style="border-radius: 10px;" action="" method="post">
                            <?php
                            if(isset($arrForms['questions']) && is_array($arrForms['questions'])) { $sn = 0;
                                foreach($arrForms['questions'] as $id => $question) { $sn++; ?>
                                    <div class="pt-2 pb-2 mb-2">
                                        <label class="form-label font-weight-bold"><?= $sn.". ".$question['content']; ?></label>
                                        <?php
                                        if ($question['numOption'] > 0) { ?>
                                            <?php if(isset($question['option1']) && $question['option1'] != null){ ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="<?= $id; ?>option" id="<?= $id; ?>option1" value="1" required>
                                                    <label class="form-check-label" for="<?= $id; ?>option1"><?= $question['option1']; ?></label>
                                                </div>
                                            <?php } if(isset($question['option2']) && $question['option2'] != null) { ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="<?= $id; ?>option" id="<?= $id; ?>option2" value="2" required>
                                                    <label class="form-check-label" for="<?= $id; ?>option2"><?= $question['option2']; ?></label>
                                                </div>
                                            <?php } if(isset($question['option3']) && $question['option3'] != null) { ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="<?= $id; ?>option" id="<?= $id; ?>option3" value="3" required>
                                                    <label class="form-check-label" for="<?= $id; ?>option3"><?= $question['option3']; ?></label>
                                                </div>
                                            <?php } if(isset($question['option4']) && $question['option4'] != null) { ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="<?= $id; ?>option" id="<?= $id; ?>option4" value="4" required>
                                                    <label class="form-check-label" for="<?= $id; ?>option4"><?= $question['option4']; ?></label>
                                                </div>
                                            <?php } if(isset($question['option5']) && $question['option5'] != null) { ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="<?= $id; ?>option" id="<?= $id; ?>option5" value="5" required>
                                                    <label class="form-check-label" for="<?= $id; ?>option5"><?= $question['option5']; ?></label>
                                                </div>
                                            <?php } if(isset($question['option6']) && $question['option6'] != null) { ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="<?= $id; ?>option" id="<?= $id; ?>option6" value="6" required>
                                                    <label class="form-check-label" for="<?= $id; ?>option6"><?= $question['option6']; ?></label>
                                                </div>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <div class="form-group">
                                                <textarea name="<?= $id; ?>optionText" class="form-control" rows="3" placeholder="Bạn hãy nhập đánh giá của bạn vào đây" ></textarea>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } } else { ?>
                                <?php echo "Không có câu hỏi nào để hiển thị."; ?>
                            <?php } ?>
                            <div class="text-end pt-3">
                                <button type="submit" class="btn btn-primary mb-3">Gửi phản hồi của bạn</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        </div>
    <?php } ?>
</main>
<script>
    $('#notifysaveFeedBack').delay(3000).fadeOut();
</script>