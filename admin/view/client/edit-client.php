<?php
if(isset($_GET['ID'])){
    $getID = $_GET['ID'];
    $queryUserOne = "SELECT * FROM user WHERE id=$getID";
    $oneUser = getOne($queryUserOne);
}

if (isset($_POST['add-clients'])) {
    $erro = [];
    $queryUser = "SELECT * FROM user";
    $getAllUser = getAll($queryUser);

    if (!empty($_POST['username'])) {
        $username = $_POST['username'];
    } else {
        $erro['name'] = "Vui lòng nhập tên";
        $username = "";
    }

    if (!empty($_POST['email'])) {
        $message = validateEmail($_POST['email']);
        if(!empty($message)){
            $erro['email'] = $message;
            $email = $_POST['email'];
        }else{
            $check = $_POST['email'];
        }
        // kiểm tra xem có user nào tồn tại với email tài khoản này không
        foreach ($getAllUser as $key => $value) {
            if (isset($check) && $check == $value['email'] && $value['id'] != $getID) {
                $erro['email'] = "Email đã được đăng kí bởi tài khoản khác.";
            } else if (isset($check)) {
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
    }

    if (!empty($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $erro['password'] = "Vui lòng nhập password";
        $password = "";
    }

    if (!empty($_POST['re-password'])) {
        $rePassword = $_POST['re-password'];
        if (isset($password) && $password != $rePassword) {
            $erro['re-password'] = "Mật khẩu không khớp.";
        }
    } else {
        $erro['re-password'] = "Vui lòng nhập lại password";
        $rePassword = "";
    }
    if (empty($erro) && $_FILES['avatar']['size'] > 0) {
        $queryUpdate = "UPDATE user SET username='$username', email='$email', password='$password', avatar='$avatar', id_position=2 WHERE id = $getID";
        move_uploaded_file($_FILES['avatar']['tmp_name'], "./src/img/" . $avatar);
    } else if ($_FILES['avatar']['size'] == 0 && empty($erro)) {
        $queryUpdate = "UPDATE user SET username='$username', email='$email', password='$password', id_position=2 WHERE id = $getID";
    }
    if (isset($queryUpdate)) {
        connect($queryUpdate);
        header("location:index.php?action=clients&&successful");
    }
}
?>
<main>
    <div class="content-box">
        <p class="title">Thêm Nhân Viên</p>
        <form action="index.php?action=edit-clients&&ID=<?=$_GET['ID']?>" class="form-add" method="POST" enctype="multipart/form-data">
            <div class="form-left">
                <input type="text" name="getID" value="<?= $getID ?>" hidden>
                <input value="<?= isset($username) ? $username : $oneUser['username'] ?>" type="text" name="username" placeholder="Username">
                <span class="erro"><?= isset($erro['name']) ? $erro['name'] : "" ?></span>

                <input value="<?= isset($email) ? $email : $oneUser['email'] ?>" type="text" name="email" placeholder="Email">
                <span class="erro"><?= isset($erro['email']) ? $erro['email'] : "" ?></span>

                <input value="<?= isset($password) ? $password : $oneUser['password'] ?>" type="password" name="password" placeholder="Password">
                <span class="erro"><?= isset($erro['password']) ? $erro['password'] : "" ?></span>

                <input value="<?= isset($rePassword) ? $rePassword : $oneUser['password'] ?>" type="password" name="re-password" placeholder="Re-password">
                <span class="erro"><?= isset($erro['re-password']) ? $erro['re-password'] : "" ?></span>

            </div>
            <div class="form-right">
                <label for="img">
                    <span class="material-symbols-outlined">
                        add_photo_alternate
                    </span>
                    <input type="text" name="name-avatar" value="<?=$oneUser['avatar']?>" hidden>
                    <img style="z-index: 10;" src="./src/img/<?=$oneUser['avatar']?>" alt="">
                </label>
                <input type="file" name="avatar" id="img" hidden>
                <span class="erro"><?= isset($erro['avatar']) ? $erro['avatar'] : "" ?></span>
            </div>
            <div class="form-bottom">
                <button type="submit" name="add-clients" class="btn-form">Lưu chỉnh sửa<span></span></button>
            </div>
        </form>
    </div>
</main>