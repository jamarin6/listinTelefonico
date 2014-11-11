<!-- Esto tiene que ir en la accion new de users_controller -->
<?php
	$view = "users/new.php";//establezco la vista a mostrar en el layout
	$ruta = "createUser_controller.php";//me dice en el _form si mandar la info al createUser o updateUser, en este caso al createUser
	$nombreOld = $ap1Old = $ap2Old = $fechaNacOld = "";
	if (isset($_GET['userID'])){
		$padreID = $_GET['userID']; //enviar este parametro sin mostrarlo en el formulario. Necesito $padreID
		$userID = $padreID; //$userID es el nombre del valor q recoge el _form.php. Tambien necesito $userID
	} else {
		$userID = $padreId;
	}

	if (isset($_GET['mens'])) {//si viene mensaje lo recojo
		$mens = $_GET['mens'];
	}
	if (isset($_GET['color'])) {//si viene color lo recojo
		$color = $_GET['color'];
	}
	include "../views/layout.php";
?>