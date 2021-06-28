<?php
include 'db_connect.php';
session_start();

$email = $_SESSION['email'];
$items = $_SESSION['items'];
$_SESSION['products'] = "Movies";
// $product_name = $_SESSION['product_name'];
// $months = $_POST['num_months'];
// $cost = $_SESSION['product_cost'];
$total_amount = $_POST['total_amount'];
$_SESSION['total_amount'] = $total_amount;

$sql = "SELECT * FROM `customers` WHERE `Email`='$email'";

$result = mysqli_query($connection, $sql);
$_SESSION['name'] = mysqli_fetch_object($result)->Name;
$name = $_SESSION['name'];

$result = mysqli_query($connection, $sql);
$_SESSION['contact'] = mysqli_fetch_object($result)->Contact;
$contact = $_SESSION['contact'];

$result = mysqli_query($connection, $sql);
$_SESSION['address'] = mysqli_fetch_object($result)->Address;
$address = $_SESSION['address'];

$_SESSION['furl'] = "http://localhost/New/Exam/PHP_PayUmoney/failure.php";
$_SESSION['surl'] = "http://localhost/New/Exam/PHP_PayUmoney/success.php";

$Date_Time = date("Y-m-d H:i:s");
$_SESSION["Date_Time"] = $Date_Time;

$sql = "INSERT INTO `orders` (`Date_Time`, `Name`, `email`, `Address`, `Contact`, `Items`, `Amount`) VALUES ('$Date_Time', '$name', '$email', '$address', '$contact', '$items', '$total_amount')";

$result = mysqli_query($connection, $sql);

if ($result) {
  header("location: ./PHP_PayUmoney/PayUMoney_form.php");
} else {
  echo '<script>alert("Sorry! Transaction Failed.");
  window.location.href = "user_products.php";</script>';
}
