// ============================= GESTION  CHOFERES DE LOS VEHICULOS RECOLECTORES =================================
 
// GESTION CHOFER
//EDITAR LOS REGISTROS...
function chofer_editar(idpersona){
    $.get("chofer/"+idpersona+"/edit", function (data) {
        $('#nombres').val(data.nombres);
        $('#dni').val(data.dni);
        $('#celular').val(data.celular);
     
    });
    
    $('#method_choferes').val('PUT'); 
    $('#frm_choferes').prop('action',window.location.protocol+'//'+window.location.host+'/chofer/'+idpersona);
    $('#btn_choferCancelar').removeClass('hidden');
    
 
}


//Botón  Cancelar: limpia los input y se desaparece

$('#btn_choferCancelar').click(function(){
    $('#nombres').val('');
    $('#dni').val('');
    $('#celular').val('');

  
    $('#method_choferes').val('POST'); 
    $('#frm_choferes').prop('action',window.location.protocol+'//'+window.location.host+'/chofer/');
    $(this).addClass('hidden');
});


function btn_eliminar(btn){
    if(confirm('¿Está seguro de eliminar el registro?')){
        $(btn).parent('.frm_eliminar').submit();
    }
}