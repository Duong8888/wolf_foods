<?php
$queryCategories = "SELECT * FROM categories";
$arrCategories = getAll($queryCategories);
if (isset($_POST['product-add'])) {
    $erro = [];
    $dateUp = date('Y-m-d');
    $discount = $_POST['discount'];

    // if (!empty($discount)) {
    //     if (!is_numeric($discount)) {
    //         $erro['discount'] = "Vui lòng nhập số";
    //     }else{
    //         $erro['discount'] = "";
    //     }
    // }

    if (!empty($_POST['name-product'])) {
        $name = $_POST['name-product'];
    } else {
        $name = "";
        $erro['name'] = "Vui lòng nhập tên sản phẩm.";
    }

    if (!empty($_POST['price-product'])) {
        if (!is_numeric($discount)) {
            $erro['price'] = "Vui lòng nhập số";
        } else {
            $price = $_POST['price-product'];
        }
    } else {
        $price = "";
        $erro['price'] = "Vui lòng nhập giá.";
    }

    if ($_POST['categories'] != "Cho danh mục") {
        $categories = $_POST['categories'];
    } else {
        $categories = "";
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
    } else {
        $erro['avatar'] = "vui lòng nhập ảnh sản phẩm.";
    }
    // print_r($erro);
    if (empty($erro)) {
        $query = "INSERT INTO products(product_name, price, image, description, input_time, discount, id_categories) VALUE ('$name',$price, '$avatar','$description', '$dateUp', $discount, $categories)";
    }

    if (isset($query)) {
        connect($query);
        move_uploaded_file($_FILES['avatar']['tmp_name'], './src/img/' . $avatar);
        header("location:index.php?action=products&&message=Cập nhật thành công");
    }
}
?>

<main>
    <div class="content-box">
        <p class="title">Thêm sản phẩm</p>
        <form action="index.php?action=add-product" method="POST" enctype="multipart/form-data" class="form-add">
            <div class="form-left">
                <input type="text" value="<?=isset($name)?$name:""?>" name="name-product" placeholder="Nhập tên sản phẩm">
                <span class="erro"><?= isset($erro['name']) ? $erro['name'] : "" ?></span>

                <input type="text" value="<?=isset($discount)?$discount:""?>" name="discount" placeholder="Giảm giá %">
                <span class="erro"><?= isset($erro['discount']) ? $erro['discount'] : "" ?></span>

                <input type="text" value="<?=isset($price)?$price:""?>" name="price-product" placeholder="Nhập giá sản phẩm">
                <span class="erro"><?= isset($erro['price']) ? $erro['price'] : "" ?></span>

                <select name="categories" id="">
                    <option>Cho danh mục</option>
                    <?php foreach ($arrCategories as $key => $value) : ?>
                        <option <?php if(isset($categories)){if($categories == $value['id_categories']){echo "selected";}}?> value="<?= $value['id_categories'] ?>"><?= $value['category_name'] ?></option>
                    <?php endforeach ?>
                </select>
                <span class="erro"><?= isset($erro['categories']) ? $erro['categories'] : "" ?></span>

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
                <textarea name="desc-product" id="" cols="30" rows="10" placeholder="Mô tả sản phẩm"><?=isset($description)?$description:""?></textarea>
                <span class="erro"><?= isset($erro['description']) ? $erro['description'] : "" ?></span>
                <button type="submit" name="product-add" class="btn-form">Thêm sản phẩm <span></span></button>
            </div>
        </form>
    </div>
</main>