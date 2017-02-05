<?php
$productes['Storage']=array(
array('nom'=>'Disc','quant'=>2,'preu'=>60.23,'dte'=>0));
$productes['Monitor']=array(
array('nom'=>'Monitor','quant'=>1,'preu'=>140.95,'dte'=>10));
$pr=array('nom'=>'Stick usb','quant'=>5,'preu'=>6,'dte'=>5);
array_push($productes['Storage'],$pr);
echo "<table border='1'><caption>Productes</caption>
<tr><th>Producte</th><th>Quant</th><th>Preu</th>
<th>Dte</th><th>Import</th></tr>";
$familia='Storage';
$total=0;
if (isset($productes[$familia]))
{
foreach ($productes[$familia] as $producte)
{
$import=$producte['quant']*$producte['preu'];
$import-=$import*$producte['dte']/100;
echo "<tr><td>".$producte['nom']."</td><td align='right'>".
$producte['quant']."</td><td align='right'>".$producte['preu'].
"</td><td align='right'>".$producte['dte']."%</td>
<td align='right'> $import</td></tr>";
$total += $import;
}
}
echo "<tr><td colspan='5' align='right'>TOTAL: $total</td></tr></table>";
?>
