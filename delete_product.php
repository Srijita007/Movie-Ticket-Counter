<?php
include 'db_connect.php';
session_start();

$selected_product = $_POST['delete'];

// $sql = "SELECT * FROM `products` WHERE `p_id` = '$selected_product';";
// $result = mysqli_query($connection, $sql);

// $folder = "Images/Product_Images/";
// $image = mysqli_fetch_object($result)->P_Image;

// if (file_exists("$folder/" . $image)) {
//   unlink("$folder/" . $image);
// }

$sql = "DELETE FROM `products` WHERE `p_id` = '$selected_product';";
$result = mysqli_query($connection, $sql);
header("location: admin_products.php");
