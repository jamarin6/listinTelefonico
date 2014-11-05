<?php 
	// para debugger --> http://localhost/listinMVC/controllers/users_controller.php?XDEBUG_SESSION_START=sublime.xdebug
	// action index //////////////////////////////////////////////////////////////////////////

	// function index() {
	include "../conectarBD.php";
	$view = "users/index.php";
	//$mens = $_GET['mens'];
	//if (empty($_GET['mens'])) {
  //  $mens = '';
  //  $color = '';
	//}

	$result = mysqli_query($con,"SELECT id, nombre, ap1, ap2, fechaNac, padre_id FROM users");
	$arrayUsers = []; // inicializo el array
  //guardamos en un array multidimensional todos los datos de la consulta
  $i=0;
  while($row = mysqli_fetch_array($result)){ // mirar debugger php, como debugear php
    $arrayUsers[$i] = $row;
    $i++;
  }

  $vacio = true; //variable para ver si hay o no algun usuario, si no lo hay es 'true' y si lo hay es 'false'
  if (count($arrayUsers) > 0) {
  	$vacio = false;
  }
	mysqli_close($con); // desconectar

	include "../views/layout.php";
	// }

  // fin action index //////////////////////////////////////////////////////////////////////



	// function show (userID) {
	//
	//
	//	
	//}

	// function new (userID) {
	//
	//
	//	
	//}

	// function create (userID) {
	//
	//
	//	
	//}

	// function edit (userID) {
	//
	//
	//	
	//}

	// function update (userID) {
	//
	//
	//	
	//}

?>