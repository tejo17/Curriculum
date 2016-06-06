var ocultolicense = 0;
var licencias;
var listalicencias = ([AM, A1, A2, A, B1, B, BE, BTP, C1, C, C1E, CE, D1, D, D1E, DE]);
var checkboxs = new Array();


$(function() {
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
});

/***********************************

Funcion al cargar modal de licencias

***********************************/

/***********************************

Funcion al cerrar modal de licencias

***********************************/

$('#licenses').on('hide.bs.modal', function(e) {
    ocultolicense = 0;
    $('#ocultolicense').val(ocultolicense);

    for (var i = 0; i < listalicencias.length; i++) {
        $(listalicencias[i]).prop("checked", "");
    }

});

/***********************

Función editar licencias

***********************/

function editarItemlicense(item) {
    ocultolicense = $(item).parent().children('input')[0].value;
    $('#ocultolicense').val(ocultolicense);
    licencias = $('#namelicenses').text();
    checkboxs = licencias.split(',');

    for (var i = 0; i < checkboxs.length; i++) {
        $("#" + checkboxs[i] + "").prop("checked", "checked");
    }
}

/***********************

Función borrar licencias

***********************/

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