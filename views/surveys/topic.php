<main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4" id="formQuestion">
    <?php if(isset($_SESSION['success']) && $_SESSION['success'] == 'CREATE_SUCCESS'){
        unset ($_SESSION['success']); ?>
        <div class="alert alert-success" role="alert" id="notifySaveQuestion">
            Tạo mới chủ đề thành công!
        </div>
    <?php } ?>
    <?php if(isset($_SESSION['false']) && $_SESSION['false'] == 'CREATE_FALSE'){
        unset ($_SESSION['false']); ?>
        <div class="alert alert-danger" role="alert" id="notifySaveQuestion">
            Lỗi! Tạo mới chủ đề thất bại.
        </div>
    <?php } ?>
    <?php if(isset($_SESSION['success']) && $_SESSION['success'] == 'REMOVE_SUCCESS'){
        unset ($_SESSION['success']); ?>
        <div class="alert alert-success" role="alert" id="notifySaveQuestion">
            Xóa chủ đề thành công!
        </div>
    <?php } ?>
    <?php if(isset($_SESSION['false']) && $_SESSION['false'] == 'REMOVE_FALSE'){
        unset ($_SESSION['false']); ?>
        <div class="alert alert-danger" role="alert" id="notifySaveQuestion">
            Xóa chủ đề thất bại!
        </div>
    <?php } ?>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-crosshairs" aria-hidden="true"></i> Tạo chủ đề</h1>
    </div>

    <div class="row" >
        <div class="col-lg-7 col-md-6 col-sm-12 pr-0 mb-3">
            <div class="card-collapsible card">
                <div class="card-header">
                    Danh sách chủ đề <i class="fa fa-caret-down caret"></i>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead class="thead bg-primary text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width: 40%;">Tên chủ đề</th>
                            <th scope="col">Người tạo</th>
                            <th scope="col">Ngày tạo</th>
                            <th scope="col" style="width: auto;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(count($arrTopics)) {
                                foreach ($arrTopics as $row) { ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['id']; ?></th>
                                        <td><?php echo $row['topicName']; ?></td>
                                        <td><?php echo $row['createBy']; ?></td>
                                        <td><?php echo $row['createAt']; ?></td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-danger removeTopic" topic-id="<?php echo $row['id']; ?>"
                                                    topic-name="<?php echo $row['topicName']; ?>">
                                                <i class="fa fa-trash "></i>
                                            </button>
                                        </td>
                                    </tr>
                        <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-12 pr-0 mb-3">
            <div class="card-collapsible card">
                <div class="card-header">
                    Tạo chủ đề <i class="fa fa-caret-down caret"></i>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-row">
                            <label for="exampleFormControlTextarea1">Nhập tên chủ đề:</label>
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
<div class="modal fade" id="deleteTopic" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <input type="hidden" value="" name="topicIdRemove" id="topicIdRemove" />
                    Sẽ xóa tất cả các câu hỏi và form khảo sát hiện có của chủ đề này!
                    Bạn có chắc chắn xóa chủ đề [<span class="font-weight-bold" id="topicName"></span>] không ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger stretched-link">Yes, Remove</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $('.removeTopic').click(function() {
        const topicId = $(this).attr("topic-id");
        const topicName = $(this).attr("topic-name");
        $('#topicIdRemove').val(topicId);
        $('#topicName').text(topicName);
        $('#deleteTopic').modal('show');
    });
</script>