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

$sql = "INSERT INTO users (`userid`, `firstname`, `lastname`, `email`, `password`)
VALUES ('CS3435', 'sharmin', 'siraji','ss@example.com', 'sha1(123)')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>