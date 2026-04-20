<?php 
 include_once '../model/usuario.php'; 
 include_once '../utilidades/utilidades.php';
 session_start();   
 if(!isset($_SESSION) || empty($_SESSION))
 {
     header ("Location: ../index.php");
 }
$Usuario = unserialize($_SESSION['usuario']);

$nombre="";
if(isset($_GET["nombre"]) || !empty($_GET["nombre"]))
{
  $nombre = $_GET["nombre"];
}

$email = "";
if(isset($_GET["email"]) || !empty($_GET["email"]))
{
  $email = $_GET["email"];
}

$mensaje = "";
if(isset($_GET["mensaje"]) || !empty($_GET["mensaje"]))
{
  $mensaje = $_GET["mensaje"];
}

$id = $_GET["id"];

$user = new usuario();
$user->get($id);
if($user->id==0)
{
    header ("Location: ../core/listarusuario.php");
}

if($nombre!= "")
{
    $user->nombre = $nombre;
}

if($email!="")
{
    $user->correo = $email;
}

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


		<form id="formEdit" method="post" class="needs-validation" novalidate 	action="../controller/controllerUsuarios.php">
		<input type="text" class="invisible" name="opc" id="opc" value='2'/>
        <input type="text" class="invisible" name="id" id="id" value='<?php echo $user->id ?>'/>
		<input type="text" class="invisible" name="mensaje" id="mensaje" value='<?php echo $mensaje; ?>'/>
			<div class="container cont">

				<div class="row mt-5">
					<div class="col-12">
						<p>Panel de Edición de Usuario</p>
						<hr />
					</div>
				</div>

                <div class="row">
                	<div class="col-12 col-sm-4 mt-3">
						<label for="Solicitante" class="form-label">Nombre:</label>
                        <div class="input-group has-validation">
						<input
							type="text"
							class="form-control"
							name="nombre"
							id="nombre"
							placeholder="Nombre"
                            required
							value='<?php echo $user->nombre; ?>'
						/>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Nombre es requerido</div>
                        </div>
					</div>
			
                </div>

				<div class="row">

                <div class="col-12 col-sm-4 mt-3">
                    	<label for="correo" class="form-label">Email:</label>
						<div class="input-group has-validation">						
							<input
								type="email"
								class="form-control"
								name="correo"
								id="correo"
								placeholder="Email"
								required
								pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
								value="<?php echo $user->correo; ?>"
							/>
						<div class="valid-feedback"></div>
						<div class="invalid-feedback">Ingrese un correo valido ejemplo 'xxx@xx.xx'</div>
						</div>
					</div>
				
					<div class="col-12 col-sm-2" style="margin-top:46px;">
							<button id="Retornar" class="btn btn-primary col-12" type="button" >Regresar <i class="bi bi-backspace text-light"></i></button>
					</div>
                    <div class="col-12 col-sm-2" style="margin-top:46px;">
							<button id="Edit" class="btn btn-primary col-12" type="submit" >Editar <i class="bi bi-pencil text-light"></i></button>
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

