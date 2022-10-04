<?php
$idUser = $_SESSION['idUser'];
$getUser = "SELECT * FROM user WHERE id=$idUser";
$getPosition = "SELECT * FROM position";
$position = getAll($getPosition);
$user = getOne($getUser);
if (isset($_POST['btn-profile'])) {
    
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
                        <input type="file" id="img" hidden>
                        <p class="profile-name"><?= $user['username'] ?></p>
                        <span class="position"><?php foreach ($position as $value) {
                                                    if ($value['id_position'] == $user['id_position']) {
                                                        echo $value['position_name'];
                                                    }
                                                } ?></span>
                    </div>
                </div>
                <div class="profile-right">
                    <div class="box-form">

                        <div class="row">
                            <label class="lable-profile" for="profiel-username">UserName : </label>
                            <input value="<?= isset($_POST['username']) ? $_POST['username'] : $user['username'] ?>" autocomplete="off" id="profiel-username" type="text" name="username" value="" class=" input-profile">
                        </div>
                        <div class="row">
                            <label class="lable-profile" for="profile-email">Email : </label>
                            <input value="<?= isset($_POST['email']) ? $_POST['email'] : $user['email'] ?>" autocomplete="off" id="profile-email" type="text" name="email" value="" class=" input-profile">
                        </div>
                        <div class="row">
                            <label class="lable-profile" for="profile-password">Password : </label>
                            <input value="<?= isset($_POST['password']) ? $_POST['password'] : $user['password'] ?>" type="password" id="profile-password" name="password" value="" class="input-profile">
                            <span class="material-symbols-outlined eye">
                                visibility
                            </span>
                        </div>
                        <div class="row repass">
                            <label class="lable-profile" for="profile-repassword">Re-Password : </label>
                            <input value="<?= isset($_POST['re-password']) ? $_POST['re-password'] : "" ?>" type="password" id="profile-repassword" name="re-password" value="" class=" input-profile">
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