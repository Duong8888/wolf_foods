<?php
isset($_GET['IDdelete']) ? $id = $_GET['IDdelete'] : "";
$queryProduct = "SELECT * FROM products WHERE id_categories=$id";
$queryCategories = "SELECT * FROM categories";
$product = getAll($queryProduct);
$categories = getAll($queryCategories);
?>
<main>
    <div class="content-box">
        <p class="title">Danh mục :<span><?php foreach ($categories as $value) {
                                                if ($value['id_categories'] == $id) {
                                                    echo $value['category_name'];
                                                }
                                            } ?></span></p>
        <form action="">
            <div class="box-btn">

                <label for="" class="check-all">
                    Chọn tất cả
                </label>

                <select name="" id="" class="select-save">
                    <option value="">Chuyển tới danh mục</option>
                    <?php foreach ($categories as $valueCategories) : ?>
                        <option value="<?= $valueCategories['id_categories'] ?>"><?= $valueCategories['category_name'] ?></option>
                    <?php endforeach ?>
                </select>
                
                <a href="#add" class="btn-delete">
                    <button type="button">
                        Lưu chỉnh sửa
                        <span class="material-symbols-outlined">
                            save_as
                        </span>
                    </button>
                </a>
                <a href="#add" class="btn-delete">
                    <button type="submit">
                        Xóa danh mục
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </button>
                </a>
            </div>
            <p class="sub-title">Các sản Phẩm thuộc danh mục này</p>
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
                                    <select name="" class="select-save2" id="">
                                        <?php foreach ($categories as $valueCategories) : ?>
                                            <option <?= $valueCategories['id_categories'] == $id ? "selected" : "" ?> value="<?= $valueCategories['id_categories'] ?>"><?= $valueCategories['category_name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </td>
                                <td>
                                    <a href="#">
                                        <button class="edit">
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