<?php
include_once 'entidad.php';
include_once '../utilidades/conexion.php';

class avaluoenntity extends entidad
{    
    var $Departamento;
    var $Municipio;
    var $Barrio;
    var $Direccion;
    var $CodigoDane;
    var $ImgDireccion;
    var $Latitud;
    var $Longitud;
    var $GeoLocalizacionImg;
    var $FechaDeVisita;
    var $FechaDelAvalio;
    var $TipoDeAvaluo;
    var $FinalidadDelAvaluo;
    var $ObjetoDelAvaluo;
    var $Entidad;
    var $Solicitante;
    var $TipoDeDocumento;
    var $NumeroDocumento;
    var $TipoDeBien;
    var $Sector;
    var $ViviendaInteresSocial;
    var $Estrato;
    var $Producto;
    var $matriculainmTipo1;
    var $matriculainmNumero1;
    var $matriculainmTipo2;
    var $matriculainmNumero2;  
    var $Propietario;
    var $NumeroDeEscritura;
    var $AspJFecha;
    var $NumeroDeNotaria;
    var $AspMunicipio;
    var $AspDepartamento;
    var $Chip;
    var $CedulaCatastral;
    var $TipoDePropiedad;
    var $CoeficienteDeCopropiedad;
    var $LicenciaDeConstruccion;
    var $DescripcionGeneral;
    var $AreaLote;
    var $Forma;
    var $Topografia;
    var $Frente;
    var $Fondo;
    var $RelacionFrenteFondo;
    var $DecretoAcuerdo;
    var $UsoPrincipal;
    var $AlturaPermitida;
    var $AislamientoPosterior;
    var $AislamientoLateral;
    var $Antejardin;
    var $IndiceDeOcupacion;
    var $IndiceDeConstruccion;
    var $TiempoEsperadoDeComercializacion;
    var $AreaValorada;
    var $AreaMedidaEnLaInspeccion;
    var $AreaRegistradaEnTitulo;
    var $AreaSusceptibleDeLegalizacion;
    var $AreaCatastral;
    var $AreaLicenciaDeConstruccion;
    var $AreaValoradaObservaciones;
    var $ComportamientoOfertayDemanda;
    var $DSAIVI;
    var $ActualidadEdificadora;
    var $DemandaInteres;
    var $UsoPredominante;
    var $Legalidad;
    var $Transporte;
    var $Aire;
    var $AguasServidas;
    var $Basura;
    var $Inseguridad;
    var $Ruido;
    var $SectorObservaciones;
    var $AreasVerdesNE;
    var $AreasVerdesDAM;
    var $AsistencialNE;
    var $AsistencialDAM;
    var $ComercialNE;
    var $ComercialDAM;
    var $EscolarNE;
    var $EscolarDAM;
    var $EstacionamientosNE;
    var $EstacionamientosDAM;
    var $AreasRecreativasNE;
    var $AreasRecreativasDAM;
    var $SeguridadSectorNE;
    var $SeguridadSectorDAM;    
    var $ViasDeAcceso;
    var $Andenes;
    var $Acueducto;
    var $EnergiaElectrica;
    var $GasNatural;
    var $Pavimentadas;
    var $Sardineles;
    var $Alcantarillado;
    var $Telefonia;
    var $Alamedas;
    var $Alumbrado;
    var $Arborizacion;
    var $Ciclorutas;
    var $Paradero;
    var $Parques;
    var $ZonasVerdes;
    var $PerspectivasDeValorizacion;
    var $EstadoDeLaConstruccion;
    var $AvanceEnConstruccion;
    var $EstadoDeConservacion;
    var $NoDePisosDelInmueble;
    var $NumeroDeSotanos;
    var $VidaUtil;
    var $VidaRemanente;
    var $YearDeConstruccion;
    var $Edad;
    var $Estructura;
    var $MaterialDeEstructura;
    var $EstructuraEstado;
    var $Remodelado;
    var $UsoActualPredominante;
    var $AjusteSismorresistente;
    var $Cubierta;
    var $Fachada;
    var $TipoDeFachadaEnMetros;
    var $EstructuraReforzada;
    var $DanosPrevios;
    var $MaterialDeConstruccion;
    var $Iluminacion;
    var $Ventilacion;
    var $IrregularidadPlanta;
    var $IrregularidadAltura;
    var $ComentariosDeLaEstructura;
    var $CarpinteriaMetalicaCalidad;
    var $CarpinteriaMetalicaEstado;
    var $CarpinteriaEnMaderaCalidad;
    var $CarpinteriaEnMaderaEstado;
    var $PisosCalidad;
    var $PisosEstado;
    var $MurosCalidad;
    var $MurosEstado;
    var $TechosCalidad;
    var $TechosEstado;
    var $CocinaCalidad;
    var $CocinaEstado;
    var $BanosCalidad;
    var $BanosEstado;
    var $PredioAcueducto;
    var $PredioEnergiaElectrica;
    var $PredioTelefonia;
    var $PredioAlcantarillado;
    var $PredioGasNatural;
    var $PredioAlcobas;
    var $PredioBalcon;
    var $PredioBanoPrivado;
    var $PredioCocina;
    var $PredioEstarHabitacion;
    var $PredioJardin;
    var $PredioSala;
    var $PredioZonaDeRopas;
    var $PredioCloset;
    var $PredioAlcobaDeServicio;
    var $PredioBanoDeServicio;
    var $PredioBanoSocial;
    var $PredioComedor;
    var $PredioEstudio;
    var $PredioPatioInterior;
    var $PredioTerraza;
    var $PredioSubdivididoFisicamente;
    var $PredioTotalCuposDeParqueo;
    var $PredioBahiaComunal;
    var $PredioDescubierto;
    var $PredioPrivado;
    var $PredioServidumbre;
    var $PredioUsoExclusivo;
    var $PredioCubierto;
    var $PredioDoble;
    var $PredioSencillo;
    var $PredioBodega;
    var $PredioTipoDeDeposito;
    var $PredioOficina;
    var $PredioDeposito;
    var $PredioLocal;
    var $DCValorAdmon;
    var $DCMensualidad;
    var $DCValorAdmonM2;
    var $DCVigilanciaPrivada;
    var $DCAscensores;
    var $DCAACentral;
    var $DCBBQ;
    var $DCBicicletero;
    var $DCBombaEyec;
    var $DCCalefaccion;
    var $DCCanchaMultiuso;
    var $DCCanchaSquash;
    var $DCCCTV;
    var $DCCitofonia;
    var $DCClubHouse;
    var $DCEquipoDePresion;
    var $DCGarajesResidentes;
    var $DCGarajesVisitantes;
    var $DCGimnasio;
    var $DCGolfito;
    var $DCGuarderia;
    var $DCJuegosNinos;
    var $DCPiscina;
    var $DCPlantaElectrica;
    var $DCPorteria;
    var $DCSalonComunal;
    var $DCSalonDeJuegos;
    var $DCSauna;
    var $DCShutBasuras;
    var $DCTanqueDeAgua;
    var $DCTeatrino;
    var $DCTerrazaComunal;
    var $DCTurco;
    var $DCVigilancia24Horas;
    var $DCZonaVerde;
    var $DCOtros;
    var $jsonEA;
    var $ICDireccion1;
    var $ICEdad1;
    var $ICAreaLote1;
    var $ICAreaConstr1;
    var $ICValorConstr1;
    var $ICValorComercial1;
    var $ICFuente1;    
    var $ICDireccion2;
    var $ICEdad2;
    var $ICAreaLote2;
    var $ICAreaConstr2;
    var $ICValorConstr2;
    var $ICValorComercial2;
    var $ICFuente2;
    var $ICDireccion3;
    var $ICEdad3;
    var $ICAreaLote3;
    var $ICAreaConstr3;
    var $ICValorConstr3;
    var $ICValorComercial3;
    var $ICFuente3;
    var $ICEdad4;
    var $ICAreaLote4;
    var $ICAreaConstr4;    
    var $DVRDiagnostico;
    var $CVTTerreno;
    var $CVTDescripcion;
    var $CVTArea;
    var $CVTUniadDeMedida;
    var $CVTValorUnitario;
    var $CVTValor;
    var $CVTPorcentaje;
    var $CVEEdificaciones;
    var $CVEDescripcion;
    var $CVEArea;
    var $CVEUniadDeMedida;
    var $CVEValorUnitario;
    var $CVEValor;
    var $CVEPorcentaje;
    var $CroquisImg;
    var $RFImg;
    var $RFAImg;


   

    
    function __construct()
    {
        parent::__construct();      
        $this->Departamento='';
        $this->Municipio='';
        $this->Barrio='';
        $this->Direccion='';
        $this->CodigoDane='';
        $this->ImgDireccion='';
        $this->Latitud="";
        $this->Longitud="";
        $this->GeoLocalizacionImg="";
        $this->FechaDeVisita = null;
        $this->FechaDelAvalio=null;
        $this->TipoDeAvaluo='';
        $this->FinalidadDelAvaluo='';
        $this->ObjetoDelAvaluo='';
        $this->Entidad='';
        $this->Solicitante='';
        $this->TipoDeDocumento='';
        $this->NumeroDocumento='';
        $this->TipoDeBien='';
        $this->Sector='';
        $this->ViviendaInteresSocial='';
        $this->Estrato='';
        $this->Producto='';
        $this->matriculainmTipo1='';
        $this->matriculainmNumero1='';
        $this->matriculainmTipo2='';
        $this->matriculainmNumero2='';    
        $this->Propietario='';
        $this->NumeroDeEscritura='';
        $this->AspJFecha=null;
        $this->NumeroDeNotaria='';
        $this->AspMunicipio='';
        $this->AspDepartamento='';
        $this->Chip='';
        $this->CedulaCatastral='';
        $this->TipoDePropiedad='';
        $this->CoeficienteDeCopropiedad='';
        $this->LicenciaDeConstruccion='';
        $this->DescripcionGeneral='';
        $this->AreaLote='';
        $this->Forma='';
        $this->Topografia='';
        $this->Frente='';
        $this->Fondo='';
        $this->RelacionFrenteFondo='';
        $this->DecretoAcuerdo='';
        $this->UsoPrincipal='';
        $this->AlturaPermitida='';
        $this->AislamientoPosterior='';
        $this->AislamientoLateral='';
        $this->Antejardin='';
        $this->IndiceDeOcupacion='';
        $this->IndiceDeConstruccion='';
        $this->TiempoEsperadoDeComercializacion='';
        $this->AreaValorada='';
        $this->AreaMedidaEnLaInspeccion='';
        $this->AreaRegistradaEnTitulo='';
        $this->AreaSusceptibleDeLegalizacion='';
        $this->AreaCatastral='';
        $this->AreaLicenciaDeConstruccion='';
        $this->AreaValoradaObservaciones='';
        $this->ComportamientoOfertayDemanda='';
        $this->DSAIVI='';
        $this->ActualidadEdificadora='';
        $this->DemandaInteres=0;
        $this->UsoPredominante=0;
        $this->Legalidad=0;
        $this->Transporte=0;
        $this->Aire=0;
        $this->AguasServidas=0;
        $this->Basura=0;
        $this->Inseguridad=0;
        $this->Ruido=0;
        $this->SectorObservaciones=0;
        $this->AreasVerdesNE='';
        $this->AreasVerdesDAM='';
        $this->AsistencialNE='';
        $this->AsistencialDAM='';
        $this->ComercialNE='';
        $this->ComercialDAM='';
        $this->EscolarNE='';
        $this->EscolarDAM='';
        $this->EstacionamientosNE='';
        $this->EstacionamientosDAM='';
        $this->AreasRecreativasNE='';
        $this->AreasRecreativasDAM='';
        $this->SeguridadSectorNE='';
        $this->SeguridadSectorDAM='';
        $this->ViasDeAcceso='';
        $this->Andenes='';
        $this->Acueducto='';
        $this->EnergiaElectrica='';
        $this->GasNatural='';
        $this->Pavimentadas='';
        $this->Sardineles='';
        $this->Alcantarillado='';
        $this->Telefonia='';
        $this->Alamedas=0;
        $this->Alumbrado=0;
        $this->Arborizacion=0;
        $this->Ciclorutas=0;
        $this->Paradero=0;
        $this->Parques=0;
        $this->ZonasVerdes=0;
        $this->PerspectivasDeValorizacion='';
        $this->EstadoDeLaConstruccion='';
        $this->AvanceEnConstruccion='';
        $this->EstadoDeConservacion='';
        $this->NoDePisosDelInmueble='';
        $this->NumeroDeSotanos='';
        $this->VidaUtil='';
        $this->VidaRemanente='';
        $this->YearDeConstruccion='';
        $this->Edad='';
        $this->Estructura='';
        $this->MaterialDeEstructura='';
        $this->EstructuraEstado='';
        $this->Remodelado='';
        $this->UsoActualPredominante='';
        $this->AjusteSismorresistente='';
        $this->Cubierta='';
        $this->Fachada='';
        $this->TipoDeFachadaEnMetros='';
        $this->EstructuraReforzada='';
        $this->DanosPrevios='';
        $this->MaterialDeConstruccion='';
        $this->Iluminacion='';
        $this->Ventilacion='';
        $this->IrregularidadPlanta='';
        $this->IrregularidadAltura='';
        $this->ComentariosDeLaEstructura='';
        $this->CarpinteriaMetalicaCalidad='';
        $this->CarpinteriaMetalicaEstado='';
        $this->CarpinteriaEnMaderaCalidad='';
        $this->CarpinteriaEnMaderaEstado='';
        $this->PisosCalidad='';
        $this->PisosEstado='';
        $this->MurosCalidad='';
        $this->MurosEstado='';
        $this->TechosCalidad='';
        $this->TechosEstado='';
        $this->CocinaCalidad='';
        $this->CocinaEstado='';
        $this->BanosCalidad='';
        $this->BanosEstado='';
        $this->PredioAcueducto='';
        $this->PredioEnergiaElectrica='';
        $this->PredioTelefonia='';
        $this->PredioAlcantarillado='';
        $this->PredioGasNatural='';
        $this->PredioAlcobas='';
        $this->PredioBalcon='';
        $this->PredioBanoPrivado='';
        $this->PredioCocina='';
        $this->PredioEstarHabitacion='';
        $this->PredioJardin='';
        $this->PredioSala='';
        $this->PredioZonaDeRopas='';
        $this->PredioCloset='';
        $this->PredioAlcobaDeServicio='';
        $this->PredioBanoDeServicio='';
        $this->PredioBanoSocial='';
        $this->PredioComedor='';
        $this->PredioEstudio='';
        $this->PredioPatioInterior='';
        $this->PredioTerraza='';
        $this->PredioSubdivididoFisicamente='';
        $this->PredioTotalCuposDeParqueo='';
        $this->PredioBahiaComunal='';
        $this->PredioDescubierto='';
        $this->PredioPrivado='';
        $this->PredioServidumbre='';
        $this->PredioUsoExclusivo='';
        $this->PredioCubierto='';
        $this->PredioDoble='';
        $this->PredioSencillo='';
        $this->PredioBodega='';
        $this->PredioTipoDeDeposito='';
        $this->PredioOficina='';
        $this->PredioDeposito='';
        $this->PredioLocal='';
        $this->DCValorAdmon= '';
        $this->DCMensualidad= '';
        $this->DCValorAdmonM2='';
        $this->DCVigilanciaPrivada='';
        $this->DCAscensores='';
        $this->DCAACentral='';
        $this->DCBBQ='';
        $this->DCBicicletero='';
        $this->DCBombaEyec='';
        $this->DCCalefaccion='';
        $this->DCCanchaMultiuso='';
        $this->DCCanchaSquash='';
        $this->DCCCTV='';
        $this->DCCitofonia='';
        $this->DCClubHouse='';
        $this->DCEquipoDePresion='';
        $this->DCGarajesResidentes='';
        $this->DCGarajesVisitantes='';
        $this->DCGimnasio='';
        $this->DCGolfito='';
        $this->DCGuarderia='';
        $this->DCJuegosNinos='';
        $this->DCPiscina='';
        $this->DCPlantaElectrica='';
        $this->DCPorteria='';
        $this->DCSalonComunal='';
        $this->DCSalonDeJuegos='';
        $this->DCSauna='';
        $this->DCShutBasuras='';
        $this->DCTanqueDeAgua='';
        $this->DCTeatrino='';
        $this->DCTerrazaComunal='';
        $this->DCTurco='';
        $this->DCVigilancia24Horas='';
        $this->DCZonaVerde='';
        $this->DCOtros='';
        $this->jsonEA ='[]';
        $this->ICDireccion1='';
        $this->ICEdad1=0;
        $this->ICAreaLote1=0;
        $this->ICAreaConstr1=0;
        $this->ICValorConstr1=0;
        $this->ICValorComercial1=0;
        $this->ICFuente1='';
        $this->ICDireccion2='';
        $this->ICEdad2=0;
        $this->ICAreaLote2=0;
        $this->ICAreaConstr2=0;
        $this->ICValorConstr2=0;
        $this->ICValorComercial2=0;
        $this->ICFuente2='';
        $this->ICDireccion3='';
        $this->ICEdad3=0;
        $this->ICAreaLote3=0;
        $this->ICAreaConstr3=0;
        $this->ICValorConstr3=0;
        $this->ICValorComercial3=0;
        $this->ICFuente3='';
        $this->ICEdad4 = 0;
        $this->ICAreaLote4 = 0;
        $this->ICAreaConstr4 = 0;
        $this->DVRDiagnostico ='';
        $this->CVTTerreno =  '';
        $this->CVTDescripcion =  '';
        $this->CVTArea =  0;
        $this->CVTUniadDeMedida = '';
        $this->CVTValorUnitario = 0;
        $this->CVTValor =  0;
        $this->CVTPorcentaje =  0;
        $this->CVEEdificaciones =  '';
        $this->CVEDescripcion =  '';
        $this->CVEArea =  0;
        $this->CVEUniadDeMedida =  '';
        $this->CVEValorUnitario =  0;
        $this->CVEValor =  0;
        $this->CVEPorcentaje =  0;
        $this->CroquisImg = '';
        $this->RFImg = '';
        $this->RFAImg ='';

      
    }

