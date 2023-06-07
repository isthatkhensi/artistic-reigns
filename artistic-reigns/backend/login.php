<?php

require_once '../backend/config.php';
require_once '../backend//db.php';


$email = $_POST['email'];
$password = $_POST['password'];


$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$result = mysqli_query($conn, $query);


if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    if ($user['is_admin'] == 1) {
        header("Location: dashboard.php");
        exit();
    }
}

mysqli_close($conn);
?>
