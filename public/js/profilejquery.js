
var ocultosite = 0;
var ocultocertif = 0;
var ocultoOther = 0;
var ocultoAptitude = 0;

var cargado = "";
var checkboxs = new Array();







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



   
    //Carga por ajax listado modal licencias

    

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
                $('#divcertification').append(("<div class='selector'><input id=id_certification type='hidden' value=" + data[i].id + "><div class='switch'><label>Off<input type='checkbox' class='checkcertf' name='checkcertf'><span class='lever'></span>On</label></div></input><a href='/estudiante/certifications' data-method='DELETE' onclick='borrarItemCertification(this)'; class='material-icons boton_borrar pull-right'>delete</a><a class='boton_editar pull-right' data-toggle='modal' data-target='#certif' onclick='editarItemCertification(this)';><i class='material-icons'>mode_edit</i></a><ul><li class=' tituloli'>Certificación:</li><li class='certf1'>" + data[i].certification + "</li></ul><ul><li class=' tituloli'>Institución:</li><li class='certf2'>" + data[i].institution + "</li></ul><ul><li class=' tituloli'>Descripcion:</li><li class='certf3'>" + data[i].description + "</li></ul></div><hr class='sep'>"));
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
                $('#divother').append("<div class='selector'><input id=id_certification type='hidden' value=" + data[i].id + "><div class='switch'><label>Off<input type='checkbox' class='checkother' name='checkother'><span class='lever'></span>On</label></div></input><a href='/estudiante/otherGrades' data-method='DELETE' onclick='borrarItemOther(this)'; class='material-icons boton_borrar pull-right'>delete</a><a class='boton_editar pull-right' data-toggle='modal' data-target='#cursos' onclick='editarItemOther(this)';><i class='material-icons'>mode_edit</i></a><ul><li class=' tituloli'>Curso:</li><li class='campootro1 '>" + data[i].grade + "</li></ul><ul><li class=' tituloli'>Institución:</li><li class='campootro2 '>" + data[i].institution + "</li></ul><ul><li class=' tituloli'>Descripcion:</li><li class='campootro3 '>" + data[i].description + "</li></ul><ul><li class=' tituloli'>Duración:</li><li class='campootro4 '>" + data[i].duration + "</li></ul></div><hr class='sep'>");
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
                $('#divaptitude').append("<div class='selector'><input id=id_certification type='hidden' value=" + data[i].id + "><div class='switch'><label>Off<input type='checkbox' class='checkapt' name='checkapt'><span class='lever'></span>On</label></div></input><a href='/estudiante/aptitudes' data-method='DELETE' onclick='borrarItemAptitude(this)'; class='material-icons boton_borrar pull-right'>delete</a><a class='boton_editar pull-right' data-toggle='modal' data-target='#aptitudes' onclick='editarItemAptitude(this)';><i class='material-icons'>mode_edit</i></a><ul><li class=' tituloli'>Aptitud</li><li class='campoapt1 '>" + data[i].aptitude + "</li></ul></div><hr class='sep'>");

            }
        }
    });

});

// Fin carga de las listas




/*********************

Funciones Editar Items

**********************/







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
    
    var certificacion = $(item).siblings('ul').children('.certf1').text();
    var institucion = $(item).siblings('ul').children('.certf2').text();
    var descripcion = $(item).siblings('ul').children('.certf3').text();


    $('#certif').on('shown.bs.modal', function(e) {
        $('#certification').val(certificacion);
        $('#certification').focus();
        $('#institution').val(institucion);
        $('#institution').focus();
        $('textarea#description').val(descripcion);
        console.log(ocultocertif);
        if(ocultocertif == 0){
            $('#certification').val("");
            $('#institution').val("");
            $('textarea#description').val("");
        }

    });
    
}

