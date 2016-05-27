<!--Modal: subscription form-->


    <!--Button-->
    <a href="#" class="btn btn-primary btn-lg waves-effect waves-light" data-toggle="modal" data-target="#cursos"><i class="material-icons left">add</i>Añadir</a>
    <!-- Modal -->
    <div class="modal fade" id="cursos" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" >
                <div class="modal-header">
                     <button type="button" class="btn btn-default btn-danger pull-right" data-dismiss="modal">X</button>
                    <h4 class="modal-title h4,responsive" style="text-align:center; clear:both"><i class="fa fa-graduation-cap"></i>Otros Cursos</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="otherGrades" method="POST" class="col-md-12">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                   			 <br>
                             {{ Form::hidden('id', null,['id' => "ocultogrado"]) }}
                             <div class="input-field col-md-12">
                            <i class="material-icons prefix">library_books</i>
                                {{ Form::text('grade', null,['id' => "grade"]) }}
                                {{ Form::label('grade', 'Curso') }}
                            </div>
                            <div class="input-field col-md-12">
                            <i class="material-icons prefix">location_city</i>
                                {{ Form::text('studyCenter', null,['id' => "studyCenter"]) }}
                                {{ Form::label('studyCenter', 'Institución') }}
                            </div>

                              <div class="input-field col-md-12">
                            <i class="material-icons prefix">schedule</i>
                                {{ Form::text('duration', null,['id' => "duration"]) }}
                                {{ Form::label('duration', 'Duración') }}
                            </div>
                            
                             <div class="input-field col-md-12">
                                <p style="color:#9e9e9e; font-weight:400">Descripción</p>
                                {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'maxlength' => '250', 'style' => 'border:1px lightgrey solid; padding-left:10px; padding-top:10px;', 'rows' => '5']) }}
                                <span class="pull-right">Máximo 250 caracteres.</span>
                            </div>

                            <div class="text-center" style="clear:both;">
                            <button type="submit" class="btn btn-success btn-lg waves-effect waves-light">Guardar</button>
                        </div>
                        </form>
                       

                        
                    </div>
                </div>
                
            </div>

        </div>
    </div>
    <!--/.Modal: subscription form-->
