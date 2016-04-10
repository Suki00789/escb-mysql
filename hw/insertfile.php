<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "mysql1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `uesrs` (`userid`, `firstname`, `lastname`, `email`, `password`)
VALUES (`CS3435`, `sharmin`, , `siraji`,`ss@example.com`, `123`)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>