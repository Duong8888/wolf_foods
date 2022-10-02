<?php
require '../model/databse.php';

// require '../view/main_index.php';
if (isset($_GET['action'])) {
  switch ($_GET['action']) {
    case 'sign_in':
      require '../view/login.php';
      break;
    case 'sign_up':
      require '../view/register.php';
      break;
    case 'contact':
      require '../view/contact.php';
  }
} else {
  require '../view/main_index.php';
}
