        <div class="row">
          <div class="col-lg-12">
            <br><br>
            <ol class="breadcrumb">
             
              <li class="active"></i><center><h4> Gestor de Sucursales</h4></center></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

            <!-- /.row -->
        <div class="form-group"> <button type="button" onclick=location="<?php echo base_url().'crud/agregar'; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;Agregar</button></div>       
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                      
                        <div class="panel-body">
                        <div class="form-group" align="right">                        
                        <button type="button" onclick=location="<?php echo base_url().'crud/pdfsucursal';?>" title="Exportar a PDF" class="btn btn-primary" ><i class="glyphicon glyphicon-file"></i>&nbsp;PDF</button>
                        </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nombre de la Sucursal</th>
                                            <th>Telefono</th>
                                            <th>Direccion</th>
                                            <th>Departamento</th>
                                            <th>Editar</th>
                                          <!--    <th>Eliminar</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                            
                                            <?php foreach ($sucursales as $sucursal):?>
                                            <tr>
                                            <td><?= $sucursal->nombre_sucursal?></td>   
                                            <td><?= $sucursal->telefono_sucursal?></td> 
                                            <td><?= $sucursal->direccion_sucursal?></td> 
                                            <td><?= $sucursal->departamento?></td>
                                            <td align="center"><button type="button" onclick=location="<?php echo base_url().'crud/editar/'.$sucursal->id_sucursal; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>&nbsp;Editar</button></td>
                                         <!--     <td align="center"><button type="button" onclick=location="<?php echo base_url().'crud/eliminar/'.$sucursal->id_sucursal; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>&nbsp;Eliminar</button></td> 
                                            -->
                                            </tr>
                                            <?php endforeach ;?>
                                            
                                    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->                           
                        </div>
                        <!-- /.panel-body -->
                   
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        <?= validation_errors(); ?>
            <!-- /.row -->