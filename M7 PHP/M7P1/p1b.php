<?php
function stop()  
{  
  header('Location: http://localhost/M7P1/p1.php');
}
  header("Refresh:3");
?>
<html>  
<head>
   <title></title>  
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  
</head>

<style type="text/css">
  .red {
    color: #F00;
  }
  .green {
    color: #0F0;
  }
</style>

   <body>
    <form>
      <h2>CPD Status:</h2>
      <input type="submit" value="START"> 
  </form>
   	<form action="p1.php">
  		<input type="submit" value="STOP" onclick="stop()"> 
	</form>
		<?php 

			$temp = mt_rand(20,35); 
      if ($temp>=30) {
        echo "<h1 class='red'>$temp</h1>";
      }
      else
      {
        echo "<h1 class='green'>$temp</h1>";
      }
			 
		?> 
   </body>  
</html> 