$(document).ready(function () {
  //Puglin Data Table Sugerencia
  $("#sugerencia").DataTable({
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

  });

  // Fin Opciones Sugerencia

  //Puglin Data Table Recomendacion
  $("#recomendacion").DataTable({
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

  //Boton Eliminar Recomendacion
  $(".eliminarRecomendacion").click(function () {

    $("#eliminarRecomendacionModal").modal("show");

    $tr = $(this).closest("tr");

    let datos = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(datos);

    $("#codigo_recomendacion").val(datos[0]);

  });
  //Fin Opciones Recomendacion

  //Plugin Data Table Municipio
  $("#municipio").DataTable({
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

  //Boton Eliminar Municipio
  $(".eliminarMunicipio").click(function () {

    $("#eliminarMunicipioModal").modal("show");

    $tr = $(this).closest("tr");

    let datos = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(datos);

    $("#codigo_municipio").val(datos[0]);

  });
  //Fin Opciones Recomendacion

  //Plugin Data Table Etapas Formación
  $("#etapasformacion").DataTable({
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

  //Boton eliminar Etapa Formación
  $(".eliminarEtapaFormacion").click(function () {

    $("#eliminarEtapaFormacionModal").modal("show");

    $tr = $(this).closest("tr");

    let datos = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(datos);

    $("#codigo_etapaformacion").val(datos[0]);

  });

});
