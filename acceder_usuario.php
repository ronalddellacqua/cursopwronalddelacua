<?php 
   	/* Crea una sesion o reanuda la actual basada en un identificador de sesion
		pasado mediante una peticion PEG o POST, o pasado mediante una cookie */
		
	
	session_start(); # Inicializa o carga las variables de sesión
	header ('Content-type: text/html; charset=utf-8'); # Ajusta el programa para trabajar con ñ y acentos 
	include "cabecera.php";
?>
		
	<!-- Define el cuerpo de un documento. Dentro del cuerpo del documento se incluye todo el contenido del mismo, por ej. textos, enlaces, imágenes, tablas, etc.-->
	
		<body>
			<section class="formulario">

<?php

	$error = false;
	$errores = array ("usuario"=>"", "clave"=>"", "correo"=>"");

		
	
	if (isset($_REQUEST['acceder']))
		
	/*  Permite saber si una variable está definida. La función isset recibe como parámetro 
		la variable a verificar, devolviendo un valor TRUE si la variable está definida
		de lo contrario devuelve FALSE */
	
		{

		$acceder = $_REQUEST['acceder'];	
		$usuario = $_REQUEST['usuario'];
		$clave = $_REQUEST['clave'];

		include "validarusuario.php";
		include "validarclave.php";
		}

	if (isset($_REQUEST['acceder']) && !($error))
		{

		include "conexionbasedatos.php";
		
		$sql = "SELECT * FROM usuario WHERE usuario = '$usuario' and clave = '$clave'";

  		$result = mysqli_query($conn, $sql) or die ("Fallo al acceder a la cuenta del usuario");

		if (mysqli_num_rows($result) > 0) 
			{

   			$_SESSION['registro_seleccionado'] = mysqli_fetch_assoc($result);

			include "modificar_usuario_incompleto.php";

			}
		else
			{
			echo "Usuario o clave inválida";
			print ("<p><a href='acceder_usuario.php'>Volver al formulario</a></p>\n"); 
			}
				
		mysqli_free_result($result);
			
		mysqli_close($conn);

		}
	else
		{

?>			
			<h1>Modificar la cuenta de usuario:</h1>
			<form action="acceder_usuario.php" name="acceder" method="post">

			<p class="etiqueta">Usuario:*</p>
				<p class="campo"><input type="text" name="usuario" size="10" maxlenght="10" 

<?php

	if (isset($_REQUEST['acceder']))
		print ("value='$usuario'></p>");

	else	
		print ("></p>");

	if ($errores["usuario"] != "")
		print "<p>Error: {$errores['usuario']}</p>";
?>										
					
				<p class="etiqueta">Clave:*</p>				
				<p class="campo"><input type="password" name="clave" id="miclave" size="10" maxlenght="10" 

<?php
		
	if (isset($_REQUEST['acceder']))
		print ("value='$clave'></p>");

	else 
		print ("></p>");
		
	if ($errores["clave"] != "")
		print "<p>Error {$errores['clave']}</p>";
?>										
				<p class="campo"><input type="submit" name="acceder" value="Acceder"></p>
			</form>
				<p class="campo">Nota: Los datos marcados con (*) deben ser rellenados obligatoriamente.</p>
				<p class="campo"><a href="index.php">Volver al inicio</a></p>		
		</section>

<?php	
			}
?>

		</body>
	</html>					
