<?php
include '../db_connect.php';
session_start();
$_SESSION['sql'] = "SELECT * FROM `products` WHERE status = 'Active' AND category = 'comedy' ORDER BY category, price";

header("location: ../user_products.php");
