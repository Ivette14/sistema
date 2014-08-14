<div class="row">
          <div class="col-lg-12">
            <br><br>
            <ol class="breadcrumb">
             
              <li class="active"></i><h4> Gestor De Roles</h4></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">

            <form method="post" role="form">
              <div class="form-group">
                <label>Agregar Roles</label>
                <input name="rol" class="form-control" required="required" value="<?= set_value('rol');?>">
              </div>
             
              <div class="form-group">
                <input type="hidden" name="post" value="1" />                
             <button type="submit" class="btn btn-primary" onclick="if(confirm('Exito en agregar registro'))
alert('ok!');
else alert('No se a Ingrtesado los Datos')" >Guardar</button>

                <button type="button" onclick=location="<?php echo base_url().'crud_area'; ?>" class="btn btn-primary">Cancelar</button>                
              </div>              


            </form>

           </div>
        </div><!-- /.row -->
      <?= validation_errors(); ?>

       <div class="row">
          <div class="col-lg-6">


           <form method="post" role="form">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>                                            
                                            <th>Roles</th>                                            
                                            <th>Privilegios</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                           
                                            <?php foreach ($roles as $roles):?>
                                            <tr>
                                            
                                            <td><?= $roles->rol?></td>
                                            <td align="center"><button type="button" onclick=location="<?php echo base_url().'crud_roles/editar/'.$roles->id_rol; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i>&nbsp;Editar</button></td>
           
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
        </div>