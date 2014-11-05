<?php
	include "../conectarBD.php";
  $view = "listNums/show.php";

  if (isset($_GET['userID'])) {//por si viene el id por click en boton 'PhoneBook' en la vista index-Users
    $userID = $_GET['userID']; 
  }

  	//$userID = $_GET['id']; //recojo el id del user de la listNums, me lo mandan: o createListNum o index-User(click) o show-User(click)
  	$userList = mysqli_query($con,"SELECT * FROM listNums WHERE listNums.user_id = $userID");
  	$arrayPhones = [];
  	$i=0;
    while($row = mysqli_fetch_array($userList)){ // se mete en el arrayPhones[i] los valores de la listNums de ese user
      $arrayPhones[$i] = $row;
      $i++;
    }
    $arrayPadre = [];
    $user = mysqli_query($con,"SELECT nombre, ap1, ap2 FROM users WHERE users.id = $userID");
    while($row3 = mysqli_fetch_array($user)){
    	$arrayPadre = $row3;
    }
    mysqli_close($con); // desconectar
    $nombre = $arrayPadre['nombre'];
    $ap1 = $arrayPadre['ap1'];
    $ap2 = $arrayPadre['ap2'];

    include "../views/layout.php";
  
?>