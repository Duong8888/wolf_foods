<?php
    $queryCategories = "SELECT * FROM categories";
    $arrCategories = getAll($queryCategories);
if (isset($_POST['product-add'])) {
    $erro = [];
    $dateUp = date('Y-m-d');
    $discount = $_POST['discount'];

    if (isset($_POST['name-product'])) {
        $name = $_POST['name-product'];
    } else {
        $erro['name'] = "Vui lòng nhập tên sản phẩm.";
    }

    if (isset($_POST['price-product'])) {
        $price = $_POST['price-product'];
    } else {
        $erro['price'] = "Vui lòng nhập giá.";
    }

    if (isset($_POST['categories'])) {
        $categories = $_POST['categories'];
    } else {
        $erro['categories'] = "Vui lòng chọn danh mục.";
    }

    if (isset($_POST['desc-product'])) {
        $description = $_POST['desc-product'];
    } else {
        $erro['description'] = "Vui nhập mô tả.";
    }

    if ($_FILES['avatar']['size'] > 0) {
        $avatar = $_FILES['avatar']['name'];
    } else {
        $erro['avatar'] = "vui lòng nhập ảnh sản phẩm.";
    }

    if (empty($erro) ) {
        $query = "INSERT INTO products(product_name, price, image, description, input_time, discount, id_categories) VALUE ('$name',$price, '$avatar','$description', '$dateUp', $discount, $categories)";
    }

    connect($query);
    move_uploaded_file($_FILES['avatar']['tmp_name'], './src/img/' . $avatar);
    header("location:index.php?action=products&&message=Cập nhật thành công");
}
?>

<main>
    <div class="content-box">
        <p class="title">Thêm sản phẩm</p>
        <form action="index.php?action=add-product" method="POST" enctype="multipart/form-data" class="form-add">
            <div class="form-left">
                <input type="text" name="name-product" placeholder="Nhập tên sản phẩm">
                <span class="erro"></span>

                <input type="text" name="discount" placeholder="Giảm giá %">
                <span class="erro"></span>

                <input type="text" name="price-product" placeholder="Nhập giá sản phẩm">
                <span class="erro"></span>

                <select name="categories" id="">
                    <option>Cho danh mục</option>
                    <?php foreach ($arrCategories as $key => $value) : ?>
                        <option value="<?=$value['id_categories']?>"><?=$value['category_name']?></option>
                    <?php endforeach ?>
                </select>
                <span class="erro"></span>

            </div>
            <div class="form-right">
                <label for="img">
                    <span class="material-symbols-outlined">
                        add_photo_alternate
                    </span>
                    <img src="" alt="">
                </label>
                <input type="file" name="avatar" id="img" hidden>
                <span class="erro"></span>

            </div>
            <div class="form-bottom">
                <textarea name="desc-product" id="" cols="30" rows="10" placeholder="Mô tả sản phẩm"></textarea>
                <span class="erro"></span>
                <button type="submit" name="product-add" class="btn-form">Thêm sản phẩm <span></span></button>
            </div>
        </form>
    </div>
</main>