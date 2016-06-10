var ocultoexp = 0;
var poblacionseleccionado = "";


$(function() {
    //Carga por ajax listado de experiencias profesionales
    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: 'listExperiences',
        type: 'post',
        success: function(data) {
            var desde;
         
            var hasta;
            for (var i = 0; i < data.length; i++) {
            desde = data[i].from.split('-');
            desde = desde[2]+ "-" + desde[1] + "-" + desde[0];

            
                if (data[i].to == "0000-00-00") {
                    hasta = "Cursando Actualmente"
                }else{
                   hasta = data[i].to.split('-');
            hasta = hasta[2]+ "-" + hasta[1] + "-" + hasta[0];
             
                }
                $('#divexppro').append("<div class='selector'><input id=ocultoprof type='hidden' value=" + data[i].id + "><div class='switch'><label>Off<input type='checkbox' class='checkprof' name='checkcycle'><span class='lever'></span>On</label></div><a data-method='DELETE' onclick='borrarItemExp(this)'; class='material-icons boton_borrar pull-right'>delete</a><a class='boton_editar pull-right' data-toggle='modal' data-target='#exp' onclick='editarItemExp(this)';><i class='material-icons'>mode_edit</i></a><h6  style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Puesto de trabajo: <span class='exp1' style='color:black; font-weight:normal'>" + data[i].job + "</span></h6><h6  style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Empresa: <span class='exp2' style='color:black; font-weight:normal'>" + data[i].enterprise + "</span></h6><h6  style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Descripción: <span class='exp3' style='color:black; font-weight:normal'>" + data[i].description + "</span></h6><h6  style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Ciudad: <span class='exp4' style='color:black; font-weight:normal'>" + data[i].State + "</span></h6><h6  style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Localidad: <span class='exp5' style='color:black; font-weight:normal'>" + data[i].City + "</span></h6><h6  style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Inicio: <span class='exp6' style='color:black; font-weight:normal'>" + desde + "</span></h6><h6  style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Fin: <span class='exp7' style='color:black; font-weight:normal'>" + hasta + "</span></h6></div><hr class='sep'>");
            }
        }

    });
});

$('#exp').on('shown.bs.modal', function(e) {

    $('#ocultoExp').val(ocultoexp);


    /*************************************

    Parte que comprueba el rango de fechas

    *************************************/
    kendo.culture("es-ES");
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
    console.log('test');
    ocultoexp = $(item).parent().children('input')[0].value;
    $('#ocultoExp').val(ocultoexp);

    var job = $(item).siblings('h6').children('.exp1').text();
    var enterprise = $(item).siblings('h6').children('.exp2').text();
    var description = $(item).siblings('h6').children('.exp3').text();
    var state = $(item).siblings('h6').children('.exp4').text();
    poblacionseleccionado = $(item).siblings('h6').children('.exp5').text();
    var from = $(item).siblings('h6').children('.exp6').text();
    var to = $(item).siblings('h6').children('.exp7').text();


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
        window.location="/estudiante/curriculum";
        }
    });
}
