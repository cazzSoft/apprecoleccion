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
    $("#nombre_ruta").html("No seleccionado");
    $("#sectores").html("No seleccionado");

});
//funcion para enviar los datos seleccionados en el select  al cuadro (flip-card)
 function ShowSelected(){

    var combo = document.getElementById("Seleccionar_ruta");
    var selected = combo.options[combo.selectedIndex].text; 

   
//datos seleccionados al label

    $('#sectores').html(selected);

 }
