<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  include 'db_connect.php';

  $sql = "select * from admin where Email = '$email' AND Password = '$password'";
  $result = mysqli_query($connection, $sql);
  $num = mysqli_num_rows($result);

  if ($num == 1) {
    echo '<script>alert("Login Successful!");
          window.location.href = "admin_products.php";</script>';
    session_start();
    $_SESSION['loggedin']  = true;
    $_SESSION['email'] = $email;
  } else {
    $sql = "select * from customers where Email = '$email' AND Password = '$password'";
    $result = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
      echo '<script>alert("Login Successful!");
          window.location.href = "user_products.php";</script>';
      session_start();
      $_SESSION['loggedin']  = true;
      $_SESSION['email'] = $email;
    } else {
      echo '<script>alert("Sorry! We could not find your Account.");
      window.location.href = "login.php";</script>';
    }
  }
}
exit;
