<!--Modal: subscription form-->


    <!--Button-->
    <a href="#" class="btn btn-primary btn-lg waves-effect waves-light" data-toggle="modal" data-target="#sites"><i class="material-icons left">add</i>Añadir</a>
    <!-- Modal -->
    <div class="modal fade" id="sites" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" >
                <div class="modal-header">
                   <button type="submit" class="btn btn-default btn-danger pull-right" data-dismiss="modal">X</button> <h4 style="text-align:center; clear:both"><i class="material-icons prefix">insert_comment</i> Mensajería</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="sites" method="POST" class="col-md-12">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
							<br>
                            
                            <div class="col-md-5">
                            {{ Form::hidden('id', null,['id' => "ocultosite"]) }}
                                    {{ Form::label('site', 'Tipo de mensajería') }}
                                    {{ Form::select('site', [], null,['class' => 'form-control ',  'style'=> 'border:solid 1px lightgrey;', 'id' => 'site']) }}
                            </div>
                            <div class="input-field col-md-7">
                            <i class="material-icons prefix">account_circle</i>
                                {{ Form::text('personalsite', null,['id' => "personalsite"]) }}
                                {{ Form::label('personalsite', 'Sitio Personal') }}
                            </div>
                            
                             <div class="text-center">
                                <button type="submit" class="btn btn-success btn-lg waves-effect waves-light">Guardar</button>
                             </div>
                        </form>
                        <!--Footer-->
                
                <!--/.Footer-->
                    </div>
                </div>
                
            </div>

        </div>
    </div>
    <!--/.Modal: subscription form-->
