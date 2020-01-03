$(document).ready(function () {
  $(".ficha").bind("change", function() {

    var ficha = $(".ficha").val();
    $.ajax({
      type: "post",
      url: "traerdatosficha",
      data: { numeroficha: ficha },
      success: function(respuesta) {
        $(".infoContent").html(respuesta);
      }
    }); //fin del ajax
  }); //fin de bind keyup

});

