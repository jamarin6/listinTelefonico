<div class="container">
	<br><br>    <!-- tabla con la info del user -->
	<div id="infoUser">
		<div class="row">

			<?php
			  echo "<h1 class='centra'>" . $nombre . " " . $ap1 . " " . $ap2 . " <small>PhoneBook</small></h1><br><br>";

			  echo "<table class='table table-striped'>";
			  	echo "<tr>";
			  		echo "<th><h3>Name</h3></th>";
			  		echo "<th><h3>Number</h3></th>";
			  		echo "<th><h3>Navegation</h3></th>";
		  		echo "<tr>";
			  $arrlength=count($arrayPhones);
			  for ($j=0; $j<$arrlength; $j++) { //posiciones 1:nombre, 2:ap1, 3:ap2
			  	$contactName = $arrayPhones[$j]['nombre'];
			  	$contactNum = $arrayPhones[$j]['numTlf'];
			  	$phoneID = $arrayPhones[$j]['id'];
					echo "<tr id='rowNum" . $phoneID . "'>";
						echo "<td>" . $contactName . "</td>";
						echo "<td>" . $contactNum . "</td>";
						echo "<td><a class='btn btn-warning btn-xs' href='../controllers/editListNum_controller.php?phoneID=" . $phoneID . "'>Edit</a>" . " " . 
								      "<a class='btn btn-danger btn-xs' onclick='borraNum(" . $phoneID . "," . $userID . ")'>Delete</a></td>";
		      echo "</tr>";
			  }
			  echo "</table>";

			  echo "<div class='centra'>
			  			<a class='btn btn-primary' href='../controllers/newListNum_controller.php?userID=" . $userID . "'>Add number</a>" . " " .
			  			"<a class='btn btn-success' href='../controllers/showUser_controller.php?userID=" . $userID . "'>Info "
			  		 . $nombre . "</a>" . " " . "<a class='btn' href='../controllers/users_controller.php'>Back Users</a></div>";

				
			?>
		</div>
	</div><br>
	<div class="row">
		<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
			<a class='btn btn-warning center-block' href='users.php'>&lt;&lt;&lt;PrevPag</a>
		</div>
		<div class="col-xs-12 col-sm-2 col-sm-offset-8 col-md-2 col-md-offset-8 col-lg-2 col-lg-offset-8">
			<a class='btn btn-warning center-block' href='users.php'>NextPag&gt;&gt;&gt;</a>
		</div>
	</div>
</div><br><br><br><br>