<?php
	include "../conectarBD.php";
	$phoneID = $_POST['phoneID'];
	$name = $_POST['nombre']; //recibo el name del contacto de listnums
	$number = $_POST['numTlf'];
	$userID = $_POST['userID'];

	mysqli_query($con, "UPDATE listnums SET nombre='$name',numTlf='$number' WHERE listnums.id='$phoneID'");
	$mens = "Numero de contacto editado con éxito!!!";
	$color = "verde";
  mysqli_close($con); // desconectar				
	//redirigir al show_user_list.php de un determinado user
	//header("Location: showUserList_controller.php?id=" . $userID);
	//include "../controllers/users_controller.php";
	include "../controllers/showUserList_controller.php";

?>