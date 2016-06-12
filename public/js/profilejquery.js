var cargado = "";

//Cargar datos en el modal de info personal
$('#info').on('show.bs.modal', function(e) {
    $.ajax({
        headers: { 'X-CSRF-Token': $('input[name="_token"]').val() },
        url: 'cargaInfo',
        type: 'POST',
        success: function(data) {
            $('#picker').val(data['birthdate']);
            $('#firstName').focus();
            $('#firstName').val(data['firstName']);
            $('#lastName').focus();
            $('#lastName').val(data['lastName']);
            $('#nationality').focus();
            $('#nationality').val(data['nationality']);
            $('#dni').focus();
            $('#dni').val(data['dni']);
            $('#nre').focus();
            $('#nre').val(data['nre']);
            $('#phone').focus();
            $('#phone').val(data['phone']);
            $('#picker').focus();
            $('#address').focus();
            $('#address').val(data['address']);
            $('#postalCode').val(data['postalCode']);
            $('#postalCode').focus();
            $('#email').val(data['email']);
            $('#email').focus();
            cargarPostalAuto(data['postalCode']);
            $('#state').val(data['state']);
            $('#state').focus();

        }
    });

});

function notification(message, type) {
    var icon;
    var message;
    var type;
    if (type == "success") {
        icon = 'glyphicon glyphicon-ok';
        message = message;
    }
    if (type == "warning") {
        icon = 'glyphicon glyphicon-trash';
        message = message;
    }
    if (type == "danger") {
        icon = "glyphicon glyphicon-warning-sign";
        message = message;
    }
    if (message != "") {

        $.notify({
            // options
            icon: icon,
            message: message
        }, {
            // settings
            type: type,
            placement: {
                from: "top",
                align: "center"
            },
        });
    }
}

//Funciones a cargar cuando se cargue la pagina
$(function() {

    angular.module("KendoDemos", ["kendo.directives"])
        .controller("MyCtrl", function($scope) {
            $scope.fromDateString;
            $scope.fromDateObject = null;
            $scope.toDateString;
            $scope.toDateObject = null;
            $scope.maxDate = new Date();
            $scope.minDate = new Date(2000, 0, 1, 0, 0, 0);

            $scope.fromDateChanged = function() {
                $scope.minDate = new Date($scope.fromDateString);
            };
            $scope.toDateChanged = function() {
                $scope.maxDate = new Date($scope.toDateString);
            };
        })

});

function cargarPostalAuto(data) {
    var consulta = {
        codPostal: data
    };
    $.ajax({
        data: consulta,
        url: '/buscarCodPostal',
        type: 'post',

        success: function(data) {

            $("#state").val(data.provincia);
            if (($("#postalCode").val()).length == 5) {

                for (var i = 0; i < data.ciudades.length; i++) {

                    $("#city").append('<option "value="' + data.ciudades[i] + '"selected>' + data.ciudades[i] + '</option>');
                }
                $("#postalCode").keyup(function() {
                    $("#city").empty();
                });
            }
        }
    });
}

$('#todos').click(function() {
            $("input:checkbox").each(function() {
                //cada elemento seleccionado
                $(this).prop('checked', true);
            });
        });
