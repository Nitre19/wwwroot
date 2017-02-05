<?php
$productes['Disc']=array(
						'quant'=>2,
						'preu'=>60.23,
						'Dte' =>0,
						'familia'=>'Storage'
						);
$productes['Stick usb']=array(
							'quant'=>5,
							'preu'=>6,
							'Dte' =>5,
							'familia'=>'Storage'
							);
$productes['Monitor']=array(
							'quant'=>1,
							'preu'=>140.95,
							'Dte' =>10,
							'familia'=>'Monitor'
							);
echo "<table border='1'><caption>Productes</caption>
<tr><th>Producte</th><th>Quant</th><th>Preu</th><th>Dte %</th><th>Import</th></tr>";
$i=0;
foreach ($productes as $nom=>$producte)
{
	$total[$i] = $productes[$nom]['quant']*$productes[$nom]['preu'];
	if ($producte['Dte']!=0) {
		$total[$i] = $total[$i]-(($productes[$nom]['quant']*$productes[$nom]['preu']*$producte['Dte'])/100);
	}
	
	echo "<tr>
			<td>$nom</td>
			<td>".$producte['quant']."</td>
			<td>".$producte['preu']."</td>
			<td>".$producte['Dte']." %</td>
			<td>".$total[$i]."</td>
		</tr>";
	
	$i++;
}

$totalFinal = 0;
for ($i=0; $i <count($total) ; $i++) { 
	$totalFinal+=$total[$i];
}
echo "<td  colspan='5' align='right'>TOTAL: $totalFinal</td>";
?>