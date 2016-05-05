<?php
$msg = '';
if(isset($_POST)){
  include "conn.php"; 

  $emp_stu = $_POST['emp_stu'];
  $name = $_POST['name'];
  $userid = $_POST['userid'];
  $join_btch = $_POST['join_btch'];
  $dept = $_POST['dept'];
  $mail = $_POST['email'];
  $pass = $_POST['pass'];


  if(!empty($name)){
    $sql = "INSERT INTO `registration`(`emp_stu`,`name`,`userid`,`join_btch`,`dept`,`email`,`pass`) VALUES ( '".$emp_stu."','".$name."','".$userid."', '".$join_btch."','".$dept."', '".$mail."', '".md5($pass)."')";
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
          <label for="emp_stu">Employee/ Student:</label>
          <select class="form-control" name="emp_stu">
                  <option value="Employee">Employee</option>
                  <option value="Student">Student</option>
          </select>
        </div>
        <div class="form-group">
          <label for="name">Username:</label>
          <input type="text" class="form-control" id="name" name="name" required="true" />
        </div>
        <div class="form-group">
          <label for="userid">User Id:</label>
          <input type="text" class="form-control" id="userid" name="userid" required="true" />
        </div>
        <div class="form-group">
          <label for="join_btch">Joining Date/ Batch:</label>
          <input type="text" class="form-control" id="join_btch" name="join_btch" required="true" />
        </div>
        <div class="form-group">
          <label for="dept">Department:</label>
          <select class="form-control" name="dept">
                    <option value="Attendant">Attendent</option>
                    <option value="ARC">Department of Architecture</option>
                    <option value="BBA">Department of Business Administration</option>
                    <option value="CEN">Department of Civil Engineering</option>
                    <option value="Computer Science">Department of Computer Science &amp; Engineering</option>
                    <option value="ECO">Department of Economics</option>
                    <option value="EEE">Department of Electrical &amp; Electronic Engineering</option>
                    <option value="English">Department of English</option>
                    <option value="ENV">Department of Environmental Science</option>
                    <option value="FLM">Department of Film and Media Studies</option>
                    <option value="JLC">Japanese Language Center</option>
                    <option value="JRN">Department of Journalism &amp; Media Studies</option>
                    <option value="LAW">Department of Law</option>
                    <option value="MBO">Department of Microbiology</option>
                    <option value="Natural Science">Department of Natural Science</option>
                    <option value="Pharmacy">Department of Pharmacy</option>
          </select>
        </div>
        <div class="form-group">
          <label for="email">E-mail:</label>
          <input type="text" class="form-control" id="email" name="email" required="true" />
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