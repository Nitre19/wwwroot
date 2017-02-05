<?php

include "lib" . DIRECTORY_SEPARATOR . "shoppingcatalog.php";

session_start();


/*    echo "EXEMPLE DE COOKIES <BR>";
    setcookie("nomCookieX", "Valor", time()+3600);
    if (isset($_COOKIE["nomCookieX"])) 
    {
        echo "Tenim una Cookie: " . $_COOKIE["nomCookieX"];
    }
    */
 /*   if (isset($_GET["reload"]) && isset($_COOKIE["nomCookieX"])) 
       echo "Cookie: " . $_COOKIE["nomCookieX"];
      else header("Location: ?reload=true");
      */


//
// Print products, create link to the "add product" page
// page2.php?id=N
//

$products = array();
    
        //
        // All the dummy products this shop sells
        //

        $products[3] = "DVD Star Wars";
        $products[6] = "DVD Notting Hill";
        $products[7] = "DVD Tarantino Collection #1";
        $products[8] = "DVD Stupid Comedy";
        $products[10] = "DVD Documents and News";

foreach ($products as $id=>$name) {
    // @TODO link to page2...
    echo "<a href='page2.php?todo=add&id=".$id."'>" .$id ." / " . $name . "</a></br>\n";
}

?>

<br>
<a href='page3.php'>Shopping Cart</a>


