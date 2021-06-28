<?php
include 'db_connect.php';
session_start();

$email = $_SESSION["email"];

$sql = "SELECT * FROM `$email`";
$result = mysqli_query($connection, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php include 'title.php'; ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong|Roboto|Courgette|Merriweather|Lato">

  <link rel="stylesheet" href="./main.css">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <script src="purchase_product.js"></script>

</head>

<body onload="amountCalculator()">

  <section id="header" class="container-fluid">
    <div class="row">
      <div class="col-10 align-self-start">
        <?php include 'header.php' ?>
      </div>
      <div class="col align-self-center register_buttons">
        <button class="register_button" onclick="window.location='user_products.php'">Back</button>
        <button class="register_button" onclick="window.location='logout.php'">Logout</button>
      </div>
    </div>
  </section>

  <div class="electronics_header">
    Your Cart
  </div>
  <div id="product_cart" class="container-fluid">
    <div id="cart_table" class="table_container">
      <table id="products_table" class="table table-hover table-striped">
        <tr>
          <th scope="col">Movie</th>
          <th scope="col">Category</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Amount</th>
          <th scope="col">Action</th>
        </tr>
        <?php while ($fetch = mysqli_fetch_object($result)) { ?>
          <tr>
            <td>
              <?php echo $fetch->product_name; ?>
            </td>
            <td>
              <?php echo $fetch->category; ?>
            </td>
            <td id="cost" class="cost">
              <?php echo $fetch->price; ?>
            </td>
            <td>
              <input style="text-align: center;" oninput="amountCalculator()" type="number" name="quantity" id="quantity" class="quantity" min='1' max='10' value="" required>
            </td>
            <td>
              Rs. <input style="border: none; outline:none; text-align: center;" type="number" name="amount" id="amount" class="amount" value="" readonly> /-
            </td>
            <td>
              <form action="cart_remove.php" method="post">
                <button class="action_delete" type="submit" name="remove" value="<?php echo $fetch->p_id; ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
              </form>
            </td>
          </tr>
        <?php } ?>
      </table>
    </div>
    <form id="total_amount_view" action="checkout.php" method="POST">
      <span class="amount_text">Total Amount:</span>&ensp;&ensp;
      <span>Rs.</span>
      <input type="number" name="total_amount" id="total_amount" class="total_amount" value="" readonly>
      <span>/-</span>
      <span><button id="pay_button" type="submit" value="pay">Pay</button><span>
    </form>

  </div>
  <?php include 'footer.php' ?>
</body>

</html>