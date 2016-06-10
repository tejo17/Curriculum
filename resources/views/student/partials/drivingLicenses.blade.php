

<!--Button-->
<div id="btn-license" class="text-center" style="clear:both;">
  <a href="#" class="btn btn-primary btn-lg waves-effect waves-light" data-toggle="modal" data-target="#licenses"> <i class="material-icons left">add</i>Añadir</a>
</div>
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
             {{ Form::hidden('id', null,['id' => "ocultolicense"]) }}
             {{ HTML::image('img/sprite/am.png', 'alt', array( 'width' => 70, 'height' => 50 )) }}
             <br>

             {{ Form::checkbox('drivingLicense[]', 'AM', null, ['id' => 'AM', 'class' => 'filled-in']) }}
             {{ Form::label('AM') }}
             <br><br>
             {{ HTML::image('img/sprite/a1.png', 'alt', array( 'width' => 70, 'height' => 50 )) }}
             <br>
             {{ Form::checkbox('drivingLicense[]', 'A1', null, ['id' => 'A1', 'class' => 'filled-in']) }}
             {{ Form::label('A1') }}
             <br><br>
             {{ HTML::image('img/sprite/a2.png', 'alt', array( 'width' => 70, 'height' => 50 )) }}
             <br>
             {{ Form::checkbox('drivingLicense[]', 'A2', null, ['id' => 'A2', 'class' => 'filled-in']) }}
             {{ Form::label('A2') }}
             <br><br>
             {{ HTML::image('img/sprite/a.png', 'alt', array( 'width' => 70, 'height' => 50 )) }}
             <br>
             {{ Form::checkbox('drivingLicense[]', 'A', null, ['id' => 'A', 'class' => 'filled-in']) }}
             {{ Form::label('A') }}
             
           </div>

           <!--COCHES-->
           <div class="input-field col-md-3">
             {{ HTML::image('img/sprite/b1.png', 'alt', array( 'width' => 70, 'height' => 50 )) }}
             <br>
             {{ Form::checkbox('drivingLicense[]', 'B1', null, ['id' => 'B1', 'class' => 'filled-in']) }}
             {{ Form::label('B1') }}
             <br><br>
             {{ HTML::image('img/sprite/b.png', 'alt', array( 'width' => 70, 'height' => 50 )) }}
             <br>
             {{ Form::checkbox('drivingLicense[]', 'B', null, ['id' => 'B', 'class' => 'filled-in']) }}
             {{ Form::label('B') }}
             <br><br>
             {{ HTML::image('img/sprite/be.png', 'alt', array( 'width' => 90, 'height' => 50 )) }}
             <br>
             {{ Form::checkbox('drivingLicense[]', 'BE', null, ['id' => 'BE', 'class' => 'filled-in']) }}
             {{ Form::label('BE') }}
             <br><br>
             {{ HTML::image('img/sprite/btp.jpg', 'alt', array( 'width' => 80, 'height' => 50 )) }}
             <br>
             {{ Form::checkbox('drivingLicense[]', 'BTP', null, ['id' => 'BTP', 'class' => 'filled-in']) }}
             {{ Form::label('BTP') }}
             <br><br>
             
             
           </div>
           <!--CAMIONES-->
           <div class="input-field col-md-3">
            
            {{ HTML::image('img/sprite/c1.png', 'alt', array( 'width' => 90, 'height' => 50 )) }}
            <br>
            {{ Form::checkbox('drivingLicense[]', 'C1', null, ['id' => 'C1', 'class' => 'filled-in']) }}
            {{ Form::label('C1') }}
            <br><br>
            {{ HTML::image('img/sprite/c.png', 'alt', array( 'width' => 90, 'height' => 50 )) }}
            <br>
            {{ Form::checkbox('drivingLicense[]', 'C', null, ['id' => 'C', 'class' => 'filled-in']) }}
            {{ Form::label('C') }}
            <br><br>
            {{ HTML::image('img/sprite/c1e.png', 'alt', array( 'width' => 90, 'height' => 50 )) }}
            <br>
            {{ Form::checkbox('drivingLicense[]', 'C1E', null, ['id' => 'C1E', 'class' => 'filled-in']) }}
            {{ Form::label('C1E') }}
            <br><br>
            {{ HTML::image('img/sprite/ce.png', 'alt', array( 'width' => 90, 'height' => 50 )) }}
            <br>
            {{ Form::checkbox('drivingLicense[]', 'CE', null, ['id' => 'CE', 'class' => 'filled-in']) }}
            {{ Form::label('CE') }}
            
          </div>
          <!--BUSES-->
          <div class="input-field col-md-3">
            
            {{ HTML::image('img/sprite/d1.png', 'alt', array( 'width' => 110, 'height' => 50 )) }}
            <br>
            {{ Form::checkbox('drivingLicense[]', 'D1', null, ['id' => 'D1', 'class' => 'filled-in']) }}
            {{ Form::label('D1') }}
            <br><br>
            {{ HTML::image('img/sprite/d.png', 'alt', array( 'width' => 110, 'height' => 50 )) }}
            <br>
            {{ Form::checkbox('drivingLicense[]', 'D', null, ['id' => 'D', 'class' => 'filled-in']) }}
            {{ Form::label('D') }}
            <br><br>
            {{ HTML::image('img/sprite/d1e.png', 'alt', array( 'width' => 110, 'height' => 50 )) }}
            <br>
            {{ Form::checkbox('drivingLicense[]', 'D1E', null, ['id' => 'D1E', 'class' => 'filled-in']) }}
            {{ Form::label('D1E') }}
            <br><br>
            {{ HTML::image('img/sprite/de.png', 'alt', array( 'width' => 110, 'height' => 50 )) }}
            <br>
            {{ Form::checkbox('drivingLicense[]', 'DE', null, ['id' => 'DE', 'class' => 'filled-in']) }}
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