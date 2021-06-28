<?php
include 'db_connect.php';
session_start();

$email = $_SESSION['email'];

$p_id = $_POST['purchase'];
$sql = "SELECT * FROM `products` WHERE p_id = '$p_id'";
$result = mysqli_query($connection, $sql);

$fetch = mysqli_fetch_object($result);

$product_name = $fetch->product_name;
$category = $fetch->category;
$price = $fetch->price;

$sql = "INSERT INTO `$email` (`p_id`, `product_name`, `category`, `price`, `quantity`, `amount`) VALUES ('$p_id', '$product_name', '$category', '$price', NULL, NULL)";

$result = mysqli_query($connection, $sql);

header("location: user_products.php");
