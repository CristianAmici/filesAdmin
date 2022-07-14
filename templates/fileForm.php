<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<base href="<?php echo BASE_URL ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="./src/styles/images/iconUsersGreen.png">
	<link rel=" stylesheet" href="./src/styles/css/style.css">
	<script src="./src/js/tableJs.js"></script>
	<title>Tabla de usuarios</title>
</head>

<body>
	<main>
		<header>

			<img class="imgLogo" src="./src/styles/images/logo_ide_footer.png" alt="">

			<a class="link" href="logout">
				<?php
				if (!empty($_SESSION['name_user']))
					echo "Cerrar Sesión"
				?>
			</a>
		</header>
		
			<h1>Bienvenido
				<?php
				echo $_SESSION['name_user'];
				?>
			</h1>
		<!-- Form Insert File -->
		<section id="" class=" ">
			<form class="" action="insertFile" method="POST" enctype="multipart/form-data">
				<h3>Ingresar una imagen:</h3>
				<h5>Nombre del archivo</h5>
				<input type="text" name="nombre" placeholder="Nombre para el archivo">
				<h5>¿Desea Crear el Directorio?</h5>
				<input type="checkbox" name="directorio" id="">
				<input type="text" placeholder="Nombre de la carpeta">

				<h5>Cargar archivo</h5>
				<input type="file" name="newFile">
				<button type="submit" class="btnSuccess">Enviar</button>
			<!-- 	<button id="btnReturn" class="btnReturn">X</button> -->
			</form>
			<?php
				if ($this->msj=="Cargado exitosamente"){
				?>
				<h3 class="safe"><?php echo $this->msj ?></h3>
				<?php 
				} else if($this->msj==""){
				}
				else{
					?>
					<h3 class="warning"><?php echo $this->msj ?></h3>
					<?php
				}
				?>
		</section>

	</main>

</body>

</html>