<?php
require '../../model/validate.php';
?>

<main>
  <div class="main__wrap--login">
    <div class="slogan__contact">Bạn Có Câu Hỏi Cần Giải Đáp?</div>
    <form action="" class="form" method="POST">
      <div class="username">
        <label for="">Email</label>
        <input type="email" class="username__input" placeholder="Nhập Email" name="email" required>
        <?php
        if (isset($error['email'])) {
          echo "<p class='error'>Vui lòng nhập email</p>";
        }
        ?>
      </div>
      <div class="password">
        <label for="">Password</label>
        <input type="password" class="password__input" placeholder="Nhập Password" name="password">
        <?php
        if (isset($error['password'])) {
          echo "<p class='error'>Vui lòng nhập password</p>";
        }
        ?>
      </div>
      <div class="content">
        <label for="">Nội dung</label>
        <textarea name="" id="" cols="30" rows="10" placeholder="Nhập tin nhắn" name="content"></textarea>
      </div>
      <button class="button__login" name="btn__send">Gửi tin nhắn</button>
    </form>
  </div>
</main>