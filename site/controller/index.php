<?php
require '../../model/connect.php';
require '../view/header.php';

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'sign_in':
            require '../view/signIn/login.php';
            break;
        case 'sign_up':
            require '../view/signIn/register.php';
            break;
        case 'contact':
            require '../view/contact/contact.php';
            break;
        case 'all-product':
            require '../view/product/allproduct.php';
            break;
        case 'detail-product':
            require '../view/product/detail-product.php';
            break;
        case 'cart-product':
            require '../view/cart/cart.php';
            break;
        case 'profile':
            require '../view/profile/profile.php';
            break;
        case 'check-out':
            require '../view/checkout/checkout.php';
            break;
        case 'bill':
            require '../view/checkout/bill.php';
            break;
        default:
            include "../view/main_index.php";
            break;
    }
} else {
    require '../view/main_index.php';
}
require '../view/footer.php';
