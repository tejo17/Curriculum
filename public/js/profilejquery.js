var lang;
var campo1;
var campo2;
var campo3;
var campo4;
var ocultoexp = 0;
var ocultolanguage = 0;
var ocultolicense = 0;
var ocultosite = 0;
var ocultocertif = 0;
var ocultoOther = 0;
var ocultoAptitude = 0;
var ocultoEducation = 0;
var licencias;
var cargado = "";
var listalicencias = ([AM, A1, A2, A, B1, B, BE, BTP, C1, C, C1E, CE, D1, D, D1E, DE]);
var checkboxs = new Array();

$('#exp').on('shown.bs.modal', function(e) {
    

    $('#ocultoExp').val(ocultoexp);


/*************************************

Parte que comprueba el rango de fechas

*************************************/

        var todayDate = kendo.toString(kendo.parseDate(new Date()), 'yyyy/MM/dd');
        var minimo;
$("#from,#to").kendoDatePicker({
    animation: {
   close: {
     effects: "fadeOut zoom:out",
     duration: 300
   },
   open: {
     effects: "fadeIn zoom:in",
     duration: 300
   }
},
    format: "yyyy/MM/dd",          
    max: new Date(todayDate)
});

var datepicker = $("#from").data("kendoDatePicker");

datepicker.bind("change", function() {
    minimo = ($('#from').val()); //value is the selected date in the datepicker
    $("#to").kendoDatePicker({
            min: new Date(minimo),
    max: new Date(todayDate),
            format: "yyyy/MM/dd"          
        });
});

//Fin del apartado de los datepicker

    var checkbox = $('#now');
            $('#actual').val('');
    // modificaciones con el evento click
    checkbox.on('click', function() {
        if (checkbox.is(':checked')) {
            $('#divto').css('display', 'none');
$('#actual').val('cursando');
            $('#to').val('');
        } else {
            $('#divto').css('display', 'block');
            $('#actual').val('');
        }
    });

    //Script AutoComplete
    $('#stateexp').autocomplete({
        source: "autocompletado"
    });
    $('#stateexp').autocomplete("option", "appendTo", ".eventInsForm");
    //Fin Script Autocomplete


    //Script buscar Localidad
    $('#stateexp').focusout(function(e) {
        //hace la búsqueda

        var consulta = {
            ciudad: $("#stateexp").val()
        };
        $.ajax({
            data: consulta,
            headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
            url: 'autolocal',
            type: 'post',
            success: function(data) {

                for (var i = 0; i < data.ciudades.length; i++) {

                    $("#cityexp").append('<option "value="' + data.ciudades[i] + '">' + data.ciudades[i] + '</option>');

                }
                cargado = 'Cargado';
                $('#stateexp').focus(function() {
                    $("#cityexp").empty();
                });
            }

        });
    }); //Fin Script buscar localidad


});

/*ciudades y familias de educación y formación
$('#education').on('shown.bs.modal', function(e) {
    

    $('#ocultoEducation').val(ocultoEducation);

    var checkbox = $('#now');
            $('#actual').val('');
    // modificaciones con el evento click
    checkbox.on('click', function() {
        if (checkbox.is(':checked')) {
            $('#divto').css('display', 'none');
$('#actual').val('cursando');
            $('#to').val('');
        } else {
            $('#divto').css('display', 'block');
            $('#actual').val('');
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

                for (var i = 0; i < data.ciudades.length; i++) {

                    $("#cityform").append('<option "value="' + data.ciudades[i] + '">' + data.ciudades[i] + '</option>');

                }
                cargado = 'Cargado';
                $('#stateform').focus(function() {
                    $("#cityform").empty();
                });
            }

        });
    }); //Fin Script buscar localidad


});*/

/*familias y ciclos*/
$('#education').on('shown.bs.modal', function(e) {
    

    $('#ocultoEducation').val(ocultoEducation);

    var checkbox = $('#now');
            $('#actual').val('');
    // modificaciones con el evento click
    checkbox.on('click', function() {
        if (checkbox.is(':checked')) {
            $('#divto').css('display', 'none');
$('#actual').val('cursando');
            $('#to').val('');
        } else {
            $('#divto').css('display', 'block');
            $('#actual').val('');
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

                for (var i = 0; i < data.ciudades.length; i++) {

                    $("#cityform").append('<option "value="' + data.ciudades[i] + '">' + data.ciudades[i] + '</option>');

                }
                cargado = 'Cargado';
                $('#stateform').focus(function() {
                    $("#cityform").empty();
                });
            }

        });
    }); //Fin Script buscar localidad


});

