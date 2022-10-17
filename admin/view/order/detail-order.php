<?php
    $id = $_GET['ID'];
    $queryOrder = "SELECT * FROM order_user WHERE id_order = $id";
    $order = getOne($queryOrder);
    if(isset($_POST['btn-09'])){
        $status = $_POST['status'];
        $update = "UPDATE order_user SET status='$status' WHERE id_order = $id";
        connect($update);
        header("location:index.php?action=order&&successful");
    }
?>
<main>
    <form action="index.php?action=order-detail&&ID=<?=$id?>" method="POST">
        <div class="content-box">
            <div class="box-bill">
                <div class="box-bill-main">
                    <p class="main-bill-name">Họ tên: <?=$order['name']?></p>
                    <p class="main-bill-phone">Phone: <?=$order['phone']?></p>
                    <p class="main-bill-address">Địa chỉ : <?=$order['addres']?></p>
                    <p class="main-bill-total">Tổng đơn : <?=$order['total_price']?>đ</p>
                    <div class="box-main-check">
                        <div class="form-check">
                            <input type="radio" <?=$order['status']==0?"checked":""?> name="status" value="0" id="inlineRadio1">
                            <label for="inlineRadio1">Đơn hàng mới</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" <?=$order['status']==1?"checked":""?> name="status" value="1" id="inlineRadio2">
                            <label for="inlineRadio2">Đang Giao hàng</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" <?=$order['status']==2?"checked":""?> name="status" value="2" id="inlineRadio3">
                            <label for="inlineRadio3">Giao hàng thành công</label>
                        </div>
                    </div>
                    <button type="submit" name="btn-09">Cập Nhật</button>
                </div>
            </div>
        </div>
    </form>
</main>