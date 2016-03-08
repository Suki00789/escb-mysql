<?php  
require "conn.php";
$sql = "SELECT * FROM `author`";
// echo $sql;die;
$result = $conn->query($sql);
print_r($result);
?>