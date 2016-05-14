 <!--Modal: subscription form-->

 <!--Button-->
 <a href="#" class="btn btn-primary btn-lg waves-effect waves-light" data-toggle="modal" data-target="#info"><i class="material-icons left">add</i>Añadir</a>
 <!-- Modal -->
 <div class="modal fade" id="info" role="dialog">
 	<div class="modal-dialog">
 		<!-- Modal content-->
 		<div class="modal-content" >
 			<div class="modal-header text-center">
 				<h4><i class="fa fa-graduation-cap"></i>Formulario de alta de estudiantes</h4>
 			</div>

 			<div class="panel-body ancho">
 				@if(Session::has('message'))
 				<p class="alert alert-success">{{Session::get('message')}}</p>
 				@endif
 				{{ Form::open(['route' => 'estudiante..store', 'method' => 'POST', 'files' => 'true', 'id' => 'student-register-form']) }}
 				{!! csrf_field() !!}
 				<fieldset>
 					<legend style="width:auto;">Estudiante</legend>
 					@include('student.partials.studentfields')
 				</fieldset>
 				<div class="form-group">
 					<div class="col-md-12 text-center">
 						<button type="submit" class="btn btn-primary btn-login-media waves-effect waves-light" id="submit" >
 							<div class="show-responsive">
 								<i class="fa fa-user-plus" aria-hidden="true"></i>
 							</div>
 							<div class="hidden-media">
 								<i class="fa fa-btn fa-user"></i> <span class="hidden-media">Registrar</span>
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




