          <div class="row">
          <div class="col-lg-12">
            <br><br>
            <ol class="breadcrumb">
             
              <li class="active"></i><h4> Agregar Un Nuevo Rol</h4></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">

            <form method="post" role="form">
              <div class="form-group">
                <label>Nombre Del Rol</label>
 

                <input name="rol" class="form-control" required="required" value="<?= set_value('rol');?>">
              </div>
             
              <div class="form-group">
                <input type="hidden" name="post" value="1" />                
             <button type="submit" class="btn btn-primary" onclick="if(confirm('Los Datos son Corecto?'))
alert('ok!');
else alert('No se a Ingrtesado los Datos')" >Guardar</button>

                <button type="button" onclick=location="<?php echo base_url().'rol'; ?>" class="btn btn-primary">Cancelar</button>                
              </div>              


            </form>

           </div>
        </div><!-- /.row -->
      <?= validation_errors(); ?>