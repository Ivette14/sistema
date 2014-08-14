        <div class="row">
          <div class="col-lg-12">
            <br><br>
             <ol class="breadcrumb">
             
              <li class="active"></i><center><h4> Gestor de Empleados/Responsables de AF</h4></center></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

            <!-- /.row -->
        <div class="form-group"> <button type="button" onclick=location="<?php echo base_url().'crud_empleado/agregar'; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;Agregar</button></div>       
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                      
                        <div class="panel-body">
                        <div class="form-group" align="right">                        
                        <button type="button" onclick=location="<?php echo base_url().'crud_empleado/pdfempleado';?>" title="Exportar a PDF" class="btn btn-primary" ><i class="glyphicon glyphicon-file"></i>&nbsp;PDF</button>
                        </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                           
                                            <th>Codigo de Empleado</th>
                                            <th>Nombre del Empleado</th>
                                            <th>Direccion</th>
                                            <th>Telefono</th>
                                            <th>Email</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php foreach ($empleados as $empleado):?>
                                            <tr>
                                            
                                            <td><?= $empleado->codigo_empleado?></td>                                     
                                            <td><?= $empleado->nombre_empleado?></td> 
                                            <td><?= $empleado->direccion_empleado?></td> 
                                            <td><?= $empleado->telefono_empleado?></td>
                                            <td><?= $empleado->email_empleado?></td>
                                            <td align="center"><button type="button" onclick=location="<?php echo base_url().'crud_empleado/editar/'.$empleado->id_empleado; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>&nbsp;Editar</button></td>
                                            <td align="center"><button type="button" onclick=location="<?php echo base_url().'crud_empleado/eliminar/'.$empleado->id_empleado; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>&nbsp;Eliminar</button></td> 
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