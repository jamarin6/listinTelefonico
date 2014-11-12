<?php
	include "../conectarBD.php";
	$view = "users/edit.php";//incluyo la vista q se mostrará en el layout
	$ruta = "updateUser_controller.php";//me dice en el _form si mandar la info al createUser o updateUser, en este caso al updateUser
	if (isset($_GET['userID'])){//si no viene en el GET q el userID sea el mismo q había
		$userID = $_GET['userID']; //enviar este parametro sin mostrarlo en el formulario
	}
	$result = mysqli_query($con,"SELECT id, nombre, ap1, ap2, fechaNac FROM users WHERE id = $userID");//selecciono los campos a editar del user para mostrarlos en el form
	while($row = mysqli_fetch_array($result)){ // se mete en la posición [0] los valores del user a mostrar
		$arrayUsers = $row;								 // en el formulario, excepto el id que no se muestra pero se envía
	}
	mysqli_close($con); // desconectar
	//establezco los valores 'antiguos' del user para mostrarlos (nombre,ap1,ap2,fechaNac)
	$nombreOld = $arrayUsers['nombre'];
	$ap1Old = $arrayUsers['ap1'];
	$ap2Old = $arrayUsers['ap2'];
	$fechaNacOld = $arrayUsers['fechaNac'];

	include "../views/layout.php";
?>