<!--Modal: subscription form-->
    <!--Button-->
<script>
    
</script>
    <a href="#" class="btn btn-primary btn-lg waves-effect waves-light" data-toggle="modal" data-target="#lang"><i class="material-icons left">star</i>Añadir</a>
    <!-- Modal -->
    <div class="modal fade" id="hp-newsletter" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title h4,responsive">Subscription form</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form class="col-md-12">
                            
                            <br>
                            <div class="input-field">                               
                                <input id="icon_prefix" type="text" class="validate">
                                <label for="icon_prefix">Empresa</label>
                            </div>
                            <div class="input-field">                                
                                <textarea id="descripcion" class="materialize-textarea"></textarea>
                                <label for="textarea1">Descripcion</label>
                            </div>
                            <div class="input-field">
                                <i class="material-icons prefix">today</i>
                                    {{ Form::label('from', 'Desde', ['class' => 'labelpicker']) }}
                                    {{ Form::text('from',null, ['class' => 'datepicker', 'id' => 'picker']) }}
                            </div>
                                                        <div class="input-field" id="to">
                                <i class="material-icons prefix">today</i>
                                    {{ Form::label('to', 'Hasta', ['class' => 'labelpicker']) }}
                                    {{ Form::text('to',null, ['class' => 'datepicker', 'id' => 'picker']) }}
                            </div>
                            <input type="checkbox" class="filled-in" id="filled-in-box" checked="checked" />
                            <label for="filled-in-box">Filled in</label>
                            
                        </form>
                        <div class="text-center">
                            <button type="button" class="btn btn-primary waves-effect waves-light">Sumbit</button>
                        </div>
                    </div>
                </div>
                
            </div>

        </div>
    </div>
    <!--/.Modal: subscription form-->
