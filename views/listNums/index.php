<div class="container">
	<br><br>    <!-- tabla con la info del user -->
	<div id="infoUser">
		<?php
		  echo "<h1 class='centra'>ALL CONTACTS <small> PhoneBook</small></h1><br><br>";

		  echo "<table class='table table-striped'>";
		  	echo "<tr>";
		  		echo "<th><h3>Name</h3></th>";
		  		echo "<th><h3>Number</h3></th>";
	  		echo "<tr>";
		  $arrlength=count($arrayPhones);
		  for ($j=0; $j<$arrlength; $j++) { //posiciones 1:nombre, 2:ap1, 3:ap2
		  	$contactName = $arrayPhones[$j]['nombre'];
		  	$contactNum = $arrayPhones[$j]['numTlf'];
				echo "<tr>";
					echo "<td>" . $contactName . "</td>";
					echo "<td>" . $contactNum . "</td>";					
	      echo "</tr>";
		  }
		  echo "</table>";

		  echo "<div class='centra'>
		  			<a class='btn' href='../controllers/users_controller.php'>Back Users</a></div>";
		
		?>
	</div><br>
</div><br><br><br><br>