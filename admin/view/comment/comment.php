<?php 
$queryComment ="SELECT * FROM comment ORDER BY id_comment DESC";
$arrComment =getAll($queryComment);
$queryUser ="SELECT * FROM user";
$arrUser =getAll($queryUser);
$queryProducts ="SELECT * FROM products";
$arrProducts =getAll($queryProducts);

if(isset($_GET['delete-all'])){
    $location = 'comment';
    $tableName = 'comment';
    $columName = 'id_comment';
    deleteAll($arrComment,$tableName,$columName,$location);
}

?>
<main>
    <div class="content-box">
        <p class="title">Quản lý bình luận</p>
        <form action="index.php?action=comment&&delete-all" method="POST">
            <div class="box-btn">
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
                            <th>Tác giả</th>
                            <th>Thời gian</th>
                            <th>Nội dung</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($arrComment as $key => $value) :?>
                        <tr>
                            <td><input type="checkbox" name="<?=$value['id_comment']?>" class="checknow"></td>
                            <td><?php 
                                foreach($arrUser as $key =>$valueUser){
                                    if($valueUser['id']==$value['id_user']){
                                        echo $valueUser['username'];
                                    }
                                } 
                            ?></td>
                            <td><?= $value['time_send']?></td>
                            <td><div><?= $value['content']?></div></td>
                            <td>
                                <a href="index.php?action=detail-Comment&&CommentID=<?=$value['id_comment']?>">
                                    <button type="button" class="edit" >
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
        </form>
    </div>
</main>

