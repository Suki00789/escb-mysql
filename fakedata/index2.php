<?php

$servername = "localhost";
$username = "root";
$password = "mysql";
$dbname = "mysql1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname, email FROM users";
$result = $conn->query($sql);
?> 
<!DOCTYPE html>
<html>
<head>
	<title>table</title>
</head>
<body>
	<h2>Table</h2>
		<table border="1px" width="60%" align="center">
			<thead>
				<tr>
					<th>Id</th>
					<th>firstname</th>
					<th>lastname</th>
					<th>email</th>
				</tr>
			</thead>
			<tbody>
				<?php if (!$result->num_rows){ ?>
					<tr>
						<td colspan="4" align="center">record not found</td>
					</tr>
					<?php } else { ?>
						<?php while ($row = $result->fetch_assoc()) { ?>
					<tr>
						<td><?php echo $row["id"]; ?></td>
					
						<td><?php echo $row["firstname"]; ?></td>
					
						<td><?php echo $row["lastname"]; ?></td>
					
						<td><?php echo $row["email"]; ?></td>
					</tr>
						<?php } ?>
					<?php } ?>

			</tbody>
		</table>


</body>
</html>