<?php  
include "conn.php"; 
$msg = '';
if(isset($_POST)){
  $id = $_POST['id'];
  $name = $_POST['name'];
  $about = $_POST['abt_me'];

  if(!empty($id)){
    $sql = "UPDATE `info` SET 
      `name` = '".$name."',
      `abt_me`= '".addslashes($about)."'
      WHERE `id`= $id";
     

    if($conn->query($sql)===TRUE){
      $msg= "Updated successfully";
    }else{
      $msg= "Error: " . $conn->error;
    }
  }
}

$id = $_GET['id'];
$sql = "SELECT * FROM `info` WHERE `id` =".$id;
$info = $conn->query($sql);

$result = $info->fetch_row();


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
          <a class="navbar-brand" href="index.html">Library</a>
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
    <h1>New Contact</h1>


    <?php if (!empty($msg)) { ?>

      <div class="alert alert-info">
        <?php echo "$msg"; ?>
      </div>
    <?php  }; ?>


    <?php if(isset($name)): ?>
      <p>Your updated info is: </p>
      <ul>
      <li>ID : <strong><?php echo $id; ?></strong></li>
        <li>Name : <strong><?php echo $name; ?></strong></li>
        <li>About Me : <strong><?php echo $about; ?></strong></li>
      </ul>
    <?php endif; ?>

    <?php if(isset($result[0])): ?>
     
    <form role="form" method="post" style="width: 500px;">
        <div class="form-group">
          <label for="name">ID:</label>
          <input type="" class="form-control" id="name" name="id" readonly="true" value="<?php echo $result[0]; ?>" required="" />
          </div>
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" name="name" value="<?php echo $result[1]; ?>" required="" />
        </div>
        <div class="form-group">
          <label for="abt_me">About Me:</label>
          <input type="text" class="form-control" id="name" name="abt_me" value="<?php echo $result[2]; ?>" required="" />        
          </div>

        <button type="submit" class="btn btn-default">Submit</button>
      </form>

    <?php endif; ?>

  </div><!-- /.container -->
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>