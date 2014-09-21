          <div class="row">
          <div class="col-lg-12">
            <br><br>
            <ol class="breadcrumb">
             
              <li class="active"></i><h4> Agregar nuevo rol</h4></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-5">

            <form method="post" role="form">
              <div class="form-group">
                <label>Nombre Del Rol</label>
 

                <input name="rol" class="form-control" required="required" value="<?= set_value('rol');?>">
              </div>
             
              <div class="form-group">
                <input type="hidden" name="post" value="1" />                
             <button type="submit" class="btn btn-default" onclick="if(confirm('Los Datos son Corecto?'))
alert('ok!');
else alert('No se a Ingrtesado los Datos')" >Guardar</button>

                <button type="button" onclick=location="<?php echo base_url().'rol'; ?>" class="btn btn-default">Cancelar</button>                
              </div>              


            </form>

           </div>
        </div><!-- /.row -->
      <?= validation_errors(); ?>