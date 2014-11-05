<div class="container">			<!-- Edit/New contact  -->
	<br><br>
	<h1 class="centra"><?php echo $actionContact; ?></h1><br><br>
	<div class="row">
		
		<div class="col-lg-4 col-centered">
			<div class="centraSubmit">
				<?php
					echo "<form name='input' action='../controllers/" . $ruta . "' method='post'>
						<input type='hidden' name='phoneID'  value='" . $phoneID . "'>
						<input type='hidden' name='userID'  value='" . $userID . "'>
						Nombre: <input type='text' name='nombre'  value='" . $nombreOld . "' autofocus><br>
						Numero: <input type='text' name='numTlf' value='" . $numTlfOld . "'><br><br>
						<input type='submit' value='Submit'>
						</form>";
				?>
			</div>
		</div>
	</div>
</div>