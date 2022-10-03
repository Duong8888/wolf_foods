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
function deleteAll($arr, $table, $colum, $location)
{
    $arrID = [];
    // kiểm tra các ô input đã được check và lấy theo id ô được check
    foreach ($arr as $value) {
        $arrID['' . $value["0"] . ''] = isset($_POST['' . $value["0"] . '']) ? "on" : "off";
    }
    // tách id từ mảng và xóa các sản phẩm được check
    foreach ($arrID as $key => $value) {
        if ($value == "on") {
            $query3 = "DELETE FROM $table WHERE $colum = $key";
            connect($query3);
        }
    }
    // load lại trang hiển thị sản phẩm
    header('location:index.php?action=' . $location . '&&successful');
}

// hàm chuyển nhiều danh mục
function updateAll($arr, $location, $idCategories)
{
    $arrID = [];
    foreach ($arr as $value) {
        $arrID['' . $value["0"] . ''] = isset($_POST['' . $value["0"] . '']) ? "on" : "off";
    }
    foreach ($arrID as $key => $value) {
        if ($value == "on") {
            $queryUpdate = "UPDATE products SET id_categories=$idCategories WHERE id_product = $key";
            connect($queryUpdate);
        }
    }
    header('location:index.php?action=' . $location . '&&successful');
}

// hàm kiểm tra định dạng email
function validateEmail($email)
{
    $partten = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if (!preg_match($partten, $email)) {
        return  "Email không đúng định dạng ";
    }
}
