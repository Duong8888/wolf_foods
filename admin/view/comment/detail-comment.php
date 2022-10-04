<?php
$id = $_GET['CommentID'];
$queryComment = "SELECT * FROM comment WHERE id_comment = $id";
$queryUser = "SELECT * FROM user ";
$queryProducts = "SELECT * FROM products";
$arrComment = getOne($queryComment);
$arrUser = getAll($queryUser);
$arrProducts = getAll($queryProducts);
//xóa 1 bình luận

if(isset($_GET['id'])){
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

                <div class="comment-top">
                    <div class="comment-image">
                        <?php foreach ($arrProducts as $keyProduct => $valueProduct) {
                            if ($valueProduct['id_product'] == $arrComment['id_porduct']) {
                                echo '<img class="comment-top_img" src="./src/img/' . $valueProduct['image'] . '">';
                            }
                        }
                        ?>
                    </div>
                    <div class= "comment-p">
                        <?php foreach ($arrProducts as $keyProduct => $valueProduct) {
                            if ($valueProduct['id_product'] == $arrComment['id_porduct']) {
                                echo '<p class="comment-top_h1">' .
                                    $valueProduct["product_name"] . '</p>';
                                echo '<p class="comment-top_p">' .
                                    $valueProduct["description"] . '</p>';
                            }
                        }
                        ?>
                    </div>
                </div>

                <div class="comment-bottom">
                    <div class="comment-p">
                        <?php foreach ($arrUser as $keyUser => $valueUser) {
                        if ($valueUser['id'] == $arrComment['id_user']) {
                            
                            echo '<p class="comment-bottom_h1">' . $valueUser['username'] . '</p>';
                            echo '<p class="comment-bottom_p">' . $arrComment['content'] . '</p>';
                           
                        }
                    } ?>
                    </div>
                    <div class="comment-image">
                    <?php foreach ($arrUser as $keyUser => $valueUser) {
                        if ($valueUser['id'] == $arrComment['id_user']) {
                             echo '<img class="comment-bottom_img" src="./src/img/' . $valueUser['avatar'] . '">';
                        }
                    }
                    ?>
                    </div>
                </div>
            </div>

            <a onclick="return confirm('Bạn có chắc không ?')" href="index.php?action=detail-Comment&&id=<?= $arrComment['id_comment'] ?>">
                <button type="button" name="product-edit" class="btn-form">Xóa<span></span></button>
            </a>
        </form>
    </div>
</main>