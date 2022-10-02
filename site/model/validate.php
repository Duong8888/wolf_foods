<?php
function checkEmty($values)
{
  $err = array();
  foreach ($values as $data) {
    if (empty($_POST[$data])) {
      $err[$data] = '';
    } else {
      $_SESSION[$data] = $_POST[$data];
    }
  }
  return $err;
}

function checkImg($nameUpload, $folderSave)
{
  if (file_exists($_FILES[$nameUpload]['tmp_name']) || is_uploaded_file($_FILES[$nameUpload]['tmp_name'])) {
    $folder = $folderSave;
    $target_file = $folder . basename($_FILES["$nameUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Kiểm tra xem có phải file ảnh hay không
    if (isset($_POST["submit"])) {
      $check = getimagesize($_FILES["$nameUpload"]["tmp_name"]);
      if ($check === false) {
        $error['image'] = '';
      }
    }

    // Kiểm tra kích thước file
    if ($_FILES["$nameUpload"]["size"] > 500000) {
      $error['image'] = '';
    }

    // Kiểm tra xem đúng đuôi file được upload hay không
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
      $error['image'] = '';
    }

    // Kiểm tra xem bị 1 trong những lỗi ở trên hay không
    if (isset($error['image'])) {
      // echo "Sorry, your file was not uploaded.";
      $error['image'] = '';
      // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["$nameUpload"]["tmp_name"], $target_file)) {
      } else {
        $error['image'] = '';
      }
    }
  }
}
