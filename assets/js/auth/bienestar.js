$(document).ready(function() {
    $('#example').DataTable({
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
} );

$("#municipio").bind("change", function() {
  var municipio = $("#municipio").val();
  $.ajax({
    type: "post",
    url: "filtroMunicipio",
    data: { municipio: municipio },
    success: function(respuesta) {
      $(".infoCentroSede").html(respuesta);
    }
  }); //fin del ajax
}); //fin de bind keyup

$(".descargos").click(function (e) { 
  e.preventDefault();
  $("#descargos").modal("show");

  
  $tr = $(this).closest("tr");
  
  let datos = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(datos);

    
  let valor = $("#descargos");

  $("#consecutivoAprendizReporte").val(datos[0]);
  $("#consReporte").val(datos[1]);
});