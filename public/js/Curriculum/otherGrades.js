var ocultoOther = 0;

$(function() {

    //Carga lista de Otros Cursos

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

});


    /*********************************************

    Función al cargar la modal de Otros Cursos

    *********************************************/

    //Cargar datos en el modal de 
    $('#cursos').on('show.bs.modal', function(e) {
        $('#ocultogrado').val(ocultoOther);
    });

    /*********************************************

    Función al cerrar la modal de Otros Cursos

    *********************************************/

    $('#cursos').on('hide.bs.modal', function(e) {
        ocultoOther = 0;
        $('#ocultogrado').val(ocultoOther);
        $('#grade').val(ocultocertif);
        $("#institution").val('');
        $("#desctiptionGrade").val('');
        $("#duration").val('');
    });
    /*************************************

    Función al editar los Otros Cursos

    **************************************/

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

            if (ocultoOther == 0) {
                $('#grade').val("");
                $('#studyCenter').val("");
                $('#duration').val("");
                $('textarea#description').val("");
            }
        });
    }

    /*************************************

    Función al borrar los Otros Cursos

    **************************************/


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
