<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include "../imports.php" ?>
	</head>
	<body>
		<?php 
			include "header.php";
		?>

		<div class="container margenVista">
			<?php 
				include "notification.php";
				include $view;
			?>	
		</div>

		<?php
			include "footer.php";
		?>
	</body>
</html>