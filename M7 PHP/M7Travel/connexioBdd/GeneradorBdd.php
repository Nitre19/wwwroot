<?php
	include 'connexio.php';
	echo"<style>";
		include'../estils/estils.css';
	echo"</style>";
	echo "<h1>Espera unos segundos se esta generando la bdd...</h1>";
	$sql = "CREATE DATABASE $bdd";
	if(!mysqli_query($connexio, $sql)){
		echo "Error creating database: " . mysqli_error($connexio);
	}else{
		mysqli_select_db($connexio,$bdd);
		$sql="drop table if exists cart_geckos";
		mysqli_query($connexio, $sql);
		$sql="drop table if exists viajes_geckos";
		mysqli_query($connexio, $sql);
		$sql="drop table if exists users_geckos";
		mysqli_query($connexio, $sql);
		$sql="create table viajes_geckos (
			id int,	
		    destino varchar(60),
		    urlImg varchar(100),
		    preu int,
		    descuento int,
		    primary key(id)
		)";
	    mysqli_query($connexio, $sql);
	    $sql="create table users_geckos (
			nom varchar(20),
		    pass varchar(20),
		    edat int,
		    email varchar(100),
		    primary key(nom,pass)
		)";
	    mysqli_query($connexio, $sql);
	    $sql="create table cart_geckos (
			nom varchar(20),
		    pass varchar(20),
		    id int,
		    qtt int,
		    PRIMARY KEY (nom,pass,id),
		    foreign key (nom,pass) references users_geckos(nom,pass),
		    foreign key (id) references viajes_geckos(id)
		)";
	    mysqli_query($connexio, $sql);
	    $sql="INSERT INTO viajes_geckos VALUES (
			1,'Canada','img/canada.jpg',600,10
		)";
		mysqli_query($connexio, $sql);
		$sql="INSERT INTO viajes_geckos VALUES (
			2,'Alemania','img/alemania.jpg',300,5
		)";
		mysqli_query($connexio, $sql);
		$sql="INSERT INTO viajes_geckos VALUES (
			3,'Madrid','img/madrid.jpg',50,4
		)";
		mysqli_query($connexio, $sql);
		$sql="INSERT INTO viajes_geckos VALUES (
			4,'Japon','img/japon.jpg',1200,8
		)";
		mysqli_query($connexio, $sql);
		$sql="INSERT INTO viajes_geckos VALUES (
			5,'Brasil','img/brasil.jpg',700,2
		)";
		mysqli_query($connexio, $sql);
		$sql="INSERT INTO viajes_geckos VALUES (
			6,'Italia','img/italia.jpg',600,3
		)";
		mysqli_query($connexio, $sql);	
		header('Location: ../index.php');
	}
?>