<?php
include 'db_connect.php';
session_start();

$p_id = $_POST["product_id"];
$status = $_POST["status"];

if ($status == "Active") {
  $sql = "UPDATE `products` SET status = 'Inactive' WHERE p_id = '$p_id'";
  mysqli_query($connection, $sql);
} elseif ($status == "Inactive") {
  $sql = "UPDATE `products` SET status = 'Active' WHERE p_id = '$p_id'";
  mysqli_query($connection, $sql);
}

header("location: admin_products.php");
