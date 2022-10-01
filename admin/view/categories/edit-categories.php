<?php
isset($_GET['IDcategories']) ? $getID = $_GET['IDcategories'] : "";
if (isset($getID)) {
    $query = "SELECT * FROM categories WHERE id_categories=$getID";
    $categories = getOne($query);
}
if (isset($_POST['update'])) {
    $erro = [];
    if (!empty($_POST['name-categories'])) {
        $name = $_POST['name-categories'];
    } else {
        $erro['name'] = "Vui lòng nhâp tên.";
    }

    if ($_FILES['avatar']['size'] > 0) {
        // hàm pathinfo lấy được thông tin đường dẫn truyền vào
        $format = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        if ($format == 'png' || $format == 'jpg' || $format == 'svg' || $format == 'webp' || $format == 'jpeg') {
            $img = $_FILES['avatar']['name'];
        } else {
            $erro['img'] = "Ảnh không đúng định dạng.";
        }
    }
    // trường hợp nhập mới ảnh danh mục
    if (empty($erro) && $_FILES['avatar']['size'] > 0) {
        $queryUpdate = "UPDATE categories SET image = '$img', category_name = '$name' WHERE id_categories = $getID";
    }
    // trường hợp không thay ảnh danh mục
    if ($_FILES['avatar']['size'] == 0 && isset($name)) {
        $queryUpdate = "UPDATE categories SET category_name = '$name' WHERE id_categories = $getID";
    }
    // kiểm tra nếu không lỗi up ảnh mới vào thư mục và thực hiện update lại dữ liệu trên db
    if (empty($erro)) {
        connect($queryUpdate);
        move_uploaded_file($_FILES['avatar']['tmp_name'], "./src/img/" . $img);
        header("location:index.php?action=categories");
    }
}
?>
<main>
    <div class="content-box">
        <p class="title">Sửa danh mục</p>
        <form action="index.php?action=edit-categories&&IDcategories=<?= $getID ?>" class="form-add" method="POST" enctype="multipart/form-data">
            <div class="form-right form-right-2">
                <label for="img">
                    <span class="material-symbols-outlined">
                        add_photo_alternate
                    </span>
                    <img style="z-index: 11;" src="./src/img/<?= $categories['image'] ?>" alt="">
                </label>
                <input type="file" name="avatar" id="img" hidden>
                <span class="erro"><?= isset($erro['img']) ? $erro['img'] : "" ?></span>
                <input type="text" value="<?php if(isset($erro['name'])){echo "";}else if(isset($name)){echo $name;}else{echo $categories['category_name'];}?>" name="name-categories" placeholder="Nhập tên danh mục">
                <span class="erro"><?= isset($erro['name']) ? $erro['name'] : "" ?></span>
                <button type="submit" name="update" class="btn-form">Lưu<span></span></button>
            </div>
        </form>
    </div>
</main>