@extends('layouts.app')
@section('css')
@include('keyword.student.registerFormKeywords')
@endsection
@section('scripts')
<script src="/js/jquery-ui.js"></script>
<script src="/js/profilejquery.js"></script>  
<script src="/js/datepicker/datepickerConfig.js"></script> 
@endsection
@section('content')
@include('partials.nav.navEstudiante')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 sin-margen" >
            <div class="panel panel-default">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4><i class="fa fa-graduation-cap"></i>Datos Personales</h4>
                    </div>
                    <div class="panel-body ancho">
                        @if(Session::has('fail'))
                        <p class="alert alert-danger">{{Session::get('fail')}}</p>
                        @endif
                        {{ Form::open(['url' => 'estudiante/perfil', 'method' => 'POST','class'=>'form-horizontal','id' => 'student-register-form']) }}
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
                          @include('student.partials.personalInformation')
                      </fieldset>
                      <fieldset>
                         <legend style="width:auto;">Experiencia Profesional</legend>
                         @include('student.partials.profExperience')
                     </fieldset>
                     <fieldset>
                         <legend style="width:auto;">Idiomas</legend>
                         <div id="divlanguage" class="col-md-12">                   
                         </div>
                         @include('student.partials.languages')
                     </fieldset>
                     <fieldset>
                         <legend style="width:auto;">Permiso de Conducir</legend>
                         <div id="divlicenses" class="col-md-12"> 
                            <div class='selector'>
                            Permiso de Conducir
                               <input id=id_license  value=""></input>
                               <a onclick='borrarItem(this)'; class='material-icons boton_borrar pull-right'>delete</a>
                               <a class='boton_editar pull-right' data-toggle='modal' data-target='#licenses' onclick='editarItemlicense(this)';><i class='material-icons'>mode_edit</i></a>
                               <p id="namelicenses"></p>                 
                           </div>
                        </div> 
                            @include('student.partials.drivingLicenses')
                        </fieldset>
                        <fieldset>
                         <legend style="width:auto;">Mensajeria Instantanea</legend>
                         @include('student.partials.personalSites')
                     </fieldset>
                     <fieldset>
                         <legend style="width:auto;">Certificaciones</legend>
                         @include('student.partials.certifications')
                     </fieldset>
                     <fieldset>
                         <legend style="width:auto;">Otros Cursos</legend>
                         @include('student.partials.otherGrades')
                     </fieldset>
                     <fieldset>
                         <legend style="width:auto;">Aptitudes</legend>
                         @include('student.partials.aptitudes')
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
