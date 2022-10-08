<?php
require './header.php';
?>
<main>
  <div class="cart_wrap">
    <h1 class="cart__title">Giỏ hàng</h1>
    <div class="list__product_cart">
      <div class="product__cart--item">
        <img src="../src/img/img_product/bap-bo-uc-tuoi-hut-chan-khong-khay-250g-202112251850343812.jpg" alt="" class="product__cart_img">
        <div class="product__cart_detail">
          <p class="product__cart--name">Đầu cá hồi tươi túi 1kg (300g - 500g/1 cái)</p>
          <p class="product__cart--brand">Thương hiệu: Wolf food</p>
          <a href="#" class="product__cart--delete">Xóa</a>
        </div>
        <p class="product__cart--price">40.000đ</p>
        <div class="product__cart--quantity">
          <button class="btn__quantity reduce__cart" onclick="reduce()">-</button>
          <div class="input__quantity"><input type="text" class="prodct__cart--quantity-inp" id="quantity" readonly value="1" min="1"></div>
          <button class="btn__quantity raise__cart" onclick="raise()">+</button>
        </div>
      </div>
      <!-- end product cart item -->
    </div>
    <!-- end list cart -->
    <div class="cart__pay">
      <div class="continue__bought--wrap"><a href="#" class="continue__bought">Tiếp tục mua hàng</a></div>
      <div class="price__order">
        <div class="price__total">
          <p class="price__total--provisional">
            <span class="text_total">Tạm tính:</span> <span class="number__total--black">133.000đ</span>
          </p>
          <p class="price__total--into">
            <span class="text_total">Thành tiền:</span> <span class="number__total--green">133.000đ</span>
          </p>
          <button class="pay__button">Thanh toán ngay</button>
        </div>
      </div>
    </div>
    <!-- end pay cart -->
  </div>
  <script>
    let quantity = document.querySelector('#quantity');
    let quantityValue = quantity.value;
    let quantityInp = document.querySelector('.input__quantity');

    function reduce() {
      if (quantityValue === 0) {
        return;
      } else {
        quantityInp.innerHTML = `<input type="text" class="prodct__cart--quantity-inp" id="quantity" readonly value="${--quantityValue}" min="1">`
      }
    }

    function raise() {
      quantityInp.innerHTML = `<input type="text" class="prodct__cart--quantity-inp" id="quantity" readonly value="${++quantityValue}" min="1">`
    }
  </script>
</main>
<?php
require './footer.php';
?>