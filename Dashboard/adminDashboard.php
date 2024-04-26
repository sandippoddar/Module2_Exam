<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Page</title>
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
                    <img src="./View/IMAGES/head_logo.jpg" alt="">
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
                      <li><a href="/addbooks">Add Books</a></li>
                      <li><a href="/EditProfile">Edit Profile</a></li>
                      <li><a href="/Profile">Profile</a></li>
                      <li><a href="./signupLogin/logout.php">Logout</a></li>
                    </ul>
                </nav>

                <!-- nav part end here -->
            </div>
        </header>
        <section class="product">
        <?php foreach ($result as $row) : ?>
          <div class="profile">
            <p>Prdouct Name: <?php echo $row['Product_name'] ?></p>
            <div class="image">
              <?php echo '<img src="data:image;base64,' . base64_encode($row['image']) .'" class="im">'; ?>
            </div>
            <p>Product Details: <?php echo $row['caption'] ?></p>
            <p>Product Price: <?php echo $row['price'] ?> /-</p>
          </div>
        <?php endforeach; ?>
        </section>
        </article>
        </main>
    </div>
</body>
</html>
