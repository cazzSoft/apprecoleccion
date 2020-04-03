
function mostrar_Usuario(idusuario){

        $.get('datos_usuario/'+idusuario, function (data) {
        //console.log(data.nombre);
        $('#usuario').val(data.usuario);
        $('#nombre').val(data.nombre);
        $('#dni').val(data.cedula);
        $('#direccion').val(data.direccion);
        $('#celular').val(data.celular);
        $('#email').val(data.email);
        $('#ventanaModalUsuario').modal('show');
        });
}


