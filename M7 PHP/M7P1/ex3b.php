<html>
<head>
	<title></title>
</head>
<body>
	<?php
	$products = array(A,B,C);
	$prices = array(1000,1200,1400);
	echo "<table border = 1 cellspacing = 0 cellpading = 6>";
	$h=1;
		for ($i=1; $i <=10 ; $i++) 
		{ 
			echo "<tr>";
				for ($j=1; $j <=10 ; $j++) 
				{ 
					echo "<td>$h</td>";
					$h++;
				}	
		}
	echo "</table>";
?>
</body>
</html>