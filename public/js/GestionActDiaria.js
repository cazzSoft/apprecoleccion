// ============================= GESTION DE LA ACTIVIDAD DIARIA DE LOS RECOLECTORES =================================
 

//EDITAR LOS REGISTROS
function actDiaria_editar(idactividad_diaria){
    $.get("actividad_diaria/"+idactividad_diaria+"/edit", function (data) {
        //RUTA
        $('.Seleccionar_ruta').attr("selected", false);
        $(`#Seleccionar_ruta option[value="${data.ruta_idruta}"]`).attr("selected", true);
        $('#Seleccionar_ruta_chosen').children('a').children('span').html($(`#Seleccionar_ruta option[value="${data.ruta_idruta}"]`).html());
        //DIAS DE LA SEMANA pasar a checkbox

        //HORARIO
        $('#hora_inicio').val(data.hora_inicio);
        $('#hora_fin').val(data.hora_fin);
        //RECOLECTOR 
        $('.Seleccionar_recolector').attr("selected", false);
        $(`#Seleccionar_recolector option[value="${data.recolector_idrecolector}"]`).attr("selected", true);
        $('#Seleccionar_recolector_chosen').children('a').children('span').html($(`#Seleccionar_recolector option[value="${data.recolector_idrecolector}"]`).html());
        //CHOFER
        $('.Seleccionar_chofer').attr("selected", false);
        $(`#Seleccionar_chofer option[value="${data.persona_idpersona}"]`).attr("selected", true);
        $('#Seleccionar_chofer_chosen').children('a').children('span').html($(`#Seleccionar_chofer option[value="${data.persona_idpersona}"]`).html());


     
    });
    
    $('#method_ActDiaria').val('PUT'); 
    $('#frm_ActDiaria').prop('action',window.location.protocol+'//'+window.location.host+'/actividad_diaria/'+idactividad_diaria);
    $('#btn_ActDiariaCancelar').removeClass('hidden');
    
 
}

//Botón  Cancelar: limpia los input y se desaparece

$('#btn_ActDiariaCancelar').click(function(){
 
    $('.Seleccionar_ruta').attr("selected", false);
    $('#Seleccionar_ruta_chosen').children('a').children('span').html('Seleccione una ruta');
    //limpiar los checkbox
    $('#lunes').val('');
    $('#martes').val('');
    $('#miercoles').val('');
    $('#jueves').val('');
    $('#viernes').val('');
    $('#sabado').val('');
    $('#domingo').val('');

    $('#hora_inicio').val('');
    $('#hora_fin').val('');

    $('.Seleccionar_recolector').attr("selected", false);
    $('#Seleccionar_recolector_chosen').children('a').children('span').html('Seleccione una recolector');

    $('.Seleccionar_chofer').attr("selected", false);
    $('#Seleccionar_chofer_chosen').children('a').children('span').html('Seleccione una chofer');
   
    $('#method_ActDiaria').val('POST'); 
    $('#frm_ActDiaria').prop('action',window.location.protocol+'//'+window.location.host+'/actividad_diaria/');
    $(this).addClass('hidden');
});

//metodo para eliminar 
function btn_eliminar(btn){
    if(confirm('¿Está seguro de eliminar el registro?')){
        $(btn).parent('.frm_eliminar').submit();
    }
}
