<div class="row">
  <div class="col-lg-12">
   <br><br>
            <ol class="breadcrumb">
             
              <li class="active"></i><h4> Dar de alta un Activo</h4></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">

            <form method="post" role="form">
              <div class="form-group">
                <label>Codigo de Activo</label>
                <input readonly name="id_activofijo" class="form-control" value="<?= set_value('id_activofijo',$dato['id_activofijo']);?>">
              </div>
              <div class="form-group">
                <label>Nombre De activo</label> 
                <input readonly name="nombre_activo" class="form-control" value="<?= set_value('nombre_activo_fijo',$dato['nombre_activo_fijo']);?>">
                <input type="hidden" name="id_cuentacontable" class="form-control" value="<?= set_value('id_cuentacontable',$dato['id_cuentacontable']);?>">
               
              </div>


       <div class="form-group">
                  <label for="disabledSelect">Area de Asignacion</label>
                  <select class="form-control" name="id_area" id="id_area" > 
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
                  <label for="disabledSelect">Empleado</label>
            <select name="id_empleado" class="form-control" id="id_empleado">
          <?php 
              foreach($empleado as $fila)
              {
          ?>
            <option value="<?=$fila -> id_empleado ?>"><?=$fila -> nombre_empleado ?></option>
          <?php
              }
          ?>        
              </select>
              </div>

              <div class="form-group">               
                <input type="hidden" name="cuota_mensual" class="form-control" value="<?= set_value('cuota_mensual',$dato['cuota_mensual']);?>">
              </div>

              <div class="form-group">                
                <input type="hidden" name="parte1" class="form-control" value="<?= set_value('parte1',$dato['parte1']);?>">
              </div>

              <div class="form-group">
                <input  type="hidden" name="post" value="1" />          
                <button type="submit" value="activar_activo" class="btn btn-primary">Activar</button>
                <button type="button" onclick=location="<?php echo base_url().'crud_activo/activar'; ?>" class="btn btn-primary">Cancelar</button>
              </div>   


            </form>

    </div>
</div>

    <?= validation_errors(); ?>