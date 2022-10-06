<?php
$id = $_GET['CommentID'];
$queryComment = "SELECT * FROM comment WHERE id_comment = $id";
$queryUser = "SELECT * FROM user ";
$queryProducts = "SELECT * FROM products";
$OneComment = getOne($queryComment);
$arrUser = getAll($queryUser);
$arrProducts = getAll($queryProducts);
// $time = "SELECT time_send FROM comment WHERE id_user ="
//xóa 1 bình luận

if (isset($_GET['id'])) {
    $getID = $_GET['id'];
    $query3 = "DELETE FROM comment WHERE id_comment=$getID";
    connect($query3);
    header('location:index.php?action=comment&&successfully');
}
?>
<main>
    <div class="content-box">
        <form action="index.php?action=comment&&ssuccess" method="POST">
            <div class="comment">
                <div class="comment-header">
                    <span>Comment</span>

                </div>
                <div class="comment-top">
                    <div class="comment-top_info">
                        <h1>WOLF FOOD 2003ASD</h1>
                        <?php foreach ($arrProducts as $keyProduct => $valueProduct) {
                            if ($valueProduct['id_product'] == $OneComment['id_porduct']) {
                                echo "<p class='comment-p1'>" . $valueProduct['product_name'] . "</p>";
                                echo "<p class='comment-p2'>" . $valueProduct['description'] . "</p>   ";
                            }
                        }
                        ?>
                    </div>
                    <div class="comment-top-image">
                        <?php foreach ($arrProducts as $keyProduct => $valueProduct) {
                            if ($valueProduct['id_product'] == $OneComment['id_porduct']) {
                                echo '<img class="comment-top_img" src="./src/img/' . $valueProduct['image'] . '">';
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="comment-bottom">
                    <div class="comment-bottom-detail">
                        <div class="comment-p">
                            <div class="comment-p-left">
                                <div class="comment-profile">
                                    <?php foreach ($arrUser as $keyUser => $valueUser) {
                                        if ($valueUser['id'] == $OneComment['id_user']) {
                                            echo '<img class="comment-bottom_img" src="./src/img/' . $valueUser['avatar'] . '">';
                                        }
                                    } ?>
                                </div>
                                <div class="comment-profile1">
                                    <?php foreach ($arrUser as $keyUser => $valueUser) {
                                        if ($valueUser['id'] == $OneComment['id_user']) {

                                            echo '<p class="comment-bottom_h1">' . $valueUser['username'] . '</p>';
                                            echo '<p class="comment-bottom_h1 new">'.$OneComment['time_send'].'</p>';
                                        }
                                    } ?>
                                    
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
                            <?php foreach ($arrUser as $keyUser => $valueUser) {
                                if ($valueUser['id'] == $OneComment['id_user']) {
                                    echo '<p class="comment-bottom_p">' . $OneComment['content'] . '</p>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="comment-delete">
                <a class="delete-comment" onclick="return confirm('Bạn có chắc không ?')" href="index.php?action=detail-Comment&&id=<?= $OneComment['id_comment'] ?>">
                    <button type="button" name="product-edit"><span>X</span><span>ó</span><span>a</span> <span>C</span><span>o</span><span>m</span><span>m</span><span>e</span><span>n</span><span>t</span></button>
                </a>
            </div>

        </form>
    </div>
</main>