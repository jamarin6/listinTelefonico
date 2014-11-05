<div class="container">			<!-- lista con los users -->
	<br><br>

	<h1 class="centra">Users</h1><br><br>
	<div class="row">
		
		<div class="col-lg-6 col-centered">
			<?php
			  
				if ($vacio) {
					echo "<h2 class='centra'>NO hay SuperUser</h2><br><br>";
					echo "<div class='col-lg-8 centra'>";
						echo "<a class='btn btn-success btn-lg' href='../controllers/newSuperUser_controller.php'>Create SuperUser</a></td>";
					echo "</div>";
				} else {
			  // TABLA, inicio, primero la cabecera /////////////////////////////////////////////////////////////////////
			  echo "<table class='table-condensed table-hover col-centered' id='tablaUsers'>"; // mirar aqui para meterlo todo en una tabla
			  	echo "<tr>";
			  		echo "<th>Name</th>";
			  		echo "<th>Navegation</th>";
		  		echo "<tr>";
		  		// TABLA, itero y creo una fila por cada usuario con su nombre y apellidos + botones navegacion
			  $arrlength=count($arrayUsers);
			  for ($j=0; $j<$arrlength; $j++) {
			  	$userID = $arrayUsers[$j]['id'];
			  	$userNombre = $arrayUsers[$j]['nombre'];
			  	$userAp1 = $arrayUsers[$j]['ap1'];
			  	$userAp2 = $arrayUsers[$j]['ap2'];
			  	$userFechaNac = $arrayUsers[$j]['fechaNac'];
					echo "<tr id='row" . $userID . "'>"; // X X X X X X X X X X X X X X X X X X X   AQUÍ   X X X X X X X X X X X X X 
						echo "<td>" . $arrayUsers[$j]['nombre'] . " " . $arrayUsers[$j]['ap1'] . " " . $arrayUsers[$j]['ap2'] . "&nbsp&nbsp&nbsp" . "</td>";  
						echo "<td><a class='btn btn-primary btn-xs' href='../controllers/showUser_controller.php?userID=" . $userID . "'>View</a>" . " " .							       
								      "<a class='btn btn-warning btn-xs' href='../controllers/editUser_controller.php?userID=" . $userID . "'>Edit</a>" . " " . 
								      "<a class='btn btn-danger btn-xs' id='deleteUser' onclick='borraUser(" . $userID . ")'" . ">Delete</a>" . " " . 
								      "<a class='btn btn-info btn-xs' href='../controllers/showUserList_controller.php?userID=" . $userID . "'>PhoneBook</a>" . " " . 
								      "<a class='btn btn-success btn-xs' href='../controllers/newUser_controller.php?userID=" . $userID . "'>Add User</a></td>";
		      echo "</tr>";
			  }
			  echo "</table>";
			  // TABLA, fin /////////////////////////////////////////////////////////////////////////////////////////////
			}
			?>
		</div>
	</div><br>

	<!-- 	BOTONES de paginación -->
	<div class="row">
		<div class="col-xs-4 col-xs-offset-1 col-sm-2 col-sm-offset-3 col-md-2 col-md-offset-3 col-lg-2 col-lg-offset-3 paginar">
			<button type="button" class="btn btn-warning center-block" id="prevPag">&lt;&lt;&lt;PrevPag</button>
		</div>
		<div class="col-xs-4 col-xs-offset-2 col-sm-2 col-sm-offset-2 col-md-2 col-md-offset-2 col-lg-2 col-lg-offset-2 paginar2">
			<button type="button" class="btn btn-warning center-block" id="nextPag">NextPag&gt;&gt;&gt;</button>
		</div>
	</div><br>
	
</div><br><br><br><br><br>

<!-- Otra forma para el <li> de hijos, seguidos uno del otro con ", " pero el último tiene tambien ", "
			"<li><strong>Hijos: </strong>";
		  $arrlength=count($arrayHijos);
		  for ($k=0; $k<$arrlength; $k++) {
			 echo "<a href='show_user.php?id=" . $arrayHijos[$k]['id'] . "'>" . $arrayHijos[$k]['nombre'] . " ,</a>"; 
		  }
		  echo "</li><br>";-->

<!-- Otra forma para el <li> de hijos, seguidos y el último sin la coma, bien pero mucho bucle
		"<li><strong>Hijos: </strong>";
			  $arrlength=count($arrayHijos);
			  for ($k=0; $k<$arrlength; $k++) {
			  	$nombres[$k] = $arrayHijos[$k]['nombre'];
			  	$ids[$k] = $arrayHijos[$k]['id'];
			  	if ($k==($arrlength-1)) {
			  		echo "<a href='show_user.php?id=" . $ids[$k] . "'>" . $nombres[$k] . "</a>";
			  	} else {
			  		echo "<a href='show_user.php?id=" . $ids[$k] . "'>" . $nombres[$k] . ", " . "</a>";
			  	}
			  }
		echo "</li><br>";
-->