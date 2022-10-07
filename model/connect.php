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
            $query3 = "DELETE FROM $table WHERE $colum=$key";
            connect($query3);
        }
    }
    // load lại trang hiển thị sản phẩm
    header('location:index.php?action=' . $location . '&&successful');
}

// hàm chuyển tất cả danh mục
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

// hàm sử lý phần đăng nhập
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

// thêm user vào bảng user 
function addUser($username, $password, $email, $avatar)
{
  $sql = "
  INSERT INTO `user`(`username`, `password`, `email`, `avatar`) 
  VALUES ('$username', '$password', '$email', '$avatar');
  ";
  connect($sql);
}
// phân trang 

function pagination($table,$row){
    // số bản gi hiển thị trên 1 trang là $row;
    // trang hiện tại
    isset($_GET['page'])?$page=$_GET['page']:$page = 1;
    // vị trí bắt đầu lấy có công thức = ($page-1)*$row;
    $start = ($page-1)*$row;
    $query = "SELECT * FROM $table LIMIT $start,$row";
    $all_data = connect($query);
    return $all_data;
}
// Lấy được số trang cần chia
function countPages($row){
    $count = "SELECT id_product FROM products";
    // số trang bằng tổng bản gi chia cho số bản gi lấy ra
    $getAll = getAll($count);
    // lấy số bản gi thông qua độ dài của mảng :V
    $countPage = sizeof($getAll);
    $result = ceil($countPage / $row);
    return $result;
}
// hiển thị giá sản phẩm đã được giảm giá
function displayProduct($product){
    $discount = ($product['price'] / 100)*$product['discount'];
    $price = $product['price'] - ceil($discount);
    return $price;
}