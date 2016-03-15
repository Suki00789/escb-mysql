<?php  
//$j = 0;
 //for ($a=0; $a < 100 ; $a++) { 
 	//echo "$a";
 	//echo "$j <br>";
 	//$j++;
 //$a = [1, 3, 2, 5, 4, 6, 8, 7, 9, 11, 13, 20, 14, 16, 13, 9, 5 ,6 ,19, 20];
 //foreach ($a as $key => $x) {
 	//echo "$key: $x <br>";
 //}
 //}
//slct


$j = 0;
for ($i=1; $i <= 100; $i=$i) { 
	echo "$j <br>";
	$j++;
}
while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
}
if ($result->num_rows > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {
	    echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
	}
} else {
    echo "0 results";
}

?>