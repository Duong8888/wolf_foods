<?php
if (isset($_POST['add-categories'])) {
    $erro = [];
    if ($_FILES['avatar']['size'] > 0) {
        $format = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        if ($format == 'png' || $format == 'jpg' || $format == 'svg' || $format == 'webp' || $format == 'jpeg') {
            $img = $_FILES['avatar']['name'];
        } else {
            $erro['img'] = "Ảnh không đúng định rạng.";
        }
    } else {
        $erro['img'] = "Vui lòng chọn ảnh.";
    }

    if (!empty($_POST['name-categories'])) {
        $name = $_POST['name-categories'];
    } else {
        $erro['name'] = "Vui lòng nhập tên danh mục.";
    }
    if (empty($erro)) {
        $query = "INSERT INTO categories(image,category_name) VALUE ('$img','$name')";
        connect($query);
        move_uploaded_file($_FILES['avatar']['tmp_name'], "./src/img/" . $img);
        header("location:index.php?action=categories");
    }
}
?>
<main>
    <div class="content-box">
        <p class="title">Thêm danh mục</p>
        <form action="" class="form-add" method="POST" enctype="multipart/form-data">
            <div class="form-right form-right-2">
                <label for="img">
                    <span class="material-symbols-outlined">
                        add_photo_alternate
                    </span>
                    <img src="" alt="">
                </label>
                <input type="file" value="" name="avatar" id="img" hidden>
                <span class="erro"><?= isset($erro['img']) ? $erro['img'] : "" ?></span>
                <input type="text" value="<?= isset($name) ? $name : "" ?>" name="name-categories" placeholder="Nhập tên danh mục">
                <span class="erro"><?= isset($erro['name']) ? $erro['name'] : "" ?></span>
                <button type="submit" name="add-categories" class="btn-form">Thêm danh mục<span></span></button>
            </div>
        </form>
    </div>
</main>