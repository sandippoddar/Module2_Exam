<?php
$url = $_SERVER['REQUEST_URI'];
$urlArr = explode('/',$url);
$route = '';
if (strpos($urlArr[1],'?')) {
  $urlNew = explode('?',$urlArr[1]);
  $route = $urlNew[0];
}
else {
  $route = $urlArr[1];
}
// echo $route;

switch ($route) {
  case '':
    require './signupLogin/login.php';
    break;
  case 'login':
    require './signupLogin/login.php';
    break;
  case 'register':
    require './signupLogin/registration.php';
    break;
  case 'admin':
    require './Dashboard/adminDashboard.php';
    break;
  case 'reader':
    require './Dashboard/readerDashboard.php';
    break;
  case 'addbooks':
    require './Dashboard/addbooks.php';
    break;
  case 'wishlist':
    require './Dashboard/wishList.php';
    break;
}
