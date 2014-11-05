<!-- Esto tiene que ir en la accion show de users_controller -->
<?php
	include "../conectarBD.php";
  $view = "users/show.php";
	$userID = $_GET['userID']; //recibo el id del user a mostrar
	$result = mysqli_query($con,"SELECT id, nombre, ap1, ap2, fechaNac, padre_id FROM users WHERE id = $userID");
	$contador = mysqli_query($con, "SELECT * FROM listNums WHERE listNums.user_id = $userID");
	$arrayUsers = []; // inicializo el array
  $mensajePadre = ""; // inicializo mensajePadre a poner tras el nombre del padre, por si no lo hay que saque mensajePadre, si no no muestra nada

  while($row = mysqli_fetch_array($result)){ // se mete en la posición [0] los valores del user a mostrar
    $arrayUsers = $row;
  }

  $i=0;
  $numero[0]=null; //inicializo $numero por si no hay ningun registro que no me casque
  while($row2 = mysqli_fetch_array($contador)){ // se mete en la posición [i] los listNums de ese user paral luego contarlos y saber cuantos hay
    $numero[$i] = $row2;
    $i++;
  }

  if ($numero[0]==null) { // si no hay numeros la variable está como se inicializó
  	$numCont=0;
  } else {
  	$numCont = count($numero);
  }
  $idPadre = $arrayUsers['padre_id'];
  $arrayPadre = [];
  if ($idPadre == NULL) {
    $idPadre = $userID;
    $mensajePadre = " <strong><ins>USUARIO RAIZ</ins></strong>";
    $nombrePadre = "";
  } else {
    $padre = mysqli_query($con,"SELECT nombre FROM users WHERE users.id = $idPadre");
    while($row3 = mysqli_fetch_array($padre)){
    $arrayPadre = $row3;
    $nombrePadre = $arrayPadre['nombre'];
    }
  }
  
  $hijos = mysqli_query($con, "SELECT * FROM users WHERE users.padre_id = $userID");
  $j=0;
  $arrayHijos = [];
  while($row4 = mysqli_fetch_array($hijos)){ // se mete en la posición [i] los listNums de ese user paral luego contarlos y saber cuantos hay
    $arrayHijos[$j] = $row4;
    $j++;
  }
  mysqli_close($con); // desconectar
  

  //if ($idPadre == NULL) {
  //  $idPadre = $userID;
  //  $mensajePadre = " <strong><ins>USUARIO RAIZ</ins></strong>";
  //  $nombrePadre = "";
  //}

  include "../views/layout.php";			
?>