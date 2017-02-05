<?php


echo "<pre>";
var_dump($_COOKIE);
echo "</pre>";
?>
<hr />
<a href="page1.php">page 1</a>
<pre>
<?php
echo "temps=". $_COOKIE['tempscookie'];
echo "<br>número=". $_COOKIE['numberguess'];
?>
<!-- aquest mateix codi es pot fer amb javascript així:-->
<script type="text/javascript">
document.write(document.cookie);
</script>
</pre>