        <div class="row">
          <div class="col-lg-12">
          <br><br>
            
            <ol class="breadcrumb">
             
              <li class="active"></i><center><h4> Gestor de Activos Fijos</h4></center></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

            <!-- /.row -->
<div class="form-group"> 
            <button type="button" onclick=location="<?php echo base_url().'rol/Agregar'; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;Nuevo Rol</button>
        </div>           
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    <!-- /.panel-heading -->
                        <form role="form">                     
                            <div class="panel-body">
                                <div class="form-group" align="right">                        

                                </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>

                                            <th>Roles</th>
                                            <th>Editar </th>

                                        <!--    <th> Descripcion </th> -->
                                          
                                    <!--        <th>Editar</th>
                                            <th>Eliminar</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>


                                        
                                            <?php foreach ($roles as $roles):?>
                                            <tr>
                                            <td><?= $roles->rol?></td> 
                                            

                                       <!-- <td><?= $activo->descripcion?></td>   -->
                                         
                                             <input  type="hidden" name="post" value="1" />
                                     
                              
                                            <td align="center"><button type="button" onclick=location="<?php echo base_url().'rol/editar/'.$roles->id_rol; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>&nbsp;Editar</button></td>
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