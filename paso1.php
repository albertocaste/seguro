<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Paso 1</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 	<link href="https://fonts.googleapis.com/css?family=Anton|Asap|Josefin+Sans" rel="stylesheet"> 
 	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header class="container">
			<p style="background: rgba(50,50,50,0.5); margin:0; box-shadow: 5px 5px 10px #000000;">Datos</p>
	</header>
	<div class="container">
		<div id="paso1">
			<div>
				<a href="paso1.php">1</a>
			</div>
		</div>
		<form action="paso2.php" method="post" id="form_paso">
			<p>SEXO</p>
				<label for="hombre">
				<input type="radio" name="sexo" id="hombre" value="Hombre"> Hombre
				</label>
				<label for="mujer">
				<input type="radio" name="sexo" id="mujer" value="Mujer"> Mujer
				</label>

				<br><br>
			<p>EDAD</p>
				<input type="text" name="edad" id="edad" placeholder="¿Cuántos años tienes?" class="form-control"> <br>
				<input type="submit" name="paso1" id="enviar" value="SEGUIR">
		</form>	
	</div>
	
</body>
</html>