<!-- Esto tiene que ir en la accion show de users_controller -->
<?php
	include "../conectarBD.php";
  $view = "users/show.php";//incluyo la vista q se mostrará en el layout
	$userID = $_GET['userID']; //recibo el id del user a mostrar
	$result = mysqli_query($con,"SELECT id, nombre, ap1, ap2, fechaNac, padre_id FROM users WHERE id = $userID");//seleccionamos la info para ese user
	$contador = mysqli_query($con, "SELECT * FROM listNums WHERE listNums.user_id = $userID");//recojo los contactos q tiene ese user
	$arrayUsers = []; // inicializo el array donde iran los campos del user (id,nombre,ap1,ap2,fechaNac,padre_id)
  $mensajePadre = ""; // inicializo mensajePadre a poner tras el nombre del padre, por si no lo hay que saque mensajePadre, si no no muestra nada

  while($row = mysqli_fetch_array($result)){ // se mete los valores del user a mostrar
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
  	$numCont = count($numero);//cuento los contactos q tiene ese user y lo meto en $numCont
  }
  $idPadre = $arrayUsers['padre_id'];
  $arrayPadre = [];
  if ($idPadre == NULL) {//si es null es que no tiene padre, es usuario raiz
    $idPadre = $userID; //el id del padre es el mismo q el del user, xq no tiene padre
    $mensajePadre = " <strong><ins>USUARIO RAIZ</ins></strong>";
    $nombrePadre = ""; //al no tener padre el nombre es vacio
  } else {
    $padre = mysqli_query($con,"SELECT nombre FROM users WHERE users.id = $idPadre");//seleccionamos el nombre del padre
    while($row3 = mysqli_fetch_array($padre)){
      $arrayPadre = $row3;
      $nombrePadre = $arrayPadre['nombre'];//al tener padre cogemos su nombre
    }
  }
  
  $hijos = mysqli_query($con, "SELECT * FROM users WHERE users.padre_id = $userID");//selecciono los hijos del user
  $j=0;
  $arrayHijos = [];//inicializo x si no tiene hijos q no casque
  while($row4 = mysqli_fetch_array($hijos)){ // se mete en $arrayHijos los hijos de ese user
    $arrayHijos[$j] = $row4;
    $j++;
  }
  mysqli_close($con); // desconectar
  
  include "../views/layout.php";			
?>