<?php
$artistes = array (
	array(
		"name" => "Joan Miró",
		"ofici" => "Pintor",
	),
	array(
		"name" => "Salvador Dalí",
		"ofici" => "Pintor i escultor",
	),
	array(
		"name" => "Pablo Picasso",
		"ofici" => "Pintor",
	)	
);

$gaudi = array("name" => "Antoni Gaudí","ofici" => "Arquitecte");
$goya = array("name" => "Francisco de Goya","ofici" => "Pintor");
array_push($artistes, $goya);
array_push($artistes, $gaudi);

$artistes[4]["name"]="Van Gogh";
echo $artistes[4]["ofici"];

echo count($artistes);
?>