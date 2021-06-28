<?php
include 'db_connect.php';
session_start();

// $file_name = "";

// if (isset($_FILES["P_Image"])) {
//   $folder = "Images/Product_Images/";
//   $file_exts = array("jpg", "jpeg", "bmp", "gif", "png", "doc", "docx", "pdf");
//   $value = explode(".", $_FILES["P_Image"]["name"]);
//   $uploaded_exts = end($value);

//   if ((($_FILES["P_Image"]["type"] == "image/gif")
//       || ($_FILES["P_Image"]["type"] == "image/jpeg")
//       || ($_FILES["P_Image"]["type"] == "image/jpg")
//       || ($_FILES["P_Image"]["type"] == "image/png")
//       || ($_FILES["P_Image"]["type"] == "application/doc")
//       || ($_FILES["P_Image"]["type"] == "application/docx")
//       || ($_FILES["P_Image"]["type"] == "application/pdf"))
//     && ($_FILES["P_Image"]["size"] < 2000000000)
//     && in_array($uploaded_exts, $file_exts)
//   ) {
//     if ($_FILES["P_Image"]["error"] > 0) {
//     } else {
//       if (file_exists("$folder/" . $_FILES["P_Image"]["name"])) {
//         $file_name = $_FILES["P_Image"]["name"];
//         unlink("$folder/" . $_FILES["P_Image"]["name"]);
//         move_uploaded_file($_FILES["P_Image"]["tmp_name"], $folder . $file_name);
//       } else {
//         $file_name = $_FILES["P_Image"]["name"];
//         move_uploaded_file($_FILES["P_Image"]["tmp_name"], $folder . $file_name);
//       }
//     }
//   }
// }

$product_id = $_POST['change_id'];
$selected_product = $_POST['selected_product'];
$product_name = $_POST['product_name'];
$product_cost = $_POST['product_cost'];
$product_type = $_POST['product_type'];
$product_status = $_POST['product_status'];
$product_desc = $_POST['product_desc'];

$sql = "UPDATE `products` SET `p_id` = '$product_id', `product_name` = '$product_name', `description` = '$product_desc', `category` = '$product_type', `price` = '$product_cost', `status` = '$product_status' WHERE `p_id` = '$selected_product'";

$result = mysqli_query($connection, $sql);
header("location: admin_products.php");
