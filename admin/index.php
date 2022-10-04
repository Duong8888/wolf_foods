<?php
include "../model/connect.php";

include "./view/header.php";

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'dashboard':
            include "./view/content.php";
            break;
            // product
        case 'products':
            include "./view/product/product.php";
            break;
        case 'add-product':
            include "./view/product/add-product.php";
            break;
        case 'edit':
            include "./view/product/edit-product.php";
            break;
            // end product

            // categories
        case 'categories':
            include "./view/categories/categories.php";
            break;
        case 'add-categories':
            include "./view/categories/add-categories.php";
            break;
        case 'delete-categories':
            include "./view/categories/delete-categories.php";
            break;
        case 'edit-categories':
            include "./view/categories/edit-categories.php";
            break;
            // end categoreis

            // admin
        case 'admin':
            include "./view/user/admin.php";
            break;
        case 'add-admin':
            include "./view/user/add-admin.php";
            break;
        case 'edit-admin':
            include "./view/user/edit-admin.php";
            break;
            // end admin

            // clients
        case 'clients':
            include "./view/client/client.php";
            break;
        case 'add-clients':
            include "./view/client/add-client.php";
            break;
        case 'edit-clients':
            include "./view/client/edit-client.php";
            break;
            // end clients

            // profile 
        case 'profile':
            include "./view/profile/profile.php";
            break;
            // end profile

            //comment
        case 'comment':
            include "./view/comment/comment.php";
            break;
        case 'detail-Comment':
            include "./view/comment/detail-comment.php";
            break;
            //end comment
        case 'log-out':
            include "./view/logout/log-out.php";
            break;
        default:
            include "./view/content.php";
            break;
    }
} else {
    include "./view/content.php";
}
include "./view/footer.php";
