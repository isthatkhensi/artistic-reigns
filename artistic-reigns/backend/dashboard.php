<?php


require_once '../backend/config.php';
require_once '../backend/db.php';



$message = '';



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['create'])) {
        // Handle create operation
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $category_id = $_POST['category_id'];

        
        $query = "INSERT INTO products (name, description, price, image, category_id) VALUES ('$name', '$description', '$price', '$image', '$category_id')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $message = "Product created successfully.";
        } else {
            $message = "Error creating product: " . mysqli_error($conn);
        }
    } elseif (isset($_POST['update'])) {
        
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $_POST['image'];
        $category_id = $_POST['category_id'];

        
        $query = "UPDATE products SET name='$name', description='$description', price='$price', image='$image', category_id='$category_id' WHERE id='$id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $message = "Product updated successfully.";
        } else {
            $message = "Error updating product: " . mysqli_error($conn);
        }
    }
}



$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);



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
    <link rel="stylesheet" href="/artistic-reigns/css/style.css">
    <title>Artistic Reigns - Dashboard</title>
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
    <div class="page-content">
        <div class="new-prod">
            <h1 class="page-title-2">Create Product</h1>
            <form method="post" action="">
                <input type="text" name="name" placeholder="Name" required>
                <input type="text" name="description" placeholder="Description" required>
                <input type="number" name="price" placeholder="Price" required>
                <input type="text" name="image" placeholder="Image URL" required>
                <select name="category_id" required>
                    <option value="1">Bedroom</option>
                    <option value="2">Comfort</option>
                    <option value="3">Living Room</option>
                    <option value="4">Mattresses</option>
                    <option value="5">Couch</option>
                    <option value="6">Headboard</option>
                    <option value="7">Stool</option>
                </select>
                <button class="std-btn" type="submit" name="create">Create</button>
            </form>
        </div>
        <h1 class="page-title-2">Update Product</h1>
        <!-- Display existing products and their details -->
        <table class="table product-admin-tb">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <form method="post" action="">
                            <td><?php echo $product['id']; ?></td>
                            <td><input type="text" name="name" value="<?php echo $product['name']; ?>" required></td>
                            <td><input type="text" name="description" value="<?php echo $product['description']; ?>" required></td>
                            <td><input type="number" name="price" value="<?php echo $product['price']; ?>" required></td>
                            <td><input type="text" name="image" value="<?php echo $product['image']; ?>" required></td>
                            <td>
                                <select name="category_id" required>
                                    <option value="1" <?php if ($product['category_id'] == 1) echo 'selected'; ?>>Bedroom</option>
                                    <option value="2" <?php if ($product['category_id'] == 2) echo 'selected'; ?>>Comfort</option>
                                    <option value="3" <?php if ($product['category_id'] == 3) echo 'selected'; ?>>Living Room</option>
                                    <option value="4" <?php if ($product['category_id'] == 4) echo 'selected'; ?>>Mattresses</option>
                                    <option value="5" <?php if ($product['category_id'] == 5) echo 'selected'; ?>>Couch</option>
                                    <option value="6" <?php if ($product['category_id'] == 6) echo 'selected'; ?>>Headboard</option>
                                    <option value="7" <?php if ($product['category_id'] == 7) echo 'selected'; ?>>Stool</option>
                                </select>
                            </td>
                            <td><button class="std-btn" type="submit" name="update">Update</button><button type="button" class=" std-btn del-btn btn-danger" data-toggle="modal" data-target="#confirmDelete<?php echo $product['id']; ?>"><i class='bx bx-x'></i></button></td>
                            <!-- Delete confirmation modal -->
                            <div class="modal fade" id="confirmDelete<?php echo $product['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteLabel">Confirm Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this product?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div><?php echo $message; ?></div>

    </div>
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
      <script src="/artistic-reigns/js/script.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
</body>
</html>

