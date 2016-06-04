<!--Modal: subscription form-->


<!--Button-->
<a href="#" class="btn btn-primary btn-lg waves-effect waves-light" data-toggle="modal" data-target="#education"><i class="material-icons left">add</i>Añadir</a>
<!-- Modal -->
<div class="modal fade" id="education" role="dialog">
    <div class="modal-dialog">


        <!-- Modal content-->
        <div class="modal-content" >
            <div class="modal-header">
               <button type="submit" class="btn btn-default btn-danger pull-right" data-dismiss="modal">X</button>
               <h4 class="modal-title h4,responsive" style="text-align:center; clear:both"><i class="material-icons prefix">account_circle</i>Ciclos</h4>
           </div>
           <div class="modal-body">
            <div class="row">
                <form class="col-md-12" method="POST" action="educationsFormations">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <br>
                    {{ Form::hidden('id', null, ['id' => 'ocultoEducation']) }}
                   
                    
                    <div class="input-field col-md-12">
                        <i class="material-icons prefix">business center</i>
                        {{ Form::text('family', null,['id' => "family"]) }}
                        {{ Form::label('family', 'Familia profesional') }}
                    </div>

                      <div class="col-md-12">
                        {{ Form::label('cycle', 'Ciclo') }}
                        {{ Form::select('cycle', [], null,['class' => 'form-control ',  'style'=> 'border:solid 1px lightgrey;', 'id' => 'cycle']) }}
                    </div>
                    
                      <div class="input-field col-md-12">
                        <i class="material-icons prefix">location_city</i>
                        {{ Form::text('state', null,['id' => "stateform"]) }}
                        {{ Form::label('state', 'Provincia') }}
                    </div>

                    <div class="col-md-12">
                        {{ Form::label('city', 'Población') }}
                        {{ Form::select('city', [], null,['class' => 'form-control ',  'style'=> 'border:solid 1px lightgrey;', 'id' => 'cityform']) }}
                    </div>

                  	<div class="input-field col-md-12">
                        <i class="material-icons prefix">business center</i>
                        {{ Form::text('center', null,['id' => "center"]) }}
                        {{ Form::label('center', 'Centro') }}
                    </div>

                    <div class="input-field col-md-12">
                        <i class="material-icons prefix">business center</i>
                        {{ Form::text('dateFrom', null,['id' => "dateFrom"]) }}
                        {{ Form::label('dateFrom', 'Desde') }}
                    </div>
                    <div class="input-field col-md-12">
                        <i class="material-icons prefix">business center</i>
                        {{ Form::text('dateTo', null,['id' => "dateTo"]) }}
                        {{ Form::label('dateTo', 'Hasta') }}
                    </div>

		              <div class="input-field col-md-12"  style="margin-bottom:20px">
		                {{ Form::checkbox('now', '', false, ['id' => 'now', 'class' => 'filled-in']) }}
		                {{ Form::label('now', 'Cursando actualmente', ['for' => 'now']) }}
		                {{ Form::hidden('actual', null, ['id' => 'actual']) }}
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
