<?php 	
	if (isset($_POST["paso2"])) {
		$sexo = $_POST["sexo"];
		$edad = $_POST["edad"];
		$seguro = $_POST["seguro"];
		$acumulado = $_POST["acumulado"];

	$link = mysqli_connect('localhost', 'root', 'root') or die('No se pudo conectar: ' . mysql_error());
	mysqli_select_db($link, "seguro") or die('No se puede conectar a la base de datos');
	mysqli_set_charset($link, "utf8");
	$queryextras = "SELECT * FROM extras WHERE ID_TIPOSEGURO = '$seguro'";
	$resultextras = mysqli_query($link, $queryextras) or die('Consulta fallida: ' . mysql_error());

	$querytiposeguro = "SELECT * FROM tiposeguro WHERE ID = '$seguro'";
	$resulttiposeguro = mysqli_query($link, $querytiposeguro) or die('Consulta fallida: ' . mysql_error());
	$rowtiposeguro =  mysqli_fetch_array($resulttiposeguro);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Seguros</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 	<link href="https://fonts.googleapis.com/css?family=Anton|Asap|Josefin+Sans" rel="stylesheet">
 	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header class="container">
			<p style="background: rgba(50,50,50,0.5); margin:0; box-shadow: 5px 5px 10px #000000;">Extras</p>
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
			<div id="paso3">
				<div>
					<a href="paso3.php">3</a>
				</div>
			</div>
	<form action="datos.php" method="post" id="form_paso">
		
		<div id="acumulado">
		<?php 
			$acumulado2 = $rowtiposeguro["PRECIO"] + $acumulado; 
			echo "ACUMULADO <b>". $acumulado2 . " € </b><br>";
		?>
		</div> <br>

		<p>EXTRAS</p>
		<?php 
			while ($rowextras = mysqli_fetch_array($resultextras)) {
		?>
				<label for="<?=$rowextras["TIPO"]?>">
				<input type="checkbox" name="extras[]" id="<?=$rowextras['TIPO']?>" value="<?=$rowextras['ID']?>"> <?=$rowextras["TIPO"]?>
				</label> <br>
		<?php	
			}
		?>
		
		<input type="hidden" name="edad" value="<?=$edad?>">
		<input type="hidden" name="sexo" value="<?=$sexo?>">
		<input type="hidden" name="seguro" value="<?=$seguro?>">
		<input type="hidden" name="acumulado2" value="<?=$acumulado2?>">

		<input type="submit" name="paso3" id="seguir" value="SEGUIR">
	</form>
	</div>
</body>
</html>

<?php 
	} else{
			header("Location:index.php");
	}

?>