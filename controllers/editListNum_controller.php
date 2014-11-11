<?php
	include "../conectarBD.php";
	$view = "listNums/edit.php";
	$ruta = "updateNumList_controller.php";
	if (isset($_GET['phoneID'])){//si no viene en el GET que el phoneID sea el q había
		$phoneID = $_GET['phoneID']; //enviar este parametro sin mostrarlo en el formulario
	}
	if (isset($_GET['userID'])){//si no viene en el GET que el userID sea el q había
		$userID = $_GET['userID']; //enviar este parametro sin mostrarlo en el formulario
	}
	$result = mysqli_query($con,"SELECT id, nombre, numTlf, user_id FROM listnums WHERE id = $phoneID");
	while($row = mysqli_fetch_array($result)){ // se mete en la posición [0] los valores del numList a mostrar
		$arrayContact = $row;									 // en el formulario, excepto el id que no se muestra pero se envía
	}
	mysqli_close($con); // desconectar
	$nombreOld = $arrayContact['nombre'];
	$numTlfOld = $arrayContact['numTlf'];
	$userID = $arrayContact['user_id'];

	include "../views/layout.php";
?>