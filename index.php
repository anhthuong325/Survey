<?php
include 'enums/UserType.php';
session_start();

if (!in_array($_SESSION['ROLE'], array(UserType::ADMIN, UserType::STUDENT))) {
    header("Location: login.php");
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--important link source from "https://bootstrapious.com/p/about-us-page"-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/main.css">    

      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"></script>

    <script src="js/main.js"></script>
    <script src="js/chart.js"></script>
    
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>

</head>
<body>
<?php include 'views/layouts/page_header.php';?>

  <div class="container-fluid">
    <div class="row">
      <aside class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">

          <h6 class="sidebar-heading">
            <span>Danh mục chính</span>
          </h6>

          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <i class="fa fa-tachometer"></i>
                Dashboard - Quản lý hệ thống
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="forms.html">
                <i class="fa fa-pencil-square-o"></i> Biểu mẫu khảo sát
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ui-elements.html">
                <i class="fa fa-desktop"></i> Khảo sát
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="tables.html">
                <i class="fa fa-table"></i> Câu hỏi
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="presentations.html">
                <i class="fa fa-bar-chart"></i> Thống kê phản hồi
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading">
            <span>Danh mục người dùng</span>
          </h6>

          <ul class="nav flex-column">
                <a class="nav-link" href="#">
                    <i class="fa fa-user-o"></i> Hồ sơ thông tin</i>
                </a>
            <li class="nav-item"><a class="nav-link" href="./login.php?logout=true"><i class="fa fa-sign-out"></i> Logout</a></li>
          </ul>

        </div>
      </aside>
      <main class="col-md-10 ml-sm-auto col-lg-10 pt-3 px-4">

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2"><i class="fa fa-tachometer"></i> Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <select class="custom-select">
              <option selected>Open this select menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 pr-0 mb-3">
            <div class="card-collapsible card">
              <div class="card-header">
                Table <i class="fa fa-caret-down caret"></i>
              </div>
              <div class="card-body">
                <table class="table">
                  <thead class="thead bg-primary text-white">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">First</th>
                      <th scope="col">Last</th>
                      <th scope="col">Handle</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Jacob</td>
                      <td>Thornton</td>
                      <td>@fat</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Larry</td>
                      <td>the Bird</td>
                      <td>@twitter</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 pr-0 mb-3">
            <div class="card-collapsible card">
              <div class="card-header">
                Nhập liệu câu hỏi <i class="fa fa-caret-down caret"></i>
              </div>
              <div class="card-body">
                <form>

                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nhập câu hỏi">
                    <div class="input-group-append">
                      <span class="input-group-text">@example.com</span>
                    </div>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Ticket title">
                  </div>

                  <div class="form-group">
                    <textarea class="form-control" placeholder="Ticket description" cols="30" rows="5"></textarea>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">
                        <i class="fa fa-send"></i>
                        Submit Ticket
                      </button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>

      </main>
    </div>
  </div>

<?php include 'views/layouts/page_footer.php';?>
</body>
</html>