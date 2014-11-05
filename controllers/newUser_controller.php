<!-- Esto tiene que ir en la accion new de users_controller -->
<?php
	$view = "users/new.php";
	$ruta = "createUser_controller.php";
	$nombreOld = $ap1Old = $ap2Old = $fechaNacOld = "";
	if (isset($_GET['userID'])){
		$padreID = $_GET['userID']; //enviar este parametro sin mostrarlo en el formulario	
		$userID = $padreID; //$userID es el nombre del valor q recoge el _form.php
	} else {
		$userID = $padreId;
	}

	if (isset($_GET['mens'])) {
		$mens = $_GET['mens'];
	}
	if (isset($_GET['color'])) {
		$color = $_GET['color'];
	}
	include "../views/layout.php";
?>