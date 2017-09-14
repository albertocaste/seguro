<?php 
	if (isset($_POST["precio"])) {
		$nombre = $_POST["nombre"];
		$apellidos = $_POST["apellidos"];
		$fechanac = $_POST["fechanac"];
		$tlf = $_POST["tlf"];
		$email = $_POST["email"];
		$fechacarne = $_POST["fechacarne"];
		$obs = $_POST["obs"];
		$sexo = $_POST["sexo"];
		$edad = $_POST["edad"];
		$seguro = $_POST["seguro"];
		$precio = $_POST["precio"];
		$extras = $_POST["extras"];
		$fechainsc = $_POST["fecha"];


		$link = mysqli_connect('localhost', 'root', 'root') or die('No se pudo conectar: ' . mysql_error());
		mysqli_select_db($link, "seguro") or die('No se puede conectar a la base de datos');
		mysqli_set_charset($link, "utf8");

		$querycliente = "INSERT INTO cliente (NOMBRE, APELLIDOS, FECHA_NACIMIENTO, TELEFONO, EMAIL, FECHA_CARNE, OBSERVACIONES, SEXO, EDAD) VALUES ('$nombre', '$apellidos', '$fechanac', '$tlf', '$email', '$fechacarne', '$obs', '$sexo', '$edad')";
		$resultcliente = mysqli_query($link, $querycliente);
		//var_dump($resultcliente); - Mostrar contenido de objetos.

		$querylastid = "SELECT ID FROM cliente ORDER BY ID DESC LIMIT 1";
		$resultlastid = mysqli_query($link, $querylastid);

		$idcliente = mysqli_fetch_array($resultlastid);
		$idclientefinal = $idcliente["ID"]; // Es necesario especificar la columna del registro


		$querypolizas = "INSERT INTO polizas (FECHA_INSC, ID_CLIENTE, ID_TIPOSEGURO, ID_EXTRAS, PRECIO) VALUES ('$fechainsc', '$idclientefinal', '$seguro', '$extras', '$precio')";
		$resultpolizas = mysqli_query($link, $querypolizas);

		
		if ($resultpolizas) {
			header("Location:final.php");
		}

	}



?>