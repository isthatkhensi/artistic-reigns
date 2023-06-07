<?php

require_once 'config.php';
require_once 'db.php';


session_start();


if (!isset($_SESSION['username'])) {
   
    header('Location: login.php');
    exit();
}


$page = $_GET['page'] ?? 'dashboard';


switch ($page) {
    case 'dashboard':
        require_once 'dashboard.php';
        break;
    case 'products':
        require_once 'product.php';
        break;
    case 'categories':
        require_once 'category.php';
        break;
    case 'orders':
        require_once 'order.php';
        break;
    default:
        require_once 'dashboard.php';
        break;
}
?>
