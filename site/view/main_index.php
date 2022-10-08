<?php
$qureyCategories = "SELECT * FROM categories";
$qureyProduct = "SELECT * FROM products";
$arrCategories = getAll($qureyCategories);
$arrProduct = getAll($qureyProduct);
// lấy sản phảm có view cao
$qureyProductSlider = "SELECT * FROM products ORDER BY view DESC";
$arrProductSlider = getAll($qureyProductSlider);
// phân trang hiển thị sản phẩm 
$row = 10;
$tabel = 'products';
$paginationProduct = pagination($tabel, $row);
$countpage = countPages($row);
?>
<main>
  <div class="banner">
    <a href="#"><img src="../src/img/img__header/banner.jpg" alt="" class="banner__img"></a>
  </div>
  <!-- end banner -->
  <div class="categories">
    <p class="title-categories">Danh mục sản phẩm</p>
    <div class="main-categories">
      <?php foreach ($arrCategories as $item) : ?>
        <div class="box-categories">
          <div class="categories-img">
            <img src="../../admin/src/img/<?= $item['image'] ?>" alt="">
          </div>
          <a href="index.php?action=all-product&&page=1" class="categories-name">
            <?= $item['category_name'] ?>
          </a>
        </div>
      <?php endforeach ?>
    </div>
  </div>
  <!-- end list categories -->
  <div class="wrap-discount">
    <div class="discount__product">
      <h1 class="title__discount">10 Sản phẩm nhiều lượt xem nhất</h1>
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <?php for ($i = 0; $i < 10; $i++) : ?>
            <div class="swiper-slide">
              <img src="../../admin/src/img/<?= $arrProductSlider[$i]['image'] ?>" alt="" class="slogan__product">

              <a href="index.php?action=detail-product&&ID=<?=$arrProductSlider[$i]['id_product']?>" class="product__item--name"><?= $arrProductSlider[$i]['product_name'] ?></a>
              <div class="price-and-cart">
                <p class="product__item--status"><?= displayProduct($arrProductSlider[$i]) ?></p>
                <p class="price__product--discount"><?= $arrProductSlider[$i]['price'] ?>đ</p>
              </div>
            </div>
          <?php endfor ?>
        </div>
      </div>
      <!-- end slideshow :)) -->
    </div>
  </div>
  <!-- end discount prd -->
  <div class="list__product--wrap">
    <div class="title--button__categories">
      <h1 class="title__product" id="listProduct">
        Thịt, cá, trứng, rau
        <!-- thay đổi theo button chọn ở dưới -->
      </h1>
      <div class="list__categories--button">
        <button class="category__button">Thịt, cá, trứng, rau</button>
        <button class="category__button">Hàng đông mát</button>
        <button class="category__button">Mì, miến, cháo, phở</button>
        <button class="category__button">Gạo, bột, đồ khô</button>
      </div>
    </div>
    <div class="list__product">
      <?php foreach ($paginationProduct as $item) : ?>
        <div class="product__item">
          <img src="../../admin/src/img/<?= $item['image'] ?>" alt="">

          <a href="index.php?action=detail-product&&ID=<?=$item['id_product']?>" class="product__item--name"><?= $item['product_name'] ?></a>
          <div class="price-and-cart">
            <p class="product__item--status"><?= displayProduct($item) ?></p>
            <p class="price__product--discount"><?= $item['price'] ?>đ</p>
          </div>
        </div>
      <?php endforeach ?>
    </div>
    <div class="box-nav">
      <nav aria-label="...">
        <ul class="pagination pagination-sm">
          <?php for ($item = 1; $item <= $countpage; $item++) : ?>
            <li class="page-item <?= $_GET['page'] == $item ? "active" : "" ?>"><a class="page-link" href="index.php?page=<?= $item ?>#listProduct"><?= $item ?></a></li>
          <?php endfor ?>
        </ul>
      </nav>
    </div>
  </div>
</main>