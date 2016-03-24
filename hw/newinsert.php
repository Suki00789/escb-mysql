<?php
$msg = '';
if(isset($_POST)){
  include "conn.php"; 

  $name = $_POST['name'];
  $about = $_POST['abt_me'];

  if(!empty($name)){
    $sql = "INSERT INTO `info`(`name`,`abt_me`) VALUES ('".$name."', '".addslashes($about)."')";

    if($conn->query($sql)===TRUE){
      $msg= "new information successfully received";
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
    <title>HW Project</title>
    
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
          <a class="navbar-brand" href="index.html">Home Work</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav pull-right">
            <li><a href="insert.php">Insert</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">  New <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="newinsert.php">Insert</a></li>
                <li><a href="newupdate.php">Update</a></li>              
                </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  <div class="container">
    <h1>New Insert</h1>


    <?php if (!empty($msg)) { ?>

      <div class="alert alert-info">
        <?php echo "$msg"; ?>
      </div>
    <?php  }; ?>


    <?php if(isset($name)): ?>
      <p>Your information is: </p>
      <ul>
        <li>Name : <strong><?php echo $name; ?></strong></li>
        <li>About me : <strong><?php echo $about; ?></strong></li>
      </ul>
    <?php endif; ?> 
    <form role="form" method="post" style="width: 500px;">
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" name="name" required="" />
        </div>
        <div class="form-group">
          <label for="abt_me">About Me:</label>
          <textarea id="abt_me" class="form-control" rows="3" name="abt_me"></textarea>
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