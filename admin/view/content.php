<?php
// lấy mảng danh mục và lấy mảng sản phẩm từ 2 bảng lấy ra dc số lượng sản phẩm của 1 danh mục để hiển thị lên biểu đồ
$queryCategories = "SELECT * FROM categories";
$queryProduct = "SELECT * FROM products";
$arrCategories = getAll($queryCategories);
$arrProduct = getAll($queryProduct);
    
?>
<main>
    <div class="content-box">
        <div class="parameters">
            <div class="parameters__item">
                <div class="parameters__item--left">
                    <p><span>60</span><br>Bình Luận</p>
                </div>
                <div class="parameters__item--right">
                    <i class='bx bx-message-rounded-dots'></i>
                </div>
            </div>
            <div class="parameters__item">
                <div class="parameters__item--left">
                    <p><span>60</span><br>Lượt xem</p>
                </div>
                <div class="parameters__item--right">
                    <i class='bx bxs-face'></i>
                </div>
            </div>
            <div class="parameters__item">
                <div class="parameters__item--left">
                    <p><span>60</span><br>Đơn hàng mới</p>
                </div>
                <div class="parameters__item--right">
                    <i class='bx bx-cart-download'></i>
                </div>
            </div>
        </div>
        <div class="table-main">
            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên khách hàng</th>
                        <th>Thời gian giao dịch</th>
                        <th>Mã mặt hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            <div> Ánh Dương Ánh Dương Ánh Dương</div>
                        </td>
                        <td>18:20:20</td>
                        <td>#003</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>
                            <div> Ánh Dương Ánh Dương Ánh Dương</div>
                        </td>
                        <td>18:20:20</td>
                        <td>#003</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>
                            <div> Ánh Dương Ánh Dương Ánh Dương</div>
                        </td>
                        <td>18:20:20</td>
                        <td>#003</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>
                            <div> Ánh Dương Ánh Dương Ánh Dương</div>
                        </td>
                        <td>18:20:20</td>
                        <td>#003</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>
                            <div>Ánh Dương</div>
                        </td>
                        <td>18:20:20</td>
                        <td>#003</td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>
                            <div>Ánh Dương</div>
                        </td>
                        <td>18:20:20</td>
                        <td>#003</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</main>