<?php 
ob_start();
session_start();
require_once 'config.php'; 
if(!isset($_SESSION['logged_in'])){
  header('Location: index.php');
}
?>
<?php
$cn=mysql_connect("localhost","root","") or die("Could not Connect to MySql");
mysql_select_db("finalproject",$cn)  or die("Could not connect to Database");
?>


<?php
$user_id = $_SESSION['id'];
    $result = mysql_query("SELECT * FROM users WHERE id='$user_id'",$cn) or die(mysql_error());
    if (mysql_num_rows($result) < 1) {
      header('location:home.php');
    }
    while ($row=mysql_fetch_assoc($result)) {
       $id = $row['id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $user = $row['name'];
        $email = $row['email'];
      $pass = $row['password'];
      $created = $row['created'];
      $date = $row['last_log_in_time'];
    }

  if(isset($_POST['first_name']) || isset($_POST['last_name']) || isset($_POST['user']) || isset($_POST['pass']) || isset($_POST['email'])){
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $user = $_POST['user'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  //include "signup/ste_content/connect.php";

  mysql_query("UPDATE `users` SET `first_name`='$first_name', `last_name`='$last_name',
    `name`='$user',`email`='$email',`password`='$pass',`last_log_in_time`=NOW() WHERE `id`='".$id."'",$cn) or die(mysql_error());

  //header("location: home.php");
  //exit();
  }
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Online Exam Center</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a class="navbar-brand" href="#">Online Exam Center</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class='active'><a href="home.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="exam-results.php">Exam Results</a></li>
        <li><a href="start-test.php">Start New Exam</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="forum/index.php">Forum</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            Welcome 
              
            <?php if($_SESSION['logged_in']) { ?>
              <?php echo $_SESSION['name']; ?>
           <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="profile.php">My Account</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
          <?php } ?>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"></div>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 start-page">
          <div class="row btn-c well">
              <?php
    $user_id = $_SESSION['id'];
    $result = mysql_query("SELECT * FROM users WHERE id='$user_id'",$cn) or die(mysql_error());
    if (mysql_num_rows($result) < 1) {
      header('location:home.php');
    }
    while ($row=mysql_fetch_assoc($result)) {
       $id = $row['id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $user = $row['name'];
        $email = $row['email'];
      $pass = $row['password'];
      $created = $row['created'];
      $date = $row['last_log_in_time'];
    }
  ?>
  <form action="profile.php" class="profile" method="post">
          <table width="74%" border="0" cellpadding="2">
            <tr>
              <td width="39%" scope="row"><b>ID:</b></td>
              <td width="61%"><label type="text" name="id" id="id"> <?php echo $id; ?> </label></td>
              </tr>
            <tr>
              <td scope="row"><b>First Name:</b></td>
              <td> <input type="text" name="first_name" value="<?php echo $first_name; ?>" id="first_name" size="20" maxlength="20"></td>
              </tr>
            <tr>
              <td scope="row"><b>Last Name:</b></td>
              <td><input type="text" name="last_name" value="<?php echo $last_name; ?>" id="last_name" size="20" maxlength="20"></td>
              </tr>
            <tr>
              <td scope="row"><b>Log in Name: </b></td>
              <td><input type="text" name="user" value="<?php echo $user; ?>" id="user" size="20" maxlength="20"></td>
              </tr>
            <tr>
              <td scope="row"><b>Password:</b></td>
              <td><input type="text" name="pass" value="<?php echo $pass; ?>" id="pass" size="20" maxlength="20"></td>
              </tr>
            <tr>
              <td scope="row"><b>E-mail:</b></td>
              <td><input type="email" name="email" value="<?php echo $email; ?>" id="email" size="20" maxlength="40"></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            <tr>
              <td scope="row"><b>Account Created: </b></td>
              <td><label type="date" name="date" id="date"><?php echo $created; ?> </label></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
              <td scope="row"><b>Last Visit: </b></td>
              <td><label type="date" name="date" id="date"><?php echo $date; ?> </label></td>
            </tr>
              <tr>
              <td scope="row">&nbsp;</td>
              <td><input type="submit" value="UPDATE"></td>
              </tr>
            </table>
            </form>
          </div>
      </div>
      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"></div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
  <!-- Footer -->
    <footer>
      <div class="container-fluid">
        <p class="text-center">Copyright by <a href="#">Online Exam Center</a> 2016</p>
      </div>
    </footer>
    <!-- /Footer -->
</body>
</html>