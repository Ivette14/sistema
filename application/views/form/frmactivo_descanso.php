        <div class="row">
          <div class="col-lg-12">
          <br><br>
            
            <ol class="breadcrumb">
             
              <li class="active"></i><center><h4> Gestor de Activos Fijos</h4></center></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

        <div class="form-group"> </div>       
            <div class="form-group"> </div> 
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                      <form action="" id="tabla_sucursal" method="post" role="form">
                        <div class="panel-body">
                        <div class="form-group" align="right">                        
                        <button type="button" onclick=location="<?php echo base_url().'crud_activo/Reactivar';?>" title="Reactivar Activos en descanso" class="btn btn-success"><i class="glyphicon glyphicon-ok"></i>&nbsp;Reactivar...</button>
                        </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Nombre AF</th>
                                            <th>Cuenta</th>
                                            <th>Sucursal </th>
                                            <th>Area</th>
                                            <th>Responsable </th>
                                            <th>Fecha De ingreso</th>                               
                                            <th>Descanso</th>
                                        <!--    <th> Descripcion </th> -->
                                        </tr>
                                    </thead>
                                    <tbody>


                                        
                                            <?php foreach ($activo as $activo):?>
                                            <tr>
                                            <td><?= $activo->id_activofijo?></td> 
                                            <td><?= $activo->nombre_activo_fijo?></td>
                                            <td><?= $activo->nombre_cuenta?></td> 
                                            <td><?= $activo->nombre_sucursal?></td> 
                                            <td><?= $activo->nombre_area?></td>
                                            <td><?= $activo->nombre_empleado?></td>
                                            <td><?= $activo->fecha_ingreso?></td>

                                            <input  type="hidden" name="post" value="1" />                                            
                                            <td align="center"><button type="button" onclick=location="<?php echo base_url().'crud_activo/descanso_activo/'.$activo->id_activofijo; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-warning-sign"></i>&nbsp;Descanso</button></td>
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