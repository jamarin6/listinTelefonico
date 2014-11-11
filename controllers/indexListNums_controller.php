<?php 
	// action index //////////////////////////////////////////////////////////////////////////

	// function index() {
	include "../conectarBD.php";
	$view = "listNums/index.php";//incluyo la vista q se mostrará en el layout
	$userList = mysqli_query($con,"SELECT * FROM listNums");//selecciono todos los contactos existentes de todos los users
	$arrayPhones = [];
	$i=0;
  while($row = mysqli_fetch_array($userList)){ // se mete en el arrayPhones[i] los valores de la listNums de ese user
    $arrayPhones[$i] = $row;
    $i++;
  }
	mysqli_close($con); // desconectar

	include "../views/layout.php";
?>