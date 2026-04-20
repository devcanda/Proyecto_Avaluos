<?php 
 include_once '../model/usuario.php'; 
 include_once '../utilidades/utilidades.php';
 session_start();   
 if(!isset($_SESSION) || empty($_SESSION))
 {
     header ("Location: ../index.php");
 }
$Usuario = unserialize($_SESSION['usuario']);
$resul = usuario::Ultimos10Creados();

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Formulario Avaluo</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
			crossorigin="anonymous"
		/>
		<link
			rel="stylesheet"
			href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
		/>
		<link
			rel="stylesheet"
			type="text/css"
			href="../css/estilos.css"
			media="screen"
		/>
	</head>

	<body>
		
<?php include'./nav.php';?>
<form id="formFiltrar" method="post">
		<input type="text" class="invisible" name="opc" id="opc" value='4'/>
			<div class="container cont">

				<div class="row mt-5">
					<div class="col-12">
						<p>Panel de Filtrado de Usuarios</p>
						<hr />
					</div>
				</div>

				<div class="row">
					<div class="col-12 col-sm-6 mt-3">
						<label for="Solicitante" class="form-label">Nombre:</label>
						<input
							type="text"
							class="form-control"
							name="nombre"
							id="nombre"
							placeholder="Nombre"
						/>
					</div>				
					<div class="col-12 col-sm-6 mt-3">
						<label for="NumeroDocumento" class="form-label">Email:</label>
						<input
							type="text"
							class="form-control"
							name="correo"
							id="correo"
							placeholder="Email"
						/>
					</div>
				</div>
				
				<div class="row">
					<div class="col-12 col-sm-3 mt-3">
							<label for="FechaDelAvalio" class="form-label"
									>Fecha creación desde:</label
								>
							<input
								type="date"
								class="form-control"
								name="start"
								id="start"
								placeholder="Fecha"
							/>
					</div>

					<div class="col-12 col-sm-3 mt-3">
							<label for="FechaDelAvalio" class="form-label"
								>Fecha creación hasta:</label
								>
							<input
								type="date"
								class="form-control"
								name="end"
								id="end"
								placeholder="Fecha"
							/>
					</div>

					<div class="col-12 col-sm-2" style="margin-top:46px;">
							<button id="Filtar" class="btn btn-primary col-12" type="button">Filtrar <i class="bi bi-search text-light"></i></button>
					</div>
					<div class="col-12 col-sm-2" style="margin-top:46px;">
							<button class="btn btn-primary col-12" type="reset" >Limpiar <i class="bi bi-trash text-light"></i></button>
					</div>
					<div class="col-12 col-sm-2" style="margin-top:46px;">
							<button id="Crear" class="btn btn-primary col-12" type="button" >Crear <i class="bi bi-file-plus text-light"></i></button>
					</div>
					
				</div>
				
				<div class="row mt-5">
					<div class="col-12">
						<p>Salida de Datos</p>
						<hr />
					</div>
				</div>

				<div class="row mt-3">
					<div class="table-responsive">
					<table class="table">
					<thead>
						<tr>
						<th class='text-center' scope="col">#</th>
						<th scope="col">Nombre</th>
						<th scope="col">Correo</th>
						<th class='text-center' scope="col">Fecha Creación</th>
						<th class='text-center' scope="col">Editar</th>
						<th class='text-center' scope="col">Eliminar</th>
						</tr>
					</thead>
					<tbody id="data-table">
					<?php
					     $i=1; 
						foreach($resul as $item)
						{
								echo "<tr>
								<td class='text-center' scope='row'>".$i."</td>
								<td>".$item->nombre."</td>								
								<td>".$item->correo."</td>
								<td class='text-center'>".utilidades::formatearFecha($item->fechaRegistro)."</td>
								<td class='text-center'><a href='#' data-id='$item->id' data-toggle='editar'><img width='25' height='20' src='../file/svg/edit-svgrepo-com.svg'></a></td>
								<td class='text-center'><a href='#' data-id='$item->id' data-toggle='eliminar'><img width='25' height='20' src='../file/svg/x-svgrepo-com.svg'></a></td>
							  </tr>";
							  $i++;
						}
					?>
					
					</tbody>
					</table>
					</div>
				</div>


			</div>
</form>




	



		<div id="spinner" class="overlay ocultar">
			<div class="center">
				<div class="spinner"></div>
			</div>
		</div>

       <?php include './cambioClave.php'  ?>

		<script
			src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
			integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
			crossorigin="anonymous"
		></script>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
			integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
			crossorigin="anonymous"
		></script>
		<script
			src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"
			integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ="
			crossorigin="anonymous"
		></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="../global/js/constante.js"></script>
		<script src="../js/usuarios.js"></script>
		<script src="../js/eventosheader.js"></script>
	</body>
</html>

