<?php
if (isset($_REQUEST['save_as'])) {
  $erro = [];
  $id = $_SESSION['idUser'];
  $userName = $_REQUEST['username'];
  if (empty($userName)) {
    $erro['userName'] = 'Vui lòng nhập tên';
  }
  $pasword = $_REQUEST['password'];
  if (empty($pasword)) {
    $erro['pasword'] = 'Vui lòng nhập password';
  }
  if ($_FILES['avatarUser']['size'] > 0) {
    $ext = pathinfo($_FILES['avatarUser']['name'], PATHINFO_EXTENSION);
    if ($ext == 'png' || $ext == 'jpg' || $ext == 'svg' || $ext == 'webp' || $ext == 'jpeg') {
      $avatarUser = $_FILES['avatarUser']['name'];
      move_uploaded_file($_FILES['avatarUser']['tmp_name'], "../../../admin/src/img/" . $avatarUser);
    } else {
      $erro['avatar'] = 'Ảnh không đúng định rạng';
    }
  }
  if (empty($erro) && $_FILES['avatarUser']['size'] > 0) {
    $update = "UPDATE user SET username = '$userName', password = '$pasword', avatar = '$avatarUser' WHERE id=$id";
  } else if (empty($erro)) {
    $update = "UPDATE user SET username = '$userName', password = '$pasword' WHERE id=$id";
  }
  if (isset($update)) {
    connect($update);
    header("location:index.php?action=profile&&successful");
  }
}
?>
<main class="main_prf">
  <form action="index.php?action=profile" method="POST" enctype="multipart/form-data">
    <div class="container">
      <div class="main-body">
        <div class="row gutters-sm">
          <div class="col-md-4 mb-3">
            <!-- card avatar -->
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <label class="clickImg">
                    <img src="<?= isset($userLogIn['avatar']) ? "../../admin/src/img/" . $userLogIn['avatar'] : "https://bootdey.com/img/Content/avatar/avatar7.png" ?>" alt="Admin" class="rounded-circle">
                  </label>
                  <input type="file" id="img" name="avatarUser" hidden>
                  <span style="color: red;"><?= isset($erro['avatar']) ? $erro['avatar'] : "" ?></span>
                  <div class="mt-3">
                    <h4><?= $userLogIn['username'] ?></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- card profile main -->
          <div class="col-md-8">
            <div class="card mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">UserName</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input class="input" readonly type="text" name="username" value="<?=isset($userName)?$userName:$userLogIn['username'] ?>">
                    <span class="erro-profile"><?= isset($erro['userName']) ? $erro['userName'] : "" ?></span>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input class="input" readonly type="text" name="email" value="<?= $userLogIn['email'] ?>">
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Password</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input class="input" readonly type="password" name="password" value="<?=isset($pasword)?$pasword:$userLogIn['password'] ?>">
                    <span class="erro-profile"><?= isset($erro['pasword']) ? $erro['pasword'] : "" ?></span>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-12">
                    <button type="button" class="btn btn-info new ">Chỉnh sửa</button>
                    <button type="submit" class="btn btn-info " name="save_as">Lưu</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end card prf -->
        </div>

      </div>
    </div>
  </form>
</main>