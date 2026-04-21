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


   ob_start();
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Formulario Avaluo</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" type="text/css" href="<?php echo utilidades::getUrlBase(); ?>/css/estilos.css"
        media="screen" />


    <style type="text/css">
    * {
        padding: 0;
        margin: 0;
        font-size: 11px;
    }

    .mt-1 {
        margin-top: 1% !important;
    }

    .mt-2 {
        margin-top: 2% !important;
    }

    .mt-3 {
        margin-top: 3% !important;
    }

    .mt-4 {
        margin-top: 4% !important;
    }

    .mt-5 {
        margin-top: 5% !important;
    }

    .mt-6 {
        margin-top: 6% !important;
    }

    .mt-7 {
        margin-top: 7% !important;
    }

    .mt-8 {
        margin-top: 8% !important;
    }

    .mt-9 {
        margin-top: 9% !important;
    }

    .mt-10 {
        margin-top: 10% !important;
    }

    .mt-15 {
        margin-top: 15% !important;
    }

    .mt-20 {
        margin-top: 20% !important;
    }

    .mt-25 {
        margin-top: 25% !important;
    }

    .mt-30 {
        margin-top: 30% !important;
    }

    .mt-35 {
        margin-top: 35% !important;
    }

    .tex {
        color: #1d429a;
    }

    .carta-titulo {
        color: #1d429a;
        text-transform: uppercase;
    }



    tr,
    td {
        width: 50%;
        min-width: 50%;
    }

    table {
        width: 100% !important;

    }

    td {
        padding: 0.3rem 0.2rem 0.3rem 0.2rem !important;
        vertical-align: top;
    }

    td img {
        border: 0.2rem solid #eee;
    }

    .bordes {
        border: 1px solid rgba(0, 0, 0, .3);
    }

    .banner {
        background-color: #1d429a;
        /*#6868f0;*/
        border-color: #1d429a;
        position: absolute;
        top: 0px;
        left: 0px;
        right: 0px;
        height: 30px;
        width: 100%;
        z-index: -1;

    }

    .banner::before {
        content: "";
        display: block;
        position: absolute;
        width: 55%;
        height: 0;
        top: 16;
        left: 45%;
        border-right: 30px solid transparent;
        border-left: 30px solid transparent;
        border-top: 30px solid #1d429a;
        transform: skew(45deg);
    }

    footer {
        position: absolute;
        bottom: 45;
        width: 100%;
        height: 40px;
        color: white;
        z-index: -5;
        left: 0;
    }




    .marca-de-agua {

        background-repeat: no-repeat;
        background-position: center;
        width: 100%;
        height: auto;
        margin: auto;
    }

    .marca-de-agua img {
        padding: 0;
        width: 100%;
        height: auto;
        opacity: 0.080;
    }

    .caja {
        background-color: #1d429a;
        border-color: #1d429a;
        color: #fff;
        float: left;
        margin-right: 0;
    }

    .raya {
        /* border-bottom: 1px solid #1d429a; */
        border-bottom: 1px solid rgba(29, 66, 154, .2);
    }

    .fondo {
        background-image: url("<?php echo utilidades::getUrlBase()?>/file/img/fondo.png");
        background-repeat: no-repeat;
        width: 100%;
        height: 1344px;
        z-index: -500;
        position: relative;
    }

    .fondo-hijo {
        position: absolute;
        top: 170;
        left: 15;
    }


    .checkbox-selecionado {
        width: 15px;
        height: 15px;
        border-radius: 50%;
        border: solid 1px #1d429a;
        background: #1d429a;
        position: relative;
        float: left;
        margin-right: 5px;
    }

    .checkbox-selecionado-interno {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        border: solid 1px width;
        background: #000;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .checkbox-no-selecionado {
        width: 15px;
        height: 15px;
        border-radius: 50%;
        border: solid 1px #1d429a;
        position: relative;
        float: left;
        margin-right: 2px;
    }


    .fuente-10 {
        font-size: 10px;
    }
    </style>


</head>


