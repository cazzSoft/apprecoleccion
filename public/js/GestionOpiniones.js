
function mostrar_Usuario(idopiniones){
    $.get("bandejaOpiniones/"+idopiniones+"/edit", function (data) {
      
        
        $('#nombre').val(data.usuario_idusuario);
       });

    $('#ventanaModalUsuario').modal('show');
    
}

