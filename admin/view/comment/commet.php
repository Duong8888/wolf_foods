<?php 
$queryComment ="SELECT * FROM comment ORDER BY id_comment DESC";
$arrComment =getAll($queryComment);
$queryUser ="SELECT * FROM user";
$arrUser =getAll($queryUser);
$queryProducts ="SELECT * FROM products";
$arrProducts =getAll($queryProducts)
?>
<main>
    <div class="content-box">
        <p class="title">Quản lý bình luận</p>
        <form action="">
            <div class="box-btn">
                <label for="" class="check-all">
                    Chọn tất cả
                </label>

                <a href="#add" onclick="return confirm('Bạn có muốn xóa tất cả mục đã chọn không')" class="btn-delete">
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
                            <td><input type="checkbox" class="checknow"></td>
                            <td><?php 
                                foreach($arrUser as $key =>$valueUser){
                                    if($valueUser['id']==$value['id_user']){
                                        echo $valueUser['username'];
                                    }
                                } 
                            ?></td>
                            <td><?= $value['time_send']?></td>
                            <td><?= $value['content']?></td>
                            <td>
                                <a href="#">
                                    <button class="edit" >
                                        <span class="material-symbols-outlined">
                                            visibility
                                        </span>
                                    </button>
                                </a>
                            </td></td>
                        </tr>    
                           
                            <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</main>

