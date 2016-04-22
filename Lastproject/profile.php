<?php
$msg = '';
if(isset($_POST)){
  include "conn.php"; 

  $userid = $_POST['userid'];
  $name = $_POST['name'];
  $dob = $_POST['dob'];
  $profession = $_POST['pro'];
  $gender = $_POST['gndr'];
  $introduction = $_POST['intro'];
  $fb = $_POST['fb'];
  $twt = $_POST['twiit'];


  if(!empty($name)){
    $sql = "INSERT INTO `profile`(`userid`, `name`,`dob`,`pro`,`gndr`,`intro`,`fb`,`twiit`) VALUES ('".$userid."','".$name."', '".$dob."', '".$profession."', '".$gender."', '".$introduction."', '".$fb."', '".$twt."')";
//echo $sql;die();
    if($conn->query($sql)===TRUE){
      $msg= "successfully received";
    }else{
      $msg= "Error: " . $conn->error;
    }
  }
} 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Last Project</title>
    
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
    
  <div class="container">
    

    <?php $basefile = basename(__FILE__,'.php'); ?>
    <?php include_once 'header.php'; ?>

    <h1>Profile</h1>

    <?php if (!empty($msg)) { ?>

      <div class="alert alert-info">
        <?php echo "$msg"; ?>
      </div>
    <?php  }; ?>


    <form role="form" method="post" style="width: 500px;">
        <div class="form-group">
          <label for="userid">User Id:</label>
          <input type="text" class="form-control" id="name" name="userid" required="true" />
        </div>
        <div class="form-group">
          <label for="name">Full name:</label>
          <input type="text" class="form-control" id="name" name="name" required="true" />
        </div>
        <div class="form-group">
          <label for="dob">Date of birth:</label>
          <input type="text" class="form-control" id="date of birth" name="dob" required="true" />
        </div>
        <div class="form-group">
          <label for="pro">Profession:</label>
          <input type="text" class="form-control" id="pro" name="pro" required="true" />
        </div>
        <div class="form-group">
          <label for="gndr">Gender:</label>
          <input type="text" class="form-control" id="gndr" name="gndr" required="true" />
        </div>
        <div class="form-group">
          <label for="intro">Introduction:</label>
          <textarea class="form-control" id="intro" name="intro" required="true"></textarea>
        </div>
        <div class="form-group">
          <label for="fb">Facebook:</label>
          <input type="text" class="form-control" id="fb" name="fb" required="true" />
        </div>
        <div class="form-group">
          <label for="twitt">Twitter:</label>
          <input type="text" class="form-control" id="twitt" name="twiit" required="true" />
        </div>
        <div class="checkbox">
          <label><input type="checkbox">Remember Me</label>
          
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
      </form>

  </div><!-- /.container -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>