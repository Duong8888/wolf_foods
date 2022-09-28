<?php
    include "../model/connect.php";
    
    include "./view/header.php";

    if(isset($_GET['action'])){
        switch ($_GET['action']) {
            case 'dashboard':
                include "./view/content.php";
                break;
            case 'products':
                include "./view/product/product.php";
                break;
            case 'categories':
                include "./view/categories/categories.php";
                break;
            case 'admin':
                include "./view/user/admin.php";
                break;    
            case 'clients':
                include "./view/client/client.php";
                break;
            case 'comment':
                include "./view/comment/commet.php";
                break; 
            case 'add-product':
                include "./view/product/add-product.php";
                break; 
            case 'edit':
                include "./view/product/edit-product.php";
                break; 
            case '':
                include "";
                break; 
            default:
                include "./view/content.php";
                break;
        }
    }else{
        include "./view/content.php";
    }
    include "./view/footer.php";
?>