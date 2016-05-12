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
                    $("#language").append('<option "value="' + data[i].value + '"selected>' + data[i].value + '</option>');
                } else {
                    $("#language").append('<option "value="' + data[i].value + '">' + data[i].value + '</option>');
                }
            }
            $('#languages').on('hide.bs.modal', function(e) {
                $("#language").empty();

            });
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

                $('#divlanguage').append("<div class='selector'><a onclick='borrarItem(this)'; class='material-icons boton_borrar'>delete</a><table class='table table-striped'><caption class='title'>" + data[i].language + "</caption><tr><th>Comprensión de lectura</th><th>Comprensión auditiva</th><th>Expresión Oral</th><th>Expresión Escrita</th></thead><tbody><tr><td>" + data[i].readingComprehension + "</td><td>" + data[i].listeningComprehension + "</td><td>" + data[i].oralExpression + "</td><td>" + data[i].WrittedExpression + "</td></tr></table></div>");

                /*$.ajax({

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

                });*/

            }
        }

    });
});

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
