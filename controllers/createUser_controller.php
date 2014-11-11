<!-- Esto tiene que ir en la accion create de users_controller -->
<?php
	include "../conectarBD.php";

	// recibimos los datos desde el formulario de crear new user
	$name = $_POST['nombre']; //recibo el name del user etc...
	$ap1 = $_POST['ap1'];
	$ap2 = $_POST['ap2'];
	$fecha = $_POST['fechaNac'];
	$padreId = $_POST['padreID'];

	// capturamos posibles errores en el array 'errors'
	$errors = [];
	if (empty($name)){
	array_push($errors,"- el campo <strong><ins>nombre</ins></strong> no es correcto<br>");
	}
	if (empty($ap1)){
	array_push($errors,"- el campo <strong><ins>apellido1</ins></strong> no es correcto<br>");
	}
	if (empty($ap2)){
	array_push($errors,"- el campo <strong><ins>apellido2</ins></strong> no es correcto<br>");
	}
	if (empty($fecha)){
	array_push($errors,"- el campo <strong><ins>fecha de nacimiento</ins></strong> no es correcto<br>");
	}

	if (empty($errors)) { //si no hay ningun error de los indicados arriba...

		if (empty($padreId)) {//si no hay padreID
		  //comprobar que hay 0 elems 
		  $numUsers = mysqli_fetch_array(mysqli_query($con,"SELECT count(*) FROM users"))[0];
		  if ($numUsers == 0){
		  	//entonces es el usuario raiz el que se va a crear xq es el 1º d todos
		  	$padreOk = true; //
		  } else {
		  	//algo falla porque hay users y no me mandan padreID
		  	//volver a mostrar formulario con notificaciones de error
		  	$padreOk = false;
		  }

		} else { //no es el usuario raiz y tendrá q tener id de un padre
		  //comprobar que existe padre
			$numPadres = mysqli_fetch_array(mysqli_query($con,"SELECT count(*) FROM users WHERE users.id = $padreId"))[0];
			if ($numPadres > 0) { //existe el padre
				//crear un user normal (se le puede pasar el padreID xq existe)
				$padreOk = true;
	      //padre ok = 0|1
      } else {
      	//algo falla, un user con padreId que no esta en bd quiere crear un user
      	//para crear un user tiene que ser otro user q si esté en bd 
      	$padreOk = false;
      }
    }

		if ($padreOk) {
      //inserto y notifico, mirar para hacer el insert mediante una funcion
      mysqli_query($con, "INSERT INTO users (nombre,ap1,ap2,fechaNac,padre_id) VALUES ('$name','$ap1','$ap2','$fecha','$padreId')");
      $mens = "user creado con exito!!!";
      $color = "verde";

      include "../controllers/users_controller.php";
		} else {
			//notifico padre invalido
			$mens = "no se pudo crear user, padre invalido :(";	
			$color = "rojo";
			//include -> newUser_controller.php
		}
      
  } else {
	  // notifico errores
  	$mens = implode(" ", $errors); //meto en el string mens el array errors separado por espacios
  	$color = "rojo";
  	if (isset($_POST['padreID'])){
  		$userID = $_POST['padreID'];//para q newUser_controller.php tenga visible $userID xq se llegará a newUser_controller
  	}                             // sin click, asi q en newUser no podrá coger nada de $_GET['userID']
  	// mandar al formulario new
  	include "newUser_controller.php";
	}
?>




<!-- Esto tiene que ir en la accion create de users_controller 
//<?php
//	include "../conectarBD.php";
//	$name = $_POST['nombre']; //recibo el name del user
//	$ap1 = $_POST['ap1'];
//	$ap2 = $_POST['ap2'];
//	$fecha = $_POST['fechaNac'];
//	$padreId = $_POST['userID'];
//
//	//$mens1 = "Padre no existe, no se creó user";
//	//$mens2 = "Usuario creado con éxito";
//	$mens1 = "User creado con éxito!!!";
//$mens2 = "No se pudo crear User!!!";
//$color1 = "verde";
//$color2 = "rojo";
//$mens3 = "no entra en ningun if,else. ";//
//// el padreId tiene que existir en la tabla users en users.id
//$userList = mysqli_query($con,"SELECT * FROM users WHERE users.id = $padreId");

//$arrayPhones = [];
 //while($row = mysqli_fetch_array($userList)){ // se mete en el
 //  $arrayPhones = $row;//meto el el array el userPadre y tendrá una longitud el array de 1, xq los id son unicos
 //}
 // $arrayLength = count($arrayPhones);//longitud del array, si exite el padre la longitud sera 1 (osea mayor de 0)
 // $mens = $mens3;
//	if ($arrayLength > 0){ // si la longitud es mayor de 0 (osea 1) es q existe ese padre que me mandan y guardamos el nuevo usuario
	//	mysqli_query($con, "INSERT INTO users (nombre,ap1,ap2,fechaNac,padre_id) VALUES ('$name','$ap1','$ap2','$fecha','$padreId')");
	 // mysqli_close($con); // desconectar				
	//	//redirigir al users_index.php
	  //$mens = $mens1;
	 // $color = $color1;
		//header("Location: users_controller.php);
//	} else { // si la longitud no es mayor de 0 (osea 0) es q no existe ese padre y no se crea usuario, no hay query
		//header("Location: users_controller.php?mens=" . $mens2 . "&color=" . $color2);
//		$mens = $mens2;
//		$color = $color2;
//	}
//	include "../controllers/users_controller.php";
//?>-->