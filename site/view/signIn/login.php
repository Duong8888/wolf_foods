<?php
if (isset($_POST['btn-logIn'])) {
  $getData = "SELECT * FROM user";
  $allUser = getAll($getData);
  !empty($_POST['email'])?$email = $_POST['email']: $email = "";
  !empty($_POST['password'])?$password = $_POST['password']: $password ="";
  login($allUser,$email,$password);
}
?>
<main>
  <div class="main__wrap--login">
    <div class="title">
      <a href="index.php?action=sign_in" class="title__login">Đăng nhập</a>
      <a href="index.php?action=sign_up" class="title__register">Đăng ký</a>
    </div>
    <div class="slogan__login">Vui lòng nhập Username và Mật khẩu để đăng nhập Wolf Food</div>
    <form action="index.php?action=sign_in" class="form" method="POST">
      <div class="username">
        <label for="">Email</label>
        <input type="text" name="email" class="username__input" placeholder="Nhập Email">
      </div>
      <div class="password">
        <label for="">Password</label>
        <input type="password" name="password" class="password__input" placeholder="Nhập Password">
      </div>
      <p><a class="forgot__pasword" href="#">Quên mật khẩu?</a></p>
      <button class="button__login" type="submit" name="btn-logIn">Đăng nhập</button>
      <p class="commit">Wolf Food cam kết bảo mật và sẽ không bao giờ đăng
        hay chia sẻ thông tin mà chưa có được sự đồng ý của bạn.</p>
    </form>
  </div>
</main>