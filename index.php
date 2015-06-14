<?php 
session_start();
header ('Content-type: text/html; charset=utf-8'); 
include "cabecera.php";
?>
<!-- Producción -->
		<body>
			<div id="agrupar">
				<header id="cabecera">
					<h1><marquee>RONALD DELL'ACQUA PHOTOGRAPHY</marquee></h1> 
				</header>
				<nav id="menu">
					<ul>
						<li>Inicio</li>
						<li>¿Quiénes somos?</li>
						<li><a class="opcionmenu" href="insertar_usuario2.php">Registrarse</a></li>
						<li><a class="opcionmenu" href="acceder_usuario.php">Modificar perfil</a></li>
						<li><a class="opcionmenu" href="mostrar_usuarios.php">Eventos</a></li>
						
					</ul>
				</nav>
				<section id="seccion">
					<article>
						<header>
							<time datetime="2015-04-19T11:18:22" pubdate>Publicado el 19-04-2015</time>
							<h2>Título de la sección principal</h2>
						</header>
						<span>Esta es la <mark>primera</mark> línea de la <cite>sección</cite> principal</span>
						<p>Este es un parráfo de la sección principal</p>
						<p class="texto1">Este es un párrafo con clase</p>
						<figure>
							   <img src="bebe14.jpg">
						              <figcaption>
									      Nombre del bebe
									  </figcaption>
						</figure>
						<footer>
						    <address>
							    <a href="http://www.dzoom.org.es/">Dzoom</a>
							</address>
							<small>pie de pagina del articulo</small>
					    </footer>
					</article>
				</section>
				<aside id="columna">
				   <h3>primer mensaje de la columna lateral</h3>
				   <h3>segundo mensaje de la columna lateral</h3>
			    </aside>
				<footer id="pie">
				<small>Derechos reservados</small>
			    </footer>
				
			</div>
		</body>
	</html>
