<?php
require_once __dir__.'/../database/Query.php';
session_start();

$bookId = $_POST['bookId'];
$user = $_SESSION['user'];

$queryOb = new Query();

$queryOb->removeWishList($user,$bookId);
$result = $queryOb->fetchCart($user);
?>
<?php if (!$result): ?>
<h1>THERE IS NOTHING IN YOUR WISHLIST!!</h1>
<?php else: ?>
  <table>
    <tr>
      <th>TITLE</th>
      <th>AUTHOR</th>
      <th>DATE OF PUBLICATION</th>
    </tr>
    <?php foreach ($result as $row) : ?>
      <tr>
        <td><?php echo $row['book_title']?></td>
        <td><?php echo $row['author']?></td>
        <td><?php echo $row['date_publication']?></td>
        <td><button class="button delete" data-book-id="<?php echo $row['Book_Id'] ?>">Remove</button></td>
      </tr>
    <?php endforeach; ?>
  </table>
<?php endif;?>
