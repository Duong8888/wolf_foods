<!-- search -->
<?php
if (isset($_POST['btn'])) {
  $keyWord = $_POST['search'];
  header("location:index.php?action=all-product&&keyWord=$keyWord");
}
if (isset($_SESSION['idUser'])) {
  $idUser = $_SESSION['idUser'];
  // lấy ra user đã đăng nhập và hệ thống
  $user = "SELECT * FROM user WHERE id_position = 3 AND id = $idUser";
  $userLogIn = getOne($user);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- link bootsrap (11) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- link boxicons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="../src/css/profile.css">
  <link rel="stylesheet" href="../src/css/style__login-regis.css">
  <link rel="stylesheet" href="../src/css/style__user.css">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <title>WOLF FOOD</title>
  <!-- icon -->
  <link rel="shortcut icon" href="../../admin/src/img/logo-2.png" type="image/x-icon">
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
      <a href="index.php">
        <img src="../src/img/img__header/logo.png" alt="" class="logo">
      </a>
      <form action="index.php" class="search" method="POST">
        <input autocomplete="off" value="<?= isset($_GET['keyWord']) ? $_GET['keyWord'] : "" ?>" type="text" name="search" class="search__input" placeholder="Bạn cần tìm gì? ">
        <button class="search__button" name="btn" type="submit"><img src="../src/img/img__header/seach.svg" alt=""></button>
      </form>
      <div class="hotline">
        <!-- <img src="./img/cart.png" alt="" class="hotline__logo"> -->
        <div class="hotline__content">
          <p class="hotline__text">Hotline</p>
          <a class="phone_number">1900 6750</a>
        </div>
      </div>
      <div class="account">
        <img src="<?= isset($userLogIn['avatar']) ? "../../admin/src/img/" . $userLogIn['avatar'] : "../src/img/img__header/user.png" ?>" alt="" class="account__logo">
        <p class=""><?= isset($userLogIn['username']) ? $userLogIn['username'] : "Tài khoản" ?></p>
        <div class="account__hover">
          <?php if (!isset($_SESSION['idUser'])) { ?>
            <a href="index.php?action=sign_in" class="sign__in">Đăng nhập</a>
            <a href="index.php?action=sign_up" class="sign__up">Đăng ký</a>
          <?php } else { ?>
            <a href="index.php?action=profile" class="sign__up">Hồ sơ</a>
            <a href="index.php?action=sign_up" class="sign__up">Gỏ hàng</a>
            <a href="../../admin/index.php?action=log-out" class="sign__up">Đăng suất</a>
          <?php } ?>
        </div>
      </div>
      <!-- <div class="cart">
        <img src="../src/img/img__header/cart.png" alt="" class="cart__logo">
        <p>Giỏ hàng</p>
      </div> -->
    </div>
    <!-- end mid header -->
    <ul class="menu">
      <li><a href="index.php">Trang chủ</a></li>
      <li><a href="index.php?action=all-product&&page=1">Sản phẩm</a></li>
      <li><a href="#">Giới thiệu</a></li>
      <li><a href="index.php?action=contact">Liên hệ</a></li>
    </ul>
    <div class="line"></div>
    <!--end menu  -->
  </header>