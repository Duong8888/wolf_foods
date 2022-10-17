<?php
// truy vấn lấy ra bảng cart
$idUser = $_SESSION['idUser'];
$queryCart = "SELECT *FROM cart WHERE id_user=$idUser AND status = 0";
$arrCart = getAll($queryCart);
// truy vấn lấy ra bảng sản phẩm 
$queryProduct = "SELECT *FROM products";
$arrProduct = getAll($queryProduct);
if(isset($_GET['delete'])){
  $idCart = $_GET['ID'];
  $queryDelete = "DELETE FROM cart WHERE id_cart=$idCart";
  connect($queryDelete);
  header("location:index.php?action=cart-product");
}
?>
<main>
  <div class="cart_wrap">
    <a href="" class="cart__title click">Giỏ hàng</a>
    <a href="index.php?action=bill" class="cart__title">Đơn hàng</a>

    <?php foreach ($arrCart as  $valueCart) : ?>
      <?php foreach ($arrProduct as  $valueProduct) {
        if ($valueCart['id_product'] == $valueProduct['id_product']) { ?>
          <div class="list__product_cart">
            <div class="product__cart--item">
              <img src="../../../admin/src/img/<?= $valueProduct['image'] ?>" alt="" class="product__cart_img">
              <div class="product__cart_detail">
                <p class="product__cart--name"><?= $valueProduct['product_name'] ?></p>
                <p class="product__cart--brand"><?=$valueProduct['price']?>đ</p>
                <a onclick="return confirm('Bạn có chắc xóa không.')" href="index.php?action=cart-product&&delete&&ID=<?=$valueCart['id_cart']?>" class="product__cart--delete">Xóa</a>
              </div>
              <p class="product__cart--price"><span><?=(displayProduct($valueProduct)*$valueCart['quantity'])?></span>đ</p>
              <div class="product__cart--quantity input__quantity">
                <div class="input-group mb-3 new">
                  <span class="input-group-text new">Số lượng</span>
                  <input name="quantity1" disabled type="text" class="form-control prodct__cart--quantity-inp" autocomplete="off" id="quantity" value="<?= $valueCart['quantity'] ?>">
                </div>
              </div>
            </div>
        <?php }
      } ?>
      <?php endforeach ?>
      
      <!-- end product cart item -->
          </div>
          <!-- end list cart -->
          <div class="cart__pay">
            <div class="continue__bought--wrap"><a href="#" class="continue__bought">Tiếp tục mua hàng</a></div>
            <div class="price__order">
              <div class="price__total">
                <p class="price__total--provisional">
                  <span class="text_total">Tạm tính:</span> <span class="number__total--black"></span>
                </p>
                <p class="price__total--into">
                  <span class="text_total">Thành tiền:</span> <span class="number__total--green"></span>
                </p>
                <a href="index.php?action=check-out"><button class="pay__button">Thanh toán ngay</button></a>
              </div>
            </div>
          </div>
          <!-- end pay cart -->
  </div>

</main>