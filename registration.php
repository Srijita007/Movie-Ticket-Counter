<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide|Sofia|Trirong|Roboto|Courgette|Merriweather|Lato">

  <link rel="stylesheet" href="./main.css">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

  <section id="header" class="container-fluid">
    <div class="row">
      <div class="col-10 align-self-start">
        <?php include 'header.php' ?>
      </div>
      <div class="col align-self-center register_buttons">
        <button class="register_button" onclick="window.location='login.php'">Login</button>
        <button class="register_button" onclick="window.location='index.php'">Home</button>
      </div>
    </div>
  </section>

  <div class="container-fluid register-container ">
    <br><br>
    <div class="row align-self-center register-form-1">
      <form action="handle_registration.php" method="post">
        <h3>Registration</h3>
        <div class="row justify-content-evenly">
          <hr>
          <div class="col-5">
            <div class="form-group">
              <label for="Name"><b>Full Name</b></label>
              <input type="text" class="form-control" placeholder="Your Name *" value="" name="name" required />
            </div>
            <div class="form-group">
              <label for="Address"><b>Address</b></label>
              <input type="text" class="form-control" placeholder="Your Address *" value="" name="address" required />
            </div>
            <div class="form-group">
              <label for="Pincode"><b>Pincode</b></label>
              <input type="tel" pattern="{0-9}[6]" class="form-control" placeholder="Your Pincode *" value="" name="pincode" required />
            </div>
            <div class="form-group">
              <label for="Contact"><b>Contact No</b></label>
              <input type="tel" pattern="[0-9]{10}" class="form-control" placeholder="Your Mobile No. *" value="" name="contact" required />
            </div>
          </div>

          <div class="col-5">
            <div class="form-group">
              <label for="email"><b>Email</b></label>
              <input type="email" class="form-control" placeholder="Your Email *" value="" name="email" required />
            </div>
            <div class="form-group">
              <label for="password"><b>Password</b></label>
              <input type="password" class="form-control" placeholder="Your Password *" value="" name="password" required />
            </div>
            <div class="form-group">
              <label for="confirm-password"><b>Confirm Password</b></label>
              <input type="password" class="form-control" placeholder="Your Password again *" value="" name="confirm_password" required />
            </div>
            <hr>
            <div class="form-group">
              <input type="submit" class="btnSubmit" value="Register" />
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php include 'footer.php' ?>
</body>

</html>