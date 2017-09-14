<?php 
	$link = mysqli_connect('localhost', 'root', 'root') or die('No se puede conectar: ' . mysql_error());
	mysqli_select_db($link, "seguro") or die('No se puede conectar a la base de datos');
	mysqli_set_charset($link, "utf8");
	$querypolizas = "SELECT * FROM polizas ORDER BY ID DESC";
	$resultpolizas = mysqli_query($link, $querypolizas);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lista de clientes</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 	<link href="https://fonts.googleapis.com/css?family=Anton|Asap|Josefin+Sans" rel="stylesheet">
 	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<table class="table table-striped table-bordered">
			<tr>
				<th>ID</th>
				<th>FECHA INSCRIPCIÓN</th>
				<th>CLIENTE</th>
				<th>TIPO DE SEGURO</th>
				<th>EXTRAS</th>
				<th>PRECIO</th>
			</tr>

			<tr>
				<?php 
				 ?>
				<td></td>
			</tr>
		</table>

	</div>
	
</body>
</html>