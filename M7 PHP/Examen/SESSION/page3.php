<?php
include "lib" . DIRECTORY_SEPARATOR . "shoppingcatalog.php";

//catalog 
        $products[3] = "DVD Star Wars";
        $products[6] = "DVD Notting Hill -best movie ever!";
        $products[7] = "DVD Tarantino Collection #1";
        $products[8] = "DVD Stupid Comedy";
        $products[10] = "DVD Documents and News";


// start session!
// create cart from session data


session_start();

$sessionCart = array();
if (isset($_SESSION['cart'])) {
    $sessionCart = $_SESSION['cart'];
}
$items=array();
 foreach ($sessionCart as $id) {
 	 if (isset($products[$id])) {
             //To simplify, if products are repeated in the cart they are ignored.
            $items[$id] = $products[$id];
        }
    }

?>
<h1>Your products</h1>
<?php
foreach ($items as $id=>$product) {
    echo "<a href='page2.php?todo=remove&id=".$id."'>" .$id ." / " . $product . "</a></br>\n";
}
?>
<br>
<a href='page1.php'>Products</a>

