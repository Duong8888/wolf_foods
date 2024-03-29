<?php
isset($_SESSION['idUser']) ? $idUser = $_SESSION['idUser'] : header("location:../site/controller/index.php?action=sign_in");
$getUser = "SELECT * FROM user WHERE id=$idUser";
$user = getOne($getUser);
?>
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

<body <?= isset($_GET['successful']) ? 'onload="alert(' . "'Cập nhật dữ liệu thành công'" . ')"' : "" ?>>
    <div class="container">
        <header>
            <div class="admin">
                <a href="index.php?action=profile" class="admin__info">
                    <div class="admin__info--avatar">
                        <img src="./src/img/<?= $user['avatar'] ?>" alt="">
                    </div>
                    <p class="admin__info--name"><?= $user['username'] ?></p>
                </a>
            </div>
            <nav class="sidebar">
                <a href="../site/controller/index.php"><p class="sidebar__logo"><img src="./src/img/logo.webp" alt=""></p></a>
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
                            phẩm</a>
                    </li>
                    <li class="sidebar__menu--item" id="categories">
                        <a href="index.php?action=categories">
                            <i class='bx bx-detail'></i>
                            Quản lý danh
                            mục</a>
                    </li>
                    <!-- là quản lý thì mới có chức năng này -->
                    <?php if ($user['id_position'] == 1) : ?>
                        <li class="sidebar__menu--item" id="admin">
                            <a href="index.php?action=admin">
                                <i class='bx bxs-user-detail'></i>
                                Quản lý nhân
                                viên</a>
                        </li>
                    <?php endif ?>

                    <li class="sidebar__menu--item" id="clients">
                        <a href="index.php?action=clients">
                            <i class='bx bxs-user-account'></i>
                            Quản lý khách
                            hàng</a>
                    </li>
                    <li class="sidebar__menu--item" id="order">
                        <a href="index.php?action=order">
                            <i class='bx bx-star'></i>
                            Đơn hàng</a>
                    </li>
                    <li class="sidebar__menu--item" id="comment">
                        <a href="index.php?action=comment">
                            <i class='bx bx-chat'></i>
                            Quản lý bình
                            luận</a>
                    </li>
                    <li class="sidebar__menu--item out">
                        <a href="index.php?action=log-out">
                            <i class='bx bx-log-out-circle'></i>
                            Đăng xuất</a>
                    </li>
                </ul>
            </nav>
        </header>