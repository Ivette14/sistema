<div class="row">
  <div class="col-lg-12">
   <br><br>
            <ol class="breadcrumb">
             
              <li class="active"></i><h4> Editar Activo</h4></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">

            <form method="post" role="form">
              <div class="form-group">
                <label>Nombre de Activo</label>
                <input name="nombre_activo_fijo" class="form-control" value="<?= set_value('nombre_activo_fijo',$dato['nombre_activo_fijo']);?>">
              </div>

              
       <div class="form-group">
                  <label for="disabledSelect">Area de Asignacion</label>
                  <select class="form-control" name="id_area" id="id_area" value="<?= set_value('id_area',$dato['id_area']);?>"  > 
                  <option value='' selected> Seleccionar...</option>
              <?php 
                foreach($area as $fila)
                {
                ?>
                  <option value="<?=$fila -> id_area ?>"><?=$fila -> nombre_area ?></option>
                <?php
                }
              ?>     
                  </select>
                    
              </div>
              <div class="form-group">
                <label>Descripcion</label>
                <input name="descripcion" class="form-control" value="<?= set_value('descripcion',$dato['descripcion']);?>">
              </div>

              <div class="form-group">
              	<input  type="hidden" name="post" value="1" />    			
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" onclick=location="<?php echo base_url().'crud_activo'; ?>" class="btn btn-primary">Cancelar</button>
              </div>   


            </form>
      <?= validation_errors(); ?>
    </div>
</div>