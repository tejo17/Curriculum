<!--Modal: subscription form-->


    <!--Button-->
    <a href="#" class="btn btn-primary btn-lg waves-effect waves-light" data-toggle="modal" data-target="#aptitudes"><i class="material-icons left">add</i>Añadir</a>
    <!-- Modal -->
    <div class="modal fade" id="aptitudes" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" >
                <div class="modal-header">
                   <button type="submit" class="btn btn-default btn-danger pull-right" data-dismiss="modal">X</button> <h4 style="text-align:center"><i class="material-icons prefix"></i> Aptitudes</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form class="col-md-12">	
							 <div class="input-field col-md-12">
                                <textarea style="border:1px lightgrey solid" class="form-control" rows="5" id="aptitudes"></textarea>
                                <br>
                                <p style="font-size:90%">Ej: Experto en programación Java, o cualquier competencia referida a la oferta.</p>
                            </div>
							<!--
							 <div class="input-field col-md-9">
                            <i class="material-icons prefix">account_circle</i>
                                {{ Form::text('aptitud', null,['id' => "aptitud"]) }}
                                {{ Form::label('aptitud', 'Aptitud') }}
                            </div>
                           <div class="col-md-3">
                                    {{ Form::label('level', 'Nivel') }}
                                    {{ Form::select('level', ['1' => 'Bajo', '2' =>'Medio', '3' => 'Alto'], null,['class' => 'form-control ',  'style'=> 'border:solid 1px lightgrey;', 'id' => 'site']) }}
                            </div>
                           -->
                        </form>
                        <br>
                        <!--Footer-->
                 <div class="text-center">
                    <button type="button" class="btn btn-success btn-lg waves-effect waves-light">Sign up</button>
                 </div>
                
                <!--/.Footer-->
                    </div>
                </div>
                
            </div>

        </div>
    </div>
    <!--/.Modal: subscription form-->
