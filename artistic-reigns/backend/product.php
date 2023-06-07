<?php

session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}

require_once 'db.php';

if(isset($_GET['id'])){
    $product_id = $_GET['id'];
    
    $query = "SELECT * FROM products WHERE id = :product_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->execute();
    
    if($stmt->rowCount() > 0){
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        header("Location: error.php");
        exit;
    }
} else {
    header("Location: error.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
</head>
<body>
    <h2>Product Details</h2>
    <p><strong>Name:</strong> <?php echo $product['name']; ?></p>
    <p><strong>Price:</strong> <?php echo $product['price']; ?></p>
    <p><strong>Description:</strong> <?php echo $product['description']; ?></p>
    <!-- Add more product details here as needed -->
    
    <a href="dashboard.php">Back to Dashboard</a>
    <a href="logout.php">Logout</a>
</body>
</html>
