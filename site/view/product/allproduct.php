<?php
$table = 'products';
$row = 8;
$allProduct = pagination($table, $row);
$countpage = countPages($row);
$queryCategories = "SELECT * FROM categories";
$getCategories = getAll($queryCategories);
$arrFilterPrice = [
    [
        'name' => 0,
        'text' => "Giá dưới 100.000đ"],
    [
        'name' => 1,
        'text' => "100.000đ - 200.000đ"],
    [
        'name' => 2,
        'text' => "200.000đ - 300.000đ"],
    [
        'name' => 3,
        'text' => "300.000đ - 500.000đ"],
    [
        'name' => 4,
        'text' => "500.000đ - 1.000.000đ"],
    [
        'name' => 5,
        'text' => "Giá trên 1000.000đ"],
];
?>
<main>
    <div class="box-container">
        <div class="box-filter">
            <div class="filter">
                <p class="filter__title">Bộ lọc sản phẩm</p>
                <form action="index.php?action=all-product" method="POST">
                    <button type="submit" class="search-btn">Tìm kiếm</button>
                    <div class="filter__box-item">
                        <p class="filter__naem-item">Danh mục</p>
                        <ul>
                            <?php foreach ($getCategories as $value): ?>
                                <li><input type="checkbox" name="<?=$value['id_categories']?>" id="<?=$value['id_categories']?>"> <label for="<?=$value['id_categories']?>"><?=$value['category_name']?></label></li>
                            <?php endforeach?>
                        </ul>
                    </div>
                    <div class="filter__box-item">
                        <p class="filter__naem-item">Giá tiền</p>
                        <ul>
                        <?php foreach ($arrFilterPrice as $key => $value): ?>
                                <li><input type="checkbox" name="<?=$value['name']?>" id="<?=$key?>"> <label for="<?=$key?>"><?=$value['text']?></label></li>
                            <?php endforeach?>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
        <div class="box-product">
            <div class="list__product box-new">
                <?php foreach ($allProduct as $value): ?>
                    <div class="product__item new">
                        <img src="../../admin/src/img/<?=$value['image']?>" alt="" class="product__img">
                        <a href="#" class="product__item--name new"><?=$value['product_name']?></a>
                        <div class="price-and-cart">
                            <p class="product__item--status"><?=$value['price']?>đ</p>
                            <p class="price__product--discount"><?=$value['discount']?>đ</p>
                        </div>
                        <button>Add cart</button>
                    </div>
                <?php endforeach?>
                <nav aria-label="...">
                    <ul class="pagination pagination-sm">
                        <?php for ($item = 1; $item <= $countpage; $item++): ?>
                            <li class="page-item <?=$_GET['page'] == $item ? "active" : ""?>"><a class="page-link" href="index.php?action=all-product&&page=<?=$item?>"><?=$item?></a></li>
                        <?php endfor?>
                    </ul>
                </nav>
            </div>
        </div>

    </div>

</main>