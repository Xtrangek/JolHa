<?php

	$servidor ="localhost";
	$usuario ="jolha";
	$clave ="root";
	$BaseDeDatos ="jolha2";

	$enlace = mysqli_connect($servidor, $usuario, $clave, $BaseDeDatos);

	if(!$enlace){
		die("Falla en la conexion: " . mysqli_connect_error());
	}
?>  