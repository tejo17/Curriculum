 <!--Modal: subscription form-->

 <!--Button-->
 <div class="text-center" style="clear:both;">
 <a id="edit" href="#" class="btn-floating btn-large red" data-toggle="modal" data-target="#info" >
      <i class="large material-icons">mode_edit</i>
    </a>
 </div>
 <!-- Modal -->
 <div class="modal fade" id="info" role="dialog">
 	<div class="modal-dialog">
 		<!-- Modal content-->
 		<div class="modal-content" >
 			<div class="modal-header text-center">
 				<button type="button" class="btn btn-default btn-danger pull-right" data-dismiss="modal">X</button>
 				<h4><i class="fa fa-user"></i>Información Personal</h4>
 			</div>
 			<div class="panel-body ancho">
 				
 				{{ Form::open(['action' => 'CurriculumController@update', 'method' => 'POST', 'files' => 'true']) }}
 				<fieldset>
 					<legend style="width:auto;">Estudiante</legend>
 					@include('student.partials.personalInformationFields')
 					@include('partials.upload.dragDrop')
 				</fieldset>
 				
 				<div style="margin-top:15px">
 					<span style="color:red">Aviso:</span> tus datos personales solo se modificarán durante la sesión actual, para que puedas modificar tu información personal del currículum que estás creando. No modificarán tus datos personales del registro. 
 				</div>
 				
 				<div class="form-group">
 					<div class="col-md-12 text-center">
 						<button  type="submit" class="btn btn-primary btn-login-media waves-effect waves-light" id="submit" >
 							<div class="show-responsive">
 								<i class="fa fa-user-plus" aria-hidden="true"></i>
 							</div>
 							<div class="hidden-media">
 								<i class="fa fa-btn fa-user"></i> <span class="hidden-media">Modificar</span>
 							</div>
 						</button>
 					</div>
 				</div>
 				{{ Form::close() }}
 			</div>
 		</div>
 	</div>
 </div>
 <!--/.Modal: subscription form-->




