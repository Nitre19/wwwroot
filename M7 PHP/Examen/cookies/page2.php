<?php

setcookie("numberguess", rand(0,10), time() + 60 * 60 * 1);

echo "<pre>";
var_dump($_COOKIE);
echo "</pre>";
?>
<hr />
<a href="page3.php">page 3</a>

