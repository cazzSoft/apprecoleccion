
function ShowSelected1(){
    var combo = document.getElementById("Seleccionar_ruta1");
    var selected = combo.options[combo.selectedIndex].text;
    $('#sectores1').html(selected);
    var idruta=$('#Seleccionar_ruta1').val();
     initMap2();
}
//funcion para eliminar las puntos de la grafica de la ruta
$("#frm_Grafica").on("submit", function(e){
     e.preventDefault();
     var idruta= $('#Seleccionar_ruta1').val();
     var con=confirm('Estas seguro que desea eliminar la gráfica de esta ruta ?');
     if(con){
     	$.get("puntoRuta/"+idruta+'/edit', function (data) {

     		apdateSelectRuta();
     		initMap2();
              $("#sectores1").html("");$("#sectores").html("");
              $('.opcion_sectores1').prop('selected',false);
              $("#Seleccionar_ruta1").trigger("chosen:updated"); // actualizamos el combo


     	});
     }
 });
