var lang;
var campo1;
var campo2;
var campo3;
var campo4;
var ocultolanguage = 0;

$(function() {

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
});

/***********************************

Funcion al cargar modal de lenguajes

***********************************/

$('#languages').on('show.bs.modal', function(e) {

    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: 'cargaLanguages',
        type: 'post',
        success: function(data) {
            for (var i = 0; i < data.length; i++) {
                if (i == 31) {
                    $("#language").append('<option selected value="' + data[i].value + '">' + data[i].value + '</option>');
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


            $("#language option:contains('Español')").prop('selected', true);
            $("#readingComprehension option:contains('Bajo')").prop('selected', true);
            $("#WrittedExpression option:contains('Bajo')").prop('selected', true);
            $("#listeningComprehension option:contains('Bajo')").prop('selected', true);
            $("#oralExpression option:contains('Bajo')").prop('selected', true);


            lang = "";
            campo1 = "";
            campo2 = "";
            campo3 = "";
            campo3 = "";
            campo4 = "";
        }

    });

}); //Fin script cargar Idiomas

/***********************************

Funcion al cerrar modal de lenguajes

***********************************/

$('#languages').on('hide.bs.modal', function(e) {
    ocultolanguage = 0;
    $("#oralExpression").val('Bajo');
    $("#WrittedExpression").val('Bajo');
    $("#listeningComprehension").val('Bajo');
    $("#readingComprehension").val('Bajo');
});


/***********************

Funcion editar lenguajes

************************/

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

/***********************

Funcion borrar lenguajes

************************/

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
