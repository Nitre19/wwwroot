<?php
session_start();
if (empty($_SESSION['login']) || empty($_SESSION['password']) || empty($_SESSION['age']) || empty($_SESSION['email']))
{
	header('Location: index.php');
}else{
	if (($_SESSION['age']>=18 && $_SESSION['age']<=35)|| ($_SESSION['login']=='admin' && $_SESSION['password']=='admin')) {
		header('Location: webSite.php');
	}else{
		header('Location: notAuthorised.php');
	}
}
?>