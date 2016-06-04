var ocultoeducation = 0;

// Funcion a cargar cuando se cargue la pagina 
$(function() {
 $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: '/curriculum/listEducacion',
        type: 'post',
        success: function(data) {

            for (var i = 0; i < data.length; i++) {

                $('#diveduc').append("<div class='selector '><input id=id_site type='text' value=" + data[i].id + "></input><a href='/estudiante/curriculum/educationsFormations/' data-method='DELETE' onclick='borrarItemEdu(this)'; class='material-icons boton_borrar pull-right'>delete</a><a class='boton_editar pull-right' data-toggle='modal' data-target='#education' onclick='editarItemEdu(this)';><i class='material-icons'>mode_edit</i></a><h6 id='exp1' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Ciclo: <span style='color:black; font-weight:normal'>" + data[i].Cycle + "</span></h6><h6 id='exp2' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Centro: <span style='color:black; font-weight:normal'>" + data[i].center + "</span></h6><h6 id='exp3' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Ciudad: <span style='color:black; font-weight:normal'>" + data[i].State + "</span></h6><h6 id='exp4' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Población: <span style='color:black; font-weight:normal'>" + data[i].City + "</span></h6><h6 id='exp5' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Desde: <span style='color:black; font-weight:normal'>" + data[i].dateFrom + "</span></h6><h6 id='exp6' style='color:#4A8AF4; font-weight:bold;font-size:1.2rem'>Hasta: <span style='color:black; font-weight:normal'>" + data[i].dateTo + "</span></h6></div><hr class='sep'>");
            }
        }

    });
});

//Accion AL cerrar el modal
$('#education').on('hide.bs.modal', function(e) {
	ocultoEducation = 0;
});


/* Funcion que se ejecuta  cuando se haya cargado el modal*/

$('#education').on('shown.bs.modal', function(e) {


	$('#ocultoEducation').val(ocultoEducation);

	var checkbox = $('#nowForm');
	$('#actualForm').val('');
    // modificaciones con el evento click
    checkbox.on('click', function() {
    	if (checkbox.is(':checked')) {
    		$('#divToForm').css('display', 'none');
    		$('#actualForm').val('cursando');
    		$('#dateToForm').val('');
    	} else {
    		$('#divToForm').css('display', 'block');
    		$('#actualForm').val('');
    	}
    });

    //Script AutoComplete
    $('#stateform').autocomplete({
    	source: "autocompletado"
    });
    $('#stateform').autocomplete("option", "appendTo", ".eventInsForm");
    //Fin Script Autocomplete


    //Script buscar Localidad
    $('#stateform').focusout(function(e) {
        //hace la búsqueda

        var consulta = {
        	ciudad: $("#stateform").val()
        };
        $.ajax({
        	data: consulta,
        	headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        	url: 'autolocal',
        	type: 'post',
        	success: function(data) {

        		for (var i = 0; i < data.ciudades.length; i++) {

        			$("#cityform").append('<option "value="' + data.ciudades[i] + '">' + data.ciudades[i] + '</option>');

        		}
        		cargado = 'Cargado';
        		$('#stateform').focus(function() {
        			$("#cityform").empty();
        		});
        	}

        });
    }); //Fin Script buscar localidad

    //Script AutoComplete
    $('#family').autocomplete({
    	source: "autocompletadoFamilias"
    });
    $('#family').autocomplete("option", "appendTo", ".eventInsForm");
    //Fin Script Autocomplete


    //Script buscar Localidad
    $('#family').focusout(function(e) {
        //hace la búsqueda
        var consulta = {
        	familia: $("#family").val()
        };


        $.ajax({
        	data: consulta,
        	headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        	url: 'autolocalCiclos',
        	type: 'post',
        	success: function(data) {

        		for (var i = 0; i < data.ciclos.length; i++) {

        			$("#cycle").append('<option "value="' + data.ciclos[i] + '">' + data.ciclos[i] + '</option>');

        		}
        		cargado = 'Cargado';
        		$('#family').focus(function() {
        			$("#cycle").empty();
        		});
        	}

        });
    }); //Fin Script buscar ciclo

});

//Funcion de editar item

function editarItemEdu(item) {
    ocultoeducation = $(item).parent().children('input')[0].value;
    $('#ocultoEducation').val(ocultoeducation);

    var sitio = $($(item).siblings('h6').children('span')[0]).text();
    var direccion = $($(item).siblings('h6').children('span')[1]).text();
    $('#sites').on('shown.bs.modal', function(e) {
        $("#site option:contains('" + sitio + "')").prop('selected', true);
        $('#personalsite').focus();
    });

    $('#personalsite').val(direccion);
}

