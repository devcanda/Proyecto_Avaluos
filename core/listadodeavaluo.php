<?php 
 include_once '../model/usuario.php';
 include_once '../model/avaluoentity.php';
 include_once '../utilidades/utilidades.php';
 session_start();   
 if(!isset($_SESSION) || empty($_SESSION))
 {
     header ("Location: ../index.php");
 }
$Usuario = unserialize($_SESSION['usuario']);
$resul = avaluoenntity::Ultimos10Creados();

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
						<p>Panel de Filtrado de Avalúos</p>
						<hr />
					</div>
				</div>

				<div class="row">
					<div class="col-12 col-sm-4 mt-3">
						<label for="Solicitante" class="form-label">Solicitante:</label>
						<input
							type="text"
							class="form-control"
							name="Solicitante"
							id="Solicitante"
							placeholder="Solicitante"
						/>
					</div>
					<div class="col-12 col-sm-4 mt-3">
								<label for="TipoDeDocumento" class="form-label"
									>Tipo de documento:</label
								>
								<select
									id="TipoDeDocumento"
									name="TipoDeDocumento"
									class="form-select"
								>
									<option value="0" selected>Seleccione</option>
									<option value="1">(RC) Registro Civil</option>
									<option value="2">(CC) Cédula Ciudadanía</option>
									<option value="3">(CE) CédulaExtranjería</option>
									<option value="4">(P) Pasaporte</option>
									<option value="5">(TI) Tarjeta de Identidad</option>
									<option value="6">(AI) Adulto sin Identificación</option>
									<option value="7">(MI) Menor sin Identificación</option>
									<option value="8">
										(NIT) Número de Identificación Tributaria
									</option>
									<option value="9">(PEP) Permiso Especial de Permanencia</option>
									<option value="10">(PT) Permiso Temporal</option>
								</select>
					</div>
					<div class="col-12 col-sm-4 mt-3">
						<label for="NumeroDocumento" class="form-label">Número de Documento:</label>
						<input
							type="text"
							class="form-control"
							name="NumeroDocumento"
							id="NumeroDocumento"
							placeholder="Número de Documento"
						/>
					</div>
				</div>
				
				<div class="row">
					<div class="col-12 col-sm-4 mt-3">
							<label for="FechaDelAvalio" class="form-label"
									>Fecha del avalúo desde:</label
								>
							<input
								type="date"
								class="form-control"
								name="start"
								id="start"
								placeholder="Fecha"
							/>
					</div>

					<div class="col-12 col-sm-4 mt-3">
							<label for="FechaDelAvalio" class="form-label"
								>Fecha del avalúo hasta:</label
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
						<th scope="col">Solicitante</th>
						<th scope="col">Número de Documento</th>
						<th class='text-center' scope="col">Fecha del avalúo</th>
						<th class='text-center' scope="col">Editar</th>
						<th class='text-center' scope="col">Exportar</th>
						</tr>
					</thead>
					<tbody id="data-table">
					<?php
					     $i=1; 
						foreach($resul as $item)
						{
								echo "<tr>
								<td class='text-center' scope='row'>".$i."</td>
								<td>".$item->Solicitante."</td>								
								<td>".utilidades::FormatearTipoDocumento($item->TipoDeDocumento,$item->NumeroDocumento)."</td>
								<td class='text-center'>".utilidades::formatearFecha($item->FechaDelAvalio)."</td>
								<td class='text-center'><a href='#' data-id='$item->id' data-toggle='editar'><img width='25' height='20' src='../file/svg/edit-svgrepo-com.svg'></a></td>
								<td class='text-center'><a href='#' data-id='$item->id' data-toggle='exportar'><img width='25' height='20' src='../file/svg/pdf-svgrepo-com.svg'></a></td>
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
		<script src="../js/listadoAvaluo.js"></script>
		<script src="../js/eventosheader.js"></script>
	</body>
</html>

