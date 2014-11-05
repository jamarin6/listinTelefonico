<div class="container">
		<!-- titulo pagina de user info -->
	<div class="centra">
		<br><br>
		<h1>User Info</h1><br>
	</div>
		<!-- lista con la info del user -->
	<div class="row">
		<div class="col-xs-6 col-xs-offset-2 col-sm-6 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">
			<?php 
				echo "<ul>";
				  echo "<li><strong>Nombre: </strong>" . $arrayUsers['nombre'] . "</li>" . 
							 "<li><strong>Apellido1: </strong>" . $arrayUsers['ap1'] . "</li>" .
							 "<li><strong>Apellido2: </strong>" . $arrayUsers['ap2'] . "</li>" .
							 "<li><strong>F. nacimiento: </strong>" . $arrayUsers['fechaNac'] . "</li>" .
							 "<li><strong>Lista de tlfnos: </strong><a href='showUserList_controller.php?userID=" . $userID . "'>" . $numCont . " numeros </a></li>" .
							 "<li><strong>Padre: </strong><a href='showUser_controller.php?userID=" . $idPadre . "'>" . $nombrePadre . "</a>" . $mensajePadre . "</li>" . 
							 "<li><strong>Hijos: </strong><ol>";
					  for ($k=0; $k<count($arrayHijos); $k++) {
						 echo "<li><a href='showUser_controller.php?userID=" . $arrayHijos[$k]['id'] . "'>" . $arrayHijos[$k]['nombre'] . "</a></li>"; 
					  }
					  echo "</ol></li><br>";

					  echo "<a class='btn btn-primary' href='showUserList_controller.php?userID=" . $userID . "'>PhoneBook</a>" . " " .
					  "<a class='btn' href='../controllers/users_controller.php'>Atrás</a>";
	  		echo "</ul><br><br><br><br><br>";					
			?>			
		</div>
	</div>
</div>
<!-- Otra forma para el <li> de hijos, seguidos uno del otro con ", " pero el último sin ", " (trailing comma)
			"<li><strong>Hijos: </strong>";
			  $arrlength=count($arrayHijos);
			  $texto = "";
			  for ($k=0; $k<$arrlength; $k++) {
				 $texto .= "<a href='show_user.php?id=" . $arrayHijos[$k]['id'] . "'>" . $arrayHijos[$k]['nombre'] . "</a>" . ", "; 
			  }
			  echo chop($texto,", ");
			echo "</li><br>";-->

<!-- Otra forma para el <li> de hijos, como una lista ordenada
"<li><strong>Hijos: </strong><ol>";
							  for ($k=0; $k<count($arrayHijos); $k++) {
								 echo "<li><a href='show_user.php?id=" . $arrayHijos[$k]['id'] . "'>" . $arrayHijos[$k]['nombre'] . "</a></li>"; 
							  }
							  echo "</ol></li><br>";

-->