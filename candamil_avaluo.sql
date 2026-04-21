-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-04-2026 a las 16:32:01
-- Versión del servidor: 10.3.39-MariaDB-cll-lve
-- Versión de PHP: 8.1.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `candamil_avaluo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avaluoenntity`
--

CREATE TABLE `avaluoenntity` (
  `id` int(255) NOT NULL,
  `Departamento` varchar(100) NOT NULL,
  `Municipio` varchar(100) NOT NULL,
  `Barrio` varchar(100) NOT NULL,
  `Direccion` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `CodigoDane` text NOT NULL,
  `ImgDireccion` text NOT NULL,
  `Latitud` text NOT NULL,
  `Longitud` text NOT NULL,
  `GeoLocalizacionImg` text NOT NULL,
  `FechaDeVisita` date DEFAULT NULL,
  `FechaDelAvalio` date DEFAULT NULL,
  `TipoDeAvaluo` varchar(100) NOT NULL,
  `FinalidadDelAvaluo` varchar(100) NOT NULL,
  `ObjetoDelAvaluo` varchar(100) NOT NULL,
  `Entidad` varchar(100) NOT NULL,
  `Solicitante` varchar(100) NOT NULL,
  `TipoDeDocumento` tinyint(1) NOT NULL,
  `NumeroDocumento` varchar(50) NOT NULL,
  `TipoDeBien` varchar(100) NOT NULL,
  `Sector` varchar(100) NOT NULL,
  `ViviendaInteresSocial` tinyint(1) NOT NULL,
  `Estrato` varchar(100) NOT NULL,
  `Producto` text NOT NULL,
  `matriculainmTipo1` varchar(100) NOT NULL,
  `matriculainmNumero1` text NOT NULL,
  `matriculainmTipo2` varchar(100) NOT NULL,
  `matriculainmNumero2` varchar(100) NOT NULL,
  `Propietario` varchar(100) NOT NULL,
  `NumeroDeEscritura` varchar(100) NOT NULL,
  `AspJFecha` date DEFAULT NULL,
  `NumeroDeNotaria` varchar(100) NOT NULL,
  `AspMunicipio` varchar(100) NOT NULL,
  `AspDepartamento` varchar(100) NOT NULL,
  `Chip` varchar(100) NOT NULL,
  `CedulaCatastral` varchar(100) NOT NULL,
  `TipoDePropiedad` varchar(100) NOT NULL,
  `CoeficienteDeCopropiedad` varchar(100) NOT NULL,
  `LicenciaDeConstruccion` varchar(100) NOT NULL,
  `DescripcionGeneral` text NOT NULL,
  `AreaLote` varchar(100) DEFAULT NULL,
  `Forma` varchar(100) DEFAULT NULL,
  `Topografia` varchar(100) DEFAULT NULL,
  `Frente` varchar(100) DEFAULT NULL,
  `Fondo` varchar(100) DEFAULT NULL,
  `RelacionFrenteFondo` varchar(100) DEFAULT NULL,
  `DecretoAcuerdo` varchar(100) DEFAULT NULL,
  `UsoPrincipal` varchar(100) DEFAULT NULL,
  `AlturaPermitida` varchar(100) DEFAULT NULL,
  `AislamientoPosterior` varchar(100) DEFAULT NULL,
  `AislamientoLateral` varchar(100) DEFAULT NULL,
  `Antejardin` varchar(100) DEFAULT NULL,
  `IndiceDeOcupacion` varchar(100) DEFAULT NULL,
  `IndiceDeConstruccion` varchar(100) DEFAULT NULL,
  `TiempoEsperadoDeComercializacion` varchar(100) NOT NULL,
  `AreaValorada` varchar(100) NOT NULL,
  `AreaMedidaEnLaInspeccion` varchar(100) NOT NULL,
  `AreaRegistradaEnTitulo` varchar(100) NOT NULL,
  `AreaSusceptibleDeLegalizacion` varchar(100) NOT NULL,
  `AreaCatastral` varchar(100) NOT NULL,
  `AreaLicenciaDeConstruccion` varchar(100) NOT NULL,
  `AreaValoradaObservaciones` text NOT NULL,
  `ComportamientoOfertayDemanda` text NOT NULL,
  `DSAIVI` text NOT NULL,
  `ActualidadEdificadora` text NOT NULL,
  `DemandaInteres` varchar(1000) NOT NULL,
  `UsoPredominante` varchar(100) NOT NULL,
  `Legalidad` varchar(100) NOT NULL,
  `Transporte` varchar(100) NOT NULL,
  `Aire` tinyint(1) NOT NULL,
  `AguasServidas` tinyint(1) NOT NULL,
  `Basura` tinyint(1) NOT NULL,
  `Inseguridad` tinyint(1) NOT NULL,
  `Ruido` tinyint(1) NOT NULL,
  `SectorObservaciones` text NOT NULL,
  `AreasVerdesNE` varchar(100) NOT NULL,
  `AreasVerdesDAM` varchar(100) NOT NULL,
  `AsistencialNE` varchar(100) NOT NULL,
  `AsistencialDAM` varchar(100) NOT NULL,
  `ComercialNE` varchar(100) NOT NULL,
  `ComercialDAM` varchar(100) NOT NULL,
  `EscolarNE` varchar(100) NOT NULL,
  `EscolarDAM` varchar(100) NOT NULL,
  `EstacionamientosNE` varchar(100) NOT NULL,
  `EstacionamientosDAM` varchar(100) NOT NULL,
  `AreasRecreativasNE` varchar(100) NOT NULL,
  `AreasRecreativasDAM` varchar(100) NOT NULL,
  `SeguridadSectorNE` varchar(100) NOT NULL,
  `SeguridadSectorDAM` varchar(100) NOT NULL,
  `ViasDeAcceso` varchar(100) NOT NULL,
  `Andenes` varchar(100) NOT NULL,
  `Acueducto` varchar(100) NOT NULL,
  `EnergiaElectrica` varchar(100) NOT NULL,
  `GasNatural` varchar(100) NOT NULL,
  `Pavimentadas` varchar(100) NOT NULL,
  `Sardineles` varchar(100) NOT NULL,
  `Alcantarillado` varchar(100) NOT NULL,
  `Telefonia` varchar(100) NOT NULL,
  `Alamedas` tinyint(1) NOT NULL,
  `Alumbrado` tinyint(1) NOT NULL,
  `Arborizacion` tinyint(1) NOT NULL,
  `Ciclorutas` tinyint(1) NOT NULL,
  `Paradero` tinyint(1) NOT NULL,
  `Parques` tinyint(1) NOT NULL,
  `ZonasVerdes` tinyint(1) NOT NULL,
  `PerspectivasDeValorizacion` text NOT NULL,
  `EstadoDeLaConstruccion` varchar(100) NOT NULL,
  `AvanceEnConstruccion` varchar(100) NOT NULL,
  `EstadoDeConservacion` varchar(100) NOT NULL,
  `NoDePisosDelInmueble` varchar(100) NOT NULL,
  `NumeroDeSotanos` varchar(100) NOT NULL,
  `VidaUtil` varchar(100) NOT NULL,
  `VidaRemanente` varchar(100) NOT NULL,
  `YearDeConstruccion` varchar(100) NOT NULL,
  `Edad` varchar(100) NOT NULL,
  `Estructura` varchar(100) NOT NULL,
  `MaterialDeEstructura` varchar(100) NOT NULL,
  `EstructuraEstado` varchar(100) NOT NULL,
  `Remodelado` varchar(100) NOT NULL,
  `UsoActualPredominante` varchar(100) NOT NULL,
  `AjusteSismorresistente` varchar(100) NOT NULL,
  `Cubierta` varchar(100) NOT NULL,
  `Fachada` varchar(100) NOT NULL,
  `TipoDeFachadaEnMetros` varchar(100) NOT NULL,
  `EstructuraReforzada` varchar(100) NOT NULL,
  `DanosPrevios` varchar(100) NOT NULL,
  `MaterialDeConstruccion` varchar(100) NOT NULL,
  `Iluminacion` varchar(100) NOT NULL,
  `Ventilacion` varchar(100) NOT NULL,
  `IrregularidadPlanta` varchar(100) NOT NULL,
  `IrregularidadAltura` varchar(100) NOT NULL,
  `ComentariosDeLaEstructura` text NOT NULL,
  `CarpinteriaMetalicaCalidad` varchar(100) NOT NULL,
  `CarpinteriaMetalicaEstado` varchar(100) NOT NULL,
  `CarpinteriaEnMaderaCalidad` varchar(100) NOT NULL,
  `CarpinteriaEnMaderaEstado` varchar(100) NOT NULL,
  `PisosCalidad` varchar(100) NOT NULL,
  `PisosEstado` varchar(100) NOT NULL,
  `MurosCalidad` varchar(100) NOT NULL,
  `MurosEstado` varchar(100) NOT NULL,
  `TechosCalidad` varchar(100) NOT NULL,
  `TechosEstado` varchar(100) NOT NULL,
  `CocinaCalidad` varchar(100) NOT NULL,
  `CocinaEstado` varchar(100) NOT NULL,
  `BanosCalidad` varchar(100) NOT NULL,
  `BanosEstado` varchar(100) NOT NULL,
  `PredioAcueducto` varchar(100) NOT NULL,
  `PredioEnergiaElectrica` varchar(100) NOT NULL,
  `PredioTelefonia` varchar(100) NOT NULL,
  `PredioAlcantarillado` varchar(100) NOT NULL,
  `PredioGasNatural` varchar(100) NOT NULL,
  `PredioAlcobas` varchar(100) NOT NULL,
  `PredioBalcon` varchar(100) NOT NULL,
  `PredioBanoPrivado` varchar(100) NOT NULL,
  `PredioCocina` varchar(100) NOT NULL,
  `PredioEstarHabitacion` varchar(100) NOT NULL,
  `PredioJardin` varchar(100) NOT NULL,
  `PredioSala` varchar(100) NOT NULL,
  `PredioZonaDeRopas` varchar(100) NOT NULL,
  `PredioCloset` varchar(100) NOT NULL,
  `PredioAlcobaDeServicio` varchar(100) NOT NULL,
  `PredioBanoDeServicio` varchar(100) NOT NULL,
  `PredioBanoSocial` varchar(100) NOT NULL,
  `PredioComedor` varchar(100) NOT NULL,
  `PredioEstudio` varchar(100) NOT NULL,
  `PredioPatioInterior` varchar(100) NOT NULL,
  `PredioTerraza` varchar(100) NOT NULL,
  `PredioSubdivididoFisicamente` varchar(100) NOT NULL,
  `PredioTotalCuposDeParqueo` varchar(100) NOT NULL,
  `PredioBahiaComunal` varchar(100) NOT NULL,
  `PredioDescubierto` varchar(100) NOT NULL,
  `PredioPrivado` varchar(100) NOT NULL,
  `PredioServidumbre` varchar(100) NOT NULL,
  `PredioUsoExclusivo` varchar(100) NOT NULL,
  `PredioCubierto` varchar(100) NOT NULL,
  `PredioDoble` varchar(100) NOT NULL,
  `PredioSencillo` varchar(100) NOT NULL,
  `PredioBodega` varchar(100) NOT NULL,
  `PredioTipoDeDeposito` varchar(100) NOT NULL,
  `PredioOficina` varchar(100) NOT NULL,
  `PredioDeposito` varchar(100) NOT NULL,
  `PredioLocal` varchar(100) NOT NULL,
  `DCValorAdmon` varchar(100) NOT NULL,
  `DCMensualidad` text NOT NULL,
  `DCValorAdmonM2` varchar(100) NOT NULL,
  `DCVigilanciaPrivada` text NOT NULL,
  `DCAscensores` varchar(100) NOT NULL,
  `DCAACentral` tinyint(1) NOT NULL,
  `DCBBQ` tinyint(1) NOT NULL,
  `DCBicicletero` tinyint(1) NOT NULL,
  `DCBombaEyec` tinyint(1) NOT NULL,
  `DCCalefaccion` tinyint(1) NOT NULL,
  `DCCanchaMultiuso` tinyint(1) NOT NULL,
  `DCCanchaSquash` tinyint(1) NOT NULL,
  `DCCCTV` tinyint(1) NOT NULL,
  `DCCitofonia` tinyint(1) NOT NULL,
  `DCClubHouse` tinyint(1) NOT NULL,
  `DCEquipoDePresion` tinyint(1) NOT NULL,
  `DCGarajesResidentes` tinyint(1) NOT NULL,
  `DCGarajesVisitantes` tinyint(1) NOT NULL,
  `DCGimnasio` tinyint(1) NOT NULL,
  `DCGolfito` tinyint(1) NOT NULL,
  `DCGuarderia` tinyint(1) NOT NULL,
  `DCJuegosNinos` tinyint(1) NOT NULL,
  `DCPiscina` tinyint(1) NOT NULL,
  `DCPlantaElectrica` tinyint(1) NOT NULL,
  `DCPorteria` tinyint(1) NOT NULL,
  `DCSalonComunal` tinyint(1) NOT NULL,
  `DCSalonDeJuegos` tinyint(1) NOT NULL,
  `DCSauna` tinyint(1) NOT NULL,
  `DCShutBasuras` tinyint(1) NOT NULL,
  `DCTanqueDeAgua` tinyint(1) NOT NULL,
  `DCTeatrino` tinyint(1) NOT NULL,
  `DCTerrazaComunal` tinyint(1) NOT NULL,
  `DCTurco` tinyint(1) NOT NULL,
  `DCVigilancia24Horas` tinyint(1) NOT NULL,
  `DCZonaVerde` tinyint(1) NOT NULL,
  `DCOtros` text NOT NULL,
  `jsonEA` text NOT NULL,
  `ICDireccion1` text NOT NULL,
  `ICEdad1` int(100) NOT NULL,
  `ICAreaLote1` decimal(20,6) NOT NULL,
  `ICAreaConstr1` decimal(20,6) NOT NULL,
  `ICValorConstr1` decimal(20,6) NOT NULL,
  `ICValorComercial1` decimal(20,6) NOT NULL,
  `ICFuente1` text NOT NULL,
  `ICDireccion2` text NOT NULL,
  `ICEdad2` int(100) NOT NULL,
  `ICAreaLote2` decimal(20,6) NOT NULL,
  `ICAreaConstr2` decimal(20,6) NOT NULL,
  `ICValorConstr2` decimal(20,6) NOT NULL,
  `ICValorComercial2` decimal(20,6) NOT NULL,
  `ICFuente2` text NOT NULL,
  `ICDireccion3` text NOT NULL,
  `ICEdad3` int(100) NOT NULL,
  `ICAreaLote3` decimal(20,6) NOT NULL,
  `ICAreaConstr3` decimal(20,6) NOT NULL,
  `ICValorConstr3` decimal(20,6) NOT NULL,
  `ICValorComercial3` decimal(20,6) NOT NULL,
  `ICFuente3` text NOT NULL,
  `ICEdad4` int(100) NOT NULL,
  `ICAreaLote4` decimal(20,8) NOT NULL,
  `ICAreaConstr4` decimal(20,8) NOT NULL,
  `DVRDiagnostico` text NOT NULL,
  `CVTTerreno` text NOT NULL,
  `CVTDescripcion` text NOT NULL,
  `CVTArea` decimal(20,6) NOT NULL,
  `CVTUniadDeMedida` text NOT NULL,
  `CVTValorUnitario` decimal(20,6) NOT NULL,
  `CVTValor` decimal(20,6) NOT NULL,
  `CVTPorcentaje` decimal(20,6) NOT NULL,
  `CVEEdificaciones` text NOT NULL,
  `CVEDescripcion` text NOT NULL,
  `CVEArea` decimal(20,6) NOT NULL,
  `CVEUniadDeMedida` text NOT NULL,
  `CVEValorUnitario` decimal(20,6) NOT NULL,
  `CVEValor` decimal(20,6) NOT NULL,
  `CVEPorcentaje` decimal(20,6) NOT NULL,
  `CroquisImg` text NOT NULL,
  `RFImg` text NOT NULL,
  `RFAImg` text NOT NULL,
  `fechaRegistro` date NOT NULL,
  `idRegistradoPor` int(255) NOT NULL,
  `fechaUltimaModificacion` date NOT NULL,
  `idModificadoPor` int(255) NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(254) NOT NULL,
  `password` varchar(200) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fechaRegistro` date NOT NULL,
  `idRegistradoPor` int(254) NOT NULL,
  `fechaUltimaModificacion` date NOT NULL,
  `idModificadoPor` int(254) NOT NULL,
  `estado` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `avaluoenntity`
--
ALTER TABLE `avaluoenntity`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `avaluoenntity`
--
ALTER TABLE `avaluoenntity`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
