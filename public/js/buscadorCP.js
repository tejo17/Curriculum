$(document).ready(function() {

    var consulta;

    //hacemos focus al campo de búsqueda
    $("#postalCode").focus();


    //comprobamos si se pulsa una tecla
    $("#postalCode").keyup(function(e) {
        e.preventDefault();
        //obtenemos el texto introducido en el campo de búsqueda
        consulta = $("#postalCode").val();
        var cod_postales;

        //hace la búsqueda
        var consulta = {
            codPostal: $("#postalCode").val()
        };

        $.ajax({
            data: consulta,
            url: '/buscarCodPostal',
            type: 'post',
            beforeSend: function() {
                $("#resultado").html("Procesando, espere por favor...");
            },
            success: function(data) {


                $("#state").val(data.provincia);
                if (($("#postalCode").val()).length == 5) {
                    $("#state").focus();
                    for (var i = 0; i < data.ciudades.length; i++) {

                        $("#city").append('<option "value="' + data.ciudades[i] + '"selected>' + data.ciudades[i] + '</option>');
                    }
                    $("#postalCode").change(function() {});
                    $("#city").focus();
                    $("#resultado").html("");
                } else {
                    $("#city").empty();
                }

            }

        });

    });
});
