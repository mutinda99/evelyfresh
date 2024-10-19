<?php include('create_new_user.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Register New User</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register New User</div>
      <div class="card-body">
        <form method="post" action="register.php">
          <?php include('errors.php'); ?>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputName">Username</label>
                <input class="form-control" id="exampleInputName" type="text" name="username" value="<?php echo $username; ?>">
              </div>

            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="phone">Phone Number</label>
                <input class="form-control" id="phone" type="tel" name="phone" value="<?php echo $phone; ?>">
              </div>

            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="email">Email</label>
                <input class="form-control" id="email" type="email" name="email" value="<?php echo $email; ?>">
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="text">Location</label>
                <input class="form-control" id="text" type="text" name="location" value="<?php echo $location; ?>">
              </div>

            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1" type="password" name="password_1">
              </div>
              <div class="col-md-6">
                <label for="exampleInputPassword1">Confirm Password</label>
                <input class="form-control" id="exampleInputPassword2" type="password" name="password_2">
              </div>
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-block" name="reg_user">Register</button>
        </form>

      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>