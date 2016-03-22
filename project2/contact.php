<?php 
include "conn.php"; 
$sql = "SELECT * FROM `contacts`";
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
            <li><a href="home.php">Home</a></li>
            <li class="active"><a href="author.php">Author</a></li>
            <li><a href="category.php">Category</a></li>
            <li><a href="book.php">Book</a></li>
            <li><a href="contact.php">Contacts</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">  New <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="newcategory.php">Category</a></li>
                <li><a href="newauthor.php">Author</a></li>
                <li><a href="newbook.php">Book</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  <div class="container">
    <h1>Contacts</h1>
    <p class="lead">We have <?php echo ($result->num_rows ? $result->num_rows : 0); ?> Books in our list.</p>
    
    <?php if($result->num_rows > 0): ?>
      
      <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone No</th>
                <th>Time</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
          while ( $row = $result->fetch_assoc() ) {
            // echo $i . ". " . $row['name'] . "(" . $row['id'] . ")<br>";
            echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['phn_no']."</td><td>".$row['time']."</td><td><a href='edit.php?id=".$row['id']."'>Edit</a></td></tr>";
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