//Script cargar Tipos de Mensajeria
$('#sites').on('show.bs.modal', function(e) {
    $('#ocultosite').val(ocultosite);
    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: 'cargaSites',
        type: 'post',
        success: function(data) {

            for (var i = 0; i < data.length; i++) {
                $("#site").append('<option "value="' + data[i].value + '">' + data[i].value + '</option>');
            }
            $('#sites').on('hide.bs.modal', function(e) {
                $("#site").empty();

            });
        }

    });

});

//Script cargar Idiomas
$('#languages').on('show.bs.modal', function(e) {

    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: 'cargaLanguages',
        type: 'post',
        success: function(data) {
            for (var i = 0; i < data.length; i++) {
                if (i == 31) {
                    $("#language").append('<option selected value=' + data[i].value + '>' + data[i].value + '</option>');
                } else {
                    $("#language").append('<option value=' + data[i].value + '>' + data[i].value + '</option>');
                }
            }
            $('#languages').on('hide.bs.modal', function(e) {
                $("#language").empty();

            });

            $("#language option:contains('" + lang + "')").prop('selected', true);
            $("#readingComprehension option:contains('" + campo1 + "')").prop('selected', true);
            $("#WrittedExpression option:contains('" + campo2 + "')").prop('selected', true);
            $("#listeningComprehension option:contains('" + campo3 + "')").prop('selected', true);
            $("#oralExpression option:contains('" + campo4 + "')").prop('selected', true);
            $("#ocultolanguage").val(ocultolanguage);

            if (lang.length == 0) {
                $("#language option:contains('Español')").prop('selected', true);
            }

            if (campo1.length == 0) {
                $("#readingComprehension option:contains('Bajo')").prop('selected', true);
            }

            if (campo2.length == 0) {
                $("#WrittedExpression option:contains('Bajo')").prop('selected', true);
            }

            if (campo3.length == 0) {
                $("#listeningComprehension option:contains('Bajo')").prop('selected', true);
            }

            if (campo4.length == 0) {
                $("#oralExpression option:contains('Bajo')").prop('selected', true);
            }

            lang = "";
            campo1 = "";
            campo2 = "";
            campo3 = "";
            campo3 = "";
            campo4 = "";
        }

    });

}); //Fin script cargar Idiomas

//Cargar datos en el modal de info personal
$('#info').on('show.bs.modal', function(e) {
    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: 'cargaInfo',
        type: 'POST',
        success: function(data) {
            $('#picker').val(data['birthdate']);
            $('#firstName').focus();
            $('#firstName').val(data['firstName']);
            $('#lastName').focus();
            $('#lastName').val(data['lastName']);
            $('#nationality').focus();
            $('#nationality').val(data['nationality']);
            $('#dni').focus();
            $('#dni').val(data['dni']);
            $('#nre').focus();
            $('#nre').val(data['nre']);
            $('#phone').focus();
            $('#phone').val(data['phone']);
            $('#picker').focus();
            $('#address').focus();
            $('#address').val(data['address']);
            $('#postalCode').val(data['postalCode']);
            $('#postalCode').focus();
            $('#email').val(data['email']);
            $('#email').focus();
            cargarPostalAuto(data['postalCode']);
            $('#state').val(data['state']);
            $('#state').focus();

        }
    });

});

//Cargar datos en el modal de certificaciones
$('#certif').on('show.bs.modal', function(e) {
    $('#ocultocertification').val(ocultocertif);
});

//Cargar datos en el modal de Otros Cursos
$('#cursos').on('show.bs.modal', function(e) {
    $('#ocultogrado').val(ocultoOther);
});

//Cargar datos en el modal de Aptitudes
$('#aptitudes').on('show.bs.modal', function(e) {
    $('#ocultoaptitude').val(ocultoAptitude);
});

