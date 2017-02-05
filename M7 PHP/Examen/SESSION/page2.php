<?php
include "lib" . DIRECTORY_SEPARATOR . "shoppingcatalog.php";



//catalog
        $products[3] = "DVD Star Wars";
        $products[6] = "DVD Notting Hill -best movie ever!";
        $products[7] = "DVD Tarantino Collection #1";
        $products[8] = "DVD Stupid Comedy";
        $products[10] = "DVD Documents and News";
session_start();

$todo = $_GET['todo'];

// 
// START SESSION
// GET ID

// PUT THE PRODUCT TO THE SESSION; OR JUST THE ID OF THE PRODUCT

$id = $_GET['id'];
$sessionCart = array();

if (isset($_SESSION['cart'])) {
    $sessionCart = $_SESSION['cart'];
}

if ($todo == 'add') {

    $sessionCart[] = $id;
    $product = $products[$id];
    
    echo "ADDED THE PRODUCT $product TO CART <br/> \n";

} else if ($todo == 'remove') {
    $sessionCart = array_diff($sessionCart, array($id));
    //  http://stackoverflow.com/questions/7225070/php-array-delete-by-value-not-key
    
    $product = $products[$id];

    echo "REMOVED THE PRODUCT $product FROM CART <br/> \n";

    
} else {
}
var_dump($sessionCart);
$_SESSION['cart'] = $sessionCart;
?>
Cart Changed. See your <a href='page3.php'>CART</a><br/>
<hr />
<a href='page1.php'>Products</a>

