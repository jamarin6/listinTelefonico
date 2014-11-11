<?php
	include "../conectarBD.php";
	$phoneID = $_POST['phoneID'];
	$name = $_POST['nombre']; //recibo el name del contacto de listnums
	$number = $_POST['numTlf'];
	$userID = $_POST['userID'];

	// capturamos posibles errores en el array 'errors'
	$errors = []; //donde vamos a meter los errores en forma de strings
	if (empty($name)){ //si no hay $name metemos en $errors el string q notifica del error
	array_push($errors,"- el campo <strong><ins>nombre</ins></strong> no es correcto<br>");
	}
	if (empty($number)){ //si no hay $number metemos en $errors el string q notifica del error
	array_push($errors,"- el campo <strong><ins>number</ins></strong> no es correcto<br>");
	}
	if (empty($userID)){ //si no hay $userID metemos en $errors el string q notifica del error
	array_push($errors,"- el campo <strong><ins>userID</ins></strong> no es correcto<br>");
	}
	if (empty($phoneID)){ //si no hay $phoneID metemos en $errors el string q notifica del error
	array_push($errors,"- el campo <strong><ins>phoneID</ins></strong> no es correcto<br>");
	}

	//miramos si hay o no errores, si no los hay mandamos con todo OK a enseñar la lista de contactos del user, y si los hay notificamos errores y volvemos al editListNum para hacerlo bien
	if (empty($errors)){//si NO hay errores (oséa el array $errors está vacío -> empty)...
		mysqli_query($con, "UPDATE listnums SET nombre='$name',numTlf='$number' WHERE listnums.id='$phoneID'");
		$mens = "Numero de contacto editado con éxito!!!";
		$color = "verde";
	  mysqli_close($con); // desconectar				
		include "../controllers/showUserList_controller.php";//mando al showUserList para mostrar lo q se ha editado bien
	} else {//y si SI hay errores...
		// almaceno en $mens los errores existentes para notificarlo
  	$mens = implode(" ", $errors); //meto en el string $mens el array errors separado por espacios
  	$color = "rojo"; //le doy el color rojo al mensaje
  	if (isset($_POST['padreID'])){
  		$userID = $_POST['padreID'];//para q editListNum_controller.php tenga visible $userID xq se llegará a editListNum
  	}                             // sin click, ya q en editListNum no podrá coger nada de $_GET['userID']
  	if (isset($_POST['phoneID'])){
  		$phoneID = $_POST['phoneID'];//para q editListNum_controller.php tenga visible $phoneID xq se llegará a editListNum
  	} 														 // sin click, ya q en editListNum no podrá coger nada de $_GET['phoneID']
  	include "editListNum_controller.php";//volvemos al editListNum porque no se ha editado por algún fallo
	}
?>