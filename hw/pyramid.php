<?php
//pyramid by loop

//for($i=1;$i<=13;$i++){

    //for($j=1;$j<=$i;$j++)
    //{
        
        //echo ".";
    //}
//echo "<br>";
//}

//pyramid by variable

//$dot =" ";
//for($i=1;$i<=13;$i++){
	//$dot .= ".";
	//echo $dot,"<br>";
	
//}


$dot = array();
$total=17;
for($i=0; $i<$total; $i++){
	

	if ($i > (($total-1)/2)){
		array_pop($dot);
		echo implode($dot, " "), "<br>";

}else {
		$dot = "$i";
		echo implode($dot, " "), "<br>";

}

	
}

?>