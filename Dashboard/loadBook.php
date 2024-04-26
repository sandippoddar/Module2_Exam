<?php
require_once __DIR__.'/../database/Query.php';

$queryOb = new Query();
$count = $_POST['count'];
$result = $queryOb->loadBook($count);
?>
<?php foreach ($result as $row) : ?>
<div class="profile">
  <p>Book Name: <?php echo $row['book_title'] ?></p>
  <div class="image">
    <?php echo '<img src="data:image;base64,' . base64_encode($row['poster_image']) .'" class="im">'; ?>
  </div>
  <p>Date of Publish: <?php echo $row['date_publication'] ?></p>
  <p>Author: <?php echo $row['author'] ?></p>
  <p>Ratings: <?php echo $row['ratings'] ?></p>
  <p>Category: <?php echo $row['category'] ?></p>
  <button class="button wish" data-book-id = "<?php echo $row['Book_Id'] ?>">Add to Bucketlist</button>
</div>
<?php endforeach; ?>
