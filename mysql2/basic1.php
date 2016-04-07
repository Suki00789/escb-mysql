<?php  

$servername="localhost";
$username="root";
$password="mysql";

	//connect database
$conn=new mysqli($servername, $username, $password);
//check connection
if ($conn->connect_error) {
 	echo $conn->connect_error;
 	exit();
 	}

 	//create database
$sql="create database mysql1";
if($conn->query($sql)){
	echo "database create succesfull";
}else{
	echo $conn->error;
}
//connection close
$conn->close();

?>