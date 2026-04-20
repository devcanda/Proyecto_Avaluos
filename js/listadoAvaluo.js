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
	});

	$(document).on('click', '#Filtar', function () {
		var urlBase =
			window.location.origin + dominio + '/controller/controlleravaluo.php';
		let form = document.getElementById('formFiltrar');
		let formdata = new FormData(form);
		Procesar(formdata, urlBase);
	});

	$(document).on('click', '[data-toggle="exportar"]', function () {
		var $this = $(this);
		var id = $this.attr('data-id');
		exportar(id);
	});

	$(document).on('click', '[data-toggle="editar"]', function () {
		var $this = $(this);
		var id = $this.attr('data-id');
		editar(id);
	});

	async function editar(id) {
		window.location.href =
			window.location.origin + dominio + '/core/editaravaluo.php?id=' + id;
	}

	async function exportar(id) {
		$('#spinner').removeClass('ocultar');
		window.location.href =
			window.location.origin + dominio + '/core/exportarpdf.php?id=' + id;
	}

	async function Procesar(formdata, urlBase) {
		try {
			$('#spinner').removeClass('ocultar');
			let response = await fetch(urlBase, {
				method: 'POST',
				body: formdata,
			});
			let result = await response.json();
			$('#spinner').addClass('ocultar');
			if (result.estado) AddData(result.data);
			else showMessage('error', result.mensaje, false);
		} catch (error) {
			$('#spinner').addClass('ocultar');
			showMessage('error', error, false);
		}
	}

	function AddData(data) {
		let i = 1;

		let ed =
			"<td class='text-center'><a href='#' data-id='@id' data-toggle='editar'><img width='25' height='20' src='../file/svg/edit-svgrepo-com.svg'></a></td>";
		let ex =
			"<td class='text-center'><a href='#' data-id='@id' data-toggle='exportar'><img width='25' height='20' src='../file/svg/pdf-svgrepo-com.svg'></a></td>";
		let row = '';

		document.getElementById('data-table').innerHTML = '';
		$.each(data, function (ind, item) {
			if (item.FechaDelAvalio == null) item.FechaDelAvalio = '';

			let edaux = ed.replace('@id', item.id);
			let exaux = ex.replace('@id', item.id);
			let f = formatearFecha(item.FechaDelAvalio);
			let tn =
				PipeTipoDpocumento(item.TipoDeDocumento) + '-' + item.NumeroDocumento;
			if (tn == '-') tn = '';
			row +=
				'<tr>' +
				"<td class='text-center' scope='row'>" +
				i +
				'</td>' +
				'<td>' +
				item.Solicitante +
				'</td>' +
				'<td>' +
				tn +
				'</td>' +
				'<td class="text-center">' +
				f +
				'</td>' +
				edaux +
				exaux;

			i++;
		});
		document.getElementById('data-table').innerHTML = row;
	}

	function showMessage(icon, title, closeOnClickOutside) {
		swal({
			icon: icon,
			title: title,
			closeOnClickOutside: closeOnClickOutside,
		});
	}

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

	function formatearFecha(d) {
		if (d == null || d == '') return '';
		let f = d.toString().split('-');
		return completar(f[2]) + '/' + completar(f[1]) + '/' + f[0];
	}

	function completar(dig) {
		let d = parseInt(dig);
		return d >= 0 && d <= 9 ? '0' + d : d;
	}

	function PipeTipoDpocumento(tipo) {
		switch (tipo) {
			case '1':
				return '(RC)';
			case '2':
				return '(CC)';
			case '3':
				return '(CE)';
			case '4':
				return '(P)';
			case '5':
				return '(TI)';
			case '6':
				return '(AI)';
			case '7':
				return '(MI)';
			case '8':
				return '(NIT)';
			case '9':
				return '(PEP)';
			case '10':
				return '(PT)';
			default:
				return '';
		}
	}

	$(document).on('click', '#cerrarSesion', function (event) {
		window.location.href =
			window.location.origin + dominio + '/core/cerrarSesion.php';
	});
})(document, window, jQuery);
