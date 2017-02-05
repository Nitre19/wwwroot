<?php
$alumnes=array('Anna',array('php','c','javaScript'),
				'Joan',array('php','c'));
echo "<table border='1'><caption>Llenguatges Alumnes</caption>";
echo "<tr><th>Nom</th><th>Llenguatges</th>";
echo "<tr>";

foreach($alumnes as $key=>$value)
 {
$v =count($alumnes[$key]); 
	if ($key%2==0) {
		echo "<td>".$value."</td>";
	}
	else
	{
		echo "<td>";
		 	foreach($alumnes as $key2=>$value2) {
		 		$llenguatge = $alumnes[$key][$key2];
				echo "$llenguatge";
				if ($key2+1!=$v) {
					echo ", ";
				}
			}
		echo "</td>";	
		echo "</tr>";
	}
}
echo "</table>";
?>