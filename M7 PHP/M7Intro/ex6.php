<?php
$productes['Disc']=array(
						'quant'=>2,
						'preu'=>60.23,
						'familia'=>'Storage'
						);
$productes['Stick usb']=array(
							'quant'=>5,
							'preu'=>6,
							'familia'=>'Storage'
							);
$productes['Monitor']=array(
							'quant'=>1,
							'preu'=>140.95,
							'familia'=>'Monitor'
							);
echo "<table border='1'><caption>Productes</caption>
<tr><th>Producte</th><th>Quant</th><th>Preu</th><th>Import</th></tr>";
$i=0;
foreach ($productes as $nom=>$producte)
{
	echo "<tr><td>$nom</td><td>".$producte['quant']."</td><td>".$producte['preu']."</td><td>".$productes[$nom]['quant']*$productes[$nom]['preu']."</td></tr>";
	$total[$i] = $productes[$nom]['quant']*$productes[$nom]['preu'];
	$i++;
}

$totalFinal = 0;
for ($i=0; $i <count($total) ; $i++) { 
	$totalFinal+=$total[$i];
}
echo "<td  colspan='4' align='right'>TOTAL: $totalFinal</td>";
?>