<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WOLF FOOD</title>
    <!-- link css -->
    <link rel="stylesheet" href="./src/css/style.css">
    <!-- link icon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- icon web -->
    <link rel="shortcut icon" href="./src/img/logo-2.png" type="image/x-icon">
</head>

<body>
    <div class="container">
        <header>
        <div class="admin">
                <div class="admin__info">
                    <div class="admin__info--avatar">
                        <img src="./src/img/img-11.png" alt="">
                    </div>
                    <p class="admin__info--name">Nguyễn Ánh Dương</p>
                </div>
            </div>
            <nav class="sidebar">
                <p class="sidebar__logo"><img src="./src/img/logo.webp" alt=""></p>
                <ul class="sidebar__menu">
                    <li class="sidebar__menu--item" id="dashboard">
                        <a href="index.php?action=dashboard">
                            <i class='bx bxs-dashboard'></i>
                            Bảng Điều
                            khiển</a>
                    </li>
                    <li class="sidebar__menu--item" id="products">
                        <a href="index.php?action=products">
                            <i class='bx bx-store-alt'></i>
                            Quản lý sản
                            phẩn</a>
                    </li>
                    <li class="sidebar__menu--item" id="categories">
                        <a href="index.php?action=categories">
                            <i class='bx bx-detail'></i>
                            Quản lý danh
                            mục</a>
                    </li>
                    <li class="sidebar__menu--item" id="admin">
                        <a href="index.php?action=admin">
                            <i class='bx bxs-user-detail'></i>
                            Quản lý nhân
                            viên</a>
                    </li>
                    <li class="sidebar__menu--item" id="clients">
                        <a href="index.php?action=clients">
                            <i class='bx bxs-user-account'></i>
                            Quản lý khác
                            hàng</a>
                    </li>
                    <li class="sidebar__menu--item" id="comment">
                        <a href="index.php?action=comment">
                            <i class='bx bx-chat'></i>
                            Quản lý bình
                            luận</a>
                    </li>
                    <li class="sidebar__menu--item out">
                        <a href="index.php?action=out">
                            <i class='bx bx-log-out-circle'></i>
                            Đăng suất</a>
                    </li>
                </ul>
            </nav>
        </header>