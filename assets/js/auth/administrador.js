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
  $("#sugerencia").on("click", ".eliminarSugerencia", function () {
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
  $("#recomendacion").on("click", ".eliminarRecomendacion", function () {
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
  $("#municipio").on("click", ".eliminarMunicipio", function () {
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
  //Fin Opciones Municipio

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
  $("#etapasformacion").on("click", ".eliminarEtapaFormacion", function () {
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

  //Plugin Data Table Etapas Proyecto
  $("#etapasproyecto").DataTable({
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

  //Boton Eliminar Etapa Proyecto
  $("#etapasproyecto").on("click", ".eliminarEtapaProyecto", function () {
    $("#eliminarEtapaProyectoModal").modal("show");

    $tr = $(this).closest("tr");

    let datos = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(datos);

    $("#codigo_etapaproyecto").val(datos[0]);

  });

  //Plugin Data Table Estado Instructor
  $("#estadoinstructor").DataTable({
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

  //Boton Eliminar Estado Instructor
  $("#estadoinstructor").on("click", ".eliminarEstadoInstructor", function () {

    $("#eliminarEstadoInstructorModal").modal("show");

    $tr = $(this).closest("tr");

    let datos = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(datos);

    $("#codigo_estadoinstructor").val(datos[0]);

  });

  //Plugin Data Table Estado Aprendiz
  $("#estadoaprendiz").DataTable({
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

  //Boton Eliminar Estado Aprendiz
  $("#estadoaprendiz").on("click", ".eliminarEstadoAprendiz", function () {

    $("#eliminarEstadoAprendizModal").modal("show");

    $tr = $(this).closest("tr");

    let datos = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(datos);

    $("#codigo_estadoaprendiz").val(datos[0]);

  });

  //Plugin Data Table Centros
  $("#centro").DataTable({
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

  //Boton Eliminar Centros
  $("#centro").on("click", ".eliminarCentro", function () {

    $("#eliminarCentroModal").modal("show");

    $tr = $(this).closest("tr");

    let datos = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(datos);

    $("#codigo_centro").val(datos[0]);

  });

  //Plugin Data Table Sedes
  $("#sede").DataTable({
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

  //Boton Eliminar Sedes
  $("#sede").on("click", ".eliminarSede", function () {

    $("#eliminarSedeModal").modal("show");

    $tr = $(this).closest("tr");

    let datos = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(datos);

    $("#codigo_sede").val(datos[0]);

  });

  //Plugin Datatable Nivel
  $("#nivel").DataTable({
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

  //Boton Eliminar Nivel
  $("#nivel").on("click", ".eliminarNivel", function () {

    $("#eliminarNivelModal").modal("show");

    $tr = $(this).closest("tr");

    let datos = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(datos);

    $("#codigo_nivel").val(datos[0]);

  });

  //Plugin Data Table Area
  $("#area").DataTable({
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

  //Boton Eliminar Area
  $("#area").on("click", ".eliminarArea", function () {

    $("#eliminarAreaModal").modal("show");

    $tr = $(this).closest("tr");

    let datos = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(datos);

    $("#codigo_area").val(datos[0]);

  });

  //Plugin Data Table Programa
  $("#programa").DataTable({
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

  //Boton Eliminar Programa
  $("#programa").on("click", ".eliminarPrograma", function () {

    $("#eliminarProgramaModal").modal("show");

    $tr = $(this).closest("tr");

    let datos = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(datos);

    $("#codigo_programa").val(datos[0]);

  });

  //Plugin Data Table Ficha
  $("#ficha").DataTable({
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

  //Boton Eliminar Ficha
  $("#ficha").on("click", ".eliminarFicha", function () {

    $("#eliminarFichaModal").modal("show");

    $tr = $(this).closest("tr");

    let datos = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(datos);

    $("#codigo_ficha").val(datos[0]);

  });

  // Fin del Document Ready()
});
