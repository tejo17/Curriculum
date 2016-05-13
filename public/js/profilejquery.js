var lang;
var campo1;
var campo2;
var campo3;
var campo4;

$('#exp').on('shown.bs.modal', function(e) {

    var checkbox = $('#now');

    // modificaciones con el evento click
    checkbox.on('click', function() {
        if (checkbox.is(':checked')) {
            $('#to').css('display', 'none');
        } else {
            $('#to').css('display', 'block');
        }
    });

    //Script AutoComplete
    $('#state').autocomplete({
        source: "autocompletado"
    });
    $("#state").autocomplete("option", "appendTo", ".eventInsForm");
    //Fin Script Autocomplete


    //Script buscar Localidad
    $('#state').focusout(function(e) {
        //hace la búsqueda
        var consulta = {
            ciudad: $("#state").val()
        };
        $.ajax({
            data: consulta,
            headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
            url: 'autolocal',
            type: 'post',
            success: function(data) {

                for (var i = 0; i < data.ciudades.length; i++) {

                    $("#city").append('<option "value="' + data.ciudades[i] + '">' + data.ciudades[i] + '</option>');
                }
                $('#state').focus(function() {
                    $("#city").empty();
                });
            }

        });
    }); //Fin Script buscar localidad
});
//Script cargar Tipos de Mensajeria
$('#sites').on('show.bs.modal', function(e) {

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

//Funciones a cargar cuando se cargue la pagina
$(function() {
    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: 'listlanguages',
        type: 'post',
        success: function(data) {

            for (var i = 0; i < data.length; i++) {

                $('#divlanguage').append("<div class='selector'><a onclick='borrarItem(this)'; class='material-icons boton_borrar'>delete</a><a class='boton_editar' data-toggle='modal' data-target='#languages' onclick='editarItem(this)';><i class='material-icons'>mode_edit</i><span class='subirtexto'>Editar</span></a><table class='table table-striped'><caption class='title'>" + data[i].language + "</caption><tr><th>Comprensión de lectura</th><th>Comprensión auditiva</th><th>Expresión Oral</th><th>Expresión Escrita</th></thead><tbody><tr><td class='campo1'>" + data[i].readingComprehension + "</td><td class='campo2'>" + data[i].listeningComprehension + "</td><td class='campo3'>" + data[i].oralExpression + "</td><td class='campo4'>" + data[i].WrittedExpression + "</td></tr></table></div>");


            }
        }

    });
});

function editarItem(item) {
    var table = $(item).next();
    lang = table.children('.title').text();
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
    //Comprobacion 3 datos
    //Update
}

function borrarItem(item) {
    var table = $(item).next();
    var lang = table.children('.title').text();
    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: '/estudiante/languages/' + lang,
        type: 'DELETE',
        success: function(result) {
            table.parent().remove();
        }
    });
}
