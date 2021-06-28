<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = $_POST['name'];
  $address = $_POST['address'];
  $pincode = $_POST['pincode'];
  $contact = $_POST['contact'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];


  if ($password != $confirm_password) {
    echo '<script>alert("Password & Confirm Password does not match!");
    window.location.href = "registration.php";</script>';
  } else {

    include 'db_connect.php';

    $duplicate = mysqli_query($connection, "select * from customers where Email='$email'");
    if (mysqli_num_rows($duplicate) > 0) {
      echo '<script>alert("User with same Email ID already exist!");
        window.location.href = "registration.php";</script>';
    } else {
      $sql = "INSERT INTO `customers` (`Name`, `Address`, `Pincode`, `Contact`, `Email`, `Password`) VALUES ('$name', '$address', '$pincode', '$contact', '$email', '$password');";

      $result = mysqli_query($connection, $sql);

      $sql = "CREATE TABLE `$email` ( `p_id` VARCHAR(10) NOT NULL ,  `product_name` VARCHAR(50) NOT NULL ,  `category` VARCHAR(20) NOT NULL ,  `price` BIGINT NOT NULL ,  `quantity` INT NULL ,  `amount` BIGINT NULL ,    PRIMARY KEY  (`p_id`)) ENGINE = InnoDB";

      $result2 = mysqli_query($connection, $sql);

      if ($result && $result2) {
        echo '<script>alert("Success! Account created.");
          window.location.href = "login.php";</script>';
      } else {
        echo '<script>alert("Sorry! Account could not be created.");
          window.location.href = "registration.php";</script>';
      }
    }
  }
}
exit;
