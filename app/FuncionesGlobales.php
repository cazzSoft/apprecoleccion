<?php

    // para verificar si un request tiene caracteres epeciales
    // retorna verdadero si al menos uno de ellos tiene un caracter especial
    function tieneCaracterEspecialRequest($request){
        $retorno=false; // por defecto asumimos queno tiene caracteres especiales
        foreach ($request as $key => $parametro) {
            if($key=='_token'):continue;endif; // para no validar el token de laravel
            $resultado=tieneCaracterEspecial($parametro);
            if($resultado==1):return $retorno=true;endif; // si es 1 es porque se han encontrado CE
        }
        return $retorno;
    }

    // para verificar si un campo tiene caracteres epeciales
    // retorna verdadero si  tiene CE   $resultado=preg_match("/[$%&|\/\<>#&=?¿'`*!¡\[\]{}()".'"'."]/",$texto);
    function tieneCaracterEspecial($texto){
        $resultado=preg_match("/[$%&|<>#&'`*!¡\[\]{}()".'"'."]/",$texto);
        if($resultado==1):return true;else:return false;endif; // si es 1 es porque se han encontrado CE   
    }



?>