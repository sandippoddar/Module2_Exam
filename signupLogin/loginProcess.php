<?php
require_once './database/Query.php';

session_start();
if (isset($_POST['login'])) {
  $emailUser = $_POST['emailUser'];
  $password = $_POST['password'];
  $obLogin = new Query();
  $isSignUp = $obLogin->loginSelect($emailUser);
  $dbPassword = $isSignUp[0];
  $type = $isSignUp[1];

  if (password_verify($password, $dbPassword) && $isSignUp) {
    $_SESSION['flag'] = 1;
    $_SESSION['user'] = $emailUser;
    $_SESSION['type'] = $type;
    if ($type == 'Admin') {
      header("location: /admin");
      exit();
    }
    else {
      header("location: /reader");
      exit();
    }
  }
  else {
    session_destroy();
    $isSignUp = FALSE;
  }
}
