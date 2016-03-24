<?php
$servername = "localhost";
$username = "root";
$password = "mysql";
$db = 'Home Work';
// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>