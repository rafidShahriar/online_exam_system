<?php 
ob_start();
session_start();
include_once 'config.php'; 
if(!isset($_SESSION['logged_in'])){
  header('Location: index.php');
}
?>
<?php 
  if( !empty( $_POST )){
    try {
      $user = new Cl_User();
      $result = $user->getAnswers( $_POST );
    } catch (Exception $e) {
      $_SESSION['error'] = $e->getMessage();
    } 
  }else{
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
          <h1 class="text-center text_underline">Your Exam Results:</h1>
          <br />
          <form class="form-horizontal">
            <div class="form-group mg-b50">
              <p class="col-sm-7 control-label">Right Answers:</p>
              <div class="col-sm-5">
                <span class="well ans"> <?php echo isset($result['right_answer'])? $result['right_answer']:''; ?>
                </span>
              </div>
            </div>
            <div class="form-group mg-b50">
              <p class="col-sm-7 control-label">Wrong Answers:</p>
              <div class="col-sm-5">
                <span class="well ans"> <?php echo isset($result['wrong_answer'])? $result['wrong_answer']:''; ?>
                </span>
              </div>
            </div>
            <div class="form-group mg-b50">
              <p class="col-sm-7 control-label">Unanswered Questions:</p>
              <div class="col-sm-5">
                <span class="well ans"> <?php echo isset($result['unanswered'])? $result['unanswered']:''; ?>
                </span> 
              </div>
            </div>
          </form>
          <!-- <div class="row btn-c well">
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <a href="start-quiz" class="btn btn-success btn-home">Start New Quiz</a>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <a href="quiz-results" class="btn btn-info btn-home">Your Quiz Results</a>
              </div>
            </div> -->
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
<?php ob_end_flush(); ?>
<?php unset($_SESSION['success'] ); unset($_SESSION['error']);  ?>