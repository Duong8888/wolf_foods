<?php
require "../model/databse.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $account = array();
  $error = checkEmty(array("username", "email", "password", "re-password", "avatar"));
  if ($_POST['password'] != $_POST['re-password']) {
    $error['checkPass'] = '';
  }
  if (empty($error)) {
    $account['username'] = $_POST['username'];
    $account['email'] = $_POST['email'];
    $account['password'] = $_POST['password'];
    $account['avatar'] = $avatar;

    addUser($account['username'], $account['password'], $account['email'], $account['avatar']);
  }
}

require "../view/register.php";
