
 
 <!--Button-->
    <a href="#" class="btn btn-primary btn-lg waves-effect waves-light" data-toggle="modal" data-target="#licenses"><i class="material-icons left">add</i>Añadir</a>
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
                            <form>
                               
                                <!--MOTOS-->
                                <div class="input-field col-md-3">
                              
                                {{ HTML::image('img/sprite/am.png', 'alt', array( 'width' => 70, 'height' => 50 )) }}
                               <br>
                                 <input type="checkbox" class="filled-in" id="am"/>
                                 <label for="am">AM</label>
                                <br><br>
                                  {{ HTML::image('img/sprite/a1.png', 'alt', array( 'width' => 70, 'height' => 50 )) }}
                               <br>
                                 <input type="checkbox" class="filled-in" id="a1"/>
                                 <label for="a1">A1</label>
                                  <br><br>
                                  {{ HTML::image('img/sprite/a2.png', 'alt', array( 'width' => 70, 'height' => 50 )) }}
                               <br>
                                 <input type="checkbox" class="filled-in" id="a2"/>
                                 <label for="a2">A2</label>
                                 <br><br>
                                  {{ HTML::image('img/sprite/a.png', 'alt', array( 'width' => 70, 'height' => 50 )) }}
                               <br>
                                 <input type="checkbox" class="filled-in" id="a"/>
                                 <label for="a">A</label>
   
                                </div>

                                 <!--COCHES-->
                                <div class="input-field col-md-3">
                                   {{ HTML::image('img/sprite/b1.png', 'alt', array( 'width' => 70, 'height' => 50 )) }}
                               <br>
                                 <input type="checkbox" class="filled-in" id="b1"/>
                                 <label for="b1">B1</label>
                                 <br><br>
                                {{ HTML::image('img/sprite/b.png', 'alt', array( 'width' => 70, 'height' => 50 )) }}
                               <br>
                                 <input type="checkbox" class="filled-in" id="b"/>
                                 <label for="b">B</label>
                                <br><br>
                                  {{ HTML::image('img/sprite/be.png', 'alt', array( 'width' => 90, 'height' => 50 )) }}
                               <br>
                                 <input type="checkbox" class="filled-in" id="be">
                                 <label for="be">BE</label>
                                  <br><br>
                                {{ HTML::image('img/sprite/btp.jpg', 'alt', array( 'width' => 80, 'height' => 50 )) }}
                               <br>
                                 <input type="checkbox" class="filled-in" id="btp">
                                 <label for="btp">BTP</label>
                                  <br><br>
                               
   
                                </div>
                                 <!--CAMIONES-->
                                <div class="input-field col-md-3">
                              
                                {{ HTML::image('img/sprite/c1.png', 'alt', array( 'width' => 90, 'height' => 50 )) }}
                               <br>
                                 <input type="checkbox" class="filled-in" id="c1"/>
                                 <label for="c1">C1</label>
                                <br><br>
                                  {{ HTML::image('img/sprite/c.png', 'alt', array( 'width' => 90, 'height' => 50 )) }}
                               <br>
                                 <input type="checkbox" class="filled-in" id="c"/>
                                 <label for="c">C</label>
                                  <br><br>
                                  {{ HTML::image('img/sprite/c1e.png', 'alt', array( 'width' => 90, 'height' => 50 )) }}
                               <br>
                                 <input type="checkbox" class="filled-in" id="c1e"/>
                                 <label for="c1e">C1E</label>
                                 <br><br>
                                  {{ HTML::image('img/sprite/ce.png', 'alt', array( 'width' => 90, 'height' => 50 )) }}
                               <br>
                                 <input type="checkbox" class="filled-in" id="ce"/>
                                 <label for="ce">CE</label>
   
                                </div>
                                 <!--BUSES-->
                                <div class="input-field col-md-3">
                              
                                {{ HTML::image('img/sprite/d1.png', 'alt', array( 'width' => 110, 'height' => 50 )) }}
                               <br>
                                 <input type="checkbox" class="filled-in" id="d1"/>
                                 <label for="d1">D1</label>
                                <br><br>
                                  {{ HTML::image('img/sprite/d.png', 'alt', array( 'width' => 110, 'height' => 50 )) }}
                               <br>
                                 <input type="checkbox" class="filled-in" id="d"/>
                                 <label for="d">D</label>
                                  <br><br>
                                  {{ HTML::image('img/sprite/d1e.png', 'alt', array( 'width' => 110, 'height' => 50 )) }}
                               <br>
                                 <input type="checkbox" class="filled-in" id="d1e"/>
                                 <label for="d1e">D1E</label>
                                 <br><br>
                                  {{ HTML::image('img/sprite/de.png', 'alt', array( 'width' => 110, 'height' => 50 )) }}
                               <br>
                                 <input type="checkbox" class="filled-in" id="de"/>
                                 <label for="de">DE</label>
   
                                </div>
                              
                                

                            </form>
                            <!--/.Form-->
                        </div>                    
                    </div>
                </div>
                <!--/.Body-->

                <!--Footer-->
                 <div class="text-center">
                    <button type="button" class="btn btn-success btn-lg waves-effect waves-light">Guardar</button>
                 </div>
                
                <!--/.Footer-->
            </div>
        </div>
    </div>
    <!--/.Modal-->