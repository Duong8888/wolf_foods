<?php
$queryCountOrder = "SELECT COUNT(id_order) FROM order_user WHERE status=0 ";
$countOrder = getOne($queryCountOrder);
$queryCountView = "SELECT SUM(view) FROM products";
$countView = getOne($queryCountView);
$queryCountComment = "SELECT COUNT(content) FROM comment";
$countComment = getOne($queryCountComment);
?>
<main>
    <div class="content-box">
        <div class="parameters">
            <div class="parameters__item">
                <div class="parameters__item--left">
                    <p><span><?= $countComment[0] ?></span><br>Bình Luận</p>
                </div>
                <div class="parameters__item--right">
                    <i class='bx bx-message-rounded-dots'></i>
                </div>
            </div>
            <div class="parameters__item">
                <div class="parameters__item--left">
                    <p><span><?= $countView[0] ?></span><br>Lượt xem</p>
                </div>
                <div class="parameters__item--right">
                    <i class='bx bxs-face'></i>
                </div>
            </div>
            <div class="parameters__item">
                <div class="parameters__item--left">
                    <p><span><?= $countOrder[0] ?></span><br>Đơn hàng mới</p>
                </div>
                <div class="parameters__item--right">
                    <i class='bx bx-cart-download'></i>
                </div>
            </div>
        </div>

        <div class="table-main">
            <p class="text-title">Thống kê sản phẩm theo danh mục</p>
            <table class="table-new">
                <thead>
                    <tr>
                        <th>Tên danh mục</th>
                        <th>Số lượng sản phẩm</th>
                        <th>Giá thấp nhất</th>
                        <th>Giá cao nhất</th>
                        <th>Giá trung bình</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (thongke() as $value) { ?>
                        <tr>
                            <td>
                                <?= $value['name'] ?>
                            </td>
                            <td><?= $value['countSP'] ?></td>
                            <td><?= empty($value['minPrice'])?0:$value['minPrice']?>đ</td>
                            <td><?= empty($value['maxPrice'])?0:$value['maxPrice']?>đ</td>
                            <td><?= empty($value['avgPrice'])?0:$value['avgPrice']?>đ</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</main>