<?php
$idProduct = $_GET['productID'];
$queryProduct = "SELECT * FROM products WHERE id_product = $idProduct";
$productItem = getOne($queryProduct);
//lấy tất cả bình luận của sản phẩm này 
$queryComment = "SELECT * FROM comment WHERE id_porduct=$idProduct";
$arrComment = getAll($queryComment);
// lấy ra mảng người dùng
$queryUser = "SELECT * FROM user";
$arrUser = getAll($queryUser);
?>
<main>
    <div class="content-box">
        <form action="index.php?action=comment&&ssuccess" method="POST">
            <div class="comment">
                <div class="comment-header">
                </div>
                <div class="comment-top">
                    <div class="comment-top_info">
                        <h1>WOLF FOOD 2003ASD</h1>
                        <p class='comment-p1'><?= $productItem['product_name'] ?></p>
                        <p class='comment-p2'><?= $productItem['description'] ?></p>
                    </div>
                    <div class="comment-top-image">
                        <img class="comment-top_img" src="./src/img/<?= $productItem['image'] ?>">
                    </div>
                </div>

            <?php foreach($arrComment as $valueComment) { foreach($arrUser as $valueUser){ if($valueComment['id_user'] == $valueUser['id']){?>
            <div class="comment-bottom">
                    <div class="comment-bottom-detail">
                        <div class="comment-p">
                            <div class="comment-p-left">
                                <div class="comment-profile">
                                    <img class="comment-bottom_img" src="./src/img/<?= $valueUser['avatar'] ?>">
                                </div>
                                <div class="comment-profile1">
                                    <p class="comment-bottom_h1"><?=$valueUser['username']?></p>
                                    <p class="comment-bottom_h1 new"><?=$valueComment['time_send']?></p>
                                </div>
                            </div>
                            <div class="comment-p-right">
                                <i class='x bx bxs-star'></i>
                                <i class='x bx bxs-star'></i>
                                <i class='x bx bxs-star'></i>
                                <i class='x bx bxs-star'></i>
                                <i class='x bx bxs-star-half'></i>
                            </div>


                        </div>
                        <div class="comment-image">
                        <p class="comment-bottom_p"><?=$valueComment['content']?></p>
                        </div>
                    </div>
                </div>
            <?php }}}?>
            </div>
        </form>
    </div>
</main>