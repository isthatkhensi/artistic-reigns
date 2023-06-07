<?php


session_start();


if(!isset($_SESSION['user_id'])){
   
    header("Location: login.php");
    exit;
}


require_once 'db.php';


if($_SERVER['REQUEST_METHOD'] === 'POST'){
  
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $user_id = $_SESSION['user_id'];
    
    
    $query = "INSERT INTO orders (user_id, product_id, quantity) VALUES (:user_id, :product_id, :quantity)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':quantity', $quantity);
    
    if($stmt->execute()){
        
        header("Location: dashboard.php");
        exit;
    } else {
       
        header("Location: error.php");
        exit;
    }
}


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
    <title>Order Product</title>
</head>
<body>
    <h2>Product: <?php echo $product['name']; ?></h2>
    
    <form method="POST" action="order.php">
        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
        
        <label>Quantity:</label>
        <input type="number" name="quantity" min="1" required>
        
        <button type="submit">Place Order</button>
    </form>
    
    <a href="dashboard.php">
