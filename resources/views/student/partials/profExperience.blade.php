<!--Modal: subscription form-->


    <!--Button-->
    <a href="#" class="btn btn-primary btn-lg waves-effect waves-light" data-toggle="modal" data-target="#exp"><i class="material-icons left">add</i>Añadir</a>
    <!-- Modal -->
    <div class="modal fade" id="exp" role="dialog">
        <div class="modal-dialog">


            <!-- Modal content-->
            <div class="modal-content" >
                <div class="modal-header">
                     <button type="submit" class="btn btn-default btn-danger pull-right" data-dismiss="modal">X</button>
                    <h4 class="modal-title h4,responsive" style="text-align:center; clear:both"><i class="material-icons prefix">account_circle</i>Experiencia Profesional</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form class="col-md-12" method="POST" action="professionalExperiences">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            <br>
                            <div class="input-field col-md-12">
                            <i class="material-icons prefix">business center</i>
                                {{ Form::text('job', null,['id' => "job"]) }}
                                {{ Form::label('job', 'Oficio') }}
                            </div>
                            <div class="input-field col-md-12">
                            <i class="material-icons prefix">business center</i>
                                {{ Form::text('enterprise', null,['id' => "enterprise"]) }}
                                {{ Form::label('enterprise', 'Empresa') }}
                            </div>
                            <div class="input-field col-md-12">
                            <i class="material-icons prefix">location_city</i>
                                {{ Form::text('state', null,['id' => "stateexp"]) }}
                                {{ Form::label('state', 'Provincia') }}
                            </div>

                            <div class="col-md-12">
                                    {{ Form::label('city', 'Población') }}
                                    {{ Form::select('city', [], null,['class' => 'form-control ',  'style'=> 'border:solid 1px lightgrey;', 'id' => 'cityexp']) }}
                            </div>
                             <div class="input-field col-md-12">
                                <p style="color:#9e9e9e; font-weight:400">Descripción</p>
                                {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description', 'maxlength' => '250', 'style' => 'border:1px lightgrey solid; padding-left:10px; padding-top:10px;', 'rows' => '5']) }}
                                <span class="pull-right">Máximo 250 caracteres.</span>
                            </div>
                                <br>
                                
                        



    <div class='col-md-6'>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker6'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>
    <div class='col-md-6'>
        <div class="form-group">
            <div class='input-group date' id='datetimepicker7'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>
    </div>




                            <!-- <div class="input-field col-md-6">
                                <i class="material-icons prefix">today</i>
                                    {{ Form::label('from', 'Desde', ['class' => 'labelpicker']) }}
                                    {{ Form::text('from',null, ['class' => 'datepicker', 'id' => 'datepicker']) }}
                            </div>
                            <div class="input-field col-md-6" id="to">
                                <i class="material-icons prefix">today</i>
                                    {{ Form::label('to', 'Hasta', ['class' => 'labelpicker']) }}
                                    {{ Form::text('to',null, ['class' => 'datepickers', 'id' => 'otrodatepicker']) }}
                            </div> -->
                            <div class="input-field-md-12" id="to" style="margin-bottom:20px">
                            {{ Form::checkbox('now', '', false, ['id' => 'now', 'class' => 'filled-in']) }}
                            {{ Form::label('now', 'Cursando actualmente', ['for' => 'now']) }}
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
