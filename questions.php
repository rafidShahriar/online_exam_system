<?php 
ob_start();
session_start();
include_once 'config.php'; 
if(!isset($_SESSION['logged_in'])){
  header('Location: index.php');
}
?>

<?php 
  if(!empty( $_POST )){
    try {
      $user = new Cl_User();
      $results = $user->getQuestions($_POST  );
    } catch (Exception $e) {
      $_SESSION['error'] = $e->getMessage();
    }  
  }else{
    $_SESSION['error'] = CHOOSE_TEST;
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
        <li class='active'><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
        <li><a href="exam-results.php">Exam Results</a></li>
        <li><a href="start-test.php">Start New Exam</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../forum/index.php">Forum</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">My Account</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<div class="content">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></div>
      <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 start-page">
          <h1 class="text-center text_underline"> Timer : <span id='timer'></span></h1>
            <form class="form-horizontal" role="form" id='quiz_form' method="post" action="test-result.php">
            <?php
            $remainder = $results['remainder'];
            $number_question =  $results['number_question'];
            $rowcount =  $results['rowcount'];
            $i = 0;
            $j = 1;
			$k = 1;
            ?>
            <?php foreach ($results['questions'] as $result) {
               if ( $i == 0) echo "<div class='cont' id='question_splitter_$j'>";?>
              <div id='question<?php echo $k;?>' >
              <p class='questions' id="qname<?php echo $j;?>"> <?php echo $k?>.<?php echo $result['question'];?></p>
              <input type="radio" value="1" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer1'];?>
              <br/>
              <input type="radio" value="2" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer2'];?>
              <br/>
              
              <?php if(isset( $result['answer3'] ) && !empty( $result['answer3'] )){ ?>
              <input type="radio" value="3" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer3'];?>
              <br/>
              <?php } ?>
              
              <?php if(isset( $result['answer4'] ) && !empty( $result['answer4'] )){ ?>
              <input type="radio" value="4" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/><?php echo $result['answer4'];?>
              <br/>
              <?php } ?>
            <input type="radio" checked='checked' style='display:none' value="smart_quiz" id='radio1_<?php echo $result['id'];?>' name='<?php echo $result['id'];?>'/>                                                                      
              <br/>
              </div>
              <?php
                 $i++; 
                 if ( ( $remainder < 1 ) || ( $i == $number_question && $remainder == 1 ) ) {
                  echo "<button id='".$j."' class='next btn btn-success' type='submit'>Finish</button>";
                  echo "</div>";
                 }  elseif ( $rowcount > $number_question  ) {
                  if ( $j == 1 && $i == $number_question ) {
                    echo "<button id='".$j."' class='next btn btn-success' type='button'>Next</button>";
                    echo "</div>";
                    $i = 0;
                    $j++;           
                  } elseif ( $k == $rowcount ) { 
                    echo " <button id='".$j."' class='previous btn btn-success' type='button'>Previous</button>
                          <button id='".$j."' class='next btn btn-success' type='submit'>Finish</button>";
                    echo "</div>";
                    $i = 0;
                    $j++;
                  } elseif ( $j > 1 && $i == $number_question ) {
                    echo "<button id='".$j."' class='previous btn btn-success' type='button'>Previous</button>
                                    <button id='".$j."' class='next btn btn-success' type='button' >Next</button>";
                    echo "</div>";
                    $i = 0;
                    $j++;
                  }
                  
                 }
                  $k++;
                 } ?>
            </form>
      </div>
      <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2"></div>
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
    <script>
    $('.cont').addClass('hide');
    $('#question_splitter_1').removeClass('hide');
    $(document).on('click','.next',function(){
        last=parseInt($(this).attr('id'));  console.log( last );   
        nex=last+1;
        $('#question_splitter_'+last).addClass('hide');
        
        $('#question_splitter_'+nex).removeClass('hide');
    });
    
    $(document).on('click','.previous',function(){
        last=parseInt($(this).attr('id'));     
        pre=last-1;
        $('#question_splitter_'+last).addClass('hide');
        
        $('#question_splitter_'+pre).removeClass('hide');
    });


    
        var c = 60;
        var t;
        timedCount();

        function timedCount() {

          var hours = parseInt( c / 3600 ) % 24;
          var minutes = parseInt( c / 60 ) % 60;
          var seconds = c % 60;

          var result = (hours < 10 ? "0" + hours : hours) + ":" + (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds  < 10 ? "0" + seconds : seconds);

            
          $('#timer').html(result);
            if(c == 0 ){
              setConfirmUnload(false);
                $("#quiz_form").submit();
            }
            c = c - 1;
            t = setTimeout(function(){ timedCount() }, 1000);
        }
  </script>

<?php ob_end_flush(); ?>
<?php unset($_SESSION['success'] ); unset($_SESSION['error']);  ?>    

<script type="text/javascript">

    // Prevent accidental navigation away
    setConfirmUnload(true);
    function setConfirmUnload(on)
    {
        window.onbeforeunload = on ? unloadMessage : null;
    }
    function unloadMessage()
    {
        return 'Your Answered Questions are resetted zero, Please select stay on page to continue your Exam';
    }

    $(document).on('click', 'button:submit',function(){
      setConfirmUnload(false);
    });


</script>
</body>
</html>