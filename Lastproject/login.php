<?php 

// Start the session
session_start();

// print_r($_SESSION);
// if($_SESSION['logedin']){
//     echo "hello " . $_SESSION['name'];
//   }

if(isset($_POST['name'])){
include "conn.php"; 

$name = $_POST['name'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM `registration` WHERE name = '".$name."' AND pass = '".md5($pass)."'";
//echo $sql;die();
$result = $conn->query($sql);

if($result->num_rows){
    //echo $result->num_rows;

  $row = $result->fetch_row();
  $_SESSION['logedin'] = true;
  $_SESSION['user'] = array(
      'id'=>$row['0'],
      'name'=>$row[2]
      );

   // echo $result->num_rows;
  }

  if($_SESSION['logedin']){
    echo "hello " . $_SESSION['user']['name'];
  }
  //else{
    //echo "nO rECORD FOUND";
    
  //}
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

  

    
    <form role="form" method="post" style="width: 500px;">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" name="name" required="true" />
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="text" class="form-control" id="pass" name="pass" required="true" />
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