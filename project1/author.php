<?php 
include_once "conn.php"; 
$sql = "SELECT * FROM `author`";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Library Project</title>
    
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
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Biography</th>
      </tr>
    </thead>
    <tbody>
      
<?php while ( $row = $result->fetch_assoc() ) { ?>

      <tr>
        <td><?php echo $row["id"] ?></td>
        <td><?php echo $row["name"] ?></td>
        <td><?php echo $row["biography"] ?></td>
      </tr>


<?php } ?>
    </tbody>
  </table>


  </div><!-- /.container -->
  </body>
</html>