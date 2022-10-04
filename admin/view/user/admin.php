<?php
$queryAdmin = "SELECT * FROM user WHERE id_position = 2";
$listAdmin = getAll($queryAdmin);
    // xóa một user
    if(isset($_GET['id'])){
        $getID = $_GET['id'];
        $query2 = "DELETE FROM user WHERE id=$getID";
        connect($query2);
        header('location:index.php?action=admin&&successful');
        // xóa nhiều user
    }else if(isset($_GET['delete-all'])){
        $location = 'admin';
        $tableName = 'user';
        $columName = 'id';
        deleteAll($listAdmin,$tableName,$columName,$location);
    }
?>
<main>
    <div class="content-box">
        <p class="title">Quản lý nhân viên</p>
        <form action="index.php?action=admin&&delete-all" method="POST">
            <div class="box-btn">

                <a href="index.php?action=add-admin" class="add">
                    <button type="button">
                        Thêm nhân viên
                        <span class="material-symbols-outlined">
                            post_add
                        </span>
                    </button>
                </a>

                <label for="" class="check-all">
                    Chọn tất cả
                </label>

                <a href="" onclick="return confirm('Bạn có muốn xóa tất cả mục đã chọn không')" class="btn-delete">
                    <button type="submit">
                        Xóa mục đã chọn
                        <span class="material-symbols-outlined">
                            delete
                        </span>
                    </button>
                </a>
            </div>

            <div class="table-main">
                <table>
                    <thead>
                        <tr>
                            <th>Chọn</th>
                            <th>Họ và tên</th>
                            <th>Ảnh</th>
                            <th>Email</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($listAdmin as $key => $value) : ?>
                            <tr>
                                <td><input type="checkbox" class="checknow" name="<?= $value['id'] ?>"></td>
                                <td>
                                    <div><?= $value['username'] ?></div>
                                </td>
                                <td><img src="./src/img/<?= $value['avatar'] ?>" alt=""></td>
                                <td>
                                    <div><?= $value['email'] ?></div>
                                </td>
                                <td>
                                    <a onclick="return confirm('Bạn có muốn xóa không')" href="index.php?action=admin&&id=<?= $value['id'] ?>">
                                        <button type="button" class="delete">
                                            <span class="material-symbols-outlined">
                                                delete
                                            </span>
                                        </button></a>
                                    <a href="index.php?action=edit-admin&&ID=<?=$value['id']?>">
                                        <button type="button" class="edit">
                                            <span class="material-symbols-outlined">
                                                edit_document
                                            </span>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</main>