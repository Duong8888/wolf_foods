<?php
    include "../model/connect.php";
    
    include "./view/header.php";

    if(isset($_GET['action'])){
        switch ($_GET['action']) {
            case 'dashboard':
                include "./view/content.php";
                break;
            case 'products':
                include "./view/product.php";
                break;
            case 'categories':
                include "./view/categories.php";
                break;
            case 'admin':
                include "./view/admin.php";
                break;    
            case 'clients':
                include "./view/client.php";
                break;
            case 'comment':
                include "./view/commet.php";
                break; 
            case 'add-product':
                include "./view/add-product.php";
                break; 
            case 'edit':
                include "./view/edit-product.php";
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