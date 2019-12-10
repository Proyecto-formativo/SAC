

$(function() {
	$('#download').click(function() {
		let HTML_Width = $("#pdf").width();
		let HTML_Height = $("#pdf").height();
		let top_left_margin = 1;
		let PDF_Width = HTML_Width + (top_left_margin * 2);
		let PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
		let canvas_image_width = HTML_Width;
		let canvas_image_height = HTML_Height;
		let totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;
		let user = this.auth_user;
		html2canvas($("#pdf")[0], {allowTaint: true}).then(function (canvas) {
			canvas.getContext('2d');
			let imgData = canvas.toDataURL("image/jpeg", 1.0);
			let pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);

			pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);

			let counter = 0;

			for (let i = 1; i <= totalPDFPages; i++) {
				counter++;
				pdf.addPage(PDF_Width, PDF_Height);
				pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4), canvas_image_width, canvas_image_height);
			}
			pdf.save("reporte.pdf");
		});

	});
});

$(document).ready(function () {
	
  /* REPORTES */

  //Aprendices Citados a Comite por fecha
  var time = new Date();
  var date = time.getFullYear() + '/' + time.getMonth() + '/' + time.getDate() + '-' + time.getHours() + ':' + time.getMinutes();

  $('#reporte_excel').DataTable({
    dom: 'Bfrtip',
    buttons: [
      {
        extend: 'excel',
        text: 'Exportar a Excel',
        title: 'Aprendices_Citados_Fecha_' + date
      }
    ],

    "language": {
      "lengthMenu": "Mostrar _MENU_ registros",
      "zeroRecords": "No se encontraron resultados",
      "searchPlaceholder": "Buscar Registros",
      "info": "Mostrando Registros de _START_ al _END_ de un total de _TOTAL_ registros",
      "infoEmpty": "No existen registros",
      "infoFiltered": "(Filtrando un total de _MAX_ registros)",
      "search": "Buscar...",
      "paginate": {
        "first": "Primero",
        "last": "Ultimo",
        "next": "Siguiente",
        "previous": "Anterior"
      }
    }
  });

  //cantidad aprendices citados por centro
  $('#apr_centro').DataTable({
    dom: 'Bfrtip',
    buttons: [
      {
        extend: 'excel',
        text: 'Exportar a Excel',
        title: 'Cantidad_aprendices_centro_' + date
      }
    ],

    "language": {
      "lengthMenu": "Mostrar _MENU_ registros",
      "zeroRecords": "No se encontraron resultados",
      "searchPlaceholder": "Buscar Registros",
      "info": "Mostrando Registros de _START_ al _END_ de un total de _TOTAL_ registros",
      "infoEmpty": "No existen registros",
      "infoFiltered": "(Filtrando un total de _MAX_ registros)",
      "search": "Buscar...",
      "paginate": {
        "first": "Primero",
        "last": "Ultimo",
        "next": "Siguiente",
        "previous": "Anterior"
      }
    }
  });

  //Aprendices citados a comité
  $('#aprendices_citados').DataTable({
    dom: 'Bfrtip',
    buttons: [
      {
        extend: 'excel',
        text: 'Exportar a Excel',
        title: 'Aprendices_Citados_' + date
      }
    ],

    "language": {
      "lengthMenu": "Mostrar _MENU_ registros",
      "zeroRecords": "No se encontraron resultados",
      "searchPlaceholder": "Buscar Registros",
      "info": "Mostrando Registros de _START_ al _END_ de un total de _TOTAL_ registros",
      "infoEmpty": "No existen registros",
      "infoFiltered": "(Filtrando un total de _MAX_ registros)",
      "search": "Buscar...",
      "paginate": {
        "first": "Primero",
        "last": "Ultimo",
        "next": "Siguiente",
        "previous": "Anterior"
      }
    }
  });

  //Aprendices citados a comité por área
  $('#apr_area').DataTable({
    dom: 'Bfrtip',
    buttons: [
      {
        extend: 'excel',
        text: 'Exportar a Excel',
        title: 'Aprendices_Citados_Area' + date
      }
    ],

    "language": {
      "lengthMenu": "Mostrar _MENU_ registros",
      "zeroRecords": "No se encontraron resultados",
      "searchPlaceholder": "Buscar Registros",
      "info": "Mostrando Registros de _START_ al _END_ de un total de _TOTAL_ registros",
      "infoEmpty": "No existen registros",
      "infoFiltered": "(Filtrando un total de _MAX_ registros)",
      "search": "Buscar...",
      "paginate": {
        "first": "Primero",
        "last": "Ultimo",
        "next": "Siguiente",
        "previous": "Anterior"
      }
    }
  });

  //Cantidad de citaciones a comité por instructor
  $('#cant_instructor').DataTable({
    dom: 'Bfrtip',
    buttons: [
      {
        extend: 'excel',
        text: 'Exportar a Excel',
        title: 'Cantidad_Citaciones_Instructor' + date
      }
    ],

    "language": {
      "lengthMenu": "Mostrar _MENU_ registros",
      "zeroRecords": "No se encontraron resultados",
      "searchPlaceholder": "Buscar Registros",
      "info": "Mostrando Registros de _START_ al _END_ de un total de _TOTAL_ registros",
      "infoEmpty": "No existen registros",
      "infoFiltered": "(Filtrando un total de _MAX_ registros)",
      "search": "Buscar...",
      "paginate": {
        "first": "Primero",
        "last": "Ultimo",
        "next": "Siguiente",
        "previous": "Anterior"
      }
    }
  });

  /* ==========================================================================================================*/
  // Fin del Document Ready()
});






