<?php
$queryOrder = "SELECT * FROM order_user";
$arrOder = getAll($queryOrder);
?>
<main>
    <div class="content-box">
        <p class="title">Đơn Hàng</p>
        <div class="table-main">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên khách hàng</th>
                        <th>Tổng đơn</th>
                        <th>Thời gian</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($arrOder as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td>
                                <div><?= $value['name'] ?></div>
                            </td>
                            <td><?= $value['total_price'] ?>đ</td>
                            <td><?= $value['time_order'] ?></td>
                            <td>
                                <a href="index.php?action=order-detail&&ID=<?=$value['id_order']?>">
                                    <button type="button" class="edit">
                                        <span class="material-symbols-outlined">
                                            visibility
                                        </span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</main>