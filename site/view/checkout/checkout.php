<?php
// khi bấm đặt hàng thì thêm dữ liệu vào bảng order
// hiển thị các sản phẩm trong giỏ hàng 
$idUser = $_SESSION['idUser'];
// lấy tất cả sản phẩm từ giỏ hàng
$queryCart = "SELECT * FROM cart WHERE id_user=$idUser AND status=0";
$arrCart = getAll($queryCart);
$queryProduct =  "SELECT * FROM products";
$arrProduct  = getAll($queryProduct);
// số lượng sản phẩm
$queryCount = "SELECT COUNT(id_cart) FROM cart WHERE id_user=$idUser";
$countProduct  = getOne($queryCount);
// nếu nhập đủ thông tin thêm dữ liệu vào
// đã validate bên js
if(isset($_POST['btn-check-out-1'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $totalPrice = $_POST['totalPrice'];
    $time = date('Y-m-d');
    // thêm sản phẩm vào bảng giỏ hàng 
    $queryOrder = "INSERT INTO order_user(id_user,name,time_order,total_price,addres,phone) VALUE ($idUser, '$name', '$time', '$totalPrice','$address',$phone)";
    connect($queryOrder);
    // cập nhật tranmg thái của giỏ hàng
    $queryCart = "UPDATE cart SET status=1";
    connect($queryCart);
    header("location:index.php?action=bill");
}
?>
<main>
    <form action="index.php?action=check-out" method="POST">
        <div class="box-check-out">
            <div class="item-check-out">
                <p class="title-checkout">Thông tin nhận hàng</p>
                <div class="form-floating mb-3">
                    <!-- báo lỗi bàng class is-invalid -->
                    <!-- validate bàng js -->
                    <input type="text" name="name" autocomplete="off" class="form-control" id="username" placeholder="name@example.com">
                    <label for="username">Họ và tên</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="phone" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Số điện thoại</label>
                </div>
                <div class="form-floating">
                    <textarea class="form-control" name="address" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Địa chỉ nhận hàng</label>
                </div>
            </div>
            <div class="item-check-out">
                <p class="title-checkout">Vận chuyển</p>
                <div class="box-info">
                    Vui lòng nhập thông tin giao hàng.
                </div>
                <p class="title-checkout">Thanh toán</p>
                <div class="box-info">
                    Thanh toán khi nhận hàng.
                </div>
            </div>
            <div class="item-check-out">
                <p class="title-checkout">Đơn hàng <span>(<?=$countProduct[0]?> sản phẩm)</span></p>
                <div class="box-list-product-cart">
                    <!--  -->
                    <?php foreach($arrCart as $value){foreach ($arrProduct as $valueProduct) { if($value['id_product'] == $valueProduct['id_product']){?>
                        <div class="product-item-check-out">
                            <div class="left"><img src="../../../admin/src/img/<?=$valueProduct['image']?>" alt=""></div>
                            <div class="right">
                                <p class="right-name"><?=$valueProduct['product_name']?></p>
                                <span class="right-quantity">Số lượng : <?=$value['quantity']?></span>
                                <span class="right-price product__cart--price">Giá: <span><?=displayProduct($valueProduct)*$value['quantity']?></span>đ</span>
                            </div>
                        </div>
                    <?php }}}?>
                    <!--  -->
                </div>
                <div class="total">
                    <div class="total-top">
                        <p><span>Tạm tính</span><span class="number__total--black"></span></p>
                        <p><span>Phí vận chuyển</span></p>
                    </div>
                    <div class="total-bottom">
                        <input type="text" value="" name="totalPrice" hidden id="total-price-bill">
                        <p><span>Tổng tiền</span><span class="number__total--green" style="color: #3bb77e;font-size: 20px;font-weight: bold;"></span></p>
                        <p><a href="index.php?action=cart-product">Quay về giỏ hàng</a><button name="btn-check-out-1" type="button">ĐẶT HÀNG</button></p>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>