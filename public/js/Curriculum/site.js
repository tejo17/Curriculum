var ocultosite = 0;


$(function() {

    //Carga por ajax el listado de Personal Sites

    $.ajax({

        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: 'listSites',
        type: 'post',
        success: function(data) {

            for (var i = 0; i < data.length; i++) {
                $('#divsite').append("<div class='selector'><input id=id_site type='hidden' value=" + data[i].id + "><div class='switch'><label>Off<input type='checkbox' class='checksit' name='checkapt'><span class='lever'></span>On</label></div></input><a href='/estudiante/sites' data-method='DELETE' onclick='borrarItemSite(this)'; class='material-icons boton_borrar pull-right'>delete</a><a class='boton_editar pull-right' data-toggle='modal' data-target='#sites' onclick='editarItemsite(this)';><i class='material-icons'>mode_edit</i></a><h6 style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Sitio Personal: <span class='sit1' style='color:black; font-weight:normal'>" + data[i].site + "</span></h6><h6 style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Dirección: <span class='sit2' style='color:black; font-weight:normal'>" + data[i].personalSite + "</span></h6></div><hr class='sep'>");
            }
        }

    });
});


/*********************************************

Función al cargar la modal de sitios personales

*********************************************/

$('#sites').on('show.bs.modal', function(e) {
    $('#ocultosite').val(ocultosite);
    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: 'cargaSites',
        type: 'post',
        success: function(data) {
          if ($("#site option").text() == "") {

            for (var i = 0; i < data.length; i++) {

             $("#site").append('<option value="' + data[i].id + '">' + data[i].value + '</option>');
            }

        }
    }

    });

});


/*********************************************

Función al cerrar la modal de sitios personales

*********************************************/

$('#sites').on('hide.bs.modal', function(e) {
    ocultosite = 0;
    $('#ocultosite').val(ocultosite);
    $("#personalsite").val('');
     $("#site option:contains('Hangouts')").prop('selected', true);
});

/*************************************

Función al editar los sitios personales

**************************************/

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

/*************************************

Función al borrar los sitios personales

**************************************/

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