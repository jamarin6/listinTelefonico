<?php
	include "../conectarBD.php";//conectar con la bd
  $view = "listNums/show.php";//incluyo la vista q se mostrará en el layout

  if (isset($_GET['userID'])) {//por si viene o no el id por click en boton 'PhoneBook' en la vista index-Users
    $userID = $_GET['userID']; //si viene en un GET (click), se asigna, pero si no es así seguirá con el valor q tenía
  }
  //seleccionamos los registros de la tabla listNums de ese user
	$userList = mysqli_query($con,"SELECT * FROM listNums WHERE listNums.user_id = $userID");
	$arrayPhones = [];
	$i=0;
  while($row = mysqli_fetch_array($userList)){ // se mete en el arrayPhones[i] los valores de la listNums de ese user
    $arrayPhones[$i] = $row;
    $i++;
  }
  $arrayPadre = [];
  $user = mysqli_query($con,"SELECT nombre, ap1, ap2 FROM users WHERE users.id = $userID");
  while($row3 = mysqli_fetch_array($user)){//cogemos la información del user para saber en la vista el nombre del user de  
  	$arrayPadre = $row3;                   //los contactos visualizados
  }
  mysqli_close($con); // desconectar
  //el nombre y apellidos del user propietario de la lista de contactos
  $nombre = $arrayPadre['nombre'];
  $ap1 = $arrayPadre['ap1'];
  $ap2 = $arrayPadre['ap2'];

  include "../views/layout.php";
?>