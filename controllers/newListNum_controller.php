<?php
	$view = "listNums/new.php";
	$ruta = "createListNum_controller.php";
	$phoneID = $nombreOld = $numTlfOld = "";// necesario inicializar porque _form.php espera estos valores
	if (isset($_GET['userID'])) {           // xq del editListNum_controller.php si que le llegan
		$userID = $_GET['userID']; //enviar este parametro sin mostrarlo en el formulario
	}
	include "../views/layout.php";
?>