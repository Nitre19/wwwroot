<?php
 
/*
Fitxer cap.php
 
Fitxer de capçalera de totes les pàgines del web
 
Arguments:
- $TITOL: títol de la pàgina
- $ESTIL: nom del CSS per carregar
*/
 
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
<title>
 
<?php
 
/////////////////////////
//  TITOL DE LA PAGINA //
/////////////////////////
if(isset($TITOL))
printf("%s", $TITOL);
 
else
printf("Exemple");
?>
 
</title>
 
<?php
/////////////////
// Estil (CSS) //
/////////////////
if(isset($ESTIL))
printf('<link rel="stylesheet" type="text/css" href="%s" />', $ESTIL);
else
printf('<link rel="stylesheet" type="text/css" href="estils.css" />');
 
?>
 
</head>
 
<body>
