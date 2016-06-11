var lang = "Inglés";
var lang1 = 0;
var lang2 = 0;
var lang3 = 0;
var lang4 = 0;
var ocultolanguage = 0;

$(function() {

    //Carga por ajax listado modal lenguajes
    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: 'listlanguages',
        type: 'post',
        success: function(data) {


            for (var i = 0; i < data.length; i++) {

                $('#divlanguage').append("<div class='selector table-container'><input id=id_language type='hidden' value=" + data[i].id + "><div class='switch'><label>Off<input type='checkbox' class='checklang' name='checkapt'><span class='lever'></span>On</label></div></input><input id=id_language type='hidden' value=" + data[i].id + "></input><a data-method='DELETE' onclick='borrarItem(this)'; class='material-icons boton_borrar pull-right'>delete</a><a class='boton_editar pull-right' data-toggle='modal' data-target='#languages' onclick='editarItem(this)';><i class='material-icons'>mode_edit</i></a><table class='table table-striped'><h5 style='text-align:center;font-weight:bold;'>" + data[i].language + "</h5><thead><tr><th>Comprensión de lectura</th><th>Comprensión auditiva</th><th>Expresión Escrita</th><th>Expresión Oral</th></tr></thead><tbody><tr><td class='lang1'>" + data[i].readingComprehension + "</td><td class='lang2'>" + data[i].listeningComprehension + "</td><td class='lang3'>" + data[i].WrittedExpression + "</td><td class='lang4'>" + data[i].oralExpression + "</td></tr></tbody></table></div><hr class='sep'>");
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
            $("#readingComprehension option:contains('" + lang1 + "')").prop('selected', true);
            $("#WrittedExpression option:contains('" + lang2 + "')").prop('selected', true);
            $("#listeningComprehension option:contains('" + lang3 + "')").prop('selected', true);
            $("#oralExpression option:contains('" + lang4 + "')").prop('selected', true);
            $("#ocultolanguage").val(ocultolanguage);

             if (lang.length == 0) {
                 $("#language option:contains('Inglés')").prop('selected', true);
            }

            if (lang1.length == 0) {
                 $("#readingComprehension option:contains('Bajo')").prop('selected', true);
             }
 
             if (lang2.length == 0) {
                 $("#WrittedExpression option:contains('Bajo')").prop('selected', true);
             }
 
             if (lang3.length == 0) {
                 $("#listeningComprehension option:contains('Bajo')").prop('selected', true);
             }
 
             if (lang4.length == 0) {
                 $("#oralExpression option:contains('Bajo')").prop('selected', true);
             }



            lang = "";
            lang1 = "";
            lang2 = "";
            lang3 = "";
            lang3 = "";
            lang4 = "";
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

    lang1 = table.children('tbody').children('tr').children('.lang1').text();
    lang2 = table.children('tbody').children('tr').children('.lang2').text();
    lang3 = table.children('tbody').children('tr').children('.lang3').text();
    lang4 = table.children('tbody').children('tr').children('.lang4').text();
    if ((lang1 != "Alto") && (lang1 != "Medio") && ("Bajo")) {
        lang1 = "Bajo";
    }
    if ((lang2 != "Alto") && (lang2 != "Medio") && ("Bajo")) {
        lang2 = "Bajo";
    }
    if ((lang3 != "Alto") && (lang3 != "Medio") && ("Bajo")) {
        lang3 = "Bajo";
    }
    if ((lang4 != "Alto") && (lang4 != "Medio") && ("Bajo")) {
        lang4 = "Bajo";
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
        window.location="/estudiante/curriculum";
        }
    });
}
