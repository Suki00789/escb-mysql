<?php  

$servername="localhost";
$username="root";
$password="mysql";
$database="mysql1";

	//connect database
$conn=new mysqli($servername, $username, $password, $database);
//check connection
if ($conn->connect_error) {
	echo $conn->connect_error;
	exit();
}



 $sql="CREATE TABLE users(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	userid VARCHAR(30) NOT NULL,
	firstname VARCHAR(30) NOT NULL,
	lastname VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	password VARCHAR(150),
	reg_date TIMESTAMP
)";
if($conn->query($sql)){
	echo $conn->error;exit();
}

 ?>