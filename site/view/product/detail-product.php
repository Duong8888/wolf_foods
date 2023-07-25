<?php
isset($_GET['ID']) ? $id = $_GET['ID'] : "";
if (isset($_GET['ID'])) {
    // tăng view sản phẩm 
    $upView = "UPDATE products SET view=view+1 WHERE id_product = $id";
    connect($upView);
    $queryDetail = "SELECT * FROM products WHERE id_product = $id";
    $queryCategories = "SELECT * FROM categories";
    $arrCategories  = getAll($queryCategories);
    $productDetail = getOne($queryDetail);
    foreach ($arrCategories as $value) {
        if ($productDetail['id_categories'] == $value['id_categories']) {
            $categoriesName = $value['category_name'];
        }
    }
    // lấy sản phẩm cùng loại để hiển thị
    $idCategories = $productDetail['id_categories'];
    $query = "SELECT * FROM products WHERE id_categories = $idCategories";
    $similarProducts = getAll($query);
    // comment
    if (isset($_POST['btn-Comment'])) {
        $idProduct = $_GET['ID'];
        $content = $_POST['content'];
        $idUser = $_SESSION['idUser'];
        $timeSend = date('Y-m-d');
        if (!empty($content)) {
            $query = "INSERT INTO comment SET content='$content', id_user='$idUser', id_porduct='$idProduct', time_send='$timeSend' ";
            connect($query);
        }
    }
    // lấy ra bình luận của sản phẩm
    $queryComment = "SELECT * FROM comment WHERE id_porduct = $id";
    $getComment = getAll($queryComment);
    // lấy mảng người dùng để xem đối chiếu với id hiển thị tên người bình luận
    $queryUser = "SELECT * FROM user";
    $getUser = getAll($queryUser);

    // thêm sản phẩm vào giỏ hàng
    if (isset($_POST['add-cart'])) {
        // lấy số lượng sản phẩm, lấy id sản phẩm, lấy id người dùng
        if (!empty($_POST['quantity1'])) {
            $quantity1 = $_POST['quantity1'];
            $idUser = $_SESSION['idUser'];
            $idProduct = $_GET['ID'];
            $query = "INSERT INTO cart SET id_product='$idProduct', id_user='$idUser', quantity='$quantity1',status=0";
            connect($query);
            header("location:index.php?action=cart-product");
        }
    }
};
?>
<main>
    <div class="box-detail">
        <div class="box-detail-top">
        </div>
        <div class="box-detail-main">
            <div class="box-detail-main-left">
                <img src="../../../admin/src/img/<?= $productDetail['image'] ?>" alt="">
            </div>
            <form method="POST" class="box-detail-main-right" action="index.php?action=detail-product&&ID=<?= $_GET['ID'] ?>">
                <!-- giá gốc, % giảm giá -->
                <input type="text" id="main-price" value="<?= $productDetail['price'] ?>" hidden>
                <input type="text" id="main-discount" value="<?= $productDetail['discount'] ?>" hidden>
                <!--  -->
                <p>Tên sản phẩm: <span class="name-product_detail"><?= $productDetail['product_name'] ?></span></p>
                <p>Loại sản phẩm: <span class="categories-product_detail"> <?= isset($categoriesName) ? $categoriesName : "Đang cập nhật" ?></span></p>
                <p><span class="price-1"><span class="price-product_detail"><?= displayProduct($productDetail) ?></span>đ</span> Giá niêm yến: <span class="discount-1"><span class="discount-product_detail"><?= $productDetail['price'] ?></span>đ</span> </p>
                <p>Tiết kiệm:<span class="discount2-product_detail"><?= $productDetail['price'] - displayProduct($productDetail) ?>đ</span></p>
                <div class="product__cart--quantity input__quantity">
                    <div class="input-group mb-3 new">
                        <span class="input-group-text new">Số lượng</span>
                        <input name="quantity1" type="text" class="form-control prodct__cart--quantity-inp" autocomplete="off" id="quantity" onkeyup="result()" value="<?= isset($_POST['quantity']) ? $_POST['quantity'] : "1" ?>">
                    </div>
                </div>
                <button class="detail-purchase">
                    <p>Mua ngay</p>
                    <p>Giao tận nơi hoặc nhận tại cửa hàng</p>
                </button>
                <div class="box-detail-main-right_both">
                    <a><button name="add-cart" <?= isset($_SESSION['idUser']) ? 'type="submit"' : ' type="button" class="sub-btn2"'; ?>>Thêm vào giỏ hàng</button></a><a href=""><button type="">Cửa hàng</button></a>
                </div>
                <div class="detail-call">
                </div>
            </form>
        </div>
        <div class="box-detail-bottom">
            <div class="box-detail-bottom-left">
                <div class="box-detail-bottom-header">
                    <p>Bình Luận</p>
                </div>

                <section id="test">
                    <?php foreach ($getComment as $key => $value) : ?>
                        <!-- gán id cho commet mới nhất -->
                        <div class="test-box-contain" <?php if ($key + 1 == count($getComment)) {
                                                            echo 'id="sub-comment"';
                                                        } ?>>
                            <div class="test-box">
                                <div class="box-top">
                                    <div class="profile">
                                        <?php foreach ($getUser as $user) {
                                            if ($user['id'] == $value['id_user']) { ?>
                                                <div class="profile-img">
                                                    <img src="../../../admin/src/img/<?= $user['avatar'] ?>" alt="">
                                                </div>
                                                <div class="name-user">
                                                    <strong><?= $user['username'] ?></strong>
                                                    <span><?= $value['time_send'] ?></span>
                                                </div>
                                        <?php }
                                        } ?>
                                    </div>
                                    <div class="reviews">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                                <div class="client-comment">
                                    <p><?= $value['content'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </section>
                <div class="box-detail-bottom-main">
                    <div class="box-detail-comment2">
                        <form action="index.php?action=detail-product&&ID=<?= $_GET['ID'] ?>#sub-comment" method="POST">
                            <textarea name="content" placeholder="Add Your Comment"></textarea>
                            <div class="box-detail-comment_btn">
                                <input <?= isset($_SESSION['idUser']) ? 'type="submit"' : 'type="button" class="sub-btn"'; ?> name="btn-Comment" value="Comment">
                            </div>
                        </form>
                        <!-- modal -->
                        <div class="modal" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">WOLF FOOD</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Vui lòng đăng nhập để sử dụng chức năng này.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a href="index.php?action=sign_in">
                                            <button type="button" class="btn btn-primary">log in</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- modal -->
                    </div>
                </div>
            </div>
            <div class="box-detail-bottom-right">
                <div class="box-detail-bottom-header">
                    <p>Sản phẩm tương tự</p>
                </div>
                <div class="box-detail-bottom_home-advanced">
                    <?php foreach ($similarProducts as $value) : ?>
                        <div class="home-mini_product">
                            <div class="home-mini_product-img">
                                <img src="../../../admin/src/img/<?= $value['image'] ?>" alt="">
                            </div>
                            <div class="home-mini_product-detail">
                                <a href="index.php?action=detail-product&&ID=<?= $value['id_product'] ?>"><?= $value['product_name'] ?></a>
                                <p class="desc-detail"><?= $value['description'] ?></p>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        <div class="box-detail-comment">
        </div>
        <div class="box-detail-slishow">
        </div>
    </div>
</main>