<?php
	$view = "users/newSuper.php";//incluyo la vista q se mostrará en el layout
	$ruta = "createSuperUser_controller.php";
	$userID = $nombreOld = $ap1Old = $ap2Old = $fechaNacOld = "";//al ser superUser los campos 'antiguos' estarán vacío
	include "../views/layout.php";
?>