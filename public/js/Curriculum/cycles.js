var ocultoeducation = 0;
var ciclo = "";
var poblacionseleccionado = "";

// Funcion a cargar cuando se cargue la pagina 
$(function() {
    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: 'listEducacion',
        type: 'post',
        success: function(data) {
            var hasta;

            for (var i = 0; i < data.length; i++) {
                if (data[i].dateTo == "0000") {
                    hasta = "Cursando Actualmente"
                } else {
                    hasta = data[i].dateTo;
                }

                $('#diveduc').append("<div class='selector'><input id=ocultoeduid type='hidden' value=" + data[i].id + "><div class='switch'><label>Off<input type='checkbox' class='checkcycle' name='checkcycle'><span class='lever'></span>On</label></div><a href='/estudiante/educationsFormations/' data-method='DELETE' onclick='borrarItemEducation(this)'; class='material-icons boton_borrar pull-right'>delete</a><a class='boton_editar pull-right' data-toggle='modal' data-target='#education' onclick='editarItemEdu(this)';><i class='material-icons'>mode_edit</i></a><h6 style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Familia: <span class='educ0' style='color:black; font-weight:normal'>" + data[i].Family + "</span></h6><h6 style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Ciclo: <span class='educ1' style='color:black; font-weight:normal'>" + data[i].Cycle + "</span></h6><h6 style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Grado: <span class='educ2' style='color:black; font-weight:normal'>" + data[i].Nivel + "</span></h6><h6 class='educ2' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Centro: <span class='educ3' style='color:black; font-weight:normal'>" + data[i].center + "</span></h6><h6  style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Ciudad: <span class='educ4' style='color:black; font-weight:normal'>" + data[i].State + "</span></h6><h6  style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Población: <span class='educ5' style='color:black; font-weight:normal'>" + data[i].City + "</span></h6><h6 style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Desde: <span class='educ6' style='color:black; font-weight:normal'>" + data[i].dateFrom + "</span></h6><h6 style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Hasta: <span class='educ7' style='color:black; font-weight:normal'>" + hasta + "</span></h6></div><hr class='sep'>");
            }
        }


    });
});

//Script AutoComplete

$('#family').autocomplete({
    source: "autocompletadoFamilias"
});
$('#family').autocomplete("option", "appendTo", ".eventInsForm");

//Fin Script Autocomplete




/* Funcion que se ejecuta  cuando se haya cargado el modal*/

$('#education').on('shown.bs.modal', function(e) {


    var checkbox = $('#nowForm');
    $('#actualForm').val('');
    // modificaciones con el evento click
    checkbox.on('click', function() {
        if (checkbox.is(':checked')) {
            $('#divToForm').css('display', 'none');
            $('#actualForm').val('cursando');
            $('#dateToForm').val('');
        } else {
            $('#divToForm').css('display', 'block');
            $('#actualForm').val('');
        }
    });

    //Script AutoComplete
    $('#stateform').autocomplete({
        source: "autocompletado"
    });
    $('#stateform').autocomplete("option", "appendTo", ".eventInsForm");
    //Fin Script Autocomplete


    //Script buscar Localidad
    $('#stateform').focusout(function(e) {
        //hace la búsqueda

        var consulta = {
            ciudad: $("#stateform").val()
        };
        $.ajax({
            data: consulta,
            headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
            url: 'autolocal',
            type: 'post',
            success: function(data) {

                if ($("#cityform option").text() == "") {
                    for (var i = 0; i < data.ciudades.length; i++) {
                        if (poblacionseleccionado == data.ciudades[i].nombre) {
                            $("#cityform").append('<option selected value="' + data.ciudades[i].id + '">' + data.ciudades[i].nombre + '</option>');
                        } else {
                            $("#cityform").append('<option value=' + data.ciudades[i].id + '>' + data.ciudades[i].nombre + '</option>');
                        }
                    }
                }

                cargado = 'Cargado';
                $('#stateform').focus(function() {
                    $("#cityform").empty();
                });
            }

        });
    }); //Fin Script buscar localidad



    //Script que se ejecuta al salir del campo family
    $('#family').focusout(function(e) {
        //hace la búsqueda
        var consulta = {
            familia: $("#family").val()
        };

        $.ajax({
            data: consulta,
            headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
            url: 'autolocalCiclos',
            type: 'post',
            success: function(data) {

                if ($("#cycle option").text() == "") {
                    for (var i = 0; i < data.ciclos.length; i++) {

                        if (ciclo == data.ciclos[i].nombre) {
                            $("#cycle").append('<option selected value="' + data.ciclos[i].id + '">' + data.ciclos[i].nombre + '</option>');
                        } else {
                            $("#cycle").append('<option value=' + data.ciclos[i].id + '>' + data.ciclos[i].nombre + '</option>');
                        }
                    }
                }
            }

        });
    }); //Fin Script buscar ciclo




});


/**********************

Funcion de editar item

***********************/

function editarItemEdu(item) {
    ocultoeducation = $(item).parent().children('input')[0].value;

    $('#ocultoEducation').val(ocultoeducation);

    var familia = $(item).siblings('h6').children('.educ0').text();
    ciclo = $(item).siblings('h6').children('.educ1').text();
    var centro = $(item).siblings('h6').children('.educ3').text();
    var provincia = $(item).siblings('h6').children('.educ4').text();
    poblacionseleccionado = $(item).siblings('h6').children('.educ5').text();

    var desde = $(item).siblings('h6').children('.educ6').text();
    var hasta = $(item).siblings('h6').children('.educ7').text();

$('#education').on('shown.bs.modal', function(e) {

    if (ocultoeducation != 0) {

        $("#family").val(familia);
        $("#family").focus();
        $("#center").val(centro);
        $("#center").focus();
        $("#stateform").val(provincia);
        $("#stateform").focus();
        $("#dateFrom").val(desde);
        $("#dateFrom").focus();
        $("#dateTo").val(hasta);
        $("#dateTo").focus();

    }
});
}

/**********************

Funcion de borrar item

***********************/

function borrarItemEducation(item) {
    var eduid = $(item).parent().children('input')[0].value;

    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: '/estudiante/educationsFormations/' + eduid,
        type: 'delete',
        success: function(result) {

        }
    });

};







//Accion AL cerrar el modal
$('#education').on('hidden.bs.modal', function(e) {
    ocultoeducation = 0;
    $('#ocultoEducation').val(ocultoeducation);

    $("#family").val('');
    $("#cycle").empty();
    $("#center").val('');
    $("#stateform").val('');
    $("#cityform").empty();
    $("#dateTo").val('1960');
    $("#dateFrom").val('1960');

    ;
});
