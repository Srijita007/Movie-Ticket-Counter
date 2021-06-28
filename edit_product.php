<?php
include 'db_connect.php';
session_start();
$selected_product = $_POST['edit'];
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

<body>

  <section id="header" class="container-fluid">
    <div class="row">
      <div class="col-10 align-self-start">
        <?php include 'header.php' ?>
      </div>
      <div class="col align-self-center register_buttons">
        <button class="register_button" onclick="window.location='admin_products.php'">Back</button>
        <button class="register_button" onclick="window.location='logout.php'">Logout</button>
      </div>
    </div>
  </section>

  <section id="edit_product_container" class="container-fluid">
    <div id="edit_product" class="row">
      <h3>Edit Movie</h3>
      <form action="handle_edit_product.php" method="post" enctype="multipart/form-data">
        <div class="row justify-content-around">
          <div class="col-4">
            <div class="form-group">
              <label for="SelectedProduct"><b>Selected Movie</b></label>
              <input type="text" class="form-control" placeholder="" value="<?php echo $selected_product; ?>" name="selected_product" readonly />
            </div>
            <div class="form-group">
              <label for="Change_ID"><b>Change ID</b></label>
              <input type="text" class="form-control" placeholder="" value="<?php echo $selected_product; ?>" name="change_id" />
            </div>
            <div class="form-group">
              <label for="ProductName"><b>Change Name</b></label>
              <input type="text" class="form-control" placeholder="Enter Product Name" value="" name="product_name" required />
            </div>
            <!-- <div class="form-group">
              <label for="ProductImage"><b>Product Image</b></label>
              <input type="file" class="form-control" placeholder="" value="" name="P_Image" required />
            </div> -->
            <div class="form-group">
              <label for="ProductCost"><b>Ticket Price</b></label>
              <input type="number" min="1" max="999999" class="form-control" placeholder="Enter Product Cost" value="" name="product_cost" required />
            </div>
            <div class="form-group">
              <label for="ProductType"><b>Movie Type:&ensp;&ensp;&ensp;&ensp;&ensp;</b></label>
              <label for="action_product">Action</label>
              <input type="radio" id="smartphone_product" name="product_type" value="action">&ensp;&ensp;
              <label for="comedy_product">Comedy</label>
              <input type="radio" id="laptop_product" name="product_type" value="comedy">
            </div>
            <div class="form-group">
              <label for="ProductStatus"><b>Movie Status:&ensp;&ensp;&ensp;&ensp;</b></label>
              <label for="active_product">Active</label>
              <input type="radio" id="active_product" name="product_status" value="Active">&ensp;&ensp;
              <label for="inactive_product">Inactive</label>
              <input type="radio" id="inactive_product" name="product_status" value="Inactive">
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
              <label for="ProductDescription"><b>Description</b></label>
              <textarea rows="5" id="description" class="form-control" placeholder="Enter Product Description" value="" name="product_desc" required></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="product_edit_button" value="">Edit Movie</button>
              <button type="reset" class="product_reset_button">Reset</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </section>
  <?php include 'footer.php' ?>
</body>

</html>

<?php mysqli_close($connection); ?>