    public function getSolicitante()
    {
       return $this->Solicitante;
    }
   
    function materializar($conn)
    {
        parent::materializar($conn);
        $this->Departamento=$conn['Departamento'];
        $this->Municipio=$conn['Municipio'];
        $this->Barrio=$conn['Barrio'];
        $this->Direccion=$conn['Direccion'];
        $this->CodigoDane=$conn['CodigoDane'];
        $this->ImgDireccion= $conn['ImgDireccion'];
        $this->Latitud=$conn['Latitud'];
        $this->Longitud=$conn['Longitud'];
        $this->GeoLocalizacionImg=$conn['GeoLocalizacionImg'];
        $this->FechaDeVisita=$conn['FechaDeVisita'];
        $this->FechaDelAvalio=$conn['FechaDelAvalio'];
        $this->TipoDeAvaluo=$conn['TipoDeAvaluo'];
        $this->FinalidadDelAvaluo=$conn['FinalidadDelAvaluo'];
        $this->ObjetoDelAvaluo=$conn['ObjetoDelAvaluo'];
        $this->Entidad=$conn['Entidad'];
        $this->Solicitante=$conn['Solicitante'];
        $this->TipoDeDocumento=$conn['TipoDeDocumento'];
        $this->NumeroDocumento=$conn['NumeroDocumento'];
        $this->TipoDeBien=$conn['TipoDeBien'];
        $this->Sector=$conn['Sector'];
        $this->ViviendaInteresSocial=$conn['ViviendaInteresSocial'];
        $this->Estrato=$conn['Estrato'];
        $this->Producto = $conn['Producto'];
        $this->matriculainmTipo1=$conn['matriculainmTipo1'];
        $this->matriculainmNumero1 = $conn['matriculainmNumero1'];
        $this->matriculainmTipo2=$conn['matriculainmTipo2'];
        $this->matriculainmNumero2=$conn['matriculainmNumero2'];   
        $this->Propietario=$conn['Propietario'];
        $this->NumeroDeEscritura=$conn['NumeroDeEscritura'];
        $this->AspJFecha=$conn['AspJFecha'];
        $this->NumeroDeNotaria=$conn['NumeroDeNotaria'];
        $this->AspMunicipio=$conn['AspMunicipio'];
        $this->AspDepartamento=$conn['AspDepartamento'];
        $this->Chip=$conn['Chip'];
        $this->CedulaCatastral=$conn['CedulaCatastral'];
        $this->TipoDePropiedad=$conn['TipoDePropiedad'];
        $this->CoeficienteDeCopropiedad=$conn['CoeficienteDeCopropiedad'];
        $this->LicenciaDeConstruccion=$conn['LicenciaDeConstruccion'];
        $this->DescripcionGeneral=$conn['DescripcionGeneral'];
        $this->AreaLote=$conn['AreaLote'];
        $this->Forma=$conn['Forma'];
        $this->Topografia=$conn['Topografia'];
        $this->Frente=$conn['Frente'];
        $this->Fondo=$conn['Fondo'];
        $this->RelacionFrenteFondo=$conn['RelacionFrenteFondo'];
        $this->DecretoAcuerdo=$conn['DecretoAcuerdo'];
        $this->UsoPrincipal=$conn['UsoPrincipal'];
        $this->AlturaPermitida=$conn['AlturaPermitida'];
        $this->AislamientoPosterior=$conn['AislamientoPosterior'];
        $this->AislamientoLateral=$conn['AislamientoLateral'];
        $this->Antejardin=$conn['Antejardin'];
        $this->IndiceDeOcupacion=$conn['IndiceDeOcupacion'];
        $this->IndiceDeConstruccion=$conn['IndiceDeConstruccion'];
        $this->TiempoEsperadoDeComercializacion=$conn['TiempoEsperadoDeComercializacion'];
        $this->AreaValorada=$conn['AreaValorada'];
        $this->AreaMedidaEnLaInspeccion=$conn['AreaMedidaEnLaInspeccion'];
        $this->AreaRegistradaEnTitulo=$conn['AreaRegistradaEnTitulo'];
        $this->AreaSusceptibleDeLegalizacion=$conn['AreaSusceptibleDeLegalizacion'];
        $this->AreaCatastral=$conn['AreaCatastral'];
        $this->AreaLicenciaDeConstruccion=$conn['AreaLicenciaDeConstruccion'];
        $this->AreaValoradaObservaciones=$conn['AreaValoradaObservaciones'];
        $this->ComportamientoOfertayDemanda=$conn['ComportamientoOfertayDemanda'];
        $this->DSAIVI=$conn['DSAIVI'];
        $this->ActualidadEdificadora=$conn['ActualidadEdificadora'];
        $this->DemandaInteres = $conn['DemandaInteres'];
        $this->UsoPredominante= $conn['UsoPredominante'];
        $this->Legalidad= $conn['Legalidad'];
        $this->Transporte= $conn['Transporte'];
        $this->Aire= $conn['Aire'];
        $this->AguasServidas= $conn['AguasServidas'];
        $this->Basura= $conn['Basura'];
        $this->Inseguridad= $conn['Inseguridad'];
        $this->Ruido= $conn['Ruido'];
        $this->SectorObservaciones = $conn['SectorObservaciones'];
        $this->AreasVerdesNE       = $conn['AreasVerdesNE'];
        $this->AreasVerdesDAM      = $conn['AreasVerdesDAM'];
        $this->AsistencialNE       = $conn['AsistencialNE'];
        $this->AsistencialDAM      = $conn['AsistencialDAM'];
        $this->ComercialNE         = $conn['ComercialNE'];
        $this->ComercialDAM        = $conn['ComercialDAM'];
        $this->EscolarNE           = $conn['EscolarNE'];
        $this->EscolarDAM          = $conn['EscolarDAM'];
        $this->EstacionamientosNE  = $conn['EstacionamientosNE'];
        $this->EstacionamientosDAM = $conn['EstacionamientosDAM'];
        $this->AreasRecreativasNE  = $conn['AreasRecreativasNE'];
        $this->AreasRecreativasDAM = $conn['AreasRecreativasDAM'];
        $this->SeguridadSectorNE = $conn['SeguridadSectorNE'];
        $this->SeguridadSectorDAM = $conn['SeguridadSectorDAM'];
        $this->ViasDeAcceso               = $conn['ViasDeAcceso'];
        $this->Andenes                    = $conn['Andenes'];
        $this->Acueducto                  = $conn['Acueducto'];
        $this->EnergiaElectrica           = $conn['EnergiaElectrica'];
        $this->GasNatural                 = $conn['GasNatural'];
        $this->Pavimentadas               = $conn['Pavimentadas'];
        $this->Sardineles                 = $conn['Sardineles'];
        $this->Alcantarillado             = $conn['Alcantarillado'];
        $this->Telefonia                  = $conn['Telefonia'];
        $this->Alamedas                   = $conn['Alamedas'];
        $this->Alumbrado                  = $conn['Alumbrado'];
        $this->Arborizacion               = $conn['Arborizacion'];
        $this->Ciclorutas                 = $conn['Ciclorutas'];
        $this->Paradero                   = $conn['Paradero'];
        $this->Parques                    = $conn['Parques'];
        $this->ZonasVerdes                = $conn['ZonasVerdes'];
        $this->PerspectivasDeValorizacion = $conn['PerspectivasDeValorizacion'];
        $this->EstadoDeLaConstruccion= $conn['EstadoDeLaConstruccion'];
        $this->AvanceEnConstruccion= $conn['AvanceEnConstruccion'];
        $this->EstadoDeConservacion= $conn['EstadoDeConservacion'];
        $this->NoDePisosDelInmueble= $conn['NoDePisosDelInmueble'];
        $this->NumeroDeSotanos= $conn['NumeroDeSotanos'];
        $this->VidaUtil= $conn['VidaUtil'];
        $this->VidaRemanente= $conn['VidaRemanente'];
        $this->YearDeConstruccion= $conn['YearDeConstruccion'];
        $this->Edad= $conn['Edad'];
        $this->Estructura= $conn['Estructura'];
        $this->MaterialDeEstructura= $conn['MaterialDeEstructura'];
        $this->EstructuraEstado= $conn['EstructuraEstado'];
        $this->Remodelado= $conn['Remodelado'];
        $this->UsoActualPredominante= $conn['UsoActualPredominante'];
        $this->AjusteSismorresistente= $conn['AjusteSismorresistente'];
        $this->Cubierta= $conn['Cubierta'];
        $this->Fachada= $conn['Fachada'];
        $this->TipoDeFachadaEnMetros= $conn['TipoDeFachadaEnMetros'];
        $this->EstructuraReforzada= $conn['EstructuraReforzada'];
        $this->DanosPrevios= $conn['DanosPrevios'];
        $this->MaterialDeConstruccion= $conn['MaterialDeConstruccion'];
        $this->Iluminacion= $conn['Iluminacion'];
        $this->Ventilacion= $conn['Ventilacion'];
        $this->IrregularidadPlanta= $conn['IrregularidadPlanta'];
        $this->IrregularidadAltura= $conn['IrregularidadAltura'];
        $this->ComentariosDeLaEstructura= $conn['ComentariosDeLaEstructura'];
        $this->CarpinteriaMetalicaCalidad= $conn['CarpinteriaMetalicaCalidad'];
        $this->CarpinteriaMetalicaEstado= $conn['CarpinteriaMetalicaEstado'];
        $this->CarpinteriaEnMaderaCalidad= $conn['CarpinteriaEnMaderaCalidad'];
        $this->CarpinteriaEnMaderaEstado= $conn['CarpinteriaEnMaderaEstado'];
        $this->PisosCalidad= $conn['PisosCalidad'];
        $this->PisosEstado= $conn['PisosEstado'];
        $this->MurosCalidad= $conn['MurosCalidad'];
        $this->MurosEstado= $conn['MurosEstado'];
        $this->TechosCalidad= $conn['TechosCalidad'];
        $this->TechosEstado= $conn['TechosEstado'];
        $this->CocinaCalidad= $conn['CocinaCalidad'];
        $this->CocinaEstado= $conn['CocinaEstado'];
        $this->BanosCalidad= $conn['BanosCalidad'];
        $this->BanosEstado= $conn['BanosEstado'];
        $this->PredioAcueducto = $conn['PredioAcueducto'];
        $this->PredioEnergiaElectrica = $conn['PredioEnergiaElectrica'];
        $this->PredioTelefonia = $conn['PredioTelefonia'];
        $this->PredioAlcantarillado = $conn['PredioAlcantarillado'];
        $this->PredioGasNatural = $conn['PredioGasNatural'];
        $this->PredioAlcobas = $conn['PredioAlcobas'];
        $this->PredioBalcon = $conn['PredioBalcon'];
        $this->PredioBanoPrivado = $conn['PredioBanoPrivado'];
        $this->PredioCocina = $conn['PredioCocina'];
        $this->PredioEstarHabitacion = $conn['PredioEstarHabitacion'];
        $this->PredioJardin = $conn['PredioJardin'];
        $this->PredioSala = $conn['PredioSala'];
        $this->PredioZonaDeRopas = $conn['PredioZonaDeRopas'];
        $this->PredioCloset = $conn['PredioCloset'];
        $this->PredioAlcobaDeServicio = $conn['PredioAlcobaDeServicio'];
        $this->PredioBanoDeServicio = $conn['PredioBanoDeServicio'];
        $this->PredioBanoSocial = $conn['PredioBanoSocial'];
        $this->PredioComedor = $conn['PredioComedor'];
        $this->PredioEstudio = $conn['PredioEstudio'];
        $this->PredioPatioInterior = $conn['PredioPatioInterior'];
        $this->PredioTerraza = $conn['PredioTerraza'];
        $this->PredioSubdivididoFisicamente = $conn['PredioSubdivididoFisicamente'];
        $this->PredioTotalCuposDeParqueo = $conn['PredioTotalCuposDeParqueo'];
        $this->PredioBahiaComunal = $conn['PredioBahiaComunal'];
        $this->PredioDescubierto = $conn['PredioDescubierto'];
        $this->PredioPrivado = $conn['PredioPrivado'];
        $this->PredioServidumbre = $conn['PredioServidumbre'];
        $this->PredioUsoExclusivo = $conn['PredioUsoExclusivo'];
        $this->PredioCubierto = $conn['PredioCubierto'];
        $this->PredioDoble = $conn['PredioDoble'];
        $this->PredioSencillo = $conn['PredioSencillo'];
        $this->PredioBodega = $conn['PredioBodega'];
        $this->PredioTipoDeDeposito = $conn['PredioTipoDeDeposito'];
        $this->PredioOficina = $conn['PredioOficina'];
        $this->PredioDeposito = $conn['PredioDeposito'];
        $this->PredioLocal = $conn['PredioLocal'];
        $this->DCValorAdmon = $conn['DCValorAdmon'];
        $this->DCMensualidad = $conn['DCMensualidad'];
        $this->DCValorAdmonM2 = $conn['DCValorAdmonM2'];
        $this->DCVigilanciaPrivada = $conn['DCVigilanciaPrivada'];
        $this->DCAscensores = $conn['DCAscensores'];
        $this->DCAACentral = $conn['DCAACentral'];
        $this->DCBBQ = $conn['DCBBQ'];
        $this->DCBicicletero = $conn['DCBicicletero'];
        $this->DCBombaEyec = $conn['DCBombaEyec'];
        $this->DCCalefaccion = $conn['DCCalefaccion'];
        $this->DCCanchaMultiuso = $conn['DCCanchaMultiuso'];
        $this->DCCanchaSquash = $conn['DCCanchaSquash'];
        $this->DCCCTV = $conn['DCCCTV'];
        $this->DCCitofonia = $conn['DCCitofonia'];
        $this->DCClubHouse = $conn['DCClubHouse'];
        $this->DCEquipoDePresion = $conn['DCEquipoDePresion'];
        $this->DCGarajesResidentes = $conn['DCGarajesResidentes'];
        $this->DCGarajesVisitantes = $conn['DCGarajesVisitantes'];
        $this->DCGimnasio = $conn['DCGimnasio'];
        $this->DCGolfito = $conn['DCGolfito'];
        $this->DCGuarderia = $conn['DCGuarderia'];
        $this->DCJuegosNinos = $conn['DCJuegosNinos'];
        $this->DCPiscina = $conn['DCPiscina'];
        $this->DCPlantaElectrica = $conn['DCPlantaElectrica'];
        $this->DCPorteria = $conn['DCPorteria'];
        $this->DCSalonComunal = $conn['DCSalonComunal'];
        $this->DCSalonDeJuegos = $conn['DCSalonDeJuegos'];
        $this->DCSauna = $conn['DCSauna'];
        $this->DCShutBasuras = $conn['DCShutBasuras'];
        $this->DCTanqueDeAgua = $conn['DCTanqueDeAgua'];
        $this->DCTeatrino = $conn['DCTeatrino'];
        $this->DCTerrazaComunal = $conn['DCTerrazaComunal'];
        $this->DCTurco = $conn['DCTurco'];
        $this->DCVigilancia24Horas = $conn['DCVigilancia24Horas'];
        $this->DCZonaVerde = $conn['DCZonaVerde'];
        $this->DCOtros = $conn['DCOtros'];
        $jsonEAAux = $conn['jsonEA'];
        if($jsonEAAux == null || $jsonEAAux == '')
            $this->jsonEA = '[]';
        else
            $this->jsonEA = $jsonEAAux; 

        $this->ICDireccion1=$conn['ICDireccion1'];
        $this->ICEdad1=$conn['ICEdad1'];
        $this->ICAreaLote1=$conn['ICAreaLote1'];
        $this->ICAreaConstr1=$conn['ICAreaConstr1'];
        $this->ICValorConstr1=$conn['ICValorConstr1'];
        $this->ICValorComercial1=$conn['ICValorComercial1'];
        $this->ICFuente1=$conn['ICFuente1'];    
        $this->ICDireccion2=$conn['ICDireccion2'];
        $this->ICEdad2=$conn['ICEdad2'];
        $this->ICAreaLote2=$conn['ICAreaLote2'];
        $this->ICAreaConstr2=$conn['ICAreaConstr2'];
        $this->ICValorConstr2=$conn['ICValorConstr2'];
        $this->ICValorComercial2=$conn['ICValorComercial2'];
        $this->ICFuente2=$conn['ICFuente2'];
        $this->ICDireccion3=$conn['ICDireccion3'];
        $this->ICEdad3=$conn['ICEdad3'];
        $this->ICAreaLote3=$conn['ICAreaLote3'];
        $this->ICAreaConstr3=$conn['ICAreaConstr3'];
        $this->ICValorConstr3=$conn['ICValorConstr3'];
        $this->ICValorComercial3=$conn['ICValorComercial3'];
        $this->ICFuente3=$conn['ICFuente3'];
        $this->ICEdad4 =$conn['ICEdad4'];
        $this->ICAreaLote4 =$conn['ICAreaLote4'];
        $this->ICAreaConstr4 =$conn['ICAreaConstr4'];
        $this->DVRDiagnostico =  $conn['DVRDiagnostico'];
        $this->CVTTerreno =  $conn['CVTTerreno'];
        $this->CVTDescripcion =  $conn['CVTDescripcion'];
        $this->CVTArea =  $conn['CVTArea'];
        $this->CVTUniadDeMedida =  $conn['CVTUniadDeMedida'];
        $this->CVTValorUnitario =  $conn['CVTValorUnitario'];
        $this->CVTValor =  $conn['CVTValor'];
        $this->CVTPorcentaje =  $conn['CVTPorcentaje'];
        $this->CVEEdificaciones =  $conn['CVEEdificaciones'];
        $this->CVEDescripcion =  $conn['CVEDescripcion'];
        $this->CVEArea =  $conn['CVEArea'];
        $this->CVEUniadDeMedida =  $conn['CVEUniadDeMedida'];
        $this->CVEValorUnitario =  $conn['CVEValorUnitario'];
        $this->CVEValor =  $conn['CVEValor'];
        $this->CVEPorcentaje =  $conn['CVEPorcentaje'];
        $this->CroquisImg = $conn['CroquisImg'];
        $this->RFImg = $conn['RFImg'];
        $this->RFAImg = $conn['RFAImg'];

    }

   
    function crearConsultaRegistro()
    {
         return"
         INSERT INTO avaluoenntity 
         (
            Departamento, 
            Municipio, 
            Barrio, 
            Direccion,
            CodigoDane,           
            ImgDireccion,
            Latitud,
            Longitud,
            GeoLocalizacionImg,            
            FechaDeVisita,             
            FechaDelAvalio,
            TipoDeAvaluo,
            FinalidadDelAvaluo,
            ObjetoDelAvaluo,
            Entidad,
            Solicitante,
            TipoDeDocumento,
            NumeroDocumento,
            TipoDeBien,
            Sector,
            ViviendaInteresSocial,
            Estrato,
            Producto,
            matriculainmTipo1,
            matriculainmNumero1,
            matriculainmTipo2,
            matriculainmNumero2,         
            Propietario,
            NumeroDeEscritura,
            AspJFecha,
            NumeroDeNotaria,
            AspMunicipio,
            AspDepartamento,
            Chip,
            CedulaCatastral,
            TipoDePropiedad,
            CoeficienteDeCopropiedad,
            LicenciaDeConstruccion,
            DescripcionGeneral,
            AreaLote,
            Forma,
            Topografia,
            Frente,
            Fondo,
            RelacionFrenteFondo,
            DecretoAcuerdo,
            UsoPrincipal,
            AlturaPermitida,
            AislamientoPosterior,
            AislamientoLateral,
            Antejardin,
            IndiceDeOcupacion,
            IndiceDeConstruccion,
            TiempoEsperadoDeComercializacion,
            AreaValorada,
            AreaMedidaEnLaInspeccion,
            AreaRegistradaEnTitulo,
            AreaSusceptibleDeLegalizacion,
            AreaCatastral,
            AreaLicenciaDeConstruccion,
            AreaValoradaObservaciones,
            ComportamientoOfertayDemanda,
            DSAIVI,
            ActualidadEdificadora,
            DemandaInteres,
            UsoPredominante,
            Legalidad,
            Transporte,
            Aire,
            AguasServidas,
            Basura,
            Inseguridad,
            Ruido,
            SectorObservaciones,
            AreasVerdesNE,
            AreasVerdesDAM,
            AsistencialNE,
            AsistencialDAM,
            ComercialNE,
            ComercialDAM,
            EscolarNE,
            EscolarDAM,
            EstacionamientosNE,
            EstacionamientosDAM,
            AreasRecreativasNE,
            AreasRecreativasDAM,
            SeguridadSectorNE,
            SeguridadSectorDAM,
            ViasDeAcceso,
            Andenes,
            Acueducto,
            EnergiaElectrica,
            GasNatural,
            Pavimentadas,
            Sardineles,
            Alcantarillado,
            Telefonia,
            Alamedas,
            Alumbrado,
            Arborizacion,
            Ciclorutas,
            Paradero,
            Parques,
            ZonasVerdes,
            PerspectivasDeValorizacion,
            EstadoDeLaConstruccion,
            AvanceEnConstruccion,
            EstadoDeConservacion,
            NoDePisosDelInmueble,
            NumeroDeSotanos,
            VidaUtil,
            VidaRemanente,
            YearDeConstruccion,
            Edad,
            Estructura,
            MaterialDeEstructura,
            EstructuraEstado,
            Remodelado,
            UsoActualPredominante,
            AjusteSismorresistente,
            Cubierta,
            Fachada,
            TipoDeFachadaEnMetros,
            EstructuraReforzada,
            DanosPrevios,
            MaterialDeConstruccion,
            Iluminacion,
            Ventilacion,
            IrregularidadPlanta,
            IrregularidadAltura,
            ComentariosDeLaEstructura,
            CarpinteriaMetalicaCalidad,
            CarpinteriaMetalicaEstado,
            CarpinteriaEnMaderaCalidad,
            CarpinteriaEnMaderaEstado,
            PisosCalidad,
            PisosEstado,
            MurosCalidad,
            MurosEstado,
            TechosCalidad,
            TechosEstado,
            CocinaCalidad,
            CocinaEstado,
            BanosCalidad,
            BanosEstado,
            PredioAcueducto,
            PredioEnergiaElectrica,
            PredioTelefonia,
            PredioAlcantarillado,
            PredioGasNatural,
            PredioAlcobas,
            PredioBalcon,
            PredioBanoPrivado,
            PredioCocina,
            PredioEstarHabitacion,
            PredioJardin,
            PredioSala,
            PredioZonaDeRopas,
            PredioCloset,
            PredioAlcobaDeServicio,
            PredioBanoDeServicio,
            PredioBanoSocial,
            PredioComedor,
            PredioEstudio,
            PredioPatioInterior,
            PredioTerraza,
            PredioSubdivididoFisicamente,
            PredioTotalCuposDeParqueo,
            PredioBahiaComunal,
            PredioDescubierto,
            PredioPrivado,
            PredioServidumbre,
            PredioUsoExclusivo,
            PredioCubierto,
            PredioDoble,
            PredioSencillo,
            PredioBodega,
            PredioTipoDeDeposito,
            PredioOficina,
            PredioDeposito,
            PredioLocal,
            DCValorAdmon,
            DCMensualidad,
            DCValorAdmonM2,
            DCVigilanciaPrivada,
            DCAscensores,
            DCAACentral,
            DCBBQ,
            DCBicicletero,
            DCBombaEyec,
            DCCalefaccion,
            DCCanchaMultiuso,
            DCCanchaSquash,
            DCCCTV,
            DCCitofonia,
            DCClubHouse,
            DCEquipoDePresion,
            DCGarajesResidentes,
            DCGarajesVisitantes,
            DCGimnasio,
            DCGolfito,
            DCGuarderia,
            DCJuegosNinos,
            DCPiscina,
            DCPlantaElectrica,
            DCPorteria,
            DCSalonComunal,
            DCSalonDeJuegos,
            DCSauna,
            DCShutBasuras,
            DCTanqueDeAgua,
            DCTeatrino,
            DCTerrazaComunal,
            DCTurco,
            DCVigilancia24Horas,
            DCZonaVerde,
            DCOtros,
            jsonEA,            
            ICDireccion1,
            ICEdad1,
            ICAreaLote1,
            ICAreaConstr1,
            ICValorConstr1,
            ICValorComercial1,
            ICFuente1,    
            ICDireccion2,
            ICEdad2,
            ICAreaLote2,
            ICAreaConstr2,
            ICValorConstr2,
            ICValorComercial2,
            ICFuente2,
            ICDireccion3,
            ICEdad3,
            ICAreaLote3,
            ICAreaConstr3,
            ICValorConstr3,
            ICValorComercial3,
            ICFuente3,
            ICEdad4,
            ICAreaLote4,
            ICAreaConstr4,
            DVRDiagnostico,
            CVTTerreno,
            CVTDescripcion,
            CVTArea,
            CVTUniadDeMedida,
            CVTValorUnitario,
            CVTValor,
            CVTPorcentaje,
            CVEEdificaciones,
            CVEDescripcion,
            CVEArea,
            CVEUniadDeMedida,
            CVEValorUnitario,
            CVEValor,
            CVEPorcentaje,
            CroquisImg,
            RFImg,
            RFAImg,
            fechaRegistro, 
            idRegistradoPor, 
            fechaUltimaModificacion, 
            idModificadoPor,estado
           ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";            
    }

    function getArrayRegistrar()
    {
        $array = array
        (
          
            $this->Departamento,
            $this->Municipio,
            $this->Barrio,
            $this->Direccion,
            $this->CodigoDane,
            $this->ImgDireccion,
            $this->Latitud,
            $this->Longitud,
            $this->GeoLocalizacionImg,            
            $this->FechaDeVisita,
            $this->FechaDelAvalio,
            $this->TipoDeAvaluo,
            $this->FinalidadDelAvaluo,
            $this->ObjetoDelAvaluo,
            $this->Entidad,
            $this->Solicitante,
            $this->TipoDeDocumento,
            $this->NumeroDocumento,
            $this->TipoDeBien,
            $this->Sector,
            $this->ViviendaInteresSocial,
            $this->Estrato,
            $this->Producto,
            $this->matriculainmTipo1,
            $this->matriculainmNumero1,
            $this->matriculainmTipo2,
            $this->matriculainmNumero2,          
            $this->Propietario,
            $this->NumeroDeEscritura,
            $this->AspJFecha,
            $this->NumeroDeNotaria,
            $this->AspMunicipio,
            $this->AspDepartamento,
            $this->Chip,
            $this->CedulaCatastral,
            $this->TipoDePropiedad,
            $this->CoeficienteDeCopropiedad,
            $this->LicenciaDeConstruccion,
            $this->DescripcionGeneral,
            $this->AreaLote,
            $this->Forma,
            $this->Topografia,
            $this->Frente,
            $this->Fondo,
            $this->RelacionFrenteFondo,
            $this->DecretoAcuerdo,
            $this->UsoPrincipal,
            $this->AlturaPermitida,
            $this->AislamientoPosterior,
            $this->AislamientoLateral,
            $this->Antejardin,
            $this->IndiceDeOcupacion,
            $this->IndiceDeConstruccion,
            $this->TiempoEsperadoDeComercializacion,
            $this->AreaValorada,
            $this->AreaMedidaEnLaInspeccion,
            $this->AreaRegistradaEnTitulo,
            $this->AreaSusceptibleDeLegalizacion,
            $this->AreaCatastral,
            $this->AreaLicenciaDeConstruccion,
            $this->AreaValoradaObservaciones,
            $this->ComportamientoOfertayDemanda,
            $this->DSAIVI,
            $this->ActualidadEdificadora,
            $this->DemandaInteres,
            $this->UsoPredominante,
            $this->Legalidad,
            $this->Transporte,
            $this->Aire,
            $this->AguasServidas,
            $this->Basura,
            $this->Inseguridad,
            $this->Ruido,
            $this->SectorObservaciones,
            $this->AreasVerdesNE,
            $this->AreasVerdesDAM,
            $this->AsistencialNE,
            $this->AsistencialDAM,
            $this->ComercialNE,
            $this->ComercialDAM,
            $this->EscolarNE,
            $this->EscolarDAM,
            $this->EstacionamientosNE,
            $this->EstacionamientosDAM,
            $this->AreasRecreativasNE,
            $this->AreasRecreativasDAM,
            $this->SeguridadSectorNE,
            $this->SeguridadSectorDAM,
            $this->ViasDeAcceso,
            $this->Andenes,
            $this->Acueducto,
            $this->EnergiaElectrica,
            $this->GasNatural,
            $this->Pavimentadas,
            $this->Sardineles,
            $this->Alcantarillado,
            $this->Telefonia,
            $this->Alamedas,
            $this->Alumbrado,
            $this->Arborizacion,
            $this->Ciclorutas,
            $this->Paradero,
            $this->Parques,
            $this->ZonasVerdes,
            $this->PerspectivasDeValorizacion,
            $this->EstadoDeLaConstruccion,
            $this->AvanceEnConstruccion,
            $this->EstadoDeConservacion,
            $this->NoDePisosDelInmueble,
            $this->NumeroDeSotanos,
            $this->VidaUtil,
            $this->VidaRemanente,
            $this->YearDeConstruccion,
            $this->Edad,
            $this->Estructura,
            $this->MaterialDeEstructura,
            $this->EstructuraEstado,
            $this->Remodelado,
            $this->UsoActualPredominante,
            $this->AjusteSismorresistente,
            $this->Cubierta,
            $this->Fachada,
            $this->TipoDeFachadaEnMetros,
            $this->EstructuraReforzada,
            $this->DanosPrevios,
            $this->MaterialDeConstruccion,
            $this->Iluminacion,
            $this->Ventilacion,
            $this->IrregularidadPlanta,
            $this->IrregularidadAltura,
            $this->ComentariosDeLaEstructura,
            $this->CarpinteriaMetalicaCalidad,
            $this->CarpinteriaMetalicaEstado,
            $this->CarpinteriaEnMaderaCalidad,
            $this->CarpinteriaEnMaderaEstado,
            $this->PisosCalidad,
            $this->PisosEstado,
            $this->MurosCalidad,
            $this->MurosEstado,
            $this->TechosCalidad,
            $this->TechosEstado,
            $this->CocinaCalidad,
            $this->CocinaEstado,
            $this->BanosCalidad,
            $this->BanosEstado,
            $this->PredioAcueducto,
            $this->PredioEnergiaElectrica,
            $this->PredioTelefonia,
            $this->PredioAlcantarillado,
            $this->PredioGasNatural,
            $this->PredioAlcobas,
            $this->PredioBalcon,
            $this->PredioBanoPrivado,
            $this->PredioCocina,
            $this->PredioEstarHabitacion,
            $this->PredioJardin,
            $this->PredioSala,
            $this->PredioZonaDeRopas,
            $this->PredioCloset,
            $this->PredioAlcobaDeServicio,
            $this->PredioBanoDeServicio,
            $this->PredioBanoSocial,
            $this->PredioComedor,
            $this->PredioEstudio,
            $this->PredioPatioInterior,
            $this->PredioTerraza,
            $this->PredioSubdivididoFisicamente,
            $this->PredioTotalCuposDeParqueo,
            $this->PredioBahiaComunal,
            $this->PredioDescubierto,
            $this->PredioPrivado,
            $this->PredioServidumbre,
            $this->PredioUsoExclusivo,
            $this->PredioCubierto,
            $this->PredioDoble,
            $this->PredioSencillo,
            $this->PredioBodega,
            $this->PredioTipoDeDeposito,
            $this->PredioOficina,
            $this->PredioDeposito,
            $this->PredioLocal,
            $this->DCValorAdmon,
            $this->DCMensualidad,
            $this->DCValorAdmonM2,
            $this->DCVigilanciaPrivada,
            $this->DCAscensores,
            $this->DCAACentral,
            $this->DCBBQ,
            $this->DCBicicletero,
            $this->DCBombaEyec,
            $this->DCCalefaccion,
            $this->DCCanchaMultiuso,
            $this->DCCanchaSquash,
            $this->DCCCTV,
            $this->DCCitofonia,
            $this->DCClubHouse,
            $this->DCEquipoDePresion,
            $this->DCGarajesResidentes,
            $this->DCGarajesVisitantes,
            $this->DCGimnasio,
            $this->DCGolfito,
            $this->DCGuarderia,
            $this->DCJuegosNinos,
            $this->DCPiscina,
            $this->DCPlantaElectrica,
            $this->DCPorteria,
            $this->DCSalonComunal,
            $this->DCSalonDeJuegos,
            $this->DCSauna,
            $this->DCShutBasuras,
            $this->DCTanqueDeAgua,
            $this->DCTeatrino,
            $this->DCTerrazaComunal,
            $this->DCTurco,
            $this->DCVigilancia24Horas,
            $this->DCZonaVerde,
            $this->DCOtros,
            $this->jsonEA,
            $this->ICDireccion1,
            $this->ICEdad1,
            $this->ICAreaLote1,
            $this->ICAreaConstr1,
            $this->ICValorConstr1,
            $this->ICValorComercial1,
            $this->ICFuente1,    
            $this->ICDireccion2,
            $this->ICEdad2,
            $this->ICAreaLote2,
            $this->ICAreaConstr2,
            $this->ICValorConstr2,
            $this->ICValorComercial2,
            $this->ICFuente2,
            $this->ICDireccion3,
            $this->ICEdad3,
            $this->ICAreaLote3,
            $this->ICAreaConstr3,
            $this->ICValorConstr3,
            $this->ICValorComercial3,
            $this->ICFuente3,
            $this->ICEdad4,
            $this->ICAreaLote4,
            $this->ICAreaConstr4,
            $this->DVRDiagnostico,
            $this->CVTTerreno,
            $this->CVTDescripcion,
            $this->CVTArea,
            $this->CVTUniadDeMedida,
            $this->CVTValorUnitario,
            $this->CVTValor,
            $this->CVTPorcentaje,
            $this->CVEEdificaciones,
            $this->CVEDescripcion,
            $this->CVEArea,
            $this->CVEUniadDeMedida,
            $this->CVEValorUnitario,
            $this->CVEValor,
            $this->CVEPorcentaje,
            $this->CroquisImg,
            $this->RFImg,
            $this->RFAImg,
            $this->fechaRegistro,
            $this->idRegistradoPor,
            $this->fechaUltimaModificacion,
            $this->idModificadoPor,
            $this->estado,
          
           

        );
        return $array;
    }

    function crearConsultaModificar()
    {
         return  "UPDATE avaluoenntity SET 
            Departamento=?,
            Municipio=?,
            Barrio=?,
            Direccion=?,
            CodigoDane=?,
            ImgDireccion=?,
            Latitud=?,
            Longitud=?,
            GeoLocalizacionImg=?,
            FechaDeVisita=?,
            FechaDelAvalio=?,
            TipoDeAvaluo=?,
            FinalidadDelAvaluo=?,
            ObjetoDelAvaluo=?,
            Entidad=?,
            Solicitante=?,
            TipoDeDocumento=?,
            NumeroDocumento=?,
            TipoDeBien=?,
            Sector=?,
            ViviendaInteresSocial=?,
            Estrato=?,
            Producto=?,
            matriculainmTipo1=?,
            matriculainmNumero1=?,
            matriculainmTipo2=?,
            matriculainmNumero2=?,       
            Propietario=?,
            NumeroDeEscritura=?,
            AspJFecha=?,
            NumeroDeNotaria=?,
            AspMunicipio=?,
            AspDepartamento=?,
            Chip=?,
            CedulaCatastral=?,
            TipoDePropiedad=?,
            CoeficienteDeCopropiedad=?,
            LicenciaDeConstruccion=?,
            DescripcionGeneral=?,
            AreaLote=?,
            Forma=?,
            Topografia=?,
            Frente=?,
            Fondo=?,
            RelacionFrenteFondo=?,
            DecretoAcuerdo=?,
            UsoPrincipal=?,
            AlturaPermitida=?,
            AislamientoPosterior=?,
            AislamientoLateral=?,
            Antejardin=?,
            IndiceDeOcupacion=?,
            IndiceDeConstruccion=?,
            TiempoEsperadoDeComercializacion=?,           
            AreaValorada=?,
            AreaMedidaEnLaInspeccion=?,
            AreaRegistradaEnTitulo=?,
            AreaSusceptibleDeLegalizacion=?,
            AreaCatastral=?,
            AreaLicenciaDeConstruccion=?,
            AreaValoradaObservaciones=?,
            ComportamientoOfertayDemanda=?,
            DSAIVI=?,
            ActualidadEdificadora=?,
            DemandaInteres=?,
            UsoPredominante=?,
            Legalidad=?,
            Transporte=?,
            Aire=?,
            AguasServidas=?,
            Basura=?,
            Inseguridad=?,
            Ruido=?,
            SectorObservaciones=?,            
            AreasVerdesNE=?,
            AreasVerdesDAM=?,
            AsistencialNE=?,
            AsistencialDAM=?,
            ComercialNE=?,
            ComercialDAM=?,
            EscolarNE=?,
            EscolarDAM=?,
            EstacionamientosNE=?,
            EstacionamientosDAM=?,
            AreasRecreativasNE=?,
            AreasRecreativasDAM=?,
            SeguridadSectorNE=?,
            SeguridadSectorDAM=?,            
            ViasDeAcceso=?,
            Andenes=?,
            Acueducto=?,
            EnergiaElectrica=?,
            GasNatural=?,
            Pavimentadas=?,
            Sardineles=?,
            Alcantarillado=?,
            Telefonia=?,
            Alamedas=?,
            Alumbrado=?,
            Arborizacion=?,
            Ciclorutas=?,
            Paradero=?,
            Parques=?,
            ZonasVerdes=?,
            PerspectivasDeValorizacion=?,
            EstadoDeLaConstruccion=?,
            AvanceEnConstruccion=?,
            EstadoDeConservacion=?,
            NoDePisosDelInmueble=?,
            NumeroDeSotanos=?,
            VidaUtil=?,
            VidaRemanente=?,
            YearDeConstruccion=?,
            Edad=?,
            Estructura=?,
            MaterialDeEstructura=?,
            EstructuraEstado=?,
            Remodelado=?,
            UsoActualPredominante=?,
            AjusteSismorresistente=?,
            Cubierta=?,
            Fachada=?,
            TipoDeFachadaEnMetros=?,
            EstructuraReforzada=?,
            DanosPrevios=?,
            MaterialDeConstruccion=?,
            Iluminacion=?,
            Ventilacion=?,
            IrregularidadPlanta=?,
            IrregularidadAltura=?,
            ComentariosDeLaEstructura=?,
            CarpinteriaMetalicaCalidad=?,
            CarpinteriaMetalicaEstado=?,
            CarpinteriaEnMaderaCalidad=?,
            CarpinteriaEnMaderaEstado=?,
            PisosCalidad=?,
            PisosEstado=?,
            MurosCalidad=?,
            MurosEstado=?,
            TechosCalidad=?,
            TechosEstado=?,
            CocinaCalidad=?,
            CocinaEstado=?,
            BanosCalidad=?,
            BanosEstado=?,
            PredioAcueducto=?,
            PredioEnergiaElectrica=?,
            PredioTelefonia=?,
            PredioAlcantarillado=?,
            PredioGasNatural=?,
            PredioAlcobas=?,
            PredioBalcon=?,
            PredioBanoPrivado=?,
            PredioCocina=?,
            PredioEstarHabitacion=?,
            PredioJardin=?,
            PredioSala=?,
            PredioZonaDeRopas=?,
            PredioCloset=?,
            PredioAlcobaDeServicio=?,
            PredioBanoDeServicio=?,
            PredioBanoSocial=?,
            PredioComedor=?,
            PredioEstudio=?,
            PredioPatioInterior=?,
            PredioTerraza=?,
            PredioSubdivididoFisicamente=?,
            PredioTotalCuposDeParqueo=?,
            PredioBahiaComunal=?,
            PredioDescubierto=?,
            PredioPrivado=?,
            PredioServidumbre=?,
            PredioUsoExclusivo=?,
            PredioCubierto=?,
            PredioDoble=?,
            PredioSencillo=?,
            PredioBodega=?,
            PredioTipoDeDeposito=?,
            PredioOficina=?,
            PredioDeposito=?,
            PredioLocal=?,
            DCValorAdmon=?,
            DCMensualidad=?,
            DCValorAdmonM2=?,
            DCVigilanciaPrivada=?,
            DCAscensores=?,
            DCAACentral=?,
            DCBBQ=?,
            DCBicicletero=?,
            DCBombaEyec=?,
            DCCalefaccion=?,
            DCCanchaMultiuso=?,
            DCCanchaSquash=?,
            DCCCTV=?,
            DCCitofonia=?,
            DCClubHouse=?,
            DCEquipoDePresion=?,
            DCGarajesResidentes=?,
            DCGarajesVisitantes=?,
            DCGimnasio=?,
            DCGolfito=?,
            DCGuarderia=?,
            DCJuegosNinos=?,
            DCPiscina=?,
            DCPlantaElectrica=?,
            DCPorteria=?,
            DCSalonComunal=?,
            DCSalonDeJuegos=?,
            DCSauna=?,
            DCShutBasuras=?,
            DCTanqueDeAgua=?,
            DCTeatrino=?,
            DCTerrazaComunal=?,
            DCTurco=?,
            DCVigilancia24Horas=?,
            DCZonaVerde=?,
            DCOtros=?,
            jsonEA=?,            
            ICDireccion1=?,
            ICEdad1=?,
            ICAreaLote1=?,
            ICAreaConstr1=?,
            ICValorConstr1=?,
            ICValorComercial1=?,
            ICFuente1=?,    
            ICDireccion2=?,
            ICEdad2=?,
            ICAreaLote2=?,
            ICAreaConstr2=?,
            ICValorConstr2=?,
            ICValorComercial2=?,
            ICFuente2=?,
            ICDireccion3=?,
            ICEdad3=?,
            ICAreaLote3=?,
            ICAreaConstr3=?,
            ICValorConstr3=?,
            ICValorComercial3=?,
            ICFuente3=?,
            ICEdad4=?,
            ICAreaLote4=?,
            ICAreaConstr4=?,
            DVRDiagnostico=?,
            CVTTerreno=?,
            CVTDescripcion=?,
            CVTArea=?,
            CVTUniadDeMedida=?,
            CVTValorUnitario=?,
            CVTValor=?,
            CVTPorcentaje=?,
            CVEEdificaciones=?,
            CVEDescripcion=?,
            CVEArea=?,
            CVEUniadDeMedida=?,
            CVEValorUnitario=?,
            CVEValor=?,
            CVEPorcentaje=?,
            CroquisImg=?,
            RFImg=?,
            RFAImg=?,           
            fechaUltimaModificacion=?,
            idModificadoPor=?,
            estado=? 
            WHERE id = ?";           
    }
    
    function getArrayModificar()
    {
        $array = array
        (
            $this->Departamento,
            $this->Municipio,
            $this->Barrio,
            $this->Direccion,
            $this->CodigoDane,
            $this->ImgDireccion,
            $this->Latitud,
            $this->Longitud,
            $this->GeoLocalizacionImg,
            $this->FechaDeVisita,
            $this->FechaDelAvalio,
            $this->TipoDeAvaluo,
            $this->FinalidadDelAvaluo,
            $this->ObjetoDelAvaluo,
            $this->Entidad,
            $this->Solicitante,
            $this->TipoDeDocumento,
            $this->NumeroDocumento,
            $this->TipoDeBien,
            $this->Sector,
            $this->ViviendaInteresSocial,
            $this->Estrato,
            $this->Producto,
            $this->matriculainmTipo1,
            $this->matriculainmNumero1,
            $this->matriculainmTipo2,
            $this->matriculainmNumero2,       
            $this->Propietario,
            $this->NumeroDeEscritura,
            $this->AspJFecha,
            $this->NumeroDeNotaria,
            $this->AspMunicipio,
            $this->AspDepartamento,
            $this->Chip,
            $this->CedulaCatastral,
            $this->TipoDePropiedad,
            $this->CoeficienteDeCopropiedad,
            $this->LicenciaDeConstruccion,
            $this->DescripcionGeneral,
            $this->AreaLote,
            $this->Forma,
            $this->Topografia,
            $this->Frente,
            $this->Fondo,
            $this->RelacionFrenteFondo,
            $this->DecretoAcuerdo,
            $this->UsoPrincipal,
            $this->AlturaPermitida,
            $this->AislamientoPosterior,
            $this->AislamientoLateral,
            $this->Antejardin,
            $this->IndiceDeOcupacion,
            $this->IndiceDeConstruccion,
            $this->TiempoEsperadoDeComercializacion,           
            $this->AreaValorada,
            $this->AreaMedidaEnLaInspeccion,
            $this->AreaRegistradaEnTitulo,
            $this->AreaSusceptibleDeLegalizacion,
            $this->AreaCatastral,
            $this->AreaLicenciaDeConstruccion,
            $this->AreaValoradaObservaciones,
            $this->ComportamientoOfertayDemanda,
            $this->DSAIVI,
            $this->ActualidadEdificadora,
            $this->DemandaInteres,
            $this->UsoPredominante,
            $this->Legalidad,
            $this->Transporte,
            $this->Aire,
            $this->AguasServidas,
            $this->Basura,
            $this->Inseguridad,
            $this->Ruido,
            $this->SectorObservaciones,            
            $this->AreasVerdesNE,
            $this->AreasVerdesDAM,
            $this->AsistencialNE,
            $this->AsistencialDAM,
            $this->ComercialNE,
            $this->ComercialDAM,
            $this->EscolarNE,
            $this->EscolarDAM,
            $this->EstacionamientosNE,
            $this->EstacionamientosDAM,
            $this->AreasRecreativasNE,
            $this->AreasRecreativasDAM,
            $this->SeguridadSectorNE,
            $this->SeguridadSectorDAM,            
            $this->ViasDeAcceso,
            $this->Andenes,
            $this->Acueducto,
            $this->EnergiaElectrica,
            $this->GasNatural,
            $this->Pavimentadas,
            $this->Sardineles,
            $this->Alcantarillado,
            $this->Telefonia,
            $this->Alamedas,
            $this->Alumbrado,
            $this->Arborizacion,
            $this->Ciclorutas,
            $this->Paradero,
            $this->Parques,
            $this->ZonasVerdes,
            $this->PerspectivasDeValorizacion,
            $this->EstadoDeLaConstruccion,
            $this->AvanceEnConstruccion,
            $this->EstadoDeConservacion,
            $this->NoDePisosDelInmueble,
            $this->NumeroDeSotanos,
            $this->VidaUtil,
            $this->VidaRemanente,
            $this->YearDeConstruccion,
            $this->Edad,
            $this->Estructura,
            $this->MaterialDeEstructura,
            $this->EstructuraEstado,
            $this->Remodelado,
            $this->UsoActualPredominante,
            $this->AjusteSismorresistente,
            $this->Cubierta,
            $this->Fachada,
            $this->TipoDeFachadaEnMetros,
            $this->EstructuraReforzada,
            $this->DanosPrevios,
            $this->MaterialDeConstruccion,
            $this->Iluminacion,
            $this->Ventilacion,
            $this->IrregularidadPlanta,
            $this->IrregularidadAltura,
            $this->ComentariosDeLaEstructura,
            $this->CarpinteriaMetalicaCalidad,
            $this->CarpinteriaMetalicaEstado,
            $this->CarpinteriaEnMaderaCalidad,
            $this->CarpinteriaEnMaderaEstado,
            $this->PisosCalidad,
            $this->PisosEstado,
            $this->MurosCalidad,
            $this->MurosEstado,
            $this->TechosCalidad,
            $this->TechosEstado,
            $this->CocinaCalidad,
            $this->CocinaEstado,
            $this->BanosCalidad,
            $this->BanosEstado,
            $this->PredioAcueducto,
            $this->PredioEnergiaElectrica,
            $this->PredioTelefonia,
            $this->PredioAlcantarillado,
            $this->PredioGasNatural,
            $this->PredioAlcobas,
            $this->PredioBalcon,
            $this->PredioBanoPrivado,
            $this->PredioCocina,
            $this->PredioEstarHabitacion,
            $this->PredioJardin,
            $this->PredioSala,
            $this->PredioZonaDeRopas,
            $this->PredioCloset,
            $this->PredioAlcobaDeServicio,
            $this->PredioBanoDeServicio,
            $this->PredioBanoSocial,
            $this->PredioComedor,
            $this->PredioEstudio,
            $this->PredioPatioInterior,
            $this->PredioTerraza,
            $this->PredioSubdivididoFisicamente,
            $this->PredioTotalCuposDeParqueo,
            $this->PredioBahiaComunal,
            $this->PredioDescubierto,
            $this->PredioPrivado,
            $this->PredioServidumbre,
            $this->PredioUsoExclusivo,
            $this->PredioCubierto,
            $this->PredioDoble,
            $this->PredioSencillo,
            $this->PredioBodega,
            $this->PredioTipoDeDeposito,
            $this->PredioOficina,
            $this->PredioDeposito,
            $this->PredioLocal,
            $this->DCValorAdmon,
            $this->DCMensualidad,
            $this->DCValorAdmonM2,
            $this->DCVigilanciaPrivada,
            $this->DCAscensores,
            $this->DCAACentral,
            $this->DCBBQ,
            $this->DCBicicletero,
            $this->DCBombaEyec,
            $this->DCCalefaccion,
            $this->DCCanchaMultiuso,
            $this->DCCanchaSquash,
            $this->DCCCTV,
            $this->DCCitofonia,
            $this->DCClubHouse,
            $this->DCEquipoDePresion,
            $this->DCGarajesResidentes,
            $this->DCGarajesVisitantes,
            $this->DCGimnasio,
            $this->DCGolfito,
            $this->DCGuarderia,
            $this->DCJuegosNinos,
            $this->DCPiscina,
            $this->DCPlantaElectrica,
            $this->DCPorteria,
            $this->DCSalonComunal,
            $this->DCSalonDeJuegos,
            $this->DCSauna,
            $this->DCShutBasuras,
            $this->DCTanqueDeAgua,
            $this->DCTeatrino,
            $this->DCTerrazaComunal,
            $this->DCTurco,
            $this->DCVigilancia24Horas,
            $this->DCZonaVerde,
            $this->DCOtros,
            $this->jsonEA,            
            $this->ICDireccion1,
            $this->ICEdad1,
            $this->ICAreaLote1,
            $this->ICAreaConstr1,
            $this->ICValorConstr1,
            $this->ICValorComercial1,
            $this->ICFuente1,    
            $this->ICDireccion2,
            $this->ICEdad2,
            $this->ICAreaLote2,
            $this->ICAreaConstr2,
            $this->ICValorConstr2,
            $this->ICValorComercial2,
            $this->ICFuente2,
            $this->ICDireccion3,
            $this->ICEdad3,
            $this->ICAreaLote3,
            $this->ICAreaConstr3,
            $this->ICValorConstr3,
            $this->ICValorComercial3,
            $this->ICFuente3,
            $this->ICEdad4,
            $this->ICAreaLote4,
            $this->ICAreaConstr4,
            $this->DVRDiagnostico,
            $this->CVTTerreno,
            $this->CVTDescripcion,
            $this->CVTArea,
            $this->CVTUniadDeMedida,
            $this->CVTValorUnitario,
            $this->CVTValor,
            $this->CVTPorcentaje,
            $this->CVEEdificaciones,
            $this->CVEDescripcion,
            $this->CVEArea,
            $this->CVEUniadDeMedida,
            $this->CVEValorUnitario,
            $this->CVEValor,
            $this->CVEPorcentaje,
            $this->CroquisImg,
            $this->RFImg,
            $this->RFAImg,           
            $this->fechaUltimaModificacion,
            $this->idModificadoPor,
            $this->estado,
            $this->id                                    
        );
        return $array;
    }

         
    public function registrar()
    {
        try
        {
            $this->Validar();      
            $obj  = new conexion();            
            $bd = $obj->getConexion();
            $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $bd->beginTransaction();
            $stmt = $bd->prepare($this->crearConsultaRegistro());
            $stmt->execute($this->getArrayRegistrar());
            $this->id = $bd->lastInsertId();
            $bd->commit();                  
        }catch (Exception $e)
        {
            $this->errorConsulta($bd, $e);
        }
       
    }
          
    function modificar()
    {
        try
        {
            $this->Validar();           
            $obj  = new conexion();
            $bd = $obj->getConexion();
            $bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $bd->beginTransaction();
            $stmt = $bd->prepare($this->crearConsultaModificar());
            $stmt->execute($this->getArrayModificar());               
            $bd->commit();                     

        }catch (Exception $e)
        {
            $this->errorConsulta($bd, $e); 
        }    
            
    }

    public  function errorConsulta($bd, $e)
    {
        if(isset($bd) && !empty($bd))
        {
            $bd->rollback();
        }  
        $error = (object) ['estado' => 0,'mensaje' => $e->getMessage()];   
        echo json_encode($error);
        die();
    }
       
    public function Validar()
    {   
        parent::Validar();
        if($this->FechaDeVisita =='') $this->FechaDeVisita = null;
        if($this->FechaDelAvalio =='') $this->FechaDelAvalio = null;
        if($this->AspJFecha =='') $this->AspJFecha = null;
                  
    }
  
    function get($Id)
    {
        $sql = "SELECT * FROM avaluoenntity WHERE id = '$Id'";
        $bd = new conexion();
        $filas = $bd->Query($sql);
        $resultado = $bd->siguienteRegistro($filas);
        if(isset($resultado) && !empty($resultado))
        {
            $this->materializar($resultado);
        }
    }
    
    public static function getAll()
    {
	    $sql = "SELECT * FROM avaluoenntity WHERE estado = 'Activo'";
		$bd = new conexion();
		$result = $bd->Query($sql);
		$retorno = array();
		$i=0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
		   if(isset($row) && !empty($row))
			{
		  	    $obj = new avaluoenntity();
		  	    $obj->materializar($row);
		  	    $retorno[$i++] =$obj;
		  	}
		}
        return $retorno;
    }


