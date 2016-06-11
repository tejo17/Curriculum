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
            for (var i = 0; i < data.carrera.length; i++) {
                if (data.carrera[i].dateTo == "0000") {
                    hasta = "Cursando Actualmente"
                } else {
                    hasta = data.carrera[i].dateTo;
                }
           
                if (data.carrera[i].carreer != "") {
                    $('#divcampocarrera').css('display', 'block');
                 
                    $('#diveducar').append("<div class='selector'><input id=ocultoeduid type='hidden' value=" + data.carrera[i].id + "><div class='switch'><label>Off<input type='checkbox' class='checkcycle' name='checkcycle'><span class='lever'></span>On</label></div><a data-method='DELETE' onclick='borrarItemEducation(this)'; class='material-icons boton_borrar pull-right'>delete</a><a class='boton_editar pull-right' data-toggle='modal' data-target='#education' onclick='editarItemEdu(this)';><i class='material-icons'>mode_edit</i></a><h6 id='categoria' name='categoria' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Carrera: <span class='educ1' style='color:black; font-weight:normal'>" + data.carrera[i].carreer + "</span></h6><h6 class='educ2' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Centro: <span class='educ3' style='color:black; font-weight:normal'>" + data.carrera[i].center + "</span></h6><h6  style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Ciudad: <span class='educ4' style='color:black; font-weight:normal'>" + data.carrera[i].State + "</span></h6><h6  style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Población: <span class='educ5' style='color:black; font-weight:normal'>" + data.carrera[i].City + "</span></h6><h6 style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Desde: <span class='educ6' style='color:black; font-weight:normal'>" + data.carrera[i].dateFrom + "</span></h6><h6 style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Hasta: <span class='educ7' style='color:black; font-weight:normal'>" + hasta + "</span></h6></div><hr class='sep'>");
                }
           }
           for (var i = 0; i < data.ciclo.length; i++) {
            if (data.ciclo[i].dateTo == "0000") {
                hasta = "Cursando Actualmente"
            } else {
                hasta = data.ciclo[i].dateTo;
            }
            if (data.ciclo[i].carreer == ""){
              $('#divcampociclo').css('display', 'block');
                $('#diveduc').append("<div class='selector'><input id=ocultoeduidci type='hidden' value=" + data.ciclo[i].id + "><div class='switch'><label>Off<input type='checkbox' class='checkcycle' name='checkcycle'><span class='lever'></span>On</label></div><a data-method='DELETE' onclick='borrarItemEducation(this)'; class='material-icons boton_borrar pull-right'>delete</a><a class='boton_editar pull-right' data-toggle='modal' data-target='#education' onclick='editarItemEdu(this)';><i class='material-icons'>mode_edit</i></a><h6 id='categoria' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Familia: <span class='educ0' style='color:black; font-weight:normal'>" + data.ciclo[i].Family + "</span></h6><h6 style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Ciclo: <span class='educ1' style='color:black; font-weight:normal'>" + data.ciclo[i].Cycle + "</span></h6><h6 style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Grado: <span class='educ2' style='color:black; font-weight:normal'>" + data.ciclo[i].Nivel + "</span></h6><h6 class='educ2' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Centro: <span class='educ3' style='color:black; font-weight:normal'>" + data.ciclo[i].center + "</span></h6><h6  style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Ciudad: <span class='educ4' style='color:black; font-weight:normal'>" + data.ciclo[i].State + "</span></h6><h6  style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Población: <span class='educ5' style='color:black; font-weight:normal'>" + data.ciclo[i].City + "</span></h6><h6 style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Desde: <span class='educ6' style='color:black; font-weight:normal'>" + data.ciclo[i].dateFrom + "</span></h6><h6 style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Hasta: <span class='educ7' style='color:black; font-weight:normal'>" + hasta + "</span></h6></div><hr class='sep'>");
            }
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
    $('#ocultoEducation').val(ocultoeducation);
    var carrera = $('#carrera');
    carrera.on('click', function() {
        if (carrera.is(':checked')) {
            $('#camposciclo').css('display', 'none');
            $('#campocarrera').css('display', 'block');
            $('#family').val("Actividades Físicas y Deportivas");
            $('#cycle').val(10);
        } else {
            $('#camposciclo').css('display', 'block');
            $('#campocarrera').css('display', 'none');
            $('#family').val("");
            $('#cycle').val("");
        }
    });

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
                            $("#cycle").append('<option selected value="' + data.ciclos[i].id + '">' + "(Grado: " + data.ciclos[i].level + ") " + data.ciclos[i].nombre + '</option>');
                        } else {
                            $("#cycle").append('<option value=' + data.ciclos[i].id + '>' + "(Grado: " + data.ciclos[i].level + ") " + data.ciclos[i].nombre + '</option>');
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
    var campo = $(item).siblings('#categoria').text();
    campo = campo.split(":");


    if (campo[0] == "Carrera") {
        $('#carrera').prop('checked', true);
        $('#camposciclo').css('display', 'none');
        $('#campocarrera').css('display', 'block');
        var familia = "Actividades Físicas y Deportivas";
        $('#cycle').val(10);
        $('#carrer').val(campo[1]);
        $('#carrer').focus();
    }else {
        $('#carrera').prop('checked', false);
        $('#camposciclo').css('display', 'block');
        $('#campocarrera').css('display', 'none');
        var familia = $(item).siblings('h6').children('.educ0').text();
    }
    $('#ocultoEducation').val(ocultoeducation);

    ciclo = $(item).siblings('h6').children('.educ1').text();
    var centro = $(item).siblings('h6').children('.educ3').text();
    var provincia = $(item).siblings('h6').children('.educ4').text();
    poblacionseleccionado = $(item).siblings('h6').children('.educ5').text();

    var desde = $(item).siblings('h6').children('.educ6').text();
    var hasta = $(item).siblings('h6').children('.educ7').text();

    $('#education').on('shown.bs.modal', function(e) {

        if (ocultoeducation != 0) {
            $('#carrer').focus();
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
            window.location = "/estudiante/curriculum";
        }
    });

};







//Accion AL cerrar el modal
$('#education').on('hidden.bs.modal', function(e) {
    ocultoeducation = 0;
    $('#ocultoEducation').val(ocultoeducation);
    $('#carrer').val('');
    $("#family").val('');
    $("#cycle").empty();
    $("#center").val('');
    $("#stateform").val('');
    $("#cityform").empty();
    $("#dateTo").val('1960');
    $("#dateFrom").val('1960');

    ;
});
