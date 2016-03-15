    <?php  
if (isset($_POST)){

	$name = $_POST['name'];
	$description = $_POST['description'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Library</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.html">Home</a></li>
            <li><a href="table.html">Author</a></li>
            <li><a href="form.html">Category</a></li>
            <li><a href="form.html">New</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
    
  <h2>New Category</h2>
  <?php if (isset($name)): 
  	<p>Your category</p>
  	<ul>
  		<li>Name:Novel</li>
  		<li>Description:it's a novel</li>
  	</ul>
  	?>
  <form role="form" method="get">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" name="name" required="true">
    </div>
    <div class="form-group">
      <label for="txtarea">Description:</label>
      <textarea class="form-control" rows="3" name="description"></textarea>
    </div>
    
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
