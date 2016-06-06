
$('#generatePDF').click(function() {
    var otrosCursos = new Array();
    var aptitudes = new Array();
    var certificaciones = new Array();


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

    $('#checkboxCertificaciones').val(certificaciones);
    $('#checkboxotrosCursos').val(otrosCursos);
    $('#checkboxaptitudes').val(aptitudes);
    console.log($('#checkboxCertificaciones').val(),$('#checkboxotrosCursos').val(),$('#checkboxaptitudes').val());
});

$(function() {

});