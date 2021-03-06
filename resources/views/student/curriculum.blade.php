@extends('layouts.app')
@section('css')
@include('keyword.student.registerFormKeywords')
@endsection
@section('content')
@include('pdf.Loadjs')
@include('partials.nav.navEstudiante')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 sin-margen" >
            <div class="panel panel-default">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4><i class="fa fa-graduation-cap"></i>Currículum Vitae</h4>
                        <p>Este currículum está basado en el currículum europass de <a href="https://europass.cedefop.europa.eu/es/documents/curriculum-vitae">Europass</a></p>
                    </div>

                    <div class="panel-body ancho">
                        @if(Session('fail'))
                        <p class="alert alert-danger">{{Session('fail')}}</p>
                        @endif
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
                       <p class="text-center">Marca los registros que quieras mostrar en el PDF. Si deseas marcarlos todos haz clic <a id="todos">Aqui.</a></p>
                       <fieldset>
                           <legend style="width:auto;">Educación y formación</legend>
                       <div id="divcampocarrera" style="display:none;">
                            <fieldset>
                           <legend style="width:auto;">Carrera Universitarias</legend>         
                           <div id="diveducar" class="col-md-12"> 
                           </div>
                           </fieldset>
                           </div>
                           <div id="divcampociclo" style="display:none;">
                            <fieldset>
                           <legend style="width:auto;">Ciclos Formativos</legend>   
                           <div id="diveduc" class="col-md-12">          
                           </div>
                           </fieldset>
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

                    <!-- CheckBoxs -->
                    {{ Form::hidden('checkboxexperiences', null,['id' => "checkboxexperiences"]) }}
                    {{ Form::hidden('checkboxsites', null,['id' => "checkboxsites"]) }}
                    {{ Form::hidden('checkboxciclos', null,['id' => "checkboxciclos"]) }}
                    {{ Form::hidden('checkboxlenguajes', null,['id' => "checkboxlenguajes"]) }}
                    {{ Form::hidden('checkboxlicenses', null,['id' => "checkboxlicenses"]) }}
                    {{ Form::hidden('checkboxCertificaciones', null,['id' => "checkboxCertificaciones"]) }}
                    {{ Form::hidden('checkboxotrosCursos', null,['id' => "checkboxotrosCursos"]) }}
                    {{ Form::hidden('checkboxaptitudes', null,['id' => "checkboxaptitudes"]) }}

                    <br>
                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <button  type="submit" class="btn btn-default btn-lg waves-effect waves-light" id="generatePDF">
                                
                                <div class="show-responsive">
                                    <i class="fa fa-file-text-o" aria-hidden="true"></i> Generar PDF
                                </div>
                                <div class="hidden-media">
                                    <i class="fa fa-file-text-o"></i> <span class="hidden-media">Generar PDF</span>
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
