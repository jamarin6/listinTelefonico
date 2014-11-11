<?php
	$view = "listNums/new.php";//incluyo la vista q se mostrará en el layout
	$ruta = "createListNum_controller.php";//me dice en el _form si mandar la info al createListNum o updateNumList, en este caso al createListNum
	$phoneID = $nombreOld = $numTlfOld = "";// necesario inicializar porque _form.php espera estos valores
	if (isset($_GET['userID'])) {           // xq del editListNum_controller.php si que le llegan y el form es común
		$userID = $_GET['userID']; //enviar este parametro sin mostrarlo en el formulario, isset necesario???
	}
	include "../views/layout.php";
?>