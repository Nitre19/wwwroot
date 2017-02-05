<?php
	if (isset($_POST['enviar'])) 
	{
		if ($_POST['login']=="admin" && $_POST['password']=="admin")
		{
			header("location:app/index.php");
		}
		else
		{
			header("location:index.php");

		}
	}
	else 
	{
		header("location:error.php");
	}
?>