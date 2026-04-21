<?php
include_once '../model/avaluoentity.php';
include_once '../model/usuario.php';
include_once '../utilidades/utilidades.php';
session_start();   
if(!isset($_SESSION) || empty($_SESSION))
{
    header ("Location: ../index.php");
}
$Usuario = unserialize($_SESSION['usuario']);

$opc = $_POST['opc'];
switch($opc)
{
    case 1: Registrar($Usuario); break;
    case 2: Editar($Usuario); break;
    case 3: Exportar($Usuario); break;
    case 4: Filtrar(); break;
    case 5: EliminarReporteFotografico($Usuario); break;
    case 6: ActualizarReporteFotografico($Usuario); break;
    case 7: EliminarReporteFotograficoAnexos($Usuario); break;
    case 8: ActualizarReporteFotograficoAnexos($Usuario); break;
   
    default: //Opcion no válida
        $response = (object) ['estado' => 0,'mensaje' => 'Opción incorrecta'];   
        echo json_encode($response); 
    break;
}

function EliminarReporteFotografico($U)
{
    $idImg = $_POST['idImg'];
    $id = $_POST['id'];
    $obj = new avaluoenntity();
    $obj->get($id);
    $lista = json_decode($obj->RFImg);
    $aux = array();
    $i = 0;
    foreach ($lista as $item)
    {
        if($item->{'id'} != $idImg)
        {
            $aux[$i++] = $item;
        }        
    }
    $obj->RFImg = json_encode($aux); 
    //$obj->RFAImg =$RFAImg;    
    $obj->idRegistradoPor = $U->id; 
    $obj->idModificadoPor = $U->id;
    $obj->modificar();
    $response = (object) ['estado' => 1,'mensaje' =>'Imágen Eliminada exitosamente', 'data'=>$aux ];   
    echo json_encode($response); 
}


function ActualizarReporteFotografico($U)
{   
    
        
    $QtyRFImg = $_POST['QtyRFImg'];
    $array = array();       
    for($i = 1 ; $i <= $QtyRFImg;  $i++)
    {
        $hoy = date('mdY-Hms');
        $RFImg = $hoy."-".$_FILES['RFImg'.$i]['name'];
        $RFImg = str_replace(" ","-",$RFImg);
        $ruta = "../file/Uploads/".$RFImg;
        $url = "/file/Uploads/".$RFImg;     
        move_uploaded_file($_FILES['RFImg'.$i]['tmp_name'], $ruta);
        $objeto = (object) ['id' =>$_POST['RFId'.$i],'titulo' => $_POST['RFTittulo'.$i], 'url'=> $url];
        $array[($i-1)] = $objeto;
    }
   
    $id = $_POST['id'];   
    $obj = new avaluoenntity();
    $obj->get($id);
    $lista = json_decode($obj->RFImg);   
    $i = 1;
    $aux = array();
    foreach ($lista as $item)
    {
        $item->{'id'} = $i;
        $aux[($i-1)] = $item;
        $i++;
    }
    foreach ($array as $item)
    {
        $item->{'id'} = $i;
        $aux[($i-1)] = $item;
        $i++;
    }   
    $obj->RFImg = json_encode($aux); 
    $obj->idRegistradoPor = $U->id; 
    $obj->idModificadoPor = $U->id;
    $obj->modificar();
    $response = (object) ['estado' => 1,'mensaje' => 'Reporte fotográfico actualizado exitosamente', 'data'=>$aux];   
    
    echo json_encode($response); 
}


function EliminarReporteFotograficoAnexos($U)
{
    $idImg = $_POST['idImg'];
    $id = $_POST['id'];
    $obj = new avaluoenntity();
    $obj->get($id);
    $lista = json_decode($obj->RFAImg);
    $aux = array();
    $i = 0;
    foreach ($lista as $item)
    {
        if($item->{'id'} != $idImg)
        {
            $aux[$i++] = $item;
        }        
    }
    $obj->RFAImg =json_encode($aux);  
    $obj->idRegistradoPor = $U->id; 
    $obj->idModificadoPor = $U->id;
    $obj->modificar();
    $response = (object) ['estado' => 1,'mensaje' =>'Imágen Eliminada exitosamente', 'data'=>$aux ];   
    echo json_encode($response); 
}


function ActualizarReporteFotograficoAnexos($U)
{

    $QtyRFAImg = $_POST['QtyRFAImg'];
    $array = array();       
    for($i = 1 ; $i <= $QtyRFAImg;  $i++)
    {
        $hoy = date('mdY-Hms');
        $RFAImg = $hoy."-".$_FILES['RFAImg'.$i]['name'];
        $RFAImg = str_replace(" ","-",$RFAImg);
        $ruta = "../file/Uploads/".$RFAImg;
        $url = "/file/Uploads/".$RFAImg;     
        move_uploaded_file($_FILES['RFAImg'.$i]['tmp_name'], $ruta);
        $objeto = (object) ['id' =>$_POST['RFAId'.$i],'titulo' => $_POST['RFATittulo'.$i], 'url'=> $url];
        $array[($i-1)] = $objeto;
    }
    $id = $_POST['id'];   
    $obj = new avaluoenntity();
    $obj->get($id);
    $lista = json_decode($obj->RFAImg);   
    $i = 1;
    $aux = array();
    foreach ($lista as $item)
    {
        $item->{'id'} = $i;
        $aux[($i-1)] = $item;
        $i++;
    }
    foreach ($array as $item)
    {
        $item->{'id'} = $i;
        $aux[($i-1)] = $item;
        $i++;
    }   
    $obj->RFAImg = json_encode($aux); 
    $obj->idRegistradoPor = $U->id; 
    $obj->idModificadoPor = $U->id;
    $obj->modificar();
    $response = (object) ['estado' => 1,'mensaje' => 'Reporte fotográfico anexos actualizado exitosamente', 'data'=>$aux]; 
    echo json_encode($response); 


}

function Filtrar()
{
    $Solicitante = $_POST['Solicitante'];
    $TipoDeDocumento = $_POST['TipoDeDocumento'];
    $NumeroDocumento = $_POST['NumeroDocumento'];
    $start =$_POST['start'];
    $end   =$_POST['end'];
    $result = avaluoenntity::Filtar($Solicitante,$TipoDeDocumento,$NumeroDocumento,$start,$end,'Activo');
    $response = (object) ['estado' => 1, 'mensaje' => '', 'data'=>$result];   
    echo json_encode($response);
}

function Exportar($U){}

