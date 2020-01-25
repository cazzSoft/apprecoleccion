// ============================= GESTION  RUTAS =================================

// GESTION RUTA
//EDITAR LOS REGISTROS...
function ruta_editar(idruta){
    $.get("ruta/"+idruta+"/edit", function (data) {
        $('#nombre_ruta').val(data.nombre_ruta);
        $('#descripcion').val(data.descripcion);
    });

    $('#method_rutas').val('PUT');
//El window.location es un objeto se puede utilizar para obtener la dirección de la página actual (URL) y redirigir el navegador a una nueva página.
//window.location.protocol devuelve el protocolo web utilizado
    $('#frm_rutas').prop('action',window.location.protocol+'//'+window.location.host+'/ruta/'+idruta);
    $('#btn_rutaCancelar').removeClass('hidden');

    $('html,body').animate({scrollTop:$('#RegistroRutas').offset().top},400);
}

//Botón  Cancelar: limpia los input y se desaparece

$('#btn_rutaCancelar').click(function(){
    $('#nombre_ruta').val('');
    $('#descripcion').val('');
    $('#method_rutas').val('POST');
    $('#frm_rutas').prop('action',window.location.protocol+'//'+window.location.host+'/ruta');
    $(this).addClass('hidden');
});

function btn_eliminar(btn){
    if(confirm('¿Quiere eliminar el registro?')){
        $(btn).parent('.frm_eliminar').submit();
    }
}

//GESTION PUNTO RUTA
$("#btn_puntoRutaCancelar").click(function () {

    // limpiamos los datos de los seleccionados
    $('.Seleccionar_ruta').attr("selected", false);
    $('#Seleccionar_ruta_chosen').children('a').children('span').html('Seleccione una ruta...');
    $("#sectores").html("Ninguna ruta seleccionada");

});
//funcion para enviar los datos seleccionados en el select  al cuadro (flip-card)
 function ShowSelected(){
    var combo = document.getElementById("Seleccionar_ruta");
    var selected = combo.options[combo.selectedIndex].text;
    $('#sectores').html(selected);
 }


//Controles de los map
function initMaps(){
    initMap1();
    initMap2();
}

var poly;
var map;
var markers =[];
function initMap1() {
     markers.length=0;
     map = new google.maps.Map(document.getElementById('map1'), {
           zoom: 14,
           center: {lat: -0.698418, lng: -80.094792}  // Center the map on Chicago, USA.
     });

    poly = new google.maps.Polyline({
           strokeColor: '#E50DC1',
           strokeOpacity: 1.9,
           strokeWeight: 2
    });
     poly.setMap(map);
     map.addListener('click', addLatLng);

}

    // Handles click events on a map, and adds a new point to the Polyline.
  function addLatLng(event) {
    var path = poly.getPath();
    path.push(event.latLng);
    // console.log(event.latLng);
    var marker = new google.maps.Marker({
         position: event.latLng,
         title: '#' + path.getLength(),
         map: map
    });
    var arr={lat:event.latLng.lat(),lng:event.latLng.lng()};
    markers.push(arr);
    }

 function initMap2() {
      var map = new google.maps.Map(document.getElementById('map2'), {
                zoom: 15,
                center: {lat: -0.698418, lng: -80.094792},
                 // mapTypeId: google.maps.MapTypeId.ROADMAP,
              });
            $.get("obtenerPunto/"+$("#Seleccionar_ruta1").val(), function (data) {
              //console.log(data);
                var flightPath = new google.maps.Polyline({
                  path: data,
                  editable: true,
                  geodesic: true,
                  strokeColor: '#FF0000',
                  strokeOpacity: 7.0,
                  strokeWeight: 5,
                  map:map,
                });

                 map.addListener('click', addLatLng);
            });
 }