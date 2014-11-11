<?php
	include "../conectarBD.php";
	$phoneID = $_POST['phoneID']; //recibo el id del contact de listnums a borrar
	$userID = $_POST['userID']; //recibo el id del usuario del contacto

	//cuento los listNums q hay y los meto en count1
	$count1 = mysqli_fetch_array(mysqli_query($con,"SELECT count(*) FROM listnums"))[0];
	mysqli_query($con, "DELETE FROM listnums WHERE listnums.id=$phoneID");
	//vuelvo a contar para ver si se ha borrado, debería dar un numero menos q antes si se ha borrado uno bien
	$count2 = mysqli_fetch_array(mysqli_query($con,"SELECT count(*) FROM listnums"))[0];

	mysqli_close($con); // desconectar				

	if ($count1 == $count2){ //si son iguales es que no se ha borrado y el mens y color son de NO borrado 	
  	$mens = "No se pudo borrar Contacto";
		$color = "rojo";
  } else { //de lo contrario se ha borrado y todo OK
	  $mens = "Contacto Borrado con exito!!!";
		$color = "verde";
	}
	//include  "../controllers/showUserList_controller.php";
	include  "../views/listNums/deleteNum.php";
?>