<?php


require_once 'backend/config.php';
require_once 'backend/db.php';


$categoryIds = [4];
$products = [];

foreach ($categoryIds as $categoryId) {
    $query = "SELECT * FROM products WHERE category_id = $categoryId";
    $result = mysqli_query($conn, $query);
    
    while ($row = mysqli_fetch_assoc($result)) {
        $products[] = $row;
    }
}


mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Owl Carousel -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <!-- Bootstrap Stylesheet & Script-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="css/style.css">
    <title>Artistic Reigns - Mattresses</title>
</head>
<body>
    <!-- Top Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top ml-auto">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Artistic Reigns</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class='bx bx-menu'></i>
          </button>
          <div class="collapse navbar-collapse ml-auto" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto justify-content-center mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.html">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="furniture.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Furniture
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="bedroom.php">Bedroom</a></li>
                  <li><a class="dropdown-item" href="comfort.php">Comfort</a></li>
                  <li><a class="dropdown-item" href="livingroom.php">Living Room</a></li>
                  <li><a class="dropdown-item" href="mattresses.php">Mattresses</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="services.html">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="gallery.html">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
              </li>
            </ul>
            <div class="menu-right">
                <button class="call-btn">call us</button>
                <i class='bx bxs-user' data-bs-toggle="modal" data-bs-target="#loginModal"></i>
                <i class='bx bxs-cart'></i>
                <i class='bx bx-search' ></i>
            </div>
          </div>
        </div>
    </nav>
    <!-- Page Title -->
    <div class="page-title">
        <img src="img/bedroom2.jpg" alt="" srcset="">
        <h1>Mattresses</h1>
    </div>
    <div class="product-list">
        <?php foreach ($products as $product): ?>
            <div class="product-item">
                <div class="img-container">
                <img src="img/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" />
                </div>
                <h4 class="product-name"><?php echo $product['name']; ?></h4>
                <!-- <p class="product-desc"><?php echo $product['description']; ?></p> -->
                <p class="product-price">R <?php echo $product['price']; ?></p>
                <button class="std-btn"> ADD TO CART </button>
            </div>
        <?php endforeach; ?>
    </div>
</body>
<footer id="footer" class="footer-area">
      <div class="footer-widget pt-80 pb-130">
          <div class="container">
              <div class="row">
                  <div class="footer-logo col-lg-3 col-md-4 col-sm-8">
                      <div class="footer-logo mt-50">
                          <a href="#" class="navbar-brand">
                            Artistic Reigns
                          </a>
                      </div>
                      <div class="copyright">
                          <p>Copyright © Artistic Reigns 2023. All rights reserved.</p>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-6">
                      <div class="footer-link mt-45">
                          <div class="f-title">
                              <h4 class="title">Product</h4>
                          </div>
                          <ul>
                            <li>Mattress</li>
                            <li>Couch</li>
                            <li>Headboard</li>
                            <li>Stool</li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-6">
                      <div class="footer-link mt-45">
                          <div class="f-title">
                              <h4 class="title">Company</h4>
                          </div>
                          <ul>
                            <li>Terms & Conditions</li>
                            <li>Privacy Policy</li>
                            <li>FAQ</li>
                            <li>Contact</li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-5 col-sm-8">
                    <div class="footer-link mt-45">
                      <div class="f-title">
                        <h4 class="title">Socials</h4>
                    </div>
                      <ul>
                        <li>Instagram</li>
                        <li>Facebook</li>
                        <li>LinkedIn</li>
                      </ul>
                    </div>
                  </div>
              </div> 
          </div> 
      </div> 
      <div class="copyright">
          <div class="container">
              <div class="row">
                  <div class="col-lg-12">
                     Website by <a href="https://khensimalaeka.com" target="_blank">Khensi Malaeka</a>
                  </div>
                  <hr>
              </div> 
          </div> 
      </div>
      </footer> 
    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
</html>