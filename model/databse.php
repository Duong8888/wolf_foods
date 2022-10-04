<?php
// require '../../model/connect.php';

// lấy tất cả giá trị của bảng
function allValues($table)
{
  $sql = "
        SELECT * FROM $table";
  connect($sql);
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


// // update user 
function updateUser($username, $password, $email, $avatar, $idU)
{
  $sql = "
            UPDATE `user` SET `username` = '$username', `password` = '$password', `email` = '$email', `avatar` = '$avatar' 
            WHERE `user`.`id` = $idU;";
  connect($sql);
}
