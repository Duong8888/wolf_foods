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
            <form class="box-detail-main-right" action="">

                <p>Tên sản phẩm: <span><?= $productDetail['product_name'] ?></span></p>
                <p>Loại sản phẩm: <span> <?= isset($categoriesName) ? $categoriesName : "Đang cập nhật" ?></span></p>
                <p><span><?= displayProduct($productDetail) ?>đ</span> Giá niêm yến: <span><?= $productDetail['price'] ?>đ</span> </p>
                <p>Tiết kiệm:<span><?= $productDetail['price'] - displayProduct($productDetail) ?>đ</span></p>
                <div class="box-detail-main-right-count">
                    <button>-</button>
                    <input type="text" value="1">
                    <button>+</button>
                </div>
                <button class="detail-purchase">
                    <p>Mua ngay</p>
                    <p>Giao tận nơi hoặc nhận tại cửa hàng</p>
                </button>
                <div class="box-detail-main-right_both">
                    <button>Yêu thích</button><button>Cửa hàng</button>
                </div>
                <div class="detail-call">
                    <p>Gọi <a href=""><span> 1900 6750</span></a> để được tư vấn</p>
                </div>
            </form>
        </div>
        <div class="box-detail-bottom">
            <div class="box-detail-bottom-left">
                <div class="box-detail-bottom-header">
                    <p>Bình Luận</p>
                </div>

                <section id="test">
                    <?php foreach ($getComment as $value) : ?>
                        <div class="test-box-contain">
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
                        <form action="index.php?action=detail-product&&ID=<?= $_GET['ID'] ?>" method="POST">
                            <textarea name="content" placeholder="Add Your Comment"></textarea>
                            <div class="box-detail-comment_btn">
                                <input type="submit" name="btn-Comment" value="Comment">
                            </div>
                        </form>
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