<body>

    <div class="fondo">
        <div class="container fondo-hijo">
            <div class="row">
                <table border="0">
                    <tr>
                        <th><span class="tex">DIRECCIÓN</span></th>
                        <th><span class="tex">GENERAL</span></th>
                    </tr>
                    <tr>
                        <td><?php echo $avaluo->Direccion; ?></td>
                        <td><span class="tex">Fecha de visita:</span>&nbsp;<?php echo $avaluo->FechaDeVisita; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="tex">Departamento:</span>&nbsp;<?php echo $avaluo->Departamento; ?></td>
                        <td><span class="tex">Fecha del avalúo:</span>&nbsp;<?php echo $avaluo->FechaDelAvalio; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="tex">Municipio:</span>&nbsp;<?php echo $avaluo->Municipio; ?></td>
                        <td><span class="tex">Tipo de avalúo:</span>&nbsp;<?php echo $avaluo->TipoDeAvaluo; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Barrio:</span>&nbsp;<?php echo $avaluo->Barrio; ?></td>
                        <td><span class="tex">Finalidad del
                                avalúo:</span>&nbsp;<?php echo $avaluo->FinalidadDelAvaluo; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Código DANE:</span>&nbsp;<?php echo $avaluo->CodigoDane; ?></td>
                        <td><span class="tex">Objeto del avalúo:</span>&nbsp;<?php echo $avaluo->ObjetoDelAvaluo; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php if ($avaluo->ImgDireccion==null || $avaluo->ImgDireccion==''): ?>
                            <img id="blah" src="<?php echo utilidades::getUrlBase()?>/file/img/no-image.png" />
                            <?php else: ?>
                            <img id="blah" width="400" height="360"
                                src="<?php echo utilidades::getUrlBase().$avaluo->ImgDireccion; ?>" />
                            <?php endif ?>
                        </td>
                        <td style="vertical-align: top;">
                            <table border="0">
                                <tr>
                                    <td><span class="tex">Solicitante:</span></td>
                                    <td><?php echo $avaluo->Solicitante; ?></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Tipo de documento:</span></td>
                                    <td><?php echo utilidades::FormatearTipoDocumento($avaluo->TipoDeDocumento, $avaluo->NumeroDocumento); ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Tipo de bien:</span></td>
                                    <td><?php echo $avaluo->TipoDeBien; ?></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Sector:</span></td>
                                    <td><?php echo $avaluo->Sector; ?></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Vivienda:</span></td>
                                    <td><?php echo $avaluo->ViviendaInteresSocial == 1? "SI" : "NO";?></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Estrato:</span></td>
                                    <td><?php echo $avaluo->Estrato;?></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Producto:</span></td>
                                    <td><?php echo $avaluo->Producto;?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><span class="tex">MATRÍCULA INMOBILIARIA</span></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="vertical-align: top;">
                                        <table>
                                            <tr>
                                                <th><span class="tex">TIPO</span></th>
                                                <th><span class="tex">NÚMERO</span></th>
                                                <th><span class="tex">TIPO</span></th>
                                                <th><span class="tex">NÚMERO</span></th>
                                            </tr>
                                            <tr>
                                                <td><?php echo $avaluo->matriculainmTipo1;?></td>
                                                <td><?php echo $avaluo->matriculainmNumero1;?></td>
                                                <td><?php echo $avaluo->matriculainmTipo2;?></td>
                                                <td><?php echo $avaluo->matriculainmNumero2;?></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2"><span
                                class="tex">Latitud:</span>&nbsp;<?php echo $avaluo->Latitud; ?>&nbsp;&nbsp;<span
                                class="tex">Longitud:</span>&nbsp;<?php echo $avaluo->Longitud; ?></td>
                    </tr>
                    <tr>
                        <td style="text-align:center">
                            <?php if ($avaluo->GeoLocalizacionImg==null || $avaluo->GeoLocalizacionImg==''): ?>
                            <img id="blah" src="<?php echo utilidades::getUrlBase()?>/file/img/no-image.png" />
                            <?php else: ?>
                            <img id="blah" width="400" height="350"
                                src="<?php echo utilidades::getUrlBase().$avaluo->GeoLocalizacionImg; ?>" />
                            <?php endif ?>
                        </td>
                        <td style="text-align:center">
                            <img id="blah" width="300" height="200"
                                src="<?php echo utilidades::getUrlBase()?>/file/img/firma.jpg" />
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>

    <div class="fondo">
        <div class="container fondo-hijo">
            <div class="row">

                <table border="0">
                    <tr>
                        <th><span class="tex">ASPECTOS JURÍDICOS</span></th>
                        <th><span class="tex">DESCRIPCIÓN GENERAL</span></th>
                    </tr>
                    <tr>
                        <td><span class="tex">Propietario:</span>&nbsp;<?php echo $avaluo->Propietario; ?></td>
                        <td rowspan="11"><?php echo $avaluo->DescripcionGeneral; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Número de escritura:</span>&nbsp;<?php echo $avaluo->NumeroDeEscritura; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="tex">Fecha:</span>&nbsp;<?php echo $avaluo->AspJFecha; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Número de notaría:</span>&nbsp;<?php echo $avaluo->NumeroDeNotaria; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="tex">Municipio:</span>&nbsp;<?php echo $avaluo->AspMunicipio; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Departamento:</span>&nbsp;<?php echo $avaluo->AspDepartamento; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">CHIP:</span>&nbsp;<?php echo $avaluo->Chip; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Cédula catastral:</span>&nbsp;<?php echo $avaluo->CedulaCatastral; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="tex">Tipo de propiedad:</span>&nbsp;<?php echo $avaluo->TipoDePropiedad; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="tex">Coeficiente de
                                copropiedad:</span>&nbsp;<?php echo $avaluo->CoeficienteDeCopropiedad; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Licencia de
                                construcción:</span>&nbsp;<?php echo $avaluo->LicenciaDeConstruccion; ?></td>
                    </tr>

                    <tr>
                        <td><span class="tex">INFORMACIÓN DE ÁREAS Y NORMATIVIDAD</span></td>
                        <td><span class="tex">OFERTA Y DEMANDA</span></td>
                    </tr>

                    <tr>
                        <td class="raya"><span class="tex">Información del área</span></td>
                        <td>
                            <div class="caja">TIEMPO ESPERADO DE<br />
                                COMERCIALIZACIÓN</div>
                            <div style="float: right; margin-left:5px">
                                <span class="tex"><?php echo $avaluo->TiempoEsperadoDeComercializacion; ?></span>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <table border="0">
                                <tr>
                                    <td>
                                        <div class="caja mt-5">ÁREA LOTE</div>
                                    </td>
                                    <td>
                                        <span class="tex"><?php echo $avaluo->AreaLote; ?></span>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td><span class="tex mt-5">Forma</span></td>
                                    <td><?php echo $avaluo->Forma; ?></td>
                                    <td><span class="tex">Topografía</span></td>
                                    <td><?php echo $avaluo->Topografia; ?></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Frente</span></td>
                                    <td><?php echo $avaluo->Frente; ?></td>
                                    <td><span class="tex">Fondo</span></td>
                                    <td><?php echo $avaluo->Fondo; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><span class="tex">Relación de frente/fondo</span></td>
                                    <td colspan="2"><?php echo $avaluo->RelacionFrenteFondo; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="raya"><span class="tex">Normas de uso de suelo</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><span class="tex">Decreto/Acuerdo</span></td>
                                    <td colspan="2"><?php echo $avaluo->DecretoAcuerdo; ?></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Uso principal</span></td>
                                    <td><?php echo $avaluo->UsoPrincipal; ?></td>
                                    <td><span class="tex">Altura permitida</span></td>
                                    <td><?php echo $avaluo->AlturaPermitida; ?></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Aislamiento posterior</span></td>
                                    <td><?php echo $avaluo->AislamientoPosterior; ?></td>
                                    <td><span class="tex">Aislamiento lateral</span></td>
                                    <td><?php echo $avaluo->AislamientoLateral; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><span class="tex">Índice de construcción</span></td>
                                    <td colspan="2"><?php echo $avaluo->IndiceDeConstruccion; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="raya"><span class="tex">Áreas construidas</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="caja mt-5">ÁREA VALORADA</div>
                                    </td>
                                    <td colspan="2">
                                        <div class="tex mt-5"><?php echo $avaluo->AreaValorada; ?></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td><span class="tex">Área medida en la inspección</span></td>
                                    <td><?php echo $avaluo->AreaMedidaEnLaInspeccion; ?></td>
                                    <td><span class="tex">Área registrada en título</span></td>
                                    <td><?php echo $avaluo->AreaRegistradaEnTitulo; ?></td>
                                </tr>

                                <tr>
                                    <td><span class="tex">Área susceptible de legalización</span></td>
                                    <td><?php echo $avaluo->AreaSusceptibleDeLegalizacion; ?></td>
                                    <td><span class="tex">Área catastral</span></td>
                                    <td><?php echo $avaluo->AreaCatastral; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><span class="tex">Área licencia de construcción</span></td>
                                    <td colspan="2"><?php echo $avaluo->AreaLicenciaDeConstruccion; ?></td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="raya"><span class="tex">Observaciones</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <?php echo $avaluo->AreaValoradaObservaciones; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <div class="mt-10">
                                <div class="raya"><span class="tex">Comportamiento oferta y demanda</span></div>
                                <p style="text-align: justify"><?php echo $avaluo->ComportamientoOfertayDemanda; ?>
                                </p>
                            </div>
                            <div class="mt-2">
                                <div class="raya"><span class="tex">Descripción sector, actividad inmobiliaria, vías
                                        importantes</span></div>
                                <p style="text-align: justify"><?php echo $avaluo->DSAIVI; ?>
                                </p>
                            </div>
                            <div class="mt-2">
                                <div class="raya"><span class="tex">Actualidad edificadora</span></div>
                                <p style="text-align: justify"><?php echo $avaluo->ActualidadEdificadora; ?>
                                </p>
                            </div>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>

    <div class="fondo">
        <div class="container fondo-hijo">
            <div class="row">
                <table>
                    <tr>
                        <th><span class="tex">SECTOR</span></th>
                        <th><span class="tex">EDIFICACIÓN ESTRUCTURA</span></th>
                    </tr>
                    <tr>
                        <td><span class="tex">Demanda/interés</span>&nbsp;<?php echo $avaluo->DemandaInteres; ?></td>
                        <td><span class="tex">Estado de la
                                construcción</span>&nbsp;<?php echo $avaluo->EstadoDeLaConstruccion; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Uso predominante</span>&nbsp;<?php echo $avaluo->UsoPredominante; ?></td>
                        <td><span class="tex">Avance (en
                                construcción)</span>&nbsp;<?php echo $avaluo->AvanceEnConstruccion; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Legalidad</span>&nbsp;<?php echo $avaluo->Legalidad; ?></td>
                        <td><span class="tex">Estado de
                                conservación</span>&nbsp;<?php echo $avaluo->EstadoDeConservacion; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Transporte</span>&nbsp;<?php echo $avaluo->Transporte; ?></td>
                        <td><span class="tex">No. de pisos del
                                inmueble</span>&nbsp;<?php echo $avaluo->NoDePisosDelInmueble; ?></td>
                    </tr>
                    <tr>
                        <td class="raya"><span class="tex">Impacto ambiental negativo</span></td>
                        <td><span class="tex">Número de sótanos</span>&nbsp;<?php echo $avaluo->NumeroDeSotanos; ?></td>
                    </tr>

                    <tr>
                        <td>
                            <?php if (!$avaluo->Aire): ?>
                            <div class="checkbox-no-selecionado"></div><span
                                style="float:left;margin-right: 5px;">Aire</span>
                            <?php else: ?>
                            <div class="checkbox-selecionado">
                                <div class="checkbox-selecionado-interno"></div>
                            </div><span style="float:left;margin-right: 5px;">Aire</span>
                            <?php endif ?>
                            <?php if (!$avaluo->AguasServidas): ?>
                            <div class="checkbox-no-selecionado"></div><span style="float:left;margin-right: 5px;">Aguas
                                Servidas</span>
                            <?php else: ?>
                            <div class="checkbox-selecionado">
                                <div class="checkbox-selecionado-interno"></div>
                            </div><span style="float:left;margin-right: 5px;">Aguas Servidas</span>
                            <?php endif ?>
                            <?php if (!$avaluo->Basura): ?>
                            <div class="checkbox-no-selecionado"></div><span
                                style="float:left;margin-right: 5px;">Basura</span>
                            <?php else: ?>
                            <div class="checkbox-selecionado">
                                <div class="checkbox-selecionado-interno"></div>
                            </div><span style="float:left;margin-right: 5px;">Basura</span>
                            <?php endif ?>

                            <?php if (!$avaluo->Inseguridad): ?>
                            <div class="checkbox-no-selecionado"></div><span
                                style="float:left;margin-right: 5px;">Inseguridad</span>
                            <?php else: ?>
                            <div class="checkbox-selecionado">
                                <div class="checkbox-selecionado-interno"></div>
                            </div><span style="float:left;margin-right: 5px;">Inseguridad</span>
                            <?php endif ?>

                            <?php if (!$avaluo->Ruido): ?>
                            <div class="checkbox-no-selecionado"></div><span
                                style="float:left;margin-right: 5px;">Ruido</span>
                            <?php else: ?>
                            <div class="checkbox-selecionado">
                                <div class="checkbox-selecionado-interno"></div>
                            </div><span style="float:left;margin-right: 5px;">Ruido</span>
                            <?php endif ?>



                        </td>
                        <td><span class="tex">Vida Útil</span>&nbsp;<?php echo $avaluo->VidaUtil; ?></td>
                    </tr>

                    <tr>
                        <td><span class="tex">Observaciones</span>&nbsp;<?php echo $avaluo->SectorObservaciones; ?>
                        </td>
                        <td><span class="tex">Vida remanente</span>&nbsp;<?php echo $avaluo->VidaRemanente; ?></td>
                    </tr>
                    <tr>
                        <td rowspan="21">
                            <table>
                                <tr>
                                    <td colspan="3" class="raya"><span class="tex">EQUIPAMIENTO</span></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">EQUIPAMIENTO</span></td>
                                    <td><span class="tex">NIVEL DE EQUIPAMIENTO</span></td>
                                    <td><span class="tex">DISTANCIA APROX EN METROS</span></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Áreas Verdes</span></td>
                                    <td><?php echo $avaluo->AreasVerdesNE; ?></td>
                                    <td><?php echo $avaluo->AreasVerdesDAM; ?></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Asistencial</span></td>
                                    <td><?php echo $avaluo->AsistencialNE; ?></td>
                                    <td><?php echo $avaluo->AsistencialDAM; ?></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Comercial</span></td>
                                    <td><?php echo $avaluo->ComercialNE; ?></td>
                                    <td><?php echo $avaluo->ComercialDAM; ?></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Escolar</span></td>
                                    <td><?php echo $avaluo->EscolarNE; ?></td>
                                    <td><?php echo $avaluo->EscolarDAM; ?></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Estacionamientos</span></td>
                                    <td><?php echo $avaluo->EstacionamientosNE; ?></td>
                                    <td><?php echo $avaluo->EstacionamientosDAM; ?></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Áreas recreativas</span></td>
                                    <td><?php echo $avaluo->AreasRecreativasNE; ?></td>
                                    <td><?php echo $avaluo->AreasRecreativasDAM; ?></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Seguridad del sector</span></td>
                                    <td><?php echo $avaluo->SeguridadSectorNE; ?></td>
                                    <td><?php echo $avaluo->SeguridadSectorDAM; ?></td>
                                </tr>
                            </table>

                            <table>
                                <tr>
                                    <td colspan="4" class="raya"><span class="tex">INFRAESTRUCTURA URBANA DEL
                                            SECTOR</span></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Vías de acceso</span></td>
                                    <td><?php echo $avaluo->ViasDeAcceso; ?></td>
                                    <td><span class="tex">Pavimentadas</span></td>
                                    <td><?php echo $avaluo->Pavimentadas; ?></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Andenes</span></td>
                                    <td><?php echo $avaluo->Andenes; ?></td>
                                    <td><span class="tex">Sardineles</span></td>
                                    <td><?php echo $avaluo->Sardineles; ?></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Acueducto</span></td>
                                    <td><?php echo $avaluo->Acueducto; ?></td>
                                    <td><span class="tex">Alcantarillado</span></td>
                                    <td><?php echo $avaluo->Alcantarillado; ?></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Energía eléctrica</span></td>
                                    <td><?php echo $avaluo->EnergiaElectrica; ?></td>
                                    <td><span class="tex">Telefonía</span></td>
                                    <td><?php echo $avaluo->Telefonia; ?></td>
                                </tr>
                                <tr>
                                    <td><span class="tex">Gas natural</span></td>
                                    <td colspan="3"><?php echo $avaluo->GasNatural; ?></td>
                                </tr>
                                <tr>
                                    <td class="raya" colspan="4"><span class="tex">Amoblamiento urbano</span></td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php if (!$avaluo->Alamedas): ?>
                                        <div class="checkbox-no-selecionado"></div><span
                                            style="float:left;margin-right: 5px;">Alamedas</span>
                                        <?php else: ?>
                                        <div class="checkbox-selecionado">
                                            <div class="checkbox-selecionado-interno"></div>
                                        </div><span style="float:left;margin-right: 5px;">Alamedas</span>
                                        <?php endif ?>
                                        <?php if (!$avaluo->Alumbrado): ?>
                                        <div class="checkbox-no-selecionado"></div><span
                                            style="float:left;margin-right: 5px;">Alumbrado</span>
                                        <?php else: ?>
                                        <div class="checkbox-selecionado">
                                            <div class="checkbox-selecionado-interno"></div>
                                        </div><span style="float:left;margin-right: 5px;">Alumbrado</span>
                                        <?php endif ?>
                                        <?php if (!$avaluo->Arborizacion): ?>
                                        <div class="checkbox-no-selecionado"></div><span
                                            style="float:left;margin-right: 5px;">Arborización</span>
                                        <?php else: ?>
                                        <div class="checkbox-selecionado">
                                            <div class="checkbox-selecionado-interno"></div>
                                        </div><span style="float:left;margin-right: 5px;">Arborización</span>
                                        <?php endif ?>

                                        <?php if (!$avaluo->Ciclorutas): ?>
                                        <div class="checkbox-no-selecionado"></div><span
                                            style="float:left;margin-right: 5px;">Ciclorutas</span>
                                        <?php else: ?>
                                        <div class="checkbox-selecionado">
                                            <div class="checkbox-selecionado-interno"></div>
                                        </div><span style="float:left;margin-right: 5px;">Ciclorutas</span>
                                        <?php endif ?>

                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php if (!$avaluo->Paradero): ?>
                                        <div class="checkbox-no-selecionado"></div><span
                                            style="float:left;margin-right: 5px;">Paradero&nbsp;</span>
                                        <?php else: ?>
                                        <div class="checkbox-selecionado">
                                            <div class="checkbox-selecionado-interno"></div>
                                        </div><span style="float:left;margin-right: 5px;">Paradero&nbsp;</span>
                                        <?php endif ?>
                                        <?php if (!$avaluo->Parques): ?>
                                        <div class="checkbox-no-selecionado"></div><span
                                            style="float:left;margin-right: 5px;">Parques&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <?php else: ?>
                                        <div class="checkbox-selecionado">
                                            <div class="checkbox-selecionado-interno"></div>
                                        </div><span
                                            style="float:left;margin-right: 5px;">Parques&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        <?php endif ?>
                                        <?php if (!$avaluo->ZonasVerdes): ?>
                                        <div class="checkbox-no-selecionado"></div><span
                                            style="float:left;margin-right: 5px;">Zonas verdes</span>
                                        <?php else: ?>
                                        <div class="checkbox-selecionado">
                                            <div class="checkbox-selecionado-interno"></div>
                                        </div><span style="float:left;margin-right: 5px;">Zonas verdes</span>
                                        <?php endif ?>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="raya" colspan="4"><span class="tex">Perspectivas de valorización</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <?php echo $avaluo->PerspectivasDeValorizacion; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="tex">Año de construcción</span>&nbsp;<?php echo $avaluo->YearDeConstruccion; ?>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="tex">Edad</span>&nbsp;<?php echo $avaluo->Edad; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Estructura</span>&nbsp;<?php echo $avaluo->Estructura; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Material de
                                Estructura</span>&nbsp;<?php echo $avaluo->MaterialDeEstructura; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Estado</span>&nbsp;<?php echo $avaluo->EstructuraEstado; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Remodelado</span>&nbsp;<?php echo $avaluo->Remodelado; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Uso Actual
                                Predominante</span>&nbsp;<?php echo $avaluo->UsoActualPredominante; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Ajuste
                                sismorresistente</span>&nbsp;<?php echo $avaluo->AjusteSismorresistente; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Cubierta</span>&nbsp;<?php echo $avaluo->Cubierta; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Fachada</span>&nbsp;<?php echo $avaluo->Fachada; ?></td>
                    </tr>

                    <tr>
                        <td><span class="tex">Tipo de fachada en
                                metros</span>&nbsp;<?php echo $avaluo->TipoDeFachadaEnMetros; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Estructura
                                reforzada</span>&nbsp;<?php echo $avaluo->EstructuraReforzada; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Daños previos</span>&nbsp;<?php echo $avaluo->DanosPrevios; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Material de
                                construcción</span>&nbsp;<?php echo $avaluo->MaterialDeConstruccion; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Iluminación</span>&nbsp;<?php echo $avaluo->Iluminacion; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Ventilación</span>&nbsp;<?php echo $avaluo->Ventilacion; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Irregularidad
                                planta</span>&nbsp;<?php echo $avaluo->IrregularidadPlanta; ?></td>
                    </tr>
                    <tr>
                        <td><span class="tex">Irregularidad
                                altura</span>&nbsp;<?php echo $avaluo->IrregularidadAltura; ?></td>
                    </tr>
                    <tr>
                        <td>
                            <span class="tex">Comentarios de la estructura</span>
                            <?php echo $avaluo->ComentariosDeLaEstructura; ?>
                        </td>
                    </tr>


                </table>
            </div>
        </div>
    </div>


    <div class="fondo">
        <div class="container fondo-hijo">
            <div class="row">
                <table>
                    <thead>
                        <tr>
                            <th><span class="tex">PREDIO</span></th>
                            <th>
                                <div class="raya"><span class="tex">Estado de la edificación</span></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <th colspan="2">
                                            <div class="raya"><span class="tex">Servicios</span>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><span
                                                class="tex">Acueducto</span>&nbsp;<?php echo $avaluo->PredioAcueducto;?>
                                        </td>
                                        <td>
                                            <span
                                                class="tex">Alcantarillado</span>&nbsp;<?php echo $avaluo->PredioAlcantarillado;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="tex">Energía
                                                eléctrica</span>&nbsp;<?php echo $avaluo->PredioEnergiaElectrica;?>
                                        </td>
                                        <td>
                                            <span class="tex">Gas
                                                natural</span>&nbsp;<?php echo $avaluo->PredioGasNatural;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span
                                                class="tex">Telefonía</span>&nbsp;<?php echo $avaluo->PredioTelefonia;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">
                                            <div class="raya"><span class="tex">Dependencias</span>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><span class="tex">Alcobas</span>&nbsp;<?php echo $avaluo->PredioAlcobas;?>
                                        </td>
                                        <td>
                                            <span class="tex">Alcoba de
                                                servicio</span>&nbsp;<?php echo $avaluo->PredioAlcobaDeServicio;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="tex">Balcón</span>&nbsp;<?php echo $avaluo->PredioBalcon;?>
                                        </td>
                                        <td>
                                            <span class="tex">Baño de
                                                servicio</span>&nbsp;<?php echo $avaluo->PredioBanoDeServicio;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="tex">Baño
                                                privado</span>&nbsp;<?php echo $avaluo->PredioBanoPrivado;?>
                                        </td>
                                        <td>
                                            <span class="tex">Baño
                                                social</span>&nbsp;<?php echo $avaluo->PredioBanoSocial;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="tex">Cocina</span>&nbsp;<?php echo $avaluo->PredioCocina;?>
                                        </td>
                                        <td>
                                            <span class="tex">Comedor</span>&nbsp;<?php echo $avaluo->PredioComedor;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="tex">Estar
                                                habitación</span>&nbsp;<?php echo $avaluo->PredioEstarHabitacion;?>
                                        </td>
                                        <td>
                                            <span class="tex">Estudio</span>&nbsp;<?php echo $avaluo->PredioEstudio;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="tex">Jardín</span>&nbsp;<?php echo $avaluo->PredioJardin;?>
                                        </td>
                                        <td>
                                            <span class="tex">Patio
                                                interior</span>&nbsp;<?php echo $avaluo->PredioPatioInterior;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="tex">Sala</span>&nbsp;<?php echo $avaluo->PredioSala;?>
                                        </td>
                                        <td>
                                            <span class="tex">Terraza</span>&nbsp;<?php echo $avaluo->PredioTerraza;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="tex">Zona de
                                                ropas</span>&nbsp;<?php echo $avaluo->PredioZonaDeRopas;?>
                                        </td>
                                        <td>
                                            <span class="tex">Predio subdividido
                                                físicamente</span>&nbsp;<?php echo $avaluo->PredioSubdivididoFisicamente;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span
                                                class="tex">Closet</span>&nbsp;<?php echo $avaluo->PredioCloset;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">
                                            <div class="raya"><span class="tex">Garajes</span>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><span class="tex">Total Cupos de
                                                Parqueo</span>&nbsp;<?php echo $avaluo->PredioTotalCuposDeParqueo;?>
                                        </td>
                                        <td>
                                            <span class="tex">Uso
                                                exclusivo</span>&nbsp;<?php echo $avaluo->PredioUsoExclusivo;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="tex">Bahía
                                                comunal</span>&nbsp;<?php echo $avaluo->PredioBahiaComunal;?>
                                        </td>
                                        <td>
                                            <span class="tex">Cubierto</span>&nbsp;<?php echo $avaluo->PredioCubierto;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span
                                                class="tex">Descubierto</span>&nbsp;<?php echo $avaluo->PredioDescubierto;?>
                                        </td>
                                        <td>
                                            <span class="tex">Doble</span>&nbsp;<?php echo $avaluo->PredioDoble;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="tex">Privado</span>&nbsp;<?php echo $avaluo->PredioPrivado;?>
                                        </td>
                                        <td>
                                            <span class="tex">Sencillo</span>&nbsp;<?php echo $avaluo->PredioSencillo;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span
                                                class="tex">Servidumbre</span>&nbsp;<?php echo $avaluo->PredioServidumbre;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="2">
                                            <div class="raya"><span class="tex">Otros</span>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td><span class="tex">Bodega</span>&nbsp;<?php echo $avaluo->PredioBodega;?>
                                        </td>
                                        <td>
                                            <span class="tex">Depósito</span>&nbsp;<?php echo $avaluo->PredioDeposito;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><span class="tex">Tipo de
                                                depósito</span>&nbsp;<?php echo $avaluo->PredioTipoDeDeposito;?>
                                        </td>
                                        <td>
                                            <span class="tex">Local</span>&nbsp;<?php echo $avaluo->PredioLocal;?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><span
                                                class="tex">Oficina</span>&nbsp;<?php echo $avaluo->PredioOficina;?>
                                        </td>
                                    </tr>
                                </table><br />
                                <table>
                                    <tr>
                                        <th colspan="3">
                                            <span class="tex">EDIFICACIÓN ACABADOS</span>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="3">
                                            <div class="raya"><span class="tex">Acabados por recinto</span>
                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th><span class="tex">RECINTO</span></th>
                                        <th><span class="tex">ACABADOS PISOS</span></th>
                                        <th><span class="tex">ACABADOS MUROS</span></th>
                                    </tr>

                                    <?php 
                                         $lista = json_decode($avaluo->jsonEA);
                                         foreach ($lista as $item)
                                        {
                                            echo "<tr>";
                                            echo "<td>".$item->{'recinto'}."</td>";
                                            echo "<td>".$item->{'AcabadosPisos'}."</td>";
                                            echo "<td>".$item->{'AcabadosMuros'}."</td>";                                            
                                            echo "</tr>";
                                        } 
									
                                    ?>
                                </table>
                            </td>
                            <td>
                                <table>
                                    <thead>
                                        <tr>
                                            <th><span class="tex">TIPO</span></th>
                                            <th><span class="tex">CALIDAD</span></th>
                                            <th><span class="tex">ESTADO</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Carpintería Metálica</td>
                                            <td><?php echo $avaluo->CarpinteriaMetalicaCalidad;?></td>
                                            <td><?php echo $avaluo->CarpinteriaMetalicaEstado;?></td>
                                        </tr>
                                        <tr>
                                            <td>Carpintería en Madera</td>
                                            <td><?php echo $avaluo->CarpinteriaEnMaderaCalidad;?></td>
                                            <td><?php echo $avaluo->CarpinteriaEnMaderaEstado;?></td>
                                        </tr>
                                        <tr>
                                            <td>Pisos</td>
                                            <td><?php echo $avaluo->PisosCalidad;?></td>
                                            <td><?php echo $avaluo->PisosEstado;?></td>
                                        </tr>
                                        <tr>
                                            <td>Muros</td>
                                            <td><?php echo $avaluo->MurosCalidad;?></td>
                                            <td><?php echo $avaluo->MurosEstado;?></td>
                                        </tr>
                                        <tr>
                                            <td>Techos</td>
                                            <td><?php echo $avaluo->TechosCalidad;?></td>
                                            <td><?php echo $avaluo->TechosEstado;?></td>
                                        </tr>
                                        <tr>
                                            <td>Cocina</td>
                                            <td><?php echo $avaluo->CocinaCalidad;?></td>
                                            <td><?php echo $avaluo->CocinaEstado;?></td>
                                        </tr>
                                        <tr>
                                            <td>Baños</td>
                                            <td><?php echo $avaluo->BanosCalidad;?></td>
                                            <td><?php echo $avaluo->BanosEstado;?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br />
                                <table>
                                    <tr>
                                        <th colspan="2">
                                            <span class="tex">DOTACIÓN COMUNAL</span>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td>Valor Admón.</td>
                                        <td><?php echo $avaluo->DCValorAdmon;?></td>
                                    </tr>
                                    <tr>
                                        <td>Mensualidad</td>
                                        <td><?php echo $avaluo->DCMensualidad;?></td>
                                    </tr>
                                    <tr>
                                        <td>Valor admón m²</td>
                                        <td><?php echo $avaluo->DCValorAdmonM2;?></td>
                                    </tr>
                                    <tr>
                                        <td>Vigilancia privada</td>
                                        <td><?php echo $avaluo->DCVigilanciaPrivada;?></td>
                                    </tr>
                                    <tr>
                                        <td>Ascensores</td>
                                        <td><?php echo $avaluo->DCAscensores;?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php if (!$avaluo->DCAACentral): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">A.A. Central</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">A.A. Central</span>
                                            <?php endif ?>
                                            <?php if (!$avaluo->DCBBQ): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">BBQ</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">BBQ</span>
                                            <?php endif ?>
                                            <?php if (!$avaluo->DCBicicletero): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Bicicletero</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Bicicletero</span>
                                            <?php endif ?>&nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php if (!$avaluo->DCBombaEyec): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Bomba eyec</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Bomba eyec</span>
                                            <?php endif ?>
                                            <?php if (!$avaluo->DCCalefaccion): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Calefacción</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Calefacción</span>
                                            <?php endif ?>
                                            <?php if (!$avaluo->DCCanchaMultiuso): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Cancha multiuso</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Cancha multiuso</span>
                                            <?php endif ?>&nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php if (!$avaluo->DCCanchaSquash): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Cancha Squash</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Cancha Squash</span>
                                            <?php endif ?>
                                            <?php if (!$avaluo->DCCCTV): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">CCTV</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">CCTV</span>
                                            <?php endif ?>
                                            <?php if (!$avaluo->DCCitofonia): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Citofonía</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Citofonía</span>
                                            <?php endif ?>&nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php if (!$avaluo->DCClubHouse): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Club house</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Club house</span>
                                            <?php endif ?>
                                            <?php if (!$avaluo->DCEquipoDePresion): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Equipo de presión</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Equipo de presión</span>
                                            <?php endif ?>
                                            <?php if (!$avaluo->DCGarajesResidentes): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Garajes residentes</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Garajes residentes</span>
                                            <?php endif ?>&nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php if (!$avaluo->DCGarajesVisitantes): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Garajes visitantes</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Garajes visitantes</span>
                                            <?php endif ?>
                                            <?php if (!$avaluo->DCGimnasio): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Gimnasio</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Gimnasio</span>
                                            <?php endif ?>
                                            <?php if (!$avaluo->DCGolfito): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Golfito</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Golfito</span>
                                            <?php endif ?>&nbsp;
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <?php if (!$avaluo->DCGuarderia): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Guardería</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Guardería</span>
                                            <?php endif ?>
                                            <?php if (!$avaluo->DCJuegosNinos): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Juegos niños</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Juegos niños</span>
                                            <?php endif ?>
                                            <?php if (!$avaluo->DCPiscina): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Piscina</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Piscina</span>
                                            <?php endif ?>&nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php if (!$avaluo->DCPlantaElectrica): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Planta eléctrica</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Planta eléctrica</span>
                                            <?php endif ?>
                                            <?php if (!$avaluo->DCPorteria): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Portería</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Portería</span>
                                            <?php endif ?>
                                            <?php if (!$avaluo->DCSalonComunal): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Salón comunal</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Salón comunal</span>
                                            <?php endif ?>&nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php if (!$avaluo->DCSalonDeJuegos): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Salón de juegos</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Salón de juegos</span>
                                            <?php endif ?>
                                            <?php if (!$avaluo->DCSauna): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Sauna</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Sauna</span>
                                            <?php endif ?>
                                            <?php if (!$avaluo->DCShutBasuras): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Shut basuras</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Shut basuras</span>
                                            <?php endif ?>&nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php if (!$avaluo->DCTanqueDeAgua): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Tanque de agua</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Tanque de agua</span>
                                            <?php endif ?>
                                            <?php if (!$avaluo->DCTeatrino): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Teatrino</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Teatrino</span>
                                            <?php endif ?>
                                            <?php if (!$avaluo->DCTerrazaComunal): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Terraza comunal</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Terraza comunal</span>
                                            <?php endif ?>&nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php if (!$avaluo->DCTurco): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Turco</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Turco</span>
                                            <?php endif ?>
                                            <?php if (!$avaluo->DCVigilancia24Horas): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Vigilancia 24 horas</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Vigilancia 24 horas</span>
                                            <?php endif ?>
                                            <?php if (!$avaluo->DCZonaVerde): ?>
                                            <div class="checkbox-no-selecionado"></div><span
                                                style="float:left;margin-right: 5px;">Zona verde</span>
                                            <?php else: ?>
                                            <div class="checkbox-selecionado">
                                                <div class="checkbox-selecionado-interno"></div>
                                            </div><span style="float:left;margin-right: 5px;">Zona verde</span>
                                            <?php endif ?>&nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div class="raya"><span class="tex">Otros</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <?php echo $avaluo->DCOtros;?>
                                        </td>
                                    </tr>


                                </table>



                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="fondo">
        <div class="container fondo-hijo">
            <div class="row">
                <table class="fuente-10">
                    <tr>
                        <th colspan="8"><span class="tex">COMPARABLES DE INMUEBLES EN VENTA SEMEJANTES EN USO AL SUJETO
                                (TERRENO + CONSTRUCCIONES)</span></th>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <div class="raya"><span class="tex">Investigación de comparables</span></div>
                        </td>
                    </tr>
                    <tr class="bordes">
                        <td class="bordes" style="width: 1%;">#</td>
                        <td class="bordes" style="width: 28%;">DIRECCIÓN</td>
                        <td class="bordes" style="width: 6%;">EDAD (AÑOS)</td>
                        <td class="bordes" style="width: 14%;">ÁREA LOTE</td>
                        <td class="bordes" style="width: 14%;">ÁREA CONSTR.</td>
                        <td class="bordes" style="width: 14%;">VALOR CONSTR.</td>
                        <td class="bordes" style="width: 14%;">VALOR COMERCIAL</td>
                        <td class="bordes" style="width: 9%;">FUENTE</td>
                    </tr>
                    <tr class="bordes">
                        <td class="bordes" style="width: 1%;">1</td>
                        <td class="bordes" style="width: 28%;"><?php echo $avaluo->ICDireccion1;?></td>
                        <td class="bordes" style="width: 6%;"><?php echo $avaluo->ICEdad1;?></td>
                        <td class="bordes" style="width: 14%;">
                            <?php echo utilidades::formatearNumero($avaluo->ICAreaLote1);?></td>
                        <td class="bordes" style="width: 14%;">
                            <?php echo utilidades::formatearNumero($avaluo->ICAreaConstr1);?></td>
                        <td class="bordes" style="width: 14%;">
                            <?php echo utilidades::formatearNumero($avaluo->ICValorConstr1);?></td>
                        <td class="bordes" style="width: 16%;">
                            <?php echo utilidades::formatearNumero($avaluo->ICValorComercial1);?></td>
                        <td class="bordes" style="width: 9%;"><?php echo $avaluo->ICFuente1;?></td>
                    </tr>
                    <tr class="bordes">
                        <td class="bordes" style="width: 1%;">2</td>
                        <td class="bordes" style="width: 28%;"><?php echo $avaluo->ICDireccion2;?></td>
                        <td class="bordes" style="width: 6%;"><?php echo $avaluo->ICEdad2;?></td>
                        <td class="bordes" style="width: 14%;">
                            <?php echo utilidades::formatearNumero($avaluo->ICAreaLote2);?></td>
                        <td class="bordes" style="width: 14%;">
                            <?php echo utilidades::formatearNumero($avaluo->ICAreaConstr2);?></td>
                        <td class="bordes" style="width: 14%;">
                            <?php echo utilidades::formatearNumero($avaluo->ICValorConstr2);?></td>
                        <td class="bordes" style="width: 16%;">
                            <?php echo utilidades::formatearNumero($avaluo->ICValorComercial2);?></td>
                        <td class="bordes" style="width: 9%;"><?php echo $avaluo->ICFuente2;?></td>
                    </tr>

                    <tr class="bordes">
                        <td class="bordes" style="width: 1%;">3</td>
                        <td class="bordes" style="width: 28%;"><?php echo $avaluo->ICDireccion3;?></td>
                        <td class="bordes" style="width: 6%;"><?php echo $avaluo->ICEdad3;?></td>
                        <td class="bordes" style="width: 14%;">
                            <?php echo utilidades::formatearNumero($avaluo->ICAreaLote3);?></td>
                        <td class="bordes" style="width: 14%;">
                            <?php echo utilidades::formatearNumero($avaluo->ICAreaConstr3);?></td>
                        <td class="bordes" style="width: 14%;">
                            <?php echo utilidades::formatearNumero($avaluo->ICValorConstr3);?></td>
                        <td class="bordes" style="width: 16%;">
                            <?php echo utilidades::formatearNumero($avaluo->ICValorComercial3);?></td>
                        <td class="bordes" style="width: 9%;"><?php echo $avaluo->ICFuente3;?></td>
                    </tr>

                    <tr>
                        <td colspan="8">&nbsp;</td>
                    </tr>

                    <tr>
                        <td colspan="2" class="bordes"
                            style="width: 29%; text-align:center; background-color: #1d429a!important;">
                            <span style=" font-size: 1.75rem!important; color:#fff!important;">SUJETO</span>
                        </td>
                        <td class="bordes" style="width: 6%;"><?php echo $avaluo->ICEdad4; ?></td>
                        <td class="bordes" style="width: 14%;">
                            <?php echo utilidades::formatearNumero($avaluo->ICAreaLote4); ?></td>
                        <td class="bordes" style="width: 14%;">
                            <?php echo utilidades::formatearNumero($avaluo->ICAreaConstr4); ?></td>
                        <td colspan="3" style="width: 37%;" class="bordes">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="8">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <span class="tex">DIAGNÓSTICO VALORES DE REFERENCIA</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <?php echo $avaluo->DVRDiagnostico; ?>
                        </td>
                    </tr>

                </table>

                <br />

                <table class="fuente-10">
                    <tr>
                        <td colspan="7">
                            <span class="tex">CUADRO DE VALORACIÓN TERRENO</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7">&nbsp;</td>
                    </tr>
                    <tr class="bordes">
                        <th class="bordes"><span class="tex">TERRENO</span></td>
                        <th class="bordes"><span class="tex">DESCRIPCIÓN</span></td>
                        <th class="bordes"><span class="tex">ÁREA</span></td>
                        <th class="bordes"><span class="tex">UNIDAD DE MEDIDA</span></td>
                        <th class="bordes"><span class="tex">VALOR UNITARIO</span></td>
                        <th class="bordes"><span class="tex">VALOR</span></td>
                        <th class="bordes"><span class="tex">PORCENTAJE</span></td>
                    </tr>
                    <tr class="bordes">
                        <td class="bordes"><?php echo $avaluo->CVTTerreno; ?></td>
                        <td class="bordes"><?php echo $avaluo->CVTDescripcion; ?></td>
                        <td class="bordes"><?php echo utilidades::formatearNumero($avaluo->CVTArea); ?></td>
                        <td class="bordes"><?php echo $avaluo->CVTUniadDeMedida; ?></td>
                        <td class="bordes"><?php echo utilidades::formatearNumero($avaluo->CVTValorUnitario); ?></td>
                        <td class="bordes"><?php echo utilidades::formatearNumero($avaluo->CVTValor); ?></td>
                        <td class="bordes"><?php echo utilidades::formatearNumero($avaluo->CVTPorcentaje); ?></td>
                    </tr>
                    <tr>
                        <td colspan="7">&nbsp;</td>
                    </tr>
                    <td colspan="2" class="bordes" style="text-align:center; background-color: #1d429a!important;">
                        <span style=" font-size: 1.75rem!important; color:#fff!important;">SUBTOTAL TERRENO</span>
                    </td>
                    <td class="bordes"><?php echo utilidades::formatearNumero($avaluo->CVTArea); ?></td>
                    <td colspan="2" class="bordes">&nbsp;</td>
                    <td class="bordes"><?php echo utilidades::formatearNumero($avaluo->CVTValor); ?></td>
                    <td class="bordes"><?php echo utilidades::formatearNumero($avaluo->CVTPorcentaje); ?></td>
                </table>

                <br />

                <table class="fuente-10">
                    <tr>
                        <td colspan="7">
                            <span class="tex">CUADRO DE VALORACIÓN EDIFICACIONES</span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7">&nbsp;</td>
                    </tr>
                    <tr class="bordes">
                        <th class="bordes"><span class="tex">EDIFICACIONES</span></td>
                        <th class="bordes"><span class="tex">DESCRIPCIÓN</span></td>
                        <th class="bordes"><span class="tex">ÁREA</span></td>
                        <th class="bordes"><span class="tex">UNIDAD DE MEDIDA</span></td>
                        <th class="bordes"><span class="tex">VALOR UNITARIO</span></td>
                        <th class="bordes"><span class="tex">VALOR</span></td>
                        <th class="bordes"><span class="tex">PORCENTAJE</span></td>
                    </tr>
                    <tr class="bordes">
                        <td class="bordes"><?php echo $avaluo->CVEEdificaciones; ?></td>
                        <td class="bordes"><?php echo $avaluo->CVEDescripcion; ?></td>
                        <td class="bordes"><?php echo utilidades::formatearNumero($avaluo->CVEArea); ?></td>
                        <td class="bordes"><?php echo $avaluo->CVEUniadDeMedida; ?></td>
                        <td class="bordes"><?php echo utilidades::formatearNumero($avaluo->CVEValorUnitario); ?></td>
                        <td class="bordes"><?php echo utilidades::formatearNumero($avaluo->CVEValor); ?></td>
                        <td class="bordes"><?php echo utilidades::formatearNumero($avaluo->CVEPorcentaje); ?></td>
                    </tr>
                    <tr>
                        <td colspan="7">&nbsp;</td>
                    </tr>
                    <td colspan="2" class="bordes" style="text-align:center; background-color: #1d429a!important;">
                        <span style=" font-size: 1.75rem!important; color:#fff!important;">SUBTOTAL EDIFICACIONES</span>
                    </td>
                    <td class="bordes"><?php echo utilidades::formatearNumero($avaluo->CVEArea); ?></td>
                    <td colspan="2" class="bordes">&nbsp;</td>
                    <td class="bordes"><?php echo utilidades::formatearNumero($avaluo->CVEValor); ?></td>
                    <td class="bordes"><?php echo utilidades::formatearNumero($avaluo->CVEPorcentaje); ?></td>
                    <tr>
                        <td colspan="7">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="7" style="text-align: center;">
                            <img width="400" height="200"
                                src="<?php echo utilidades::getUrlBase()?>/file/img/firmaabogado.jpg" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" ALIGN="center">
                            <span class="raya">Diego Antonio Candamil Rengifo</span>
                        </td>
                    </tr>
                </table>


            </div>
        </div>
    </div>

    <div class="fondo">
        <div class="container fondo-hijo">
            <div class="raya"><span class="tex">CROQUIS</span></div><br />
            <div class="row" style="margin-left:4px; width:100%; height: 885px;">
                <?php if ($avaluo->CroquisImg==null || $avaluo->CroquisImg==''): ?>
                <img id="blah" src="<?php echo utilidades::getUrlBase()?>/file/img/no-image.png" />
                <?php else: ?>
                <img id="blah" style="width: 100%; height: 940px; object-fit: contain; object-position: center center;"
                    src="<?php echo utilidades::getUrlBase().$avaluo->CroquisImg; ?>" />
                <?php endif ?>
            </div>
        </div>
    </div>


    <?php
		$lista = json_decode($avaluo->RFImg);

        $h='<div class="fondo"><div class="container fondo-hijo"> <div class="raya"><span class="tex">REPORTE FOTOGRÁFICO</span></div><br />';
        $b='';
        $f='</div></div>';
        $i=1;
        $aux='';
       
       
        foreach ($lista as $item)
        {         
            $style= "width: 300px; height: 300px; position: absolute; top:%top%; left:%left%;";
                         
                             
                switch($i)
                {
                    case 1: 
                        $style = str_replace("%top%", "15", $style);
                        $style = str_replace("%left%", "45", $style);  
                        $b.="<div style='".$style."'>"."<div class='carta-titulo'>".$item->{'titulo'}."</div>"."<div class='carta-cuerpo'>"."<img width='300' height='300' src='".utilidades::getUrlBase().$item->url."'>"."</div></div>"; 
                        $i+=1;
                        
                        break;
                    case 2: 
                        $style = str_replace("%top%", "15", $style);
                        $style = str_replace("%left%", "330", $style);  
                        $b.="<div style='".$style."'>"."<div class='carta-titulo'>".$item->{'titulo'}."</div>"."<div class='carta-cuerpo'>"."<img width='300' height='300' src='".utilidades::getUrlBase().$item->url."'>"."</div></div>"; 
                        $i+=1;
                      
                        break;

                    case 3: 
                        $style = str_replace("%top%", "260", $style);
                        $style = str_replace("%left%", "45", $style);  
                        $b.="<div style='".$style."'>"."<div class='carta-titulo'>".$item->{'titulo'}."</div>"."<div class='carta-cuerpo'>"."<img width='300' height='300' src='".utilidades::getUrlBase().$item->url."'>"."</div></div>"; 
                        $i+=1;
                       
                        break;
                    case 4: 
                        $style = str_replace("%top%", "260", $style);
                        $style = str_replace("%left%", "330", $style);  
                        $b.="<div style='".$style."'>"."<div class='carta-titulo'>".$item->{'titulo'}."</div>"."<div class='carta-cuerpo'>"."<img width='300' height='300' src='".utilidades::getUrlBase().$item->url."'>"."</div></div>"; 
                        $i+=1;
                       
                        break;
                    case 5: 
                        $style = str_replace("%top%", "500", $style);
                        $style = str_replace("%left%", "45", $style);  
                        $b.="<div style='".$style."'>"."<div class='carta-titulo'>".$item->{'titulo'}."</div>"."<div class='carta-cuerpo'>"."<img width='300' height='300' src='".utilidades::getUrlBase().$item->url."'>"."</div></div>"; 
                        $i+=1;
                         
                        break;
                    case 6: 
                        $style = str_replace("%top%", "500", $style);
                        $style = str_replace("%left%", "330", $style);  
                        $b.="<div style='".$style."'>"."<div class='carta-titulo'>".$item->{'titulo'}."</div>"."<div class='carta-cuerpo'>"."<img width='300' height='300' src='".utilidades::getUrlBase().$item->url."'>"."</div></div>"; 
                        echo $h.$b.$f;
                        $i = 1;
                        $b='';                       
                    break;                   
                }
                               
            
        }
        
        if($i!=1)
        {
            echo $h.$b.$f;
        }       
                    
    ?>


    <?php
		$lista = json_decode($avaluo->RFAImg);            
       
        foreach ($lista as $item)
        {         
            
            echo'<div class="fondo">';
            echo'<div class="container fondo-hijo">';
            echo'<div class="raya"><span class="tex">REPORTE	FOTOGRÁFICO	ANEXOS</span></div><br />';
            echo'<div style="text-align:center"><span class="tex">'.$item->{'titulo'}.'</span></div><br />';
            echo'<div class="row" style="margin-left:4px; width:100%; height: 885px;">';
            echo' <img id="blah" style="width: 100%; height: 920px; object-fit: contain; object-position: center center;" src="'.utilidades::getUrlBase().$item->url.'" />';
            echo'</div></div></div>';
                    
        }
        
             
                    
    ?>


    <div class="fondo">
        <div class="container fondo-hijo">
            <div class="row" style="font-size: 9px!important;">
                <div style="padding-left:50px; margin-right: 50px;">
                    <div class="raya"><span class="tex">DEFINICIÓN DE TÉRMINOS Y CONCEPTOS</span></div>
                    <p style="text-align: justify">
                        AVALUO: Es el estudio o proceso mediante el cual se estima y documenta el valor de un bien raiz
                        o
                        bien inmueble, de acuerdo a la apreciación personal expresada por un profesional que
                        cuenta con los conocimientos técnicos, aplique normas y procedimientos generalmente aceptados en
                        esta especialidad y cuya ética y desempeño avalen la confiabilidad de su
                        valuación
                    </p>
                    <p style="text-align: justify">VALOR COMERCIAL: Es la cantidad estimada de dinero circulante a
                        cambio de
                        la cual el vendedor y el comprador del bien que se valúa, estando bien informados y sin ningún
                        tipo
                        de
                        presión o apremio, estarían dispuestos a aceptar en efectivo por su enajenación con una
                        promoción
                        suficiente y adecuada a su mercado.</p>
                </div>
                <div style="padding-left:50px; margin-right: 50px;">
                    <div class="raya"><span class="tex">CONDICIONANTES Y SALVEDADES AL AVALÚO</span></div>
                    <p style="text-align: justify">
                        Conforme al artículo 18 de la <b>Resolución 620</b>, del 23/09/2008, del IGAC; por la cual se
                        establece
                        la metodología para la realización de los avalúos ordenados por la Ley 388 de 1.997; en
                        lo referente a los avalúos de inmuebles sometidos a régimen de propiedad horizontal; el presente
                        avalúo se practicará únicamente para las áreas privadas que legalmente existan.
                        Conforme a lo determinado en el <b>Art. 14 del Dcto. 1420 de 1998;</b> la compañía valuadora así
                        como
                        el valuador no serán responsables de la veracidad de la información recibida del
                        solicitante, con excepción de la concordancia de la reglamentación urbanística que afecte o haya
                        afectado al inmueble objeto del avalúo al momento de la realización de este. La
                        información y antecedentes de propiedad asentados en el presente Avalúo es la contenida en la
                        documentación oficial proporcionada por el solicitante del propio Avalúo y/o
                        propietario del bien a valuar, la cual asumimos como correcta. Entre ella, podemos mencionar a
                        la escritura de propiedad o documento que lo identifica legalmente, los planos
                        arquitectónicos y el registro catastral (boleta predial).
                    </p>
                    <p style="text-align: justify">VALOR COMERCIAL: Es la cantidad estimada de dinero circulante a
                        <b>Los valores</b> comerciales asignados a los inmuebles, tienen que ver directamente con el
                        área
                        determinada en los documentos públicos suministrados por el interesado y áreas
                        susceptibles de legalizar..
                    </p>
                    <p style="text-align: justify">El presente avalúo no tiene en cuenta para la determinación del valor
                        aspectos de orden jurídico de ninguna índole.</p>
                    <p style="text-align: justify">Se entienden incluidas dentro del valor del inmueble, como es técnica
                        valuatoria común para inmuebles sometidos al régimen de propiedad horizontal, el valor
                        proporcional de los
                        bienes comunes.</p>
                    <p style="text-align: justify">En cuanto a la incidencia que sobre el valor pueda tener la
                        existencia de contratos de arrendamiento o de otro género, asumimos que el titular del derecho
                        de propiedad tiene el uso y
                        goce de todas las facultades que se derivan de este.</p>
                    <p style="text-align: justify"><b>La presente tasación</b> no constituye un dictamen estructural, de
                        cimentación o de cualquier otra rama de la ingeniería civil o la arquitectura que no sea objeto
                        de la valuación, por lo
                        tanto no puede ser utilizado para fines relacionados con esas ramas ni se asume responsabilidad
                        por vicios ocultos u otras características del inmueble que no puedan ser apreciadas
                        en una visita normal de inspección física para efectos de tasación. Incluso cuando se aprecien
                        algunas características que puedan constituir anomalías con respecto al estado de
                        conservación normal -según la vida útil consumida- de un inmueble o a su estructura, el valuador
                        no asume mayor responsabilidad que así indicarlo cuando son detectadas, ya que
                        aunque se presenten estados de conservación malos o ruinosos, es obligación del perito realizar
                        la tasación según los criterios y normas vigentes y aplicables según el propósito del
                        mismo.</p>
                    <p style="text-align: justify"><b>Vigencia del avalúo:</b> De acuerdo a lo establecido por los
                        decretos
                        1420/1998 y 422/2000, expedidos por el Ministerio de Hacienda y Crédito Público y ministerio de
                        Desarrollo
                        Económico, el presente avalúo comercial tiene una vigencia de un año, contado desde la fecha de
                        expedición, siempre y cuando las condiciones físicas y normativas del inmueble
                        valuado, no sufran cambios significativos, así como tampoco se presenten variaciones
                        representativas del mercado inmobiliario comparable.</p>
                    <p style="text-align: justify"><b>El profesional que firma</b> declara que no tiene hoy, ni espera
                        tener en
                        el futuro, interés en la propiedad valorada; ni participación en los usos que se hagan del
                        avalúo, ni con las
                        personas que participen en la operación. Ha inspeccionado el inmueble y la información es la
                        observada; los inconvenientes y limitaciones que pueda tener el bien y su vecindario,
                        están mencionados. Además, se mantendrá un nivel de confidencialidad, acorde a las exigencias de
                        TINSA. No es responsabilidad del valuador, el uso de este informe, para un fin
                        distinto al que fue solicitado.</p>
                    <p style="text-align: justify"><b>El presente Avalúo es de USO exclusivo del(os) solicitante(s)</b>
                        para el
                        destino o propósito expresado en el mismo, por lo que no podrá ser utilizado para fines
                        distintos.</p>
                </div>
                <div style="padding-left:50px; margin-right: 50px;">
                    <div class="raya"><span class="tex">METODOLOGÍA VALUATORIA</span></div>
                    <p style="text-align: justify">
                        Método Físico, Directo o enfoque de COSTOS, es el proceso técnico necesario para estimar el
                        costo de reproducción o de reemplazo de un bien similar al que se valúa, afectado por la
                        Depreciación atribuible a los factores de Edad, Estado de Conservación y Obsolescencia
                        observados.
                    </p>
                    <p style="text-align: justify">Método de Capitalización de Rentas o enfoque de INGRESOS, es el
                        procedimiento mediante el cual se estima el valor presente o capitalizado de los ingresos netos
                        por rentas que
                        produce o es susceptible de producir un inmueble a la fecha del avalúo durante un largo plazo
                        (mayor a 50 años) de modo constante (a perpetuidad), descontados por una determinada
                        tasa de capitalización (real) aplicable al caso en estudio..</p>
                    <p style="text-align: justify">Método Comparativo o de MERCADO, es el desarrollo analítico a través
                        del cual se obtiene un valor que resulta de comparar el bien que se valúa (sujeto) con el precio
                        ofertado ó de
                        venta de cuando menos tres bienes similares (comparables), ajustados por sus principales
                        factores diferenciales (homologación).</p>
                </div>
            </div>
        </div>
    </div>





    </div>



</body>


</html>

<?php 
$html = ob_get_clean();
require_once '../dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=>true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper("legal");
$dompdf->render();
$dompdf->stream("emeplo01", array("Attachment"=>false));
?>