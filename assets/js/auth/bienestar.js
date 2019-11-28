$(document).ready(function() {
  /**
   * la lisa de los compromisos
   */
  var listCompromisos = [];
  /**
   * el data table
   */
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

  

  /**
   * 
   * filtro de municipio hace una peticion al servidor para preguntar los centros y sedes del municipio
   *  que se haya seleccionada
   */
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



  /***
   * 
   * se selectiona todos los btn de descargos para asignarle un evento a cada uno
   * 
   * 
   */
  var elementos = document.getElementsByClassName("descargos");

  for (let index = 0; index < elementos.length; index++) {
    elementos[index].addEventListener("click",(e)=>{
      e.preventDefault();
      //idvalordescargos = $(".descargos").attr("idvalor");
      //$("#descargos").modal("show");
      $("#descargos").modal({
        backdrop:"static"
      });

      
      

      elementos[index].setAttribute("disabled", "");
      
      let valor = elementos[index].parentElement.parentElement
      //valor.children[1].children[0].getAttribute("valor");

      $("#consecutivoAprendizReporte").val(valor.children[0].children[0].getAttribute("valor"));
      $("#consReporte").val(valor.children[1].children[0].getAttribute("valor"));
      
    });
  }


  /**
   * 
   * 
   * se valida los descargos de cada estudiante 
   * 
   * 
   * 
   */
  $("#agregarDescargos").click(function (e) { 
    e.preventDefault();

    if ($("#informeEquipoEjecutor").val() == "" || $("#descarosAprendiz").val() == "") {
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
          title: 'Todos los datos son requeridos'
      })
    }else{
      $("#descargos").modal("hide");
  
      let datos = {
        'consReporte' : $("#consReporte").val(),
        'consAprendizReporte': $("#consecutivoAprendizReporte").val(),
        'informeEquipoEjecutor': $("#informeEquipoEjecutor").val(),
        'descarosAprendiz':$("#descarosAprendiz").val(),
        'Recomendacion' : $("#Recomendacion").val(),
      };

      valores = JSON.stringify(datos,true);
      
      $.ajax({
        type: "post",
        url: "ingresoDescargosAprendiz",
        data: {valores:valores},
        success: function (respuesta) {
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
            icon: 'success',
            title: 'Descargos del aprendiz agregados correctamente'
          })
          
            
        },
        error: function (response) {
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
            title: 'ya existe ese registro en la base de datos'
          });//sweet alert
       }//fin funcion de error

      });//fin ajax
    }//fin el else
    $("#formularioDeDescargos")[0].reset();
  });//fin de agregar descargos





  /***
   * 
   * 
   * ente evento agrega los compromisos de la reunion 
   * 
   */
  $("#botton-list").bind("click", e => {
    e.preventDeFaut;
    if ($("#actividad_text").val() != "" && $("#responsable").val() != "" && $("#fecha-compromiso").val() != "" ) {
      
      var actividad_text = $("#actividad_text").val(),
      responsable = $("#responsable").val(),
      fecha = $("#fecha-compromiso").val(),
      array = [actividad_text, responsable, fecha],
      dato = "";

      listCompromisos.push(array);

     for (let i = 0; i < listCompromisos.length; i++) {
       dato += `
       <tr>
       <td>${Number(i + 1)}</td>
       <td>${listCompromisos[i][0]}</td>
       <td>${listCompromisos[i][1]}</td>
       <td>${listCompromisos[i][2]}</td>
       </tr>
       `;
       $("#listar-compromisos-tabla").html(dato);
     }
     console.log(listCompromisos);
     let lista = JSON.stringify(listCompromisos);
     
     $("#listaCompromisos").val(lista);
    
     $("#formularioDeCompromisos")[0].reset();

    }else{
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
        title: 'Todos los datos son requeridos'
      });//sweet alert
    }//fin else
  }); //fin de bind keyup

  /**
   * 
   * 
   * estod dos eventos es para validad los compromisos que no se genere el acta sin los compromisos
   * ya que es algo requerido
   *   
   * 
   *      |||||||||
   *      |||||||||
   *      |||||||||
   *      \       /
   *       \     /
   *        \   /
   *         \ /
   */

  $("#agregarCpompromisos").click(function (e) { 
    e.preventDefault();
    $("#compromisos").modal({
      backdrop:"static"
    });


  });

  $("#cerrarCompromisos").click(function (e) { 
    e.preventDefault();
    console.log(listCompromisos.length);
    
    if (listCompromisos.length > 0) {
      $("#enviarActa").removeAttr("disabled");
      $("#genrerar_pdf").removeAttr("disabled");
    }

  });
});//fin de document ready

