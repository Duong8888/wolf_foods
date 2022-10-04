<?php
require './connect.php';
// global $conn;
// function connect()
// {
//   try {
//     $conn = new PDO("mysql:host=localhost;dbname=my_store;charset=UTF8", 'root', '');
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     // echo 'Kết nối thành công';
//   } catch (PDOException $e) {
//     echo $e->getMessage();
//   }
//   return $conn;
// }

// lấy tất cả giá trị của bảng
function allValues($table)
{
  // $conn = connect();
  $sql = "
        SELECT * FROM $table";
  connect($sql);
  // $stmt = $conn->prepare($sql);
  // $stmt->execute();
}

// thêm user vào bảng user 
function addUser($username, $password, $email, $avatar)
{
  $sql = "
  INSERT INTO `user`(`username`, `password`, `email`, `avatar`) 
  VALUES (?,?,?,?);
  ";
  connect($username, $password, $email, $avatar);
  // $tmt = $conn->prepare($sql);
  // // $conn = connect();
  // $tmt->execute([$username, $password, $email, $avatar]);
}

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
function updateUser($username, $password, $email, $avatar, $idU)
{
  // $conn = connect();
  $sql = "
            UPDATE `user` SET `username` = '$username', `password` = '$password', `email` = '$email', `avatar` = '$avatar' 
            WHERE `user`.`id` = $idU;";
  connect($sql);
}

// connect();
