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
       <td><button class="btn btn-danger eliminarCompromisos" id="${Number(i)}">Eliminar</button></td>
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
   * ****este evento elimina los compromisos
   * 
   */
  $("#tableCompromisos ").on("click",".eliminarCompromisos",function (e) {
    e.preventDefault();
    let id = this.getAttribute("id"),
        dato = "";

    /**
     * con la funcion splice de indicamos en la primera pocicion el indice de que elemento se va a elimiar
     * el segundo parametro es para decirle cuantos elementos vamos a eliminar
     */
    listCompromisos.splice(id,1);
    
    /**
     * si la cantidad de elementos que tenemos en el array es mayor a 0 entonces me los va alistar en la tabla y agregar
     *  en el id #lisaompromisos y si no es mayor a 0 es por que no hay elemntos le indicamos a este objeto que se remueva
     * this.parentElement.parentElement.remove();
     */
    if (listCompromisos.length > 0) {
      for (let i = 0; i < listCompromisos.length; i++) {
        dato += `
        <tr>
        <td>${Number(i + 1)}</td>
        <td>${listCompromisos[i][0]}</td>
        <td>${listCompromisos[i][1]}</td>
        <td>${listCompromisos[i][2]}</td>
        <td><button class="btn btn-danger eliminarCompromisos" id="${Number(i)}">Eliminar</button></td>
        </tr>
        `;
        $("#listar-compromisos-tabla").html(dato);
      }
      console.log(listCompromisos);
      let lista = JSON.stringify(listCompromisos);
      
      $("#listaCompromisos").val(lista);
    }else{
      this.parentElement.parentElement.remove();
      $("#enviarActa").attr("disabled", "");
    }
  });


  $('#generarpdf').click(function() {
		// var options = {
    //   // 'width': 800, 
    //   // 'height': 500,
    //   pegesplit:true,

    // };
    // l = { 
    //   orientation: 'p', 
    //   unit: 'mm', 
    //   format: 'a3', 
    //   compress: true, 
    //   fontSize: 11, 
    //   lineHeight: 1, 
    //   autoSize: false, 
    //   printHeaders: true 
    //  };
    // var pdf = new jsPDF(l, 'pt', 'letter');
    // pdf.internal.scaleFactor = 5;
    // pdf.page = 1;
		// //pdf.text("Reporte numero");
		// pdf.addHTML($("#pdf").get(0), 15, 15, options, function() {
    //   // pdf.addPage();
    //   // pdf.save('informe.pdf');
      
    //   var pageCount = pdf.internal.getNumberOfPages();
    //   for (i = 0; i < pageCount; i++) {
    //     pdf.setPage(i);
    //     pdf.text(10, 10, pdf.internal.getCurrentPageInfo().pageNumber + "/" + pageCount);
    //   };
    //   pdf.save('Informacion.pdf');
    // });

    // console.log($("#pdf").get(0));



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
        pdf.save(user + ".pdf");
    });
   
    
  });
  




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
    }

  });


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

});//fin de document ready

