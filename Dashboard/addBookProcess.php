<?php
require_once './database/Query.php';

if(isset($_POST['Submit'])) {
  $ob = new Query();
  $title = $_POST['book'];
  $author = $_POST['author'];
  $date = $_POST['date'];
  $rating = $_POST['rating'];
  $category = $_POST['category'];
  $image = file_get_contents($_FILES['image']['tmp_name']);
  $ob->addBooks ($image, $title, $date, $author, $rating, $category);
  header("location: /admin");
}
