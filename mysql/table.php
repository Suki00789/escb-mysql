<?php require "conn.php";
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
    <title>Table SQL OUTPUT</title>
    
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>

  </head>
  <body>

	<div class="container">
		<table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>name</th>
          </tr>
        </thead>
        <tbody>
			<?php 
				// our code goes here;
				while ( $row = $result->fetch_assoc() ) {
					//echo $i . ". " . $row['name'] . "(" . $row['id'] . ")";
					// echo "<tr><td>1</td><td>Doe</td></tr>";
					// echo "<tr><td>____</td><td>Doe</td></tr>";
					// echo "<tr><td>" .  . "</td><td>Doe</td></tr>";
					echo "<tr><td>". $row['id'] ."</td><td>". $row['name'] ."</td></tr>";
					$i++;
				}
			?>
			<!--<tr><td>1</td><td>Doe</td></tr>-->
        </tbody>
      </table>
	</div><!-- /.container -->
  </body>
</html>