<html>
<head>
	<title></title>
</head>
<body>
	<?php
	$products = array(A,B,C);
	$prices = array(1000,1200,1400);
	$r = $prices[0]+$prices[1]+$prices[2];
	echo "<table border = 1 cellspacing = 0 cellpading = 6>
			<tr><td>Product</td><td>Price $r</td></tr>
			<tr><td><font color= blue>Product {$products[0]}</font></td><td>{$prices[0]}</td></tr>
			<tr><td><font color= green>Product {$products[1]}</font></td><td>{$prices[1]}</td></tr>
			<tr><td><font color= red>Product {$products[2]}</font></td><td>{$prices[2]}</td></tr>
			</table>";
?>
</body>
</html>