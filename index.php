<?php

session_start();   
if(!isset($_SESSION) || empty($_SESSION))
{
   
}else
{
	header ("Location: core/listadodeavaluo.php");
}

$mensaje="";
if(isset($_GET["mensaje"]) || !empty($_GET["mensaje"]))
{
  $mensaje = $_GET["mensaje"];
}




?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Login</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--===============================================================================================-->
		<link rel="icon" type="image/png" href="./login/images/icons/favicon.ico" />
		<!--===============================================================================================-->
		<link
			rel="stylesheet"
			type="text/css"
			href="./login/vendor/bootstrap/css/bootstrap.min.css"
		/>
		<!--===============================================================================================-->
		<link
			rel="stylesheet"
			type="text/css"
			href="./login/fonts/font-awesome-4.7.0/css/font-awesome.min.css"
		/>
		<!--===============================================================================================-->
		<link
			rel="stylesheet"
			type="text/css"
			href="./login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css"
		/>
		<!--===============================================================================================-->
		<link
			rel="stylesheet"
			type="text/css"
			href="./login/vendor/animate/animate.css"
		/>
		<!--===============================================================================================-->
		<link
			rel="stylesheet"
			type="text/css"
			href="./login/vendor/css-hamburgers/hamburgers.min.css"
		/>
		<!--===============================================================================================-->
		<link
			rel="stylesheet"
			type="text/css"
			href="./login/vendor/animsition/css/animsition.min.css"
		/>
		<!--===============================================================================================-->
		<link
			rel="stylesheet"
			type="text/css"
			href="./login/vendor/select2/select2.min.css"
		/>
		<!--===============================================================================================-->
		<link
			rel="stylesheet"
			type="text/css"
			href="./login/vendor/daterangepicker/daterangepicker.css"
		/>
		<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="./login/css/util.css" />
		<link rel="stylesheet" type="text/css" href="./login/css/main.css" />
		<!--===============================================================================================-->
	</head>
	<body style="background-color: #666666">
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<form
						class="login100-form validate-form"
						method="post"
						action="controller/controllerAuth.php"
						id="form1"
					>
						<span class="login100-form-title p-b-43">Inicio de sesión </span>

						<div
							class="wrap-input100 validate-input"
							data-validate="Valid email is required: ex@abc.xyz"
						>
							<input class="input100" type="text" name="email" id="email" />
							<span class="focus-input100"></span>
							<span class="label-input100">Email</span>
						</div>

						<div
							class="wrap-input100 validate-input"
							data-validate="Password is required"
						>
							<input class="input100" type="password" name="pass" id="pass" />
							<span class="focus-input100"></span>
							<span class="label-input100">Password</span>
						</div>

						<div class="flex-sb-m w-full p-t-3 p-b-32">
						    <div>
								<a href="#" class="txt1"></a>
							</div>
							<div>
								<a href="#" class="txt1"> Forgot Password? </a>
							</div>
						</div>

						<div class="container-login100-form-btn">
							<button  class="login100-form-btn" type="button" id="login" >Login</button>
						</div>
						
						<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
							<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
								<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
							</symbol>
							<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
								<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
							</symbol>
							<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
								<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
							</symbol>
						</svg>				

						<?php

                         if($mensaje!="")
						 {
							 echo '
							 
							 <div class="alert alert-danger d-flex align-items-center mt-5" role="alert">
						<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
						<div>
							Error En Credenciales
						</div>
						</div>
						
							 ';
						 }

						?>

						

					</form>

					<div
						class="login100-more"
						style="background-image: url('./login/images/bg-01.jpg')"
					></div>
				</div>
			</div>
		</div>


		<div id="spinner" class="overlay ocultar">
			<div class="center">
				<div class="spinner"></div>
			</div>
		</div>


		<!--===============================================================================================-->
		<script src="./login/vendor/jquery/jquery-3.2.1.min.js"></script>
		<!--===============================================================================================-->
		<script src="./login/vendor/animsition/js/animsition.min.js"></script>
		<!--===============================================================================================-->
		<script src="./login/vendor/bootstrap/js/popper.js"></script>
		<script src="./login/vendor/bootstrap/js/bootstrap.min.js"></script>
		<!--===============================================================================================-->
		<script src="./login/vendor/select2/select2.min.js"></script>
		<!--===============================================================================================-->
		<script src="./login/vendor/daterangepicker/moment.min.js"></script>
		<script src="./login/vendor/daterangepicker/daterangepicker.js"></script>
		<!--===============================================================================================-->
		<script src="./login/vendor/countdowntime/countdowntime.js"></script>
		<!--===============================================================================================-->
		<script src="./login/js/main.js"></script>
	</body>
</html>
