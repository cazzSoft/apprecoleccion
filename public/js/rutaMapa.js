
$("#frm_PuntoRuta").on("submit", function(e){
     e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var FrmData = {
            idruta: $('#Seleccionar_ruta').val(),
            puntos:markers,
        }
        $.ajax({
            url:'puntoRuta', // Url que se envia para la solicitud
            method: 'POST',             // Tipo de solicitud que se enviará, llamado como método
            data: FrmData,               // Datos enviados al servidor, un conjunto de pares clave / valor (es decir, campos de formulario y valores)
            dataType: 'json',
            success: function(requestData)   // Una función a ser llamada si la solicitud tiene éxito
            {
              apdateSelectRuta();
              initMap1();
              $('#sectores').html("");
              $('#alerta1').html(
                 ` <div class=" fade in  alerta  alert alert-${requestData.estado}" role="alert">
                      <i class="fa fa-info-circle"></i>  <b>${requestData.msm}</b>
                      <button type="button" class="close " data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" >&times;</span>
                      </button>
                    </div>`
               );
              $("#sectores").html("");$("#sectores1").html("");
              $('.opcion_sectores').prop('selected',false);
              $("#Seleccionar_ruta").trigger("chosen:updated");
             }
        });

    });
//funcion para refrescar select ruta
  function apdateSelectRuta() {
    $.get("obtenerRuta/", function (data) {
      console.log(data);
      $('.opcion_sectores').prop('selected',false);
      $('.opcion_sectores1').prop('selected',false);
      $("#Seleccionar_ruta").html(` <option value=""></option>`);
      $("#Seleccionar_ruta1").html(" <option value=''></option>");

        $.each(data, function(i, item) {
          //console.log(item.estado_grafica);
           if(item.estado_grafica=='NO'){
              $('#Seleccionar_ruta').append(
                  ` <optgroup label="${item.nombre_ruta}">
                      <option class="opcion_sectores" value="${item.idruta}">${item.descripcion}
                      </option>
                  </optgroup>`
              );
           }
           if(item.estado_grafica=='SI'){
              $('#Seleccionar_ruta1').append(
                  ` <optgroup label="${item.nombre_ruta}">
                      <option class="opcion_sectores" value="${item.idruta}">${item.descripcion}
                      </option>
                  </optgroup>`
              );
           }
        });

        $("#Seleccionar_ruta").trigger("chosen:updated");
        $("#Seleccionar_ruta1").trigger("chosen:updated");

    });
  }



