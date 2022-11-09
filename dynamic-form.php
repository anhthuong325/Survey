<title>Trang tạo biểu mẫu khảo sát trực tuyến - trường Đại học Phú Yên</title>
<link rel="stylesheet" href="./assets/css/dynamic-form.css">
<?php include "./views/layouts/page_header.php"; ?>
    
    <section class="overlay" style="background-image: linear-gradient(10deg, white, #E3F2FD, #638CC9); height:100%">
        <!--Topic Tile-->
        <h3 class="text-center pt-3">Tạo biểu mẫu khảo sát</h3>
        <div id="row">
            <div class="input-group p-3">
                <input type="text" class="form-control" style="height:50px;" placeholder="Nhập chủ đề khảo sát...">
                <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle" data-toggle="dropdown">
                    <span>Loại khảo sát</span>
                </button>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Trắc nghiệm</a>
                    <a href="#" class="dropdown-item">Dạng định mức độ</a> 
                    <a href="#" class="dropdown-item">Trả lời văn bản tự do</a> 
                    <!--bao gồm multipleopts-textans-->
                </div>
            </div>
        </div>
        <!--Topic Tile-->
        <!--Survey Form Builder-->
        <div class="wrapper">
            <div class="card m-3">
                <div class="card-body">
                    <input type="text" name="survey_question" class="survey_question" size="50" placeholder="Nhập câu hỏi...">
                    
                    <form id="option-form">
                        <div class="row" id="row1">
                            <div class="col-1">
                                <input type="radio" name="survey_options1" class="form-control" style = "width: 20px; height: 30px;">
                            </div>
                            <div class="col-5">
                                <input type="text" name="survey_options_name1" class="form-control" size="22" placeholder="Nhập tùy chọn thích hợp">
                            </div>
                        </div>
                    </form> 
                    
                    <div class="controls">
                        <a href="#" onclick="add_more_field()"><i class="fa fa-plus"></i>Thêm tùy chọn</a>
                        <a href="#" id="remove_fields"><i class="fa fa-plus"></i>Xóa tùy chọn</a>
                    </div>
                </div>
            </div>
        </div>
        <!--Survey Form Builder-->
    </section>

<?php include "./views/layouts/page_footer.php"; ?>
<script src="./assets/js/dynamic-form.js"></script>
</body>
</html>