/***************************************

 Acciones al cerrar las ventanas modales

 **************************************/
 $('#education').on('hide.bs.modal', function(e) {
    ocultoEducation = 0;
});

 $('#exp').on('hide.bs.modal', function(e) {
    ocultoexp = 0;
});

$('#languages').on('hide.bs.modal', function(e) {
    ocultolanguage = 0;
});

$('#licenses').on('hide.bs.modal', function(e) {
    ocultolicense = 0;
    $('#ocultolicense').val(ocultolicense);

    for (var i = 0; i < listalicencias.length; i++) {
        $(listalicencias[i]).prop("checked", "");
    }

});
$('#sites').on('hide.bs.modal', function(e) {
    ocultosite = 0;
    $('#ocultosite').val(ocultosite);
});

$('#certif').on('hide.bs.modal', function(e) {
    ocultocertif = 0;
    $('#ocultocertification').val(ocultocertif);
});

$('#cursos').on('hide.bs.modal', function(e) {
    ocultoOther = 0;
    $('#ocultogrado').val(ocultoOther);
});


$('#aptitudes').on('hide.bs.modal', function(e) {
    ocultoAptitude = 0;
    $('#ocultoaptitude').val(ocultoAptitude);
});
//Fin acciones salir de los modales


function notification(message, type) {
    var icon;
    var message;
    var type;
    if (type == "success") {
        icon = 'glyphicon glyphicon-ok';
        message = message;
    }
    if (type == "warning") {
        icon = 'glyphicon glyphicon-trash';
        message = message;
    }
    if (type == "danger") {
        icon = "glyphicon glyphicon-warning-sign";
        message = message;
    }
    if (message != "") {

        $.notify({
            // options
            icon: icon,
            message: message
        }, {
            // settings
            type: type,
            placement: {
                from: "top",
                align: "center"
            },
        });
    }
}

