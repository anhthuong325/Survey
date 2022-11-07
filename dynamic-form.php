<title>Trang tạo biểu mẫu khảo sát trực tuyến - trường Đại học Phú Yên</title>
<link rel="stylesheet" href="./assets/css/dynamic-form.css">
<?php include "./views/layouts/page_header.php"; ?>
    
    <section class="overlay" style="background-image: linear-gradient(10deg, white, #E3F2FD, #638CC9); height:100%">
        <!--Topic Tile-->
        <h3>Tạo biểu mẫu khảo sát</h3>
        <div id="row">
            <div class="input-group p-3">
                <input type="text" class="form-control" placeholder="Nhập chủ đề khảo sát...">
                <button type="button" class="btn btn-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
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
        <div class="wrapper">
            <div id="survey_options">
                <input type="text" name="survey_options[]" class="survey_options" size="50" placeholder="Nhập câu hỏi...">
                <input type="checkbox" name="survey_options[]" class="survey_options" size="50">
                <input type="text" name="survey_options[]" class="survey_options" size="22" placeholder="Nhập lựa chọn thích hợp">
            </div>
            <!-- <form class="form-group">
                <input type="checkbox" name="survey_options[]" class="survey_options" size="50">
                <input type="text" name="survey_options[]" class="survey_options" size="22" placeholder="Nhập lựa chọn thích hợp">
            </form>  -->


            <div class="controls">
                <a href="#" id="add_more_fields"><i class="fa fa-plus"></i>Thêm tùy chọn</a>
                <a href="#" id="remove_fields"><i class="fa fa-plus"></i>Xóa lựa chọn</a>
            </div>
        </div>
    </section>

<?php include "./views/layouts/page_footer.php"; ?>
<script src="./assets/js/dynamic-form.js"></script>
</body>
</html>