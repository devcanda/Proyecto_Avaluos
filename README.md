# 🏢 Sistema de Gestión de Avalúos (SGA)

![PHP](https://img.shields.io/badge/PHP-7.4%20|%208.1-blue.svg?style=flat-square&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-orange.svg?style=flat-square&logo=mysql)
![Bootstrap](https://img.shields.io/badge/UI-Bootstrap%204-purple.svg?style=flat-square&logo=bootstrap)
![Licencia](https://img.shields.io/badge/Licencia-Privada-red.svg?style=flat-square)

Plataforma web integral diseñada para la captura de datos en campo, registro técnico, gestión fotográfica y generación automatizada de informes de avalúos inmobiliarios. El sistema permite centralizar la información cartográfica y técnica, exportándola a documentos PDF profesionales y enviando notificaciones vía correo electrónico.

---

## ✨ Características Principales

* **Registro Modular:** Captura detallada de información por categorías (Ubicación, Características, Registro Cartográfico).
* **Gestión de Evidencia:** Sistema de carga de archivos para fotos de fachada, croquis y registros cartográficos.
* **Motor de Reportes:** Generación dinámica de PDF utilizando la librería **Dompdf**.
* **Notificaciones SMTP:** Integración con **PHPMailer** para envío de alertas y documentos.
* **Seguridad y Acceso:** Control de sesiones y gestión de perfiles de usuario (Administrador/Técnico).
* **Arquitectura MVC Desacoplada:** Código organizado en Controladores, Modelos y Vistas para fácil mantenimiento.

---

## 📂 Estructura del Repositorio

```text
proyecto_avaluos/
├── controller/         # Lógica de procesamiento de peticiones (Avalúos, Usuarios, Auth)
├── core/               # Vistas principales y lógica de interfaz de usuario
├── model/              # Clases y mapeo de entidades de Base de Datos
├── utilidades/         # Conexión DB, funciones globales y PHPMailer
├── dompdf/             # Librería para renderizado de HTML a PDF
├── file/Uploads/       # Directorio de almacenamiento de imágenes (Fachadas, Croquis)
├── login/              # Estilos y lógica exclusiva del módulo de acceso
├── js/ & css/          # Scripts de validación frontend y hojas de estilo
├── candamil_avaluo.sql # Script de creación de base de datos
└── index.php           # Punto de entrada de la aplicación


🚀 Guía de Despliegue Detallada
Sigue estos pasos para poner en marcha el sistema en un entorno local o servidor de producción.

1. Requisitos Previos
Servidor: Apache 2.4+ o Nginx.

Lenguaje: PHP 7.4 o superior (Probado en 8.1.34).

Extensiones PHP: mysqli, pdo_mysql, gd (vital para imágenes en PDF), mbstring, openssl.

Base de Datos: MySQL 5.7+ o MariaDB 10.3+.

2. Configuración de la Base de Datos
Ingresa a tu gestor (phpMyAdmin o CLI).

Crea una base de datos llamada candamil_avaluo con cotejamiento utf8_spanish_ci.

Importa el archivo candamil_avaluo.sql ubicado en la raíz del proyecto.

Nota: Este paso creará las tablas avaluoenntity y usuarios con los índices necesarios.

3. Configuración del Entorno (Conexión)
Edita el archivo utilidades/conexion.php para establecer tus credenciales:

<?php
$host = "localhost";        // Tu servidor de base de datos
$user = "tu_usuario";       // Usuario DB (ej. root en local)
$password = "tu_password";  // Contraseña DB
$database = "candamil_avaluo"; 

$conexion = mysqli_connect($host, $user, $password, $database);
$conexion->set_charset("utf8"); // Garantiza compatibilidad con tildes y Ñ
?>

4. Permisos de Escritura (Paso Crítico)
Para que la subida de fotos y la generación de reportes funcionen, el servidor debe tener permisos de escritura en las siguientes rutas:

chmod -R 775 file/Uploads/

chmod -R 775 dompdf/lib/res/ (Para caché de fuentes y temporales)


