<?php
	include "../conectarBD.php";
	$userID = $_POST['userID']; //recibo el id del user a borrar
	
	//cuento los users que hay y los meto en count1
	$count1 = mysqli_fetch_array(mysqli_query($con,"SELECT count(*) FROM users"))[0];

	mysqli_query($con, "DELETE FROM users WHERE users.id=$userID");
	//vuelvo a contar para ver si se ha borrado, debería dar un numero menos q antes si se ha borrado uno bien
	$count2 = mysqli_fetch_array(mysqli_query($con,"SELECT count(*) FROM users"))[0];

  mysqli_close($con); // desconectar
  //los cuento otra vez en count2
  if ($count1 == $count2){ //si son iguales es que no se ha borrado y el mens y color son de NO borrado 	
  	$mens = "No se pudo borrar User";
		$color = "rojo";
  } else { //de lo contrario se ha borrado y todo OK
	  $mens = "Usuario Borrado con éxtio!!!";
		$color = "verde";
	}
	//redirigir al users_index.php
	//header("Location: users_controller.php?mens=" . $mens1);

	include "../views/users/deleteUser.php";
?>