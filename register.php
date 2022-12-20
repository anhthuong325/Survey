<html>
<head>
    <title>Survey | Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- JS -->
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>

</head>
<body>

<div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">

        <!-- Section: Design Block -->
        <section class="text-center">
            <!-- Background image -->
            <div class="p-5 bg-image" style="
                background-image: url('assets/img/express.png');
                height: 300px;
                "></div>
            <!-- Background image -->

            <div class="card mx-4 shadow-5-strong" style="
                margin-top: -100px;
                background: hsla(0, 0%, 100%, 0.8);
                backdrop-filter: blur(30px);
                width:1000px;
                ">
                <div class="card-body py-5 px-md-5">

                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <h2 class="fw-bold mb-4">Đăng ký tài khoản khảo sát</h2>
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên tài khoản">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Họ và tên của bạn">
                                </div>
                                <h5 class="mb-2 pb-1">Lựa chọn nhân vật: </h5>
                                <div class="d-flex flex-row align-items-center mb-4 justify-content-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label" for="exampleRadios1">
                                            <i class="fa fa-address-book-o" aria-hidden="true"></i> Sinh viên
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                        <label class="form-check-label" for="exampleRadios2">
                                            <i class="fa fa-users" aria-hidden="true"></i> Giảng viên
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Nhập địa chỉ email">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Khoa trực thuộc của bạn">
                                </div>
                                <button type="submit" class="btn btn-primary">Xác nhận đăng ký</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section: Design Block -->
    </div>
</div>
</body>
</html>