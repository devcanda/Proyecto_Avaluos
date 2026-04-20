-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 20-04-2026 a las 14:41:24
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

--
-- Volcado de datos para la tabla `avaluoenntity`
--

INSERT INTO `avaluoenntity` (`id`, `Departamento`, `Municipio`, `Barrio`, `Direccion`, `CodigoDane`, `ImgDireccion`, `Latitud`, `Longitud`, `GeoLocalizacionImg`, `FechaDeVisita`, `FechaDelAvalio`, `TipoDeAvaluo`, `FinalidadDelAvaluo`, `ObjetoDelAvaluo`, `Entidad`, `Solicitante`, `TipoDeDocumento`, `NumeroDocumento`, `TipoDeBien`, `Sector`, `ViviendaInteresSocial`, `Estrato`, `Producto`, `matriculainmTipo1`, `matriculainmNumero1`, `matriculainmTipo2`, `matriculainmNumero2`, `Propietario`, `NumeroDeEscritura`, `AspJFecha`, `NumeroDeNotaria`, `AspMunicipio`, `AspDepartamento`, `Chip`, `CedulaCatastral`, `TipoDePropiedad`, `CoeficienteDeCopropiedad`, `LicenciaDeConstruccion`, `DescripcionGeneral`, `AreaLote`, `Forma`, `Topografia`, `Frente`, `Fondo`, `RelacionFrenteFondo`, `DecretoAcuerdo`, `UsoPrincipal`, `AlturaPermitida`, `AislamientoPosterior`, `AislamientoLateral`, `Antejardin`, `IndiceDeOcupacion`, `IndiceDeConstruccion`, `TiempoEsperadoDeComercializacion`, `AreaValorada`, `AreaMedidaEnLaInspeccion`, `AreaRegistradaEnTitulo`, `AreaSusceptibleDeLegalizacion`, `AreaCatastral`, `AreaLicenciaDeConstruccion`, `AreaValoradaObservaciones`, `ComportamientoOfertayDemanda`, `DSAIVI`, `ActualidadEdificadora`, `DemandaInteres`, `UsoPredominante`, `Legalidad`, `Transporte`, `Aire`, `AguasServidas`, `Basura`, `Inseguridad`, `Ruido`, `SectorObservaciones`, `AreasVerdesNE`, `AreasVerdesDAM`, `AsistencialNE`, `AsistencialDAM`, `ComercialNE`, `ComercialDAM`, `EscolarNE`, `EscolarDAM`, `EstacionamientosNE`, `EstacionamientosDAM`, `AreasRecreativasNE`, `AreasRecreativasDAM`, `ViasDeAcceso`, `Andenes`, `Acueducto`, `EnergiaElectrica`, `GasNatural`, `Pavimentadas`, `Sardineles`, `Alcantarillado`, `Telefonia`, `Alamedas`, `Alumbrado`, `Arborizacion`, `Ciclorutas`, `Paradero`, `Parques`, `ZonasVerdes`, `PerspectivasDeValorizacion`, `EstadoDeLaConstruccion`, `AvanceEnConstruccion`, `EstadoDeConservacion`, `NoDePisosDelInmueble`, `NumeroDeSotanos`, `VidaUtil`, `VidaRemanente`, `YearDeConstruccion`, `Edad`, `Estructura`, `MaterialDeEstructura`, `EstructuraEstado`, `Remodelado`, `UsoActualPredominante`, `AjusteSismorresistente`, `Cubierta`, `Fachada`, `TipoDeFachadaEnMetros`, `EstructuraReforzada`, `DanosPrevios`, `MaterialDeConstruccion`, `Iluminacion`, `Ventilacion`, `IrregularidadPlanta`, `IrregularidadAltura`, `ComentariosDeLaEstructura`, `CarpinteriaMetalicaCalidad`, `CarpinteriaMetalicaEstado`, `CarpinteriaEnMaderaCalidad`, `CarpinteriaEnMaderaEstado`, `PisosCalidad`, `PisosEstado`, `MurosCalidad`, `MurosEstado`, `TechosCalidad`, `TechosEstado`, `CocinaCalidad`, `CocinaEstado`, `BanosCalidad`, `BanosEstado`, `PredioAcueducto`, `PredioEnergiaElectrica`, `PredioTelefonia`, `PredioAlcantarillado`, `PredioGasNatural`, `PredioAlcobas`, `PredioBalcon`, `PredioBanoPrivado`, `PredioCocina`, `PredioEstarHabitacion`, `PredioJardin`, `PredioSala`, `PredioZonaDeRopas`, `PredioCloset`, `PredioAlcobaDeServicio`, `PredioBanoDeServicio`, `PredioBanoSocial`, `PredioComedor`, `PredioEstudio`, `PredioPatioInterior`, `PredioTerraza`, `PredioSubdivididoFisicamente`, `PredioTotalCuposDeParqueo`, `PredioBahiaComunal`, `PredioDescubierto`, `PredioPrivado`, `PredioServidumbre`, `PredioUsoExclusivo`, `PredioCubierto`, `PredioDoble`, `PredioSencillo`, `PredioBodega`, `PredioTipoDeDeposito`, `PredioOficina`, `PredioDeposito`, `PredioLocal`, `DCValorAdmon`, `DCMensualidad`, `DCValorAdmonM2`, `DCVigilanciaPrivada`, `DCAscensores`, `DCAACentral`, `DCBBQ`, `DCBicicletero`, `DCBombaEyec`, `DCCalefaccion`, `DCCanchaMultiuso`, `DCCanchaSquash`, `DCCCTV`, `DCCitofonia`, `DCClubHouse`, `DCEquipoDePresion`, `DCGarajesResidentes`, `DCGarajesVisitantes`, `DCGimnasio`, `DCGolfito`, `DCGuarderia`, `DCJuegosNinos`, `DCPiscina`, `DCPlantaElectrica`, `DCPorteria`, `DCSalonComunal`, `DCSalonDeJuegos`, `DCSauna`, `DCShutBasuras`, `DCTanqueDeAgua`, `DCTeatrino`, `DCTerrazaComunal`, `DCTurco`, `DCVigilancia24Horas`, `DCZonaVerde`, `DCOtros`, `jsonEA`, `ICDireccion1`, `ICEdad1`, `ICAreaLote1`, `ICAreaConstr1`, `ICValorConstr1`, `ICValorComercial1`, `ICFuente1`, `ICDireccion2`, `ICEdad2`, `ICAreaLote2`, `ICAreaConstr2`, `ICValorConstr2`, `ICValorComercial2`, `ICFuente2`, `ICDireccion3`, `ICEdad3`, `ICAreaLote3`, `ICAreaConstr3`, `ICValorConstr3`, `ICValorComercial3`, `ICFuente3`, `ICEdad4`, `ICAreaLote4`, `ICAreaConstr4`, `DVRDiagnostico`, `CVTTerreno`, `CVTDescripcion`, `CVTArea`, `CVTUniadDeMedida`, `CVTValorUnitario`, `CVTValor`, `CVTPorcentaje`, `CVEEdificaciones`, `CVEDescripcion`, `CVEArea`, `CVEUniadDeMedida`, `CVEValorUnitario`, `CVEValor`, `CVEPorcentaje`, `CroquisImg`, `RFImg`, `RFAImg`, `fechaRegistro`, `idRegistradoPor`, `fechaUltimaModificacion`, `idModificadoPor`, `estado`) VALUES
(1, 'Valle del Cauca', 'Tuluuá', 'El Victoria', 'carrera 34 29 #45', '7000', '/file/Uploads/06292022-040607-WhatsApp-Image-2022-06-27-at-12.45.33-PM.jpeg', '500', '600', '/file/Uploads/06292022-040607-FUkgFxwWQAE1Ckw.jpg', '2022-06-28', '2022-06-28', 'Tipo de avalúo', 'Finalidad del avalúo', 'Objeto del avalúo', 'Entidad', 'Pedro Perez', 1, '16254482', 'Tipo de bien', 'Sector', 1, 'Estrato', 'Producto', 'Tipo 1', '', 'Tipo 2', 'Número 2', 'Propietario', 'Número de escritura', '2022-06-28', 'Número de notaría', 'Municipio', 'Departamento', 'Chip', 'Cédula catastral', 'Tipo de propiedad', 'Coeficiente de copropiedad', 'Licencia de construcción', 'Descripción General', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, ' ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '[]', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', 0, 0.00000000, 0.00000000, '', '', '', 0.000000, '', 0.000000, 0.000000, 0.000000, '', '', 0.000000, '', 0.000000, 0.000000, 0.000000, '', '[]', '[]', '2022-06-29', 1, '2022-07-19', 1, 'Activo'),
(2, '', '2222222', '', '', '', '/file/Uploads/07192022-050727-WhatsApp-Image-2022-06-27-at-12.45.33-PM.jpeg', '150', '45', '/file/Uploads/07212022-030753-8e3f3db5-2b9f-4691-b1fa-5b81578a4a78.jpg', '2022-06-28', '2022-06-28', '', '', '', '', 'Solicitante', 2, '16254481', '', '', 0, '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 1, 1, 1, '     ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 1, 1, 1, 1, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '[{\"id\":1,\"recinto\":\"rw2r\",\"AcabadosPisos\":\"were\",\"AcabadosMuros\":\"erewr\"}]', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', 0, 0.00000000, 0.00000000, '', '', '', 0.000000, '', 0.000000, 0.000000, 0.000000, '', '', 0.000000, '', 0.000000, 0.000000, 0.000000, '/file/Uploads/07212022-030753-Ev7TA4eWgAYXzGx.jpg', '[{\"id\":1,\"titulo\":\"anexo a\",\"url\":\"\\/file\\/Uploads\\/07212022-030739-Ev7TA4eWgAYXzGx.jpg\"},{\"id\":2,\"titulo\":\"anexo a\",\"url\":\"\\/file\\/Uploads\\/07212022-030739-FUkgFxwWQAE1Ckw.jpg\"},{\"id\":3,\"titulo\":\"anexo b\",\"url\":\"\\/file\\/Uploads\\/07212022-030753-8e3f3db5-2b9f-4691-b1fa-5b81578a4a78.jpg\"},{\"id\":4,\"titulo\":\"anexo b\",\"url\":\"\\/file\\/Uploads\\/07212022-030753-FXuZs76VsAMx0oE.jpg\"}]', '[{\"id\":1,\"titulo\":\"sdgtfdghfh\",\"url\":\"\\/file\\/Uploads\\/07212022-030719-1unnamed.gif\"},{\"id\":2,\"titulo\":\"sdgtfdghfh\",\"url\":\"\\/file\\/Uploads\\/07212022-030720-unnamed.gif\"},{\"id\":3,\"titulo\":\"sdgtfdghfh\",\"url\":\"\\/file\\/Uploads\\/07212022-030720-WhatsApp-Image-2022-03-26-at-7.56.32-PM.jpeg\"},{\"id\":4,\"titulo\":\"sdgtfdghfh\",\"url\":\"\\/file\\/Uploads\\/07212022-030720-WhatsApp-Image-2022-06-27-at-12.45.33-PM.jpeg\"}]', '2022-06-30', 1, '2022-07-21', 1, 'Activo'),
(3, 'valle del cauca', 'tulua', 'cespedes', 'Calle  20 A  24   14', '41245', '/file/Uploads/11162022-201137-WhatsApp-Image-2022-11-10-at-3.15.09-PM-(1).jpeg', '12345', '123456', '/file/Uploads/11162022-201137-WhatsApp-Image-2022-11-10-at-3.15.08-PM-(1).jpeg', '2022-11-10', '2022-11-17', 'comercial', 'comercial', 'venta', 'particular', 'victor hugo', 2, '1021354820', 'inmueble ', 'urbano', 2, '2', 'vivienda', 'inmoviliario', '123456845211', '', '', 'victor hugo', '123456', '2022-11-02', 'notaria 2', 'tulua', 'valle del cauca', '', '12345698', 'patrimonial', '', '12564', '', '53,2', 'iregular', 'plana', '10', '20', '125', '1', 'vivienda', '15', '', '', '', '', '', '1', '', '53,2', '53,2', '', '53,2', '53,2', '', '', '', '', 'viviendas', 'urbano', 'si', 'bueno', 0, 0, 0, 0, 0, '  ', 'parques', '10mts', 'hospitales', '1km', 'tiendas', '20mts', '', '', 'no', '0', 'comfandi', '4km', 'en buen estado', 'bueno', 'bueno', 'si', 'si', 'si', 'no', 'si', 'no', 0, 1, 1, 1, 0, 1, 1, '', 'en buen estado', 'terminado', 'bueno', '2', '0', '15', '1', '2013', '5', 'ladrillo ', 'vigas', 'bueno', 'no', 'vivienda', 'si', 'si', 'si', '2', 'si', 'si', 'en buen estado', 'si', 'si', 'no', 'no', '', 'no', 'no', 'no', 'no', 'si', 'buenos', 'si', 'buenos', 'si', 'buenos', 'si', 'buenos', 'si', 'buenos', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'no', 'si', 'si', 'si', 'si', 'si', 'si', 'si', 'no', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '[]', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', 0, 0.00000000, 0.00000000, '', '', '', 0.000000, '', 0.000000, 0.000000, 0.000000, '', '', 0.000000, '', 0.000000, 0.000000, 0.000000, '', '[]', '[{\"id\":1,\"titulo\":\"registro fotografico\",\"url\":\"\\/file\\/Uploads\\/11162022-201121-WhatsApp-Image-2022-11-10-at-3.15.06-PM.jpeg\"},{\"id\":2,\"titulo\":\"registro fotografico\",\"url\":\"\\/file\\/Uploads\\/11162022-201129-WhatsApp-Image-2022-11-10-at-3.15.08-PM.jpeg\"},{\"id\":3,\"titulo\":\"registro fotografico\",\"url\":\"\\/file\\/Uploads\\/11162022-201137-WhatsApp-Image-2022-11-10-at-3.15.08-PM-(1).jpeg\"},{\"id\":4,\"titulo\":\"registro fotografico\",\"url\":\"\\/file\\/Uploads\\/11162022-201147-WhatsApp-Image-2022-11-10-at-3.15.09-PM-(2).jpeg\"}]', '2022-11-16', 4, '2022-11-16', 4, 'Activo'),
(4, 'VALLE DEL CAUCA', 'TULUA', 'CESPEDES', 'CRA 31 #24-54', '', '/file/Uploads/11302022-211105-WhatsApp-Image-2022-11-10-at-3.15.09-PM-(2).jpeg', '', '', '/file/Uploads/11302022-211105-WhatsApp-Image-2022-11-10-at-3.15.09-PM-(2).jpeg', '2022-11-17', '2022-11-23', 'COMERCIAL', 'COMERCIAL', 'ESTDO DEL INMUEBLE', 'PRIVADA', 'VICTOR YARA', 2, '1059916959', 'URBANO', 'URBANO', 2, '2', '1846348', 'INMUEBLE', '20464.8', '', '', 'VICTPR YARA', '344648', '2022-11-04', 'NOTARI A 2 DE TULUA', 'TULUA ', 'VALLE DEL CAUCA', '', '25448684', 'VIVIENDA', '', '045.4.8', '', '20', 'IRREGULAR', 'PLANA', '10', '10', '20', '2456384', 'VIVIENDA', '1', '', '', '', '', '', '', '20', '20', '20', '20', '20', '19', '', 'UN COMPORTAMIENTO MUY FAVORABLE POR SU UBICACION EN EL MUNICIPIO DE TULUA', 'UN SECTOR MUY TRANQUILO Y AMENO CON SUS HABITANTE, CON UNA ACTIVIDAD INMOBILIARIA CONCURRIDA POR SU ', '', 'ALTA', 'VIVIENDAS', '', '', 0, 0, 0, 0, 0, ' SECTOR MUY TRANQUILO CON SUS HABITANTE ', 'SI', '250MTS', 'SI', '500MTS', 'SI', '1KM', 'SI', '250MTS', 'SI', 'NO', 'SI', '250MTS', 'EN BUEN ESTADO', 'EN BUEN ESTADO', 'SUBTERRANEO', 'SI', 'SUBTERRANEO', 'SI', 'NO', 'SUBTERRANEO', 'SI', 0, 1, 1, 0, 0, 1, 1, '', 'EN BUEN ESTADO', 'TERMINADO', 'EN BUEN ESTADO', '1', '0', '100', '100', '2020', '2', 'EN BUEN ESTADO', 'EN BUEN ESTADO', 'EN BUEN ESTADO', 'NO', 'EN BUEN ESTADO', 'SI', 'NO', 'SI', '4MTS', 'SI', 'NO', 'EN BUEN ESTADO', 'SI', 'SI', 'NO', 'NO', '', 'EN BUEN ESTADO', 'EN BUEN ESTADO', 'EN BUEN ESTADO', 'EN BUEN ESTADO', 'EN BUEN ESTADO', 'EN BUEN ESTADO', 'EN BUEN ESTADO', 'EN BUEN ESTADO', 'EN BUEN ESTADO', 'EN BUEN ESTADO', 'EN BUEN ESTADO', 'EN BUEN ESTADO', 'EN BUEN ESTADO', 'EN BUEN ESTADO', 'SI', 'SI', 'SI', 'SI', 'SI', '1', '0', '2', '1', '1', '1', '1', '1', '2', '1', '1', '1', '1', '1', '1', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '1', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '[]', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', 0, 0.00000000, 0.00000000, '', '', '', 0.000000, '', 0.000000, 0.000000, 0.000000, '', '', 0.000000, '', 0.000000, 0.000000, 0.000000, '/file/Uploads/11302022-211105-CamScanner-11-10-2022-16.54_1.jpg', '[{\"id\":1,\"titulo\":\"FRENTE\",\"url\":\"\\/file\\/Uploads\\/11302022-211146-WhatsApp-Image-2022-11-10-at-3.15.09-PM-(1).jpeg\"}]', '[{\"id\":1,\"titulo\":\"HABITACION\",\"url\":\"\\/file\\/Uploads\\/11302022-211117-WhatsApp-Image-2022-11-10-at-3.15.06-PM.jpeg\"},{\"id\":2,\"titulo\":\"AREA DE SERVICIO\",\"url\":\"\\/file\\/Uploads\\/11302022-211143-WhatsApp-Image-2022-11-10-at-3.15.08-PM-(1).jpeg\"},{\"id\":3,\"titulo\":\"FRENTE\",\"url\":\"\\/file\\/Uploads\\/11302022-211107-WhatsApp-Image-2022-11-10-at-3.15.09-PM-(2).jpeg\"},{\"id\":4,\"titulo\":\"CATASTRO\",\"url\":\"\\/file\\/Uploads\\/11302022-211136-CamScanner-11-10-2022-16.56_1.jpg\"}]', '2022-11-30', 4, '2022-11-30', 4, 'Activo'),
(5, 'VALLE DEL CAUCA', 'TULUA', 'TERMINAL NUEVO', 'TRANSVERSAL 12 ENTRE CARRERAS 38 Y 39', '', '/file/Uploads/08282023-180838-Lote-3---Infi-Tuluá.jpg', '4.099315', '-76.176867', '/file/Uploads/08282023-230842-lote-1.JPG', '2023-08-22', '2023-08-28', 'URBANO', 'VALOR COMERCIAL', 'ORIGINACIÓN', 'INFITULUA', 'DAVID MURCIA', 2, '94383933', 'LOTE URBANO', 'URBANO', 2, '', 'LICITACIÓN', 'LOTE NUMERO 3', '384-149905', '', '', 'INFITULUA', '3.047', '2022-10-12', '3', 'TULUA', 'VALLE DEL CAUCA', '', '00-01-0002-4817-000', 'NO PROPIEDAD HORIZONTAL', '', '', 'El predio valorado en el siguiente informe es un lote de terreno ubicado en la entrada sur del munic', '13.593,74 M²', 'Regular', 'Plana', '', '', '', 'Acuerdo No. 30 de 2000', 'Comercial', '', '', '', '', '', '0', '0', '13.593,74 M²', '13.593,74 M²', '13.593,74', '13.593,74 M²', '13.593,74 M²', '', 'Nota: se toma la decisión de liquidar lo máximo permitido por la excelente y estratégica ubicación d', 'Del análisis del segmento del mercado relativo a los inmuebles comparables con el que se valora se d', 'El lote esta en uno de los sectores mas exclusivos del municipio de Tuluá, en el cual se observan gr', 'En el sector donde se localiza el inmueble objeto del Avaluo, se evidencia una actividad edificadora', 'ALTA', 'Vivienda unifamiliar', 'Aprobado', 'Excelente', 0, 1, 0, 0, 0, '    No se evidencia ningún impacto ambiental negativo, excepto por la polución vehicular por el alto flujo de buses y busetas que ingresan a la terminal de transporte y transitan por la doble calzada', 'Abundante', '0-100', 'Suficiente', '1KM', 'Suficiente', '20-50', 'Suficiente', '2KM', 'Suficiente', '10-50', 'Suficiente', '200-300', 'Bueno', 'Bueno', 'Tiene', 'Tiene', 'Tiene', 'Tiene', 'Bueno', 'Tiene', 'Tiene', 0, 1, 1, 0, 1, 1, 1, 'De acuerdo con las condiciones del sector y a la dinámica del mercado del mismo, se considera se consideran perspectivas de valoración altas. Se trata de un sector que se está consolidando como uno de', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'No se evidencia ninguna clase de construcción sobre el lote objeto de avaluó.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'No tiene', 'No tiene', 'No tiene', 'No tiene', 'No tiene', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '[]', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', 0, 0.00000000, 0.00000000, 'Las ofertas corresponden a lotes de similares características en el mismo sector. Ofertas con características similares al objeto de avalúo la oferta 3 se considera sensiblemente mejor al ser esquinero.', 'LOTE', 'Lote uniforme de topografia plana', 13593.740000, 'M²', 632799.000000, 8602105078.260000, 0.000000, '', '', 0.000000, '', 0.000000, 0.000000, 0.000000, '/file/Uploads/08282023-230842-lote3_3.JPG', '[]', '[]', '2023-08-22', 5, '2025-09-04', 3, 'Activo'),
(6, 'VALLE DEL CAUCA', 'TULUA', 'TERMINAL NUEVO', 'TRANSVERSAL 12 ENTRE CARRERAS 38 Y 39', '', '/file/Uploads/08282023-180827-Lote-2---Infi-Tuluá.jpg', '4.098676', '-76.176682', '/file/Uploads/09032025-190958-terminal1.JPG', '2024-05-10', '2024-05-15', 'URBANO', 'VALOR COMERCIAL', 'ORIGINACIÓN', 'INFITULUA', 'DAVID MURCIA', 2, '94383933', 'LOTE URBANO', 'URBANO', 2, '', 'LICITACIÓN', 'LOTE NUMERO 2', '384-149904', '', '', 'CORPORACION COLOMBIA SOCIAL Y RURAL', '3.047', '2022-10-12', '3', 'TULUA', 'VALLE DEL CAUCA', '', '00-01-0002-4817-000', 'NO PROPIEDAD HORIZONTAL', '', '', 'El predio valorado en el siguiente informe es un lote de terreno ubicado en la entrada sur del Municipio.', '8.451,11 M²', 'REGULAR', 'PLANA', '', '', '', 'Acuerdo No. 30 de 2000', 'Dotacional Servicios básicos, carga, transporte y servicios públicos ( DS8 ).', '', '', '', '', '', '', '', '8.451,11 M²', '8.451,11 M²', '8.451,11 M²', '8.451,11 M²', '8.451,11 M²', '', 'Nota: Se toma la decisión de liquidar lo máximo permitido por la excelente y estratégica ubicación del predio objeto del encargo valuatorio.\r\nAsí mismo me permito manifestar que el valor de este bien en 1 año ha aumentado el 3,59%,  valor en cuanto las actuales condiciones del mercado, teniendo en cuenta que por las políticas actuales del gobierno nacional han generado una desconfianza y temor generalizado en la compra de inmuebles tal como se viene presentando en este municipio por los incrementos en los impuesto como el predial unificado, el cual ha generado una problemática a muchos propietarios, razón por la cual el último año se ha presentado una valoración  mínima en el valor de este bien objeto de esta experticia.', 'Del análisis del segmento del mercado relativo a los inmuebles comparables con el que se valora se deduce que la oferta en la zona es baja por encontrarse la mayoría de los lotes y predios adjudicados, contraria a la demanda alta.\r\n', 'El lote se encuentra ubicado en uno de los sectores mas exclusivos del municipio de Tuluá, en el cual se observan gran número de proyectos urbanísticos de unidades unifamiliares y parcelaciones campestre.', 'En el sector donde se localiza el inmueble objeto del Avalúo, se evidencia una actividad edificadora creciente.', 'ALTA', 'VIVIENDA UNIFAMILIAR', 'APROBADO', 'EXCELENTE', 0, 1, 0, 0, 0, '   No se evidencia ningún impacto ambiental negativo, excepto por la polución vehicular por el alto flujo de buses y busetas que ingresan a la terminal de transporte y transitan por la doble calzada.', 'Abundante', '0-100', 'Suficiente', '1 Km', 'Suficiente', '20-50', 'Suficiente', '2 Km', 'Suficiente', '10-50', 'Suficiente', '200-300', 'Bueno', 'Bueno', 'Tiene', 'Tiene', 'Tiene', 'Tiene', 'Bueno', 'Tiene', 'Tiene', 0, 1, 1, 0, 1, 1, 1, 'De acuerdo con las condiciones del sector y a la dinámica del mercado del mismo, se considera se consideran perspectivas de valoración altas. Se trata de un sector que se está consolidando como uno de los lugares más apetecidos para vivir por las excelentes condiciones que presenta, quedando prácticamente al frente de la terminal de transporte del\r\nmunicipio de Tuluà', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'No se evidencia ninguna clase de construcción sobre el lote objeto de avalúo.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'No tiene', 'No tiene', 'No tiene', 'No tiene', 'No tiene', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '[]', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', 0, 0.00000000, 0.00000000, 'Las ofertas corresponden a lotes de similares características en el mismo sector. Ofertas con características similares al objeto de avalúo la oferta 2 se considera sensiblemente mejor al ser colindante del lote esquinero.', 'LOTE', 'LOTE UNIFORME DE TOPOGRAFIA PLANA', 8451.110000, 'M²', 632799.000000, 5539853956.890000, 0.000000, '', '', 0.000000, '', 0.000000, 0.000000, 0.000000, '/file/Uploads/08292023-120833-Lote2_1.JPG', '[]', '[{\"id\":1,\"titulo\":\"USOS PROPUESTOS\",\"url\":\"\\/file\\/Uploads\\/09042025-170915-Captura12.PNG\"}]', '2023-08-28', 5, '2025-09-09', 5, 'Activo'),
(7, 'VALLE DEL CAUCA', 'TULUA ', 'VILLA CAMPESTRE', 'CALLE 38 # 45 - 13', '', '/file/Uploads/04072026-160410-WhatsApp-Image-2026-04-07-at-3.10.49-PM.jpeg', '4.0713003', '76.1887738,106', '/file/Uploads/04072026-160410-REGISTRO-CARTOGRAFICO-GENNY.JPG', '2026-06-26', '2026-07-06', 'URBANO', '', 'ESTABLECER VALOR COMERCIAL', '', 'MARIA GENNY GÓMEZ PRIETO', 2, '66´709.184', 'CASA UNIFAMILIAR', 'ORIENTAL', 2, '6 ALTO', '', 'MATRICULA', '384-90491', '', '', 'MARIA GENNY  GÓMEZ PRIETO', '469', '2021-03-02', 'NOTARIA PRIMERA', 'TULUA', 'VALLE DEL CAUCA', '', '768340102000005680032000000000000', 'PRIVADA', '', '', '', '128 METROS CUADRADOS', 'RECTANGULAR', 'PLANA', '8 METROS ', '16 METROS', '', '', 'RESIDENCIAL', '', '', '', '', '', '', 'DE 3 A 6 MESES', '', '', '', '', '', '', '', 'EL MERCADO INMOBILIARIO EN LA URBANIZACIÓN VILLA CAMPESTRE DE TULUA MUESTRA UNA OFERTA ACTIVA DE CASAS, CARACTERIZADA POR SER UNA ZONA RESIDENCIAL DE ESTRATOS ALTOS (ESTRATO 6 SEGÚN INFORMES PREVIOS DE LA ALCALDÍA). LA DEMANDA ES SOSTENIDA POR LA BÚSQUEDA DE EXCLUSIVIDAD , AUNQUE ENFRENTA DESAFÍOS DE ACCESIBILIDAD DEBIDO AL ESTADO DE SUS VÍAS.', 'LA DEMANDA SE VE INFLUENCIADA POR LA EXCLUSIVIDAD DE LA ZONA. FACTORES COMO LA VALORIZACIÓN Y LA VELOCIDAD DE ABSORCIÓN DEL INVENTARIO SON MONITOREADOS PARA DETERMINAR LA RENTABILIDAD, COMO LO INDICAN ANÁLISIS DE LA ANI.', 'ABUNDANTE POR SER UNO DE LOS SECTORES EXCLUSIVOS DE LA CIUDAD, ADEMAS POR CONTAR CON TODOS LOS ESTABLECIMIENTOS DE COMERCIO', '', 'RESIDENCIAL', '', 'BUENA FRECUENCIA', 0, 0, 0, 0, 0, '      VILLA CAMPESTRE EN TULUÁ, VALLE DEL CAUCA, SE CONSOLIDA COMO UN SECTOR EXCLUSIVO Y DE ALTA VALORIZACIÓN, CARACTERIZADO POR CASAS Y APARTAMENTOS MODERNOS DE GAMA MEDIA -  ALTA (ESTRATO 6). ES UNA ZONA TRANQUILA, CON VÍAS EN RENOVACIÓN Y CERCA DE CENTROS COMERCIALES, LO QUE LO CONVIERTE EN UN PUNTO ATRACTIVO PARA LA INVERSIÓN INMOBILIARIA. ', 'EN SU FRENTE PARQUE DEL BARRIO', 'A 10 METROS APROXIMADAMENTE', 'HOSPITAL TOMAS URIBE URIBE ', 'A 1,20 KILÓMETROS APROXIMADAMENTE', 'SUPERCENTRO TULUA ', 'A 240,98 METROS APROXIMADAMENTE', 'COLEGIO GIMNASIO DEL PACIFICO', 'A 150 METROS APROXIMADAMENTE', 'CENTRO COMERCIAL HOME CENTER Y SUPERCENTRO TUL.', 'A 240,98 METROS APROXIMADAMENTE', 'PARQUE DE LA FAMILIA', '475,67 METROS APROXIMADAMENTE', 'BUEN ESTADO', 'BUEN ESTADO ', 'REDES DEL SECTOR EN BUEN ESTADO', 'INTERCONEXION DE LAS REDES DEL MUNICIPIO', 'BUEN ESTADO REDES DEL BARRIO', 'BUEN ESTADO', 'BUEN ESTADO ', 'BUEN ESTADO ', 'CELULAR', 1, 1, 1, 0, 1, 1, 1, 'La perspectiva de valorización en Tuluá para 2024-2026 está marcada por una drástica actualización catastral que ha incrementado avalúos de forma significativa, generando alta valorización nominal pero también fuertes alzas en el impuesto predial. Se priorizan zonas con nuevo desarrollo urbanístico y rural, mientras avanzan proyectos de infraestructura en este sector  aledaño en donde se ubica este inmueble.', 'BUEN ESTADO', 'FINALIZADO', 'EXELENTE', '3', '0', '50 AÑOS', '35 AÑOS', '2.010', '16 AÑOS', 'MAMPOSTERÍA ESTRUCTURADA', 'LADRILLO Y FERROCONCRETO EN LAS ZAPATAS', 'BUENO', '', '', '', '', 'PINTADA CON VINILO BLANCO Y ROJO', '6 METROS', '', '', '', 'BUENA', 'ABUNDANTE', 'NINGUNA', 'NINGUNA', '', 'BARANDAS TERRAZA, VENTANA, GARAJE Y PUERTA CORREDIZA DEL TERCER PISO ', 'BUENO', 'PUERTA INTERIORES EXTERIORES, CLOSET, BIBLIOTECA, BAR Y TOCADOR', 'BUENO', 'CERAMICA ', 'BUENO', 'FERROCONCRETO ', 'BUENO', 'TEJA DE BARRO COCIDO', 'BUENO', 'MESONES DE MARMOL Y  PAREDES CERÁMICA', 'BUENO', 'CERÁMICA ', 'BUENO', 'SI', 'SI', 'NO', 'SI', 'SI ', '6', '2', '3', '1', '3', '1', '3', '1', '6', '1', '1', '2', '1', '1', '1', '1', 'NO', '1', 'NO', 'NO', 'SI', 'NO', 'SI', 'SI', 'NO', 'SI', 'NO', 'NO', '1', '1', 'NO', '', '', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '[]', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', '', 0, 0.000000, 0.000000, 0.000000, 0.000000, '', 0, 0.00000000, 0.00000000, '', '', '', 0.000000, '', 0.000000, 0.000000, 0.000000, '1', 'CASA DE HABITACIÓN UNIFAMILIAR', 99999999999999.999999, 'M2', 5.630000, 720000000.000000, 0.000000, '/file/Uploads/04072026-160410-CROQUIS-GENNY.JPG', '[{\"id\":1,\"titulo\":\"PRIMER PLANTA\",\"url\":\"\\/file\\/Uploads\\/04072026-160441-WhatsApp-Image-2026-04-07-at-3.10.49-PM-(1).jpeg\"},{\"id\":2,\"titulo\":\"PRIMER PLANTA\",\"url\":\"\\/file\\/Uploads\\/04072026-160455-WhatsApp-Image-2026-04-07-at-3.10.50-PM.jpeg\"},{\"id\":3,\"titulo\":\"PRIMER PLANTA\",\"url\":\"\\/file\\/Uploads\\/04072026-160409-WhatsApp-Image-2026-04-07-at-3.10.49-PM-(2).jpeg\"}]', '[{\"id\":1,\"titulo\":\"SEGUNDA PLANTA\",\"url\":\"\\/file\\/Uploads\\/04072026-150451-WhatsApp-Image-2026-04-07-at-3.10.50-PM-(1).jpeg\"},{\"id\":2,\"titulo\":\"SEGUNDA PLANTA\",\"url\":\"\\/file\\/Uploads\\/04072026-150416-WhatsApp-Image-2026-04-07-at-3.10.51-PM.jpeg\"},{\"id\":3,\"titulo\":\"SEGUNDA PLANTA\",\"url\":\"\\/file\\/Uploads\\/04072026-150432-WhatsApp-Image-2026-04-07-at-3.10.52-PM.jpeg\"},{\"id\":4,\"titulo\":\"SEGUNDA PLANTA\",\"url\":\"\\/file\\/Uploads\\/04072026-150448-WhatsApp-Image-2026-04-07-at-3.10.51-PM-(1).jpeg\"},{\"id\":5,\"titulo\":\"SEGUNDA PLANTA\",\"url\":\"\\/file\\/Uploads\\/04072026-160423-WhatsApp-Image-2026-04-07-at-3.10.52-PM-(1).jpeg\"},{\"id\":6,\"titulo\":\"SEGUNDA PLANTA\",\"url\":\"\\/file\\/Uploads\\/04072026-160438-WhatsApp-Image-2026-04-07-at-3.10.53-PM.jpeg\"},{\"id\":7,\"titulo\":\"SEGUNDA PLANTA\",\"url\":\"\\/file\\/Uploads\\/04072026-160412-WhatsApp-Image-2026-04-07-at-3.10.51-PM-(2).jpeg\"},{\"id\":8,\"titulo\":\"COCINA AUXILIAR SEGUNDO NIVEL\",\"url\":\"\\/file\\/Uploads\\/04082026-160459-WhatsApp-Image-2026-04-07-at-3.11.00-PM.jpeg\"},{\"id\":9,\"titulo\":\"TERRAZA TERCER NIVEL\",\"url\":\"\\/file\\/Uploads\\/04082026-160453-WhatsApp-Image-2026-04-07-at-3.10.56-PM.jpeg\"},{\"id\":10,\"titulo\":\"TERRAZA TERCER NIVEL\",\"url\":\"\\/file\\/Uploads\\/04082026-160453-WhatsApp-Image-2026-04-07-at-3.10.54-PM.jpeg\"}]', '2025-01-30', 5, '2026-04-08', 5, 'Activo');

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
