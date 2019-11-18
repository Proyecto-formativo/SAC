$(document).ready(function () {
  $("#example").DataTable({
    //Para cambiar el lenguaje a español
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

  //Boton eliminar Sugerencia
  $(".eliminarSugerencia").click(function () {
    
    $("#eliminarSugerenciaModal").modal("show");

    $tr = $(this).closest("tr");

    let datos = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(datos);

    $("#codigo_sugerencia").val(datos[0]);

  })
});
