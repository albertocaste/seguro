<?php 
	if (isset($_POST["datos"])) {
		$nombre = $_POST["nombre"];
		$apellidos = $_POST["apellidos"];
		$dianac = $_POST["dianac"];
		$mesnac = $_POST["mesnac"];
		$anonac = $_POST["anonac"];
		$tlf = $_POST["tlf"];
		$email = $_POST["email"];
		$compemail = $_POST["compemail"];
		$diacarne = $_POST["diacarne"];
		$mescarne = $_POST["mescarne"];
		$anocarne = $_POST["anocarne"];
		$obs = $_POST["obs"];
		$sexo = $_POST["sexo"];
		$edad = $_POST["edad"];
		$seguro = $_POST["seguro"];
		$precio = $_POST["precio"];
		$extras = $_POST["extras"];

		$arrayextras = explode(",", $extras);
		$fechanac = $dianac . "/" . $mesnac . "/" . $anonac;
		$fechacarne = $diacarne . "/" . $mescarne . "/" . $anocarne;

		$link = mysqli_connect('localhost', 'root', 'root') or die('No se pudo conectar: ' . mysql_error());
		mysqli_select_db($link, "seguro") or die('No se puede conectar a la base de datos');
		mysqli_set_charset($link, "utf8");

		$querytiposeguro = "SELECT * FROM tiposeguro WHERE ID = '$seguro'";
		$resulttiposeguro = mysqli_query($link, $querytiposeguro) or die('Consulta fallida: ' . mysql_error());

		

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Datos</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 	<link href="https://fonts.googleapis.com/css?family=Anton|Asap|Josefin+Sans" rel="stylesheet">
 	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header class="container">
		<p style="background: rgba(50,50,50,0.5); margin:0; box-shadow: 5px 5px 10px #000000;">Seguro de coche</p>
	</header>

	<div class="container">
			<div id="paso1off">
				<div>
					<a href="paso1.php">1</a>
				</div>
			</div>
			<div id="paso2off">
				<div>
					<a href="paso2.php">2</a>
				</div>
			</div>
			<div id="paso3off">
				<div>
					<a href="paso3.php">3</a>
				</div>
			</div>
			<div id="paso4off">
				<div>
					<a href="paso4.php">4</a>
				</div>
			</div>
			<div id="paso5">
				<div>
					<a href="precio.php">5</a>
				</div>
			</div>

		<?php 
			if ($email == $compemail) {
		?>
			<form action="subepoliza.php" method="post" id="form_paso">

				<div id="preciofinal">
					<b>PRECIO FINAL: <?=$precio?> € </b>
				</div> <br>
				<p><b>Nombre: </b><?=$nombre?></p>
				<p><b>Sexo: </b><?=$sexo?></p>			
				<p><b>Apellidos: </b><?=$apellidos?></p>
				<p><b>Fecha de nacimiento: </b><?=$dianac?> de <?=$mesnac?> de <?=$anonac?></p>
				<p><b>Teléfono: </b><?=$tlf?></p>
				<p><b>Email: </b><?=$email?></p>
				<p><b>Fecha de expedición: </b><?=$diacarne?> de <?=$mescarne?> de <?=$anocarne?></p>
				<p><b>Observaciones: </b><?=$obs?></p>
				<p><b>Tipo de seguro: </b>
					<?php 
						while ($rowtiposeguro = mysqli_fetch_array($resulttiposeguro)) {
							echo $rowtiposeguro["TIPO"] . "<br>"; 
						}
					?></p>
				</p>
				<p><b>Extras: </b>
					<?php 
						foreach ($arrayextras as $key => $itemextras) {
							$queryselectedextras = "SELECT * FROM extras WHERE ID = '$itemextras'";
							$resultselectedextras = mysqli_query($link, $queryselectedextras) or die('Consulta fallida: ' . mysql_error());
							$rowselectedextras = mysqli_fetch_array($resultselectedextras);
							echo $rowselectedextras["TIPO"] . "<br>";
						}
					?></p>

				<input type="checkbox" required> Conformidad. <br>
				<input type="checkbox" required> Acepto la polótica de privacidad. <br> <br>
				
				<input type="hidden" name="nombre" value="<?=$nombre?>">
				<input type="hidden" name="apellidos" value="<?=$apellidos?>">
				<input type="hidden" name="edad" value="<?=$edad?>">
				<input type="hidden" name="sexo" value="<?=$sexo?>">
				<input type="hidden" name="fechanac" value="<?=$fechanac?>">
				<input type="hidden" name="tlf" value="<?=$tlf?>">
				<input type="hidden" name="email" value="<?=$email?>">
				<input type="hidden" name="fechacarne" value="<?=$fechacarne?>">
				<input type="hidden" name="obs" value="<?=$obs?>">
				<input type="hidden" name="fecha" value="<?=date("H:i:s d/m/Y") ?>">
				<input type="hidden" name="seguro" value="<?=$seguro?>">
				<input type="hidden" name="extras" value="<?=$extras?>">
				<input type="hidden" name="precio" value="<?=$precio?>">


				<input type="submit" name="precio" id="precio" value="ACEPTAR" >
			</form> 
		</div>
		<?php 
		} else if ($email != $compemail) {
			echo "Los emails no coinciden";
		}
		?>
</body>
</html>

<?php 
	}
 ?>