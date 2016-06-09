var ocultoAptitude = 0;

$(function() {

    //Carga lista de Aptitudes

    $.ajax({

        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: 'listAptitudes',
        type: 'post',
        success: function(data) {
            for (var i = 0; i < data.length; i++) {
                $('#divaptitude').append("<div class='selector'><input id=id_certification type='hidden' value=" + data[i].id + "><div class='switch'><label>Off<input type='checkbox' class='checkapt' name='checkapt'><span class='lever'></span>On</label></div></input><a data-method='DELETE' onclick='borrarItemAptitude(this)'; class='material-icons boton_borrar pull-right'>delete</a><a class='boton_editar pull-right' data-toggle='modal' data-target='#aptitudes' onclick='editarItemAptitude(this)';><i class='material-icons'>mode_edit</i></a><ul><li class=' tituloli'>Aptitud</li><li class='campoapt1 '>" + data[i].aptitude + "</li></ul></div><hr class='sep'>");

            }
        }
    });

});

/***************************************

Función al cargar la modal de Aptitudes

***************************************/

$('#aptitudes').on('show.bs.modal', function(e) {
    $('#ocultoaptitude').val(ocultoAptitude);
});


/**************************************

Función al cerrar la modal de Aptitudes

***************************************/


$('#aptitudes').on('hidden.bs.modal', function(e) {
    ocultoAptitude = 0;
    $('#ocultoaptitude').val(ocultoAptitude);
    $('textarea').val('');
    $('textarea').empty();
});


/******************************

Función al editar los Aptitudes

*******************************/

function editarItemAptitude(item) {
    ocultoAptitude = $(item).parent().children('input')[0].value;
    $('#ocultoaptitude').val(ocultoAptitude);
    var aptitud = $(item).siblings('ul').children('.campoapt1').text();


    $('#aptitudes').on('shown.bs.modal', function(e) {

        $('textarea#aptitude').val(aptitud);

        if (ocultoAptitude == 0) {
            $('textarea#aptitude').val("");
        }


    });

}

/******************************

Función al borrar los Aptitudes

*******************************/


function borrarItemAptitude(item) {
    var Aptitudid = $(item).parent().children('input')[0].value;

    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: '/estudiante/aptitudes/' + Aptitudid,
        type: 'delete',
        success: function(result) {
        window.location="/estudiante/curriculum";
        }
    });
}
