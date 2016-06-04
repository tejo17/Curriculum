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
               <h4 class="modal-title h4,responsive" style="text-align:center; clear:both"><i class="material-icons prefix">account_circle</i>Ciclo</h4>
           </div>
           <div class="modal-body">
            <div class="row">
                <form class="col-md-12" method="POST" action="educationsFormations">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                    <br>
                    {{ Form::text('id', null, ['id' => 'ocultoEducation']) }}
                   
                    
                    <div class="input-field col-md-12">
                        <i class="material-icons prefix">library_books</i>
                        {{ Form::text('family', null,['id' => "family"]) }}
                        {{ Form::label('family', 'Familia profesional') }}
                    </div>

                      <div class="col-md-12">
                        {{ Form::label('cycle', 'Ciclo') }}
                        {{ Form::select('cycle', [], null,['class' => 'form-control ',  'style'=> 'border:solid 1px lightgrey;', 'id' => 'cycle']) }}
                    </div>
                    
                    <div class="input-field col-md-12">
                        <i class="material-icons prefix">business center</i>
                        {{ Form::text('center', null,['id' => "center"]) }}
                        {{ Form::label('center', 'Centro') }}
                    </div>

                     <div class="input-field col-md-12">
                        <i class="material-icons prefix">location_city</i>
                        {{ Form::text('stateCycle', null,['id' => "stateform"]) }}
                        {{ Form::label('stateCycle', 'Provincia') }}
                    </div>

                    <div class="col-md-12">
                        {{ Form::label('cityCycle', 'Población') }}
                        {{ Form::select('cityCycle', [], null,['class' => 'form-control ',  'style'=> 'border:solid 1px lightgrey;', 'id' => 'cityform']) }}
                    </div>

					@for ($i = 1960; $i <= 2016; $i++)
					  <?php $array[$i] = $i ?>
					@endfor
					

					<div class="col-md-6" style="margin-top:10px">
                        {{ Form::label('dateFrom', 'Desde') }}
                        {{ Form::select('dateFrom', $array, null,['class' => 'form-control ',  'style'=> 'border:solid 1px lightgrey;', 'id' => 'dateFrom']) }}
                    </div>

                    <div class="col-md-6" id="divToForm" style="margin-top:10px">
                        {{ Form::label('dateTo', 'Hasta') }}
                        {{ Form::select('dateTo', $array, null,['class' => 'form-control ',  'style'=> 'border:solid 1px lightgrey;', 'id' => 'dateTo']) }}
                    </div>

		              <div class="input-field col-md-12"  style="margin-bottom:20px">
		                {{ Form::checkbox('nowForm', '', false, ['id' => 'nowForm', 'class' => 'filled-in']) }}
		                {{ Form::label('nowForm', 'Cursando actualmente', ['for' => 'nowForm']) }}
		                {{ Form::hidden('actualForm', null, ['id' => 'actualForm']) }}
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