    public static function Filtar($Solicitante, $TipoDeDocumento, $NumeroDocumento, $start, $end,$estado)
    {

        if($start==''|| $start ==null) $start = '0000-00-00';
        if($end==''  || $end ==null)   $end = '0000-00-00';        

        $sql = "SELECT * FROM avaluoenntity WHERE ('$estado' = '' OR estado = '$estado') 
            and ('$Solicitante' = '' OR Solicitante LIKE '$Solicitante%')
            and ('$TipoDeDocumento' = '0' OR TipoDeDocumento  =   '$TipoDeDocumento')
            and ('$NumeroDocumento' = '' OR NumeroDocumento  LIKE   '$NumeroDocumento%')
            and (($start = '0000-00-00' AND $end = '0000-00-00') OR (FechaDelAvalio BETWEEN '$start' AND '$end') )
            ORDER BY id DESC;";
        $bd = new conexion();
		$result = $bd->Query($sql);
		$retorno = array();
		$i=0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
		   if(isset($row) && !empty($row))
			{
		  	    $obj = new avaluoenntity();
		  	    $obj->materializar($row);
		  	    $retorno[$i++] =$obj;
		  	}
		}
        return $retorno;
    }


    public static function Ultimos10Creados()
    {
        $sql = "SELECT * FROM avaluoenntity WHERE estado = 'Activo' ORDER BY id DESC LIMIT 10";
        $bd = new conexion();
		$result = $bd->Query($sql);
		$retorno = array();
		$i=0;
		while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
		{
		   if(isset($row) && !empty($row))
			{
		  	    $obj = new avaluoenntity();
		  	    $obj->materializar($row);
		  	    $retorno[$i++] =$obj;
		  	}
		}
        return $retorno;
    }



        
}    
?>