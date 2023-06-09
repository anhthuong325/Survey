<style>
    .card {
        transition: transform 0.3s;
    }

    .card:hover {
        transform: scale(1.05);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .user-color {
        color: white;
        padding: 5px;
        border-radius: 5px;
    }
</style>

<main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4" id="formQuestion">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2"><i class="fa fa-binoculars" aria-hidden="true"></i> Tra cứu phản hồi người dùng</h1>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-5 d-flex align-items-center">
                <form method="POST" action="" class="d-flex">
                    <div class="form-group me-2">
                        <label for="monthFilter" class="me-2">Chọn tháng:</label>
                        <select class="form-control" id="monthFilter" name="monthFilter">
                            <option value="">Tất cả</option>
                            <option value="01">Tháng 1</option>
                            <option value="02">Tháng 2</option>
                            <option value="03">Tháng 3</option>
                            <option value="04">Tháng 4</option>
                            <option value="05">Tháng 5</option>
                            <option value="06">Tháng 6</option>
                            <option value="07">Tháng 7</option>
                            <option value="08">Tháng 8</option>
                            <option value="09">Tháng 9</option>
                            <option value="10">Tháng 10</option>
                            <option value="11">Tháng 11</option>
                            <option value="12">Tháng 12</option>
                            <!-- Thêm các tùy chọn tháng khác -->
                        </select>
                    </div>
                    <div class="d-flex ml-3 align-items-center">
                        <button type="submit" class="btn btn-primary mx-auto">Lọc</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
    // Xử lý khi người dùng gửi form
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $monthFilter = $_POST['monthFilter'];

        // Lọc mẫu phản hồi theo tháng nếu có lựa chọn
        $filteredFeedbacks = array();
        if (!empty($monthFilter)) {
            foreach ($arrFeedback as $feedback) {
                $feedbackMonth = date('m', strtotime($feedback['feedbackedAt']));
                if ($feedbackMonth === $monthFilter) {
                    $filteredFeedbacks[] = $feedback;
                }
            }
        } else {
            $filteredFeedbacks = $arrFeedback;
        }
    } else {
        // Mặc định hiển thị tất cả mẫu phản hồi
        $filteredFeedbacks = $arrFeedback;
    }
    ?>

    <?php if (!empty($filteredFeedbacks)) : ?>
        <div class="container">
            <div class="row">
                <?php
                // Lưu trữ màu sắc tương ứng với từng user_name
                $userColors = array();
                foreach ($filteredFeedbacks as $feedback) {
                    $userName = $feedback['userName'];
                    if (!array_key_exists($userName, $userColors)) {
                        $minBrightness = 150; // Giá trị độ sáng tối thiểu (0-255)
                        // Tạo màu ngẫu nhiên với độ sáng cao hơn
                        $userColors[$userName] = sprintf('#%02X%02X%02X', mt_rand($minBrightness, 255),
                            mt_rand($minBrightness, 255), mt_rand($minBrightness, 255));
                    }
                }
                ?>
                <?php foreach ($filteredFeedbacks as $feedback) : ?>
                    <?php
                    $userName = $feedback['userName'];
                    $userColor = $userColors[$userName];
                    ?>
                    <div class="col-md-4">
                        <div class="card mb-4" style="background-color: <?= $userColor; ?>">
                            <div class="card-body">
                                <h5 class="btn btn-info">Tài khoản phản hồi - <?= $feedback['userName']; ?></h5>
                                <h4 class="card-subtitle mb-2 text-warning"><?= getFormSurveyFullname($feedback['userName']); ?></h4>
                                <h6 class="card-subtitle mb-2 text-dark"><?= getFormSurveyTitle($feedback['formSurveyID']); ?></h6>
                                <p class="card-text">Ngày phản hồi: <?= $feedback['feedbackedAt']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php else : ?>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="alert alert-warning" role="alert">
                        Không tìm thấy kết quả cho user_name: <?= $userName; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php
// Hàm truy vấn để lấy title từ bảng form_surveys
function getFormSurveyTitle($formSurveyId)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "survey";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    $sql = "SELECT title FROM form_surveys WHERE id = $formSurveyId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["title"];
    } else {
        return "Không tìm thấy mẫu phản hồi của người dùng này";
    }

    $conn->close();
}
?> 

<?php
// Hàm truy vấn để lấy fullName từ bảng user_feedbacks
function getFormSurveyFullname($userName)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "survey";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    $sql = "SELECT full_name FROM users u WHERE user_name = '$userName'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row["full_name"];
    } else {
        return "Không tìm thấy tên cụ thể cho người dùng tài khoản này";
    }

    $conn->close();
}
?>

</main>
