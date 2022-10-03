<?php
$queryUser = "SELECT * FROM user";
$getAllUser = getAll($queryUser);
if (isset($_POST['add-admin'])) {
    $erro = [];
    if (!empty($_POST['username'])) {
        $username = $_POST['username'];
    } else {
        $erro['name'] = "Vui lòng nhập tên";
    }

    if (!empty($_POST['email'])) {
        $message = validateEmail($_POST['email']);
        !empty($message) ? $erro['email'] = $message : $check = $_POST['email'];
        // kiểm tra xem có user nào tồn tại với email tài khoản này không
        foreach ($getAllUser as $key => $value) {
            if (isset($check) && $check == $value['email']) {
                $erro['email'] = "Email đã được đăng kí bởi tài khoản khác.";
            }else if(isset($check)){
                $email = $check;
            }
        }
    } else {
        $erro['email'] = "Vui lòng nhập email";
    }

    if ($_FILES['avatar']['size'] > 0) {
        $format = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        if ($format == 'png' || $format == 'jpg' || $format == 'svg' || $format == 'webp' || $format == 'jpeg') {
            $avatar = $_FILES['avatar']['name'];
        } else {
            $erro['avatar'] = "Ảnh không đúng định dạng.";
        }
    } else {
        $erro['avatar'] = "vui lòng nhập ảnh nhân viên.";
    }

    if (!empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $erro['password'] = "Vui lòng nhập password";
    }

    if (!empty($_POST['re-password'])) {
        $rePassword = $_POST['re-password'];
        if (isset($password) && $password != $rePassword) {
            $erro['re-password'] = "Mật khẩu không khớp.";
        }
    } else {
        $erro['re-password'] = "Vui lòng nhập lại password";
    }
    if (empty($erro)) {
        $queryAdd = "INSERT INTO user(username,email,password,avatar,id_position) VALUE ('$username','$email','$password','$avatar','2')";
        connect($queryAdd);
        move_uploaded_file($_FILES['avatar']['tmp_name'], "./src/img/" . $avatar);
        header("location:index.php?action=admin&&successful");
    }
}
?>
<main>
    <div class="content-box">
        <p class="title">Thêm Nhân Viên</p>
        <form action="index.php?action=add-admin" class="form-add" method="POST" enctype="multipart/form-data">
            <div class="form-left">
                <input value="<?=isset($username)?$username:""?>" type="text" name="username" placeholder="Username">
                <span class="erro"><?= isset($erro['name']) ? $erro['name'] : "" ?></span>

                <input value="<?=isset($email)?$email:""?>" type="text" name="email" placeholder="Email">
                <span class="erro"><?= isset($erro['email']) ? $erro['email'] : "" ?></span>

                <input value="<?=isset($password)?$password:""?>" type="password" name="password" placeholder="Password">
                <span class="erro"><?= isset($erro['password']) ? $erro['password'] : "" ?></span>

                <input value="<?=isset($rePassword)?$rePassword:""?>" type="password" name="re-password" placeholder="Re-password">
                <span class="erro"><?= isset($erro['re-password']) ? $erro['re-password'] : "" ?></span>

            </div>
            <div class="form-right">
                <label for="img">
                    <span class="material-symbols-outlined">
                        add_photo_alternate
                    </span>
                    <img src="" alt="">
                </label>
                <input type="file" name="avatar" id="img" hidden>
                <span class="erro"><?= isset($erro['avatar']) ? $erro['avatar'] : "" ?></span>
            </div>
            <div class="form-bottom">
                <button type="submit" name="add-admin" class="btn-form">Thêm Nhân viên<span></span></button>
            </div>
        </form>
    </div>
</main>