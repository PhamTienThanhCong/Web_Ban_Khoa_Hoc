<!DOCTYPE html>
<html lang="vi" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo $link_sever ?>/public/css/admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="<?php echo $link_sever ?>/public/images/system/Logo.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> <?php echo $name_page ?> </title>
</head>
<style>
    <?php echo "#" . $view ?> {
        background: #081D45;
    }
</style>

<body>
    <!-- slider chức năng -->
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bxl-c-plus-plus"></i>
            <span class="logo_name">Be Cong</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="<?php echo $link_sever ?>/seller/overview" id="overViewSeller">
                    <i class="bx bx-pie-chart-alt-2"></i>
                    <span class="links_name">Tổng quan chung</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $link_sever ?>/seller/create_course" id="createCourse">
                    <i class="bx bx-book-add"></i>
                    <span class="links_name">Tạo khóa học mới</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $link_sever ?>/seller/my_course" id="myCourse">
                    <i class="bx bx-book-bookmark"></i>
                    <span class="links_name">Quản lý khóa học</span>
                </a>
            </li>
            <li>
                <a href="<?php echo $link_sever ?>/seller/manage_account" id="managerAccount">
                    <i class="bx bx-cog"></i>
                    <span class="links_name">Tài khoản</span>
                </a>
            </li>
            <li class="log_out">
                <a href="<?php echo $link_sever ?>/seller/overview"">
            <i class=" bx bx-log-out"></i>
                    <span class="links_name">Đăng xuất</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- slider chức năng -->

    <section class="home-section">
        <!-- header chức năng -->
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
                <span class="dashboard">Chức năng</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search..." />
                <i class="bx bx-search"></i>
            </div>
            <!-- Tài khoản -->
            <div class="profile-details">
                <img src="https://i.pinimg.com/originals/56/cd/60/56cd60a92382795af872481783fbe06d.jpg" alt="" />
                <span class="admin_name">Cong nè</span>
                <i class="bx bx-chevron-down"></i>
            </div>
            <!-- Tài khoản -->
        </nav>
        <!-- header chức năng -->

        <!-- Content -->
        <div class="home-content">
            <?php require_once "./src/views/content/" . $view . ".php" ?>

            <!-- footer -->
            <div class="sales-boxes" style="margin-top: 25px">
                <div class="recent-sales box" style="width: 100%; display: block">
                    <div class="title">Chân trang</div>
                    <div class="sales-details">Nội dung</div>
                </div>
            </div>
            <!-- footer -->
        </div>
        <!-- Content -->
    </section>

</body>
<script src="<?php echo $link_sever ?>/public/javascript/admin.js"></script>

</html>