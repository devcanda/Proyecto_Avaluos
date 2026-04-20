(function (document, window, $) {
	'use strict';
	$(document).ready(function () {
		if (window.location.origin == undefined) {
			window.location.origin =
				window.location.protocol +
				'//' +
				window.location.hostname +
				(window.location.port ? ':' + window.location.port : '');
		}

		var forms = document.querySelectorAll('.needs-validation');

		if (forms != undefined) {
			Array.prototype.slice.call(forms).forEach(function (form) {
				form.addEventListener(
					'submit',
					function (event) {
						debugger;
						if (!form.checkValidity()) {
							event.preventDefault();
							event.stopPropagation();
						}

						form.classList.add('was-validated');
					},
					false
				);
			});
		}

		let mensaje = document.getElementById('mensaje');
		if (mensaje != undefined) {
			if (!isNullOrEmpty(mensaje.value))
				showMessage('error', mensaje.value, 'Proceso Fallido', false, false);
		}
	});

	document.addEventListener('DOMContentLoaded', function () {
		let formulario = document.getElementById('formCrear');
		if (formulario != undefined)
			formulario.addEventListener('submit', validarFormularioCrear);

		let formularioedit = document.getElementById('formEdit');
		if (formularioedit != undefined)
			formularioedit.addEventListener('submit', validarFormularioEdit);
	});

	function validarFormularioCrear(evento) {
		evento.preventDefault();
		if (EsValidoFormualrioCrear()) {
			this.submit();
		}
	}

	function validarFormularioEdit(evento) {
		evento.preventDefault();
		if (EsValidoFormualrioEdit()) {
			this.submit();
		}
	}

	function EsValidoFormualrioCrear() {
		if ($('#password').val() == '') return false;
		if ($('#password2').val() == '') return false;
		if ($('#correo').val() == '') return false;
		if ($('#nombre').val() == '') return false;
		if ($('#password').val() != $('#password2').val()) return false;
		return true;
	}

	function EsValidoFormualrioEdit() {
		if ($('#correo').val() == '') return false;
		if ($('#nombre').val() == '') return false;
		return true;
	}

	$(document).on('click', '#Filtar', function () {
		var urlBase =
			window.location.origin + dominio + '/controller/controllerUsuarios.php';
		let form = document.getElementById('formFiltrar');
		let formdata = new FormData(form);
		Filtrar(formdata, urlBase);
	});

	async function Filtrar(formdata, urlBase) {
		try {
			$('#spinner').removeClass('ocultar');
			let response = await fetch(urlBase, {
				method: 'POST',
				body: formdata,
			});
			let result = await response.json();
			$('#spinner').addClass('ocultar');
			if (result.estado) AddData(result.data);
			else
				showMessage('error', result.mensaje, 'Proceso Fallido', false, false);
		} catch (error) {
			$('#spinner').addClass('ocultar');
			showMessage('error', error, 'Proceso Fallido', false, false);
		}
	}

	function AddData(data) {
		let i = 1;
		let ed =
			"<td class='text-center'><a href='#' data-id='@id' data-toggle='editar'><img width='25' height='20' src='../file/svg/edit-svgrepo-com.svg'></a></td>";
		let ex =
			"<td class='text-center'><a href='#' data-id='@id' data-toggle='eliminar'><img width='25' height='20' src='../file/svg/x-svgrepo-com.svg'></a></td>";
		let row = '';

		document.getElementById('data-table').innerHTML = '';
		$.each(data, function (ind, item) {
			if (item.fechaRegistro == null) item.fechaRegistro = '';

			ed = ed.replace('@id', item.id);
			ex = ex.replace('@id', item.id);

			let f = formatearFecha(item.fechaRegistro);

			row +=
				'<tr>' +
				"<td class='text-center' scope='row'>" +
				i +
				'</td>' +
				'<td>' +
				item.nombre +
				'</td>' +
				'<td>' +
				item.correo +
				'</td>' +
				'<td class="text-center">' +
				f +
				'</td>' +
				ed +
				ex;

			i++;
		});
		document.getElementById('data-table').innerHTML = row;
	}

	function formatearFecha(d) {
		if (d == null || d == '') return '';
		let f = d.toString().split('-');
		return completar(f[2]) + '/' + completar(f[1]) + '/' + f[0];
	}

	function completar(dig) {
		let d = parseInt(dig);
		return d >= 0 && d <= 9 ? '0' + d : d;
	}

	$(document).on('click', '[data-toggle="eliminar"]', function () {
		var $this = $(this);
		var id = $this.attr('data-id');
		var urlBase =
			window.location.origin + dominio + '/controller/controllerUsuarios.php';
		let formData = new FormData();
		formData.append('id', id);
		formData.append('opc', '3');
		swal({
			title: '¿Esta Seguro?',
			text: '¡Eliminar Usuario!',
			icon: 'warning',
			buttons: true,
			dangerMode: true,
			closeOnClickOutside: false,
			closeOnEsc: false,
		}).then((willDelete) => {
			if (willDelete) {
				Elimianr(urlBase, formData);
			} else {
				swal('¡Proceso Cancelado por el Usuario!');
			}
		});
	});

	async function Elimianr(urlBase, formData) {
		try {
			$('#spinner').removeClass('ocultar');
			let response = await fetch(urlBase, {
				method: 'POST',
				body: formData,
			});
			let result = await response.json();
			$('#spinner').addClass('ocultar');
			if (result.estado) {
				showMessage(
					'success',
					'Se inactivo usuario exitosamente',
					'Proceso Exitoso',
					false,
					false
				).then(() => {
					Actualizar();
				});
			} else {
				showMessage('error', result.mensaje, 'proceso fallido', false, false);
			}
		} catch (error) {
			$('#spinner').addClass('ocultar');
			showMessage('error', error, 'proceso fallido', false, false);
		}
	}

	function Actualizar() {
		let n = $('#nombre').val();
		let c = $('#correo').val();
		let s = $('#start').val();
		let e = $('#end').val();
		if (
			isNullOrEmpty(n) &&
			isNullOrEmpty(c) &&
			isNullOrEmpty(s) &&
			isNullOrEmpty(e)
		) {
			window.location.href =
				window.location.origin + dominio + '/core/listarusuario.php';
		} else {
			var urlBase =
				window.location.origin + dominio + '/controller/controllerUsuarios.php';
			let form = document.getElementById('formFiltrar');
			let formdata = new FormData(form);
			Filtrar(formdata, urlBase);
		}
	}

	function isNullOrEmpty(value) {
		return value == undefined || value == null || value == '';
	}

	$(document).on('click', '[data-toggle="editar"]', function () {
		var $this = $(this);
		var id = $this.attr('data-id');
		window.location.href =
			window.location.origin + dominio + '/core/editarUsuario.php?id=' + id;
	});

	function showMessage(icon, text, title, closeOnClickOutside, closeOnEsc) {
		return swal({
			icon: icon,
			title: title,
			text: text,
			closeOnClickOutside: closeOnClickOutside,
			closeOnEsc: closeOnEsc,
		});
	}

	$(document).on('blur', '#password', function () {
		var p1 = $('#password').val();
		var p2 = $('#password2').val();

		if (p1 == p2 && p1 == '') {
			$('[data-toggle="password2"]').addClass('oculto');
			$('#password2').removeClass('inputValido');
			$('#password2').removeClass('error');
			return;
		}

		if (p1 != p2) {
			$('#password2').addClass('error');
			$('[data-toggle="password2"]').removeClass('oculto');
			$('#password2').removeClass('inputValido');
		} else {
			$('#password2').removeClass('error');
			$('#password2').addClass('inputValido');
			$('[data-toggle="password2"]').addClass('oculto');
		}
	});

	$(document).on('blur', '#password2', function () {
		var p1 = $('#password').val();
		var p2 = $('#password2').val();

		if (p1 == p2 && p1 == '') {
			$('[data-toggle="password2"]').addClass('oculto');
			$('#password2').removeClass('inputValido');
			$('#password2').removeClass('error');
			return;
		}
		if (p1 != p2) {
			$('#password2').addClass('error');
			$('[data-toggle="password2"]').removeClass('oculto');
			$('#password2').removeClass('inputValido');
		} else {
			$('#password2').removeClass('error');
			$('#password2').addClass('inputValido');
			$('[data-toggle="password2"]').addClass('oculto');
		}
	});

	$(document).on('blur', '#start', function () {
		var start = new Date($('#start').val());
		var end = new Date($('#end').val());
		if (start.getTime() > end.getTime() || $('#end').val() == '') {
			$('#end').val($('#start').val());
		}
	});

	$(document).on('blur', '#end', function () {
		var start = new Date($('#start').val());
		var end = new Date($('#end').val());
		if (start.getTime() > end.getTime() || $('#start').val() == '') {
			$('#start').val($('#end').val());
		}
	});

	$(document).on('click', '#Retornar', function () {
		window.location.href =
			window.location.origin + dominio + '/core/listarusuario.php';
	});
})(document, window, jQuery);
