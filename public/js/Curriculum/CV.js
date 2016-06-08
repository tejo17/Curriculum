$('#generatePDF').click(function() {
    var experience = new Array();
    var ciclos = new Array();
    var lenguajes = new Array();
    var licencias = "";
    var sitios = new Array();
    var certificaciones = new Array();
    var otrosCursos = new Array();
    var aptitudes = new Array();

    // Si el checkbox es del apartado Experiencias Profesionales
    $(".checkprof:checked").each(function() {
        experience.push($(this).parent().parent().siblings('h6').children('.exp1').text() + "{}");
        experience.push($(this).parent().parent().siblings('h6').children('.exp2').text() + "{}");
        experience.push($(this).parent().parent().siblings('h6').children('.exp3').text() + "{}");
        experience.push($(this).parent().parent().siblings('h6').children('.exp4').text() + "{}");
        experience.push($(this).parent().parent().siblings('h6').children('.exp5').text() + "{}");
        experience.push($(this).parent().parent().siblings('h6').children('.exp6').text() + "{}");
        experience.push($(this).parent().parent().siblings('h6').children('.exp7').text() + "{}");
    });
    
    // Si el checkbox es del apartado Ciclos
    $(".checkcycle:checked").each(function() {
        ciclos.push($(this).parent().parent().siblings('h6').children('.educ0').text() + "{}");
        ciclos.push($(this).parent().parent().siblings('h6').children('.educ1').text() + "{}");
        ciclos.push($(this).parent().parent().siblings('h6').children('.educ2').text() + "{}");
        ciclos.push($(this).parent().parent().siblings('h6').children('.educ3').text() + "{}");
        ciclos.push($(this).parent().parent().siblings('h6').children('.educ4').text() + "{}");
        ciclos.push($(this).parent().parent().siblings('h6').children('.educ5').text() + "{}");
        ciclos.push($(this).parent().parent().siblings('h6').children('.educ6').text() + "{}");
        ciclos.push($(this).parent().parent().siblings('h6').children('.educ7').text() + "{}");
    });
  
    // Si el checkbox es del apartado lenguajes
    $(".checklang:checked").each(function() {
        lenguajes.push($(this).parent().parent().siblings('h5').text() + "{}");
        lenguajes.push($(this).parent().parent().siblings('table').children('tbody').children('tr').children('.lang1').text() + "{}");
        lenguajes.push($(this).parent().parent().siblings('table').children('tbody').children('tr').children('.lang2').text() + "{}");
        lenguajes.push($(this).parent().parent().siblings('table').children('tbody').children('tr').children('.lang3').text() + "{}");
        lenguajes.push($(this).parent().parent().siblings('table').children('tbody').children('tr').children('.lang4').text() + "{}");
    });

    //Si el checkbox es de licencias
    $(".checklice:checked").each(function() {
        licencias = $('#namelicenses').text();

    });

    // Si el checkbox es del apartado Sitios personales
    $(".checksit:checked").each(function() {
        sitios.push($(this).parent().parent().siblings('h6').children('.sit1').text() + "{}");
        sitios.push($(this).parent().parent().siblings('h6').children('.sit2').text() + "{}");
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

    $('#checkboxexperiences').val(experience);
    $('#checkboxciclos').val(ciclos);
    $('#checkboxlenguajes').val(lenguajes);
    $('#checkboxlicenses').val(licencias);
    $('#checkboxsites').val(sitios);
    $('#checkboxCertificaciones').val(certificaciones);
    $('#checkboxotrosCursos').val(otrosCursos);
    $('#checkboxaptitudes').val(aptitudes);
});
