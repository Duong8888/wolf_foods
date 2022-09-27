<?php
$id = $_GET['productID'];
$queryProduct = "SELECT * FROM products WHERE id_product = $id";
$queryCategories = "SELECT * FROM categories";
$arrCategories = getAll($queryCategories);
$product = getOne($queryProduct);

if (isset($_POST['product-edit'])) {
    $erro = [];
    $dateUp = date('Y-m-d');
    $discount = $_POST['discount'];

    if (!empty($discount)) {
        if (!is_numeric($discount)) {
            $erro['discount'] = "Vui lòng nhập số";
        }else{
            $erro['discount'] = "";
        }
    }

    if (!empty($_POST['name-product'])) {
        $name = $_POST['name-product'];
    } else {
        $name = "";
        $erro['name'] = "Vui lòng nhập tên sản phẩm.";
    }

    if (!empty($_POST['price-product'])) {
        if (!is_numeric($_POST['price-product'])) {
            $erro['price'] = "Vui lòng nhập số";
        } else {
            $price = $_POST['price-product'];
        }
    } else {
        $price = "";
        $erro['price'] = "Vui lòng nhập giá.";
    }

    if (!empty($_POST['categories'])) {
        $categories = $_POST['categories'];
    } else {
        $erro['categories'] = "Vui lòng chọn danh mục.";
    }

    if (!empty($_POST['desc-product'])) {
        $description = $_POST['desc-product'];
    } else {
        $description = "";
        $erro['description'] = "Vui nhập mô tả.";
    }

    if ($_FILES['avatar']['size'] > 0) {
        $avatar = $_FILES['avatar']['name'];
    }
    // empty nễu là chuỗi rỗng hoặc giá trị bằng 0 sẽ trả về true
    // kiểm tra các trường hơp có thể sảy ra môi trường hợp sẽ có câu lệnh truy vấn khác nhău
    if (empty($erro) && isset($avatar)) {
        $queryUpdate = "UPDATE products SET product_name = '$name', price = $price, image = '$avatar', description = '$description', input_time = $dateUp, discount = $discount, id_categories = $categories WHERE id_product = $id";
        move_uploaded_file($_FILES['avatar']['tmp_name'], "./src/img/" . $avatar);
    } else if (empty($erro) && !isset($avatar)) {
        $queryUpdate = "UPDATE products SET product_name = '$name', price = $price, description = '$description', input_time = $dateUp, discount = $discount, id_categories = $categories WHERE id_product = $id";
    }

    // kiểm tra nếu có câu lệnh truy vấn thì thực hiện còn không có thì do có ô dữ liệu đã để trống
    if (isset($queryUpdate)) {
        connect($queryUpdate);
        header("location:index.php?action=products&&successful");
    } else {
    }
}
?>

<main>
    <div class="content-box">
        <form action="index.php?action=edit&&productID=<?= $id ?>" method="POST" enctype="multipart/form-data" class="form-add">
            <div class="form-left">
                <Label>Tên sản phẩm</Label>
                <input type="text" value="<?= isset($name) ? $name : $product['product_name'] ?>" name="name-product" placeholder="Nhập tên sản phẩm">
                <span class="erro"><?= isset($erro['name']) ? $erro['name'] : "" ?></span>

                <Label>Giảm giá %</Label>
                <input type="text" value="<?= isset($discount) ? $discount : $product['discount'] ?>" name="discount" placeholder="Giảm giá %">
                <span class="erro"><?= isset($erro['discount']) ? $erro['discount'] : "" ?></span>

                <Label>Giá sản phẩm</Label>
                <input type="text" value="<?= isset($price) ? $price : $product['price'] ?>" name="price-product" placeholder="Nhập giá sản phẩm">
                <span class="erro"><?= isset($erro['price']) ? $erro['price'] : "" ?></span>

                <label>Danh mục</label>
                <select name="categories" id="">
                    <option value="">Cho danh mục</option>
                    <?php foreach ($arrCategories as $key => $value) : ?>
                        <option <?php if (isset($categories) && $categories == $value['id_categories']) {
                                    echo "selected";
                                } else if ($product['id_categories'] == $value['id_categories']) {
                                    echo "selected";
                                } ?> value="<?= $value['id_categories'] ?>"><?= $value['category_name'] ?></option>
                    <?php endforeach ?>
                </select>
                <span class="erro"><?= isset($erro['categories']) ? $erro['categories'] : "" ?></span>

            </div>
            <div class="form-right">
                <label for="img">
                    <span class="material-symbols-outlined">
                        add_photo_alternate
                    </span>
                    <img style="z-index: 11;" src="./src/img/<?= $product['image'] ?>" alt="">
                </label>
                <input type="file" name="avatar" id="img" hidden>
                <span class="erro"></span>

            </div>
            <div class="form-bottom">
                <label>Mô tả sản phẩm</label>
                <textarea name="desc-product" id="" cols="30" rows="10" placeholder="Mô tả sản phẩm"><?= isset($description) ? $description : $product['description'] ?></textarea>
                <span class="erro"><?= isset($erro['description']) ? $erro['description'] : "" ?></span>
                <button type="submit" name="product-edit" class="btn-form">Lưu<span></span></button>
            </div>
        </form>
    </div>
</main>