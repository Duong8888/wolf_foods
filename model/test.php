<?php
    include "connect.php";
    $query = "SELECT * FROM products";
    $hello = getAll($query);
    // echo date("d-m-Y");
    // Đặt múi gờ mặc định theo giờ việt nam
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    echo date('H:i'). " Ngày " .date('d/m/Y');
    if(isset($_POST['btn']) && isset($_POST['check'])){
        if($_POST['check'] == "on"){
echo '1';
        }else{
            echo "llll";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form action="test.php" method="POST">
    <input type="checkbox" name="check" id="">
    <button type="submit" name="btn">ok</button>
   </form>
</body>
</html>