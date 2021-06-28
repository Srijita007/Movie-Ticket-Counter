<?php
include 'db_connect.php';
session_start();

$email = $_SESSION["email"];
$selected_product = $_POST['remove'];

$sql = "DELETE FROM `$email` WHERE `p_id` = '$selected_product';";
$result = mysqli_query($connection, $sql);
header("location: purchase_product.php");
