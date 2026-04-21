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
 
$id = $_GET['id'];
$avaluo = new avaluoenntity();
$avaluo->get($id);

$TipoDeDocumentoLista = array(
    "0" => "Seleccione",
    "1" => "(RC) Registro Civil",
    "2" => "(CC) Cédula Ciudadanía",
    "3" => "(CE) CédulaExtranjería",
    "4" => "P) Pasaporte",
    "5" => "(TI) Tarjeta de Identidad",
    "6" => "(AI) Adulto sin Identificación",
    "7" => "(MI) Menor sin Identificación",
    "8" => "(NIT) Número de Identificación Tributaria",
    "9" => "(PEP) Permiso Especial de Permanencia",
    "10" => "(PT) Permiso Temporal"                            
   ); 

   $pregunta = array(
    "0"=> "Seleccione",
    "1"=> "SI",
    "2"=> "NO",
   );



?>


<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Formulario Avaluo</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">		
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

		<a id="btnG" class="btn-flotante">Guardar</a>


		
		<form id="form1" method="post" enctype="multipart/form-data" >
		<input type="text" class="invisible" name="opc" id="opc" value='2'/>
		<input type="text" class="invisible" name="id" id="id" value='<?php echo $avaluo->id;?>'/>
		<input type="text" class="invisible" name="ImgDireccion" id="ImgDireccion" value='<?php echo $avaluo->ImgDireccion;?>'/>
		<input type="text" class="invisible" name="GeoLocalizacionImg2" id="GeoLocalizacionImg2" value='<?php echo $avaluo->GeoLocalizacionImg;?>'/>
		<input type="text" class="invisible" name="CroquisImg2" id="CroquisImg2" value='<?php echo $avaluo->CroquisImg;?>'/>
			<div class="container cont">
				<div class="row mt-5">
					<div class="col-12">
						<p>DIRECCIÓN</p>
						<hr />
					</div>
				</div>
				<div class="row mt-3">
					<div class="col-12 col-sm-4">
						<label for="Departamento" class="form-label">Departamento:</label>
						<input
							type="text"
							class="form-control"
							name="Departamento"
							id="Departamento"
							placeholder="Departamento"
                            value="<?php echo $avaluo->Departamento; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="Municipio" class="form-label">Municipio</label>
						<input
							type="text"
							class="form-control"
							name="Municipio"
							id="Municipio"
							placeholder="Municipio"
                            value="<?php echo $avaluo->Municipio; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="Barrio" class="form-label">Barrio</label>
						<input
							type="text"
							class="form-control"
							name="Barrio"
							id="Barrio"
							placeholder="Barrio"
                            value="<?php echo $avaluo->Barrio; ?>"
						/>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12">
						<label for="Direccion" class="form-label">Dirección</label>
						<input
							type="text"
							class="form-control"
							name="Direccion"
							id="Direccion"
							placeholder="Dirección"
                            value="<?php echo $avaluo->Direccion; ?>"
						/>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-4">
						<label for="CodigoDane" class="form-label">Código DANE</label>
						<input
							type="text"
							class="form-control"
							name="CodigoDane"
							id="CodigoDane"
							placeholder="Código DANE"
                            value="<?php echo $avaluo->CodigoDane; ?>"
						/>
					</div>
				</div>

				<div class="row mt-5 justify-content-center align-item-center">
					<div class="text-center">
						<input id="archivo" name="archivo" type="file" accept="image/*" />
						<label for="archivo" class="area-file">
							<img
								class="alinear"
								src="../file/svg/cloud_upload_black_24dp.svg"
								alt=""
							/>Seleccione Imagen
						</label>
					</div>

					
					<div class="text-center">
					    <a id="img-preview" style="cursor: pointer">
                            <?php if ($avaluo->ImgDireccion==null || $avaluo->ImgDireccion==''): ?>
                                <img id="blah" class="viewImg" src="../file/img/no-image.png"/>
                            <?php else: ?>
                                <img id="blah" class="viewImg" src="<?php echo utilidades::getUrlBase().$avaluo->ImgDireccion; ?>"/>
                            <?php endif ?>
                        </a>
					</div>
					
					<div class="text-center">
						<button
							id="eliminar1"
							type="button"
							class="<?php if($avaluo->ImgDireccion==null || $avaluo->ImgDireccion=='') echo 'btn btn-primary ocultar'; else echo 'btn btn-primary'; ?>"
						>
							X
						</button>
					</div>
				</div>
			</div>

			<div class="container mt-5">

				<div class="row mt-5">
					<div class="col-12">
						<p>POSICIÓN COORDENADA GEOESTACIONARIA</p>
						<hr />
					</div>					
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="Latitud" class="form-label">Latitud:</label>
						<input
							type="text"
							class="form-control"
							name="Latitud"
							id="Latitud"
							placeholder="Latitud"
                            value="<?php echo $avaluo->Latitud; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="Longitud" class="form-label">Longitud:</label>
						<input
							type="text"
							class="form-control"
							name="Longitud"
							id="Longitud"
							placeholder="Longitud"
                            value="<?php echo $avaluo->Longitud; ?>"
						/>
					</div>
					
				</div>

				<div class="row mt-5">
					<div class="text-center">
						<input id="GeoLocalizacionImg" name="GeoLocalizacionImg" type="file" accept="image/*" />
						<label for="GeoLocalizacionImg" class="area-file">
							<img
								class="alinear"
								src="../file/svg/cloud_upload_black_24dp.svg"
								alt=""
							/>Seleccione Imagen
						</label>
					</div>
					
					<div class="text-center">

                    <a id="img-preview2" style="cursor: pointer">
                            <?php if ($avaluo->GeoLocalizacionImg==null || $avaluo->GeoLocalizacionImg==''): ?>
                                <img id="blah2" class="viewImg" src="../file/img/no-image.png"/>
                            <?php else: ?>
                                <img id="blah2" class="viewImg" src="<?php echo utilidades::getUrlBase().$avaluo->GeoLocalizacionImg; ?>"/>
                            <?php endif ?>
                    </a>					
					</div>
					
					<div class="text-center">
						<button
							id="eliminar2"
							type="button"
							class="<?php if($avaluo->GeoLocalizacionImg==null || $avaluo->GeoLocalizacionImg=='') echo 'btn btn-primary ocultar'; else echo 'btn btn-primary'; ?>"
						>
							X
						</button>
					</div>
				</div>


			</div>

			<div class="container mt-5">
				<div class="row mt-5">
					<div class="col-12">
						<p>GENERAL</p>
						<hr />
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="FechaDeVisita" class="form-label"
							>Fecha de visita:</label
						>
						<input
							type="date"
							class="form-control"
							name="FechaDeVisita"
							id="FechaDeVisita"
							placeholder="Fecha"
                            value="<?php echo $avaluo->FechaDeVisita; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="FechaDelAvalio" class="form-label"
							>Fecha del avalúo:</label
						>
						<input
							type="date"
							class="form-control"
							name="FechaDelAvalio"
							id="FechaDelAvalio"
							placeholder="Fecha"
                            value="<?php echo $avaluo->FechaDelAvalio; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="TipoDeAvaluo" class="form-label">Tipo de avalúo:</label>
						<input
							type="text"
							class="form-control"
							name="TipoDeAvaluo"
							id="TipoDeAvaluo"
							placeholder="Tipo de avalúo"
                            value="<?php echo $avaluo->TipoDeAvaluo; ?>"
						/>
					</div>
				</div>

				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="FinalidadDelAvaluo" class="form-label"
							>Finalidad del avalúo:</label
						>
						<input
							type="text"
							class="form-control"
							name="FinalidadDelAvaluo"
							id="FinalidadDelAvaluo"
							placeholder="Finalidad del avalúo"
                            value="<?php echo $avaluo->FinalidadDelAvaluo; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="ObjetoDelAvaluo" class="form-label"
							>Objeto del avalúo:</label
						>
						<input
							type="text"
							class="form-control"
							name="ObjetoDelAvaluo"
							id="ObjetoDelAvaluo"
							placeholder="Objeto del avalúo"
                            value="<?php echo $avaluo->ObjetoDelAvaluo; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="Entidad" class="form-label">Entidad:</label>
						<input
							type="text"
							class="form-control"
							name="Entidad"
							id="Entidad"
							placeholder="Entidad"
                            value="<?php echo $avaluo->Entidad; ?>"
						/>
					</div>
				</div>

				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="Solicitante" class="form-label">Solicitante:</label>
						<input
							type="text"
							class="form-control"
							name="Solicitante"
							id="Solicitante"
							placeholder="Solicitante"
                            value="<?php echo $avaluo->Solicitante; ?>"
						/>
					</div>

					<div class="col-12 col-sm-4">
						<label for="TipoDeDocumento" class="form-label"
							>Tipo de documento:</label
						>
                        <select
							id="TipoDeDocumento"
							name="TipoDeDocumento"
							class="form-select"
						>
                        <?php
                          

                           foreach($TipoDeDocumentoLista as $clave => $valor)
                           {
                               if($avaluo->TipoDeDocumento == $clave)
                                    echo '<option value="'.$clave.'" selected>'.$valor.'</option>';
                               else
                                   echo '<option value="'.$clave.'">'.$valor.'</option>'; 
                           }

                        ?>
                        </select>						
					</div>

					<div class="col-12 col-sm-4">
						<label for="NumeroDocumento" class="form-label"
							>Número de Documento:</label
						>
						<input
							type="text"
							class="form-control"
							name="NumeroDocumento"
							id="NumeroDocumento"
							placeholder="Número de Documento"
                            value="<?php echo $avaluo->NumeroDocumento; ?>"
						/>
					</div>
				</div>

				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="TipoDeBien" class="form-label">Tipo de bien:</label>
						<input
							type="text"
							class="form-control"
							name="TipoDeBien"
							id="TipoDeBien"
							placeholder="Tipo de bien"
                            value="<?php echo $avaluo->TipoDeBien; ?>"

						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="Sector" class="form-label">Sector:</label>
						<input
							type="text"
							class="form-control"
							name="Sector"
							id="Sector"
							placeholder="Sector"
                            value="<?php echo $avaluo->Sector; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="ViviendaInteresSocial" class="form-label"
							>Vivienda Interés Social:</label
						>
                        
						<select
							id="ViviendaInteresSocial"
							name="ViviendaInteresSocial"
							class="form-select"
						>
                        <?php
                           foreach($pregunta as $clave => $valor)
                           {
                               if($avaluo->ViviendaInteresSocial == $clave)
                                    echo '<option value="'.$clave.'" selected>'.$valor.'</option>';
                               else
                                   echo '<option value="'.$clave.'">'.$valor.'</option>'; 
                           }
                        ?>
						</select>
					</div>
				</div>

				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="Estrato" class="form-label">Estrato:</label>
						<input
							type="text"
							class="form-control"
							name="Estrato"
							id="Estrato"
							placeholder="Estrato"
                            value="<?php echo $avaluo->Estrato; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="Producto" class="form-label">Producto:</label>
						<input
							type="text"
							class="form-control"
							name="Producto"
							id="Producto"
							placeholder="Producto"
							value="<?php echo $avaluo->Producto; ?>"                            
						/>
					</div>
				</div>
			</div>

			<div class="container mt-5">
				<div class="row mt-5">
					<div class="col-12">
						<p>MATRÍCULA INMOBILIARIA</p>
						<hr />
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-3">
						<label for="matriculainmTipo1" class="form-label">Tipo:</label>
						<input
							type="text"
							class="form-control"
							name="matriculainmTipo1"
							id="matriculainmTipo1"
							placeholder="Tipo"
                            value="<?php echo $avaluo->matriculainmTipo1; ?>"
						/>
					</div>
					<div class="col-12 col-sm-3">
						<label for="matriculainmNumero1" class="form-label">Número:</label>
						<input
							type="text"
							class="form-control"
							name="matriculainmNumero1"
							id="matriculainmNumero1"
							placeholder="Número"
							value="<?php echo $avaluo->matriculainmNumero1; ?>"
                            
						/>
					</div>
					<div class="col-12 col-sm-3">
						<label for="matriculainmTipo2" class="form-label">Tipo:</label>
						<input
							type="text"
							class="form-control"
							name="matriculainmTipo2"
							id="matriculainmTipo2"
							placeholder="Tipo"
                            value="<?php echo $avaluo->matriculainmTipo2; ?>"
						/>
					</div>
					<div class="col-12 col-sm-3">
						<label for="matriculainmNumero2" class="form-label">Número:</label>
						<input
							type="text"
							class="form-control"
							name="matriculainmNumero2"
							id="matriculainmNumero2"
							placeholder="Número"
                            value="<?php echo $avaluo->matriculainmNumero2; ?>"
						/>
					</div>
				</div>
			</div>

			
			<div class="container mt-5">
				<div class="row mt-5">
					<div class="col-12">
						<p>ASPECTOS JURÍDICOS</p>
						<hr />
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-3">
						<label for="Propietario" class="form-label">Propietario:</label>
						<input
							type="text"
							class="form-control"
							name="Propietario"
							id="Propietario"
							placeholder="Propietario"
                            value="<?php echo $avaluo->Propietario; ?>"
						/>
					</div>
					<div class="col-12 col-sm-3">
						<label for="NumeroDeEscritura" class="form-label"
							>Número de escritura:</label
						>
						<input
							type="text"
							class="form-control"
							name="NumeroDeEscritura"
							id="NumeroDeEscritura"
							placeholder="Número de escritura"
                            value="<?php echo $avaluo->NumeroDeEscritura; ?>"
						/>
					</div>
					<div class="col-12 col-sm-3">
						<label for="AspJFecha" class="form-label">Fecha:</label>
						<input
							type="date"
							class="form-control"
							name="AspJFecha"
							id="AspJFecha"
							placeholder=""
                            value="<?php echo $avaluo->AspJFecha; ?>"
						/>
					</div>
					<div class="col-12 col-sm-3">
						<label for="NumeroDeNotaria" class="form-label"
							>Número de notaría:</label
						>
						<input
							type="text"
							class="form-control"
							name="NumeroDeNotaria"
							id="NumeroDeNotaria"
							placeholder="Número	de	notaría"
                            value="<?php echo $avaluo->NumeroDeNotaria; ?>"
						/>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-3">
						<label for="AspMunicipio" class="form-label"
							>Municipio:</label
						>
						<input
							type="text"
							class="form-control"
							name="AspMunicipio"
							id="AspMunicipio"
							placeholder="Municipio"
                            value="<?php echo $avaluo->AspMunicipio; ?>"
						/>
					</div>
					<div class="col-12 col-sm-3">
						<label for="AspDepartamento" class="form-label"
							>Departamento:</label
						>
						<input
							type="text"
							class="form-control"
							name="AspDepartamento"
							id="AspDepartamento"
							placeholder="Departamento"
                            value="<?php echo $avaluo->AspDepartamento; ?>"
						/>
					</div>
					<div class="col-12 col-sm-3">
						<label for="Chip" class="form-label">Chip:</label>
						<input
							type="text"
							class="form-control"
							name="Chip"
							id="Chip"
							placeholder="Chip"
                            value="<?php echo $avaluo->Chip; ?>"
						/>
					</div>
					<div class="col-12 col-sm-3">
						<label for="CedulaCatastral" class="form-label"
							>Cédula catastral:</label
						>
						<input
							type="text"
							class="form-control"
							name="CedulaCatastral"
							id="CedulaCatastral"
							placeholder="Cédula catastral"
                            value="<?php echo $avaluo->CedulaCatastral; ?>"
						/>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="TipoDePropiedad" class="form-label"
							>Tipo de propiedad:</label
						>
						<input
							type="text"
							class="form-control"
							name="TipoDePropiedad"
							id="TipoDePropiedad"
							placeholder="Tipo de propiedad"
                            value="<?php echo $avaluo->TipoDePropiedad; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="CoeficienteDeCopropiedad" class="form-label"
							>Coeficiente de copropiedad:</label
						>
						<input
							type="text"
							class="form-control"
							name="CoeficienteDeCopropiedad"
							id="CoeficienteDeCopropiedad"
							placeholder="Coeficiente de copropiedad"
                            value="<?php echo $avaluo->CoeficienteDeCopropiedad; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="LicenciaDeConstrucción" class="form-label"
							>Licencia de construcción:</label
						>
						<input
							type="text"
							class="form-control"
							name="LicenciaDeConstruccion"
							id="LicenciaDeConstruccion"
							placeholder="Licencia de construcción"
                            value="<?php echo $avaluo->LicenciaDeConstruccion; ?>"
						/>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12">
						<label for="DescripcionGeneral" class="form-label"
							>Descripción General:</label
						>
						<textarea
							class="form-control"
							name="DescripcionGeneral"
							id="DescripcionGeneral"
							rows="3"
                           
						><?php echo $avaluo->DescripcionGeneral; ?></textarea>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row mt-5">
					<div class="col-12">
						<p>INFORMACIÓN DE ÁREAS Y NORMATIVIDAD</p>
						<hr />
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="AreaLote" class="form-label">Área del Lote:</label>
						<input
							type="text"
							class="form-control"
							name="AreaLote"
							id="AreaLote"
							placeholder="0,00"
                            value="<?php echo $avaluo->AreaLote; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="Forma" class="form-label">Forma:</label>
						<input
							type="text"
							class="form-control"
							name="Forma"
							id="Forma"
							placeholder=""
                            value="<?php echo $avaluo->Forma; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="Topografia" class="form-label">Topografía:</label>
						<input
							type="text"
							class="form-control"
							name="Topografia"
							id="Topografia"
							placeholder=""
                            value="<?php echo $avaluo->Topografia; ?>"
						/>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="Frente" class="form-label">Frente:</label>
						<input
							type="text"
							class="form-control"
							name="Frente"
							id="Frente"
							placeholder=""
                            value="<?php echo $avaluo->Frente; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="Fondo" class="form-label">Fondo:</label>
						<input
							type="text"
							class="form-control"
							name="Fondo"
							id="Fondo"
							placeholder=""
                            value="<?php echo $avaluo->Fondo; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="RelacionFrenteFondo" class="form-label">Relación de frente/fondo:</label>
						<input
							type="text"
							class="form-control"
							name="RelacionFrenteFondo"
							id="RelacionFrenteFondo"
							placeholder=""
                            value="<?php echo $avaluo->RelacionFrenteFondo; ?>"
						/>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="DecretoAcuerdo" class="form-label">Decreto/Acuerdo:</label>
						<input
							type="text"
							class="form-control"
							name="DecretoAcuerdo"
							id="DecretoAcuerdo"
							placeholder=""
                            value="<?php echo $avaluo->DecretoAcuerdo; ?>"
							/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="UsoPrincipal" class="form-label">Uso Principal:</label>
						<input
							type="text"
							class="form-control"
							name="UsoPrincipal"
							id="UsoPrincipal"
							placeholder=""
                            value="<?php echo $avaluo->UsoPrincipal; ?>"
							/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="AlturaPermitida" class="form-label">Altura Permitida:</label>
						<input
							type="text"
							class="form-control"
							name="AlturaPermitida"
							id="AlturaPermitida"
							placeholder=""
                            value="<?php echo $avaluo->AlturaPermitida; ?>"
							/>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="AislamientoPosterior" class="form-label">Aislamiento Posterior:</label>
						<input
							type="text"
							class="form-control"
							name="AislamientoPosterior"
							id="AislamientoPosterior"
							placeholder=""
                            value="<?php echo $avaluo->AislamientoPosterior; ?>"
							/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="AislamientoLateral" class="form-label">Aislamiento Lateral:</label>
						<input
							type="text"
							class="form-control"
							name="AislamientoLateral"
							id="AislamientoLateral"
							placeholder=""
                            value="<?php echo $avaluo->AislamientoLateral; ?>"
							/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="Antejardin" class="form-label">Antejardín:</label>
						<input
							type="text"
							class="form-control"
							name="Antejardin"
							id="Antejardin"
							placeholder=""
                            value="<?php echo $avaluo->Antejardin; ?>"
							/>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="IndiceDeOcupacion" class="form-label">Índice de Ocupación:</label>
						<input
							type="text"
							class="form-control"
							name="IndiceDeOcupacion"
							id="IndiceDeOcupacion"
							placeholder=""
                            value="<?php echo $avaluo->IndiceDeOcupacion; ?>"
							/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="IndiceDeConstruccion" class="form-label">Índice de Construcción:</label>
						<input
							type="text"
							class="form-control"
							name="IndiceDeConstruccion"
							id="IndiceDeConstruccion"
							placeholder=""
                            value="<?php echo $avaluo->IndiceDeConstruccion; ?>"
							/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="AreaValorada" class="form-label">Área Valorada:</label>
						<input
							type="text"
							class="form-control"
							name="AreaValorada"
							id="AreaValorada"
							placeholder="0,00"
                            value="<?php echo $avaluo->AreaValorada; ?>"
							/>
					</div>
					
				</div>

				<div class="row mt-5">
					
					<div class="col-12 col-sm-4">
						<label for="AreaMedidaEnLaInspeccion" class="form-label">Área Medida en la Inspección:</label>
						<input
							type="text"
							class="form-control"
							name="AreaMedidaEnLaInspeccion"
							id="AreaMedidaEnLaInspeccion"
							placeholder="0,00"
                            value="<?php echo $avaluo->AreaMedidaEnLaInspeccion; ?>"
							/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="AreaRegistradaEnTitulo" class="form-label">Área Registrada en Título:</label>
						<input
							type="text"
							class="form-control"
							name="AreaRegistradaEnTitulo"
							id="AreaRegistradaEnTitulo"
							placeholder="0,00"
                            value="<?php echo $avaluo->AreaRegistradaEnTitulo; ?>"
							/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="AreaSusceptibleDeLegalizacion" class="form-label">Área Susceptible de Legalización:</label>
						<input
							type="text"
							class="form-control"
							name="AreaSusceptibleDeLegalizacion"
							id="AreaSusceptibleDeLegalizacion"
							placeholder="0,00"
                            value="<?php echo $avaluo->AreaSusceptibleDeLegalizacion; ?>"
							/>
					</div>
				</div>
				<div class="row mt-5">
					
					<div class="col-12 col-sm-4">
						<label for="AreaCatastral" class="form-label">Área Catastral:</label>
						<input
							type="text"
							class="form-control"
							name="AreaCatastral"
							id="AreaCatastral"
							placeholder="0,00"
                            value="<?php echo $avaluo->AreaCatastral; ?>"
							/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="AreaLicenciaDeConstruccion" class="form-label">Área Licencia de Construcción:</label>
						<input
							type="text"
							class="form-control"
							name="AreaLicenciaDeConstruccion"
							id="AreaLicenciaDeConstruccion"
							placeholder="0,00"
                            value="<?php echo $avaluo->AreaLicenciaDeConstruccion; ?>"
							/>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12">
						<label for="AreaValoradaObservaciones" class="form-label">Observaciones:</label>
						<textarea
							class="form-control"
							name="AreaValoradaObservaciones"
							id="AreaValoradaObservaciones"
							rows="3"
						><?php echo $avaluo->AreaValoradaObservaciones; ?></textarea>
					</div>
				</div>
		    </div>
			<div class="container">
				<div class="row mt-5">
					<div class="col-12">
						<p>OFERTA Y DEMANDA</p>
						<hr />
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="TiempoEsperadoDeComercializacion" class="form-label">Tiempo Esperado de Comercialización:</label>
						<input
							type="text"
							class="form-control"
							name="TiempoEsperadoDeComercializacion"
							id="TiempoEsperadoDeComercializacion"
							placeholder=""
                            value="<?php echo $avaluo->TiempoEsperadoDeComercializacion; ?>"
							/>
					</div>					
					
				</div>
				<div class="row mt-5">					
					<div class="col-12">
						<label for="ComportamientoOfertayDemanda" class="form-label">Comportamiento Oferta y Demanda:</label>
						<textarea
							class="form-control"
							name="ComportamientoOfertayDemanda"
							id="ComportamientoOfertayDemanda"
							rows="3"                            
						><?php echo $avaluo->ComportamientoOfertayDemanda; ?></textarea>
					</div>					
				</div>
				<div class="row mt-5">					
					<div class="col-12">
						<label for="DSAIVI" class="form-label">Descripción Sector, Actividad Inmobiliaria, Vías Importantes:</label>
						<textarea
							class="form-control"
							name="DSAIVI"
							id="DSAIVI"
							rows="3"
						><?php echo $avaluo->DSAIVI; ?></textarea>
					</div>
				</div>
				<div class="row mt-5">					
					<div class="col-12">
						<label for="ActualidadEdificadora" class="form-label">Actualidad Edificadora:</label>
						<textarea
							class="form-control"
							name="ActualidadEdificadora"
							id="ActualidadEdificadora"
							rows="3"
						><?php echo $avaluo->ActualidadEdificadora; ?></textarea>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row mt-5">
					<div class="col-12">
						<p>SECTOR</p>
						<hr />
					</div>
				</div>

				<div class="row mt-5">
					<div class="col-12 col-sm-3">
						<label for="DemandaInteres" class="form-label">Demanda/Interés:</label>
						<input
							type="text"
							class="form-control"
							name="DemandaInteres"
							id="DemandaInteres"
							placeholder=""
                            value="<?php echo $avaluo->DemandaInteres; ?>"
						/>
					</div>
					<div class="col-12 col-sm-3">
						<label for="UsoPredominante" class="form-label">Uso Predominante:</label>
						<input
							type="text"
							class="form-control"
							name="UsoPredominante"
							id="UsoPredominante"
							placeholder=""
                            value="<?php echo $avaluo->UsoPredominante; ?>"
						/>
					</div>
					<div class="col-12 col-sm-3">
						<label for="Legalidad" class="form-label">Legalidad:</label>
						<input
							type="text"
							class="form-control"
							name="Legalidad"
							id="Legalidad"
							placeholder=""
                            value="<?php echo $avaluo->Legalidad; ?>"
						/>
					</div>
					<div class="col-12 col-sm-3">
						<label for="Transporte" class="form-label">Transporte:</label>
						<input
							type="text"
							class="form-control"
							name="Transporte"
							id="Transporte"
							placeholder=""
                            value="<?php echo $avaluo->Transporte; ?>"
						/>
					</div>					
				</div>

				<div class="row mt-5">
				
                    <div class="col-6 col-sm-2">
                    <div class="form-check">
                    <?php if (!$avaluo->Aire): ?>
                        <input class="form-check-input" type="checkbox" value="" id="Aire">
						<label class="form-check-label" for="Aire">Aire</label>
                    <?php else: ?>
                        <input class="form-check-input" type="checkbox" value="" id="Aire" checked>
						<label class="form-check-label" for="Aire">Aire</label>
                    <?php endif ?>
                    </div>
                    </div>

                    <div class="col-6 col-sm-2">
                    <div class="form-check">
                    <?php if (!$avaluo->AguasServidas): ?>
                        <input class="form-check-input" type="checkbox" value="" id="AguasServidas">
						<label class="form-check-label" for="AguasServidas">Aguas Servidas</label>
                    <?php else: ?>
                        <input class="form-check-input" type="checkbox" value="" id="AguasServidas" checked>
						<label class="form-check-label" for="AguasServidas">Aguas Servidas</label>
                    <?php endif ?>
                    </div>
                    </div>

                    <div class="col-6 col-sm-2">
                    <div class="form-check">
                    <?php if (!$avaluo->Basura): ?>
                        <input class="form-check-input" type="checkbox" value="" id="Basura">
						<label class="form-check-label" for="Basura">Basura</label>
                    <?php else: ?>
                        <input class="form-check-input" type="checkbox" value="" id="Basura" checked>
						<label class="form-check-label" for="Basura">Basura</label>
                    <?php endif ?>
                    </div>
                    </div>

                    <div class="col-6 col-sm-2">
                    <div class="form-check">
                    <?php if (!$avaluo->Inseguridad): ?>
                        <input class="form-check-input" type="checkbox" value="" id="Inseguridad">
						<label class="form-check-label" for="Inseguridad">Inseguridad</label>
                    <?php else: ?>
                        <input class="form-check-input" type="checkbox" value="" id="Inseguridad" checked>
						<label class="form-check-label" for="Inseguridad">Inseguridad</label>
                    <?php endif ?>
                    </div>
                    </div>

                    <div class="col-6 col-sm-2">
                    <div class="form-check">
                    <?php if (!$avaluo->Ruido): ?>
                        <input class="form-check-input" type="checkbox" value="" id="Ruido">
						<label class="form-check-label" for="Ruido">Ruido</label>
                    <?php else: ?>
                        <input class="form-check-input" type="checkbox" value="" id="Ruido" checked>
						<label class="form-check-label" for="Ruido">Ruido</label>
                    <?php endif ?>
                    </div>
                    </div>					
				</div>

				<div class="row mt-5">					
					<div class="col-12">
						<label for="SectorObservaciones" class="form-label">Observaciones:</label>
						<textarea
							class="form-control"
							name="SectorObservaciones"
							id="SectorObservaciones"
							rows="3"
						> <?php echo $avaluo->SectorObservaciones ?></textarea>
					</div>
				</div>
			</div>
			

			<div class="container">
				<div class="row mt-5">
						<div class="col-12">
							<p>EQUIPAMIENTO</p>
							<hr />
						</div>
				</div>
				<div class="row mt-5">
					<div class="col-12">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>									
										<th scope="col">EQUIPAMIENTO</th>
										<th scope="col" style="text-align:center">NIVEL DE EQUIPAMIENTO</th>
										<th scope="col" style="text-align:center">DISTANCIA APROX EN METROS</th>
									</tr>
								</thead>
								<tbody>
								<tr>									
									<th scope="row">Áreas Verdes</th>
									<td><input
											type="text"
											class="form-control"
											name="AreasVerdesNE"
											id="AreasVerdesNE"
											placeholder="Escribir..."
											value="<?php echo $avaluo->AreasVerdesNE; ?>"
										/>
									</td>
									<td><input
											type="text"
											class="form-control"
											name="AreasVerdesDAM"
											id="AreasVerdesDAM"
											placeholder="Escribir..."
											value="<?php echo $avaluo->AreasVerdesDAM; ?>"
										/>
									</td>									
								</tr>
								<tr>									
									<th scope="row">Asistencial</th>
									<td><input
											type="text"
											class="form-control"
											name="AsistencialNE"
											id="AsistencialNE"
											placeholder="Escribir..."
											value="<?php echo $avaluo->AsistencialNE; ?>"
										/>
									</td>
									<td><input
											type="text"
											class="form-control"
											name="AsistencialDAM"
											id="AsistencialDAM"
											placeholder="Escribir..."
											value="<?php echo $avaluo->AsistencialDAM; ?>"
										/>
									</td>									
								</tr>
								<tr>									
									<th scope="row">Comercial</th>
									<td><input
											type="text"
											class="form-control"
											name="ComercialNE"
											id="ComercialNE"
											placeholder="Escribir..."
											value="<?php echo $avaluo->ComercialNE; ?>"
										/>
									</td>
									<td><input
											type="text"
											class="form-control"
											name="ComercialDAM"
											id="ComercialDAM"
											placeholder="Escribir..."
											value="<?php echo $avaluo->ComercialDAM; ?>"
										/>
									</td>									
								</tr>
								<tr>									
									<th scope="row">Escolar</th>
									<td><input
											type="text"
											class="form-control"
											name="EscolarNE"
											id="EscolarNE"
											placeholder="Escribir..."
											value="<?php echo $avaluo->EscolarNE; ?>"
										/>
									</td>
									<td><input
											type="text"
											class="form-control"
											name="EscolarDAM"
											id="EscolarDAM"
											placeholder="Escribir..."
											value="<?php echo $avaluo->EscolarDAM; ?>"
										/>
									</td>									
								</tr>
								<tr>									
									<th scope="row">Estacionamientos</th>
									<td><input
											type="text"
											class="form-control"
											name="EstacionamientosNE"
											id="EstacionamientosNE"
											placeholder="Escribir..."
											value="<?php echo $avaluo->EstacionamientosNE; ?>"
										/>
									</td>
									<td><input
											type="text"
											class="form-control"
											name="EstacionamientosDAM"
											id="EstacionamientosDAM"
											placeholder="Escribir..."
											value="<?php echo $avaluo->EstacionamientosDAM; ?>"
										/>
									</td>									
								</tr>
								<tr>									
									<th scope="row">Áreas Recreativas</th>
									<td><input
											type="text"
											class="form-control"
											name="AreasRecreativasNE"
											id="AreasRecreativasNE"
											placeholder="Escribir..."
											value="<?php echo $avaluo->AreasRecreativasNE; ?>"
										/>
									</td>
									<td><input
											type="text"
											class="form-control"
											name="AreasRecreativasDAM"
											id="AreasRecreativasDAM"
											placeholder="Escribir..."
											value="<?php echo $avaluo->AreasRecreativasDAM; ?>"
										/>
									</td>									
								</tr>
								<tr>									
									<th scope="row">Seguridad del sector</th>
									<td><input
											type="text"
											class="form-control"
											name="SeguridadSectorNE"
                                            id="SeguridadSectorNE"
                                            placeholder="Escribir..."
                                            value="<?php echo $avaluo->SeguridadSectorNE; ?>"
										/>
									</td>
									<td><input
											type="text"
                                            class="form-control"
                                            name="SeguridadSectorDAM"
                                            id="SeguridadSectorDAM"
                                            placeholder="Escribir..."
                                            value="<?php echo $avaluo->SeguridadSectorDAM; ?>"
										/>
									</td>									
								</tr>
								</tbody>
							</table>
						</div>						
					</div>
				</div>
			</div>
			

			<div class="container">
				<div class="row mt-5">
						<div class="col-12">
							<p>INFRAESTRUCTURA URBANA DEL SECTOR</p>
							<hr />
						</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="ViasDeAcceso" class="form-label">Vías de Acceso:</label>
						<input
							type="text"
							class="form-control"
							name="ViasDeAcceso"
							id="ViasDeAcceso"
							placeholder=""
							value="<?php echo $avaluo->ViasDeAcceso; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="Andenes" class="form-label">Andenes:</label>
						<input
							type="text"
							class="form-control"
							name="Andenes"
							id="Andenes"
							placeholder=""
							value="<?php echo $avaluo->Andenes; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="Acueducto" class="form-label">Acueducto:</label>
						<input
							type="text"
							class="form-control"
							name="Acueducto"
							id="Acueducto"
							placeholder=""
							value="<?php echo $avaluo->Acueducto; ?>"
						/>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="EnergiaElectrica" class="form-label">Energía Eléctrica:</label>
						<input
							type="text"
							class="form-control"
							name="EnergiaElectrica"
							id="EnergiaElectrica"
							placeholder=""
							value="<?php echo $avaluo->EnergiaElectrica; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="GasNatural" class="form-label">Gas Natural:</label>
						<input
							type="text"
							class="form-control"
							name="GasNatural"
							id="GasNatural"
							placeholder=""
							value="<?php echo $avaluo->GasNatural; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="Pavimentadas" class="form-label">Pavimentadas:</label>
						<input
							type="text"
							class="form-control"
							name="Pavimentadas"
							id="Pavimentadas"
							placeholder=""
							value="<?php echo $avaluo->Pavimentadas; ?>"
						/>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="Sardineles" class="form-label">Sardineles:</label>
						<input
							type="text"
							class="form-control"
							name="Sardineles"
							id="Sardineles"
							placeholder=""
							value="<?php echo $avaluo->Sardineles; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="Alcantarillado" class="form-label">Alcantarillado:</label>
						<input
							type="text"
							class="form-control"
							name="Alcantarillado"
							id="Alcantarillado"
							placeholder=""
							value="<?php echo $avaluo->Alcantarillado; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="Telefonia" class="form-label">Telefonía:</label>
						<input
							type="text"
							class="form-control"
							name="Telefonia"
							id="Telefonia"
							placeholder=""
							value="<?php echo $avaluo->Telefonia; ?>"
						/>
					</div>
				</div>

				<div class="container">
					<div class="row mt-5 justify-content-center">
							<div class="col-10">
								<p>Amoblamiento	Urbano</p>
								<hr />
							</div>
					</div>
					<div class="row mt-5 justify-content-center">
						<div class="col-5 col-sm-2">
							<div class="form-check">
								<?php if (!$avaluo->Alamedas): ?>
									<input class="form-check-input" type="checkbox" value="" id="Alamedas">
									<label class="form-check-label" for="Alamedas">Alamedas</label>
								<?php else: ?>
									<input class="form-check-input" type="checkbox" value="" id="Alamedas" checked>
									<label class="form-check-label" for="Alamedas">Alamedas</label>
								<?php endif ?>
							</div>
						</div>
						<div class="col-5 col-sm-2">
							<div class="form-check">
								<?php if (!$avaluo->Alumbrado): ?>
									<input class="form-check-input" type="checkbox" value="" id="Alumbrado">
									<label class="form-check-label" for="Alumbrado">Alumbrado</label>
								<?php else: ?>
									<input class="form-check-input" type="checkbox" value="" id="Alumbrado" checked>
									<label class="form-check-label" for="Alumbrado">Alumbrado</label>
								<?php endif ?>
							</div>
						</div>
						<div class="col-5 col-sm-2">
							<div class="form-check">
								<?php if (!$avaluo->Arborizacion): ?>
									<input class="form-check-input" type="checkbox" value="" id="Arborizacion">
									<label class="form-check-label" for="Arborizacion">Arborización</label>
								<?php else: ?>
									<input class="form-check-input" type="checkbox" value="" id="Arborizacion" checked>
									<label class="form-check-label" for="Arborizacion">Arborización</label>
								<?php endif ?>
							</div>
						</div>
						<div class="col-5 col-sm-2">
							<div class="form-check">
								<?php if (!$avaluo->Ciclorutas): ?>
									<input class="form-check-input" type="checkbox" value="" id="Ciclorutas">
									<label class="form-check-label" for="Ciclorutas">Ciclorutas</label>
								<?php else: ?>
									<input class="form-check-input" type="checkbox" value="" id="Ciclorutas" checked>
									<label class="form-check-label" for="Ciclorutas">Ciclorutas</label>
								<?php endif ?>
							</div>
						</div>
					</div>
					<div class="row mt-5 justify-content-center">
						<div class="col-5 col-sm-2">
							<div class="form-check">
								<?php if (!$avaluo->Paradero): ?>
									<input class="form-check-input" type="checkbox" value="" id="Paradero">
									<label class="form-check-label" for="Paradero">Paradero</label>
								<?php else: ?>
									<input class="form-check-input" type="checkbox" value="" id="Paradero" checked>
									<label class="form-check-label" for="Paradero">Paradero</label>
								<?php endif ?>
							</div>
						</div>
						<div class="col-5 col-sm-2">
							<div class="form-check">
								<?php if (!$avaluo->Parques): ?>
									<input class="form-check-input" type="checkbox" value="" id="Parques">
									<label class="form-check-label" for="Parques">Parques</label>
								<?php else: ?>
									<input class="form-check-input" type="checkbox" value="" id="Parques" checked>
									<label class="form-check-label" for="Parques">Parques</label>
								<?php endif ?>
							</div>
						</div>
						<div class="col-5 col-sm-2">
							<div class="form-check">
								<?php if (!$avaluo->ZonasVerdes): ?>
									<input class="form-check-input" type="checkbox" value="" id="ZonasVerdes">
									<label class="form-check-label" for="ZonasVerdes">Zonas Verdes</label>
								<?php else: ?>
									<input class="form-check-input" type="checkbox" value="" id="ZonasVerdes" checked>
									<label class="form-check-label" for="ZonasVerdes">Zonas Verdes</label>
								<?php endif ?>
							</div>
						</div>
						<div class="col-5 col-sm-2">&nbsp;</div>
					</div>
				</div>

				<div class="row mt-5">
					<div class="col-12">
						<label for="DescripcionGeneral" class="form-label"
							>Perspectivas De Valorización:</label
						>
						<textarea
							class="form-control"
							name="PerspectivasDeValorizacion"
							id="PerspectivasDeValorizacion"
							rows="3"
						><?php echo $avaluo->PerspectivasDeValorizacion; ?></textarea>
					</div>
				</div>
			</div>


			

			<div class="container">
				<div class="row mt-5">
						<div class="col-12">
							<p>EDIFICACIÓN ESTRUCTURA</p>
							<hr />
						</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="EstadoDeLaConstruccion" class="form-label">Estado de la Construcción:</label>
						<input
							type="text"
							class="form-control"
							name="EstadoDeLaConstruccion"
							id="EstadoDeLaConstruccion"
							placeholder=""
							value="<?php echo $avaluo->EstadoDeLaConstruccion; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="AvanceEnConstruccion" class="form-label">Avance (en Construcción):</label>
						<input
							type="text"
							class="form-control"
							name="AvanceEnConstruccion"
							id="AvanceEnConstruccion"
							placeholder=""
							value="<?php echo $avaluo->AvanceEnConstruccion; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="EstadoDeConservacion" class="form-label">Estado	de Conservación:</label>
						<input
							type="text"
							class="form-control"
							name="EstadoDeConservacion"
							id="EstadoDeConservacion"
							placeholder=""
							value="<?php echo $avaluo->EstadoDeConservacion; ?>"
						/>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="NoDePisosDelInmueble" class="form-label">No. de pisos del Inmueble:</label>
						<input
							type="text"
							class="form-control"
							name="NoDePisosDelInmueble"
							id="NoDePisosDelInmueble"
							placeholder=""
							value="<?php echo $avaluo->NoDePisosDelInmueble; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="NumeroDeSotanos" class="form-label">Número de Sótanos:</label>
						<input
							type="text"
							class="form-control"
							name="NumeroDeSotanos"
							id="NumeroDeSotanos"
							placeholder=""
							value="<?php echo $avaluo->NumeroDeSotanos; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="VidaUtil" class="form-label">Vida Útil:</label>
						<input
							type="text"
							class="form-control"
							name="VidaUtil"
							id="VidaUtil"
							placeholder=""
							value="<?php echo $avaluo->VidaUtil; ?>"
						/>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="VidaRemanente" class="form-label">Vida Remanente:</label>
						<input
							type="text"
							class="form-control"
							name="VidaRemanente"
							id="VidaRemanente"
							placeholder=""
							value="<?php echo $avaluo->VidaRemanente; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="YearDeConstruccion" class="form-label">Año de Construcción:</label>
						<input
							type="text"
							class="form-control"
							name="YearDeConstruccion"
							id="YearDeConstruccion"
							placeholder=""
							value="<?php echo $avaluo->YearDeConstruccion; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="Edad" class="form-label">Edad:</label>
						<input
							type="text"
							class="form-control"
							name="Edad"
							id="Edad"
							placeholder=""
							value="<?php echo $avaluo->Edad; ?>"
						/>
					</div>
				</div>
				<div class="row mt-5">
				    <div class="col-12 col-sm-4">
						<label for="Estructura" class="form-label">Estructura:</label>
						<input
							type="text"
							class="form-control"
							name="Estructura"
							id="Estructura"
							placeholder=""
							value="<?php echo $avaluo->Estructura; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="MaterialDeEstructura" class="form-label">Material de Estructura:</label>
						<input
							type="text"
							class="form-control"
							name="MaterialDeEstructura"
							id="MaterialDeEstructura"
							placeholder=""
							value="<?php echo $avaluo->MaterialDeEstructura; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
					 	<label for="EstructuraEstado" class="form-label">Estado:</label>
						<input
							type="text"
							class="form-control"
							name="EstructuraEstado"
							id="EstructuraEstado"
							placeholder=""
							value="<?php echo $avaluo->EstructuraEstado; ?>"
						/>
					</div>
				</div>
				<div class="row mt-5">
				    <div class="col-12 col-sm-4">
						<label for="Remodelado" class="form-label">Remodelado:</label>
						<input
							type="text"
							class="form-control"
							name="Remodelado"
							id="Remodelado"
							placeholder=""
							value="<?php echo $avaluo->Remodelado; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="UsoActualPredominante" class="form-label">Uso Actual Predominante:</label>
						<input
							type="text"
							class="form-control"
							name="UsoActualPredominante"
							id="UsoActualPredominante"
							placeholder=""
							value="<?php echo $avaluo->UsoActualPredominante; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="AjusteSismorresistente" class="form-label">Ajuste Sismorresistente:</label>
						<input
							type="text"
							class="form-control"
							name="AjusteSismorresistente"
							id="AjusteSismorresistente"
							placeholder=""
							value="<?php echo $avaluo->AjusteSismorresistente; ?>"
						/>
					</div>
				</div>
				<div class="row mt-5">
				    <div class="col-12 col-sm-4">
						<label for="Cubierta" class="form-label">Cubierta:</label>
						<input
							type="text"
							class="form-control"
							name="Cubierta"
							id="Cubierta"
							placeholder=""
							value="<?php echo $avaluo->Cubierta; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="Fachada" class="form-label">Fachada:</label>
						<input
							type="text"
							class="form-control"
							name="Fachada"
							id="Fachada"
							placeholder=""
							value="<?php echo $avaluo->Fachada; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="TipoDeFachadaEnMetros" class="form-label">Tipo de Fachada en Metros:</label>
						<input
							type="text"
							class="form-control"
							name="TipoDeFachadaEnMetros"
							id="TipoDeFachadaEnMetros"
							placeholder=""
							value="<?php echo $avaluo->TipoDeFachadaEnMetros; ?>"
						/>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="EstructuraReforzada" class="form-label">Estructura Reforzada:</label>
						<input
							type="text"
							class="form-control"
							name="EstructuraReforzada"
							id="EstructuraReforzada"
							placeholder=""
							value="<?php echo $avaluo->EstructuraReforzada; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="DanosPrevios" class="form-label">Daños Previos:</label>
						<input
							type="text"
							class="form-control"
							name="DanosPrevios"
							id="DanosPrevios"
							placeholder=""
							value="<?php echo $avaluo->DanosPrevios; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="MaterialDeConstruccion" class="form-label">Material de Construcción:</label>
						<input
							type="text"
							class="form-control"
							name="MaterialDeConstruccion"
							id="MaterialDeConstruccion"
							placeholder=""
							value="<?php echo $avaluo->MaterialDeConstruccion; ?>"
						/>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="Iluminacion" class="form-label">Iluminación:</label>
						<input
							type="text"
							class="form-control"
							name="Iluminacion"
							id="Iluminacion"
							placeholder=""
							value="<?php echo $avaluo->Iluminacion; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="Ventilacion" class="form-label">Ventilación:</label>
						<input
							type="text"
							class="form-control"
							name="Ventilacion"
							id="Ventilacion"
							placeholder=""
							value="<?php echo $avaluo->Ventilacion; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="IrregularidadPlanta" class="form-label">Irregularidad Planta:</label>
						<input
							type="text"
							class="form-control"
							name="IrregularidadPlanta"
							id="IrregularidadPlanta"
							placeholder=""
							value="<?php echo $avaluo->IrregularidadPlanta; ?>"
						/>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="IrregularidadAltura" class="form-label">Irregularidad Altura:</label>
							<input
								type="text"
								class="form-control"
								name="IrregularidadAltura"
								id="IrregularidadAltura"
								placeholder=""
								value="<?php echo $avaluo->IrregularidadAltura; ?>"
							/>
					</div>	
				</div>
				<div class="row mt-5">					
					<div class="col-12">
						<label for="ComentariosDeLaEstructura" class="form-label">Comentarios	de	la Estructura:</label>
						<textarea
							class="form-control"
							name="ComentariosDeLaEstructura"
							id="ComentariosDeLaEstructura"
							rows="3"
						><?php echo $avaluo->ComentariosDeLaEstructura; ?></textarea>
					</div>
				</div>
				<dic class="container">
					<div class="row mt-5 justify-content-center">
							<div class="col-10">
								<p>Estado de la Edificación</p>
								<hr />
							</div>
					</div>
					<div class="row mt-5 justify-content-center">
						<div class="col-10">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>									
										<th scope="col">TIPO</th>
										<th scope="col" style="text-align:center">CALIDAD</th>
										<th scope="col" style="text-align:center">ESTADO</th>
									</tr>
								</thead>
								<tbody>
								<tr>									
									<th scope="row">Carpintería	Metálica</th>
									<td><input
											type="text"
											class="form-control"
											name="CarpinteriaMetalicaCalidad"
											id="CarpinteriaMetalicaCalidad"
											placeholder="Escribir..."
											value="<?php echo $avaluo->CarpinteriaMetalicaCalidad; ?>"
										/>
									</td>
									<td><input
											type="text"
											class="form-control"
											name="CarpinteriaMetalicaEstado"
											id="CarpinteriaMetalicaEstado"
											placeholder="Escribir..."
											value="<?php echo $avaluo->CarpinteriaMetalicaEstado; ?>"
										/>
									</td>									
								</tr>
								<tr>									
									<th scope="row">Carpintería	en	Madera</th>
									<td><input
											type="text"
											class="form-control"
											name="CarpinteriaEnMaderaCalidad"
											id="CarpinteriaEnMaderaCalidad"
											placeholder="Escribir..."
											value="<?php echo $avaluo->CarpinteriaEnMaderaCalidad; ?>"
										/>
									</td>
									<td><input
											type="text"
											class="form-control"
											name="CarpinteriaEnMaderaEstado"
											id="CarpinteriaEnMaderaEstado"
											placeholder="Escribir..."
											value="<?php echo $avaluo->CarpinteriaEnMaderaEstado; ?>"
										/>
									</td>									
								</tr>
								<tr>									
									<th scope="row">Pisos</th>
									<td><input
											type="text"
											class="form-control"
											name="PisosCalidad"
											id="PisosCalidad"
											placeholder="Escribir..."
											value="<?php echo $avaluo->PisosCalidad; ?>"
										/>
									</td>
									<td><input
											type="text"
											class="form-control"
											name="PisosEstado"
											id="PisosEstado"
											placeholder="Escribir..."
											value="<?php echo $avaluo->PisosEstado; ?>"
										/>
									</td>									
								</tr>
								<tr>									
									<th scope="row">Muros</th>
									<td><input
											type="text"
											class="form-control"
											name="MurosCalidad"
											id="MurosCalidad"
											placeholder="Escribir..."
											value="<?php echo $avaluo->MurosCalidad; ?>"
										/>
									</td>
									<td><input
											type="text"
											class="form-control"
											name="MurosEstado"
											id="MurosEstado"
											placeholder="Escribir..."
											value="<?php echo $avaluo->MurosEstado; ?>"
										/>
									</td>									
								</tr>
								<tr>									
									<th scope="row">Techos</th>
									<td><input
											type="text"
											class="form-control"
											name="TechosCalidad"
											id="TechosCalidad"
											placeholder="Escribir..."
											value="<?php echo $avaluo->TechosCalidad; ?>"
										/>
									</td>
									<td><input
											type="text"
											class="form-control"
											name="TechosEstado"
											id="TechosEstado"
											placeholder="Escribir..."
											value="<?php echo $avaluo->TechosEstado; ?>"
										/>
									</td>									
								</tr>
								<tr>									
									<th scope="row">Cocina</th>
									<td><input
											type="text"
											class="form-control"
											name="CocinaCalidad"
											id="CocinaCalidad"
											placeholder="Escribir..."
											value="<?php echo $avaluo->CocinaCalidad; ?>"
										/>
									</td>
									<td><input
											type="text"
											class="form-control"
											name="CocinaEstado"
											id="CocinaEstado"
											placeholder="Escribir..."
											value="<?php echo $avaluo->CocinaEstado; ?>"
										/>
									</td>									
								</tr>
								<tr>									
									<th scope="row">Baños</th>
									<td><input
											type="text"
											class="form-control"
											name="BanosCalidad"
											id="BanosCalidad"
											placeholder="Escribir..."
											value="<?php echo $avaluo->BanosCalidad; ?>"
										/>
									</td>
									<td><input
											type="text"
											class="form-control"
											name="BanosEstado"
											id="BanosEstado"
											placeholder="Escribir..."
											value="<?php echo $avaluo->BanosEstado; ?>"
										/>
									</td>									
								</tr>
								</tbody>
							</table>
						</div>
						</div>
					</div>
				</dic>
			</div>


			<div class="container">
				<div class="row mt-5">
						<div class="col-12">
							<p>PREDIO</p>
							<hr />
						</div>
				</div>
				<div class="row mt-5 justify-content-center">
					<div class="col-10">
						<p>Servicios</p>
						<hr />

						<div class="row mt-5">
							<div class="col-12 col-sm-4">
								<label for="PredioAcueducto" class="form-label">Acueducto:</label>
								<input
									type="text"
									class="form-control"
									name="PredioAcueducto"
									id="PredioAcueducto"
									placeholder=""
									value="<?php echo $avaluo->PredioAcueducto; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioEnergiaElectrica" class="form-label">Energía eléctrica:</label>
								<input
									type="text"
									class="form-control"
									name="PredioEnergiaElectrica"
									id="PredioEnergiaElectrica"
									placeholder=""
									value="<?php echo $avaluo->PredioEnergiaElectrica; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioTelefonia" class="form-label">Telefonía:</label>
								<input
									type="text"
									class="form-control"
									name="PredioTelefonia"
									id="PredioTelefonia"
									placeholder=""
									value="<?php echo $avaluo->PredioTelefonia; ?>"
								/>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-12 col-sm-4">
								<label for="PredioAlcantarillado" class="form-label">Alcantarillado:</label>
								<input
									type="text"
									class="form-control"
									name="PredioAlcantarillado"
									id="PredioAlcantarillado"
									placeholder=""
									value="<?php echo $avaluo->PredioAlcantarillado; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioGasNatural" class="form-label">Gas Natural:</label>
								<input
									type="text"
									class="form-control"
									name="PredioGasNatural"
									id="PredioGasNatural"
									placeholder=""
									value="<?php echo $avaluo->PredioGasNatural; ?>"
								/>
							</div>
						</div>
					</div>
				</div>
				<div class="row mt-5 justify-content-center">
					<div class="col-10">
						<p>Dependencias</p>
						<hr />
						<div class="row mt-5">
							<div class="col-12 col-sm-4">
								<label for="PredioAlcobas" class="form-label">Alcobas:</label>
								<input
									type="text"
									class="form-control"
									name="PredioAlcobas"
									id="PredioAlcobas"
									placeholder=""
									value="<?php echo $avaluo->PredioAlcobas; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioBalcon" class="form-label">Balcón:</label>
								<input
									type="text"
									class="form-control"
									name="PredioBalcon"
									id="PredioBalcon"
									placeholder=""
									value="<?php echo $avaluo->PredioBalcon; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioBanoPrivado" class="form-label">Baño Privado:</label>
								<input
									type="text"
									class="form-control"
									name="PredioBanoPrivado"
									id="PredioBanoPrivado"
									placeholder=""
									value="<?php echo $avaluo->PredioBanoPrivado; ?>"
								/>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-12 col-sm-4">
								<label for="PredioCocina" class="form-label">Cocina:</label>
								<input
									type="text"
									class="form-control"
									name="PredioCocina"
									id="PredioCocina"
									placeholder=""
									value="<?php echo $avaluo->PredioCocina; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioEstarHabitacion" class="form-label">Estar Habitación:</label>
								<input
									type="text"
									class="form-control"
									name="PredioEstarHabitacion"
									id="PredioEstarHabitacion"
									placeholder=""
									value="<?php echo $avaluo->PredioEstarHabitacion; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioJardin" class="form-label">Jardín:</label>
								<input
									type="text"
									class="form-control"
									name="PredioJardin"
									id="PredioJardin"
									placeholder=""
									value="<?php echo $avaluo->PredioJardin; ?>"
								/>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-12 col-sm-4">
								<label for="PredioSala" class="form-label">Sala:</label>
								<input
									type="text"
									class="form-control"
									name="PredioSala"
									id="PredioSala"
									placeholder=""
									value="<?php echo $avaluo->PredioSala; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioZonaDeRopas" class="form-label">Zona De Ropas:</label>
								<input
									type="text"
									class="form-control"
									name="PredioZonaDeRopas"
									id="PredioZonaDeRopas"
									placeholder=""
									value="<?php echo $avaluo->PredioZonaDeRopas; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioCloset" class="form-label">Closet:</label>
								<input
									type="text"
									class="form-control"
									name="PredioCloset"
									id="PredioCloset"
									placeholder=""
									value="<?php echo $avaluo->PredioCloset; ?>"
								/>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-12 col-sm-4">
								<label for="PredioAlcobaDeServicio" class="form-label">Alcoba De Servicio:</label>
								<input
									type="text"
									class="form-control"
									name="PredioAlcobaDeServicio"
									id="PredioAlcobaDeServicio"
									placeholder=""
									value="<?php echo $avaluo->PredioAlcobaDeServicio; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioBanoDeServicio" class="form-label">Baño De Servicio:</label>
								<input
									type="text"
									class="form-control"
									name="PredioBanoDeServicio"
									id="PredioBanoDeServicio"
									placeholder=""
									value="<?php echo $avaluo->PredioBanoDeServicio; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioBanoSocial" class="form-label">Baño Social:</label>
								<input
									type="text"
									class="form-control"
									name="PredioBanoSocial"
									id="PredioBanoSocial"
									placeholder=""
									value="<?php echo $avaluo->PredioBanoSocial; ?>"
								/>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-12 col-sm-4">
								<label for="PredioComedor" class="form-label">Comedor:</label>
								<input
									type="text"
									class="form-control"
									name="PredioComedor"
									id="PredioComedor"
									placeholder=""
									value="<?php echo $avaluo->PredioComedor; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioEstudio" class="form-label">Estudio:</label>
								<input
									type="text"
									class="form-control"
									name="PredioEstudio"
									id="PredioEstudio"
									placeholder=""
									value="<?php echo $avaluo->PredioEstudio; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioPatioInterior" class="form-label">Patio Interior:</label>
								<input
									type="text"
									class="form-control"
									name="PredioPatioInterior"
									id="PredioPatioInterior"
									placeholder=""
									value="<?php echo $avaluo->PredioPatioInterior; ?>"
								/>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-12 col-sm-4">
								<label for="PredioTerraza" class="form-label">Terraza:</label>
								<input
									type="text"
									class="form-control"
									name="PredioTerraza"
									id="PredioTerraza"
									placeholder=""
									value="<?php echo $avaluo->PredioTerraza; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioSubdivididoFisicamente" class="form-label">Predio Subdividido Físicamente:</label>
								<input
									type="text"
									class="form-control"
									name="PredioSubdivididoFisicamente"
									id="PredioSubdivididoFisicamente"
									placeholder=""
									value="<?php echo $avaluo->PredioSubdivididoFisicamente; ?>"
								/>
							</div>							
						</div>
					</div>
				</div>
				<div class="row mt-5 justify-content-center">
					<div class="col-10">
						<p>Garajes</p>
						<hr />
						<div class="row mt-5">
							<div class="col-12 col-sm-4">
								<label for="PredioTotalCuposDeParqueo" class="form-label">Total Cupos De Parqueo:</label>
								<input
									type="text"
									class="form-control"
									name="PredioTotalCuposDeParqueo"
									id="PredioTotalCuposDeParqueo"
									placeholder=""
									value="<?php echo $avaluo->PredioTotalCuposDeParqueo; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioBahiaComunal" class="form-label">Bahía Comunal:</label>
								<input
									type="text"
									class="form-control"
									name="PredioBahiaComunal"
									id="PredioBahiaComunal"
									placeholder=""
									value="<?php echo $avaluo->PredioBahiaComunal; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="Descubierto" class="form-label">Descubierto:</label>
								<input
									type="text"
									class="form-control"
									name="PredioDescubierto"
									id="PredioDescubierto"
									placeholder=""
									value="<?php echo $avaluo->PredioDescubierto; ?>"
								/>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-12 col-sm-4">
								<label for="PredioPrivado" class="form-label">Privado:</label>
								<input
									type="text"
									class="form-control"
									name="PredioPrivado"
									id="PredioPrivado"
									placeholder=""
									value="<?php echo $avaluo->PredioPrivado; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioServidumbre" class="form-label">Servidumbre:</label>
								<input
									type="text"
									class="form-control"
									name="PredioServidumbre"
									id="Predioervidumbre"
									placeholder=""
									value="<?php echo $avaluo->PredioServidumbre; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioUsoExclusivo" class="form-label">Uso Exclusivo:</label>
								<input
									type="text"
									class="form-control"
									name="PredioUsoExclusivo"
									id="PredioUsoExclusivo"
									placeholder=""
									value="<?php echo $avaluo->PredioUsoExclusivo; ?>"
								/>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-12 col-sm-4">
								<label for="PredioCubierto" class="form-label">Cubierto:</label>
								<input
									type="text"
									class="form-control"
									name="PredioCubierto"
									id="PredioCubierto"
									placeholder=""
									value="<?php echo $avaluo->PredioCubierto; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioDoble" class="form-label">Doble:</label>
								<input
									type="text"
									class="form-control"
									name="PredioDoble"
									id="PredioDoble"
									placeholder=""
									value="<?php echo $avaluo->PredioDoble; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioSencillo" class="form-label">Sencillo:</label>
								<input
									type="text"
									class="form-control"
									name="PredioSencillo"
									id="Predioencillo"
									placeholder=""
									value="<?php echo $avaluo->PredioSencillo; ?>"
								/>
							</div>
						</div>
					</div>
			    </div>
                <div class="row mt-5 justify-content-center">
					<div class="col-10">
						<p>Otros</p>
						<hr />
						<div class="row mt-5">
							<div class="col-12 col-sm-4">
								<label for="PredioBodega" class="form-label">Bodega:</label>
								<input
									type="text"
									class="form-control"
									name="PredioBodega"
									id="PredioBodega"
									placeholder=""
									value="<?php echo $avaluo->PredioBodega; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioTipoDeDeposito" class="form-label">Tipo De Depósito:</label>
								<input
									type="text"
									class="form-control"
									name="PredioTipoDeDeposito"
									id="PredioTipoDeDeposito"
									placeholder=""
									value="<?php echo $avaluo->PredioTipoDeDeposito; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioOficina" class="form-label">Oficina:</label>
								<input
									type="text"
									class="form-control"
									name="PredioOficina"
									id="PredioOficina"
									placeholder=""
									value="<?php echo $avaluo->PredioOficina; ?>"
								/>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-12 col-sm-4">
								<label for="PredioDeposito" class="form-label">Depósito:</label>
								<input
									type="text"
									class="form-control"
									name="PredioDeposito"
									id="PredioDeposito"
									placeholder=""
									value="<?php echo $avaluo->PredioDeposito; ?>"
								/>
							</div>
							<div class="col-12 col-sm-4">
								<label for="PredioLocal" class="form-label">Local:</label>
								<input
									type="text"
									class="form-control"
									name="PredioLocal"
									id="PredioLocal"
									placeholder=""
									value="<?php echo $avaluo->PredioLocal; ?>"
								/>
							</div>							
						</div>
					</div>
				</div>
			</div>


			<div class="container">
				<div class="row mt-5">
						<div class="col-12">
							<p>DOTACIÓN	COMUNAL</p>
							<hr />
						</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="DCValorAdmon" class="form-label">Valor Admón:</label>
						<input
							type="text"
							class="form-control"
							name="DCValorAdmon"
							id="DCValorAdmon"
							placeholder=""
							value="<?php echo $avaluo->DCValorAdmon; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="DCMensualidad" class="form-label">Mensualidad:</label>
						<input
							type="text"
							class="form-control"
							name="DCMensualidad"
							id="DCMensualidad"
							placeholder=""
							value="<?php echo $avaluo->DCMensualidad; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="DCValorAdmonM2" class="form-label">Valor Admón m²:</label>
						<input
							type="text"
							class="form-control"
							name="DCValorAdmonM2"
							id="DCValorAdmonM2"
							placeholder=""
							value="<?php echo $avaluo->DCValorAdmonM2; ?>"
						/>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="DCVigilanciaPrivada" class="form-label">Vigilancia Privada:</label>
						<input
							type="text"
							class="form-control"
							name="DCVigilanciaPrivada"
							id="DCVigilanciaPrivada"
							placeholder=""
							value="<?php echo $avaluo->DCVigilanciaPrivada; ?>"
						/>
					</div>
					<div class="col-12 col-sm-4">
						<label for="DCAscensores" class="form-label">Ascensores:</label>
						<input
							type="text"
							class="form-control"
							name="DCAscensores"
							id="DCAscensores"
							placeholder=""
							value="<?php echo $avaluo->DCAscensores; ?>"
						/>
					</div>				
				</div>
				<div class="row mt-5">
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCAACentral): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCAACentral">
								<label class="form-check-label" for="DCAACentral">A.A. Central</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCAACentral" checked>
								<label class="form-check-label" for="DCAACentral">A.A. Central</label>
							<?php endif ?>
						</div>
 					</div>
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCBBQ): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCBBQ">
								<label class="form-check-label" for="DCBBQ">BBQ</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCBBQ" checked>
								<label class="form-check-label" for="DCBBQ">BBQ</label>
							<?php endif ?>
						</div>
 					</div>
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCBicicletero): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCBicicletero">
								<label class="form-check-label" for="DCBicicletero">Bicicletero</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCBicicletero" checked>
								<label class="form-check-label" for="DCBicicletero">Bicicletero</label>
							<?php endif ?>
						</div>
 					</div>
				</div>
				<div class="row mt-3">
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCBombaEyec): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCBombaEyec">
								<label class="form-check-label" for="DCBombaEyec">Bomba Eyec</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCBombaEyec" checked>
								<label class="form-check-label" for="DCBombaEyec">Bomba Eyec</label>
							<?php endif ?>
						</div>
 					</div>
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCCalefaccion): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCCalefaccion">
								<label class="form-check-label" for="DCCalefaccion">Calefacción</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCCalefaccion" checked>
								<label class="form-check-label" for="DCCalefaccion">Calefacción</label>
							<?php endif ?>
						</div>
 					</div>
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCCanchaMultiuso): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCCanchaMultiuso">
								<label class="form-check-label" for="DCCanchaMultiuso">Cancha Multiuso</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCCanchaMultiuso" checked>
								<label class="form-check-label" for="DCCanchaMultiuso">Cancha Multiuso</label>
							<?php endif ?>
						</div>
 					</div>
				</div>
				<div class="row mt-3">
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCCanchaSquash): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCCanchaSquash">
								<label class="form-check-label" for="DCCanchaSquash">Cancha Squash</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCCanchaSquash" checked>
								<label class="form-check-label" for="DCCanchaSquash">Cancha Squash</label>
							<?php endif ?>
						</div>
 					</div>
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCCCTV): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCCCTV">
								<label class="form-check-label" for="DCCCTV">CCTV</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCCCTV" checked>
								<label class="form-check-label" for="DCCCTV">CCTV</label>
							<?php endif ?>
						</div>
 					</div>
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCCitofonia): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCCitofonia">
								<label class="form-check-label" for="DCCitofonia">Citofonía</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCCitofonia" checked>
								<label class="form-check-label" for="DCCitofonia">Citofonía</label>
							<?php endif ?>
						</div>
 					</div>
				</div>
				<div class="row mt-3">
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCClubHouse): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCClubHouse">
								<label class="form-check-label" for="DCClubHouse">Club House</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCClubHouse" checked>
								<label class="form-check-label" for="DCClubHouse">Club House</label>
							<?php endif ?>
						</div>
 					</div>
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCEquipoDePresion): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCEquipoDePresion">
								<label class="form-check-label" for="DCEquipoDePresion">Equipo De Presión</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCEquipoDePresion" checked>
								<label class="form-check-label" for="DCEquipoDePresion">Equipo De Presión</label>
							<?php endif ?>
						</div>
 					</div>
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCGarajesResidentes): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCGarajesResidentes">
								<label class="form-check-label" for="DCGarajesResidentes">Garajes Residentes</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCGarajesResidentes" checked>
								<label class="form-check-label" for="DCGarajesResidentes">Garajes Residentes</label>
							<?php endif ?>
						</div>
 					</div>
				</div>
				<div class="row mt-3">
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCGarajesVisitantes): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCGarajesVisitantes">
								<label class="form-check-label" for="DCGarajesVisitantes">Garajes Visitantes</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCGarajesVisitantes" checked>
								<label class="form-check-label" for="DCGarajesVisitantes">Garajes Visitantes</label>
							<?php endif ?>
						</div>
 					</div>
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCGimnasio): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCGimnasio">
								<label class="form-check-label" for="DCGimnasio">Gimnasio</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCGimnasio" checked>
								<label class="form-check-label" for="DCGimnasio">Gimnasio</label>
							<?php endif ?>
						</div>
 					</div>
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCGolfito): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCGolfito">
								<label class="form-check-label" for="DCGolfito">Golfito</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCGolfito" checked>
								<label class="form-check-label" for="DCGolfito">Golfito</label>
							<?php endif ?>
						</div>
 					</div>
				</div>
				<div class="row mt-3">
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCGuarderia): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCGuarderia">
								<label class="form-check-label" for="DCGuarderia">Guardería</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCGuarderia" checked>
								<label class="form-check-label" for="DCGuarderia">Guardería</label>
							<?php endif ?>
						</div>
 					</div>
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCJuegosNinos): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCJuegosNinos">
								<label class="form-check-label" for="DCJuegosNinos">Juegos Niños</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCJuegosNinos" checked>
								<label class="form-check-label" for="DCJuegosNinos">Juegos Niños</label>
							<?php endif ?>
						</div>
 					</div>
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCPiscina): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCPiscina">
								<label class="form-check-label" for="DCPiscina">Piscina</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCPiscina" checked>
								<label class="form-check-label" for="DCPiscina">Piscina</label>
							<?php endif ?>
						</div>
 					</div>
				</div>
				<div class="row mt-3">
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCPlantaElectrica): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCPlantaElectrica">
								<label class="form-check-label" for="DCPlantaElectrica">Planta Eléctrica</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCPlantaElectrica" checked>
								<label class="form-check-label" for="DCPlantaElectrica">Planta Eléctrica</label>
							<?php endif ?>
						</div>
 					</div>
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCPorteria): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCPorteria">
								<label class="form-check-label" for="DCPorteria">Portería</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCPorteria" checked>
								<label class="form-check-label" for="DCPorteria">Portería</label>
							<?php endif ?>
						</div>
 					</div>
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCSalonComunal): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCSalonComunal">
								<label class="form-check-label" for="DCSalonComunal">Salón Comunal</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCSalonComunal" checked>
								<label class="form-check-label" for="DCSalonComunal">Salón Comunal</label>
							<?php endif ?>
						</div>
 					</div>
				</div>
				<div class="row mt-3">
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCSalonDeJuegos): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCSalonDeJuegos">
								<label class="form-check-label" for="DCSalonDeJuegos">Salón De Juegos</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCSalonDeJuegos" checked>
								<label class="form-check-label" for="DCSalonDeJuegos">Salón De Juegos</label>
							<?php endif ?>
						</div>
 					</div>
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCSauna): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCSauna">
								<label class="form-check-label" for="DCSauna">Sauna</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCSauna" checked>
								<label class="form-check-label" for="DCSauna">Sauna</label>
							<?php endif ?>
						</div>
 					</div>
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCShutBasuras): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCShutBasuras">
								<label class="form-check-label" for="DCShutBasuras">Shut Basuras</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCShutBasuras" checked>
								<label class="form-check-label" for="DCShutBasuras">Shut Basuras</label>
							<?php endif ?>
						</div>
 					</div>
				</div>
				<div class="row mt-3">
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCTanqueDeAgua): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCTanqueDeAgua">
								<label class="form-check-label" for="DCTanqueDeAgua">Tanque De Agua</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCTanqueDeAgua" checked>
								<label class="form-check-label" for="DCTanqueDeAgua">Tanque De Agua</label>
							<?php endif ?>
						</div>
 					</div>
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCTeatrino): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCTeatrino">
								<label class="form-check-label" for="DCTeatrino">Teatrino</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCTeatrino" checked>
								<label class="form-check-label" for="DCTeatrino">Teatrino</label>
							<?php endif ?>
						</div>
 					</div>
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCTerrazaComunal): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCTerrazaComunal">
								<label class="form-check-label" for="DCTerrazaComunal">Terraza Comunal</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCTerrazaComunal" checked>
								<label class="form-check-label" for="DCTerrazaComunal">Terraza Comunal</label>
							<?php endif ?>
						</div>
 					</div>
				</div>
				<div class="row mt-3">
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCTurco): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCTurco">
								<label class="form-check-label" for="DCTurco">Turco</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCTurco" checked>
								<label class="form-check-label" for="DCTurco">Turco</label>
							<?php endif ?>
						</div>
 					</div>
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCVigilancia24Horas): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCVigilancia24Horas">
								<label class="form-check-label" for="DCVigilancia24Horas">Vigilancia 24 Horas</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCVigilancia24Horas" checked>
								<label class="form-check-label" for="DCVigilancia24Horas">Vigilancia 24 Horas</label>
							<?php endif ?>
						</div>
 					</div>
					<div class="col-5 col-sm-2">
						<div class="form-check">
							<?php if (!$avaluo->DCZonaVerde): ?>
								<input class="form-check-input" type="checkbox" value="" id="DCZonaVerde">
								<label class="form-check-label" for="DCZonaVerde">Zona Verde</label>
							<?php else: ?>
								<input class="form-check-input" type="checkbox" value="" id="DCZonaVerde" checked>
								<label class="form-check-label" for="DCZonaVerde">Zona Verde</label>
							<?php endif ?>
						</div>
 					</div>
				</div>
				<div class="row mt-5">					
					<div class="col-12">
						<label for="DCOtros" class="form-label">Otros:</label>
						<textarea
							class="form-control"
							name="DCOtros"
							id="DCOtros"
							rows="3"
						><?php echo $avaluo->DCOtros; ?></textarea>
					</div>
				</div>
				

			</div>

			<div class="container">
				<div class="row mt-5">
					<div class="col-12">
					<p>EDIFICACIÓN ACABADOS</p>
					<hr />
				</div>
				</div>
				<div class="row mt-5">
				<div class="col-12">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>									
										<th scope="col" style="text-align:center">RECINTO</th>
										<th scope="col" style="text-align:center">ACABADOS PISOS</th>
										<th scope="col" style="text-align:center">ACABADOS MUROS</th>
										<th scope="col" style="text-align:center">
											<button 
											id="AddEA" 
											class="btn btn-link" 
											type="button" 										
											data-bs-toggle="tooltip" 
											data-bs-placement="top"											
											title="Agregar Valor">
												<i class="bi bi-file-earmark-plus icono"></i>
											</button>
										</th>
									</tr>
								</thead>
								<tbody id="tablaEA">
								<?php 
								 $lista = json_decode($avaluo->jsonEA);								
								 foreach ($lista as $item)
								 {
									echo "<tr>";
                                    echo "<td class='text-center'>".$item->{'recinto'}."</td>";
									echo "<td class='text-center'>".$item->{'AcabadosPisos'}."</td>";
									echo "<td class='text-center'>".$item->{'AcabadosMuros'}."</td>";
									echo "<td class='text-center eliminar'><a data-id='".$item->{'id'}."' data-toggle='EliminarFilaTablaEA'><i class='bi bi-trash'></i></a></td>";
									echo "</tr>";
								 } 
								?>								
								</tbody>
							</table>
						</div>						
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row mt-5">
						<div class="col-12">
							<p>COMPARABLES DE INMUEBLES	EN VENTA SEMEJANTES EN USO AL SUJETO (TERRENO + CONSTRUCCIONES)</p>
							<hr />
						</div>
				</div>
				<div class="row mt-5">
					<div class="col-12">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th scope="col" class="col-2" style="text-align:center">DIRECCIÓN</th>
										<th scope="col" class="col-1" style="text-align:center">EDAD<br/>(AÑOS)</th>
										<th scope="col" class="col-1" style="text-align:center">ÁREA LOTE</th>
										<th scope="col" class="col-1" style="text-align:center">ÁREA CONSTR.</th>
										<th scope="col" class="col-2" style="text-align:center">VALOR CONSTR</th>
										<th scope="col" class="col-2" style="text-align:center">VALOR COMERCIAL</th>
										<th scope="col" class="col-2" style="text-align:center">FUENTE</th>
									</tr>
								</thead>
								<tbody>
								<tr>
									<td class="col-3">										
										<input
											type="text"
											class="form-control"
											name="ICDireccion1"
											id="ICDireccion1"
											placeholder="Escribir..."
											value="<?php echo $avaluo->ICDireccion1; ?>"
										/>

									</td>
									<td class="col-1"><input
											type="number"
											class="form-control"
											name="ICEdad1"
											id="ICEdad1"
											min=0
											placeholder="0"
											value="<?php echo $avaluo->ICEdad1; ?>"
										/>
									</td>
									<td class="col-1"><input
											type="number"
											class="form-control"
											name="ICAreaLote1"
											id="ICAreaLote1"
											min=0
											placeholder="0"
											value="<?php echo $avaluo->ICAreaLote1; ?>"
										/>
									</td>
									<td class="col-1"><input
											type="number"
											class="form-control"
											name="ICAreaConstr1"
											id="ICAreaConstr1"
											min=0
											placeholder="0"
											value="<?php echo $avaluo->ICAreaConstr1; ?>"
										/>
									</td>
									<td class="col-2"><input
											type="text"
											class="form-control"
											name="ICValorConstr1"
											id="ICValorConstr1"											
											placeholder="0,00"
											data-toggle="cambio"
											value="<?php echo utilidades::formatearNumero($avaluo->ICValorConstr1); ?>"
										/>
									</td>
									<td class="col-2"><input
											type="text"
											class="form-control"
											name="ICValorComercial1"
											id="ICValorComercial1"
											data-toggle="cambio"										
											placeholder="0,00"
											value="<?php echo utilidades::formatearNumero($avaluo->ICValorComercial1); ?>"
										/>
									</td>
									<td class="col-2"><input
											type="text"
											class="form-control"
											name="ICFuente1"
											id="ICFuente1"
											placeholder="Escribir..."
											value="<?php echo $avaluo->ICFuente1; ?>"
										/>
									</td>											
								</tr>
								<tr>
									<td class="col-3">										
										<input
											type="text"
											class="form-control"
											name="ICDireccion2"
											id="ICDireccion2"
											placeholder="Escribir..."
											value="<?php echo $avaluo->ICDireccion2; ?>"
										/>

									</td>
									<td class="col-1"><input
											type="number"
											class="form-control"
											name="ICEdad2"
											id="ICEdad2"
											min=0
											placeholder="0"
											value="<?php echo $avaluo->ICEdad2; ?>"
										/>
									</td>
									<td class="col-1"><input
											type="number"
											class="form-control"
											name="ICAreaLote2"
											id="ICAreaLote2"
											min=0
											placeholder="0"
											value="<?php echo $avaluo->ICAreaLote2; ?>"
										/>
									</td>
									<td class="col-1"><input
											type="number"
											class="form-control"
											name="ICAreaConstr2"
											id="ICAreaConstr2"
											min=0
											placeholder="0"
											value="<?php echo $avaluo->ICAreaConstr2; ?>"
										/>
									</td>
									<td class="col-2"><input
											type="text"
											class="form-control"
											name="ICValorConstr2"
											id="ICValorConstr2"
											placeholder="0,00"
											data-toggle="cambio"
											value="<?php echo utilidades::formatearNumero($avaluo->ICValorConstr2); ?>"
										/>
									</td>
									<td class="col-2"><input
											type="text"
											class="form-control"
											name="ICValorComercial2"
											id="ICValorComercial2"
											placeholder="0,00"
											data-toggle="cambio"
											value="<?php echo utilidades::formatearNumero($avaluo->ICValorComercial2); ?>"
										/>
									</td>
									<td class="col-2"><input
											type="text"
											class="form-control"
											name="ICFuente2"
											id="ICFuente2"
											placeholder="Escribir..."
											value="<?php echo $avaluo->ICFuente2; ?>"
										/>
									</td>											
								</tr>
								<tr>
									<td class="col-3">										
										<input
											type="text"
											class="form-control"
											name="ICDireccion3"
											id="ICDireccion3"
											placeholder="Escribir..."
											value="<?php echo $avaluo->ICDireccion3; ?>"
										/>

									</td>
									<td class="col-1"><input
											type="number"
											class="form-control"
											name="ICEdad3"
											id="ICEdad3"
											min=0
											placeholder="0"
											value="<?php echo $avaluo->ICEdad3; ?>"
										/>
									</td>
									<td class="col-1"><input
											type="number"
											class="form-control"
											name="ICAreaLote3"
											id="ICAreaLote3"
											min=0
											placeholder="0"
											value="<?php echo $avaluo->ICAreaLote3; ?>"
										/>
									</td>
									<td class="col-1"><input
											type="number"
											class="form-control"
											name="ICAreaConstr3"
											id="ICAreaConstr3"
											min=0
											placeholder="0"
											value="<?php echo $avaluo->ICAreaConstr3; ?>"
										/>
									</td>
									<td class="col-2"><input
											type="text"
											class="form-control"
											name="ICValorConstr3"
											id="ICValorConstr3"
											placeholder="0,00"
											data-toggle="cambio"
											value="<?php echo utilidades::formatearNumero($avaluo->ICValorConstr3); ?>"
										/>
									</td>
									<td class="col-2"><input
											type="text"
											class="form-control"
											name="ICValorComercial3"
											id="ICValorComercial3"
											placeholder="0,00"
											data-toggle="cambio"
											value="<?php echo utilidades::formatearNumero($avaluo->ICValorComercial3); ?>"
										/>
									</td>
									<td class="col-2"><input
											type="text"
											class="form-control"
											name="ICFuente3"
											id="ICFuente3"
											placeholder="Escribir..."
											value="<?php echo $avaluo->ICFuente3; ?>"
										/>
									</td>											
								</tr>
								<tr>
									<td class="col-3" style="text-align:center">										
									<span class="badge fs-3" style="background-color: #6868f0!important;">SUJETO</span>
									</td>
									<td class="col-1"><input
											type="number"
											class="form-control"
											name="ICEdad4"
											id="ICEdad4"
											min=0
											placeholder="0"
											value="<?php echo $avaluo->ICEdad4; ?>"
										/>
									</td>
									<td class="col-1"><input
											type="number"
											class="form-control"
											name="ICAreaLote4"
											id="ICAreaLote4"
											min=0
											placeholder="0"
											value="<?php echo $avaluo->ICAreaLote4; ?>"
										/>
									</td>
									<td class="col-1"><input
											type="number"
											class="form-control"
											name="ICAreaConstr4"
											id="ICAreaConstr4"
											min=0
											placeholder="0"
											value="<?php echo $avaluo->ICAreaConstr4; ?>"
										/>
									</td>
									<td colspan="3" class="col-6">
									</td>																				
								</tr>						
								</tbody>
							</table>
						</div>						
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row mt-5">
						<div class="col-12">
							<p>DIAGNÓSTICO VALORES DE REFERENCIA</p>
							<hr />
						</div>
				</div>
				<div class="row mt-5">
				<div class="col-12">
						<label for="DVRDiagnostico" class="form-label"
							>Diagnóstico:</label
						>
						<textarea
							class="form-control"
							name="DVRDiagnostico"
							id="DVRDiagnostico"
							rows="3"
						><?php echo $avaluo->DVRDiagnostico; ?></textarea>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row mt-5">
						<div class="col-12">
							<p>CUADRO DE VALORACIÓN TERRENO</p>
							<hr />
						</div>
				</div>
				<div class="row mt-5">
					<div class="col-12">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th scope="col" class="col-1" style="text-align:center">TERRENO</th>
										<th scope="col" class="col-3" style="text-align:center">DESCRIPCIÓN</th>
										<th scope="col" class="col-1" style="text-align:center">ÁREA</th>
										<th scope="col" class="col-1" style="text-align:center">UNIDAD DE<br/>MEDIDA</th>
										<th scope="col" class="col-2" style="text-align:center">VALOR UNITARIO</th>
										<th scope="col" class="col-2" style="text-align:center">VALOR</th>
										<th scope="col" class="col-2" style="text-align:center">PORCENTAJE (%)</th>
									</tr>
								</thead>
								<tbody>
								<tr>
									<td class="col-1">										
										<input
											type="text"
											class="form-control"
											name="CVTTerreno"
											id="CVTTerreno"
											placeholder="Escribir..."
											value="<?php echo $avaluo->CVTTerreno; ?>"
										/>

									</td>
									<td class="col-3"><input
											type="text"
											class="form-control"
											name="CVTDescripcion"
											id="CVTDescripcion"											
											placeholder="Escribir..."
											value="<?php echo $avaluo->CVTDescripcion; ?>"
										/>
									</td>
									<td class="col-1"><input
											type="text"
											class="form-control"
											name="CVTArea"
											id="CVTArea"							data-toggle="cambio"	
											placeholder="0,00"
											min="0"
											value="<?php echo utilidades::formatearNumero($avaluo->CVTArea); ?>"
										/>
									</td>
									<td class="col-1"><input
											type="text"
											class="form-control"
											name="CVTUniadDeMedida"
											id="CVTUniadDeMedida"										
											placeholder=""
											value="<?php echo $avaluo->CVTUniadDeMedida; ?>"
										/>
									</td>
									<td class="col-2"><input
											type="text"
											class="form-control"
											name="CVTValorUnitario"
											id="CVTValorUnitario"											
											placeholder="0,00"
											data-toggle="cambio"
											value="<?php echo utilidades::formatearNumero($avaluo->CVTValorUnitario); ?>"
										/>
									</td>
									<td class="col-2"><input
											type="text"
											class="form-control"
											name="CVTValor"
											id="CVTValor"
											data-toggle="cambio"										
											placeholder="0,00"
											value="<?php echo utilidades::formatearNumero($avaluo->CVTValor); ?>"
										/>
									</td>
									<td class="col-2"><input
											type="text"
											class="form-control"
											name="CVTPorcentaje"
											id="CVTPorcentaje"
											data-toggle="cambio"										
											placeholder="0,00"
											value="<?php echo utilidades::formatearNumero($avaluo->CVTPorcentaje); ?>"
										/>
									</td>											
								</tr>
								<tr>
									<td class="col-4" colspan="2" style="text-align:center">										
										<span class="badge fs-3" style="background-color: #6868f0!important;">SUBTOTAL TERRENO</span>
									</td>
									<td class="col-1 fs-5">									
									    <input
											type="text"
											class="form-control"					placeholder="0,00"			
											id="CVTAreaT"
											value="<?php echo utilidades::formatearNumero($avaluo->CVTArea); ?>"
											disabled
										/>
									</td>
									<td class="col-3" colspan="2">&nbsp;</td>
									<td class="col-2">										
										<input
											type="text"
											class="form-control"										
											id="CVTValorT"
											disabled
											value="<?php echo utilidades::formatearNumero($avaluo->CVTValor); ?>"
										/>
									</td>
									<td class="col-2">
										<input
												type="text"
												class="form-control"										
												id="CVTPorcentajeT"
												disabled
												value="<?php echo utilidades::formatearNumero($avaluo->CVTPorcentaje); ?>"
											/>	
									</td>
								</tr>												
								</tbody>
							</table>
						</div>						
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row mt-5">
						<div class="col-12">
							<p>CUADRO DE VALORACIÓN EDIFICACIONES</p>
							<hr />
						</div>
				</div>
				<div class="row mt-5">
					<div class="col-12">
						<div class="table-responsive">
							<table class="table">
								<thead>
									<tr>
										<th scope="col" class="col-1" style="text-align:center">EDIFICACIONES</th>
										<th scope="col" class="col-3" style="text-align:center">DESCRIPCIÓN</th>
										<th scope="col" class="col-1" style="text-align:center">ÁREA</th>
										<th scope="col" class="col-1" style="text-align:center">UNIDAD DE<br/>MEDIDA</th>
										<th scope="col" class="col-2" style="text-align:center">VALOR UNITARIO</th>
										<th scope="col" class="col-2" style="text-align:center">VALOR</th>
										<th scope="col" class="col-2" style="text-align:center">PORCENTAJE (%)</th>
									</tr>
								</thead>
								<tbody>
								<tr>
									<td class="col-1">										
										<input
											type="text"
											class="form-control"
											name="CVEEdificaciones"
											id="CVEEdificaciones"
											placeholder="Escribir..."
											value="<?php echo $avaluo->CVEEdificaciones; ?>"
										/>

									</td>
									<td class="col-3"><input
											type="text"
											class="form-control"
											name="CVEDescripcion"
											id="CVEDescripcion"											
											placeholder="Escribir..."
											value="<?php echo $avaluo->CVEDescripcion; ?>"
										/>
									</td>
									<td class="col-1"><input
											type="number"
											class="form-control"
											name="CVEArea"
											id="CVEArea"										
											placeholder=""
											min="0"
											value="<?php echo $avaluo->CVEArea; ?>"
										/>
									</td>
									<td class="col-1"><input
											type="text"
											class="form-control"
											name="CVEUniadDeMedida"
											id="CVEUniadDeMedida"										
											placeholder=""
											value="<?php echo $avaluo->CVEUniadDeMedida; ?>"
										/>
									</td>
									<td class="col-2"><input
											type="text"
											class="form-control"
											name="CVEValorUnitario"
											id="CVEValorUnitario"											
											placeholder="0,00"
											data-toggle="cambio"
											value="<?php echo utilidades::formatearNumero($avaluo->CVEValorUnitario); ?>"
										/>
									</td>
									<td class="col-2"><input
											type="text"
											class="form-control"
											name="CVEValor"
											id="CVEValor"
											data-toggle="cambio"										
											placeholder="0,00"
											value="<?php echo utilidades::formatearNumero($avaluo->CVEValor); ?>"
										/>
									</td>
									<td class="col-2"><input
											type="text"
											class="form-control"
											name="CVEPorcentaje"
											id="CVEPorcentaje"
											data-toggle="cambio"										
											placeholder="0,00"
											value="<?php echo utilidades::formatearNumero($avaluo->CVEPorcentaje); ?>"
										/>
									</td>											
								</tr>
								<tr>
									<td class="col-4" colspan="2" style="text-align:center">										
										<span class="badge fs-3" style="background-color: #6868f0!important;">SUBTOTAL EDIFICACIONES</span>
									</td>
									<td class="col-1 fs-5">									
									    <input
											type="text"
											class="form-control"										
											id="CVEAreaT"
											disabled
											value="<?php echo utilidades::formatearNumero($avaluo->CVEArea); ?>"
										/>
									</td>
									<td class="col-3" colspan="2">&nbsp;</td>
									<td class="col-2">										
										<input
											type="text"
											class="form-control"										
											id="CVEValorT"
											disabled
											value="<?php echo utilidades::formatearNumero($avaluo->CVEValor); ?>"
										/>
									</td>
									<td class="col-2">
										<input
												type="text"
												class="form-control"										
												id="CVEPorcentajeT"
												disabled
												value="<?php echo utilidades::formatearNumero($avaluo->CVEPorcentaje); ?>"
											/>	
									</td>
								</tr>												
								</tbody>
							</table>
						</div>						
					</div>
				</div>
			</div>

			
			<div class="container mt-5">

				<div class="row mt-5">
					<div class="col-12">
						<p>CROQUIS</p>
						<hr />
					</div>					
				</div>

				<div class="row mt-5">
					<div class="text-center">
						<input id="CroquisImg" name="CroquisImg" type="file" accept="image/*" />
						<label for="CroquisImg" class="area-file">
							<img
								class="alinear"
								src="../file/svg/cloud_upload_black_24dp.svg"
								alt=""
							/>Seleccione Imagen
						</label>
					</div>
					
					<div class="text-center">
					<a id="img-preview-CroquisImg" style="cursor: pointer">
						<?php if ($avaluo->CroquisImg==null || $avaluo->CroquisImg==''): ?>
                            <img id="blah3" class="viewImg" src="../file/img/no-image.png"/>
                        <?php else: ?>
                            <img id="blah3" class="viewImg" src="<?php echo utilidades::getUrlBase().$avaluo->CroquisImg; ?>"/>
                        <?php endif ?>
				   </a>
					</div>
					
					<div class="text-center">
						<button
							id="eliminar3"
							type="button"
							class="<?php if($avaluo->CroquisImg==null || $avaluo->CroquisImg=='') echo 'btn btn-primary ocultar'; else echo 'btn btn-primary'; ?>"
						>
							X
						</button>
					</div>
				</div>

			</div>


			<div class="container mt-5">
				<div class="row mt-5">
					<div class="col-12">
						<p>REPORTE FOTOGRÁFICO</p>
						<hr />
					</div>					
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="TituloRF" class="form-label">Título de Imágenes:</label>
						<input
							type="text"
							class="form-control"						
							id="TituloRF"
							placeholder=""
						/>
					</div><div class="col-12 mt-3">
					<div class="text-center">
						<input id="RFImg2" name="RFImg" type="file" accept="image/*" multiple />
						<label for="RFImg2" class="area-file">
							<img
								class="alinear"
								src="../file/svg/cloud_upload_black_24dp.svg"
								alt=""
							/>Seleccione Una o Varias Imágenes
						</label>
					</div>
					</div>							
				<div id="rfSalida" class="row mt-5">				
					<?php
						$lista = json_decode($avaluo->RFImg);
						$s='';
						foreach ($lista as $item)
						{
							echo '<div class="col-12 col-sm-4 mt-5">';
							echo '<div class="card" style="width: 18rem;">';
							echo '<img style="cursor: pointer" data-toggle="MostarModalPreview" width="300" height="300" class="card-img-top" src="'.utilidades::getUrlBase().$item->url.'" alt="Card image cap">';
							echo '<div class="card-body">';
							echo '<h5 class="card-title">'.$item->{'titulo'}.'</h5>';
							echo '<a data-id='.$item->{'id'}.' data-toggle="EliminarReporteFotografico2" style="cursor: pointer" class="btn btn-primary">Eliminar</a>';
							echo '</div></div></div>';
						}									
					?>
				</div>
			</div>


			<div class="container mt-5">
				<div class="row mt-5">
					<div class="col-12">
						<p>REPORTE FOTOGRÁFICO ANEXOS</p>
						<hr />
					</div>					
				</div>
				<div class="row mt-5">
					<div class="col-12 col-sm-4">
						<label for="TituloRFA" class="form-label">Título de Imágenes:</label>
						<input
							type="text"
							class="form-control"						
							id="TituloRFA"
							placeholder=""
						/>
					</div>
					<div class="col-12 mt-3">
						<div class="text-center">
							<input id="RFAImg2" name="RFAImg" type="file" accept="image/*" multiple />
							<label for="RFAImg2" class="area-file">
							<img
								class="alinear"
								src="../file/svg/cloud_upload_black_24dp.svg"
								alt=""
							/>Seleccione Una o Varias Imágenes
							</label>
						</div>
					</div>							
				<div id="rfaSalida" class="row mt-5">
					<?php
						$lista = json_decode($avaluo->RFAImg);
						$s='';
						foreach ($lista as $item)
						{
							echo '<div class="col-12 col-sm-4 mt-5">';
							echo '<div class="card" style="width: 18rem;">';
							echo '<img style="cursor: pointer" data-toggle="MostarModalPreview" width="300" height="300" class="card-img-top" src="'.utilidades::getUrlBase().$item->url.'" alt="Card image cap">';
							echo '<div class="card-body">';
							echo '<h5 class="card-title">'.$item->{'titulo'}.'</h5>';
							echo '<a data-id='.$item->{'id'}.' data-toggle="EliminarReporteFotograficoAnexos2" style="cursor: pointer" class="btn btn-primary">Eliminar</a>';
							echo '</div></div></div>';
						}									
					?>
				</div>
			</div>

			
			<!--  -->
			
            <input class="invisible" type="text" name="jsonEA" id="jsonEA" value='<?php echo $avaluo->jsonEA; ?>'/>
		</form>

		<div class="mt-5 mb-5">&nbsp;</div>
		<div class="mt-5 mb-5">&nbsp;</div>

		<div id="spinner" class="overlay ocultar">
			<div class="center">
				<div class="spinner"></div>
			</div>
		</div>
	

		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Vista previa de la imagen</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="m-0 row justify-content-center">
						<div class="col-auto p-5 text-center">
							<img id="ImgPreview" src="" />
						</div>
					</div>
				</div>			
				</div>
			</div>
		</div>


		<div class="modal fade" id="ModalAddEA" tabindex="-1" aria-labelledby="ModalAddEALabel" aria-hidden="true">
			<div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="ModalAddEALabel">Agregar Valor</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="container">
					<div class="row">
							<div class="col-12">
								<label for="RECINTO" class="form-label">RECINTO:</label>
								<input
									type="text"
									class="form-control"								
									id="RECINTO"
									placeholder=""
								/>
							</div>
					</div>
					<div class="row mt-3">							
							<div class="col-12">
								<label for="ACABADOSPISOS" class="form-label">ACABADOS PISOS:</label>
								<input
									type="text"
									class="form-control"								
									id="ACABADOSPISOS"
									placeholder=""
								/>
							</div>
					</div>
					<div class="row mt-3">							
							<div class="col-12">
								<label for="ACABADOSMUROS" class="form-label">ACABADOS MUROS:</label>
								<input
									type="text"
									class="form-control"								
									id="ACABADOSMUROS"
									placeholder=""
								/>
					</div>
						
					</div>
					<div class="row mt-3">
						<div class="col-12">
							<button 
								id="AddEATable" 
								class="btn btn-primary col-12" 
								type="button">
								Agregar
							</button>
						</div>
					</div>
				</div>			
				</div>
			</div>
		</div>
		 

		

		
		<?php include './cambioClave.php'  ?>
		
		
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script> 
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
		<script src="../global/js/constante.js"></script>
		<script src="../js/avaluo.js"></script>
		<script src="../js/eventosheader.js"></script>
		
	</body>
</html>
