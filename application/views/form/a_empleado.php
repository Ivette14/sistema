<div class="row">
          <div class="col-lg-12">
            <br><br>
            <ol class="breadcrumb">
             
              <li class="active"><h4> Agregar Empleados</h4></li>

            </ol>                     
             
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6" >
            <form method="post" role="form" >
              <fieldset>    

              <div class="form-group">
                <label>Codigo de empleado</label>
                <input name="codigo_empleado" class="form-control" value="<?= set_value('codigo_empleado');?>">
              </div>

             
              <div class="form-group">
                   <label>Sucursal en la que operara</label>
              <select name="id_sucursal" class="form-control" id="id_sucursal">
                <?php 
                foreach($sucursal as $fila)
                {
                ?>
                  <option value="<?=$fila -> id_sucursal ?>"><?=$fila -> nombre_sucursal ?></option>
                <?php
                }
                ?>        
              </select>
              </div>    

              <div class="form-group">
                <label>Nombre del empleado</label>
                <input name="nombre_empleado" class="form-control" value="<?= set_value('nombre_empleado');?>">
              </div>

              <div class="form-group">
                <label>Direccion</label>
                <input name="direccion_empleado" class="form-control" value="<?= set_value('direccion_empleado');?>">
              </div>

              <div class="form-group">
                <label>Telefono</label>
                <input name="telefono_empleado" class="form-control" value="<?= set_value('telefono_empleado');?>">
              </div>              

               <div class="form-group">
                <label>Email</label>
                <input name="email_empleado" class="form-control" value="<?= set_value('email_empleado');?>">
              </div> 

              <div class="form-group">
                <input type="hidden" name="post" value="1" />                
                <button type="submit" class="btn btn-primary" onclick="if(confirm('Exito en agregar registro'))
                alert('ok!');
                else alert('El registro no se ha eliminado')" >Guardar</button>
                <button type="button" onclick=location="<?php echo base_url().'crud_empleado/index'; ?>" class="btn btn-primary">Cancelar</button>
              </div>
            
            </form>


           </div>
        </div><!-- /.row -->
      <?= validation_errors(); ?>