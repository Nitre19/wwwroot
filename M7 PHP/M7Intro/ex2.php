<?php
$alumnes=array('Anna',array('php','c','javaScript'),
				'Joan',array('php','c'));
echo "<table border='1'><caption>Llenguatges Alumnes</caption>";
echo "<tr><th>Nom</th><th>Llenguatges</th>";
echo "<tr>";
for ($i=0; $i <count($alumnes) ; $i++) {
	$v =count($alumnes[$i]); 
	if ($i%2==0) {
		echo "<td>".$alumnes[$i]."</td>";
	}
	else
	{
		echo "<td>";
		 	for ($j=0; $j <$v ; $j++) {
		 		$llenguatge = $alumnes[$i][$j];
				echo "$llenguatge";
				if ($j+1!=$v) {
					echo ", ";
				}
			}
		echo "</td>";	
		echo "</tr>";
	}
}
echo "<tr>";
echo "</table>";
?>