<?php
$table = 'products';
$row = 8;
$allProduct = pagination($table, $row);
$countpage = countPages($row);
$queryCategories = "SELECT * FROM categories";
$getCategories = getAll($queryCategories);
$arrFilterPrice = [
    [

        'valueStart' => 0,
        'valueEnd' => 99999,
        'text' => "Giá dưới 100.000đ"
    ],
    [
        'valueStart' => 100000,
        'valueEnd' => 199999,
        'text' => "100.000đ - 200.000đ"
    ],
    [
        'valueStart' => 200000,
        'valueEnd' => 299999,
        'text' => "200.000đ - 300.000đ"
    ],
    [
        'valueStart' => 300000,
        'valueEnd' => 499999,
        'text' => "300.000đ - 500.000đ"
    ],
    [
        'valueStart' => 500000,
        'valueEnd' => 999999,
        'text' => "500.000đ - 1.000.000đ"
    ],
    [
        'valueStart' => 1000000,
        'valueEnd' => 999999999999,
        'text' => "Giá trên 1.000.000đ"
    ],
];

if (isset($_POST['btn-search'])) {
    $status = [];
    $price = [];
    $arrStart = [];
    $arrEnd = [];
    // biên kiểm tra xem có mục nào của categories được check không;
    $check = "";
    foreach ($getCategories as $key => $value) {
        // lấy được mảng trang thái các ô input phần categories
        $status[$value['id_categories']] = isset($_POST[$value['id_categories']]) ? "on" : "off";
        $check = isset($_POST[$value['id_categories']]) ? "on" : "off";
    }
    // Kiểm tra xem categories có được check
    foreach ($status as $key => $value) {
        if ($value == "on") {
            $check = "on";
        }
    }
    // Kiểm tra giá tiền được chọn
    foreach ($arrFilterPrice as $key => $value) {
        $price[$value['valueStart']] = isset($_POST[$value['valueStart']]) ? "on" : "off";
    }

    // lấy mức giá trong khoảng đã chọn được
    foreach ($price as $key => $value) {
        if ($value == "on") {
            foreach ($arrFilterPrice as $key1 => $value1) {
                if ($key == $value1['valueStart']) {
                    $arrStart[$key1] = $value1['valueStart'];
                    $arrEnd['end'] = $value1['valueEnd'];
                }
            }
        }
    }
    // hàm lấy dc id và tạo phần hỗ trợ câu lệnh truy vấn cho phần lọc sản Phẩm
    function displayId($status)
    {
        $count  = 0;
        $subQuery = "";
        foreach ($status as $key => $value) {
            if ($value == "on") {
                    if($count == 0){
                        $subQuery .= " id_categories = " . $key;
                    }else{
                        $subQuery .= " or id_categories = " . $key;
                    }
                $count++;
            }
        }
        return $subQuery;
    }
    // lấy giá trị đầu tiên của mảng $arrStart
    !empty($arrStart) ? $start = array_values($arrStart)[0] : "";
    isset($arrEnd['end']) ? $end = $arrEnd['end'] : "";
    // trường hợp người dùng lọc bằng categories và price
    if (isset($arrEnd['end']) && !empty($arrStart) && $check == "on") {
        $queryFilterProduct = "SELECT * FROM products WHERE price BETWEEN $start and $end and " . displayId($status);
    } else if (isset($arrEnd['end']) && !empty($arrStart)) { // trường hợp người dùng chỉ lọc bằng price
        $queryFilterProduct = "SELECT * FROM products WHERE price BETWEEN $start and $end ";
    } else if ($check == "on") { // trường hợp người dùng chỉ lọc bằng categories
        $queryFilterProduct = "SELECT * FROM products WHERE " . displayId($status);
    }
    // thực thi câu lệnh truy vấn và lấy ra mảng kết quả
    if (isset($queryFilterProduct)) {
        $allProduct = getAll($queryFilterProduct);
        if (empty($allProduct)) {
            header("location:index.php?action=all-product&&noProduct");
        }
    }
}
if (isset($_GET['keyWord'])) {
    $keyWord = $_GET['keyWord'];
    $query = "SELECT * FROM products WHERE product_name LIKE '%$keyWord%'";
    $allProduct = getAll($query);
}
?>
<main>
    <div class="box-container">
        <div class="box-filter">
            <div class="filter">
                <p class="filter__title">Bộ lọc sản phẩm</p>
                <form action="index.php?action=all-product" method="POST">
                    <button type="submit" name="btn-search" class="search-btn">Tìm kiếm</button>
                    <div class="filter__box-item">
                        <p class="filter__naem-item">Danh mục</p>
                        <ul>
                            <?php foreach ($getCategories as $value) : ?>
                                <li><input <?php if(isset($status[$value['id_categories']])){if($status[$value['id_categories']] == "on"){echo "checked";}}?> type="checkbox" name="<?= $value['id_categories'] ?>" id="<?= $value['id_categories'] ?>"> <label for="<?= $value['id_categories'] ?>"><?= $value['category_name'] ?></label></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="filter__box-item">
                        <p class="filter__naem-item">Giá tiền</p>
                        <ul>
                            <?php foreach ($arrFilterPrice as $key => $value) : ?>
                                <li><input <?php if(isset($price[$value['valueStart']])){if($price[$value['valueStart']] == "on"){echo "checked";}}?> type="checkbox" name="<?= $value['valueStart'] ?>" id="<?= $key ?>"> <label for="<?= $key ?>"><?= $value['text'] ?></label></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
        <div class="box-product">
            <?php if (isset($_GET['keyWord']) && empty($_GET['keyWord']) || isset($_GET['noProduct'])) { ?>
                <div class="alert alert-warning" role="alert">
                    Sản phẩm đã hết !
                </div>
            <?php } else { ?>

                <div class="list__product box-new">
                    <?php foreach ($allProduct as $value) : ?>
                        <div class="product__item new">
                            <!-- gọi ra hàm tính toán và hiển thị giá sản phẩm -->
                            <img src="../../admin/src/img/<?= $value['image'] ?>" alt="" class="product__img">
                            <a href="#" class="product__item--name new"><?= $value['product_name'] ?></a>
                            <div class="price-and-cart">
                                <p class="product__item--status"><?= displayProduct($value) ?>đ</p>
                                <p class="price__product--discount"><?= $value['price'] ?>đ</p>
                            </div>
                            <button>Add cart</button>
                        </div>
                    <?php endforeach ?>
                </div>
                <nav aria-label="...">
                    <ul class="pagination pagination-sm">
                        <?php for ($item = 1; $item <= $countpage; $item++) : ?>
                            <li class="page-item <?= $_GET['page'] == $item ? "active" : "" ?>"><a class="page-link" href="index.php?action=all-product&&page=<?= $item ?>"><?= $item ?></a></li>
                        <?php endfor ?>
                    </ul>
                </nav>
            <?php } ?>
        </div>
    </div>
</main>