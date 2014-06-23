        <div class="row">
          <div class="col-lg-12">
            <br><br>
            <ol class="breadcrumb">
             
              <li class="active"></i><center><h4>Baja de un Activo Fijo</h4></center></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

            <!-- /.row -->
               <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                      <form  method="post" role="form">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Accion</th>
                                                                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                             <?php foreach ($activo as $activo):?>
                                            <tr>
                                             
                                            <td><?= $activo->id_activofijo?></td>   
                                            <td><?= $activo->nombre_activo_fijo?></td>
                                            <td><?= $activo->descripcion?></td>
                                            
                                            <input  type="hidden" name="post" value="1" /> 
                                           
                                           <td align="center"><button type="button" onclick=location="<?php echo base_url().'crud_baja/editar/'.$activo->id_activofijo; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>&nbsp;Dar De Baja</button></td>
                                           
                                            </tr>
                                          <?php endforeach ;?>
                                    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->                           
                        </div>
                        <!-- /.panel-body -->
                     </form>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>