 <!-- Esto tiene que ir en la accion edit de users_controller -->
<?php
	include "../conectarBD.php";
	$view = "users/edit.php";
	$ruta = "updateUser_controller.php";
	if (isset($_GET['userID'])){//si no viene en el GET q el userID sea el mismo q había
		$userID = $_GET['userID']; //enviar este parametro sin mostrarlo en el formulario
	}
	$result = mysqli_query($con,"SELECT id, nombre, ap1, ap2, fechaNac FROM users WHERE id = $userID");
	while($row = mysqli_fetch_array($result)){ // se mete en la posición [0] los valores del user a mostrar
		$arrayUsers = $row;								 // en el formulario, excepto el id que no se muestra pero se envía
	}
	mysqli_close($con); // desconectar
	$nombreOld = $arrayUsers['nombre'];
	$ap1Old = $arrayUsers['ap1'];
	$ap2Old = $arrayUsers['ap2'];
	$fechaNacOld = $arrayUsers['fechaNac'];

	include "../views/layout.php";
?>