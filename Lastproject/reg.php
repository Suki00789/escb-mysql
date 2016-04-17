<?php
$msg = '';
if(isset($_POST)){
  include "conn.php"; 

  $name = $_POST['name'];
  $mail = $_POST['email'];
  $pass = $_POST['pass'];


  if(!empty($name)){
    $sql = "INSERT INTO `registration`(`name`,`email`,`pass`) VALUES ('".$name."', '".$mail."', '".md5($pass)."')";

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
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Home</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav pull-right">
            <li><a href="login.php">Login</a></li>
            <li><a href="reg.php">Registration</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  <div class="container">
    <h1>Login Form</h1>

    <?php if (!empty($msg)) { ?>

      <div class="alert alert-info">
        <?php echo "$msg"; ?>
      </div>
    <?php  }; ?>


    <form role="form" method="post" style="width: 500px;">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" name="name" required="true" />
        </div>
        <div class="form-group">
          <label for="password">E-mail:</label>
          <input type="text" class="form-control" id="pass" name="email" required="true" />
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="text" class="form-control" id="pwd" name="pass" required="true" />
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