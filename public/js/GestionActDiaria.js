// ============================= GESTION DE LA ACTIVIDAD DIARIA DE LOS RECOLECTORES =================================
 

//EDITAR LOS REGISTROS
function actDiaria_editar(idactividad_diaria){
    $.get("actividad_diaria/"+idactividad_diaria+"/edit", function (data) {
        $('#Seleccionar_ruta').val(data.ruta_idruta);
        $('#dia').val(data.dia);
        $('#hora_inicio').val(data.hora_inicio);
        $('#hora_fin').val(data.hora_fin);
        $('#Seleccionar_recolector').val(data.recolector_idrecolector);
        $('#Seleccionar_chofer').val(data.persona_idpersona);


        //  $('.Seleccionar_ruta').attr("selected", false); // quitamos el selected a los seleccionados anteriormente
        //  $(`#Seleccionar_ruta option[value="${data.ruta_idruta}"]`).attr("selected", true);
        //  $('#Seleccionar_ruta_chosen').children('a').children('span').html($(`#Seleccionar_ruta option[value="${data.ruta_idruta}"]`).html());

        
     
    });
    
    $('#method_ActDiaria').val('PUT'); 
    $('#frm_ActDiaria').prop('action',window.location.protocol+'//'+window.location.host+'/actividad_diaria/'+idactividad_diaria);
    $('#btn_ActDiariaCancelar').removeClass('hidden');
    
 
}


//Botón  Cancelar: limpia los input y se desaparece

$('#btn_ActDiariaCancelar').click(function(){
    $('#Seleccionar_ruta').val('');
    $('#dia').val('');
    $('#hora_inicio').val('');
    $('#hora_fin').val('');
    $('#Seleccionar_recolector').val('');
    $('#Seleccionar_chofer').val('');
  
    $('#method_ActDiaria').val('POST'); 
    $('#frm_ActDiaria').prop('action',window.location.protocol+'//'+window.location.host+'/actividad_diaria/');
    $(this).addClass('hidden');
});


function btn_eliminar(btn){
    if(confirm('¿Está seguro de eliminar el registro?')){
        $(btn).parent('.frm_eliminar').submit();
    }
}