<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
// connect vào database thông qua thư viện post_add
function connect($query)
{
    $conn = new PDO("mysql:host=localhost;dbname=wolffood;charset=utf8", "root", "");
    $tmt = $conn->prepare($query);
    $tmt->execute();
    return $tmt;
}

function getAll($query)
{
    $get = connect($query)->fetchAll();
    return $get;
}

function getOne($query)
{
    $get = connect($query)->fetch();
    return $get;
}

// hàm xóa nhiều sản phẩm
function deleteAll($arr, $location)
{
    $arrID = [];
    // kiểm tra các ô input đã được check và lấy theo id ô được check
    foreach ($arr as $key => $value) {
        $arrID['' . $value["0"] . ''] = isset($_POST['' . $value["0"] . '']) ? $_POST['' . $value["0"] . ''] : "off";
    }
    // tách id từ mảng và xóa các sản phẩm được check
    foreach ($arrID as $key => $value) {
        if ($value == "on") {
            $query3 = "DELETE FROM products WHERE id_product=$key";
            connect($query3);
        }
    }
    // load lại trang hiển thị sản phẩm
    header('location:index.php?action=' . $location . '&&successful');
}




// lấy tất cả giá trị của bảng
// function allValues($table)
// {
//     $conn = connect();
//     $sql = "
//         SELECT * FROM $table";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
// }

// // thêm user vào bảng user 
// function addUser($username, $password, $email, $avatar)
// {
//     $conn = connect();
//     $sql = "
//         INSERT INTO `user`(`username`, `password`, `email`, `avatar`) 
//         VALUES (?,?,?,?);
//         ";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute([$username, $password, $email, $avatar]);
// }

// // xóa trường dữ liệu trong bảng 
// function delete($table, $column, $id)
// {
//     $conn = connect();
//     $sql = "
//         DELETE FROM $table WHERE $column = $id";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
// }

// // update user 
// function updateUser($username, $password, $email, $avatar, $idU)
// {
//     $conn = connect();
//     $sql = "
//             UPDATE `user` SET `username` = '$username', `password` = '$password', `email` = '$email', `avatar` = '$avatar' 
//             WHERE `user`.`id` = $idU;";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();
// }
