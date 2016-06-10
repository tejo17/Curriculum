<!--Modal: subscription form-->


    <!--Button-->
    <div class="text-center" style="clear:both;">
    <a href="#" class="btn btn-primary btn-lg waves-effect waves-light" data-toggle="modal" data-target="#certif"><i class="material-icons left">add</i>Añadir</a>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="certif" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" >
                <div class="modal-header">
                     <button type="button" class="btn btn-default btn-danger pull-right" data-dismiss="modal">X</button>
                    <h4 class="modal-title h4,responsive" style="text-align:center; clear:both"><i class="fa fa-graduation-cap"></i>Certificaciones</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="certifications" method="POST" class="col-md-12">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                   			 <br>
                             {{ Form::hidden('id', null,['id' => "ocultocertification"]) }}
                             <div class="input-field col-md-12">
                            <i class="material-icons prefix">library_books</i>
                                {{ Form::text('certification', null,['id' => "certification"]) }}
                                {{ Form::label('certification', 'Certificación') }}
                            </div>
                            <div class="input-field col-md-12">
                            <i class="material-icons prefix">location_city</i>
                                {{ Form::text('institution', null,['id' => "institution"]) }}
                                {{ Form::label('institution', 'Institución') }}
                            </div>
                            
                             <div class="input-field col-md-12">
                                <p style="color:#9e9e9e; font-weight:400">Descripción</p>
                                {{ Form::textarea('descriptionCertif', null, ['class' => 'form-control', 'id' => 'description', 'maxlength' => '250', 'style' => 'border:1px lightgrey solid; padding-left:10px; padding-top:10px;', 'rows' => '5']) }}
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
