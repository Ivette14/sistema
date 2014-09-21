 <div class="row">
          <div class="col-lg-12">
            
            <br><br>
            <ol class="breadcrumb">
             
              <li class="active"></i><center><h4> Gestor de Areas</h4></center></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

            <!-- /.row -->
        <div class="form-group"> <button type="button" onclick=location="<?php echo base_url().'crud_area/Agregar'; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;Agregar</button></div>       
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                      <form method="post" role="form">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>                                            
                                            <th>Nombre de la Area</th>                                            
                                            <th>Editar</th>
                                         <!--     <th>Eliminar</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>                                           
                                            <?php foreach ($areas as $area):?>
                                            <tr>                                            
                                            <td><?= $area->nombre_area?></td>
                                            <td align="center"><button type="button" onclick=location="<?php echo base_url().'crud_area/editar/'.$area->id_area; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>&nbsp;Editar</button></td>
                                          <!--    <td align="center"><button type="button" onclick=location="<?php echo base_url().'crud_area/eliminar/'.$area->id_area; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>&nbsp;Eliminar</button></td> 
                                            -->
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