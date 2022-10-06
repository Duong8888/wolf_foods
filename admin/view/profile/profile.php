<?php
$idUser = $_SESSION['idUser'];
$getUser = "SELECT * FROM user WHERE id=$idUser";
$getPosition = "SELECT * FROM position";
$position = getAll($getPosition);
$user = getOne($getUser);
// lấy tên và id của user đăng nhập để hiển thị
foreach ($position as $value) {
    if ($user['id_position'] == $value['id_position']) {
        $positionName = $value['position_name'];
        $idPosition = $value['id_position'];
    }
}
if (isset($_POST['btn-profile'])) {
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
        if (!empty($message)) {
            $erro['email'] = $message;
            $email = $_POST['email'];
        } else {
            $check = $_POST['email'];
        }
        // kiểm tra xem có user nào tồn tại với email tài khoản này không
        foreach ($getAllUser as $key => $value) {
            if (isset($check) && $check == $value['email'] && $value['id'] != $idUser) {
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
            $erro['password'] = "Mật khẩu không khớp.";
        }
    }
    if (empty($erro) && $_FILES['avatar']['size'] > 0) {
        $queryUpdate = "UPDATE user SET username='$username', email='$email', password='$password', avatar='$avatar', id_position=$idPosition WHERE id = $idUser";
        move_uploaded_file($_FILES['avatar']['tmp_name'], "./src/img/" . $avatar);
    } else if ($_FILES['avatar']['size'] == 0 && empty($erro)) {
        $queryUpdate = "UPDATE user SET username='$username', email='$email', password='$password', id_position=$idPosition WHERE id = $idUser";
    }
    if (isset($queryUpdate)) {
        connect($queryUpdate);
        header("location:index.php?action=profile&&successful");
    }
}
?>
<main>
    <div class="content-box">
        <form action="index.php?action=profile" method="POST" enctype="multipart/form-data">
            <div class="profile">
                <div class="profile-left">
                    <div class="animation-box"></div>
                    <div class="box-profile">
                        <label class="profile-avatar">
                            <img src="./src/img/<?= $user['avatar'] ?>" alt="">
                        </label>
                        <span class="erro" style="font-size: 15px;"><?=isset($erro['avatar'])?$erro['avatar']:""?></span>
                        <input type="file" name="avatar" id="img" hidden>
                        <p class="profile-name"><?= $user['username'] ?></p>
                        <span class="position"><?= $positionName ?></span>
                    </div>
                </div>
                <div class="profile-right">
                    <div class="box-form">

                        <div class="row">
                            <label class="lable-profile" for="profiel-username">UserName : </label>
                            <input value="<?= isset($_POST['username']) ? $_POST['username'] : $user['username'] ?>" autocomplete="off" id="profiel-username" type="text" name="username" value="" class=" input-profile" placeholder="<?=isset($erro['name'])?$erro['name']:""?>">
                        </div>
                        <div class="row">
                            <label class="lable-profile" for="profile-email">Email : </label>
                            <input value="<?= isset($erro['email']) ? "": $user['email'] ?>" autocomplete="off" id="profile-email" type="text" name="email" value="" class=" input-profile" placeholder="<?=isset($erro['email'])?$erro['email']:""?>">
                        </div>
                        <div class="row">
                            <label class="lable-profile" for="profile-password">Password : </label>
                            <input value="<?= isset($erro['password']) ? "" : $user['password'] ?>" type="password" id="profile-password" name="password" value="" class="input-profile" placeholder="<?=isset($erro['password'])?$erro['password']:""?>">
                            <span class="material-symbols-outlined eye">
                                visibility
                            </span>
                        </div>
                        <div class="row repass">
                            <label class="lable-profile" for="profile-repassword">Re-Password : </label>
                            <input value="<?= isset($erro['password']) ? "" : $user['password'] ?>" type="password" id="profile-repassword" name="re-password" value="" class=" input-profile">
                            <span class="material-symbols-outlined eye">
                                visibility
                            </span>
                        </div>
                        <button type="button" name="" class="profile-edit">Edit</button>
                        <button type="submit" name="btn-profile">Save as</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>