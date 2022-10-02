<?php
isset($_GET['IDdelete']) ? $id = $_GET['IDdelete'] : "";
$queryProduct = "SELECT * FROM products WHERE id_categories=$id";
$queryCategories = "SELECT * FROM categories";
$product = getAll($queryProduct);
$categories = getAll($queryCategories);

// chuyển các danh mục được chọn
if (isset($_POST['save-all'])) {
    $categoriesNew = $_POST['select-save'];
    $location = 'delete-categories&&IDdelete='.$id;
    updateAll($product, $location, $categoriesNew);
}
// chuyển một danh mục
if (isset($_POST['item-save'])) {
    foreach ($product as $value) {
        $idProduct = $value['id_product'];
        $nameOption = 'categories-' . $idProduct;
        $categoriesNew = $_POST[$nameOption];
        $update = "UPDATE products SET id_categories='$categoriesNew' WHERE id_product = $idProduct";
        connect($update);
        header("location:index.php?action=delete-categories&&IDdelete=$id&&successfull");
    }
};

// xóa danh mục
if (isset($_POST['categories-delete']) && empty($product)) {
    $delete = "DELETE FROM categories WHERE id_categories = $id";
    connect($delete);
    header("location:index.php?action=categories&&successful");
} else if (isset($_POST['categories-delete']) && !empty($product)) {
    header("location:index.php?action=delete-categories&&IDdelete=$id&&fail");
}
?>
<main>
    <div class="content-box">
        <p class="title">Danh mục :<span><?php foreach ($categories as $value) {
                                                if ($value['id_categories'] == $id) {
                                                    echo $value['category_name'];
                                                }
                                            } ?></span></p>
        <form action="index.php?action=delete-categories&&IDdelete=<?= $id ?>" method="POST">
            <div class="box-btn">

                <label for="" class="check-all">
                    Chọn tất cả
                </label>
                <select name="select-save" id="" class="select-save">
                    <option value="">Chuyển tới danh mục</option>
                    <?php foreach ($categories as $valueCategories) : ?>
                        <option value="<?= $valueCategories['id_categories'] ?>"><?= $valueCategories['category_name'] ?></option>
                    <?php endforeach ?>
                </select>

                <a href="" class="btn-delete">
                    <button type="submit" name="save-all">
                        Lưu chỉnh sửa
                        <span class="material-symbols-outlined">
                            save_as
                        </span>
                    </button>
                </a>

                <a href="" class="btn-delete">
                    <button type="submit" name="categories-delete">
                        Xóa danh mục
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </button>
                </a>
            </div>
            <p class="sub-title" <?= isset($_GET['fail']) ? "style='color: red;'" : "" ?>><?= isset($_GET['fail']) ? "Vui lòng chuyển các sản phẩm này sang danh mục khác để xóa danh mục" : "Các sản Phẩm thuộc danh mục này" ?></p>
            <div class="table-main">
                <table>
                    <thead>
                        <tr>
                            <th>Chọn</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Giá sản phẩm</th>
                            <th>Danh mục hiện tại</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($product as $key => $value) : ?>
                            <tr>
                                <td><input type="checkbox" name="<?= $value['id_product'] ?>" class="checknow"></td>
                                <td>
                                    <div><?= $value['product_name'] ?></div>
                                </td>
                                <td><img src="src/img/<?= $value['image'] ?>" alt=""></td>
                                <td>$<?= $value['price'] ?></td>
                                <td>
                                    <select name="categories-<?= $value['id_product'] ?>" class="select-save2" id="">
                                        <?php foreach ($categories as $valueCategories) : ?>
                                            <option <?= $valueCategories['id_categories'] == $id ? "selected" : "" ?> value="<?= $valueCategories['id_categories'] ?>"><?= $valueCategories['category_name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </td>
                                <td>
                                    <a href="">
                                        <button type="submit" name="item-save" class="edit">
                                            <span class="material-symbols-outlined">
                                                save_as
                                            </span>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
    </div>
    </form>
</main>