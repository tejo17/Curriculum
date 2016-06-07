var ocultoexp = 0;
var poblacionseleccionado = "";


$(function() {
    //Carga por ajax listado de experiencias profesionales
    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: 'listExperiences',
        type: 'post',
        success: function(data) {
            var hasta;
            for (var i = 0; i < data.length; i++) {
                if (data[i].to == "0000-00-00") {
                    hasta = "Cursando Actualmente"
                }else{
                    hasta = data[i].to;
                }
                $('#divexppro').append("<div class='selector '><input type='hidden' value=" + data[i].id + "></input><a href='/estudiante/professionalExperiences/' data-method='DELETE' onclick='borrarItemExp(this)'; class='material-icons boton_borrar pull-right'>delete</a><a class='boton_editar pull-right' data-toggle='modal' data-target='#exp' onclick='editarItemExp(this)';><i class='material-icons'>mode_edit</i></a><h6 id='exp1' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Puesto de trabajo: <span style='color:black; font-weight:normal'>" + data[i].job + "</span></h6><h6 id='exp2' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Empresa: <span style='color:black; font-weight:normal'>" + data[i].enterprise + "</span></h6><h6 id='exp3' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Descripción: <span style='color:black; font-weight:normal'>" + data[i].description + "</span></h6><h6 id='exp4' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Ciudad: <span style='color:black; font-weight:normal'>" + data[i].State + "</span></h6><h6 id='exp5' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Localidad: <span style='color:black; font-weight:normal'>" + data[i].City + "</span></h6><h6 id='exp6' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Inicio: <span style='color:black; font-weight:normal'>" + data[i].from + "</span></h6><h6 id='exp7' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Fin: <span style='color:black; font-weight:normal'>" + hasta + "</span></h6></div><hr class='sep'>");
            }
        }

    });
});

$('#exp').on('shown.bs.modal', function(e) {

    $('#ocultoExp').val(ocultoexp);


    /*************************************

    Parte que comprueba el rango de fechas

    *************************************/

    var todayDate = kendo.toString(kendo.parseDate(new Date()), 'yyyy/MM/dd');
    var minimo;
    $("#from,#to").kendoDatePicker({
        animation: {
            close: {
                effects: "fadeOut zoom:out",
                duration: 300
            },
            open: {
                effects: "fadeIn zoom:in",
                duration: 300
            }
        },
        format: "yyyy/MM/dd",
        max: new Date(todayDate)
    });

    var datepicker = $("#from").data("kendoDatePicker");

    datepicker.bind("change", function() {
        minimo = ($('#from').val()); //value is the selected date in the datepicker
        $("#to").kendoDatePicker({
            min: new Date(minimo),
            max: new Date(todayDate),
            format: "yyyy/MM/dd"
        });
    });

    //Fin del apartado de los datepicker

    var checkbox = $('#now');
    $('#actual').val('');
    // modificaciones con el evento click
    checkbox.on('click', function() {
        if (checkbox.is(':checked')) {
            $('#divto').css('display', 'none');
            $('#actual').val('cursando');
            $('#to').val('');
        } else {
            $('#divto').css('display', 'block');
            $('#actual').val('');
        }
    });

    //Script AutoComplete
    $('#stateexp').autocomplete({
        source: "autocompletado"
    });
    $('#stateexp').autocomplete("option", "appendTo", ".eventInsForm");
    //Fin Script Autocomplete


    //Script buscar Localidad
    $('#stateexp').focusout(function(e) {
        //hace la búsqueda

        var consulta = {
            ciudad: $("#stateexp").val()
        };
        $.ajax({
            data: consulta,
            headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
            url: 'autolocal',
            type: 'post',
            success: function(data) {

                if ($("#cityexp option").text() == "") {
                    for (var i = 0; i < data.ciudades.length; i++) {
                        if (poblacionseleccionado == data.ciudades[i].nombre) {
                            $("#cityexp").append('<option selected value="' + data.ciudades[i].id + '">' + data.ciudades[i].nombre + '</option>');
                        } else {
                            $("#cityexp").append('<option value="' + data.ciudades[i].id + '">' + data.ciudades[i].nombre + '</option>');
                        }
                    }
                }
                cargado = 'Cargado';
                $('#stateexp').focus(function() {
                    $("#cityexp").empty();
                });
            }

        });
    }); //Fin Script buscar localidad
});

/****************************************

Función que se ejecuta al cerrar el modal

*****************************************/

$('#exp').on('hide.bs.modal', function(e) {
    ocultoexp = 0;
    $('#ocultoExp').val(ocultoexp);
    $('#job,#enterprise,#description,#stateexp,#from,#to').val("");
    $("#cityexp").empty();
});


/********************************

Editar Experiencias Profesionales

********************************/

function editarItemExp(item) {
    ocultoexp = $(item).parent().children('input')[0].value;
    $('#ocultoExp').val(ocultoexp);

    var job = $(item).siblings('#exp1').children('span').text();
    var enterprise = $(item).siblings('#exp2').children('span').text();
    var description = $(item).siblings('#exp3').children('span').text();
    var state = $(item).siblings('#exp4').children('span').text();
    poblacionseleccionado = $(item).siblings('#exp5').children('span').text()
    var from = $(item).siblings('#exp6').children('span').text();
    var to = $(item).siblings('#exp7').children('span').text();


    $('#exp').on('shown.bs.modal', function(e) {
        if (ocultoexp != 0) {
            $('#job').val(job);
            $('#job').focus();
            $('#stateexp').val(state);
            $('#stateexp').focus();
            $('#enterprise').val(enterprise);
            $('#enterprise').focus();
            $('#stateexp').focus();
            $('textarea#description').val(description);
            $('#from').val(from);
            $('#from').focus();
            $('#to').val(to);
            $('#to').focus();
        }


    });
}

/********************************

Borrar Experiencias Profesionales

********************************/

function borrarItemExp(item) {
    var expid = $(item).parent().children('input')[0].value;

    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: '/estudiante/professionalExperiences/' + expid,
        type: 'delete',
        success: function(result) {

        }
    });
}