//Funciones a cargar cuando se cargue la pagina
$(function() {

    angular.module("KendoDemos", [ "kendo.directives" ])
          .controller("MyCtrl", function($scope){
            $scope.fromDateString;
            $scope.fromDateObject = null;
            $scope.toDateString;
            $scope.toDateObject = null;
            $scope.maxDate = new Date();
            $scope.minDate = new Date(2000, 0, 1, 0, 0, 0);
            
            $scope.fromDateChanged = function(){
              $scope.minDate = new Date($scope.fromDateString);
            };
            $scope.toDateChanged = function(){
              $scope.maxDate = new Date($scope.toDateString);
            };
          })

    //Carga por ajax listado de experiencias profesionales
     $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: 'listExperiences',
        type: 'post',
        success: function(data) {

            for (var i = 0; i < data.length; i++) {

                $('#divexppro').append("<div class='selector '><input id=id_site type='hidden' value=" + data[i].id + "></input><a href='/estudiante/professionalExperiences/' data-method='DELETE' onclick='borrarItemExp(this)'; class='material-icons boton_borrar pull-right'>delete</a><a class='boton_editar pull-right' data-toggle='modal' data-target='#exp' onclick='editarItemExp(this)';><i class='material-icons'>mode_edit</i></a><h6 id='exp1' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Puesto de trabajo: <span style='color:black; font-weight:normal'>" + data[i].job + "</span></h6><h6 id='exp2' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Empresa: <span style='color:black; font-weight:normal'>" + data[i].enterprise + "</span></h6><h6 id='exp3' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Descripción: <span style='color:black; font-weight:normal'>" + data[i].description + "</span></h6><h6 id='exp4' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Ciudad: <span style='color:black; font-weight:normal'>" + data[i].State + "</span></h6><h6 id='exp5' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Localidad: <span style='color:black; font-weight:normal'>" + data[i].City + "</span></h6><h6 id='exp6' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Inicio: <span style='color:black; font-weight:normal'>" + data[i].from + "</span></h6><h6 id='exp7' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Fin: <span style='color:black; font-weight:normal'>" + data[i].to + "</span></h6></div><hr class='sep'>");
            }
        }

    });

    //Carga por ajax listado modal lenguajes
    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: 'listlanguages',
        type: 'post',
        success: function(data) {


            for (var i = 0; i < data.length; i++) {

                $('#divlanguage').append("<div class='selector table-container'><input id=id_language type='hidden' value=" + data[i].id + "></input><a href='/estudiante/languages' data-method='DELETE' onclick='borrarItem(this)'; class='material-icons boton_borrar pull-right'>delete</a><a class='boton_editar pull-right' data-toggle='modal' data-target='#languages' onclick='editarItem(this)';><i class='material-icons'>mode_edit</i></a><table class='table table-striped'><h5 style='text-align:center;font-weight:bold;'>" + data[i].language + "</h5><thead><tr><th>Comprensión de lectura</th><th>Comprensión auditiva</th><th>Expresión Oral</th><th>Expresión Escrita</th></tr></thead><tbody><tr><td class='campo1'>" + data[i].readingComprehension + "</td><td class='campo2'>" + data[i].listeningComprehension + "</td><td class='campo3'>" + data[i].oralExpression + "</td><td class='campo4'>" + data[i].WrittedExpression + "</td></tr></tbody></table></div><hr class='sep'>");
            }
        }

    });
    //Carga por ajax listado modal licencias

    $.ajax({

        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: 'listLicenses',
        type: 'post',
        success: function(data) {

            licencias = data.drivingLicense;
            for (var i = 0; i < data.length; i++) {
                $('#namelicenses').append(data[i].drivingLicense);
                if (i < data.length - 1) {
                    $('#namelicenses').append(' , ');
                }
                $('#id_license').val(data[i].id);
                $('#ocultolicense').val(ocultolicense);

            }

        }

    });

    //Carga por ajax el listado de Personal Sites

    $.ajax({

        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: 'listSites',
        type: 'post',
        success: function(data) {
            for (var i = 0; i < data.length; i++) {
                $('#divsite').append("<div class='selector '><input id=id_site type='hidden' value=" + data[i].id + "></input><a href='/estudiante/sites' data-method='DELETE' onclick='borrarItemSite(this)'; class='material-icons boton_borrar pull-right'>delete</a><a class='boton_editar pull-right' data-toggle='modal' data-target='#sites' onclick='editarItemsite(this)';><i class='material-icons'>mode_edit</i></a><h6 style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Sitio Personal: <span style='color:black; font-weight:normal'>" + data[i].site + "</span></h6><h6 style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Dirección: <span style='color:black; font-weight:normal'>" + data[i].personalSite + "</span></h6></div><hr class='sep'>");
            }
        }

    });

    //Carga lista de certificaciones
    $.ajax({

        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: 'listCertifications',
        type: 'post',
        success: function(data) {
            for (var i = 0; i < data.length; i++) {
                $('#divcertification').append(("<div class='selector'><input id=id_certification type='hidden' value=" + data[i].id + "></input><a href='/estudiante/certifications' data-method='DELETE' onclick='borrarItemCertification(this)'; class='material-icons boton_borrar pull-right'>delete</a><a class='boton_editar pull-right' data-toggle='modal' data-target='#certif' onclick='editarItemCertification(this)';><i class='material-icons'>mode_edit</i></a><ul><li class=' tituloli'>Certificación:</li><li class='campo1 '>" + data[i].certification + "</li></ul><ul><li class=' tituloli'>Institución:</li><li class='campo2 '>" + data[i].institution + "</li></ul><ul><li class=' tituloli'>Descripcion:</li><li class='campo3 '>" + data[i].description + "</li></ul></div><hr class='sep'>"));
            }

        }

    });

    //Carga lista de otros grados
    $.ajax({

        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: 'listOtherGrades',
        type: 'post',
        success: function(data) {
            for (var i = 0; i < data.length; i++) {
                $('#divother').append("<div class='selector'><input id=id_certification type='hidden' value=" + data[i].id + "></input><a href='/estudiante/otherGrades' data-method='DELETE' onclick='borrarItemOther(this)'; class='material-icons boton_borrar pull-right'>delete</a><a class='boton_editar pull-right' data-toggle='modal' data-target='#cursos' onclick='editarItemOther(this)';><i class='material-icons'>mode_edit</i></a><ul><li class=' tituloli'>Curso:</li><li class='campo1 '>" + data[i].grade + "</li></ul><ul><li class=' tituloli'>Institución:</li><li class='campo2 '>" + data[i].institution + "</li></ul><ul><li class=' tituloli'>Descripcion:</li><li class='campo3 '>" + data[i].description + "</li></ul><ul><li class=' tituloli'>Duración:</li><li class='campo4 '>" + data[i].duration + "</li></ul></div><hr class='sep'>");
            }
        }
    });

    //Carga lista de Aptitudes
    $.ajax({

        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: 'listAptitudes',
        type: 'post',
        success: function(data) {
            for (var i = 0; i < data.length; i++) {
                $('#divaptitude').append("<div class='switch'><label>Off<input type='checkbox'><span class='lever'></span>On</label></div> <div class='selector'><input id=id_certification type='hidden' value=" + data[i].id + "></input><a href='/estudiante/aptitudes' data-method='DELETE' onclick='borrarItemAptitude(this)'; class='material-icons boton_borrar pull-right'>delete</a><a class='boton_editar pull-right' data-toggle='modal' data-target='#aptitudes' onclick='editarItemAptitude(this)';><i class='material-icons'>mode_edit</i></a><ul><li class=' tituloli'>Aptitud</li><li class='campo1 '>" + data[i].aptitude + "</li></ul></div><hr class='sep'>");
            }
        }
    });

});

