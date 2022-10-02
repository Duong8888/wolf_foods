<?php
require '../view/header.php';
?>
<main>
  <div class="main__wrap--register">
    <div class="title">
      <a href="../view/login.php?action=sign_in" class="title__login--register">Đăng nhập</a>
      <a href="../view/register.php?action=sign_up" class="title__register--register">Đăng ký</a>
    </div>
    <div class="slogan__login">Điền các thông tin bên dưới để đăng ký tài khoản Wolf Food</div>
    <form action="" class="form" method="POST">
      <div class="username">
        <label for="">Username</label>
        <input type="text" class="username__input" placeholder="Nhập Username" name="username">
      </div>
      <div class="email">
        <label for="">Email</label>
        <input type="email" class="email__input" placeholder="Nhập Email" name="email">
      </div>
      <div class="password">
        <label for="">Password</label>
        <input type="password" class="password__input" placeholder="Nhập Password" name="password">
      </div>
      <div class="re-password">
        <label for="">Re-Password</label>
        <input type="password" class="re-password__input" placeholder="Xác nhận mật khẩu" name="re-password">
      </div>
      <div class="avatar">
        <label for="">Avatar</label>
        <input type="file" class="password__input" name="avatar">
      </div>
      <button class="button__login" name="register">Đăng ký</button>
    </form>
  </div>
</main>
<?php
require '../view/footer.php';
?>