
function mostrar_Usuario(idusuario){
    
        $.get('datos_usuario/'+idusuario, function (data) {
        //console.log(data.nombre);
        $('#usuario').val(data.usuario);
        $('#nombre').val(data.nombre);
        $('#dni').val('1313672311');
        $('#direccion').val('Ciudadela Sta.Rita');
        $('#sexo').val('femenino');
        $('#telefono').val('(05)234678');
        $('#celular').val('0987654321');
        $('#email').val('hola_jeniffer@hotmail.com');
        $('#ventanaModalUsuario').modal('show');
        });
}


