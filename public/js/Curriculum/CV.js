
$('#generatePDF').click(function() {
    var licencias = "";
    var otrosCursos = new Array();
    var certificaciones = new Array();
    var aptitudes = new Array();

    	//Si el checkbo es de licencias
    	$(".checklice:checked").each(function() {
    		licencias = $('#namelicenses').text();
    	
    	});
         // Si el checkbox es del apartado Certificaciones
        $(".checkcertf:checked").each(function() {
            certificaciones.push($(this).parent().parent().siblings('ul').children('.certf1').text() + "{}");
            certificaciones.push($(this).parent().parent().siblings('ul').children('.certf2').text() + "{}");
            certificaciones.push($(this).parent().parent().siblings('ul').children('.certf3').text() + "{}");
        });

        // Si el checkbox es del apartado Otros Cursos
        $(".checkother:checked").each(function() {
            otrosCursos.push($(this).parent().parent().siblings('ul').children('.campootro1').text() + "{}");
            otrosCursos.push($(this).parent().parent().siblings('ul').children('.campootro2').text() + "{}");
            otrosCursos.push($(this).parent().parent().siblings('ul').children('.campootro3').text() + "{}");
            otrosCursos.push($(this).parent().parent().siblings('ul').children('.campootro4').text() + "{}");
        });

        // Si el checkbox es del apartado aptitudes
        $(".checkapt:checked").each(function() { 
            aptitudes.push($(this).parent().parent().siblings('ul').children('.campoapt1').text() + "{}");
        });

   	$('#checkboxlicenses').val(licencias);
    $('#checkboxCertificaciones').val(certificaciones);
    $('#checkboxotrosCursos').val(otrosCursos);
    $('#checkboxaptitudes').val(aptitudes);
});
