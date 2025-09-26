<?php
session_start();

// Set session security parameters
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 1);

$conn = mysqli_connect('localhost:3306','root','','shop_db') or die('connection failed');

// Initialize user session variables if not set
if(!isset($_SESSION['user_id'])) {
    $_SESSION['user_id'] = '';
    $_SESSION['user_name'] = '';
    $_SESSION['user_email'] = '';
}
?>