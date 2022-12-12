<main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4" id="formQuestion">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-question-circle-o" aria-hidden="true"></i> Trực quan hóa mẫu khảo sát</h1>
    </div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="#example1-tab1" aria-controls="example1-tab1" role="tab" data-toggle="tab" class="nav-link active">Ngân hàng câu hỏi</a>
        </li>
        <li class="nav-item">
            <a role="presentation"><a href="#example1-tab2" aria-controls="example1-tab2" role="tab" data-toggle="tab" class="nav-link">Bộ lọc mẫu khảo sát</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="example1-tab1">
            <table class="table">
                <thead>
                <tr>
                    <th><select class="js-select2" name="property">
                            <option selected="selected">Tên chủ đề</option>
                            <option value="">Môn học</option>
                            <option value="">Trường lớp</option>
                            <option value="">Giảng viên</option>
                        </select></th>
                    <th>Nội dung câu hỏi</th>
                    <th>Dạng câu hỏi</th>
                    <th>Ngày tạo</th>
                    <th>Trạng thái</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td>Môn học B có đạt chất lượng không?</td>
                    <td>Trắc nghiệm</td>
                    <td>2012/10/13</td>
                    <td>active</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Trường bạn theo học thuộc tiêu chuẩn loại mấy?</td>
                    <td>Văn bản</td>
                    <td>2012/09/26</td>
                    <td>hidden</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Giảng viên A đã sử dụng thiết bị dạy học nào khi thỉnh giảng?</td>
                    <td>Văn bản</td>
                    <td>2015/09/26</td>
                    <td>active</td>
                </tr>
                </tbody>
            </table>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-send"></i> Chuyển tiếp sang mẫu
                </button>
            </div>
        </div>
        <role="tabpanel" class="tab-pane fade" id="example1-tab2">
            <table id="example1-tab2-dt" class="table table-striped table-bordered table-condensed" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th><select class="js-select2" name="property">
                            <option selected="selected">Tên chủ đề</option>
                            <option value="">Môn học</option>
                            <option value="">Trường lớp</option>
                            <option value="">Giảng viên</option>
                        </select></th>
                    <th>Nội dung câu hỏi</th>
                    <th>Opt1</th>
                    <th>Opt2</th>
                    <th>Opt3</th>
                    <th>Opt4</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td>Môn học B có đạt chất lượng không?</td>
                    <td><input type="radio" aria-label="Radio button for following text input"></td>
                    <td><input type="radio" aria-label="Radio button for following text input"></td>
                    <td><input type="radio" aria-label="Radio button for following text input"></td>
                    <td><input type="radio" aria-label="Radio button for following text input"></td>
                </tr>
                <tr>
                    <td></td>
                    <td style="color:red;">Trường bạn theo học thuộc tiêu chuẩn loại mấy?</td>
                    <td><input type="radio" aria-label="Radio button for following text input"></td>
                    <td><input type="radio" aria-label="Radio button for following text input"></td>
                    <td><input type="radio" aria-label="Radio button for following text input"></td>
                    <td><input type="radio" aria-label="Radio button for following text input"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Giảng viên A đã sử dụng thiết bị dạy học nào khi thỉnh giảng?</td>
                    <td><input type="radio" aria-label="Radio button for following text input"></td>
                    <td><input type="radio" aria-label="Radio button for following text input"></td>
                    <td><input type="radio" aria-label="Radio button for following text input"></td>
                    <td><input type="radio" aria-label="Radio button for following text input"></td>
                </tr>
                </tbody>
            </table>
    </div>
</main>

