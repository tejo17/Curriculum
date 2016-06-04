@extends('layouts.app')
@section('css')
@include('keyword.student.registerFormKeywords')
@endsection
@section('scripts')
<script src="/js/jquery-ui.js"></script>
<script src="/js/moment.js"></script>
<script src="/js/bootstrap-notify.min.js"></script>  
<script src="/js/profilejquery.js"></script>  
<script>notification('{{session("insert")}}', '{{session("type")}}');</script>
<script src="/js/datepicker/datepickerConfig.js"></script> 
<script src="/js/buscadorCP.js" charset="utf-8"></script>
<script src="/js/dragDrop.js"></script>
<script src="/js/angular.min.js"></script>
<script src="/js/kendo.all.min.js"></script>
<script src="/js/Curriculum/cycles.js"></script>


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
                       
                        {{ csrf_field() }}
                 
                        <fieldset>
                            <legend style="width:auto;">Información Personal</legend>
                            <div style="text-align: center;">
                             <img id="imgcur" src="{{ session('carpeta') }}" width="100" height="100" >
                             <h5 style="text-transform: capitalize;">{{ session('lastName') }},{{ session('firstName') }}</h5>
                              <h6><i class="material-icons">location_on</i>{{ session('address') }},{{ session('postalCode') }},{{ session('city') }},({{ session('state') }})</h6>
                              <h6><i class="material-icons">phone</i>{{ session('phone') }}&nbsp;&nbsp;&nbsp;&nbsp;<i class="material-icons">mail</i>{{ session('email') }}</h6>
                              <h6>Fecha Nacimiento: {{session ('birthdate') }} | Nacionalidad: {{session ('nationality') }}</h6>
                          </div>   
                          @include('student.partials.personalInformation')
                      </fieldset>
                      <fieldset>
                         <legend style="width:auto;">Educación y formación</legend>
                         <div id="diveduc" class="col-md-12">          
                         </div>
                         @include('student.partials.cycles')
                         @include('validations.cycle')
                     </fieldset>
                      <fieldset>
                         <legend style="width:auto;">Experiencia Profesional</legend>
                         <div id="divexppro" class="col-md-12">          
                         </div>
                         @include('student.partials.profExperience')
                         @include('validations.professionalExperience')
                     </fieldset>
                     <fieldset>
                         <legend style="width:auto;">Idiomas</legend>
                         <div id="divlanguage" class="col-md-12">                   
                         </div>
                         @include('student.partials.languages')
                         @include('validations.language')
                     </fieldset>
                     <fieldset>
                         <legend style="width:auto;">Permiso de Conducir</legend>
                         <div id="divlicenses" class="col-md-12"> 
                            <div class='selector'>
                            <div class='switch'><label>Off<input type='checkbox' id='checklice' name='checklice'><span class='lever'></span>On</label></div>
                            Permiso de Conducir
                               <input id=id_license  value="" type="hidden">
                               <a href="/estudiante/drivingLicenses" onclick='borrarItemLicense(this)' class='material-icons boton_borrar pull-right'>delete</a>
                               <a class='boton_editar pull-right' data-toggle='modal' data-target='#licenses' onclick='editarItemlicense(this)'><i class='material-icons'>mode_edit</i></a>
                               <p id="namelicenses"></p>                 
                           </div>
                        </div> 
                            @include('student.partials.drivingLicenses')
                        </fieldset>
                        <fieldset>
                         <legend style="width:auto;">Mensajeria Instantanea</legend>
                         <div id="divsite" class="col-md-12">                   
                         </div>
                         @include('student.partials.personalSites')
                         @include('validations.personalSite')
                     </fieldset>
                     <fieldset>
                         <legend style="width:auto;">Certificaciones</legend>
                         <div id="divcertification" class="col-md-12"> </div>
                         @include('student.partials.certifications')
                         @include('validations.certification')
                     </fieldset>
                     <fieldset>
                         <legend style="width:auto;">Otros Cursos</legend>
                         <div id="divother" class="col-md-12"> </div>
                         @include('student.partials.otherGrades')
                         @include('validations.otherGrade')
                     </fieldset>
                     <fieldset>
                         <legend style="width:auto;">Aptitudes</legend>
                         <div id="divaptitude" class="col-md-12"> </div>
                         @include('student.partials.aptitudes')
                         @include('validations.aptitude')
                     </fieldset>
                    
                    <form class="col-md-12" method="POST" action="/estudiante/pdf">

                        <!-- Información personal -->
                        {{ Form::hidden('_token', csrf_token()) }}
                        {{ Form::hidden('firstName', session('firstName')) }}
                        {{ Form::hidden('firstName', session('firstName')) }}
                        {{ Form::hidden('lastName', session('lastName')) }}
                        {{ Form::hidden('imagen', session('rutaSinBarra')) }}
                        {{ Form::hidden('address', session('address')) }}
                        {{ Form::hidden('postalCode', session('postalCode')) }}
                        {{ Form::hidden('city', session('city')) }}
                        {{ Form::hidden('state', session('state')) }}
                        {{ Form::hidden('phone', session('phone')) }}
                        {{ Form::hidden('birthdate', session('birthdate')) }}
                        {{ Form::hidden('nationality', session('nationality')) }}
                        {{ Form::hidden('email', session('email')) }}
                        {{ Form::hidden('checkboxCertificaciones', null,['id' => "checkboxCertificaciones"]) }}
                        {{ Form::hidden('checkboxotrosCursos', null,['id' => "checkboxotrosCursos"]) }}
                        {{ Form::hidden('checkboxaptitudes', null,['id' => "checkboxaptitudes"]) }}
                        {{ session('carpeta') }}

                     <div class="form-group">
                        <div class="col-md-12 text-center">
                            <button  type="submit" class="btn btn-primary btn-login-media waves-effect waves-light" id="generatePDF">
                                <div class="show-responsive">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>
                                </div>
                                <div class="hidden-media">
                                    <i class="fa fa-btn fa-user"></i> <span class="hidden-media">Generar PDF</span>
                                </div>
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
