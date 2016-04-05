<?php  
//if (isset($_GET['id'])){
	//echo "Ur task id:". $_GET['id'];exit();
//}
$colors = ["Black", "Orange", "Pink", "Blue", "Red", "Green", "Grey", "Yellow", "Purple", "Brown"];

?>

<h1>My colors lists</h1>



<ol>
	<?php  
		foreach ($colors as $key=>$value){
			echo "<li style='color: ".$value."'>" . $value .  "</li>";
		}
	?>
	
</ol>