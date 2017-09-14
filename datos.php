<?php 
	if (isset($_POST["paso3"])) {
		$sexo = $_POST["sexo"];
		$edad = $_POST["edad"];
		$seguro = $_POST["seguro"];
		$acumulado2 = $_POST["acumulado2"];
		$extras = $_POST["extras"];	

		$link = mysqli_connect('localhost', 'root', 'root') or die('No se pudo conectar: ' . mysql_error());
		mysqli_select_db($link, "seguro") or die('No se puede conectar a la base de datos');
		mysqli_set_charset($link, "utf8");

		$precioselectedextras = 0;
		foreach ($extras as $i => $itemextras) {
			$queryselectedextras = "SELECT * FROM extras WHERE ID = '$itemextras'";
			$resultselectedextras = mysqli_query($link, $queryselectedextras) or die('Consulta fallida: ' . mysql_error());
			$rowextras = mysqli_fetch_array($resultselectedextras);
			$precioselectedextras += $rowextras["PRECIO"];
		}

		$stringextras = implode(",", $extras);
		echo $stringextras;

		$precio = $acumulado2 + $precioselectedextras;
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
		<p style="background: rgba(50,50,50,0.5); margin:0; box-shadow: 5px 5px 10px #000000;">Datos personales</p>
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
			<div id="paso4">
				<div>
					<a href="paso4.php">4</a>
				</div>
			</div>
	<form action="precio.php" method="post" id="form_paso">
		<p>NOMBRE</p>
		<input type="text" name="nombre" id="nombre" placeholder="Escribe aquí tú nombre"><p></p>
		<p>APELLIDOS</p>
		<input type="text" name="apellidos" id="apellidos" placeholder="Escribe aquí tus apellidos"> <p></p>
		<p>FECHA DE NACIMIENTO</p>
		<select name="dianac" id="dia">
			<?php 
				for ($i=1; $i <= 31; $i++) { 
					echo "<option value='".$i."'>".$i."</option>";
				} 
			 ?>
		</select>
        <select name="mesnac" id="mes">
        	<option value="Enero">Enero</option>
        	<option value="Febrero">Febrero</option>
        	<option value="Marzo">Marzo</option>
        	<option value="Abril">Abril</option>
        	<option value="Mayo">Mayo</option>
        	<option value="Junio">Junio</option>
        	<option value="Julio">Julio</option>
        	<option value="Agosto">Agosto</option>
        	<option value="Septiembre">Septiembre</option>
        	<option value="Octubre">Octubre</option>
        	<option value="Noviembre">Noviembre</option>
        	<option value="Diciembre">Diciembre</option>
		</select>
		<select name="anonac">
			<?php 
				for ($y=2017; $y >= 1915; $y--) { 
					echo "<option value='".$y."'>".$y."</option>";
				} 
			 ?>		
		</select> <br> <br>
		<p>TELÉFONO</p>
		<input type="text" name="tlf" id="tlf" placeholder="Escribe aquí tú número"> <p></p>
		<p>EMAIL</p>
		<input type="email" name="email" id="email" placeholder="Escribe aquí tú email"> <br>
		<input type="email" name="compemail" id="compemail" placeholder="Repite el email"> <p></p>
		<p>FECHA EXPEDICIÓN CARNÉ</p> 
		<select name="diacarne" id="dia">
			<?php 
				for ($i=1; $i <= 31; $i++) { 
					echo "<option value='".$i."'>".$i."</option>";
				} 
			 ?>
		</select>
        <select name="mescarne" id="mes">
        	<option value="Enero">Enero</option>
        	<option value="Febrero">Febrero</option>
        	<option value="Marzo">Marzo</option>
        	<option value="Abril">Abril</option>
        	<option value="Mayo">Mayo</option>
        	<option value="Junio">Junio</option>
        	<option value="Julio">Julio</option>
        	<option value="Agosto">Agosto</option>
        	<option value="Septiembre">Septiembre</option>
        	<option value="Octubre">Octubre</option>
        	<option value="Noviembre">Noviembre</option>
        	<option value="Diciembre">Diciembre</option>
		</select>
		<select name="anocarne">
			<?php 
				for ($y=2017; $y >= 1915; $y--) { 
					echo "<option value='".$y."'>".$y."</option>";
				} 
			 ?>
 		</select> <br> <br>
 		<p>OBSEVACIONES</p>
		<input type="textarea" name="obs" id="textarea" placeholder="Escribe aquí cualquier comentario que quieras añadir..."> <br> <br>
		<input type="hidden" name="edad" value="<?=$edad?>">
		<input type="hidden" name="sexo" value="<?=$sexo?>">
		<input type="hidden" name="seguro" value="<?=$seguro?>">
		<input type="hidden" name="extras" value="<?=$stringextras?>">
		<input type="hidden" name="precio" id="precio" value="<?=$precio?>">
		
		<input type="submit" id="datos" name="datos" value="PRECIO FINAL">
	</form>
	</div>
	
</body>
</html>
<?php 
	}
?>



