<!--Modal: subscription form-->


<!--Button-->
<div class="text-center" style="clear:both;">
<a href="#" class="btn btn-primary btn-lg waves-effect waves-light" data-toggle="modal" data-target="#aptitudes"><i class="material-icons left">add</i>Añadir</a>
</div>
<!-- Modal -->
<div class="modal fade" id="aptitudes" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content" >
            <div class="modal-header">
             <button class="btn btn-default btn-danger pull-right" data-dismiss="modal">X</button> <h4 style="text-align:center; clear:both"><i class="material-icons prefix"></i> Aptitudes</h4>
         </div>
         <div class="modal-body">
            <div class="row">
                {{ Form::open(['route' => 'estudiante.aptitudes.store', 'method' => 'POST', 'class' => 'col-md-12']) }}	
                    <div class="input-field col-md-12">
                        {{ Form::hidden('id', null,['id' => "ocultoaptitude"]) }}
                        <span class="pull-right">Máximo 250 caracteres.</span>
                        {{ Form::textarea('aptitude', null, ['class' => 'form-control', 'id' => 'aptitude', 'maxlength' => '250', 'style' => 'border:1px lightgrey solid; padding-left:10px; padding-top:10px;', 'rows' => '5']) }}                   
                    </div>
                    <p style="font-size:90%; margin-left:15px">Ej: Experto en programación Java, o cualquier competencia referida a la oferta.</p>
                    <br>
                    <!--Footer-->
                    <div class="text-center">
                        <button type="submit" class="btn btn-success btn-lg waves-effect waves-light">Guardar</button>
                    </div>
                {{ Form::close()}}
                <!--/.Footer-->
            </div>
        </div>

    </div>

</div>
</div>
<!--/.Modal: subscription form-->
