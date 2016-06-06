var ocultocertif = 0;

$(function() {

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

});
    /*********************************************

    Función al cargar la modal de certificaciones

    *********************************************/

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


    /************************************************

    Función al cargar la modal de las certificaciones

    *************************************************/

    $('#certif').on('show.bs.modal', function(e) {
        $('#ocultocertification').val(ocultocertif);
    });


    /************************************************

    Función al cerrar la modal de las certificaciones

    *************************************************/
    $('#certif').on('hidden.bs.modal', function(e) {
        ocultocertification = 0;
        $('#ocultocertification').val(ocultocertification);
        $("#certification").val('');
        $("#institution").val('');
        $("#descriptionCertif").val('');

        ;
    });

    /*************************************

    Función al editar las certificaciones

    **************************************/

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
            if (ocultocertif == 0) {
                $('#certification').val("");
                $('#institution').val("");
                $('textarea#description').val("");
            }

        });

    }

    /*************************************

    Función al borrar las certificaciones

    **************************************/

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
