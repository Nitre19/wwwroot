<?php
  if ($_REQUEST['nom']!="") {
    $fp=fopen('ValorsGuardats\valors.txt','w');
    $nom = $_REQUEST['nom'];
    $valor = $_REQUEST['Valor'];
    fwrite($fp,$nom);
    fwrite($fp,';');
    fwrite($fp,$valor);
    fwrite($fp,';');
    fclose($fp);
  }
?>
