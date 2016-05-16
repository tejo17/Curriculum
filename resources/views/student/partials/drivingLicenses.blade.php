
 
 <!--Button-->
    <a href="#" class="btn btn-primary btn-lg waves-effect waves-light" data-toggle="modal" data-target="#licenses"> <i class="material-icons left">add</i>Añadir</a>
    <!-- Modal -->

    <!-- Modal -->
    <div class="modal fade" id="licenses" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header text-center">
  
                   <button type="submit" class="btn btn-default btn-danger pull-right" data-dismiss="modal">X</button> <h4 style="clear:both"><i class="fa fa-car"></i> Licencias de conducir. </h4>
                   
                </div>
                <!--/.Header-->

                <!--Body-->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!--Form-->
                            <form action="drivingLicenses" method="POST" class="col-md-12">
                               <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                <!--MOTOS-->
                                <div class="input-field col-md-3">
                               {{ Form::text('id', null,['id' => "ocultolicense"]) }}
                                {{ HTML::image('img/sprite/am.png', 'alt', array( 'width' => 70, 'height' => 50 )) }}
                               <br>

                                {{ Form::checkbox('drivingLicense[]', '1', null, ['id' => 'AM', 'class' => 'filled-in']) }}
                                {{ Form::label('AM') }}
                                <br><br>
                                  {{ HTML::image('img/sprite/a1.png', 'alt', array( 'width' => 70, 'height' => 50 )) }}
                               <br>
                                 {{ Form::checkbox('drivingLicense[]', '2', null, ['id' => 'A1', 'class' => 'filled-in']) }}
                                {{ Form::label('A1') }}
                                  <br><br>
                                  {{ HTML::image('img/sprite/a2.png', 'alt', array( 'width' => 70, 'height' => 50 )) }}
                               <br>
                                 {{ Form::checkbox('drivingLicense[]', '3', null, ['id' => 'A2', 'class' => 'filled-in']) }}
                                {{ Form::label('A2') }}
                                 <br><br>
                                  {{ HTML::image('img/sprite/a.png', 'alt', array( 'width' => 70, 'height' => 50 )) }}
                               <br>
                                 {{ Form::checkbox('drivingLicense[]', '4', null, ['id' => 'A', 'class' => 'filled-in']) }}
                                {{ Form::label('A') }}
   
                                </div>

                                 <!--COCHES-->
                                <div class="input-field col-md-3">
                                   {{ HTML::image('img/sprite/b1.png', 'alt', array( 'width' => 70, 'height' => 50 )) }}
                               <br>
                                 {{ Form::checkbox('drivingLicense[]', '5', null, ['id' => 'B1', 'class' => 'filled-in']) }}
                                {{ Form::label('B1') }}
                                 <br><br>
                                {{ HTML::image('img/sprite/b.png', 'alt', array( 'width' => 70, 'height' => 50 )) }}
                               <br>
                                 {{ Form::checkbox('drivingLicense[]', '6', null, ['id' => 'B', 'class' => 'filled-in']) }}
                                {{ Form::label('B') }}
                                <br><br>
                                  {{ HTML::image('img/sprite/be.png', 'alt', array( 'width' => 90, 'height' => 50 )) }}
                               <br>
                                {{ Form::checkbox('drivingLicense[]', '7', null, ['id' => 'BE', 'class' => 'filled-in']) }}
                                {{ Form::label('BE') }}
                                  <br><br>
                                {{ HTML::image('img/sprite/btp.jpg', 'alt', array( 'width' => 80, 'height' => 50 )) }}
                               <br>
                                 {{ Form::checkbox('drivingLicense[]', '8', null, ['id' => 'BTP', 'class' => 'filled-in']) }}
                                {{ Form::label('BTP') }}
                                  <br><br>
                               
   
                                </div>
                                 <!--CAMIONES-->
                                <div class="input-field col-md-3">
                              
                                {{ HTML::image('img/sprite/c1.png', 'alt', array( 'width' => 90, 'height' => 50 )) }}
                               <br>
                                {{ Form::checkbox('drivingLicense[]', '9', null, ['id' => 'C1', 'class' => 'filled-in']) }}
                                {{ Form::label('C1') }}
                                <br><br>
                                  {{ HTML::image('img/sprite/c.png', 'alt', array( 'width' => 90, 'height' => 50 )) }}
                               <br>
                                 {{ Form::checkbox('drivingLicense[]', '10', null, ['id' => 'C', 'class' => 'filled-in']) }}
                                {{ Form::label('C') }}
                                  <br><br>
                                  {{ HTML::image('img/sprite/c1e.png', 'alt', array( 'width' => 90, 'height' => 50 )) }}
                               <br>
                                 {{ Form::checkbox('drivingLicense[]', '11', null, ['id' => 'C1E', 'class' => 'filled-in']) }}
                                {{ Form::label('C1E') }}
                                 <br><br>
                                  {{ HTML::image('img/sprite/ce.png', 'alt', array( 'width' => 90, 'height' => 50 )) }}
                               <br>
                                 {{ Form::checkbox('drivingLicense[]', '12', null, ['id' => 'CE', 'class' => 'filled-in']) }}
                                {{ Form::label('CE') }}
   
                                </div>
                                 <!--BUSES-->
                                <div class="input-field col-md-3">
                              
                                {{ HTML::image('img/sprite/d1.png', 'alt', array( 'width' => 110, 'height' => 50 )) }}
                               <br>
                                 {{ Form::checkbox('drivingLicense[]', '13', null, ['id' => 'D1', 'class' => 'filled-in']) }}
                                {{ Form::label('D1') }}
                                <br><br>
                                  {{ HTML::image('img/sprite/d.png', 'alt', array( 'width' => 110, 'height' => 50 )) }}
                               <br>
                                 {{ Form::checkbox('drivingLicense[]', '14', null, ['id' => 'D', 'class' => 'filled-in']) }}
                                {{ Form::label('D') }}
                                  <br><br>
                                  {{ HTML::image('img/sprite/d1e.png', 'alt', array( 'width' => 110, 'height' => 50 )) }}
                               <br>
                                 {{ Form::checkbox('drivingLicense[]', '15', null, ['id' => 'D1E', 'class' => 'filled-in']) }}
                                {{ Form::label('D1E') }}
                                 <br><br>
                                  {{ HTML::image('img/sprite/de.png', 'alt', array( 'width' => 110, 'height' => 50 )) }}
                               <br>
                                 {{ Form::checkbox('drivingLicense[]', '16', null, ['id' => 'DE', 'class' => 'filled-in']) }}
                                {{ Form::label('DE') }}
   
                                </div>
                              
                                 <!--Footer-->
                             <div class="text-center" style="clear:both">
                                <button type="submit" class="btn btn-success btn-lg waves-effect waves-light ">Guardar</button>
                             </div>
                            
                            <!--/.Footer-->

                            </form>
                            <!--/.Form-->
                        </div>                    
                    </div>
                </div>
                <!--/.Body-->

               
            </div>
        </div>
    </div>
    <!--/.Modal-->