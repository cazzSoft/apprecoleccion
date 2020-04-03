// ============================= GESTION  VEHICULOS RECOLECTORES =================================

// GESTION VEHICULO
//EDITAR LOS REGISTROS...
function vehiculo_editar(idrecolector){
    $.get("vehiculo/"+idrecolector+"/edit", function (data) {
        $('#numero').val(data.numero);
        $('#placa').val(data.placa);
        $('#id').val(data.id);
        $('#tipo_vehiculo').val(data.tipo_vehiculo);
    });

    $('#method_vehiculos').val('PUT');
    $('#frm_vehiculos').prop('action',window.location.protocol+'//'+window.location.host+'/vehiculo/'+idrecolector);
    $('#btn_vehiculoCancelar').removeClass('hidden');


}


//Botón  Cancelar: limpia los input y se desaparece

$('#btn_vehiculoCancelar').click(function(){
    $('#numero').val('');
    $('#placa').val('');
    $('#id').val('');
    $('#tipo_vehiculo').val('');

    $('.tipo_vehiculo').attr("selected", false);
    $('#tipo_vehiculo_chosen').children('a').children('span').html('Seleccione un Tipo de Vehículo');

    $('#method_vehiculos').val('POST');
    $('#frm_vehiculos').prop('action',window.location.protocol+'//'+window.location.host+'/vehiculo/');
    $(this).addClass('hidden');
});


function btn_eliminar(btn){
    if(confirm('¿Está seguro de eliminar el registro?')){
        $(btn).parent('.frm_eliminar').submit();
    }
}




