<?php 
   	session_start(); 
	header ('Content-type: text/html; charset=utf-8');  
	include "cabecera.php";

        print ("<body>\n");
        print ("<section class='formulario'>\n");

	include "conexionbasedatos.php";	
	$sql = "SELECT * FROM usuario ORDER BY nombres ASC";
	$result = mysqli_query($conn, $sql) or die ("Fallo al acceder a la tabla usuario");
	if (mysqli_num_rows($result) > 0) 
		{
		print ("<h3>Eventos - usuario:</h3>\n");
                for ($i=0; $i<mysqli_num_rows($result); $i++)
			{	
			$row = mysqli_fetch_assoc($result);
			print ("<p><a href='agregar_evento.php?IdUsuario=" . $row['usuario'] . "' title='Agregar evento'>
                                   <img border='0' src='imagenes/agregar.jpeg'></a>&nbsp;&nbsp;&nbsp;"
                                    . $nombres = $row['nombres'] . $apellidos = $row['apellidos'] . "</p>\n");
			}
		}
	else
		{
		echo "Error al acceder la tabla usuario";
		print ("<p><a href='index.php.php'>Volver al inicio</a></p>\n"); 
		}
				
	mysqli_free_result($result);
		
	mysqli_close($conn);

	print ("</section>\n");
	print ("</body>\n");
	print ("</html>\n");
?>
