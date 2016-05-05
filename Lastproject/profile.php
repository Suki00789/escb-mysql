<?php
$msg = '';
if(isset($_POST)){
  include "conn.php"; 

  $userid = $_POST['userid'];
  $name = $_POST['name'];
  $reg_cmplt = $_POST['reg_cmplt'];
  $paid_reg = $_POST['paid_reg'];
  $rcpt = $_POST['rcpt'];
  $reg_sub = $_POST['reg_sub'];


  if(!empty($name)){
    $sql = "INSERT INTO `profile`(`userid`, `name`,`reg_cmplt`,`paid_reg`,`rcpt`,`reg_sub`) VALUES ('".$userid."','".$name."', '".$reg_cmplt."', '".$paid_reg."', '".$rcpt."', '".$reg_sub."')";
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
    

    <?php $basefile = basename(__FILE__,'.php'); ?>
    <?php include_once 'header.php'; ?>

    <div class="container">

    <h1>Student's Must Fill It Before Exam</h1>

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
          <label for="reg_cmplt">Registration Complete ?</label><br>
          <input type="text" class="form-control" id="name" name="reg_cmplt" required="true" />
        </div>
        <div class="form-group">
          <label for="paid_reg">Paid Registration Fee ?</label><br>
          <input type="text" class="form-control" id="name" name="paid_reg" required="true" />
        </div>
        <div class="form-group">
          <label for="rcpt">Receipt No. :</label><br>
          <input type="text" class="form-control" id="name" name="rcpt" />
        </div>
        <div class="form-group">
          <label for="reg_sub">Registered Subject:</label><br>
          Subject -------------------------- Batch<br>
          <input type="checkbox" name="opinion1" value="PL1"> PL 1 ---------------------- <input type="radio" name="opinion1" value="btch" checked> 52 <input type="radio" name="opinion1" value="btch" checked> 56<br>
          <input type="checkbox" name="opinion2" value="Java"> Java --------------------- <input type="radio" name="opinion2" value="btch" checked> 53 <input type="radio" name="opinion2" value="yes" checked> 54
        </div>
        <button type="submit" class="btn btn-default">Submit</button><br><br>
        Fill It ? <a href ="#">Seat Plan Here</a><br><br>
      </form>

  </div><!-- /.container -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>