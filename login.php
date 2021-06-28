<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>

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
        <button class="register_button" onclick="window.location='index.php'">Home</button>
        <button class="register_button" onclick="window.location='registration.php'">Sign-Up</button>
      </div>
    </div>
  </section>

  <div class="container-fluid login-container">
    <div class="row align-items-center">
      <div class="col-md-4 align-self-center login-form-1">
        <h3>Login</h3>
        <form action="handle_login.php" method="post">
          <hr>
          <div class="form-group">
            <label for="email"><b>Email</b></label>
            <input type="email" class="form-control" placeholder="Your Email *" value="" name="email" />
          </div>
          <div class="form-group">
            <label for="psw"><b>Password</b></label>
            <input type="password" class="form-control" placeholder="Your Password *" value="" name="password" />
          </div>
          <hr>
          <div class="form-group">
            <input type="submit" class="btnSubmit" value="Login" />
          </div>
          <!-- <div class="form-group">
            <a href="#" class="ForgetPwd">Forget Password?</a>
          </div> -->
        </form>
      </div>
    </div>
  </div>
  <?php include 'footer.php' ?>
</body>

</html>