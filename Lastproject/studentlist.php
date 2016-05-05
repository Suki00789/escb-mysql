<?php 
include_once "conn.php"; 
$sql = "SELECT * FROM `profile`";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Seat Plan</title>
    
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
    <h1>Student's List</h1>
    <p class="lead">We have <?php echo ($result->num_rows ? $result->num_rows : 0); ?> Students in our list.</p>
    
    <?php if($result->num_rows > 0): ?>
      
      <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>User Id</th>
                <th>Name</th>
                <th>Registration Complete ?</th>
                <th>Paid Registraton Fee ?</th>
                <th>Receipt No</th>
                <th>Registration Subject</th>
              </tr>
            </thead>
            <tbody>
              <?php 
          while ( $row = $result->fetch_assoc() ) {
            // echo $i . ". " . $row['name'] . "(" . $row['id'] . ")<br>";
            echo "<tr><td>".$row['id']."</td>
                      <td>".$row['userid']."</td>
                      <td>".$row['name']."</td>
                      <td>".$row['reg_cmplt']."</td>
                      <td>".$row['paid_reg']."</td>
                      <td>".$row['rcpt']."</td>
                      <td>".$row['reg_sub']."</td>
                  </tr>";
          }
               ?>
              
            </tbody>
          </table>

    <?php endif; ?>


  </div><!-- /.container -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
