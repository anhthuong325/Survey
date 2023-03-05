<?php
include 'controllers/clientController.php';
error_reporting(0);
session_start();
if(isset($_SESSION['USER_ACCOUNT'])){
    $userName = $_SESSION['USER_ACCOUNT'];
    $arrForm = ClientController::getListSurvey($userName);
}

?>
<main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4" id="formQuestion">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-crosshairs" aria-hidden="true"></i> Danh sách khảo sát</h1>
    </div>

    <div class="row" >
        <div class="col-lg-12 col-md-6 col-sm-12 pr-0 mb-3">
            <div class="card-collapsible card">
                <div class="card-header">
                    Danh sách form khảo sát của bạn <i class="fa fa-caret-down caret"></i>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead bg-primary text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Bắt đầu</th>
                                <th scope="col">Kết thúc</th>
                                <th scope="col" style="width: 100px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php  if(isset($arrForm) && $arrForm){ $sn = 1;
                            foreach ($arrForm as $form){ ?>
                                <tr>
                                    <td><?= $sn; ?></td>
                                    <td><?= $form['title']; ?></td>
                                    <td><?= $form['timeStart']; ?></td>
                                    <td><?= $form['timeEnd']; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-primary text-white" href="<?= BASE_DOMAIN ?>/surveys.php?tab=EnterSurvey&id=<?= $form['id'];?>">
                                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                            Bắt đầu khảo sát
                                        </a>
                                    </td>
                                </tr>
                            <?php $sn++; } } else { ?>
                                <tr>
                                    <td colspan="100%" class="table-no-record">
                                        No Record Found
                                    </td>
                                </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>