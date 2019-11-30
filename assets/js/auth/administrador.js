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

  //Plugin Data Table Administrador
  $("#administradores").DataTable({
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

  $(".eliminarAdministrador").prop('disabled', true);

  //Boton Eliminar Administrador
  /*$("#administradores").on("click", ".eliminarAdministrador", function () {

    $("#eliminarAdministradorModal").modal("show");

    $tr = $(this).closest("tr");

    let datos = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(datos);

    $("#documento_administrador").val(datos[0]);

  });*/

  //Plugin Data Table Coordinador
  $("#coordinadores").DataTable({
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

  //Boton Eliminar Coordinador
  $("#coordinadores").on("click", ".eliminarCoordinador", function () {

    $("#eliminarCoordinadorModal").modal("show");

    $tr = $(this).closest("tr");

    let datos = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(datos);

    $("#documento_coordinador").val(datos[0]);

  });

  //Plugin Data Tables Instructor
  $("#instructores").DataTable({
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

  //Boton Eliminar Instructor
  $("#instructores").on("click", ".eliminarInstructor", function () {

    $("#eliminarInstructorModal").modal("show");

    $tr = $(this).closest("tr");

    let datos = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(datos);

    $("#documento_instructor").val(datos[0]);

  });

  //Plugin Data Tables Bienestar
  $("#bienestar").DataTable({
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

  //Boton Eliminar Bienestar
  $("#bienestar").on("click", ".eliminarBienestar", function () {

    $("#eliminarBienestarModal").modal("show");

    $tr = $(this).closest("tr");

    let datos = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(datos);

    $("#documento_bienestar").val(datos[0]);

  });

  //Plugin Data Tables Aprendiz
  $("#aprendices").DataTable({
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

  //Boton Eliminar Aprendiz
  $("#aprendices").on("click", ".eliminarAprendiz", function () {

    $("#eliminarAprendizModal").modal("show");

    $tr = $(this).closest("tr");

    let datos = $tr
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    console.log(datos);

    $("#documento_aprendiz").val(datos[0]);

  });

  //Boton denegar Acceso a la plataforma
  $("#denegar").click(function () {
    var documento = $("#docid").val();
    console.log(documento);
    $("#denegarAccesoModal").modal("show");
    $("#documento_usuario").val(documento);
  });

  //=============================================================================================================

  //Plugin Select 2
  $('.select_fichas').select2();

  //Data tables para ventana modal instructores detalle
  $("#instructor_detalle").DataTable({
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

  //Buscar Instructores y añadir valores a sus respectivos inputs
  $("#inst_detalle").on("click", ".addInstructor", function () {

    instructor = $(this).val();
    datosinstructor = instructor.split("*");
    $("#docid_instructor").val(datosinstructor[0]);
    $("#campo_instructor").val(datosinstructor[1]);

    equipoinstructor = datosinstructor[0] + "*" + datosinstructor[1] + "*" + $("#nroficha").val() + "*" + $("#estado_instructor").val() + "*" + $("#estado_instructor option:selected").text();
    $("#addInstructorDetalle").val(equipoinstructor);
    $("#inst_detalle").modal("hide");

  });

  //Inicializar vector, ir cuando el documento que se ingresa y verificar si esta repetido
  let documento_repetido = [];
  let sw = 0;
  //Agregar instructores en la lista desplegable
  $("#addInstructorDetalle").on("click", function () {
    dato = $(this).val();

    if (dato != "") {

      infoinstructor = dato.split("*");


      //La primera vez que se carga la pagina se agregara a la tabla la información
      if (sw == 0) {
        //Cada documento ingresado se agrega a un vector
        documento_repetido.push(infoinstructor[0]);

        html = "<tr>";
        html += "<td><input type='hidden' name='documento[]' value=" + infoinstructor[0] + ">" + infoinstructor[0] + "</td>";
        html += "<td>" + infoinstructor[1] + "</td>";
        html += "<td><input type='hidden' name='ficha[]' value=" + infoinstructor[2] + ">" + infoinstructor[2] + "</td>";
        html += "<td><input type='hidden' name='estado[]' value=" + infoinstructor[3] + ">" + infoinstructor[4] + "</td>";
        html += '<td><button type="button" class="btn btn-danger remover">Remover</button></td>';
        html += "</tr>";
        $("#equipoinstructores tbody").append(html);

        $("#nroficha").prop("disabled", true);
        $("#agregarEI").prop("disabled", false);

        sw = 1;

      } else {

        doc_existe = false;

        for (let j = 0; j < documento_repetido.length; j++) {

          //Si el documento existe en el arreglo se devolvera un valor booleano
          if (documento_repetido[j] == infoinstructor[0]) {
            doc_existe = true;
          }

        }

        if (doc_existe != true) {

          documento_repetido.push(infoinstructor[0]);

          html = "<tr>";
          html += "<td><input type='hidden' name='documento[]' value=" + infoinstructor[0] + ">" + infoinstructor[0] + "</td>";
          html += "<td>" + infoinstructor[1] + "</td>";
          html += "<td><input type='hidden' name='ficha[]' value=" + infoinstructor[2] + ">" + infoinstructor[2] + "</td>";
          html += "<td><input type='hidden' name='estado[]' value=" + infoinstructor[3] + ">" + infoinstructor[4] + "</td>";
          html += '<td><button type="button" class="btn btn-danger remover">Remover</button></td>';
          html += "</tr>";

          $("#equipoinstructores tbody").append(html);

        } else {
          const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })

          Toast.fire({
            icon: 'error',
            title: 'El instructor ya esta en la tabla'
          })
        }

        console.log(documento_repetido);
      }

      //console.log(infoinstructor);

      //console.log(documento_repetido);

    } else {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        onOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })

      Toast.fire({
        icon: 'error',
        title: 'Seleccione un instructor por favor'
      })
    }
  });

  //Boton remover instructor de la tabla
  $(document).on("click", ".remover", function () {

    nuevo_doc = $(this).closest("tr");

    let verificar = nuevo_doc
      .children("td")
      .map(function () {
        return $(this).text();
      })
      .get();

    for (let index = 0; index < documento_repetido.length; index++) {

      if (verificar[0] == documento_repetido[index]) {
        posicion = index;
      }
    }

    documento_repetido.splice(posicion, 1);

    if (documento_repetido.length == 0) {
      $("#agregarEI").prop("disabled", true);
      sw = 0;
    }

    $(this).closest("tr").remove();

  });

  // Fin del Document Ready()
});

