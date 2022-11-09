<!-- check auth -->
<title>Trang quản trị khảo sát trực tuyến - trường Đại học Phú Yên</title>
<?php include "./views/layouts/page_header.php"; ?>
<link rel="stylesheet" href="./assets/css/admin.css">
    <section class="row">
      <aside class="col-5">
        <nav>
            <div class="sidebar">
                <div class="logo">
                    <span class="logo-name">Administrator Desk</span>
                    <i class='bx bxs-dashboard menu-icon'></i>
                </div>
                
                <div class="sidebar-content">
                    <ul class="lists">
                        <li class="list">
                            <a href="#" class="nav-link">
                                <i class='bx bx-book-content ico-item'></i>
                                <span class="link">Dashboard</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href="#" class="nav-link">
                                <i class='bx bx-user ico-item'></i>
                                <span class="link">Account & Role</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href="#" class="nav-link">
                                <i class='bx bxs-school ico-item'></i>
                                <span class="link">Department</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href="#" class="nav-link">
                                <i class='bx bx-question-mark ico-item'></i>
                                <span class="link">Q&A</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href="#" class="nav-link">
                                <i class='bx bx-note ico-item'></i>
                                <span class="link">Available Form</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href="#" class="nav-link">
                                <i class='bx bx-bar-chart-alt-2 ico-item' ></i>
                                <span class="link">Statistics</span>
                            </a>
                        </li>
                    </ul>

                    <div class="bottom-content">
                        <li class="list">
                            <a href="#" class="nav-link">
                                <i class='bx bx-cog ico-item'></i>  
                                <span class="link">Settings</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href="#" class="nav-link">
                                <i class='bx bx-log-out ico-item'></i>   
                                <span class="link">Logout</span>
                            </a>
                        </li>
                    </div>
                </div>
            </div>
        </nav>
      </aside>
      <article class="col-15">
      <img class="card-img-top" src="./assets/images/CardA.png" alt="Pattern 1">
      </article>
    </section>   
    <?php include "./views/layouts/page_footer.php"; ?>   
</body>
</html>