<?php 
	// para debugger --> http://localhost/listinMVC/controllers/users_controller.php?XDEBUG_SESSION_START=sublime.xdebug
	include "../conectarBD.php";//conectamos a la bd
	$view = "users/index.php";//incluyo lo q será la vista en el layout

	$count1 = mysqli_fetch_array(mysqli_query($con,"SELECT count(*) FROM users"))[0];
	if (isset($_GET['pagIr'])){//si nos viene una pag a la q ir la recogemos y comprobamos...
		//restricciones por si me manda a una pag fuera de rango//query para saber long de users
		if (($_GET['pagIr'])<0){//si me mandan a una pagina inferior a la 0, osea a una q no existe
			$pagActual = 0; //le digo q vaya a la primera xq no hay pagina menor, osea q se quede en la misma, en la 1ºpag
			$mens = "ya estas en el principio... no seas CANALLA!!!";
			$color = "rojo";
		} elseif (($_GET['pagIr'])>=($count1)/3) {//si me mandan a una pag superior a la última q debe existir... //$count1/3 son las pag q deben existir con users
			$pagActual = 0; //le mando a la 1ª pag con un mensaje de aviso
			$mens = "te devuelvo al principio que te has 'despistado' CANALLA!!!";
			$color = "verde";
		} else {//la pagina a la q me mandan existe y todo está bien
		$pagActual = $_GET['pagIr'];
		}
	} else {//y si no viene pag a la q ir es q aparecemos en la principal, osea pag=0
		$pagActual = 0;
	}
	//seleccionar solo en nº de filas q queremos xa esa pag
	$inicio = $pagActual * 3;//marcamos el 1º d los users de cada pag, y abajo en la query el 3 dice q pongan la cantidad de 3 users
	$result = mysqli_query($con,"SELECT id, nombre, ap1, ap2, fechaNac, padre_id FROM users ORDER BY nombre LIMIT $inicio,3");

	$arrayUsers = []; // inicializo el array
  //guardamos en un array multidimensional todos los datos de la consulta
  $i=0;
  while($row = mysqli_fetch_array($result)){ // metemos los datos de los users de esa pagina nada mas
    $arrayUsers[$i] = $row;
    $i++;
  }

  $vacio = true; //variable para ver si hay o no algun usuario, si no lo hay es 'true' y si lo hay es 'false'
  if (count($arrayUsers) > 0) {
  	$vacio = false;
  }

	mysqli_close($con); // desconectar

	include "../views/layout.php"; //incluyo en layout, donde entre otras cosas se genera la vista q quiero ($view)
?>