function Editar($U)
{

try
{
    $id = $_POST['id'];
    $Departamento = $_POST['Departamento'];
    $Municipio = $_POST['Municipio'];
    $Barrio = $_POST['Barrio'];
    $Direccion = $_POST['Direccion'];
    $CodigoDane = $_POST['CodigoDane'];
    $ImgDireccion=''; 
    if(!empty($_FILES['archivo']['name']))
    {
        $hoy = date('mdY-Hms');
        $archivo = $hoy."-".$_FILES['archivo']['name'];
        $archivo = str_replace(" ","-",$archivo);
        $ruta = "../file/Uploads/".$archivo;
        $ImgDireccion = "/file/Uploads/".$archivo;
        move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta);
    }

    $ImgDireccionAux = $_POST['ImgDireccion'];
    if($ImgDireccion =='')
       $ImgDireccion = $ImgDireccionAux;
    
    $Latitud = $_POST['Latitud'];
    $Longitud = $_POST['Longitud'];
    $GeoLocalizacionImg = '';
    if(!empty($_FILES['GeoLocalizacionImg']['name']))
    {
        $hoy = date('mdY-Hms');
        $geoImg = $hoy."-".$_FILES['GeoLocalizacionImg']['name'];
        $geoImg = str_replace(" ","-",$geoImg);
        $ruta = "../file/Uploads/".$geoImg;       
        $GeoLocalizacionImg = "/file/Uploads/".$geoImg;
        move_uploaded_file($_FILES['GeoLocalizacionImg']['tmp_name'], $ruta);
    }
    $GeoLocalizacionImgAux = $_POST['GeoLocalizacionImg2'];
    if($GeoLocalizacionImg =='')
       $GeoLocalizacionImg = $GeoLocalizacionImgAux;

    $FechaDeVisita = $_POST['FechaDeVisita'];
    $FechaDelAvalio = $_POST['FechaDelAvalio'];
    $TipoDeAvaluo = $_POST['TipoDeAvaluo'];
    $FinalidadDelAvaluo = $_POST['FinalidadDelAvaluo'];
    $ObjetoDelAvaluo = $_POST['ObjetoDelAvaluo'];
    $Entidad = $_POST['Entidad'];
    $Solicitante = $_POST['Solicitante'];
    $TipoDeDocumento = $_POST['TipoDeDocumento'];
    $NumeroDocumento = $_POST['NumeroDocumento'];
    $TipoDeBien = $_POST['TipoDeBien'];
    $Sector = $_POST['Sector'];
    $ViviendaInteresSocial = $_POST['ViviendaInteresSocial'];
    $Estrato = $_POST['Estrato'];
    $Producto = $_POST['Producto'];
    $matriculainmTipo1 = $_POST['matriculainmTipo1'];
    $matriculainmNumero1 = $_POST['matriculainmNumero1'];
    $matriculainmTipo2 = $_POST['matriculainmTipo2'];
    $matriculainmNumero2 = $_POST['matriculainmNumero2'];
    $Propietario = $_POST['Propietario'];
    $NumeroDeEscritura = $_POST['NumeroDeEscritura'];
    $AspJFecha = $_POST['AspJFecha'];
    $NumeroDeNotaria = $_POST['NumeroDeNotaria'];
    $AspMunicipio = $_POST['AspMunicipio'];
    $AspDepartamento = $_POST['AspDepartamento'];
    $Chip = $_POST['Chip'];
    $CedulaCatastral = $_POST['CedulaCatastral'];
    $TipoDePropiedad = $_POST['TipoDePropiedad'];
    $CoeficienteDeCopropiedad = $_POST['CoeficienteDeCopropiedad'];
    $LicenciaDeConstruccion = $_POST['LicenciaDeConstruccion'];
    $DescripcionGeneral = $_POST['DescripcionGeneral'];
    $AreaLote= $_POST['AreaLote'];
    $Forma= $_POST['Forma'];
    $Topografia= $_POST['Topografia'];
    $Frente= $_POST['Frente'];
    $Fondo= $_POST['Fondo'];
    $RelacionFrenteFondo= $_POST['RelacionFrenteFondo'];
    $DecretoAcuerdo= $_POST['DecretoAcuerdo'];
    $UsoPrincipal= $_POST['UsoPrincipal'];
    $AlturaPermitida= $_POST['AlturaPermitida'];
    $AislamientoPosterior= $_POST['AislamientoPosterior'];
    $AislamientoLateral= $_POST['AislamientoLateral'];
    $Antejardin= $_POST['Antejardin'];
    $IndiceDeOcupacion= $_POST['IndiceDeOcupacion'];
    $IndiceDeConstruccion= $_POST['IndiceDeConstruccion'];
    $TiempoEsperadoDeComercializacion = $_POST['TiempoEsperadoDeComercializacion'];
    $AreaValorada = $_POST['AreaValorada'];
    $AreaMedidaEnLaInspeccion= $_POST['AreaMedidaEnLaInspeccion'];
    $AreaRegistradaEnTitulo= $_POST['AreaRegistradaEnTitulo'];
    $AreaSusceptibleDeLegalizacion= $_POST['AreaSusceptibleDeLegalizacion'];
    $AreaCatastral= $_POST['AreaCatastral'];
    $AreaLicenciaDeConstruccion= $_POST['AreaLicenciaDeConstruccion'];
    $AreaValoradaObservaciones= $_POST['AreaValoradaObservaciones'];
    $ComportamientoOfertayDemanda= $_POST['ComportamientoOfertayDemanda'];
    $DSAIVI= $_POST['DSAIVI'];
    $ActualidadEdificadora= $_POST['ActualidadEdificadora'];
    $DemandaInteres = $_POST['DemandaInteres'];
    $UsoPredominante= $_POST['UsoPredominante'];
    $Legalidad= $_POST['Legalidad'];
    $Transporte= $_POST['Transporte'];
    $Aire= $_POST['Aire'];
    $AguasServidas= $_POST['AguasServidas'];
    $Basura= $_POST['Basura'];
    $Inseguridad= $_POST['Inseguridad'];
    $Ruido= $_POST['Ruido'];
    $SectorObservaciones= $_POST['SectorObservaciones'];
    $AreasVerdesNE       = $_POST['AreasVerdesNE'];
    $AreasVerdesDAM      = $_POST['AreasVerdesDAM'];
    $AsistencialNE       = $_POST['AsistencialNE'];
    $AsistencialDAM      = $_POST['AsistencialDAM'];
    $ComercialNE         = $_POST['ComercialNE'];
    $ComercialDAM        = $_POST['ComercialDAM'];
    $EscolarNE           = $_POST['EscolarNE'];
    $EscolarDAM          = $_POST['EscolarDAM'];
    $EstacionamientosNE  = $_POST['EstacionamientosNE'];
    $EstacionamientosDAM = $_POST['EstacionamientosDAM'];
    $AreasRecreativasNE  = $_POST['AreasRecreativasNE'];
    $AreasRecreativasDAM = $_POST['AreasRecreativasDAM'];
    $SeguridadSectorNE = $_POST['SeguridadSectorNE'];
    $SeguridadSectorDAM = $_POST['SeguridadSectorDAM'];
    $ViasDeAcceso               = $_POST['ViasDeAcceso'];
    $Andenes                    = $_POST['Andenes']; 
    $Acueducto                  = $_POST['Acueducto'];
    $EnergiaElectrica           = $_POST['EnergiaElectrica'];
    $GasNatural                 = $_POST['GasNatural'];
    $Pavimentadas               = $_POST['Pavimentadas'];
    $Sardineles                 = $_POST['Sardineles'];
    $Alcantarillado             = $_POST['Alcantarillado'];
    $Telefonia                  = $_POST['Telefonia'];
    $Alamedas                   = $_POST['Alamedas'];
    $Alumbrado                  = $_POST['Alumbrado'];
    $Arborizacion               = $_POST['Arborizacion'];
    $Ciclorutas                 = $_POST['Ciclorutas'];
    $Paradero                   = $_POST['Paradero'];
    $Parques                    = $_POST['Parques'];
    $ZonasVerdes                = $_POST['ZonasVerdes'];
    $PerspectivasDeValorizacion = $_POST['PerspectivasDeValorizacion'];
    $EstadoDeLaConstruccion = $_POST['EstadoDeLaConstruccion'];
    $AvanceEnConstruccion= $_POST['AvanceEnConstruccion'];
    $EstadoDeConservacion= $_POST['EstadoDeConservacion'];
    $NoDePisosDelInmueble= $_POST['NoDePisosDelInmueble'];
    $NumeroDeSotanos= $_POST['NumeroDeSotanos'];
    $VidaUtil= $_POST['VidaUtil'];
    $VidaRemanente= $_POST['VidaRemanente'];
    $YearDeConstruccion= $_POST['YearDeConstruccion'];
    $Edad= $_POST['Edad'];
    $Estructura= $_POST['Estructura'];
    $MaterialDeEstructura= $_POST['MaterialDeEstructura'];
    $EstructuraEstado= $_POST['EstructuraEstado'];
    $Remodelado= $_POST['Remodelado'];
    $UsoActualPredominante= $_POST['UsoActualPredominante'];
    $AjusteSismorresistente= $_POST['AjusteSismorresistente'];
    $Cubierta= $_POST['Cubierta'];
    $Fachada= $_POST['Fachada'];
    $TipoDeFachadaEnMetros= $_POST['TipoDeFachadaEnMetros'];
    $EstructuraReforzada= $_POST['EstructuraReforzada'];
    $DanosPrevios= $_POST['DanosPrevios'];
    $MaterialDeConstruccion= $_POST['MaterialDeConstruccion'];
    $Iluminacion= $_POST['Iluminacion'];
    $Ventilacion= $_POST['Ventilacion'];
    $IrregularidadPlanta= $_POST['IrregularidadPlanta'];
    $IrregularidadAltura= $_POST['IrregularidadAltura'];
    $ComentariosDeLaEstructura= $_POST['ComentariosDeLaEstructura'];
    $CarpinteriaMetalicaCalidad= $_POST['CarpinteriaMetalicaCalidad'];
    $CarpinteriaMetalicaEstado= $_POST['CarpinteriaMetalicaEstado'];
    $CarpinteriaEnMaderaCalidad= $_POST['CarpinteriaEnMaderaCalidad'];
    $CarpinteriaEnMaderaEstado= $_POST['CarpinteriaEnMaderaEstado'];
    $PisosCalidad= $_POST['PisosCalidad'];
    $PisosEstado= $_POST['PisosEstado'];
    $MurosCalidad= $_POST['MurosCalidad'];
    $MurosEstado= $_POST['MurosEstado'];
    $TechosCalidad= $_POST['TechosCalidad'];
    $TechosEstado= $_POST['TechosEstado'];
    $CocinaCalidad= $_POST['CocinaCalidad'];
    $CocinaEstado= $_POST['CocinaEstado'];
    $BanosCalidad= $_POST['BanosCalidad'];
    $BanosEstado= $_POST['BanosEstado'];
    $PredioAcueducto = $_POST['PredioAcueducto'];
    $PredioEnergiaElectrica = $_POST['PredioEnergiaElectrica'];
    $PredioTelefonia = $_POST['PredioTelefonia'];
    $PredioAlcantarillado = $_POST['PredioAlcantarillado'];
    $PredioGasNatural = $_POST['PredioGasNatural'];
    $PredioAlcobas = $_POST['PredioAlcobas'];
    $PredioBalcon = $_POST['PredioBalcon'];
    $PredioBanoPrivado = $_POST['PredioBanoPrivado'];
    $PredioCocina = $_POST['PredioCocina'];
    $PredioEstarHabitacion = $_POST['PredioEstarHabitacion'];
    $PredioJardin = $_POST['PredioJardin'];
    $PredioSala = $_POST['PredioSala'];
    $PredioZonaDeRopas = $_POST['PredioZonaDeRopas'];
    $PredioCloset = $_POST['PredioCloset'];
    $PredioAlcobaDeServicio = $_POST['PredioAlcobaDeServicio'];
    $PredioBanoDeServicio = $_POST['PredioBanoDeServicio'];
    $PredioBanoSocial = $_POST['PredioBanoSocial'];
    $PredioComedor = $_POST['PredioComedor'];
    $PredioEstudio = $_POST['PredioEstudio'];
    $PredioPatioInterior = $_POST['PredioPatioInterior'];
    $PredioTerraza = $_POST['PredioTerraza'];
    $PredioSubdivididoFisicamente = $_POST['PredioSubdivididoFisicamente'];
    $PredioTotalCuposDeParqueo = $_POST['PredioTotalCuposDeParqueo'];
    $PredioBahiaComunal = $_POST['PredioBahiaComunal'];
    $PredioDescubierto = $_POST['PredioDescubierto'];
    $PredioPrivado = $_POST['PredioPrivado'];
    $PredioServidumbre = $_POST['PredioServidumbre'];
    $PredioUsoExclusivo = $_POST['PredioUsoExclusivo'];
    $PredioCubierto = $_POST['PredioCubierto'];
    $PredioDoble = $_POST['PredioDoble'];
    $PredioSencillo = $_POST['PredioSencillo'];
    $PredioBodega = $_POST['PredioBodega'];
    $PredioTipoDeDeposito = $_POST['PredioTipoDeDeposito'];
    $PredioOficina = $_POST['PredioOficina'];
    $PredioDeposito = $_POST['PredioDeposito'];
    $PredioLocal = $_POST['PredioLocal'];    
    $DCValorAdmon = $_POST['DCValorAdmon'];
    $DCMensualidad = $_POST['DCMensualidad'];
    $DCValorAdmonM2 = $_POST['DCValorAdmonM2'];
    $DCVigilanciaPrivada = $_POST['DCVigilanciaPrivada'];
    $DCAscensores = $_POST['DCAscensores'];
    $DCAACentral = $_POST['DCAACentral'];
    $DCBBQ = $_POST['DCBBQ'];
    $DCBicicletero = $_POST['DCBicicletero'];
    $DCBombaEyec = $_POST['DCBombaEyec'];
    $DCCalefaccion = $_POST['DCCalefaccion'];
    $DCCanchaMultiuso = $_POST['DCCanchaMultiuso'];
    $DCCanchaSquash = $_POST['DCCanchaSquash'];
    $DCCCTV = $_POST['DCCCTV'];
    $DCCitofonia = $_POST['DCCitofonia'];
    $DCClubHouse = $_POST['DCClubHouse'];
    $DCEquipoDePresion = $_POST['DCEquipoDePresion'];
    $DCGarajesResidentes = $_POST['DCGarajesResidentes'];
    $DCGarajesVisitantes = $_POST['DCGarajesVisitantes'];
    $DCGimnasio = $_POST['DCGimnasio'];
    $DCGolfito = $_POST['DCGolfito'];
    $DCGuarderia = $_POST['DCGuarderia'];
    $DCJuegosNinos = $_POST['DCJuegosNinos'];
    $DCPiscina = $_POST['DCPiscina'];
    $DCPlantaElectrica = $_POST['DCPlantaElectrica'];
    $DCPorteria = $_POST['DCPorteria'];
    $DCSalonComunal = $_POST['DCSalonComunal'];
    $DCSalonDeJuegos = $_POST['DCSalonDeJuegos'];
    $DCSauna = $_POST['DCSauna'];
    $DCShutBasuras = $_POST['DCShutBasuras'];
    $DCTanqueDeAgua = $_POST['DCTanqueDeAgua'];
    $DCTeatrino = $_POST['DCTeatrino'];
    $DCTerrazaComunal = $_POST['DCTerrazaComunal'];
    $DCTurco = $_POST['DCTurco'];
    $DCVigilancia24Horas = $_POST['DCVigilancia24Horas'];
    $DCZonaVerde = $_POST['DCZonaVerde'];
    $DCOtros = $_POST['DCOtros'];
    $jsonEA = $_POST['jsonEA'];
    $ICDireccion1 =$_POST['ICDireccion1'];
    $ICEdad1 =$_POST['ICEdad1'];
    $ICAreaLote1 =$_POST['ICAreaLote1'];
    $ICAreaConstr1 =$_POST['ICAreaConstr1'];
    $ICValorConstr1 = utilidades::normalizarCantidad($_POST['ICValorConstr1']);
    $ICValorComercial1 = utilidades::normalizarCantidad($_POST['ICValorComercial1']);    
    $ICFuente1 =$_POST['ICFuente1'];
    $ICDireccion2 =$_POST['ICDireccion2'];
    $ICEdad2 =$_POST['ICEdad2'];
    $ICAreaLote2 =$_POST['ICAreaLote2'];
    $ICAreaConstr2 =$_POST['ICAreaConstr2'];
    $ICValorConstr2 = utilidades::normalizarCantidad($_POST['ICValorConstr2']);
    $ICValorComercial2 = utilidades::normalizarCantidad($_POST['ICValorComercial2']);
    $ICFuente2 =$_POST['ICFuente2'];
    $ICDireccion3 =$_POST['ICDireccion3'];
    $ICEdad3 =$_POST['ICEdad3'];
    $ICAreaLote3 =$_POST['ICAreaLote3'];
    $ICAreaConstr3 =$_POST['ICAreaConstr3'];
    $ICValorConstr3 = utilidades::normalizarCantidad($_POST['ICValorConstr3']);
    $ICValorComercial3 = utilidades::normalizarCantidad($_POST['ICValorComercial3']);
    $ICFuente3 =$_POST['ICFuente3'];
    $ICEdad4 =$_POST['ICEdad4'];
    $ICAreaLote4 =$_POST['ICAreaLote4'];
    $ICAreaConstr4 =$_POST['ICAreaConstr4'];
    $DVRDiagnostico =  $_POST['DVRDiagnostico'];
    $CVTTerreno =  $_POST['CVTTerreno'];    
    $CVTDescripcion =  $_POST['CVTDescripcion'];
    $CVTArea =  utilidades::normalizarCantidad($_POST['CVTArea']);
    $CVTUniadDeMedida =  $_POST['CVTUniadDeMedida'];
    $CVTValorUnitario =  utilidades::normalizarCantidad($_POST['CVTValorUnitario']);
    $CVTValor =  utilidades::normalizarCantidad($_POST['CVTValor']);
    $CVTPorcentaje =  utilidades::normalizarCantidad($_POST['CVTPorcentaje']);
    $CVEEdificaciones =  $_POST['CVEEdificaciones'];
    $CVEDescripcion =  $_POST['CVEDescripcion'];
    $CVEArea =  utilidades::normalizarCantidad($_POST['CVEArea']);
    $CVEUniadDeMedida =  $_POST['CVEUniadDeMedida'];
    $CVEValorUnitario =  utilidades::normalizarCantidad($_POST['CVEValorUnitario']);
    $CVEValor =  utilidades::normalizarCantidad($_POST['CVEValor']);
    $CVEPorcentaje =  utilidades::normalizarCantidad($_POST['CVEPorcentaje']);


    $CroquisImg=''; 
    if(!empty($_FILES['CroquisImg']['name']))
    {
        $hoy = date('mdY-Hms');
        $CroquisImg = $hoy."-".$_FILES['CroquisImg']['name'];
        $CroquisImg = str_replace(" ","-",$CroquisImg);
        $ruta = "../file/Uploads/".$CroquisImg;
        $CroquisImg = "/file/Uploads/".$CroquisImg;
        move_uploaded_file($_FILES['CroquisImg']['tmp_name'], $ruta);
    }
    $CroquisImgAux = $_POST['CroquisImg2'];
    if($CroquisImg =='')
       $CroquisImg = $CroquisImgAux;



    $QtyRFImg = $_POST['QtyRFImg'];
    $array = array();       
    for($i = 1 ; $i <= $QtyRFImg;  $i++)
    {
        $hoy = date('mdY-Hms');
        $RFImg = $hoy."-".$_FILES['RFImg'.$i]['name'];
        $RFImg = str_replace(" ","-",$RFImg);
        $ruta = "../file/Uploads/".$RFImg;
        $url = "/file/Uploads/".$RFImg;     
        move_uploaded_file($_FILES['RFImg'.$i]['tmp_name'], $ruta);
        $objeto = (object) ['id' =>$_POST['RFId'.$i],'titulo' => $_POST['RFTittulo'.$i], 'url'=> $url];
        $array[($i-1)] = $objeto;
    }
    $RFImg = json_encode($array);


    $QtyRFAImg = $_POST['QtyRFAImg'];
    $array2 = array();       
    for($i = 1 ; $i <= $QtyRFAImg;  $i++)
    {
        $hoy = date('mdY-Hms');
        $RFAImg = $hoy."-".$_FILES['RFAImg'.$i]['name'];
        $RFAImg = str_replace(" ","-",$RFAImg);
        $ruta = "../file/Uploads/".$RFAImg;
        $url = "/file/Uploads/".$RFAImg;     
        move_uploaded_file($_FILES['RFAImg'.$i]['tmp_name'], $ruta);
        $objeto = (object) ['id' =>$_POST['RFAId'.$i],'titulo' => $_POST['RFATittulo'.$i], 'url'=> $url];
        $array2[($i-1)] = $objeto;
    }
    $RFAImg = json_encode($array2);




    $obj = new avaluoenntity();
    $obj->get($id);
    $obj->Departamento = $Departamento;
    $obj->Municipio = $Municipio;
    $obj->Barrio = $Barrio;
    $obj->Direccion = $Direccion;
    $obj->CodigoDane =$CodigoDane;
    $obj->ImgDireccion =$ImgDireccion;
    $obj->Latitud =$Latitud;
    $obj->Longitud =  $Longitud;
    $obj->GeoLocalizacionImg =$GeoLocalizacionImg;
    $obj->FechaDeVisita = $FechaDeVisita;
    $obj->FechaDelAvalio = $FechaDelAvalio;
    $obj->TipoDeAvaluo = $TipoDeAvaluo;
    $obj->FinalidadDelAvaluo = $FinalidadDelAvaluo;
    $obj->ObjetoDelAvaluo = $ObjetoDelAvaluo;
    $obj->Entidad = $Entidad;
    $obj->Solicitante=$Solicitante;
    $obj->TipoDeDocumento=$TipoDeDocumento;
    $obj->NumeroDocumento=$NumeroDocumento;
    $obj->TipoDeBien=$TipoDeBien;
    $obj->Sector=$Sector;
    $obj->ViviendaInteresSocial=$ViviendaInteresSocial;
    $obj->Estrato=$Estrato;
    $obj->Producto =$Producto;
    $obj->matriculainmTipo1=$matriculainmTipo1;
    $obj->matriculainmNumero1 =$matriculainmNumero1;
    $obj->matriculainmTipo2=$matriculainmTipo2;
    $obj->matriculainmNumero2=$matriculainmNumero2;
    $obj->Propietario=$Propietario;
    $obj->NumeroDeEscritura=$NumeroDeEscritura;
    $obj->AspJFecha=$AspJFecha;
    $obj->NumeroDeNotaria=$NumeroDeNotaria;
    $obj->AspMunicipio=$AspMunicipio;
    $obj->AspDepartamento=$AspDepartamento;
    $obj->Chip=$Chip;
    $obj->CedulaCatastral=$CedulaCatastral;
    $obj->TipoDePropiedad=$TipoDePropiedad;
    $obj->CoeficienteDeCopropiedad=$CoeficienteDeCopropiedad; 
    $obj->DescripcionGeneral=$DescripcionGeneral;
    $obj->LicenciaDeConstruccion =$LicenciaDeConstruccion;    
    $obj->AreaLote=$AreaLote;
    $obj->Forma=$Forma;
    $obj->Topografia=$Topografia;
    $obj->Frente=$Frente;
    $obj->Fondo = $Fondo;
    $obj->RelacionFrenteFondo=$RelacionFrenteFondo;
    $obj->DecretoAcuerdo=$DecretoAcuerdo;
    $obj->UsoPrincipal=$UsoPrincipal;
    $obj->AlturaPermitida=$AlturaPermitida;
    $obj->AislamientoPosterior=$AislamientoPosterior;
    $obj->AislamientoLateral=$AislamientoLateral;
    $obj->Antejardin=$Antejardin;
    $obj->IndiceDeOcupacion=$IndiceDeOcupacion;
    $obj->IndiceDeConstruccion=$IndiceDeConstruccion;
    $obj->TiempoEsperadoDeComercializacion = $TiempoEsperadoDeComercializacion;
    $obj->AreaValorada = $AreaValorada;
    $obj->AreaMedidaEnLaInspeccion= $AreaMedidaEnLaInspeccion;
    $obj->AreaRegistradaEnTitulo= $AreaRegistradaEnTitulo;
    $obj->AreaSusceptibleDeLegalizacion= $AreaSusceptibleDeLegalizacion;
    $obj->AreaCatastral= $AreaCatastral;
    $obj->AreaLicenciaDeConstruccion= $AreaLicenciaDeConstruccion;
    $obj->AreaValoradaObservaciones= $AreaValoradaObservaciones;
    $obj->ComportamientoOfertayDemanda= $ComportamientoOfertayDemanda;
    $obj->DSAIVI= $DSAIVI;
    $obj->ActualidadEdificadora= $ActualidadEdificadora;
    $obj->DemandaInteres=$DemandaInteres;
    $obj->UsoPredominante=$UsoPredominante;
    $obj->Legalidad=$Legalidad;
    $obj->Transporte=$Transporte;
    $obj->Aire=$Aire;
    $obj->AguasServidas=$AguasServidas;
    $obj->Basura=$Basura;
    $obj->Inseguridad=$Inseguridad;
    $obj->Ruido=$Ruido;
    $obj->SectorObservaciones=$SectorObservaciones;
    $obj->AreasVerdesNE =$AreasVerdesNE;
    $obj->AreasVerdesDAM = $AreasVerdesDAM;
    $obj->AsistencialNE=$AsistencialNE;
    $obj->AsistencialDAM=$AsistencialDAM;
    $obj->ComercialNE=$ComercialNE;
    $obj->ComercialDAM=$ComercialDAM;
    $obj->EscolarNE=$EscolarNE;
    $obj->EscolarDAM=$EscolarDAM;
    $obj->EstacionamientosNE=$EstacionamientosNE;
    $obj->EstacionamientosDAM=$EstacionamientosDAM;
    $obj->AreasRecreativasNE=$AreasRecreativasNE;
    $obj->AreasRecreativasDAM=$AreasRecreativasDAM;
    $obj->SeguridadSectorNE=$SeguridadSectorNE;    
    $obj->SeguridadSectorDAM=$SeguridadSectorDAM;
    $obj->ViasDeAcceso=$ViasDeAcceso;
    $obj->Andenes=$Andenes;
    $obj->Acueducto=$Acueducto;
    $obj->EnergiaElectrica=$EnergiaElectrica;
    $obj->GasNatural=$GasNatural;
    $obj->Pavimentadas=$Pavimentadas;
    $obj->Sardineles=$Sardineles;
    $obj->Alcantarillado=$Alcantarillado;
    $obj->Telefonia=$Telefonia;
    $obj->Alamedas=$Alamedas;
    $obj->Alumbrado=$Alumbrado;
    $obj->Arborizacion=$Arborizacion;
    $obj->Ciclorutas=$Ciclorutas;
    $obj->Paradero=$Paradero;
    $obj->Parques=$Parques;
    $obj->ZonasVerdes=$ZonasVerdes;
    $obj->PerspectivasDeValorizacion=$PerspectivasDeValorizacion;
    $obj->EstadoDeLaConstruccion= $EstadoDeLaConstruccion;
    $obj->AvanceEnConstruccion= $AvanceEnConstruccion;
    $obj->EstadoDeConservacion= $EstadoDeConservacion;
    $obj->NoDePisosDelInmueble= $NoDePisosDelInmueble;
    $obj->NumeroDeSotanos= $NumeroDeSotanos;
    $obj->VidaUtil= $VidaUtil;
    $obj->VidaRemanente= $VidaRemanente;
    $obj->YearDeConstruccion=$YearDeConstruccion;
    $obj->Edad= $Edad;
    $obj->Estructura= $Estructura;
    $obj->MaterialDeEstructura= $MaterialDeEstructura;
    $obj->EstructuraEstado= $EstructuraEstado;
    $obj->Remodelado= $Remodelado;
    $obj->UsoActualPredominante= $UsoActualPredominante;
    $obj->AjusteSismorresistente= $AjusteSismorresistente;
    $obj->Cubierta= $Cubierta;
    $obj->Fachada= $Fachada;
    $obj->TipoDeFachadaEnMetros= $TipoDeFachadaEnMetros;
    $obj->EstructuraReforzada= $EstructuraReforzada;
    $obj->DanosPrevios= $DanosPrevios;
    $obj->MaterialDeConstruccion= $MaterialDeConstruccion;
    $obj->Iluminacion= $Iluminacion;
    $obj->Ventilacion= $Ventilacion;
    $obj->IrregularidadPlanta= $IrregularidadPlanta;
    $obj->IrregularidadAltura= $IrregularidadAltura;
    $obj->ComentariosDeLaEstructura= $ComentariosDeLaEstructura;
    $obj->CarpinteriaMetalicaCalidad= $CarpinteriaMetalicaCalidad;
    $obj->CarpinteriaMetalicaEstado= $CarpinteriaMetalicaEstado;
    $obj->CarpinteriaEnMaderaCalidad= $CarpinteriaEnMaderaCalidad;
    $obj->CarpinteriaEnMaderaEstado= $CarpinteriaEnMaderaEstado;
    $obj->PisosCalidad= $PisosCalidad;
    $obj->PisosEstado= $PisosEstado;
    $obj->MurosCalidad= $MurosCalidad;
    $obj->MurosEstado= $MurosEstado;
    $obj->TechosCalidad=$TechosCalidad;
    $obj->TechosEstado= $TechosEstado;
    $obj->CocinaCalidad= $CocinaCalidad;
    $obj->CocinaEstado= $CocinaEstado;
    $obj->BanosCalidad= $BanosCalidad;
    $obj->BanosEstado = $BanosEstado;
    $obj->PredioAcueducto=$PredioAcueducto;
    $obj->PredioEnergiaElectrica=$PredioEnergiaElectrica;
    $obj->PredioTelefonia=$PredioTelefonia;
    $obj->PredioAlcantarillado=$PredioAlcantarillado;
    $obj->PredioGasNatural=$PredioGasNatural;
    $obj->PredioAlcobas=$PredioAlcobas;
    $obj->PredioBalcon=$PredioBalcon;
    $obj->PredioBanoPrivado=$PredioBanoPrivado;
    $obj->PredioCocina=$PredioCocina;
    $obj->PredioEstarHabitacion=$PredioEstarHabitacion;
    $obj->PredioJardin=$PredioJardin;
    $obj->PredioSala=$PredioSala;
    $obj->PredioZonaDeRopas=$PredioZonaDeRopas;
    $obj->PredioCloset=$PredioCloset;
    $obj->PredioAlcobaDeServicio=$PredioAlcobaDeServicio;
    $obj->PredioBanoDeServicio=$PredioBanoDeServicio;
    $obj->PredioBanoSocial=$PredioBanoSocial;
    $obj->PredioComedor=$PredioComedor;
    $obj->PredioEstudio=$PredioEstudio;
    $obj->PredioPatioInterior=$PredioPatioInterior;
    $obj->PredioTerraza=$PredioTerraza;
    $obj->PredioSubdivididoFisicamente=$PredioSubdivididoFisicamente;
    $obj->PredioTotalCuposDeParqueo=$PredioTotalCuposDeParqueo;
    $obj->PredioBahiaComunal=$PredioBahiaComunal;
    $obj->PredioDescubierto=$PredioDescubierto;
    $obj->PredioPrivado=$PredioPrivado;
    $obj->PredioServidumbre=$PredioServidumbre;
    $obj->PredioUsoExclusivo=$PredioUsoExclusivo;
    $obj->PredioCubierto=$PredioCubierto;
    $obj->PredioDoble=$PredioDoble;
    $obj->PredioSencillo=$PredioSencillo;
    $obj->PredioBodega=$PredioBodega;
    $obj->PredioTipoDeDeposito=$PredioTipoDeDeposito;
    $obj->PredioOficina=$PredioOficina;
    $obj->PredioDeposito=$PredioDeposito;
    $obj->PredioLocal=$PredioLocal;
    $obj->DCValorAdmon=$DCValorAdmon;
    $obj->DCMensualidad=$DCMensualidad;
    $obj->DCValorAdmonM2=$DCValorAdmonM2;
    $obj->DCVigilanciaPrivada=$DCVigilanciaPrivada;
    $obj->DCAscensores=$DCAscensores;
    $obj->DCAACentral=$DCAACentral;
    $obj->DCBBQ=$DCBBQ;
    $obj->DCBicicletero=$DCBicicletero;
    $obj->DCBombaEyec=$DCBombaEyec;
    $obj->DCCalefaccion=$DCCalefaccion;
    $obj->DCCanchaMultiuso=$DCCanchaMultiuso;
    $obj->DCCanchaSquash=$DCCanchaSquash;
    $obj->DCCCTV=$DCCCTV;
    $obj->DCCitofonia=$DCCitofonia;
    $obj->DCClubHouse=$DCClubHouse;
    $obj->DCEquipoDePresion=$DCEquipoDePresion;
    $obj->DCGarajesResidentes=$DCGarajesResidentes;
    $obj->DCGarajesVisitantes=$DCGarajesVisitantes;
    $obj->DCGimnasio=$DCGimnasio;
    $obj->DCGolfito=$DCGolfito;
    $obj->DCGuarderia=$DCGuarderia;
    $obj->DCJuegosNinos=$DCJuegosNinos;
    $obj->DCPiscina=$DCPiscina;
    $obj->DCPlantaElectrica=$DCPlantaElectrica;
    $obj->DCPorteria=$DCPorteria;
    $obj->DCSalonComunal=$DCSalonComunal;
    $obj->DCSalonDeJuegos=$DCSalonDeJuegos;
    $obj->DCSauna=$DCSauna;
    $obj->DCShutBasuras=$DCShutBasuras;
    $obj->DCTanqueDeAgua=$DCTanqueDeAgua;
    $obj->DCTeatrino=$DCTeatrino;
    $obj->DCTerrazaComunal=$DCTerrazaComunal;
    $obj->DCTurco=$DCTurco;
    $obj->DCVigilancia24Horas=$DCVigilancia24Horas;
    $obj->DCZonaVerde=$DCZonaVerde;
    $obj->DCOtros=$DCOtros;
    $obj->jsonEA=$jsonEA;
    $obj->ICDireccion1=$ICDireccion1;
    $obj->ICEdad1=$ICEdad1;
    $obj->ICAreaLote1=$ICAreaLote1;
    $obj->ICAreaConstr1=$ICAreaConstr1;
    $obj->ICValorConstr1=$ICValorConstr1;
    $obj->ICValorComercial1=$ICValorComercial1;
    $obj->ICFuente1=$ICFuente1;    
    $obj->ICDireccion2=$ICDireccion2;
    $obj->ICEdad2=$ICEdad2;
    $obj->ICAreaLote2=$ICAreaLote2;
    $obj->ICAreaConstr2=$ICAreaConstr2;
    $obj->ICValorConstr2=$ICValorConstr2;
    $obj->ICValorComercial2=$ICValorComercial2;
    $obj->ICFuente2=$ICFuente2;
    $obj->ICDireccion3=$ICDireccion3;
    $obj->ICEdad3=$ICEdad3;
    $obj->ICAreaLote3=$ICAreaLote3;
    $obj->ICAreaConstr3=$ICAreaConstr3;
    $obj->ICValorConstr3=$ICValorConstr3;
    $obj->ICValorComercial3=$ICValorComercial3;
    $obj->ICFuente3=$ICFuente3;
    $obj->ICEdad4=$ICEdad4;
    $obj->ICAreaLote4=$ICAreaLote4;
    $obj->ICAreaConstr4=$ICAreaConstr4;
    $obj->DVRDiagnostico =  $DVRDiagnostico;
    $obj->CVTTerreno =  $CVTTerreno;
    $obj->CVTDescripcion =  $CVTDescripcion;
    $obj->CVTArea =  $CVTArea;
    $obj->CVTUniadDeMedida =  $CVTUniadDeMedida;
    $obj->CVTValorUnitario =  $CVTValorUnitario;
    $obj->CVTValor =  $CVTValor;
    $obj->CVTPorcentaje =  $CVTPorcentaje;
    $obj->CVEEdificaciones =  $CVEEdificaciones;
    $obj->CVEDescripcion =  $CVEDescripcion;
    $obj->CVEArea =  $CVEArea;
    $obj->CVEUniadDeMedida =  $CVEUniadDeMedida;
    $obj->CVEValorUnitario =  $CVEValorUnitario;
    $obj->CVEValor =  $CVEValor;
    $obj->CVEPorcentaje =  $CVEPorcentaje;
    $obj->CroquisImg = $CroquisImg;
    //$obj->RFImg = $RFImg;
    //$obj->RFAImg =$RFAImg;


    
    $obj->idRegistradoPor = $U->id; 
    $obj->idModificadoPor = $U->id;
    $obj->modificar();
    $response = (object) ['estado' => 1,'mensaje' => 'successful process', 'data'=> $obj];
    echo json_encode($response);
  

}catch (Exception $e)
{
    $response = (object) ['estado' => 0,'mensaje' => $e->getMessage()];   
    echo json_encode($response);    
}


   
}


