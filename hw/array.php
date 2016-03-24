<?php  
function dd($a){
	echo "<pre>";
	print_r($a);
	echo "</pre>";
}

$a =[ ["id" => 1,
	   "name" => "Suki",
	   "class" => 9,
	   "group" => "Science",
	   "subject" => ["phy","che","bio"]
	   ],

 	  ["id" => 2,
 	  "name" => "Rose",
 	  "class" => 10,
 	  "group" => "Science",
 	  "subject" => ["phy","math","bio"]
 	  ]
 	 ];
//$c = [$a,$b];
//dd($a);
//echo $a[0]["subject"];
 	//echo count($a);
 	for ($i=0; $i < count($a); $i++)
 	{
 		echo $a[$i]["name"];
 	}
?>