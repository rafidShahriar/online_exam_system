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
        <li><a href="home.php">Home <span class="sr-only">(current)</span></a></li>
        <li class='active'><a href="exam-results.php">Exam Results</a></li>
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
            <li><a href="#">My Account</a></li>
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
           <div class="row btn-c well2">
              <?php
//extract($_SESSION);
              $user_id = $_SESSION['id'];
$rs=mysql_query("select r.id,t.test_name,r.right_answer,r.wrong_answer,r.unanswered from tests t, results r where
t.id=r.test_id and r.user_id='$user_id'",$cn) or die(mysql_error());
// and r.username='$username'
echo "<h2><b><em><u>All of Your Exam Results:</u></em></b></h2>";
if(mysql_num_rows($rs)<1)
{
    echo "<br><br><h1> Sorry, You did not give any test.</h1>";
    exit;
}
echo "<table border=1 align=center><tr><td width=100>Exam No:</td><td width=200>Test Name:</td> <td width=75> Right<br> Answer <td width=75> Wrong<br> Answer<td width=75> Unanswered<br> Question";
$i=0;
while($row=mysql_fetch_row($rs))
{
  $i++;
echo "<tr><td align=center>$i <td align=center> $row[1] <td align=center> $row[2] <td align=center> $row[3]<td align=center> $row[4]";
}
echo "</table>";
echo "<br>";
?>
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