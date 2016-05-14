<!--Modal: subscription form-->


    <!--Button-->
    <a href="#" class="btn btn-primary btn-lg waves-effect waves-light" data-toggle="modal" data-target="#languages"><i class="material-icons left">add</i>Añadir</a>
    <!-- Modal -->
    <div class="modal fade" id="languages" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" >
                <div class="modal-header">
                   <button type="submit" class="btn btn-default btn-danger pull-right" data-dismiss="modal">X</button> <h4 style="text-align:center; clear:both"><i class="material-icons prefix">language</i> Idiomas</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="languages" method="POST" class="col-md-12">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            <br>
                            
                            <div class="col-md-4" style="color:black;">
                                    {{ Form::label('language', 'Idioma') }}
                                    {{ Form::select('language', [], null,['class' => 'form-control ',  'style'=> 'border:solid 1px lightgrey;', 'id' => 'language']) }}
                                     {{ Form::hidden('id', null,['id' => "ocultolanguage"]) }}                        
                            </div>
                            <div class="col-md-12" style="border-top:1px lightgrey solid; border-bottom:1px lightgrey solid; margin-top:40px">
                                <h5 style='text-align:center'>Nivel</h5>
                            </div>
                            <div class="col-md-4" style="clear:both; margin-top:20px">
                                    {{ Form::label('readingComprehension', 'Comprensión lectora') }}
                                    {{ Form::select('readingComprehension', ['bajo' => 'Bajo', 'medio' => 'Medio', 'alto' => 'Alto'], null,['class' => 'form-control ',  'style'=> 'border:solid 1px lightgrey;', 'id' => 'readingComprehension']) }}
                            </div>
                            <div class="col-md-4" style="margin-top:20px">
                                    {{ Form::label('WrittedExpression', 'Expresión escrita') }}
                                    {{ Form::select('WrittedExpression', ['bajo' => 'Bajo', 'medio' => 'Medio', 'alto' => 'Alto'], null,['class' => 'form-control ',  'style'=> 'border:solid 1px lightgrey;', 'id' => 'WrittedExpression']) }}
                            </div>
                            <div class="col-md-4" style="clear:both; margin-top:10px">
                                    {{ Form::label('listeningComprehension', 'Compresión Auditiva') }}
                                    {{ Form::select('listeningComprehension', ['bajo' => 'Bajo', 'medio' => 'Medio', 'alto' => 'Alto'], null,['class' => 'form-control ',  'style'=> 'border:solid 1px lightgrey;', 'id' => 'listeningComprehension']) }}
                            </div>
                            <div class="col-md-4" style="margin-bottom:15px; margin-top:10px">
                                    {{ Form::label('oralExpression', 'Expresión Oral') }}
                                    {{ Form::select('oralExpression', ['bajo' => 'Bajo', 'medio' => 'Medio', 'alto' => 'Alto'], null,['class' => 'form-control ',  'style'=> 'border:solid 1px lightgrey;', 'id' => 'oralExpression']) }}
                            </div>   
                             <div class="text-center" style="clear:both;">
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
