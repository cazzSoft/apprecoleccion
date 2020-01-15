  // var poly;
  // var map;
  // var markers =[];
  //    function initMap() {
  //      markers.length=0;
  //      map = new google.maps.Map(document.getElementById('map'), {
  //        zoom: 14,
  //        center: {lat: -0.698418, lng: -80.094792}  // Center the map on Chicago, USA.
  //      });

  //      poly = new google.maps.Polyline({
  //        strokeColor: '#E50DC1',
  //        strokeOpacity: 1.9,
  //        strokeWeight: 2
  //      });
  //      poly.setMap(map);
  //      // Add a listener for the click event
  //      map.addListener('click', addLatLng);
  //    }

  //    // Handles click events on a map, and adds a new point to the Polyline.
  //    function addLatLng(event) {
  //      var path = poly.getPath();
  //      path.push(event.latLng);
  //      console.log(event.latLng);
  //      var marker = new google.maps.Marker({
  //        position: event.latLng,
  //        title: '#' + path.getLength(),
  //        map: map
  //      });
  //      var arr={lat:event.latLng.lat(),lng:event.latLng.lng()};
  //       //markers.push(event.latLng.lat(),event.latLng.lng());
  //       markers.push(arr);
  //       console.log(markers);

  //       //agregas tu listener
  //           marker.addListener('click', function() {

  //             //poly.setVisible(false)
  //           });
  // }

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
              markers.length=0;
              // $('.alerta').attr('class','alert alert-'+requestData.estado+' alert-dismissible fade in  alerta');
              // $('#msm').html('<strongr>nfotmación </stronge>  '+requestData.msm);
              // window.setInterval("$('.alerta').attr('class','fade in hide  alerta text-center')",7000);
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

             }
        });

    });



