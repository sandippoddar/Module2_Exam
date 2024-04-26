<?php
require_once './database/Query.php';

$queryOb = new Query();

if (isset($_POST["submit"])) {
  $userName = $_POST['userName'];
  $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
  $role = $_POST['type'];
  $queryOb->insert($userName, $password, $role);
  header('location: /login');
  exit();
}