// Fin carga de las listas




/*********************

Funciones Editar Items

**********************/

function editarItemExp(item) {
    ocultoexp = $(item).parent().children('input')[0].value;
    $('#ocultoExp').val(ocultocertif);
    var job = $(item).siblings('#exp1').children('span').text();
    var enterprise = $(item).siblings('#exp2').children('span').text();
    var description = $(item).siblings('#exp3').children('span').text();
    var state = $(item).siblings('#exp4').children('span').text();
    var city = $(item).siblings('#exp5').children('span').text();
    var from = $(item).siblings('#exp6').children('span').text();
    var to = $(item).siblings('#exp7').children('span').text();
    

    $('#exp').on('shown.bs.modal', function(e) {
        $('#stateexp').val(state);
        $('#stateexp').focus();
        $('#job').val(job);
        $('#job').focus();
        $('#enterprise').val(enterprise);
        $('#enterprise').focus();
        $('#stateexp').focus();
        $('textarea#description').val(description);
        $('#from').val(from);
        $('#from').focus();
        $('#to').val(to);
        $('#to').focus();
        //$('[name=city]').val('ARANJUEZ');
        
    });
}

function editarItem(item) {
    ocultolanguage = $(item).parent().children('input')[0].value;

    var table = $(item).parent().children('table');
    lang = table.parent().children('h5').text();

    campo1 = table.children('tbody').children('tr').children('.campo1').text();
    campo2 = table.children('tbody').children('tr').children('.campo2').text();
    campo3 = table.children('tbody').children('tr').children('.campo3').text();
    campo4 = table.children('tbody').children('tr').children('.campo4').text();
    if ((campo1 != "Alto") && (campo1 != "Medio") && ("Bajo")) {
        campo1 = "Bajo";
    }
    if ((campo2 != "Alto") && (campo2 != "Medio") && ("Bajo")) {
        campo2 = "Bajo";
    }
    if ((campo3 != "Alto") && (campo3 != "Medio") && ("Bajo")) {
        campo3 = "Bajo";
    }
    if ((campo4 != "Alto") && (campo4 != "Medio") && ("Bajo")) {
        campo4 = "Bajo";
    }
}

function editarItemlicense(item) {
    ocultolicense = $(item).parent().children('input')[0].value;
    $('#ocultolicense').val(ocultolicense);
    licencias = $('#namelicenses').text();
    checkboxs = licencias.split(',');

    for (var i = 0; i < checkboxs.length; i++) {
        $("#" + checkboxs[i] + "").prop("checked", "checked");
    }
}

function editarItemsite(item) {
    ocultosite = $(item).parent().children('input')[0].value;
    $('#ocultosite').val(ocultosite);

    var sitio = $($(item).siblings('h6').children('span')[0]).text();
    var direccion = $($(item).siblings('h6').children('span')[1]).text();
    $('#sites').on('shown.bs.modal', function(e) {
        $("#site option:contains('" + sitio + "')").prop('selected', true);
        $('#personalsite').focus();
    });

    $('#personalsite').val(direccion);
}

