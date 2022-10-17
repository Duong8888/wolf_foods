<?php
$idUser = $_SESSION['idUser'];
$queryBill = "SELECT * FROM order_user WHERE id_user = $idUser";
$arrOrder = getAll($queryBill);
if (isset($_GET['IDbill'])) {
    $id = $_GET['IDbill'];
    $queryBill1 = "SELECT * FROM order_user WHERE id_order = $id";
    $order = getOne($queryBill1);
    if ($order['status'] == 0) {
        $queryDelete = "DELETE FROM order_user WHERE id_order = $id AND status = 0";
        connect($queryDelete);
        header('location:index.php?action=bill');
    } else {
        header('location:index.php?action=bill&&fail');
    }
}
?>
<main>
    <div class="cart_wrap">
        <a href="index.php?action=cart-product" class="cart__title ">Giỏ hàng</a>
        <a href="" class="cart__title click">Đơn hàng</a>
        <div class="box-bill">
            <!--  -->
            <p class="erro" style="color: red;"><?= isset($_GET['fail']) ? 'Bạn không thể hủy đơn hàng khi đơn hàng đang được giao.' : "" ?></p>
            <?php foreach ($arrOrder as $value) : ?>
                <div class="bill-item">
                    <div>
                        <div class="img-bill"><img src="../src/img/img_icon/footer-logo.png" alt=""></div>
                        <div class="box-dital-bill">
                            <p class="list-name">
                            <div class="box-text">Danh sách sản phẩm : ................</div>
                            </p>
                            <p class="address">Địa chỉ nhận hàng : <?= $value['addres'] ?></p>
                            <p class="total-price">Tổng đơn : <?= $value['total_price'] ?>đ</p>
                        </div>
                    </div>
                    <div class="box-status">
                        <p class="status-bill">
                            <?php if ($value['status'] == 0) {
                                echo "Đang chờ shop duyệt";
                            } else if ($value['status'] == 1) {
                                echo "Đang Giao hàng";
                            } else if ($value['status'] == 2) {
                                echo "Giao hàng thành công";
                            } ?>
                        </p>
                        <a <?= isset($_GET['fail']) ? "" : "onclick=\" return confirm('Bạn chắc chắn hủy đơn hàng này chứ.')\"" ?> href="index.php?action=bill&&delete&&IDbill=<?= $value['id_order'] ?>">Hủy đơn hàng</a>
                    </div>
                </div>
            <?php endforeach ?>
            <!--  -->
        </div>
    </div>
</main>