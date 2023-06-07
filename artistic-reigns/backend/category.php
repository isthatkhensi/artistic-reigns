<?php


session_start();

if(!isset($_SESSION['user_id'])){
    
    header("Location: login.php");
    exit;
}


require_once 'db.php';

if(isset($_GET['id'])){
    $category_id = $_GET['id'];
    
    
    $query = "SELECT * FROM categories WHERE id = :category_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':category_id', $category_id);
    $stmt->execute();
    
    
    if($stmt->rowCount() > 0){
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        
        
        $query = "SELECT * FROM products WHERE category_id = :category_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':category_id', $category_id);
        $stmt->execute();
        
        
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Category Details</title>
</head>
<body>
    <h2>Category: <?php echo $category['name']; ?></h2>
    
    <?php if(!empty($products)): ?>
        <ul>
            <?php foreach($products as $product): ?>
                <li>
                    <a href="product.php?id=<?php echo $product['id']; ?>">
                        <?php echo $product['name']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No products found in this category.</p>
    <?php endif; ?>
    
    <a href="dashboard.php">Back to Dashboard</a>
    <a href="logout.php">Logout</a>
</body>
</html>
