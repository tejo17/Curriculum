<!--Modal: subscription form-->


    <!--Button-->
    <a href="#" class="btn btn-primary btn-lg waves-effect waves-light" data-toggle="modal" data-target="#exp"><i class="material-icons left">add</i>Añadir</a>
    <!-- Modal -->
    <div class="modal fade" id="exp" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title h4,responsive">Experiencia Profesional</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form class="col-md-12">
                                                    
  
                            <br>
                            <div class="input-field col-md-12">
                            <i class="material-icons prefix">business center</i>
                                {{ Form::text('enterprise', null,['id' => "enterprise"]) }}
                                {{ Form::label('enterprise', 'Empresa') }}
                            </div>
                            <div class="input-field col-md-12">
                            <i class="material-icons prefix">location_city</i>
                                {{ Form::text('state', null,['id' => "state"]) }}
                                {{ Form::label('state', 'Provincia') }}
                            </div>

                            <div class="col-md-12">
                                    {{ Form::label('city', 'Población') }}
                                    {{ Form::select('city', [], null,['class' => 'form-control ',  'style'=> 'border:solid 1px lightgrey;', 'id' => 'city']) }}
                            </div>
                            <div class="input-field col-md-12">
                            <i class="material-icons prefix">description</i>                                
                                 <label for="comment">Descripcion</label>
                                <textarea class="form-control" rows="4" id="description"></textarea>
                            </div>
                            <div class="input-field col-md-12">
                                <i class="material-icons prefix">today</i>
                                    {{ Form::label('from', 'Desde', ['class' => 'labelpicker']) }}
                                    {{ Form::text('from',null, ['class' => 'datepicker', 'id' => 'picker1']) }}
                            </div>
                            <div class="input-field col-md-12" id="to">
                                <i class="material-icons prefix">today</i>
                                    {{ Form::label('to', 'Hasta', ['class' => 'labelpicker']) }}
                                    {{ Form::text('to',null, ['class' => 'datepicker', 'id' => 'picker2']) }}
                            </div>
                            <div class="input-field col-md-12" id="to">
                            {{ Form::checkbox('now', '', false, ['id' => 'now', 'class' => 'filled-in']) }}
                            {{ Form::label('now', 'Cursando actualmente', ['for' => 'now']) }}
                            </div>
                        </form>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary waves-effect waves-light">Guardar</button>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>
    <!--/.Modal: subscription form-->
