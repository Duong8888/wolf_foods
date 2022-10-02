<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
// connect vào database thông qua thư viện post_add
function connect($query){
    $conn = new PDO("mysql:host=localhost;dbname=wolffood;charset=utf8","root","");
    $tmt = $conn->prepare($query);
    $tmt->execute();
    return $tmt;
}

function getAll($query){
    $get = connect($query)->fetchAll();
    return $get;
}

function getOne($query){
    $get = connect($query)->fetch();
    return $get;
}

// hàm xóa nhiều sản phẩm
function deleteAll($arr,$location){
    $arrID = [];
    // kiểm tra các ô input đã được check và lấy theo id ô được check
    foreach ($arr as $value){
        $arrID[''.$value["0"].''] = isset($_POST[''.$value["0"].''])?"on":"off";
    }
    // tách id từ mảng và xóa các sản phẩm được check
    foreach ($arrID as $key => $value){
        if($value == "on"){
            $query3 = "DELETE FROM products WHERE id_product=$key";
            connect($query3);
        }
    }
    // load lại trang hiển thị sản phẩm
    header('location:index.php?action='.$location.'&&successful');
}

// hàm chuyển nhiều danh mục
function updateAll($arr,$location,$idCategories){
    $arrID = [];
    // kiểm tra các ô input đã được check và lấy theo id ô được check
    foreach ($arr as $value){
        $arrID[''.$value["0"].''] = isset($_POST[''.$value["0"].''])?"on":"off";
    }
    foreach ($arrID as $key => $value){
        if($value == "on"){
            $queryUpdate = "UPDATE products SET id_categories=$idCategories WHERE id_product = $key";
            connect($queryUpdate);
        }
    }
    // print_r($arrID);
    // die;
    // load lại trang hiển thị sản phẩm
    header('location:index.php?action='.$location.'&&successful');
}