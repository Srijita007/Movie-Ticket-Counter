<?php
include 'db_connect.php';
session_start();
$sql = "SELECT * FROM products ORDER BY status, category, price";
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
</head>

<body">

  <section id="header" class="container-fluid">
    <div class="row">
      <div class="col-10 align-self-start">
        <?php include 'header.php' ?>
      </div>
      <div class="col align-self-center register_buttons">
        <button class="register_button" onclick="window.location='logout.php'">Logout</button>
      </div>
    </div>
  </section>

  <section id="admin_products" class="container-fluid">
    <div class="row align-items-center" style="margin: 1% 0%;">
      <div class="col-4">
        <div class="electronics_header">
          Movies
        </div>
      </div>
      <div class="col-auto offset-lg-6">
        <button type="button" class="btn btn-success" onclick="window.location='add_product.php'">Add Movie</button>
      </div>
    </div>

    <div id="existing_products" class="row">
      <div class="table_container">
        <table id="products_table" class="table table-hover table-striped">
          <tr>
            <th scope="col">Movie ID</th>
            <th scope="col">Movie</th>
            <!-- <th scope="col">Image</th> -->
            <th scope="col">Category</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Status</th>
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
                <form id="status_form" action="status_toggle.php" method="post">
                  <input type="hidden" name="product_id" id="product_id" value="<?php echo $fetch->p_id; ?>">
                  <button type="submit" name="status" id="status" value="<?php echo $fetch->status; ?>"><?php echo $fetch->status; ?></button>
                </form>
              </td>
              <td>
                <form action="edit_product.php" method="post">
                  <button class="action_edit" type="submit" name="edit" value="<?php echo $fetch->p_id; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                </form>
                <form action="delete_product.php" method="post">
                  <button class="action_delete" type="submit" name="delete" value="<?php echo $fetch->p_id; ?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                </form>
              </td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </section>
  <?php include 'footer.php' ?>
  </body>

</html>

<?php mysqli_close($connection); ?>