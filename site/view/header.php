<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../src/css/style__user.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="../src/css/style__login-regis.css">
  <title>Wolf Food</title>
</head>

<body>

  <header>
    <div class="top-header">
      <div class="top_header--left">
        <a href="#" class="left__item1">Tìm cửa hàng</a>
        <a href="#" class="left__item2">Hỗ trợ mua hàng</a>
      </div>
      <div class="top_header--right">
        <a href="#" class="right__item1">Sản phẩm đã xem</a>
        <a href="#" class="right__item2">Yêu thích</a>
      </div>
    </div>
    <div class="line"></div>
    <!-- end top header -->
    <div class="mid-header">
      <a href="../view/main_index.php">
        <img src="../src/img/img__header/logo.png" alt="" class="logo">
      </a>
      <form action="" class="search">
        <input type="text" class="search__input" placeholder="Bạn cần tìm gì? ">
        <button class="search__button"><img src="../src/img/img__header/seach.svg" alt=""></button>
      </form>
      <div class="hotline">
        <!-- <img src="./img/cart.png" alt="" class="hotline__logo"> -->
        <div class="hotline__content">
          <p>Hotline</p>
          <a class="phone_number">1900 6750</a>
        </div>
      </div>
      <div class="account">
        <img src="../src/img/img__header/user.png" alt="" class="account__logo">
        <p class="">Tài khoản</p>
        <div class="account__hover">
          <a href="../view/login.php?action=sign_in" class="sign__in">Đăng nhập</a>
          <a href="../view/register.php?action=sign_up" class="sign__up">Đăng ký</a>
        </div>
      </div>
      <div class="cart">
        <img src="../src/img/img__header/cart.png" alt="" class="cart__logo">
        <p>Giỏ hàng</p>
      </div>
    </div>
    <!-- end mid header -->
    <ul class="menu">
      <li><a href="../view/main_index.php">Trang chủ</a></li>
      <li><a href="#">Sản phẩm</a></li>
      <li><a href="#">Giới thiệu</a></li>
      <li><a href="../view/contact.php?action=contact">Liên hệ</a></li>
    </ul>
    <div class="line"></div>
    <!--end menu  -->
  </header>