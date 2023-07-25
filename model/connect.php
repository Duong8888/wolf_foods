<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

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

function deleteAll($arr, $table, $colum, $location)
{
    $arrID = [];
    foreach ($arr as $value) {
        $arrID["{$value[0]}"] = isset($_POST["{$value[0]}"]) ? "on" : "off";
    }
    foreach ($arrID as $key => $value) {
        if ($value === "on") {
            $query3 = "DELETE FROM $table WHERE $colum=$key";
            connect($query3);
        }
    }
    header("location:index.php?action=$location&&successful");
}

function updateAll($arr, $location, $idCategories)
{
    $arrID = [];
    foreach ($arr as $value) {
        $arrID["{$value[0]}"] = isset($_POST["{$value[0]}"]) ? "on" : "off";
    }
    foreach ($arrID as $key => $value) {
        if ($value === "on") {
            $queryUpdate = "UPDATE products SET id_categories=$idCategories WHERE id_product = $key";
            connect($queryUpdate);
        }
    }
    header("location:index.php?action=$location&&successful");
}

function validateEmail($email)
{
    $pattern = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if (!preg_match($pattern, $email)) {
        return "Email không đúng định dạng";
    }
}

function login($litUser, $email, $password)
{
    foreach ($litUser as $key => $value) {
        if ($email == $value['email']) {
            if ($password == $value['password']) {
                $_SESSION['idUser'] = $value['id'];
                if ($value['id_position'] == 3) {
                    header("location:index.php?Đăng nhập thành công");
                    return;
                } else {
                    header("location:../../admin/index.php?action=dashboard");
                    return;
                }
            } else {
                header("location:index.php?action=sign_in&&erro=Sai tên đăng nhập hoặc mật khẩu");
            }
        } else {
            header("location:index.php?action=sign_in&&erro=Sai tên đăng nhập hoặc mật khẩu");
        }
    }
}

function addUser($username, $password, $email, $avatar)
{
    $sql = "
        INSERT INTO `user`(`username`, `password`, `email`, `avatar`) 
        VALUES ('$username', '$password', '$email', '$avatar');
    ";
    connect($sql);
}

function pagination($table, $row)
{
    isset($_GET['page']) ? $page = $_GET['page'] : $page = 1;
    $start = ($page - 1) * $row;
    $query = "SELECT * FROM $table LIMIT $start,$row";
    $all_data = connect($query);
    return $all_data;
}

function countPages($row)
{
    $count = "SELECT id_product FROM products";
    $getAll = getAll($count);
    $countPage = sizeof($getAll);
    $result = ceil($countPage / $row);
    return $result;
}

function displayProduct($product)
{
    $discount = ($product['price'] / 100) * $product['discount'];
    $price = $product['price'] - ceil($discount);
    return $price;
}

function thongke()
{
    $query = "SELECT categories.category_name as name, COUNT(products.id_product) as countSP, MIN(products.price) as minPrice, MAX(products.price) as maxPrice, AVG(products.price) as avgPrice FROM categories LEFT JOIN products ON categories.id_categories = products.id_categories GROUP BY categories.id_categories";
    $arr = getAll($query);
    return $arr;
}
