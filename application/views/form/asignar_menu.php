        <div class="row">
          <div class="col-lg-12">
          <br><br>
            
            <ol class="breadcrumb">
             
              <li class="active"></i><center><h4> Agregar Opciones</h4></center></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

            <!-- /.row -->

                    <td><button type="button" onclick=location="<?php echo base_url().'crud_activo/agregar'; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;Agregar</button></td>

        <div class="form-group"> </div>       
                            <div class="form-group"> </div> 
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                      <form action="" id="tabla_sucursal" method="post" role="form">
                        <div class="panel-body">
                        <div class="form-group" align="right">                        
                        <button type="button" onclick=location="<?php echo base_url().'crud_activo/pdfactivos_en_uso';?>" title="Exportar a PDF" class="btn btn-primary" ><i class="glyphicon glyphicon-file"></i>&nbsp;PDF</button>
                        </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Rol</th>
                                            <th>Asignar </th>
                                        <!--    <th> Descripcion </th> -->
                                          
                                    <!--        <th>Editar</th>
                                            <th>Eliminar</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>


                                        
                                            <?php foreach ($opcion as $opcion):?>
                                            <tr>
                                            <td><?= $opcion->opcion?></td> 
                                                                                      

                                       <!-- <td><?= $activo->descripcion?></td>   -->
                                         
                                             <input  type="hidden" name="post" value="1" /> 
                                            <td align="center"><button type="button" onclick=location="<?php echo base_url().'crud_activo/ver_activo/'.$activo->id_activofijo; ?>" class="btn btn-primary"><i class=""></i>Ver</button></td>
                                           <!--  <td align="center"><button type="button" onclick=location="<?php echo base_url().'crud_activo/eliminar/'.$activo->id_activofijo; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>&nbsp;Eliminar</button></td> 
                                            -->
                                            <td align="center"><button type="button" onclick=location="<?php echo base_url().'crud_activo/eliminar/'.$activo->id_activofijo; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>&nbsp;Editar</button></td>
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