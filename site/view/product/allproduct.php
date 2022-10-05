<?php
$queryProduct = "SELECT * FROM products";
$allProduct = getAll($queryProduct);
?>
<main>
    <div class="box-container">
        <div class="box-filter">
            <div class="filter">
                <p class="filter__title">Bộ lọc sản phẩm</p>
                <div class="filter__box-item">
                    <p class="filter__naem-item">Danh mục</p>
                    <ul>
                        <li><input type="checkbox" name="" id="checkbox1"> <label for="checkbox1">Thịt Bò Mĩ</label></li>
                        <li><input type="checkbox" name="" id="checkbox2"> <label for="checkbox2">Thịt Bò Mĩ</label></li>
                        <li><input type="checkbox" name="" id="checkbox3"> <label for="checkbox3">Thịt Bò Mĩ</label></li>
                        <li><input type="checkbox" name="" id="checkbox4"> <label for="checkbox4">Thịt Bò Mĩ</label></li>
                        <li><input type="checkbox" name="" id="checkbox5"> <label for="checkbox5">Thịt Bò Mĩ</label></li>
                    </ul>
                </div>
                <div class="filter__box-item">
                    <p class="filter__naem-item">Giá tiền</p>
                    <ul>
                        <li><input type="checkbox" name="" id="checkbox6"> <label for="checkbox6">Thịt Bò Mĩ</label></li>
                        <li><input type="checkbox" name="" id="checkbox7"> <label for="checkbox7">Thịt Bò Mĩ</label></li>
                        <li><input type="checkbox" name="" id="checkbox8"> <label for="checkbox8">Thịt Bò Mĩ</label></li>
                        <li><input type="checkbox" name="" id="checkbox9"> <label for="checkbox9">Thịt Bò Mĩ</label></li>
                        <li><input type="checkbox" name="" id="checkbox10"> <label for="checkbox10">Thịt Bò Mĩ</label></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="box-product">
            <div class="list__product box-new">
                <?php foreach ($allProduct as $key => $value) : ?>
                    <div class="product__item new">
                        <img src="../../admin/src/img/<?= $value['image'] ?>" alt="" class="product__img">
                        <a href="#" class="product__item--name new"><?= $value['product_name'] ?></a>
                        <div class="price-and-cart">
                            <p class="product__item--status"><?= $value['price'] ?>đ</p>
                            <p class="price__product--discount"><?= $value['discount'] ?>đ</p>
                        </div>
                        <button>Add cart</button>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</main>