<?php 
ob_start();
session_start();
require_once 'config.php'; 
?>
<?php 
  if( !empty( $_POST )){
    try {
      $user_obj = new Cl_User();
      $data = $user_obj->login( $_POST );
      if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
      $_SESSION['success'] = 'You are logged in successfully';
      header('Location: home.php');
      exit;
      }
    } catch (Exception $e) {
      $error = $e->getMessage();
      $_SESSION['error'] = $error;
    }
  }
    //print_r($_SESSION);
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']){
    header('Location: home.php');
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <title>Online Exam Center | Login</title>
    <!-- to be responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bootstrap stylesheet -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

  </head>
  <body>
    <div class="container-fluid">
    <!-- navigation bar -->
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Online Exam Center</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">Login Page</a></li>
        <li><a href="about.php">About</a></li>
        </ul>
      </div>
    </nav>
    <!-- main content -->
      <div class="row-fluid">
        <div class="col-md-8">
          <img src="images/bg.jpg" class="img-responsive img-thumbnail" alt="Image ">
          <p><br></p>
        </div>
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="page-header">
                <h3>Login Area</h3>
              </div>
              <!-- login form -->
              <?php
             // if (isset($error_message)) {
               // echo '<div class="alert alert-danger" role="alert">'.$error_message.'</div><br>';
              //}
              ?>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email Address</label>
                  
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user"></i></span>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email address" name="email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  
                  <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-star"></i></span>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                  </div>
                </div>
  
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Remember me
                  </label>
                </div>
                <hr>
                <button type="button" class="btn btn-success">Back</button>
                <input type="Submit" class="btn btn-primary" name="form_login">
                <p><hr></p>
                  <h4><strong>New User?</strong></h4>
                  <i class="fa fa-check"></i>
                  <a href="signup/index.php">&bull; Register here </a>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- footer part -->
      <div class="row-fluid">
      <div class="col-md-12 well">
        <p class="text-center"><strong>copyright &copy; 2015-2016. All rights reserved by Online Examination Center.</strong></p>
      </div>
    </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- bootstrap javascript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- /container -->
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/login.js"></script>
  </body>
</html>
<?php ob_end_flush(); ?>
<?php unset($_SESSION['success'] ); unset($_SESSION['error']);  ?>   