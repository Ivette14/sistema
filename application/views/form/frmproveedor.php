        <div class="row">
          <div class="col-lg-12">
            <br><br>
            <ol class="breadcrumb">
             
              <li class="active"></i><center><h4> Gestor de Proveedores de Activos Fijos</h4></center></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

            <!-- /.row -->
        <div class="form-group"> <button type="button" onclick=location="<?php echo base_url().'crud_proveedor/nuevo'; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;Agregar</button></div>       
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                      <form action="" id="tabla_sucursal" method="post" role="form">
                        <div class="panel-body">
                        <div class="form-group" align="right">                        
                        <button type="button" onclick=location="<?php echo base_url().'crud_proveedor/pdfproveedor';?>" title="Exportar a PDF" class="btn btn-primary" ><i class="glyphicon glyphicon-file"></i>&nbsp;PDF</button>
                        </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nombre de Proveedor</th>
                                            <th>Direccion </th>
                                            <th>Telefono </th>
                                            <th>Email</th>
                                            <th>Nit</th>
                                            <th>Editar</th>
                                            <!--  <th>Eliminar</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                          <?php foreach ($proveedor as $proveedor):?>
                                            <tr>
                                          
                                            <td><?= $proveedor->nombre_provee?></td>   
                                            <td><?= $proveedor->direccion_provee?></td> 
                                            <td><?= $proveedor->telefono_provee?></td> 
                                            <td><?= $proveedor->email_provee?></td>
                                             <td><?= $proveedor->nit?></td>
                                         <td align="center"><button type="button" onclick=location="<?php echo base_url().'crud_proveedor/editar/'.$proveedor->id_proveedor; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>&nbsp;Editar</button></td>
                                         <!--  <td align="center"><button type="button" onclick=location="<?php echo base_url().'crud_proveedor/eliminar/'.$proveedor->id_proveedor; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>&nbsp;Eliminar</button></td>
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