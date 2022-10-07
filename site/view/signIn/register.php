<?php
require '../../model/validate.php';

$queryUser = "SELECT * FROM user";
$getAllUser = getAll($queryUser);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // $account = array();
  $error = checkEmty(array('username', 'email', 'password', 're-password'));
  if ($_POST['re-password'] != $_POST['password']) {
    $error['checkpass'] = '';
  }

  if (!empty($_POST['email'])) {
    $checkSame = $_POST['email'];
    foreach ($getAllUser as $key => $value) {
      if (isset($checkSame) && $value['email'] == $checkSame) {
        $error['same'] = '';
      }
    }
  }


  // validate img
  if (file_exists($_FILES['avatar']['tmp_name']) || is_uploaded_file($_FILES['avatar']['tmp_name'])) {
    $folder = "../src/img/img__user/";
    $fileName = $folder . basename($_FILES['avatar']['name']);
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

    if ($fileType != 'jpg' && $fileType != 'png' && $fileType != 'jpeg' && $fileType != 'webp') {
      $error['notImg'] = '';
      die();
    }
    if ($_FILES['avatar']['size'] > 20000000) {
      $error['filesize'] = '';
      die();
    }
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $fileName)) {
    } else {
      $error['avatar'] = '';
      die();
    }
  } else {
    $error['avatar'] = '';
  }
  // =============================================================
  // print_r($error);
  if (empty($error)) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $avatar = $_FILES['avatar']['tmp_name'];

    addUser($username, $password, $email, $avatar);
  }
}
?>
<main>
  <div class="main__wrap--register">
    <div class="title">
      <a href="index.php?action=sign_in" class="title__login--register">Đăng nhập</a>
      <a href="index.php?action=sign_up" class="title__register--register">Đăng ký</a>
    </div>
    <div class="slogan__login">Điền các thông tin bên dưới để đăng ký tài khoản Wolf Food</div>
    <form action="" class="form" method="POST" enctype="multipart/form-data">
      <div class="username">
        <label for="">Username</label>
        <input type="text" class="username__input" placeholder="Nhập Username" name="username">
        <?php
        if (isset($error['username'])) {
          echo "<p class='error'>Phải nhập username</p>";
        }
        ?>
      </div>
      <div class="email">
        <label for="">Email</label>
        <input type="email" class="email__input" placeholder="Nhập Email" name="email">
        <?php
        if (isset($error['email'])) {
          echo "<p class='error'>Phải nhập email</p>";
        } else if (isset($error['same'])) {
          echo "<p class='error'>Email đã có người đăng ký</p>";
        }
        ?>
      </div>
      <div class="password">
        <label for="">Password</label>
        <input type="password" class="password__input" placeholder="Nhập Password" name="password">
        <?php
        if (isset($error['password'])) {
          echo "<p class='error'>Phải nhập password</p>";
        }
        ?>
      </div>
      <div class="re-password">
        <label for="">Re-Password</label>
        <input type="password" class="re-password__input" placeholder="Xác nhận mật khẩu" name="re-password">
        <?php
        if (isset($error['re-password'])) {
          echo "<p class='error'>Phải nhập re-password</p>";
        }
        if (isset($error['checkpass'])) {
          echo "<p class='error'>Re-password không trùng với password</p>";
        }
        ?>
      </div>
      <div class="avatar">
        <label for="">Avatar</label>
        <input type="file" class="password__input" name="avatar">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          if (empty($fileName)) {
            echo "<p class='error'>Bạn phải chọn avatar</p>";
          } else if (isset($error['notImg'])) {
            echo "<p class='error'>Bạn phải chọn hình ảnh</p>";
          } else if (isset($error['filesize'])) {
            echo "<p class='error'>File có dung lượng quá lớn</p>";
          }
        }
        ?>
      </div>
      <button class="button__login" name="register">Đăng ký</button>
    </form>
    <?php
    if (isset($username) && isset($password) && isset($email) && isset($avatar)) {
      echo '<p class="succeed">Đăng ký tài khoản thành công!</p>';
    }
    ?>
  </div>
</main>