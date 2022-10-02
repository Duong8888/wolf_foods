<footer>
  <div class="child__footer">
    <div class="top__footer">
      <div class="top__footer--item">
        <img src="../src/img/img_icon/footer_policy_img_1.png" alt="" class="top__footer--item-img">
        <p class="top__footer--iten-content">Đặt online giao tận nhà đúng giờ</p>
      </div>
      <div class="top__footer--item">
        <img src="../src/img/img_icon/footer_policy_img_2.png" alt="" class="top__footer--item-img">
        <p class="top__footer--iten-content">Đổi trả sản phẩm trong 7 ngày</p>
      </div>
      <div class="top__footer--item">
        <img src="../src/img/img_icon/footer_policy_img_3.png" alt="" class="top__footer--item-img">
        <p class="top__footer--iten-content">Sản phẩm sạch tại vườn</p>
      </div>
    </div>
    <div class="line"></div>
    <!-- end top footer -->
    <div class="main__footer">
      <div class="main__footer--left">
        <img src="../src/img/img_icon/footer-logo.png" alt="" class="logo__footer">
        <p class="adress">Tòa nhà FPT Polytechnic, Xuân Phương, Nam Từ Liêm, Hà Nội</p>
        <div class="business">
          <p class="business_time">Thứ 2 - Thứ 6: 8:00-17:00</p>
          <p class="business_time">Thứ 7: 8:00-12:00</p>
        </div>
      </div>
      <!-- end footer left -->
      <div class="main__footer--center-left">
        <h2 class="footer__title">Hỗ trợ khách hàng</h2>
        <div class="phone__number-business">
          <p class="phone_number__footer">1900 6750</p>
          <p class="business_time">Thứ 2 - Thứ 7: 8:00-21:30</p>
        </div>
        <div class="line"></div>
        <a href="#" class="email__footer">Email: support@sapo,vn</a>
        <div class="contact__us">
          <!-- thiếu icon :D -->
        </div>
      </div>
      <!-- end center left -->
      <div class="main__footer--center-right">
        <h2 class="footer__title">Danh mục</h2>
        <ul class="list_menu__footer">
          <li class="list_menu--item"><a href="#">Thịt, cá, trứng, rau</a></li>
          <li class="list_menu--item"><a href="#">Hàng đông mát</a></li>
          <li class="list_menu--item"><a href="#">Mì, miến, cháo, phở</a></li>
          <li class="list_menu--item"><a href="#">Gạo, bột, đồ khô</a></li>
          <li class="list_menu--item"><a href="#">Dầu ăn, nước chấm, gia vị</a></li>
          <li class="list_menu--item"><a href="#">Sữa các loại</a></li>
          <li class="list_menu--item"><a href="#">Đồ uống các loại</a></li>
          <li class="list_menu--item"><a href="#">Bánh kẹo các loại</a></li>
        </ul>
      </div>
      <!-- end center right -->
      <div class="main__footer--right">
        <h2 class="footer__title">Mục ẩm thực</h2>
        <ul class="list_menu__footer">
          <li class="list_menu--item"><a href="#">Công thức nấu ăn</a></li>
          <li class="list_menu--item"><a href="#">Mẹo vặt bếp núc</a></li>
          <li class="list_menu--item"><a href="#">Đặc sản vùng miền</a></li>
          <li class="list_menu--item"><a href="#">Địa điểm ăn uống</a></li>
          <li class="list_menu--item"><a href="#">Chế độ ăn uống</a></li>
        </ul>
      </div>
    </div>
    <!-- end main footer -->
  </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<!-- Js slideShow đi cop :)))) -->
<script>
  var swiper = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 2,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      "@0.00": {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      "@0.75": {
        slidesPerView: 2,
        spaceBetween: 20,
      },
      "@1.00": {
        slidesPerView: 3,
        spaceBetween: 40,
      },
      "@1.50": {
        slidesPerView: 4,
        spaceBetween: 15,
      },
    },
  });
</script>
</body>

</html>