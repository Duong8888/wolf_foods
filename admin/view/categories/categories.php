<?php
$query = "SELECT *FROM categories ORDER BY id_categories DESC";
$arrCategories = getAll($query);
?>
<main>
    <div class="content-box">
        <p class="title">Danh mục</p>
        <form action="">
            <div class="box-btn">
                <a href="index.php?action=add-categories" class="add">
                    <button type="button">
                        Thêm danh mục
                        <span class="material-symbols-outlined">
                            post_add
                        </span>
                    </button>
                </a>
            </div>

            <div class="table-main">
                <table>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ảnh</th>
                            <th>Tên danh mục</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($arrCategories as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><img src="src/img/<?= $value['image'] ?>" alt=""></td>
                                <td>
                                    <div><?= $value['category_name'] ?></div>
                                </td>
                                <td>
                                    <a href="index.php?action=delete-categories&&IDdelete=<?= $value['id_categories'] ?>">
                                        <button type="button" class="delete">
                                            <span class="material-symbols-outlined">
                                                delete
                                            </span>
                                        </button></a>
                                    <a href="index.php?action=edit-categories&&IDcategories=<?= $value['id_categories'] ?>">
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