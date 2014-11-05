<div class="container">			<!-- New/Edit user  -->
	<br><br>
	<h1 class="centra">
		<?php 
			echo $actionTitle; //le digo q me muestre o "Edit User" o "New User"
		?>
	</h1><br><br>

	<div class="row">
		
		<div class="col-lg-4 col-centered">
			<?php		
				echo "<form name='input' action='../controllers/" . $ruta . "' method='post' class='form-center'>
					<input type='hidden' name='padreID' value=" . $userID . ">
					Nombre: <input type='text' name='nombre' autofocus value=" . $nombreOld . "><br>
					Apellido 1: <input type='text' name='ap1' value=" . $ap1Old . "><br>
					Apellido 2: <input type='text' name='ap2' value=" . $ap2Old . "><br>
					Fecha nacimiento: <input type='date' name='fechaNac' value=" . $fechaNacOld . "><br><br>
					<input type='submit' value='Submit'>
				</form>";
			?>
		</div>
	</div>
</div>