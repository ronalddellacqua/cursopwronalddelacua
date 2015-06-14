<!DOCTYPE html>
	<html lang="es">
		<head>
			<meta charset="utf-8">
			<meta name="description" content="Ejercicio 1 de programación web">
			<meta content="width=device-width, initial-scale=1, minimum-scale=1" name="viewport">
			<meta name="keywords" content="Programación, web">
			<title>Ejercicio 1 de Programación web</title>
			<link rel="stylesheet" href="misestilos1.css">
		</head>	
		<body>
			<section class="formulario">
<?php
	// Obtener los valores de las variables de HTML
		if (isset($_REQUEST["insertar"]))
			{
			$insertar = $_REQUEST["insertar"];
			$usuario = $_REQUEST["usuario"];
			$clave = $_REQUEST["clave"];
			$correo = $_REQUEST["correo"];	
			// Conectar con la base de datos clientes
			$servername = "localhost";	
			$username = "cursophp";
			$password = "";
			$dbname = "clientes";
			// Crear conexion
			$conn = mysqli_connect ($servername, $username, $password, $dbname);
			// Chequear la conexion
			if (!($conn))
			{
				die ("Conexion fallida: ". mysqli_connect_error());
			}
			$sql = "INSERT INTO usuario (usuario, clave, correo) values ('$usuario', '$clave', '$correo')";
			if (mysqli_query($conn, $sql))
			{
				echo "Usuario creado satisfactoriamente";
				print ("<p><a href='index.html'>volver a inicio</a></p>\n");
				
			}	
			else
			{				
				echo "error:" . "<p>" . mysqli_error($conn) . "</p>";	
				print ("<p><a href='insertar_usuario.php'>Volver al formulario</a></p>\n");
				
			}
			
			mysqli_close ($conn);
			
			}
		else
		
			{
?>				
				<h1>Registrarse:</h1>
				<form action="insertar_usuario.php" name="insertar" method="post">
					<p class="campo">*&nbsp;Usuario:&nbsp;<input type="text" name="usuario" size="10" maxlenght="10" required></p>
					<p class="campo">*&nbsp;Clave:&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="clave" id="miclave" size="10" maxlenght="10" required></p>
					<p class="campo">*&nbsp;Correo:&nbsp;&nbsp;<input type="email" name="correo" id="micorreo" required></p>
					<p class="campo"><input type="submit" name="insertar" value="registrarse"></p>
				</form>
				<p class="campo">Nota: Los datos marcados con (*) deben ser rellenados obligatoriamente</p/>
				<p><a href="index.html">Volver al inicio</a><p/>
			</section>
<?php

			}
?>
		</body>
	</html>	