<div class="container">
	<h1 class="text-center"><?=$seccion?></h1>
			<nav>
				<a href="index.php" class="btn btn-default	<?php if ($seccion == "Home") { echo "btn-primary"; } ?>">Home</a> <!-- Clase a la hora de pinchar en el enlace -->
				<a href="#" class="btn btn-default">Sección</a>
				<a href="#" class="btn btn-default">Sección</a>
				<a href="subevideo.php" class="btn btn-default <?php if ($seccion == "Sube video") { echo "btn-primary"; } ?>">Sube video/a>
			</nav>
</div>