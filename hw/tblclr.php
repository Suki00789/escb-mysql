<?php  

$colors = [
		["id"=>1, "clr"=>"Red", "code"=>"#FF0000"],
		["id"=>2, "clr"=>"Blue", "code"=>"#00FFFF"],
		["id"=>3, "clr"=>"Green", "code"=>"#00FF00"],
		["id"=>4, "clr"=>"Orange", "code"=>"#FFA500"],
		["id"=>5, "clr"=>"Grey", "code"=>"#808080"],
		["id"=>6, "clr"=>"Purple", "code"=>"#800080"],
		["id"=>7, "clr"=>"Yellow", "code"=>"#FFFF00"],
		["id"=>8, "clr"=>"Black", "code"=>"#000000"],
		["id"=>9, "clr"=>"White", "code"=>"#FFFFFF"],
		["id"=>10, "clr"=>"Brown", "code"=>"#FFA500"],

];

?>

<h1>My colors table</h1>



<table border="1px" width="60%">
	<th>Id</th>
	<th>Name of color</th>
	<th>Code</th>
	<?php  
		foreach ($colors as $key=>$value){
			echo "<tr>" . 
			        "<td>". $value['id'] . "</td>". 
			        "<td>". $value['clr']. "</td>" . 
			        "<td>". $value['code']. "</td>". 
			      "</tr>";
		}
	?>
	
</table>