function editarItemCertification(item) {
    ocultocertif = $(item).parent().children('input')[0].value;
    $('#ocultocertification').val(ocultocertif);
    var certificacion = $(item).siblings('ul').children('.campo1').text();
    var institucion = $(item).siblings('ul').children('.campo2').text();
    var descripcion = $(item).siblings('ul').children('.campo3').text();


    $('#certif').on('shown.bs.modal', function(e) {
        $('#certification').val(certificacion);
        $('#certification').focus();
        $('#institution').val(institucion);
        $('#institution').focus();
        $('textarea#description').val(descripcion);
    });
}

function editarItemOther(item) {
    ocultoOther = $(item).parent().children('input')[0].value;
    $('#ocultogrado').val(ocultoOther);
    var curso = $(item).siblings('ul').children('.campo1').text();
    var institucion = $(item).siblings('ul').children('.campo2').text();
    var descripcion = $(item).siblings('ul').children('.campo3').text();
    var duracion = $(item).siblings('ul').children('.campo4').text();


    $('#cursos').on('shown.bs.modal', function(e) {
        $('#grade').val(curso);
        $('#grade').focus();
        $('#studyCenter').val(institucion);
        $('#studyCenter').focus();
        $('#duration').val(duracion);
        $('#duration').focus();
        $('textarea#description').val(descripcion);
    });
}

function editarItemAptitude(item) {
    ocultoAptitude = $(item).parent().children('input')[0].value;
    $('#ocultoaptitude').val(ocultoAptitude);
    var aptitud = $(item).siblings('ul').children('.campo1').text(); 

    $('#aptitudes').on('shown.bs.modal', function(e) {
        $('textarea#aptitude').val(aptitud);

    });

}


/**********************************

Funciones para borrar los elementos

**********************************/

function borrarItemExp(item) {
    var expid = $(item).parent().children('input')[0].value;
    
    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: '/estudiante/professionalExperiences/' + expid,
        type: 'delete',
        success: function(result) {
           
        }
    });
}

function borrarItem(item) {
    var table = $(item).parent().children('table');
    var lang = table.parent().children('h5').text();
    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: '/estudiante/languages/' + lang,
        type: 'DELETE',
        success: function(result) {
            table.parent().remove();
        }
    });
}

function borrarItemLicense(item) {
    var licenseid = $('#license_id').val();
    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: '/estudiante/drivingLicenses/' + licenseid,
        type: 'delete',
        success: function(result) {
            $('#divlicenses').children().remove();
        }
    });
}

function borrarItemSite(item) {
    var siteid = $(item).parent().children('input')[0].value;
    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: '/estudiante/sites/' + siteid,
        type: 'delete',
        success: function(result) {

        }
    });
}

function borrarItemCertification(item) {
    var certificationid = $(item).parent().children('input')[0].value;

    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: '/estudiante/certifications/' + certificationid,
        type: 'delete',
        success: function(result) {

        }
    });
}

function borrarItemOther(item) {
    var Otherid = $(item).parent().children('input')[0].value;

    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: '/estudiante/otherGrades/' + Otherid,
        type: 'delete',
        success: function(result) {

        }
    });
}

function borrarItemAptitude(item) {
    var Aptitudid = $(item).parent().children('input')[0].value;

    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: '/estudiante/aptitudes/' + Aptitudid,
        type: 'delete',
        success: function(result) {

        }
    });
}


function cargarPostalAuto(data) {
    var consulta = {
        codPostal: data
    };
    $.ajax({
        data: consulta,
        url: '/buscarCodPostal',
        type: 'post',

        success: function(data) {

            $("#state").val(data.provincia);
            if (($("#postalCode").val()).length == 5) {

                for (var i = 0; i < data.ciudades.length; i++) {

                    $("#city").append('<option "value="' + data.ciudades[i] + '"selected>' + data.ciudades[i] + '</option>');
                }
                $("#postalCode").keyup(function() {
                    $("#city").empty();
                });
            }
        }
    });
}
