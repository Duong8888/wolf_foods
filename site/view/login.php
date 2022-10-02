<?php
require '../view/header.php';
?>
<main>
  <div class="main__wrap--login">
    <div class="title">
      <a href="../view/login.php?action=sign_in" class="title__login">Đăng nhập</a>
      <a href="../view/register.php?action=sign_up" class="title__register">Đăng ký</a>
    </div>
    <div class="slogan__login">Vui lòng nhập Username và Mật khẩu để đăng nhập Wolf Food</div>
    <form action="" class="form" method="POST">
      <div class="username">
        <label for="">Username</label>
        <input type="text" class="username__input" placeholder="Nhập Username">
      </div>
      <div class="password">
        <label for="">Password</label>
        <input type="password" class="password__input" placeholder="Nhập Password">
      </div>
      <p><a class="forgot__pasword" href="#">Quên mật khẩu?</a></p>
      <button class="button__login">Đăng nhập</button>
      <p class="commit">Wolf Food cam kết bảo mật và sẽ không bao giờ đăng
        hay chia sẻ thông tin mà chưa có được sự đồng ý của bạn.</p>
    </form>
  </div>
</main>
<?php
require '../view/footer.php';
?>