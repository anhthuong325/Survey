<main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4" id="formQuestion">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Quản lý người dùng</h1>
    </div>
    <div class="row" >
        <div class="col-lg-12 col-md-6 col-sm-12 pr-0 mb-3" >
            <div class="card-collapsible card">
                <div class="card-header">
                    <div class="text-left">
                        Danh sách người dùng
                    </div>
                    <form id="formListUsers" method="get" action="">
                        <div class="text-right row">
                            <div class="col">
                                <select class="custom-select slt-department slt-filter" name="departmentId" style="width: auto;">
                                    <?php if(isset($arrDepartment) && $arrDepartment) {
                                        foreach ($arrDepartment as $row) {?>
                                            <option value="<?= $row['id']; ?>"><?= $row['departmentName']; ?></option>
                                        <?php } } ?>
                                </select>
                            </div>
                            <div class="col">
                                <select class="custom-select" name="classId" id="classByDepartment" style="width: auto;">
                                    <?php if(isset($arrClass) && $arrClass) {
                                        foreach ($arrClass as $row) {?>
                                            <option value="<?= $row['id']; ?>"><?= $row['class_name']; ?></option>
                                        <?php } } ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $('.slt-filter').change(function() {
        submitForm();
    });
    function submitForm() {
        document.getElementById("formListUsers").submit();
    }
</script>