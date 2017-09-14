<?php 
	if (isset($_POST["paso1"])) {
		$sexo = $_POST["sexo"];
		$edad = $_POST["edad"];

		if ($sexo == "Hombre") {
			$descuento = -100;
		} else if ($sexo == "Mujer") {
			$descuento = -50;
		}

		if ($edad <= 26) {
			$acumulado = $descuento + 150;
		} else if ($edad > 26 ) {
			$acumulado = $descuento - 150;
		}

		$link = mysqli_connect('localhost', 'root', 'root') or die('No se pudo conectar: ' . mysql_error());
		mysqli_select_db($link, "seguro") or die('No se puede conectar a la base de datos');
		mysqli_set_charset($link, "utf8");
		$query = "SELECT * FROM tiposeguro ORDER BY ID";
		$result = mysqli_query($link, $query) or die('Consulta fallida: ' . mysql_error());
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Paso 2</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 	<link href="https://fonts.googleapis.com/css?family=Anton|Asap|Josefin+Sans" rel="stylesheet">
 	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header class="container">
		<p style="background: rgba(50,50,50,0.5); margin:0; box-shadow: 5px 5px 10px #000000;">Tipo de seguro</p>
	</header>
	<div class="container">
		<div id="paso1off">
			<div>
				<a href="paso1.php">1</a>
			</div>
		</div>
		<div id="paso2">
			<div>
				<a href="paso2.php">2</a>
			</div>
		</div>
		<form action="paso3.php" method="post" id="form_paso">
			<div id="acumulado">
				<?php
					echo "ACUMULADO <b>". $acumulado . " € </b><br>";
				?>
			</div> <br>
			<p>TIPO DE SEGURO</p>
			<?php 
				while ($row = mysqli_fetch_array($result)) {
			?>
					<label for="<?=$row["TIPO"]?>">
					<input type="radio" name="seguro" id="<?=$row['TIPO']?>" value="<?=$row['ID']?>"><?=$row["TIPO"]?>
					</label>
			<?php 
				}
			?> <br>		
		<input type="hidden" name="sexo" value="<?=$sexo?>">
		<input type="hidden" name="edad" value="<?=$edad?>">
		<input type="hidden" name="acumulado" value="<?=$acumulado?>">
		<input type="submit" name="paso2" value="SEGUIR">
	</form>
	</div>
</body>
</html>
<?php
	} else{
		header("Location:index.php");
	}
?>



