<!-- Esto tiene que ir en la accion update de users_controller -->
<?php
	include "../conectarBD.php";
	$userID = $_POST['padreID'];
	$name = $_POST['nombre']; //recibo el name del user
	$ap1 = $_POST['ap1'];
	$ap2 = $_POST['ap2'];
	$fecha = $_POST['fechaNac'];

	$view = "users/index.php";

	// capturamos posibles errores en el array 'errors'
	$errors = []; //donde vamos a meter los errores en forma de strings
	if (empty($name)){ //si no hay $name metemos en $errors el string q notifica del error
	array_push($errors,"- el campo <strong><ins>nombre</ins></strong> no es correcto<br>");
	}
	if (empty($ap1)){ //si no hay $ap1 metemos en $errors el string q notifica del error
	array_push($errors,"- el campo <strong><ins>apellido1</ins></strong> no es correcto<br>");
	}
	if (empty($ap2)){ //si no hay $ap2 metemos en $errors el string q notifica del error
	array_push($errors,"- el campo <strong><ins>apellido2</ins></strong> no es correcto<br>");
	}
	if (empty($fecha)){ //si no hay $fecha metemos en $errors el string q notifica del error
	array_push($errors,"- el campo <strong><ins>fecha de nacimiento</ins></strong> no es correcto<br>");
	}

	if (empty($errors)) { //si no hay ningun error
		//hacemos la query
		mysqli_query($con, "UPDATE users SET nombre='$name',ap1='$ap1',ap2='$ap2',fechaNac='$fecha'
											WHERE id='$userID'");
  	mysqli_close($con); // desconectar				
		// damos valor a mensaje de notificacion de éxito
		$mens = "User editado con éxito!!!";
		$color = "verde";
		include "../controllers/users_controller.php"; //y vamos para el index tras editar todo bien
	} else {
	  // almaceno en $mens los errores existentes para notificarlo
  	$mens = implode(" ", $errors); //meto en el string $mens el array errors separado por espacios
  	$color = "rojo"; //le doy el color rojo al mensaje
  	//header("Location: editUser_controller.php?userID=" . $padreId . "&mens=" . $mens . "&color=" . $color);
  	if (isset($_POST['padreID'])){
  		$userID = $_POST['padreID'];//para q editUser_controller.php tenga visible $userID xq se llegará a editUser_controller
  	}                             // sin click, asi q en editUser no podrá coger nada de $_GET['userID']
  	include "editUser_controller.php";//volvemos al edit porque no se ha editado por algún fallo
	}
?>