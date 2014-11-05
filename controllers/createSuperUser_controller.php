<?php
	include "../conectarBD.php";
	$name = $_POST['nombre']; //recibo el name del user
	$ap1 = $_POST['ap1'];
	$ap2 = $_POST['ap2'];
	$fecha = $_POST['fechaNac'];

	mysqli_query($con, "INSERT INTO users (nombre,ap1,ap2,fechaNac) VALUES ('$name','$ap1','$ap2','$fecha')");
  mysqli_close($con); // desconectar				
	//redirigir al users_index.php
	header("Location: users_controller.php");
?>