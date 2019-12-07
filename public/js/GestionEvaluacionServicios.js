//==============EVALUACION DE SERVICIOS==========
//GESTIÓN PREGUNTA
function pregunta_editar(idpregunta){
    $.get("pregunta/"+idpregunta+"/edit", function (data) {
        $('#descripcion').val(data.descripcion);

    });

    $('#method_pregunta').val('PUT');
    $('#frm_pregunta').prop('action',window.location.protocol+'//'+window.location.host+'/pregunta/'+idpregunta);
    $('#btn_preguntaCancelar').removeClass('hidden');

    $('html,body').animate({scrollTop:$('#RegistroEvaluacionServicios').offset().top},400);
}

// la funcion del boton cancelar, vacia los campos y el mismo se vuelve a desaparecer
$('#btn_preguntaCancelar').click(function(){
    $('#descripcion').val('');

    $('#method_pregunta').val('POST');
    $('#frm_pregunta').prop('action',window.location.protocol+'//'+window.location.host+'/pregunta');
    $(this).addClass('hidden');
});

function btn_eliminar(btn){
    if(confirm('¿Quiere eliminar el registro?')){
        $(btn).parent('.frm_eliminar').submit();
    }
}

//GESTIÓN EVALUACIÓN
function evaluacion_editar(idevaluacion){
    $.get("evaluacion/"+idevaluacion+"/edit", function (data) {
        $('#nombre').val(data.nombre);
        $('#fecha_inicio').val(data.fecha_inicio);
        $('#fecha_fin').val(data.fecha_fin);
        $('#objetivo').val(data.objetivo);

    });

    $('#method_evaluacion').val('PUT');
    $('#frm_evaluacion').prop('action','evaluacion/'+idevaluacion);
    $('#btn_evaluacionCancelar').removeClass('hidden');

    $('html,body').animate({scrollTop:$('#RegistroEvaluacionServicios').offset().top},400);
}

// la funcion del boton cancelar, vacia los campos y el mismo se vuelve a desaparecer
$('#btn_evaluacionCancelar').click(function(){
    $('#nombre').val('');
    $('#fecha_inicio').val('');
    $('#fecha_fin').val('');
    $('#objetivo').val('');

    $('#method_evaluacion').val('POST');
    $('#frm_evaluacion').prop('action',window.location.protocol+'//'+window.location.host+'/evaluacion');
    $(this).addClass('hidden');
});

function btn_eliminar(btn){
    if(confirm('¿Quiere eliminar el registro?')){
        $(btn).parent('.frm_eliminar').submit();
    }
}

//GESTIÓN PREGUNTA EVALUACIÓN
function PreguntaEvaluacion_editar(idpregunta_evaluacion){
    $.get("pregunta_evaluacion/"+idpregunta_evaluacion+"/edit", function (data) {


        $('.opcion_pregunta').attr("selected", false);
        $(`#pregunta option[value="${data.idpregunta}"]`).attr("selected", true);
        $('#pregunta_chosen').children('a').children('span').html($(`#pregunta option[value="${data.idpregunta}"]`).html());

        $('.opcion_evaluacion').attr("selected", false);
        $(`#evaluacion option[value="${data.idevaluacion}"]`).attr("selected", true);
        $('#evaluacion_chosen').children('a').children('span').html($(`#evaluacion option[value="${data.idevaluacion}"]`).html());

    });

    $('#method_PreguntaEvaluacion').val('PUT');
    $('#frm_PreguntaEvaluacion').prop('action',window.location.protocol+'//'+window.location.host+'/pregunta_evaluacion/'+idpregunta_evaluacion);
    $('#btn_PreguntaEvaluacionCancelar').removeClass('hidden');
    $('html,body').animate({scrollTop:$('#RegistroEvaluacionServicios').offset().top},400);
}


$('#btn_PreguntaEvaluacionCancelar').click(function(){
    $('.opcion_pregunta').attr("selected", false);
    $('#pregunta_chosen').children('a').children('span').html('Seleccione una pregunta');
    $('.opcion_evaluacion').attr("selected", false);
    $('#evaluacion_chosen').children('a').children('span').html('Seleccione una evaluación');
    $('#method_PreguntaEvaluacion').val('POST');
    $('#frm_PreguntaEvaluacion').prop('action',window.location.protocol+'//'+window.location.host+'/pregunta_evaluacion');
    $(this).addClass('hidden');
});

