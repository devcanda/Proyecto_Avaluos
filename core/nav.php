	
		<nav
			id="navbar_top"
			class="navbar navbar-expand-lg navbar-dark fondo-morado sticky"
		>
			<div class="container">
				<a class="navbar-brand" href="#">Avaluos System</a>
				<button
					class="navbar-toggler"
					type="button"
					data-bs-toggle="collapse"
					data-bs-target="#main_nav"
					aria-expanded="false"
					aria-label="Toggle navigation"
				>
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="main_nav">
					<ul class="navbar-nav ms-auto">
						<li class="nav-item">
						<a class="nav-link" id="ListarAvaluo" href="#">Listado de Avaluos</a>
						</li>
						<li class="nav-item">
						<a class="nav-link" id="CrearAvaluo" href="#">Crear Avaluos</a>
						</li>
						<li class="nav-item dropdown">
							<a
								class="nav-link dropdown-toggle"
								href="#"
								data-bs-toggle="dropdown"
								>Seguridad</a
							>
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a class="dropdown-item" id="listarUsuario" href="#">Usuarios</a></li>
								<li>
									<a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#cambioClave">Cambio de contraseña</a>								    
								</li>
								<li>
									<a class="dropdown-item" id="cerrarSesion" href="#"
										>Cerrar Sesión</a
									> 
								</li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- navbar-collapse.// -->
			</div>
			<!-- container-fluid.// -->
		</nav>