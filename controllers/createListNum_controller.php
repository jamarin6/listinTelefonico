<?php 
//idea: contar en la tabla users los q hay con $userID, q deberia dar 1 y en caso de q sea users = 0 no hacer el insert
	include "../conectarBD.php";
	$name = $_POST['nombre']; //recibo el name del user
	$num = $_POST['numTlf'];
	$userID = $_POST['userID'];

	//capturamos posibles errores en el array errors
	$errors = [];
	if (empty($name)){
		array_push($errors, "- el campo <strong><ins>Nombre</ins></strong> no es correcto<br>");
	}
	if (empty($num)){
		array_push($errors, "- el campo <strong><ins>Numero</ins></strong> no es correcto<br>");
	}

	if (empty($errors)){
		$numPadres = mysqli_fetch_array(mysqli_query($con,"SELECT count(*) FROM users WHERE users.id = $userID"))[0];
		if ($numPadres == 1) { //existe el padre
			//crear un numero en listnums
			mysqli_query($con, "INSERT INTO listnums (nombre,numTlf,user_id) VALUES ('$name','$num','$userID')");
	  	mysqli_close($con); // desconectar	
	  	$mens = "Contacto creado con exito!!!";
			$color = "verde";
			include "../controllers/showUserList_controller.php";
	  } else {
	  	//algo falla, o el padre no existe o hay mas de 1 padre (lo cual no podría ser)
	  	//redirijo a users para elegir un padre ya que el elegido era erróneo
	  	$mens = "NO pudo crearse contacto, padre invalido.";
			$color = "rojo";
	  	include "../controllers/users_controller.php";
	  }
	} else {
		// notifico errores
		$mens = implode(" ", $errors);
		$color = "rojo";
		//y mandar al formulario newListNum de nuevo
		include "../controllers/newListNum_controller.php";
	}
	//header("Location: showUserList_controller.php?id=" . $userID . "&mens=" . $mens . "&color=" . $color);
?>