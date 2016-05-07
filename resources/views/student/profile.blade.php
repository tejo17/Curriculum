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
    <script src="/js/buscadorCP.js" charset="utf-8"></script>
  

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
                         {{ Form::open(['route' => 'estudiante..store', 'method' => 'POST', 'files' => 'true', 'id' => 'student-register-form']) }}
                            {!! csrf_field() !!}
                            <fieldset>
                                <legend style="width:auto;">Información Personal</legend>
                                <div style="text-align: center;">
                                  <h5 style="text-transform: capitalize;">{{ session('lastName') }},{{ session('firstName') }}<h5>
                                  <h6><i class="material-icons">location_on</i>{{ session('address') }},{{ session('postalCode') }},{{ session('city') }},({{ session('state') }})</h6>
                                  <h6><i class="material-icons">phone</i>{{ session('phone') }}</h6>
                                </div>

                               
                            </fieldset>
                            
                            <fieldset>
                                <legend style="width: auto;">Usuario</legend>
                                @include('generic.userfields')
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
