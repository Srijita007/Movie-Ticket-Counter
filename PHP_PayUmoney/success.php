<?php
include '../db_connect.php';
session_start();

$status = $_POST["status"];
$firstname = $_POST["firstname"];
$amount = $_POST["amount"];
$txnid = $_POST["txnid"];
$posted_hash = $_POST["hash"];
$key = $_POST["key"];
$productinfo = $_POST["productinfo"];
$email = $_POST["email"];

if (isset($_SESSION["Date_Time"])) {
      $Date_Time = $_SESSION["Date_Time"];
}


$salt = "e5iIg1jwi8";

// Salt should be same Post Request 

if (isset($_POST["additionalCharges"])) {
      $additionalCharges = $_POST["additionalCharges"];
      $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
} else {
      $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
}
$hash = hash("sha512", $retHashSeq);
if ($hash != $posted_hash) {
      echo "Invalid Transaction. Please try again";
} else {
      echo "&ensp;<h3>&ensp;&ensp;Thank You. Your order status is " . $status . ".</h3>";
      echo "<h4>&ensp;&ensp;Your Transaction ID for this transaction is " . $txnid . ".</h4>";
      echo "<h4>&ensp;&ensp;We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";

      if (isset($Date_Time)) {
            $sql = "UPDATE `orders` SET `Transaction_ID` = '$txnid', `Status` = 'Paid' WHERE `Date_Time` = '$Date_Time' AND `Email` = '$email';";
            $result = mysqli_query($connection, $sql);
      }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?php include '../title.php'; ?></title>

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong|Roboto|Courgette|Merriweather|Lato">

      <link rel="stylesheet" href="../main.css">

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>

<body>
      <button style="margin: 2% 5%; padding: 0.2% 0.4%; background-color: rgb(176, 92, 255); font-weight: bolder; border-radius: 5px; border: 2px solid black; font-size: larger;" class="register_button" onclick="window.location='../logout.php'">Home</button>
</body>

</html>