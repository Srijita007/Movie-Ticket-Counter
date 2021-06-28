<?php
include 'db_connect.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php include 'title.php'; ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong|Roboto|Courgette|Merriweather|Lato">

  <link rel="stylesheet" href="./main.css">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>

<body>

  <section id="header" class="container-fluid">
    <div class="row">
      <div class="col-9 align-self-start">
        <?php include 'header.php' ?>
      </div>
      <div class="col align-self-center register_buttons">
        <?php if (!isset($_SESSION['loggedin'])) { ?>
          <button class="register_button" onclick="window.location='login.php'">Login</button>
        <?php } else { ?>
          <button class="register_button" onclick="window.location='user_products.php'">Products</button>
        <?php } ?>
        <button class="register_button" onclick="window.location='registration.php'">Sign-Up</button>
      </div>
    </div>
  </section>

  <section id="Home_Body">
    <div>
      <img src="./Images/Home_Store.svg" alt="">
    </div>
  </section>
  <?php include 'footer.php' ?>
</body>

</html>