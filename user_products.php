<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION["sql"])) {
  $_SESSION['sql'] = "SELECT * FROM `products` WHERE status = 'Active' ORDER BY category, price";
}

$result = mysqli_query($connection, $_SESSION['sql']);

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

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</head>

<body>

  <section id="header" class="container-fluid">
    <div class="row">
      <div class="col-10 align-self-start">
        <?php include 'header.php' ?>
      </div>
      <div class="col align-self-center register_buttons">
        <button class="register_button" onclick="window.location='index.php'">Home</button>
        <button class="register_button" onclick="window.location='logout.php'">Logout</button>
      </div>
    </div>
  </section>

  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-4">
        <div class="electronics_header">
          Movies
        </div>
      </div>
      <div class="col-auto offset-lg-5">
        <div class="btn-group">
          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select Category
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="./Filter/all_movies.php">All Movies</a>
            <a class="dropdown-item" href="./Filter/action_movie.php">Action</a>
            <a class="dropdown-item" href="./Filter/comedy_movie.php">Comedy</a>
          </div>
        </div>
      </div>
      <div class="col-auto">
        <?php
        $email = $_SESSION["email"];
        $sql = "SELECT COUNT(p_id) AS itemCount FROM `$email`";
        $result2 = mysqli_query($connection, $sql);
        ?>
        <button type="button" class="btn btn-warning" onclick="window.location='purchase_product.php'"><b>View Cart:&nbsp;
            <?php $_SESSION['items'] = mysqli_fetch_object($result2)->itemCount;
            echo $_SESSION['items'];
            ?></b>
        </button>
      </div>
    </div>

    <div id="user_product_table" class="table_container">
      <table id="products_table" class="table table-hover table-striped">
        <tr>
          <th scope="col">Movie ID</th>
          <th scope="col">Movie</th>
          <!-- <th scope="col">Image</th> -->
          <th scope="col">Category</th>
          <th scope="col">Description</th>
          <th scope="col">Price</th>
          <th scope="col">Action</th>
        </tr>
        <?php while ($fetch = mysqli_fetch_object($result)) { ?>
          <tr>
            <td>
              <?php echo $fetch->p_id; ?>
            </td>
            <td>
              <?php echo $fetch->product_name; ?>
            </td>
            <!-- <td>
              <img src="Images/Product_Images/<?php echo $fetch->P_Image; ?>" alt="Product Picture" style="max-width: 50px; max-height: 50px;" />
            </td> -->
            <td>
              <?php echo $fetch->category; ?>
            </td>
            <td>
              <?php echo $fetch->description; ?>
            </td>
            <td>
              Rs.&nbsp;<?php echo $fetch->price; ?>
            </td>
            <td>
              <form action="add_to_cart.php" method="post">
                <button class="action_purchase" type="submit" name="purchase" value="<?php echo $fetch->p_id; ?>"><i class="fa fa-shopping-cart"></i></button>
              </form>
            </td>
          </tr>
        <?php } ?>
      </table>
    </div>
    <?php include 'footer.php' ?>

</body>

</html>