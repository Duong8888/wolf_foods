<?php
$table = 'products';
$row = 8;
$allProduct = pagination($table, $row);
$countpage = countPages($row);
$queryCategories = "SELECT * FROM categories";
$getCategories = getAll($queryCategories);
?>
<main>
    <div class="box-container">
        <div class="box-filter">
            <div class="filter">
                <p class="filter__title">Bộ lọc sản phẩm</p>
                <div class="filter__box-item">
                    <p class="filter__naem-item">Danh mục</p>
                    <ul>
                        <?php foreach ($getCategories as $value): ?>
                        <li><input type="checkbox" name="" id="<?=$value['id_categories']?>"> <label for="<?=$value['id_categories']?>"><?=$value['category_name']?></label></li>
                        <?php endforeach?>
                    </ul>
                </div>
                <div class="filter__box-item">
                    <p class="filter__naem-item">Giá tiền</p>
                    <ul>
                        <li><input type="checkbox" name="" id="checkbox6"> <label for="checkbox6">Giá dưới 100.000đ</label></li>
                        <li><input type="checkbox" name="" id="checkbox7"> <label for="checkbox7">100.000đ - 200.000đ</label></li>
                        <li><input type="checkbox" name="" id="checkbox8"> <label for="checkbox8">200.000đ - 300.000đ</label></li>
                        <li><input type="checkbox" name="" id="checkbox9"> <label for="checkbox9">300.000đ - 500.000đ</label></li>
                        <li><input type="checkbox" name="" id="checkbox10"> <label for="checkbox10">500.000đ - 1.000.000đ</label></li>
                        <li><input type="checkbox" name="" id="checkbox11"> <label for="checkbox11">Giá trên 1.000.000đ</label></li>
                    </ul>
                </div>
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