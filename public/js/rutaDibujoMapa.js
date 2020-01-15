


function ShowSelected1(){

    var combo = document.getElementById("Seleccionar_ruta1");
    var selected = combo.options[combo.selectedIndex].text;
    $('#sectores1').html(selected);
    initMap2();
}