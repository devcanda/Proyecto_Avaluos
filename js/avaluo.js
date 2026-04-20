(function (document, window, $) {
	'use strict';

	$(document).on('click', '#btnG', function () {
		var urlBase =
			window.location.origin + dominio + '/controller/controlleravaluo.php';
		let formdata = ArmarData();
		Procesar(formdata, urlBase);
	});

	function ArmarData() {
		let form = document.getElementById('form1');
		let formdata = new FormData(form);

		let aire = $('#Aire')[0].checked ? 1 : 0;
		let AguasServidas = $('#AguasServidas')[0].checked ? 1 : 0;
		let Basura = $('#Basura')[0].checked ? 1 : 0;
		let Inseguridad = $('#Inseguridad')[0].checked ? 1 : 0;
		let Ruido = $('#Ruido')[0].checked ? 1 : 0;
		formdata.append('Aire', aire);
		formdata.append('AguasServidas', AguasServidas);
		formdata.append('Basura', Basura);
		formdata.append('Inseguridad', Inseguridad);
		formdata.append('Ruido', Ruido);

		let Alamedas = $('#Alamedas')[0].checked ? 1 : 0;
		let Alumbrado = $('#Alumbrado')[0].checked ? 1 : 0;
		let Arborizacion = $('#Arborizacion')[0].checked ? 1 : 0;
		let Ciclorutas = $('#Ciclorutas')[0].checked ? 1 : 0;
		let Paradero = $('#Paradero')[0].checked ? 1 : 0;
		let Parques = $('#Parques')[0].checked ? 1 : 0;
		let ZonasVerdes = $('#ZonasVerdes')[0].checked ? 1 : 0;

		formdata.append('Alamedas', Alamedas);
		formdata.append('Alumbrado', Alumbrado);
		formdata.append('Arborizacion', Arborizacion);
		formdata.append('Ciclorutas', Ciclorutas);
		formdata.append('Paradero', Paradero);
		formdata.append('Parques', Parques);
		formdata.append('ZonasVerdes', ZonasVerdes);

		let DCAACentral = $('#DCAACentral')[0].checked ? 1 : 0;
		let DCBBQ = $('#DCBBQ')[0].checked ? 1 : 0;
		let DCBicicletero = $('#DCBicicletero')[0].checked ? 1 : 0;
		let DCBombaEyec = $('#DCBombaEyec')[0].checked ? 1 : 0;
		let DCCalefaccion = $('#DCCalefaccion')[0].checked ? 1 : 0;
		let DCCanchaMultiuso = $('#DCCanchaMultiuso')[0].checked ? 1 : 0;
		let DCCanchaSquash = $('#DCCanchaSquash')[0].checked ? 1 : 0;
		let DCCCTV = $('#DCCCTV')[0].checked ? 1 : 0;
		let DCCitofonia = $('#DCCitofonia')[0].checked ? 1 : 0;
		let DCClubHouse = $('#DCClubHouse')[0].checked ? 1 : 0;
		let DCEquipoDePresion = $('#DCEquipoDePresion')[0].checked ? 1 : 0;
		let DCGarajesResidentes = $('#DCGarajesResidentes')[0].checked ? 1 : 0;
		let DCGarajesVisitantes = $('#DCGarajesVisitantes')[0].checked ? 1 : 0;
		let DCGimnasio = $('#DCGimnasio')[0].checked ? 1 : 0;
		let DCGolfito = $('#DCGolfito')[0].checked ? 1 : 0;
		let DCGuarderia = $('#DCGuarderia')[0].checked ? 1 : 0;
		let DCJuegosNinos = $('#DCJuegosNinos')[0].checked ? 1 : 0;
		let DCPiscina = $('#DCPiscina')[0].checked ? 1 : 0;
		let DCPlantaElectrica = $('#DCPlantaElectrica')[0].checked ? 1 : 0;
		let DCPorteria = $('#DCPorteria')[0].checked ? 1 : 0;
		let DCSalonComunal = $('#DCSalonComunal')[0].checked ? 1 : 0;
		let DCSalonDeJuegos = $('#DCSalonDeJuegos')[0].checked ? 1 : 0;
		let DCSauna = $('#DCSauna')[0].checked ? 1 : 0;
		let DCShutBasuras = $('#DCShutBasuras')[0].checked ? 1 : 0;
		let DCTanqueDeAgua = $('#DCTanqueDeAgua')[0].checked ? 1 : 0;
		let DCTeatrino = $('#DCTeatrino')[0].checked ? 1 : 0;
		let DCTerrazaComunal = $('#DCTerrazaComunal')[0].checked ? 1 : 0;
		let DCTurco = $('#DCTurco')[0].checked ? 1 : 0;
		let DCVigilancia24Horas = $('#DCVigilancia24Horas')[0].checked ? 1 : 0;
		let DCZonaVerde = $('#DCZonaVerde')[0].checked ? 1 : 0;

		formdata.append('DCAACentral', DCAACentral);
		formdata.append('DCBBQ', DCBBQ);
		formdata.append('DCBicicletero', DCBicicletero);
		formdata.append('DCBombaEyec', DCBombaEyec);
		formdata.append('DCCalefaccion', DCCalefaccion);
		formdata.append('DCCanchaMultiuso', DCCanchaMultiuso);
		formdata.append('DCCanchaSquash', DCCanchaSquash);
		formdata.append('DCCCTV', DCCCTV);
		formdata.append('DCCitofonia', DCCitofonia);
		formdata.append('DCClubHouse', DCClubHouse);
		formdata.append('DCEquipoDePresion', DCEquipoDePresion);
		formdata.append('DCGarajesResidentes', DCGarajesResidentes);
		formdata.append('DCGarajesVisitantes', DCGarajesVisitantes);
		formdata.append('DCGimnasio', DCGimnasio);
		formdata.append('DCGolfito', DCGolfito);
		formdata.append('DCGuarderia', DCGuarderia);
		formdata.append('DCJuegosNinos', DCJuegosNinos);
		formdata.append('DCPiscina', DCPiscina);
		formdata.append('DCPlantaElectrica', DCPlantaElectrica);
		formdata.append('DCPorteria', DCPorteria);
		formdata.append('DCSalonComunal', DCSalonComunal);
		formdata.append('DCSalonDeJuegos', DCSalonDeJuegos);
		formdata.append('DCSauna', DCSauna);
		formdata.append('DCShutBasuras', DCShutBasuras);
		formdata.append('DCTanqueDeAgua', DCTanqueDeAgua);
		formdata.append('DCTeatrino', DCTeatrino);
		formdata.append('DCTerrazaComunal', DCTerrazaComunal);
		formdata.append('DCTurco', DCTurco);
		formdata.append('DCVigilancia24Horas', DCVigilancia24Horas);
		formdata.append('DCZonaVerde', DCZonaVerde);

		let i = 0;
		$.each(files, function (ind, item) {
			formdata.append('RFImg' + (i + 1), item.file);
			formdata.append('RFId' + (i + 1), item.id);
			formdata.append('RFTittulo' + (i + 1), item.titulo);
			i++;
		});
		formdata.append('QtyRFImg', i);

		i = 0;
		$.each(files2, function (ind, item) {
			formdata.append('RFAImg' + (i + 1), item.file);
			formdata.append('RFAId' + (i + 1), item.id);
			formdata.append('RFATittulo' + (i + 1), item.titulo);
			i++;
		});
		formdata.append('QtyRFAImg', i);

		return formdata;
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
			if (result.estado) {
				$('#opc').val(2);
				$('#id').val(result.data.id);
				showMessage('success', '¡Procesado sin error!', false, false);
			} else showMessage('error', result.mensaje, false, false);
		} catch (error) {
			$('#spinner').addClass('ocultar');
			showMessage('error', error, false);
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

	$(document).on('change', '#archivo', function (event) {
		let file = event.target.files[0];
		let blah = document.getElementById('blah');
		blah.src = URL.createObjectURL(file);
		$('#eliminar1').removeClass('ocultar');
	});

	$(document).on('click', '#eliminar1', function (event) {
		let blah = document.getElementById('blah');
		blah.src = '../file/img/no-image.png';
		$('#eliminar1').addClass('ocultar');
		document.getElementById('archivo').value = '';
		if ($('#ImgDireccion').val() != undefined) $('#ImgDireccion').val('');
	});

	$(document).on('click', '#img-preview', function (event) {
		var $this = $(this);
		let src = $this.children()[0].src;
		let aux = src.toString().replace(window.location.origin + dominio, '');
		aux = aux.replace(/\//g, '');
		if (aux == 'fileimgno-image.png') return;
		let ImgPreview = document.getElementById('ImgPreview');
		ImgPreview.src = src;
		$('#exampleModal').modal('show'); // abrir
		//$('#exampleModal').modal('hide'); // cerrar
	});

	$(document).on('change', '#GeoLocalizacionImg', function (event) {
		let file = event.target.files[0];
		let blah = document.getElementById('blah2');
		blah.src = URL.createObjectURL(file);
		$('#eliminar2').removeClass('ocultar');
	});

	$(document).on('click', '#eliminar2', function (event) {
		let blah = document.getElementById('blah2');
		blah.src = '../file/img/no-image.png';
		$('#eliminar2').addClass('ocultar');
		document.getElementById('GeoLocalizacionImg').value = '';
		if ($('#GeoLocalizacionImg2').val() != undefined)
			$('#GeoLocalizacionImg2').val('');
	});

	$(document).on('click', '#img-preview2', function (event) {
		var $this = $(this);
		let src = $this.children()[0].src;
		let aux = src.toString().replace(window.location.origin + dominio, '');
		aux = aux.replace(/\//g, '');
		if (aux == 'fileimgno-image.png') return;
		let ImgPreview = document.getElementById('ImgPreview');
		ImgPreview.src = src;
		$('#exampleModal').modal('show');
	});

	//croquis

	$(document).on('change', '#CroquisImg', function (event) {
		let file = event.target.files[0];
		let blah = document.getElementById('blah3');
		blah.src = URL.createObjectURL(file);
		$('#eliminar3').removeClass('ocultar');
	});

	$(document).on('click', '#eliminar3', function (event) {
		let blah = document.getElementById('blah3');
		blah.src = '../file/img/no-image.png';
		$('#eliminar3').addClass('ocultar');
		document.getElementById('CroquisImg').value = '';
		if ($('#CroquisImg2').val() != undefined) $('#CroquisImg2').val('');
	});

	$(document).on('click', '#img-preview-CroquisImg', function (event) {
		var $this = $(this);
		let src = $this.children()[0].src;
		let aux = src.toString().replace(window.location.origin + dominio, '');
		aux = aux.replace(/\//g, '');
		if (aux == 'fileimgno-image.png') return;
		let ImgPreview = document.getElementById('ImgPreview');
		ImgPreview.src = src;
		$('#exampleModal').modal('show');
	});

	$(document).on('click', '[data-toggle="MostarModalPreview"]', function () {
		var $this = $(this);
		let src = $this[0].src;
		let ImgPreview = document.getElementById('ImgPreview');
		ImgPreview.src = src;
		$('#exampleModal').modal('show');
	});

	//reportes fotografico

	$(document).on(
		'click',
		'[data-toggle="EliminarReporteFotografico2"]',
		function () {
			var $this = $(this);
			var idImg = $this.attr('data-id');
			swal({
				title: '¿Esta Seguro?',
				text: '¡Eliminar Imagen Seleccionada!',
				icon: 'warning',
				buttons: true,
				dangerMode: true,
				closeOnClickOutside: false,
				closeOnEsc: false,
			}).then((willDelete) => {
				if (willDelete) {
					EliminarReporteFotografico2(idImg);
				}
			});
		}
	);

	async function EliminarReporteFotografico2(idImg) {
		try {
			var urlBase =
				window.location.origin + dominio + '/controller/controlleravaluo.php';
			let formdata = ArmarData();
			formdata.append('id', $('#id').val());
			formdata.append('idImg', idImg);
			formdata.append('opc', 5);
			$('#spinner').removeClass('ocultar');
			let response = await fetch(urlBase, {
				method: 'POST',
				body: formdata,
			});
			let result = await response.json();
			$('#spinner').addClass('ocultar');
			if (result.estado) {
				ActualizarReportesFotografico(result.data);
				showMessage('success', result.mensaje, false, false);
			} else showMessage('error', result.mensaje, false, false);
		} catch (error) {
			$('#spinner').addClass('ocultar');
			showMessage('error', error, false);
		}
	}

	function ActualizarReportesFotografico(data) {
		debugger;
		let urlBase = window.location.origin + dominio;
		let s = '';
		$('#rfSalida').html('');
		$.each(data, function (ind, item) {
			s += '<div class="col-12 col-sm-4 mt-5">';
			s += '<div class="card" style="width: 18rem;">';
			s +=
				'<img style="cursor: pointer" data-toggle="MostarModalPreview" width="300" height="300" class="card-img-top" src="' +
				urlBase +
				item.url +
				'" alt="Card image cap">';
			s += '<div class="card-body">';
			s += '<h5 class="card-title">' + item.titulo + '</h5>';
			s +=
				'<a data-id=' +
				item.id +
				' data-toggle="EliminarReporteFotografico2" style="cursor: pointer" class="btn btn-primary">Eliminar</a>';
			s += '</div>';
			s += '</div>';
			s += '</div>';
		});
		$('#rfSalida').html(s);
	}

	$(document).on('change', '#RFImg2', function (event) {
		if ($('#TituloRF').val() == '') {
			showMessage('error', 'Debe ingresar un título de imágenes', false, false);
			document.getElementById('RFImg2').value = '';
		} else {
			let formdata = ArmarData();
			let i = 0;
			for (i = 0; i < event.target.files.length; i++) {
				formdata.append('RFImg' + (i + 1), event.target.files[i]);
				formdata.append('RFId' + (i + 1), 0);
				formdata.append('RFTittulo' + (i + 1), $('#TituloRF').val());
			}
			formdata.append('QtyRFImg', i);
			formdata.append('opc', 6);
			formdata.append('id', $('#id').val());
			EditarREporteFotografico(formdata);
		}
	});

	async function EditarREporteFotografico(formdata) {
		try {
			var urlBase =
				window.location.origin + dominio + '/controller/controlleravaluo.php';
			$('#spinner').removeClass('ocultar');
			let response = await fetch(urlBase, {
				method: 'POST',
				body: formdata,
			});
			let result = await response.json();
			$('#spinner').addClass('ocultar');
			if (result.estado) {
				ActualizarReportesFotografico(result.data);
				showMessage('success', result.mensaje, false, false);
			} else showMessage('error', result.mensaje, false, false);
		} catch (error) {
			$('#spinner').addClass('ocultar');
			showMessage('error', error, false);
		}
	}

	let files = [];
	$(document).on('change', '#RFImg', function (event) {
		if ($('#TituloRF').val() == '') {
			showMessage('error', 'Debe ingresar un título de imágenes', false, false);
			document.getElementById('RFImg').value = '';
		} else {
			for (let i = 0; i < event.target.files.length; i++) {
				let id = files.length + 1;
				let obj = {
					id: id,
					file: event.target.files[i],
					titulo: $('#TituloRF').val(),
				};
				files.push(obj);
			}

			let s = '';
			for (let i = 0; i < files.length; i++) {
				let obj = files[i];
				let url = URL.createObjectURL(obj.file);
				s += '<div class="col-12 col-sm-4 mt-5">';
				s += '<div class="card" style="width: 18rem;">';
				s +=
					'<img style="cursor: pointer" data-toggle="MostarModalPreview" width="300" height="300" class="card-img-top" src="' +
					url +
					'" alt="Card image cap">';
				s += '<div class="card-body">';
				s += '<h5 class="card-title">' + obj.titulo + '</h5>';
				s +=
					'<a data-id=' +
					obj.id +
					' data-toggle="EliminarReporteFotografico" style="cursor: pointer" class="btn btn-primary">Eliminar</a>';
				s += '</div>';
				s += '</div>';
				s += '</div>';
			}

			$('#rfSalida').html(s);
			document.getElementById('RFImg').value = '';
			$('#TituloRF').val('');
		}
	});

	$(document).on(
		'click',
		'[data-toggle="EliminarReporteFotografico"]',
		function () {
			var $this = $(this);
			var id = $this.attr('data-id');
			swal({
				title: '¿Esta Seguro?',
				text: '¡Eliminar Imagen Seleccionada!',
				icon: 'warning',
				buttons: true,
				dangerMode: true,
				closeOnClickOutside: false,
				closeOnEsc: false,
			}).then((willDelete) => {
				if (willDelete) {
					EliminarReporteFotografico(id);
				}
			});
		}
	);

	function EliminarReporteFotografico(id) {
		let aux = [];
		let i = 1;
		let s = '';
		$.each(files, function (ind, item) {
			if (item.id != id) {
				item.id = i++;
				aux.push(item);
				let url = URL.createObjectURL(item.file);
				s += '<div class="col-12 col-sm-4 mt-5">';
				s += '<div class="card" style="width: 18rem;">';
				s +=
					'<img style="cursor: pointer" data-toggle="MostarModalPreview" width="300" height="300" class="card-img-top" src="' +
					url +
					'" alt="Card image cap">';
				s += '<div class="card-body">';
				s += '<h5 class="card-title">' + item.titulo + '</h5>';
				s +=
					'<a data-id=' +
					item.id +
					' data-toggle="EliminarReporteFotografico" style="cursor: pointer" class="btn btn-primary">Eliminar</a>';
				s += '</div>';
				s += '</div>';
				s += '</div>';
			}
		});

		files = aux;
		$('#rfSalida').html(s);
	}

	//reportes fotografico

	$(document).on(
		'click',
		'[data-toggle="EliminarReporteFotograficoAnexos2"]',
		function () {
			var $this = $(this);
			var idImg = $this.attr('data-id');
			swal({
				title: '¿Esta Seguro?',
				text: '¡Eliminar Imagen Seleccionada!',
				icon: 'warning',
				buttons: true,
				dangerMode: true,
				closeOnClickOutside: false,
				closeOnEsc: false,
			}).then((willDelete) => {
				if (willDelete) {
					EliminarReporteFotograficoAnexos2(idImg);
				}
			});
		}
	);

	async function EliminarReporteFotograficoAnexos2(idImg) {
		try {
			var urlBase =
				window.location.origin + dominio + '/controller/controlleravaluo.php';
			let formdata = ArmarData();
			formdata.append('id', $('#id').val());
			formdata.append('idImg', idImg);
			formdata.append('opc', 7);
			$('#spinner').removeClass('ocultar');
			let response = await fetch(urlBase, {
				method: 'POST',
				body: formdata,
			});
			let result = await response.json();
			$('#spinner').addClass('ocultar');
			if (result.estado) {
				ActualizarReportesFotograficoAnexo(result.data);
				showMessage('success', result.mensaje, false, false);
			} else showMessage('error', result.mensaje, false, false);
		} catch (error) {
			$('#spinner').addClass('ocultar');
			showMessage('error', error, false);
		}
	}

	function ActualizarReportesFotograficoAnexo(data) {
		let urlBase = window.location.origin + dominio;
		let s = '';
		$('#rfaSalida').html('');
		$.each(data, function (ind, item) {
			s += '<div class="col-12 col-sm-4 mt-5">';
			s += '<div class="card" style="width: 18rem;">';
			s +=
				'<img style="cursor: pointer" data-toggle="MostarModalPreview" width="300" height="300" class="card-img-top" src="' +
				urlBase +
				item.url +
				'" alt="Card image cap">';
			s += '<div class="card-body">';
			s += '<h5 class="card-title">' + item.titulo + '</h5>';
			s +=
				'<a data-id=' +
				item.id +
				' data-toggle="EliminarReporteFotograficoAnexos2" style="cursor: pointer" class="btn btn-primary">Eliminar</a>';
			s += '</div>';
			s += '</div>';
			s += '</div>';
		});
		$('#rfaSalida').html(s);
	}

	$(document).on('change', '#RFAImg2', function (event) {
		if ($('#TituloRFA').val() == '') {
			showMessage(
				'error',
				'Debe ingresar un título de imágenes...',
				false,
				false
			);
			document.getElementById('RFAImg2').value = '';
		} else {
			let formdata = ArmarData();
			let i = 0;
			for (i = 0; i < event.target.files.length; i++) {
				formdata.append('RFAImg' + (i + 1), event.target.files[i]);
				formdata.append('RFAId' + (i + 1), 0);
				formdata.append('RFATittulo' + (i + 1), $('#TituloRFA').val());
			}
			formdata.append('QtyRFAImg', i);
			formdata.append('opc', 8);
			formdata.append('id', $('#id').val());
			EditarREporteFotograficoAnexos(formdata);
		}
	});

	async function EditarREporteFotograficoAnexos(formdata) {
		try {
			var urlBase =
				window.location.origin + dominio + '/controller/controlleravaluo.php';
			$('#spinner').removeClass('ocultar');
			let response = await fetch(urlBase, {
				method: 'POST',
				body: formdata,
			});
			let result = await response.json();
			$('#spinner').addClass('ocultar');
			if (result.estado) {
				ActualizarReportesFotograficoAnexo(result.data);
				showMessage('success', result.mensaje, false, false);
			} else showMessage('error', result.mensaje, false, false);
		} catch (error) {
			$('#spinner').addClass('ocultar');
			showMessage('error', error, false);
		}
	}

	let files2 = [];
	$(document).on('change', '#RFAImg', function (event) {
		if ($('#TituloRFA').val() == '') {
			showMessage('error', 'Debe ingresar un título de imágenes', false, false);
			document.getElementById('RFAImg').value = '';
		} else {
			for (let i = 0; i < event.target.files.length; i++) {
				let id = files2.length + 1;
				let obj = {
					id: id,
					file: event.target.files[i],
					titulo: $('#TituloRFA').val(),
				};
				files2.push(obj);
			}

			let s = '';
			for (let i = 0; i < files2.length; i++) {
				let obj = files2[i];
				let url = URL.createObjectURL(obj.file);
				s += '<div class="col-12 col-sm-4 mt-5">';
				s += '<div class="card" style="width: 18rem;">';
				s +=
					'<img style="cursor: pointer" data-toggle="MostarModalPreview" width="300" height="300" class="card-img-top" src="' +
					url +
					'" alt="Card image cap">';
				s += '<div class="card-body">';
				s += '<h5 class="card-title">' + obj.titulo + '</h5>';
				s +=
					'<a data-id=' +
					obj.id +
					' data-toggle="EliminarReporteFotograficoAnexos" style="cursor: pointer" class="btn btn-primary">Eliminar</a>';
				s += '</div>';
				s += '</div>';
				s += '</div>';
			}

			$('#rfaSalida').html(s);
			document.getElementById('RFAImg').value = '';
			$('#TituloRFA').val('');
		}
	});

	$(document).on(
		'click',
		'[data-toggle="EliminarReporteFotograficoAnexos"]',
		function () {
			var $this = $(this);
			var id = $this.attr('data-id');
			swal({
				title: '¿Esta Seguro?',
				text: '¡Eliminar Imagen Seleccionada!',
				icon: 'warning',
				buttons: true,
				dangerMode: true,
				closeOnClickOutside: false,
				closeOnEsc: false,
			}).then((willDelete) => {
				if (willDelete) {
					EliminarReporteFotograficoAnexos(id);
				}
			});
		}
	);

	function EliminarReporteFotograficoAnexos(id) {
		let aux = [];
		let i = 1;
		let s = '';
		$.each(files2, function (ind, item) {
			if (item.id != id) {
				item.id = i++;
				aux.push(item);
				let url = URL.createObjectURL(item.file);
				s += '<div class="col-12 col-sm-4 mt-5">';
				s += '<div class="card" style="width: 18rem;">';
				s +=
					'<img style="cursor: pointer" data-toggle="MostarModalPreview" width="300" height="300" class="card-img-top" src="' +
					url +
					'" alt="Card image cap">';
				s += '<div class="card-body">';
				s += '<h5 class="card-title">' + item.titulo + '</h5>';
				s +=
					'<a data-id=' +
					item.id +
					' data-toggle="EliminarReporteFotograficoAnexos" style="cursor: pointer" class="btn btn-primary">Eliminar</a>';
				s += '</div>';
				s += '</div>';
				s += '</div>';
			}
		});

		files2 = aux;
		$('#rfaSalida').html(s);
	}

	$(document).on('click', '#AddEA', function (event) {
		$('#ModalAddEA').modal('show');
	});

	$(document).on('click', '#AddEATable', function (event) {
		let RECINTO = $('#RECINTO').val();
		let ACABADOSPISOS = $('#ACABADOSPISOS').val();
		let ACABADOSMUROS = $('#ACABADOSMUROS').val();

		if ((RECINTO == '') & (ACABADOSPISOS == '') && ACABADOSMUROS == '') return;

		let lista = JSON.parse($('#jsonEA').val());
		if (lista == undefined || lista == null) lista = [];
		let obj = {
			id: lista.length + 1,
			recinto: RECINTO,
			AcabadosPisos: ACABADOSPISOS,
			AcabadosMuros: ACABADOSMUROS,
		};
		lista.push(obj);
		$('#jsonEA').val(JSON.stringify(lista));
		document.getElementById('tablaEA').innerHTML = '';
		let ex =
			"<td class='text-center eliminar'><a data-id='@id' data-toggle='EliminarFilaTablaEA'><i class='bi bi-trash'></i></a></td>";
		let row = '';
		$.each(lista, function (ind, item) {
			let e = ex.replace('@id', item.id);
			row += '<tr><td class="text-center">' + item.recinto + '</td>';
			row += '<td class="text-center">' + item.AcabadosPisos + '</td>';
			row += '<td class="text-center">' + item.AcabadosMuros + '</td>';
			row += e + '</tr>';
		});
		document.getElementById('tablaEA').innerHTML = row;
		$('#RECINTO').val('');
		$('#ACABADOSPISOS').val('');
		$('#ACABADOSMUROS').val('');
		$('#ModalAddEA').modal('hide');
	});

	$(document).on('click', '[data-toggle="EliminarFilaTablaEA"]', function () {
		var $this = $(this);
		var id = $this.attr('data-id');
		swal({
			title: '¿Esta Seguro?',
			text: '¡Eliminar Fila Seleccionada!',
			icon: 'warning',
			buttons: true,
			dangerMode: true,
			closeOnClickOutside: false,
			closeOnEsc: false,
		}).then((willDelete) => {
			if (willDelete) {
				EliminarFilaTablaEA(id);
			}
		});
	});

	function EliminarFilaTablaEA(id) {
		let lista = JSON.parse($('#jsonEA').val());
		if (lista == undefined || lista == null) lista = [];
		let aux = [];
		let i = 1;
		$.each(lista, function (ind, item) {
			if (item.id != id) {
				item.id = i++;
				aux.push(item);
			}
		});
		$('#jsonEA').val(JSON.stringify(aux));
		let ex =
			"<td class='text-center eliminar'><a data-id='@id' data-toggle='EliminarFilaTablaEA'><i class='bi bi-trash'></i></a></td>";
		let row = '';
		$.each(aux, function (ind, item) {
			let e = ex.replace('@id', item.id);
			row += '<tr><td class="text-center">' + item.recinto + '</td>';
			row += '<td class="text-center">' + item.AcabadosPisos + '</td>';
			row += '<td class="text-center">' + item.AcabadosMuros + '</td>';
			row += e + '</tr>';
		});
		document.getElementById('tablaEA').innerHTML = row;
	}

	$(document).ready(function () {
		if (window.location.origin == undefined) {
			window.location.origin =
				window.location.protocol +
				'//' +
				window.location.hostname +
				(window.location.port ? ':' + window.location.port : '');
		}
	});

	$(document).on('keypress', '[data-toggle="cambio"]', function (e) {
		var $this = $(this);
		var key = e.which;
		var value = $this.val();
		var sw =
			(key == 44 && value.indexOf(',') != -1) ||
			(value == '' && key == 44) ||
			((key < 48 || key > 57) &&
				key != 44 &&
				!(e.which == 0 && e.keyCode == 46) &&
				!(e.which == 8 && e.keyCode == 8) &&
				!(e.which == 0 && e.keyCode == 37) &&
				!(e.which == 0 && e.keyCode == 39));
		if (sw) e.preventDefault();
	});

	$(document).on('change', '[data-toggle="cambio"]', function () {
		var $this = $(this);
		var value = normalizarcantidad($this.val());
		var v = formatMoney(parseFloat(value), 2, ',', '.');
		if (v == '0,00') v = '';
		$this.val(v);
		let id = '#' + $this.attr('id') + 'T';
		if ($(id).val() != undefined) $(id).val(v);
	});

	function formatMoney(n, c, d, t) {
		c = isNaN((c = Math.abs(c))) ? 2 : c;
		d = d == undefined ? ',' : d;
		t = t == undefined ? '.' : t;
		var s = n < 0 ? '-' : '';
		var i = String(parseInt((n = Math.abs(Number(n) || 0).toFixed(c))));
		var j = (j = i.length) > 3 ? j % 3 : 0;
		return (
			s +
			(j ? i.slice(0, j) + t : '') +
			i.slice(j).replace(/(\d{3})(?=\d)/g, '$1' + t) +
			(c
				? d +
				  Math.abs(n - i)
						.toFixed(c)
						.slice(2)
				: '')
		);
	}

	function normalizarcantidad(value) {
		if (value == '') return '0';
		value = value.replace(/\./g, '');
		return value.replace(',', '.');
	}

	$(document).on('change', '#CVTArea', function () {
		var $this = $(this);
		$('#CVTAreaT').val($this.val());
	});
	$(document).on('change', '#CVEArea', function () {
		var $this = $(this);
		$('#CVEAreaT').val($this.val());
	});
})(document, window, jQuery);
