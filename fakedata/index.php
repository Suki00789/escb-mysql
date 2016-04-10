<?php  
include "conn.php";
include_once '../vendor/faker/autoload.php';

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();

    $sql= "";
for ($i=0; $i<10; $i++){

	$sql .= "INSERT INTO users (`firstname`, `lastname`, `email`) VALUES (\"$faker->firstname\",\"$faker->lastname\", \"$faker->email\");";

//lastid insert
	//if ($conn->query($sql) === TRUE) {
	    //$last_id = $conn->insert_id;
	    //echo "New record created successfully. Last inserted ID is: " . $last_id. "<br>" ;
	//} else {
	   // echo "Error: " . $sql . "<br>" . $conn->error;
	//}
}

	if ($conn->multi_query($sql) === TRUE) {
    	echo "New records created successfully";
} 	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
}
// generate data by accessing properties
//echo $faker->name;  
		
		


?>