@extends('layouts.app')
@section('css')
    @include('keyword.student.registerFormKeywords')
@endsection
@section('scripts')
<script src="/js/jquery-ui.js"></script>
    <script>
  $('#exp').on('shown.bs.modal', function (e) {
        var checkbox = $('#now');
         
       // modificaciones con el evento click
            checkbox.on( 'click', function() {
            if(checkbox.is(':checked') ){
                $('#to').css('display','none');
            } else {
                 $('#to').css('display','block');
                }
             });


      $('#state').autocomplete({
            source: "autocompletado"
        });
      $( "#state" ).autocomplete( "option", "appendTo", ".eventInsForm" );


       
        $('#state').focusout(function(e){
        //hace la búsqueda
        var consulta = {
            ciudad: $("#state").val()
        };
            $.ajax({
            data: consulta,
            headers: {'X-CSRF-Token': $('input[name="_token"]').val()},
            url: 'autolocal',
            type: 'post',
            success: function(data) {

            for (var i = 0; i < data.ciudades.length; i++) {

                        $("#city").append('<option "value="' + data.ciudades[i] + '"selected>' + data.ciudades[i] + '</option>');
                  }
             $('#state').focus(function(){
              $("#city").empty();
             })     
            }

        });
    });
});
      
   </script>
@endsection
@section('content')
@include('partials.nav.navEstudiante')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 sin-margen">
            <div class="panel panel-default">
                <div class="modal-content">
                    <div class="modal-header text-center">

                 

                        <h4><i class="fa fa-graduation-cap"></i>Datos Personales</h4>
                    </div>

                    <div class="panel-body ancho">
                    @if(Session::has('message'))
                    <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                         {{ Form::open(['url' => 'estudiante/perfil', 'method' => 'POST','class'=>'form-horizontal']) }}
                            {{ csrf_field() }}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                            <fieldset>
                                <legend style="width:auto;">Información Personal</legend>
                                <div style="text-align: center;">
                                 <img src="{{ url('/img/imgUser/' . \Auth::user()->carpeta . '/' .  \Auth::user()->image) }}" class="img-responsive img-circle img-navegador">
                                  <h5 style="text-transform: capitalize;">{{ session('lastName') }},{{ session('firstName') }}<h5>
                                  <h6><i class="material-icons">location_on</i>{{ session('address') }},{{ session('postalCode') }},{{ session('city') }},({{ session('state') }})</h6>
                                  <h6><i class="material-icons">phone</i>{{ session('phone') }}</h6>
                                </div>             
                            </fieldset>
                            <fieldset>
                             <legend style="width:auto;">Experiencia Profesional</legend>
                             @include('student.partials.profExperience')
                            </fieldset>
                            <fieldset>
                             <legend style="width:auto;">Idiomas</legend>
                             @include('student.partials.languages')
                            </fieldset>
                            <fieldset>
                             <legend style="width:auto;">Permiso de Conducir</legend>
                             @include('student.partials.drivingLicenses')
                             
                            </fieldset>
                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-login-media waves-effect waves-light" id="guardar">
                                        <div class="show-responsive">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                                        </div>
                                        <div class="hidden-media">
                                            <i class="fa fa-btn fa-user"></i> <span class="hidden-media">Guardar</span>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
      
</div>
@endsection
