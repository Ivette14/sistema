        <div class="row">
          <div class="col-lg-12">
          <br><br>
            
            <ol class="breadcrumb">
             
              <li class="active"></i><center><h4> Activos Fijos sin usar</h4></center></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

            <!-- /.row -->
 
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                      <form action="" id="tabla_sucursal" method="post" role="form">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Nombre AF</th>
                                            <th>Cuenta</th>
                                            <th>Sucursal </th>
                                            <th>Proveedor </th>
                                            <th>Fecha Ingreso</th>
                                            <th>Accion</th>
                                        
                                       </tr>
                                    </thead>
                                    <tbody>
                                            <?php foreach ($activo as $activo):?>
                                            <tr>
                                            <td><?= $activo->id_activofijo?></td> 
                                            <td><?= $activo->nombre_activo_fijo?></td>
                                            <td><?= $activo->nombre_cuenta?></td> 
                                             <td><?= $activo->nombre_sucursal?></td> 
                                            <td><?= $activo->nombre_provee?></td> 
                                            <td><?= $activo->fecha_ingreso?></td>
                                                                                       <td align="center"><button type="button" onclick=location="<?php echo base_url().'crud_activo/activar_activo/'.$activo->id_activofijo; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>&nbsp;Activar</button></td>            
                                            
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