function Registrar($U)
{
try
{
    $Departamento = $_POST['Departamento'];
    $Municipio = $_POST['Municipio'];
    $Barrio = $_POST['Barrio'];
    $Direccion = $_POST['Direccion'];
    $CodigoDane = $_POST['CodigoDane'];
    $ImgDireccion=''; 
    if(!empty($_FILES['archivo']['name']))
    {
        $hoy = date('mdY-Hms');
        $archivo = $hoy."-".$_FILES['archivo']['name'];
        $archivo = str_replace(" ","-",$archivo);
        $ruta = "../file/Uploads/".$archivo;
        $ImgDireccion = "/file/Uploads/".$archivo;
        move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta);
    }
    
    $Latitud = $_POST['Latitud'];
    $Longitud = $_POST['Longitud'];
    $GeoLocalizacionImg = '';
    if(!empty($_FILES['GeoLocalizacionImg']['name']))
    {
        $hoy = date('mdY-Hms');
        $geoImg = $hoy."-".$_FILES['GeoLocalizacionImg']['name'];
        $geoImg = str_replace(" ","-",$geoImg);
        $ruta = "../file/Uploads/".$geoImg;       
        $GeoLocalizacionImg = "/file/Uploads/".$geoImg;
        move_uploaded_file($_FILES['GeoLocalizacionImg']['tmp_name'], $ruta);
    }
    $FechaDeVisita = $_POST['FechaDeVisita'];
    $FechaDelAvalio = $_POST['FechaDelAvalio'];
    $TipoDeAvaluo = $_POST['TipoDeAvaluo'];
    $FinalidadDelAvaluo = $_POST['FinalidadDelAvaluo'];
    $ObjetoDelAvaluo = $_POST['ObjetoDelAvaluo'];
    $Entidad = $_POST['Entidad'];
    $Solicitante = $_POST['Solicitante'];
    $TipoDeDocumento = $_POST['TipoDeDocumento'];
    $NumeroDocumento = $_POST['NumeroDocumento'];
    $TipoDeBien = $_POST['TipoDeBien'];
    $Sector = $_POST['Sector'];
    $ViviendaInteresSocial = $_POST['ViviendaInteresSocial'];
    $Estrato = $_POST['Estrato'];
    $Producto = $_POST['Producto'];
    $matriculainmTipo1 = $_POST['matriculainmTipo1'];
    $matriculainmNumero1 = $_POST['matriculainmNumero1'];
    $matriculainmTipo2 = $_POST['matriculainmTipo2'];
    $matriculainmNumero2 = $_POST['matriculainmNumero2'];
    $Propietario = $_POST['Propietario'];
    $NumeroDeEscritura = $_POST['NumeroDeEscritura'];
    $AspJFecha = $_POST['AspJFecha'];
    $NumeroDeNotaria = $_POST['NumeroDeNotaria'];
    $AspMunicipio = $_POST['AspMunicipio'];
    $AspDepartamento = $_POST['AspDepartamento'];
    $Chip = $_POST['Chip'];
    $CedulaCatastral = $_POST['CedulaCatastral'];
    $TipoDePropiedad = $_POST['TipoDePropiedad'];
    $CoeficienteDeCopropiedad = $_POST['CoeficienteDeCopropiedad'];
    $LicenciaDeConstruccion = $_POST['LicenciaDeConstruccion'];
    $DescripcionGeneral = $_POST['DescripcionGeneral'];
    $AreaLote= $_POST['AreaLote'];
    $Forma= $_POST['Forma'];
    $Topografia= $_POST['Topografia'];
    $Frente= $_POST['Frente'];
    $Fondo= $_POST['Fondo'];
    $RelacionFrenteFondo= $_POST['RelacionFrenteFondo'];
    $DecretoAcuerdo= $_POST['DecretoAcuerdo'];
    $UsoPrincipal= $_POST['UsoPrincipal'];
    $AlturaPermitida= $_POST['AlturaPermitida'];
    $AislamientoPosterior= $_POST['AislamientoPosterior'];
    $AislamientoLateral= $_POST['AislamientoLateral'];
    $Antejardin= $_POST['Antejardin'];
    $IndiceDeOcupacion= $_POST['IndiceDeOcupacion'];
    $IndiceDeConstruccion= $_POST['IndiceDeConstruccion'];
    $TiempoEsperadoDeComercializacion = $_POST['TiempoEsperadoDeComercializacion'];
    $AreaValorada = $_POST['AreaValorada'];
    $AreaMedidaEnLaInspeccion= $_POST['AreaMedidaEnLaInspeccion'];
    $AreaRegistradaEnTitulo= $_POST['AreaRegistradaEnTitulo'];
    $AreaSusceptibleDeLegalizacion= $_POST['AreaSusceptibleDeLegalizacion'];
    $AreaCatastral= $_POST['AreaCatastral'];
    $AreaLicenciaDeConstruccion= $_POST['AreaLicenciaDeConstruccion'];
    $AreaValoradaObservaciones= $_POST['AreaValoradaObservaciones'];
    $ComportamientoOfertayDemanda= $_POST['ComportamientoOfertayDemanda'];
    $DSAIVI= $_POST['DSAIVI'];
    $ActualidadEdificadora= $_POST['ActualidadEdificadora'];
    $DemandaInteres = $_POST['DemandaInteres'];
    $UsoPredominante= $_POST['UsoPredominante'];
    $Legalidad= $_POST['Legalidad'];
    $Transporte= $_POST['Transporte'];
    $Aire= $_POST['Aire'];
    $AguasServidas= $_POST['AguasServidas'];
    $Basura= $_POST['Basura'];
    $Inseguridad= $_POST['Inseguridad'];
    $Ruido= $_POST['Ruido'];
    $SectorObservaciones= $_POST['SectorObservaciones'];
    $AreasVerdesNE       = $_POST['AreasVerdesNE'];
    $AreasVerdesDAM      = $_POST['AreasVerdesDAM'];
    $AsistencialNE       = $_POST['AsistencialNE'];
    $AsistencialDAM      = $_POST['AsistencialDAM'];
    $ComercialNE         = $_POST['ComercialNE'];
    $ComercialDAM        = $_POST['ComercialDAM'];
    $EscolarNE           = $_POST['EscolarNE'];
    $EscolarDAM          = $_POST['EscolarDAM'];
    $EstacionamientosNE  = $_POST['EstacionamientosNE'];
    $EstacionamientosDAM = $_POST['EstacionamientosDAM'];
    $AreasRecreativasNE  = $_POST['AreasRecreativasNE'];
    $AreasRecreativasDAM = $_POST['AreasRecreativasDAM'];
    $SeguridadSectorNE = $_POST['SeguridadSectorNE'];
    $SeguridadSectorDAM = $_POST['SeguridadSectorDAM'];
    $ViasDeAcceso               = $_POST['ViasDeAcceso'];
    $Andenes                    = $_POST['Andenes']; 
    $Acueducto                  = $_POST['Acueducto'];
    $EnergiaElectrica           = $_POST['EnergiaElectrica'];
    $GasNatural                 = $_POST['GasNatural'];
    $Pavimentadas               = $_POST['Pavimentadas'];
    $Sardineles                 = $_POST['Sardineles'];
    $Alcantarillado             = $_POST['Alcantarillado'];
    $Telefonia                  = $_POST['Telefonia'];
    $Alamedas                   = $_POST['Alamedas'];
    $Alumbrado                  = $_POST['Alumbrado'];
    $Arborizacion               = $_POST['Arborizacion'];
    $Ciclorutas                 = $_POST['Ciclorutas'];
    $Paradero                   = $_POST['Paradero'];
    $Parques                    = $_POST['Parques'];
    $ZonasVerdes                = $_POST['ZonasVerdes'];
    $PerspectivasDeValorizacion = $_POST['PerspectivasDeValorizacion'];
    $EstadoDeLaConstruccion = $_POST['EstadoDeLaConstruccion'];
    $AvanceEnConstruccion= $_POST['AvanceEnConstruccion'];
    $EstadoDeConservacion= $_POST['EstadoDeConservacion'];
    $NoDePisosDelInmueble= $_POST['NoDePisosDelInmueble'];
    $NumeroDeSotanos= $_POST['NumeroDeSotanos'];
    $VidaUtil= $_POST['VidaUtil'];
    $VidaRemanente= $_POST['VidaRemanente'];
    $YearDeConstruccion= $_POST['YearDeConstruccion'];
    $Edad= $_POST['Edad'];
    $Estructura= $_POST['Estructura'];
    $MaterialDeEstructura= $_POST['MaterialDeEstructura'];
    $EstructuraEstado= $_POST['EstructuraEstado'];
    $Remodelado= $_POST['Remodelado'];
    $UsoActualPredominante= $_POST['UsoActualPredominante'];
    $AjusteSismorresistente= $_POST['AjusteSismorresistente'];
    $Cubierta= $_POST['Cubierta'];
    $Fachada= $_POST['Fachada'];
    $TipoDeFachadaEnMetros= $_POST['TipoDeFachadaEnMetros'];
    $EstructuraReforzada= $_POST['EstructuraReforzada'];
    $DanosPrevios= $_POST['DanosPrevios'];
    $MaterialDeConstruccion= $_POST['MaterialDeConstruccion'];
    $Iluminacion= $_POST['Iluminacion'];
    $Ventilacion= $_POST['Ventilacion'];
    $IrregularidadPlanta= $_POST['IrregularidadPlanta'];
    $IrregularidadAltura= $_POST['IrregularidadAltura'];
    $ComentariosDeLaEstructura= $_POST['ComentariosDeLaEstructura'];
    $CarpinteriaMetalicaCalidad= $_POST['CarpinteriaMetalicaCalidad'];
    $CarpinteriaMetalicaEstado= $_POST['CarpinteriaMetalicaEstado'];
    $CarpinteriaEnMaderaCalidad= $_POST['CarpinteriaEnMaderaCalidad'];
    $CarpinteriaEnMaderaEstado= $_POST['CarpinteriaEnMaderaEstado'];
    $PisosCalidad= $_POST['PisosCalidad'];
    $PisosEstado= $_POST['PisosEstado'];
    $MurosCalidad= $_POST['MurosCalidad'];
    $MurosEstado= $_POST['MurosEstado'];
    $TechosCalidad= $_POST['TechosCalidad'];
    $TechosEstado= $_POST['TechosEstado'];
    $CocinaCalidad= $_POST['CocinaCalidad'];
    $CocinaEstado= $_POST['CocinaEstado'];
    $BanosCalidad= $_POST['BanosCalidad'];
    $BanosEstado= $_POST['BanosEstado'];
    $PredioAcueducto = $_POST['PredioAcueducto'];
    $PredioEnergiaElectrica = $_POST['PredioEnergiaElectrica'];
    $PredioTelefonia = $_POST['PredioTelefonia'];
    $PredioAlcantarillado = $_POST['PredioAlcantarillado'];
    $PredioGasNatural = $_POST['PredioGasNatural'];
    $PredioAlcobas = $_POST['PredioAlcobas'];
    $PredioBalcon = $_POST['PredioBalcon'];
    $PredioBanoPrivado = $_POST['PredioBanoPrivado'];
    $PredioCocina = $_POST['PredioCocina'];
    $PredioEstarHabitacion = $_POST['PredioEstarHabitacion'];
    $PredioJardin = $_POST['PredioJardin'];
    $PredioSala = $_POST['PredioSala'];
    $PredioZonaDeRopas = $_POST['PredioZonaDeRopas'];
    $PredioCloset = $_POST['PredioCloset'];
    $PredioAlcobaDeServicio = $_POST['PredioAlcobaDeServicio'];
    $PredioBanoDeServicio = $_POST['PredioBanoDeServicio'];
    $PredioBanoSocial = $_POST['PredioBanoSocial'];
    $PredioComedor = $_POST['PredioComedor'];
    $PredioEstudio = $_POST['PredioEstudio'];
    $PredioPatioInterior = $_POST['PredioPatioInterior'];
    $PredioTerraza = $_POST['PredioTerraza'];
    $PredioSubdivididoFisicamente = $_POST['PredioSubdivididoFisicamente'];
    $PredioTotalCuposDeParqueo = $_POST['PredioTotalCuposDeParqueo'];
    $PredioBahiaComunal = $_POST['PredioBahiaComunal'];
    $PredioDescubierto = $_POST['PredioDescubierto'];
    $PredioPrivado = $_POST['PredioPrivado'];
    $PredioServidumbre = $_POST['PredioServidumbre'];
    $PredioUsoExclusivo = $_POST['PredioUsoExclusivo'];
    $PredioCubierto = $_POST['PredioCubierto'];
    $PredioDoble = $_POST['PredioDoble'];
    $PredioSencillo = $_POST['PredioSencillo'];
    $PredioBodega = $_POST['PredioBodega'];
    $PredioTipoDeDeposito = $_POST['PredioTipoDeDeposito'];
    $PredioOficina = $_POST['PredioOficina'];
    $PredioDeposito = $_POST['PredioDeposito'];
    $PredioLocal = $_POST['PredioLocal'];    
    $DCValorAdmon = $_POST['DCValorAdmon'];
    $DCMensualidad = $_POST['DCMensualidad'];
    $DCValorAdmonM2 = $_POST['DCValorAdmonM2'];
    $DCVigilanciaPrivada = $_POST['DCVigilanciaPrivada'];
    $DCAscensores = $_POST['DCAscensores'];
    $DCAACentral = $_POST['DCAACentral'];
    $DCBBQ = $_POST['DCBBQ'];
    $DCBicicletero = $_POST['DCBicicletero'];
    $DCBombaEyec = $_POST['DCBombaEyec'];
    $DCCalefaccion = $_POST['DCCalefaccion'];
    $DCCanchaMultiuso = $_POST['DCCanchaMultiuso'];
    $DCCanchaSquash = $_POST['DCCanchaSquash'];
    $DCCCTV = $_POST['DCCCTV'];
    $DCCitofonia = $_POST['DCCitofonia'];
    $DCClubHouse = $_POST['DCClubHouse'];
    $DCEquipoDePresion = $_POST['DCEquipoDePresion'];
    $DCGarajesResidentes = $_POST['DCGarajesResidentes'];
    $DCGarajesVisitantes = $_POST['DCGarajesVisitantes'];
    $DCGimnasio = $_POST['DCGimnasio'];
    $DCGolfito = $_POST['DCGolfito'];
    $DCGuarderia = $_POST['DCGuarderia'];
    $DCJuegosNinos = $_POST['DCJuegosNinos'];
    $DCPiscina = $_POST['DCPiscina'];
    $DCPlantaElectrica = $_POST['DCPlantaElectrica'];
    $DCPorteria = $_POST['DCPorteria'];
    $DCSalonComunal = $_POST['DCSalonComunal'];
    $DCSalonDeJuegos = $_POST['DCSalonDeJuegos'];
    $DCSauna = $_POST['DCSauna'];
    $DCShutBasuras = $_POST['DCShutBasuras'];
    $DCTanqueDeAgua = $_POST['DCTanqueDeAgua'];
    $DCTeatrino = $_POST['DCTeatrino'];
    $DCTerrazaComunal = $_POST['DCTerrazaComunal'];
    $DCTurco = $_POST['DCTurco'];
    $DCVigilancia24Horas = $_POST['DCVigilancia24Horas'];
    $DCZonaVerde = $_POST['DCZonaVerde'];
    $DCOtros = $_POST['DCOtros'];
    $jsonEA = $_POST['jsonEA'];
    $ICDireccion1 =$_POST['ICDireccion1'];
    $ICEdad1 =$_POST['ICEdad1'];
    $ICAreaLote1 =$_POST['ICAreaLote1'];
    $ICAreaConstr1 =$_POST['ICAreaConstr1'];
    $ICValorConstr1 = utilidades::normalizarCantidad($_POST['ICValorConstr1']);
    $ICValorComercial1 = utilidades::normalizarCantidad($_POST['ICValorComercial1']);    
    $ICFuente1 =$_POST['ICFuente1'];
    $ICDireccion2 =$_POST['ICDireccion2'];
    $ICEdad2 =$_POST['ICEdad2'];
    $ICAreaLote2 =$_POST['ICAreaLote2'];
    $ICAreaConstr2 =$_POST['ICAreaConstr2'];
    $ICValorConstr2 = utilidades::normalizarCantidad($_POST['ICValorConstr2']);
    $ICValorComercial2 = utilidades::normalizarCantidad($_POST['ICValorComercial2']);
    $ICFuente2 =$_POST['ICFuente2'];
    $ICDireccion3 =$_POST['ICDireccion3'];
    $ICEdad3 =$_POST['ICEdad3'];
    $ICAreaLote3 =$_POST['ICAreaLote3'];
    $ICAreaConstr3 =$_POST['ICAreaConstr3'];
    $ICValorConstr3 = utilidades::normalizarCantidad($_POST['ICValorConstr3']);
    $ICValorComercial3 = utilidades::normalizarCantidad($_POST['ICValorComercial3']);
    $ICFuente3 =$_POST['ICFuente3'];
    $ICEdad4 =$_POST['ICEdad4'];
    $ICAreaLote4 =$_POST['ICAreaLote4'];
    $ICAreaConstr4 =$_POST['ICAreaConstr4'];
    $DVRDiagnostico =  $_POST['DVRDiagnostico'];
    $CVTTerreno =  $_POST['CVTTerreno'];    
    $CVTDescripcion =  $_POST['CVTDescripcion'];
    $CVTArea =  utilidades::normalizarCantidad($_POST['CVTArea']);
    $CVTUniadDeMedida =  $_POST['CVTUniadDeMedida'];
    $CVTValorUnitario =  utilidades::normalizarCantidad($_POST['CVTValorUnitario']);
    $CVTValor =  utilidades::normalizarCantidad($_POST['CVTValor']);
    $CVTPorcentaje =  utilidades::normalizarCantidad($_POST['CVTPorcentaje']);
    $CVEEdificaciones =  $_POST['CVEEdificaciones'];
    $CVEDescripcion =  $_POST['CVEDescripcion'];
    $CVEArea =  utilidades::normalizarCantidad($_POST['CVEArea']);
    $CVEUniadDeMedida =  $_POST['CVEUniadDeMedida'];
    $CVEValorUnitario =  utilidades::normalizarCantidad($_POST['CVEValorUnitario']);
    $CVEValor =  utilidades::normalizarCantidad($_POST['CVEValor']);
    $CVEPorcentaje =  utilidades::normalizarCantidad($_POST['CVEPorcentaje']);


    $CroquisImg=''; 
    if(!empty($_FILES['CroquisImg']['name']))
    {
        $hoy = date('mdY-Hms');
        $CroquisImg = $hoy."-".$_FILES['CroquisImg']['name'];
        $CroquisImg = str_replace(" ","-",$CroquisImg);
        $ruta = "../file/Uploads/".$CroquisImg;
        $CroquisImg = "/file/Uploads/".$CroquisImg;
        move_uploaded_file($_FILES['CroquisImg']['tmp_name'], $ruta);
    }

    $QtyRFImg = $_POST['QtyRFImg'];
    $array = array();       
    for($i = 1 ; $i <= $QtyRFImg;  $i++)
    {
        $hoy = date('mdY-Hms');
        $RFImg = $hoy."-".$_FILES['RFImg'.$i]['name'];
        $RFImg = str_replace(" ","-",$RFImg);
        $ruta = "../file/Uploads/".$RFImg;
        $url = "../file/Uploads/".$RFImg;     
        move_uploaded_file($_FILES['RFImg'.$i]['tmp_name'], $ruta);
        $objeto = (object) ['id' =>$_POST['RFId'.$i],'titulo' => $_POST['RFTittulo'.$i], 'url'=> $url];
        $array[($i-1)] = $objeto;
    }
    $RFImg = json_encode($array);


    $QtyRFAImg = $_POST['QtyRFAImg'];
    $array2 = array();       
    for($i = 1 ; $i <= $QtyRFAImg;  $i++)
    {
        $hoy = date('mdY-Hms');
        $RFAImg = $hoy."-".$_FILES['RFAImg'.$i]['name'];
        $RFAImg = str_replace(" ","-",$RFAImg);
        $ruta = "../file/Uploads/".$RFAImg;
        $url = "../file/Uploads/".$RFAImg;     
        move_uploaded_file($_FILES['RFAImg'.$i]['tmp_name'], $ruta);
        $objeto = (object) ['id' =>$_POST['RFAId'.$i],'titulo' => $_POST['RFATittulo'.$i], 'url'=> $url];
        $array2[($i-1)] = $objeto;
    }
    $RFAImg = json_encode($array2);




    $obj = new avaluoenntity();
    $obj->Departamento = $Departamento;
    $obj->Municipio = $Municipio;
    $obj->Barrio = $Barrio;
    $obj->Direccion = $Direccion;
    $obj->CodigoDane =$CodigoDane;
    $obj->ImgDireccion =$ImgDireccion;
    $obj->Latitud =$Latitud;
    $obj->Longitud =  $Longitud;
    $obj->GeoLocalizacionImg =$GeoLocalizacionImg;
    $obj->FechaDeVisita = $FechaDeVisita;
    $obj->FechaDelAvalio = $FechaDelAvalio;
    $obj->TipoDeAvaluo = $TipoDeAvaluo;
    $obj->FinalidadDelAvaluo = $FinalidadDelAvaluo;
    $obj->ObjetoDelAvaluo = $ObjetoDelAvaluo;
    $obj->Entidad = $Entidad;
    $obj->Solicitante=$Solicitante;
    $obj->TipoDeDocumento=$TipoDeDocumento;
    $obj->NumeroDocumento=$NumeroDocumento;
    $obj->TipoDeBien=$TipoDeBien;
    $obj->Sector=$Sector;
    $obj->ViviendaInteresSocial=$ViviendaInteresSocial;
    $obj->Estrato=$Estrato;
    $obj->Producto =$Producto;
    $obj->matriculainmTipo1=$matriculainmTipo1;
    $obj->matriculainmNumero1 =$matriculainmNumero1;
    $obj->matriculainmTipo2=$matriculainmTipo2;
    $obj->matriculainmNumero2=$matriculainmNumero2;
    $obj->Propietario=$Propietario;
    $obj->NumeroDeEscritura=$NumeroDeEscritura;
    $obj->AspJFecha=$AspJFecha;
    $obj->NumeroDeNotaria=$NumeroDeNotaria;
    $obj->AspMunicipio=$AspMunicipio;
    $obj->AspDepartamento=$AspDepartamento;
    $obj->Chip=$Chip;
    $obj->CedulaCatastral=$CedulaCatastral;
    $obj->TipoDePropiedad=$TipoDePropiedad;
    $obj->CoeficienteDeCopropiedad=$CoeficienteDeCopropiedad; 
    $obj->DescripcionGeneral=$DescripcionGeneral;
    $obj->LicenciaDeConstruccion =$LicenciaDeConstruccion;    
    $obj->AreaLote=$AreaLote;
    $obj->Forma=$Forma;
    $obj->Topografia=$Topografia;
    $obj->Frente=$Frente;
    $obj->Fondo = $Fondo;
    $obj->RelacionFrenteFondo=$RelacionFrenteFondo;
    $obj->DecretoAcuerdo=$DecretoAcuerdo;
    $obj->UsoPrincipal=$UsoPrincipal;
    $obj->AlturaPermitida=$AlturaPermitida;
    $obj->AislamientoPosterior=$AislamientoPosterior;
    $obj->AislamientoLateral=$AislamientoLateral;
    $obj->Antejardin=$Antejardin;
    $obj->IndiceDeOcupacion=$IndiceDeOcupacion;
    $obj->IndiceDeConstruccion=$IndiceDeConstruccion;
    $obj->TiempoEsperadoDeComercializacion = $TiempoEsperadoDeComercializacion;
    $obj->AreaValorada = $AreaValorada;
    $obj->AreaMedidaEnLaInspeccion= $AreaMedidaEnLaInspeccion;
    $obj->AreaRegistradaEnTitulo= $AreaRegistradaEnTitulo;
    $obj->AreaSusceptibleDeLegalizacion= $AreaSusceptibleDeLegalizacion;
    $obj->AreaCatastral= $AreaCatastral;
    $obj->AreaLicenciaDeConstruccion= $AreaLicenciaDeConstruccion;
    $obj->AreaValoradaObservaciones= $AreaValoradaObservaciones;
    $obj->ComportamientoOfertayDemanda= $ComportamientoOfertayDemanda;
    $obj->DSAIVI= $DSAIVI;
    $obj->ActualidadEdificadora= $ActualidadEdificadora;
    $obj->DemandaInteres=$DemandaInteres;
    $obj->UsoPredominante=$UsoPredominante;
    $obj->Legalidad=$Legalidad;
    $obj->Transporte=$Transporte;
    $obj->Aire=$Aire;
    $obj->AguasServidas=$AguasServidas;
    $obj->Basura=$Basura;
    $obj->Inseguridad=$Inseguridad;
    $obj->Ruido=$Ruido;
    $obj->SectorObservaciones=$SectorObservaciones;
    $obj->AreasVerdesNE =$AreasVerdesNE;
    $obj->AreasVerdesDAM = $AreasVerdesDAM;
    $obj->AsistencialNE=$AsistencialNE;
    $obj->AsistencialDAM=$AsistencialDAM;
    $obj->ComercialNE=$ComercialNE;
    $obj->ComercialDAM=$ComercialDAM;
    $obj->EscolarNE=$EscolarNE;
    $obj->EscolarDAM=$EscolarDAM;
    $obj->EstacionamientosNE=$EstacionamientosNE;
    $obj->EstacionamientosDAM=$EstacionamientosDAM;
    $obj->AreasRecreativasNE=$AreasRecreativasNE;
    $obj->AreasRecreativasDAM=$AreasRecreativasDAM;
    $obj->SeguridadSectorNE = $SeguridadSectorNE;
    $obj->SeguridadSectorDAM = $SeguridadSectorDAM;
    $obj->ViasDeAcceso=$ViasDeAcceso;
    $obj->Andenes=$Andenes;
    $obj->Acueducto=$Acueducto;
    $obj->EnergiaElectrica=$EnergiaElectrica;
    $obj->GasNatural=$GasNatural;
    $obj->Pavimentadas=$Pavimentadas;
    $obj->Sardineles=$Sardineles;
    $obj->Alcantarillado=$Alcantarillado;
    $obj->Telefonia=$Telefonia;
    $obj->Alamedas=$Alamedas;
    $obj->Alumbrado=$Alumbrado;
    $obj->Arborizacion=$Arborizacion;
    $obj->Ciclorutas=$Ciclorutas;
    $obj->Paradero=$Paradero;
    $obj->Parques=$Parques;
    $obj->ZonasVerdes=$ZonasVerdes;
    $obj->PerspectivasDeValorizacion=$PerspectivasDeValorizacion;
    $obj->EstadoDeLaConstruccion= $EstadoDeLaConstruccion;
    $obj->AvanceEnConstruccion= $AvanceEnConstruccion;
    $obj->EstadoDeConservacion= $EstadoDeConservacion;
    $obj->NoDePisosDelInmueble= $NoDePisosDelInmueble;
    $obj->NumeroDeSotanos= $NumeroDeSotanos;
    $obj->VidaUtil= $VidaUtil;
    $obj->VidaRemanente= $VidaRemanente;
    $obj->YearDeConstruccion=$YearDeConstruccion;
    $obj->Edad= $Edad;
    $obj->Estructura= $Estructura;
    $obj->MaterialDeEstructura= $MaterialDeEstructura;
    $obj->EstructuraEstado= $EstructuraEstado;
    $obj->Remodelado= $Remodelado;
    $obj->UsoActualPredominante= $UsoActualPredominante;
    $obj->AjusteSismorresistente= $AjusteSismorresistente;
    $obj->Cubierta= $Cubierta;
    $obj->Fachada= $Fachada;
    $obj->TipoDeFachadaEnMetros= $TipoDeFachadaEnMetros;
    $obj->EstructuraReforzada= $EstructuraReforzada;
    $obj->DanosPrevios= $DanosPrevios;
    $obj->MaterialDeConstruccion= $MaterialDeConstruccion;
    $obj->Iluminacion= $Iluminacion;
    $obj->Ventilacion= $Ventilacion;
    $obj->IrregularidadPlanta= $IrregularidadPlanta;
    $obj->IrregularidadAltura= $IrregularidadAltura;
    $obj->ComentariosDeLaEstructura= $ComentariosDeLaEstructura;
    $obj->CarpinteriaMetalicaCalidad= $CarpinteriaMetalicaCalidad;
    $obj->CarpinteriaMetalicaEstado= $CarpinteriaMetalicaEstado;
    $obj->CarpinteriaEnMaderaCalidad= $CarpinteriaEnMaderaCalidad;
    $obj->CarpinteriaEnMaderaEstado= $CarpinteriaEnMaderaEstado;
    $obj->PisosCalidad= $PisosCalidad;
    $obj->PisosEstado= $PisosEstado;
    $obj->MurosCalidad= $MurosCalidad;
    $obj->MurosEstado= $MurosEstado;
    $obj->TechosCalidad=$TechosCalidad;
    $obj->TechosEstado= $TechosEstado;
    $obj->CocinaCalidad= $CocinaCalidad;
    $obj->CocinaEstado= $CocinaEstado;
    $obj->BanosCalidad= $BanosCalidad;
    $obj->BanosEstado = $BanosEstado;
    $obj->PredioAcueducto=$PredioAcueducto;
    $obj->PredioEnergiaElectrica=$PredioEnergiaElectrica;
    $obj->PredioTelefonia=$PredioTelefonia;
    $obj->PredioAlcantarillado=$PredioAlcantarillado;
    $obj->PredioGasNatural=$PredioGasNatural;
    $obj->PredioAlcobas=$PredioAlcobas;
    $obj->PredioBalcon=$PredioBalcon;
    $obj->PredioBanoPrivado=$PredioBanoPrivado;
    $obj->PredioCocina=$PredioCocina;
    $obj->PredioEstarHabitacion=$PredioEstarHabitacion;
    $obj->PredioJardin=$PredioJardin;
    $obj->PredioSala=$PredioSala;
    $obj->PredioZonaDeRopas=$PredioZonaDeRopas;
    $obj->PredioCloset=$PredioCloset;
    $obj->PredioAlcobaDeServicio=$PredioAlcobaDeServicio;
    $obj->PredioBanoDeServicio=$PredioBanoDeServicio;
    $obj->PredioBanoSocial=$PredioBanoSocial;
    $obj->PredioComedor=$PredioComedor;
    $obj->PredioEstudio=$PredioEstudio;
    $obj->PredioPatioInterior=$PredioPatioInterior;
    $obj->PredioTerraza=$PredioTerraza;
    $obj->PredioSubdivididoFisicamente=$PredioSubdivididoFisicamente;
    $obj->PredioTotalCuposDeParqueo=$PredioTotalCuposDeParqueo;
    $obj->PredioBahiaComunal=$PredioBahiaComunal;
    $obj->PredioDescubierto=$PredioDescubierto;
    $obj->PredioPrivado=$PredioPrivado;
    $obj->PredioServidumbre=$PredioServidumbre;
    $obj->PredioUsoExclusivo=$PredioUsoExclusivo;
    $obj->PredioCubierto=$PredioCubierto;
    $obj->PredioDoble=$PredioDoble;
    $obj->PredioSencillo=$PredioSencillo;
    $obj->PredioBodega=$PredioBodega;
    $obj->PredioTipoDeDeposito=$PredioTipoDeDeposito;
    $obj->PredioOficina=$PredioOficina;
    $obj->PredioDeposito=$PredioDeposito;
    $obj->PredioLocal=$PredioLocal;
    $obj->DCValorAdmon=$DCValorAdmon;
    $obj->DCMensualidad=$DCMensualidad;
    $obj->DCValorAdmonM2=$DCValorAdmonM2;
    $obj->DCVigilanciaPrivada=$DCVigilanciaPrivada;
    $obj->DCAscensores=$DCAscensores;
    $obj->DCAACentral=$DCAACentral;
    $obj->DCBBQ=$DCBBQ;
    $obj->DCBicicletero=$DCBicicletero;
    $obj->DCBombaEyec=$DCBombaEyec;
    $obj->DCCalefaccion=$DCCalefaccion;
    $obj->DCCanchaMultiuso=$DCCanchaMultiuso;
    $obj->DCCanchaSquash=$DCCanchaSquash;
    $obj->DCCCTV=$DCCCTV;
    $obj->DCCitofonia=$DCCitofonia;
    $obj->DCClubHouse=$DCClubHouse;
    $obj->DCEquipoDePresion=$DCEquipoDePresion;
    $obj->DCGarajesResidentes=$DCGarajesResidentes;
    $obj->DCGarajesVisitantes=$DCGarajesVisitantes;
    $obj->DCGimnasio=$DCGimnasio;
    $obj->DCGolfito=$DCGolfito;
    $obj->DCGuarderia=$DCGuarderia;
    $obj->DCJuegosNinos=$DCJuegosNinos;
    $obj->DCPiscina=$DCPiscina;
    $obj->DCPlantaElectrica=$DCPlantaElectrica;
    $obj->DCPorteria=$DCPorteria;
    $obj->DCSalonComunal=$DCSalonComunal;
    $obj->DCSalonDeJuegos=$DCSalonDeJuegos;
    $obj->DCSauna=$DCSauna;
    $obj->DCShutBasuras=$DCShutBasuras;
    $obj->DCTanqueDeAgua=$DCTanqueDeAgua;
    $obj->DCTeatrino=$DCTeatrino;
    $obj->DCTerrazaComunal=$DCTerrazaComunal;
    $obj->DCTurco=$DCTurco;
    $obj->DCVigilancia24Horas=$DCVigilancia24Horas;
    $obj->DCZonaVerde=$DCZonaVerde;
    $obj->DCOtros=$DCOtros;
    $obj->jsonEA=$jsonEA;
    $obj->ICDireccion1=$ICDireccion1;
    $obj->ICEdad1=$ICEdad1;
    $obj->ICAreaLote1=$ICAreaLote1;
    $obj->ICAreaConstr1=$ICAreaConstr1;
    $obj->ICValorConstr1=$ICValorConstr1;
    $obj->ICValorComercial1=$ICValorComercial1;
    $obj->ICFuente1=$ICFuente1;    
    $obj->ICDireccion2=$ICDireccion2;
    $obj->ICEdad2=$ICEdad2;
    $obj->ICAreaLote2=$ICAreaLote2;
    $obj->ICAreaConstr2=$ICAreaConstr2;
    $obj->ICValorConstr2=$ICValorConstr2;
    $obj->ICValorComercial2=$ICValorComercial2;
    $obj->ICFuente2=$ICFuente2;
    $obj->ICDireccion3=$ICDireccion3;
    $obj->ICEdad3=$ICEdad3;
    $obj->ICAreaLote3=$ICAreaLote3;
    $obj->ICAreaConstr3=$ICAreaConstr3;
    $obj->ICValorConstr3=$ICValorConstr3;
    $obj->ICValorComercial3=$ICValorComercial3;
    $obj->ICFuente3=$ICFuente3;
    $obj->ICEdad4=$ICEdad4;
    $obj->ICAreaLote4=$ICAreaLote4;
    $obj->ICAreaConstr4=$ICAreaConstr4;
    $obj->DVRDiagnostico =  $DVRDiagnostico;
    $obj->CVTTerreno =  $CVTTerreno;
    $obj->CVTDescripcion =  $CVTDescripcion;
    $obj->CVTArea =  $CVTArea;
    $obj->CVTUniadDeMedida =  $CVTUniadDeMedida;
    $obj->CVTValorUnitario =  $CVTValorUnitario;
    $obj->CVTValor =  $CVTValor;
    $obj->CVTPorcentaje =  $CVTPorcentaje;
    $obj->CVEEdificaciones =  $CVEEdificaciones;
    $obj->CVEDescripcion =  $CVEDescripcion;
    $obj->CVEArea =  $CVEArea;
    $obj->CVEUniadDeMedida =  $CVEUniadDeMedida;
    $obj->CVEValorUnitario =  $CVEValorUnitario;
    $obj->CVEValor =  $CVEValor;
    $obj->CVEPorcentaje =  $CVEPorcentaje;
    $obj->CroquisImg = $CroquisImg;
    $obj->RFImg = $RFImg;
    $obj->RFAImg =$RFAImg;


    
    $obj->idRegistradoPor = $U->id; 
    $obj->idModificadoPor = $U->id;
    $obj->registrar();
    $response = (object) ['estado' => 1,'mensaje' => 'successful process', 'data'=> $obj];
    echo json_encode($response);
  

}catch (Exception $e)
{
    $response = (object) ['estado' => 0,'mensaje' => $e->getMessage()];   
    echo json_encode($response);    
}




}

?>