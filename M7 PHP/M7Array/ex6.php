<?php
$productes['Disc']=array('quant'=>2,'preu'=>60.23,'familia'=>'Storage');
$productes['Stick usb']=array('quant'=>5,'preu'=>6,'familia'=>'Storage');
$productes['Monitor']=array('quant'=>1,'preu'=>140.95,'familia'=>'Monitor');
echo "<table border='1'><caption>Productes</caption><tr><th>Producte</th>
<th>Quant</th><th>Preu</th><th>Import</th></tr>";
$total=0;
foreach ($productes as $nom=>$producte) {
$import=$producte['quant']*$producte['preu'];
echo "<tr><td>$nom</td><td align='right'>".$producte['quant'].
"</td><td align='right'>".$producte['preu'].
"</td><td align='right'>$import</td></tr>";
$total += $import;
}
echo "<tr><td colspan='4' align='right'>TOTAL: $total</td></tr></table>";
?>