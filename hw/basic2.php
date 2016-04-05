<?php  
if (isset($_GET['id'])){
	echo "Ur task id:". $_GET['id'];exit();
}
$tasks = [
		["id"=>1, "task"=>"first task"],
		["id"=>2, "task"=>"second task"],
		["id"=>3, "task"=>"third task"],
		["id"=>4, "task"=>"fourth task"],

];

?>

<h1>My tasks lists</h1>



<ul>
	<?php  
		foreach ($tasks as $key=>$value){
			echo "<li>" . "<a href='basic2.php?id=" . $value['id'] . "'>" . $value['task'] . "</a>". "</li>";
		}
	?>
	
</ul>