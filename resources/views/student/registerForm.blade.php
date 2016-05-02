@extends('layouts.app')
@section('css')
    @include('keyword.student.registerFormKeywords')
@endsection
@section('scripts')
    {{-- Incluimos los scripts de validaciones --}}
    <script src="/js/validaciones/facada.js" charset="utf-8"></script>

    {{-- Incluimos lo necesario para añadir familias profesionales --}}
    <script src="/js/funcionalidad/addFamilyCycles.js" charset="utf-8"></script>

    {{-- Incluimos lo necesario para la peticion Ajax --}}
    <script src="/js/ajax/cycles.js" charset="utf-8"></script>
    <script>
    $(document).ready(function(){
                                
        var consulta;
                                                                          
         //hacemos focus al campo de búsqueda
        $("#postalCode").focus();
                                                                                                    
        //comprobamos si se pulsa una tecla
        $("#postalCode").keyup(function(e){
               e.preventDefault();                      
              //obtenemos el texto introducido en el campo de búsqueda
              consulta = $("#postalCode").val();
              console.log(consulta);                                                             
              //hace la búsqueda
                                                                                
               $.ajax({
                data:  consulta,
                url:   'buscar',
                type:  'post',
                dataType:'json',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (data) {
                $("#cities").html(data.states);
                }
        });
                                                                                  
                                                                           
        });
                                                                   
});</script>
@endsection
@section('content')
@include('partials.nav.navEstudiante')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 sin-margen">
            <div class="panel panel-default">
                <div class="modal-content">
                    <div class="modal-header text-center">

                 

                        <h4><i class="fa fa-graduation-cap"></i>Formulario de alta de estudiantes</h4>
                    </div>

                    <div class="panel-body ancho">
 @if(Session::has('message'))
                    <p class="alert alert-success">{{Session::get('message')}}</p>
                    @endif
                         {{ Form::open(['route' => 'estudiante..store', 'method' => 'POST', 'files' => 'true', 'id' => 'student-register-form']) }}
                            {!! csrf_field() !!}
                            <fieldset>
                                <legend style="width:auto;">Estudiante</legend>
                                @include('student.partials.studentfields')
                              <section class="family-cycle">
                                  <fieldset>
                                      <legend style="width: auto;">Familia Profesional</legend>
                                      @include('generic.profFamiliesfields')
                                  </fieldset>
                                  <fieldset id="fieldCycles" class="hidden">
                                      <legend style="width: auto;">Ciclos</legend>
                                  </fieldset>
                              <div id="divAddFamilyCycle" class="text-center">
                                  @include('student.partials.btnAddFamilyCycle')
                              </div>
                              </section>
                            </fieldset>
                            
                            <fieldset>
                                <legend style="width: auto;">Usuario</legend>
                                @include('generic.userfields')
                            </fieldset>
                                @include('generic.terms')
                            <div class="form-group">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-login-media waves-effect waves-light" id="submit">
                                        <div class="show-responsive">
                                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                                        </div>
                                        <div class="hidden-media">
                                            <i class="fa fa-btn fa-user"></i> <span class="hidden-media">Registrar</span>
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