function editarItemOther(item) {
    ocultoOther = $(item).parent().children('input')[0].value;
    $('#ocultogrado').val(ocultoOther);
    var curso = $(item).siblings('ul').children('.campootro1').text();
    var institucion = $(item).siblings('ul').children('.campootro2').text();
    var descripcion = $(item).siblings('ul').children('.campootro3').text();
    var duracion = $(item).siblings('ul').children('.campootro4').text();


    $('#cursos').on('shown.bs.modal', function(e) {
        $('#grade').val(curso);
        $('#grade').focus();
        $('#studyCenter').val(institucion);
        $('#studyCenter').focus();
        $('#duration').val(duracion);
        $('#duration').focus();
        $('textarea#description').val(descripcion);

        if(ocultoOther == 0){
            $('#grade').val("");
            $('#studyCenter').val("");
            $('#duration').val("");
            $('textarea#description').val("");
        }
    });
}

function editarItemAptitude(item) {
    ocultoAptitude = $(item).parent().children('input')[0].value;
    $('#ocultoaptitude').val(ocultoAptitude);
    var aptitud = $(item).siblings('ul').children('.campoapt1').text();


    $('#aptitudes').on('shown.bs.modal', function(e) {

            $('textarea#aptitude').val(aptitud);

        if(ocultoAptitude == 0){
             $('textarea#aptitude').val("");
        }
        

    });

}


/**********************************

Funciones para borrar los elementos

**********************************/







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


$('#generatePDF').click(function() {
    var otrosCursos = new Array();
    var aptitudes = new Array();
    var certificaciones = new Array();


         // Si el checkbox es del apartado Certificaciones
        $(".checkcertf:checked").each(function() {
            certificaciones.push($(this).parent().parent().siblings('ul').children('.certf1').text() + "{}");
            certificaciones.push($(this).parent().parent().siblings('ul').children('.certf2').text() + "{}");
            certificaciones.push($(this).parent().parent().siblings('ul').children('.certf3').text() + "{}");
        });

        // Si el checkbox es del apartado Otros Cursos
        $(".checkother:checked").each(function() {
            otrosCursos.push($(this).parent().parent().siblings('ul').children('.campootro1').text() + "{}");
            otrosCursos.push($(this).parent().parent().siblings('ul').children('.campootro2').text() + "{}");
            otrosCursos.push($(this).parent().parent().siblings('ul').children('.campootro3').text() + "{}");
            otrosCursos.push($(this).parent().parent().siblings('ul').children('.campootro4').text() + "{}");
        });

        // Si el checkbox es del apartado aptitudes
        $(".checkapt:checked").each(function() { 
            aptitudes.push($(this).parent().parent().siblings('ul').children('.campoapt1').text() + "{}");
        });

    $('#checkboxCertificaciones').val(certificaciones);
    $('#checkboxotrosCursos').val(otrosCursos);
    $('#checkboxaptitudes').val(aptitudes);
    console.log($('#checkboxCertificaciones').val(),$('#checkboxotrosCursos').val(),$('#checkboxaptitudes').val());
});


/***************************************

 Acciones al cerrar las ventanas modales

 **************************************/







$('#sites').on('hide.bs.modal', function(e) {
    ocultosite = 0;
    $('#ocultosite').val(ocultosite);
    $("#personalsite").val('');
});


$('#cursos').on('hide.bs.modal', function(e) {
    ocultoOther = 0;
    $('#ocultogrado').val(ocultoOther);
    $('#grade').val(ocultocertif);
    $("#institution").val('');
    $("#desctiptionGrade").val('');
    $("#duration").val('');
});


$('#aptitudes').on('hidden.bs.modal', function(e) {
    ocultoAptitude = 0;
    $('#ocultoaptitude').val(ocultoAptitude);
    $('textarea').val('');
    $('textarea').empty();
});
//Fin acciones salir de los modales


//Accion AL cerrar el modal
$('#certif').on('hidden.bs.modal', function(e) {
    ocultocertification = 0;
    $('#ocultocertification').val(ocultocertification); 
    $("#certification").val('');
    $("#institution").val('');
    $("#descriptionCertif").val('');
   
;
});
