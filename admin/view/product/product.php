<?php
$query = "SELECT * FROM products ORDER BY id_product DESC";

$products = getAll($query);
    // xóa một sản phẩm
if(isset($_GET['id'])){
    $getID = $_GET['id'];
    $query2 = "DELETE FROM products WHERE id_product=$getID";
    connect($query2);
    header('location:index.php?action=products&&successful');
    // xóa nhiều sản phẩm
}else if(isset($_GET['delete-all'])){
    $location = 'products';
    deleteAll($products,$location);
}
?>
<main>
    <div class="content-box">
        <p class="title">Sản phẩm</p>
        <form action="index.php?action=products&&delete-all" method="POST">
            <div class="box-btn">
                <a href="index.php?action=add-product" class="add">
                    <button type="button">
                        Thêm sản phẩm
                        <span class="material-symbols-outlined">
                            post_add
                        </span>
                    </button>
                </a>
                <label for="" class="check-all">
                    Chọn tất cả
                </label>

                <a class="btn-delete" onclick="return confirm('Bạn có muốn xóa không')" href="">
                    <button type="submit">
                        Xóa mục đã chọn
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </button>
                </a>
            </div>

            <div class="table-main">
                <table>
                    <thead>
                        <tr>
                            <th>Chọn</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Giá sản phẩm</th>
                            <th>Mô tả</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $key => $value) : ?>
                            <tr>
                                <td><input type="checkbox" name="<?=$value['id_product']?>" class="checknow"></td>
                                <td>
                                    <div><?=$value['product_name']?></div>
                                </td>
                                <td><img src="./src/img/<?=$value['image']?>" alt=""></td>
                                <td>$ <?=$value['price']?></td>
                                <td>
                                    <div><?=$value['description']?></div>
                                </td>
                                <td>
                                    <a  onclick="return confirm('Bạn có muốn xóa không')" href="index.php?action=products&&id=<?=$value['id_product']?>">
                                        <button type="button" class="delete" name="btn">
                                            <span class="material-symbols-outlined">
                                                delete
                                            </span>
                                        </button></a>
                                    <a href="index.php?action=edit&&productID=<?=$value['id_product']?>">
                                        <button type="button" class="edit">
                                            <span class="material-symbols-outlined">
                                                edit_document
                                            </span>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</main>