<?php
require_once './database/Query.php';

$queryOb = new Query();
$result = $queryOb->fetchBooks();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADVANCE TASK 2</title>
  <link rel="stylesheet" href="./CSS/landing.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <main>
        <article>
        <!-- header part start here -->
        <header class="header">
            <!-- this is the wrapper class -->
            <div class="flex-all wrapper-content">
                <div class="img-container">
                    <img src="./View/IMAGES/head_logo.jpg">
                </div>

                <div class="input-box">
                  <i class="uil uil-search"></i>
                  <input type="text" placeholder="Search here..." class="searchprofile"/>
                  <button class="button">Search</button>
                </div>

                <!-- nav part start here -->
                <nav>
                    <ul class="header-ul">
                      <li><a href="/Dashboard">Home</a></li>
                      <li><a href="/wishlist">Wish List</a></li>
                      <li><a href="/Profile">Bucket list</a></li>
                      <li><a href="./signupLogin/logout.php">Logout</a></li>
                    </ul>
                </nav>

                <!-- nav part end here -->
            </div>
        </header>
        <section class="res">
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
        </section>
        <section>
          <button class="button load">Load More Contents</button>
        </section>
</article>
</main>
</div>
<script src="./AJAX/reader.js"></script>
</html>
</body>
