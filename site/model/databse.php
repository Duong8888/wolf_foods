<?php
global $conn;
function connect()
{
  try {
    $conn = new PDO("mysql:host=localhost;dbname=my_store;charset=UTF8", 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Kết nối thành công';
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
  return $conn;
}


connect();


// lấy tất cả giá trị của bảng
function allValues($table)
{
  $conn = connect();
  $sql = "
        SELECT * FROM $table";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
}

// thêm user vào bảng user 
function addUser($username, $password, $email, $avatar)
{
  $conn = connect();
  $sql = "
        INSERT INTO `user`(`username`, `password`, `email`, `avatar`, `id_position`) 
        VALUES (?,?,?,?);
        ";
  $stmt = $conn->prepare($sql);
  $stmt->execute([$username, $password, $email, $avatar]);
}

// xóa trường dữ liệu trong bảng 
function delete($table, $column, $id)
{
  $conn = connect();
  $sql = "
        DELETE FROM $table WHERE $column = $id";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
}

// update user 
function updateUser($username, $password, $email, $avatar, $idU)
{
  $conn = connect();
  $sql = "
  UPDATE `user` SET `username` = '$username', `password` = '$password', `email` = '$email', `avatar` = '$avatar' 
  WHERE `user`.`id` = $idU;";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
}
