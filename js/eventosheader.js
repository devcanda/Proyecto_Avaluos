(function (document, window, $) {
	'use strict';

	$(document).ready(function () {});

	$(document).on('click', '#btnCambioClave', function (event) {
		if (ValidarFormularioCambioContraseña()) {
			var urlBase =
				window.location.origin + dominio + '/controller/controllerUsuarios.php';
			let form = document.getElementById('formCambioClave');
			let formdata = new FormData(form);
			ProcesarCambioClave(formdata, urlBase);
		}
	});

	async function ProcesarCambioClave(formdata, urlBase) {
		try {
			$('#spinner').removeClass('ocultar');
			let response = await fetch(urlBase, {
				method: 'POST',
				body: formdata,
			});
			let result = await response.json();
			$('#spinner').addClass('ocultar');
			if (result.estado) {
				console.log(JSON.stringify(result, null, 5));
				showMessage('success', '¡Procesado sin error!', false).then((x) => {
					$('#cambioClave').modal('hide');
					LipiarModalCambioClave();
				});
			} else {
				showMessage('error', result.mensaje, false);
			}
		} catch (error) {
			$('#spinner').addClass('ocultar');
			showMessage('error', error.message, false);
		}
	}

	function LipiarModalCambioClave() {
		for (let i = 0; i < 3; i++) {
			$('#CambioPassword' + i).val('');
			$('#CambioPassword' + i).removeClass('inputValido');
			$('#CambioPassword' + i).removeClass('error');
		}
	}

	function showMessage(icon, text, title, closeOnClickOutside, closeOnEsc) {
		return swal({
			icon: icon,
			title: title,
			text: text,
			closeOnClickOutside: closeOnClickOutside,
			closeOnEsc: closeOnEsc,
		});
	}

	function ValidarFormularioCambioContraseña() {
		let sw = true;

		for (let i = 0; i < 3; i++) {
			if ($('#CambioPassword' + i).val() == '') {
				$('#CambioPassword' + i).addClass('error');
				$('#CambioPassword' + i).removeClass('inputValido');
				sw = false;
			} else {
				$('#CambioPassword' + i).addClass('inputValido');
				$('#CambioPassword' + i).removeClass('error');
			}
		}
		if ($('#CambioPassword1').val() != $('#CambioPassword2').val()) {
			sw = false;
		}
		return sw;
	}

	$(document).on('click', '#CambioPassword0', function () {
		$('#CambioPassword0').removeClass('error');
		$('#CambioPassword0').removeClass('inputValido');
	});

	$(document).on('blur', '#CambioPassword0', function () {
		if ($('#CambioPassword0').val() == '') {
			$('#CambioPassword0').removeClass('inputValido');
			$('#CambioPassword0').addClass('error');
		} else {
			$('#CambioPassword0').addClass('inputValido');
			$('#CambioPassword0').removeClass('error');
		}
	});

	$(document).on('click', '#CambioPassword1', function () {
		$('#CambioPassword1').removeClass('error');
		$('#CambioPassword1').removeClass('inputValido');
	});

	$(document).on('click', '#CambioPassword2', function () {
		$('#CambioPassword2').removeClass('error');
		$('#CambioPassword2').removeClass('inputValido');
	});

	$(document).on('blur', '#CambioPassword1', function () {
		var p1 = $('#CambioPassword1').val();
		var p2 = $('#CambioPassword2').val();

		if (p1 == '') {
			$('#CambioPassword1').removeClass('inputValido');
			$('#CambioPassword1').addClass('error');
		} else {
			$('#CambioPassword1').addClass('inputValido');
			$('#CambioPassword1').removeClass('error');
		}

		if (p1 == p2 && p1 == '') {
			$('[data-toggle="CambioPassword2"]').addClass('oculto');
			$('#CambioPassword2').removeClass('inputValido');
			$('#CambioPassword2').removeClass('error');
			return;
		}

		if (p1 != p2) {
			$('#CambioPassword2').addClass('error');
			$('[data-toggle="CambioPassword2"]').removeClass('oculto');
			$('#CambioPassword2').removeClass('inputValido');
		} else {
			$('#CambioPassword2').removeClass('error');
			$('#CambioPassword2').addClass('inputValido');
			$('[data-toggle="CambioPassword2"]').addClass('oculto');
		}
	});

	$(document).on('blur', '#CambioPassword2', function () {
		var p1 = $('#CambioPassword1').val();
		var p2 = $('#CambioPassword2').val();

		if (p1 == p2 && p1 == '') {
			$('[data-toggle="CambioPassword2"]').addClass('oculto');
			$('#CambioPassword2').removeClass('inputValido');
			$('#CambioPassword2').removeClass('error');
			return;
		}

		if (p1 != p2) {
			$('#CambioPassword2').addClass('error');
			$('[data-toggle="CambioPassword2"]').removeClass('oculto');
			$('#CambioPassword2').removeClass('inputValido');
		} else {
			$('#CambioPassword2').removeClass('error');
			$('#CambioPassword2').addClass('inputValido');
			$('[data-toggle="CambioPassword2"]').addClass('oculto');
		}
	});

	$(document).on('click', '#Crear', function (event) {
		window.location.href =
			window.location.origin + dominio + '/core/crearUsuario.php';
	});

	$(document).on('click', '#cerrarSesion', function (event) {
		window.location.href =
			window.location.origin + dominio + '/core/cerrarSesion.php';
	});

	$(document).on('click', '#CrearAvaluo', function (event) {
		window.location.href =
			window.location.origin + dominio + '/core/formulario.php';
	});

	$(document).on('click', '#ListarAvaluo', function (event) {
		window.location.href =
			window.location.origin + dominio + '/core/listadodeavaluo.php';
	});

	$(document).on('click', '#listarUsuario', function (event) {
		window.location.href =
			window.location.origin + dominio + '/core/listarusuario.php';
	});
})(document, window, jQuery);
