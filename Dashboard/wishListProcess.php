<?php

require_once __dir__.'/../database/Query.php';
session_start();

$bookId = $_POST['bookId'];
$user = $_SESSION['user'];

$queryOb = new Query();
if (!$queryOb->isWishList($user,$bookId)) {
  $queryOb->insertWishlist($user,$bookId);
}
