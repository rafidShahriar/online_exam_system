<?php 
ob_start();
session_start();
include_once 'config.php'; 
if(!isset($_SESSION['logged_in'])){
  header('Location: index.php');
}
?>
<?php    
  try {
    $user = new Cl_User();
    $tests = $user->getTest();
    if(empty($tests)){
      $_SESSION['error'] = NO_TEST;
      header('Location: home.php');
      exit;
    }
  } catch (Exception $e) {
    $_SESSION['error'] = $e->getMessage();
    header('Location: home.php');
    exit;
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
        <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="exam-results.php">Exam Results</a></li>
        <li class='active'><a href="start-test.php">Start New Exam</a></li>
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
          <h1 class="text_underline">Choose Your Test: </h1>
          <form class="form-signin well" method="post" id='signin' name="signin" action="questions.php">
            <div class="form-group">
              <select class="form-control" name="test" id="test">
                <option value="">Choose your test</option>
                <?php  foreach ($tests as $key=>$test){ ?>
                  <option value="<?php echo $key; ?>"><?php echo $test; ?></option>
                <?php } ?>
              </select> 
              <span class="help-block"></span>
            </div>
  
            <div class="form-group">
              <select class="form-control" name="num_questions" id="num_questions">
                <option value="">Choose number of questions to be showed on each page</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select> 
              <span class="help-block"></span>
            </div>
  
            <br>
            <button id="start_btn" class="btn btn-success btn-block" type="submit">Start!!!</button>
          </form>
      </div>
      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3"></div>
    </div>
  </div>
</div>
<div class="clearfix"></div>
<script src="js/start.js"></script>
  <!-- Footer -->
    <footer>
      <div class="container-fluid">
        <p class="text-center">Copyright by <a href="#">Online Exam Center</a> 2016</p>
      </div>
    </footer>
    <!-- /Footer -->
</body>
</html>
<?php ob_end_flush(); ?>
<?php unset($_SESSION['success'] );unset($_SESSION['error']);  ?> 