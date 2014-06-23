<div class="row">
  <div class="col-lg-12">
    <br><br>
            <ol class="breadcrumb">
             
              <li class="active"></i><h4> Agregar Sucursal</h4></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">

            <form method="post" role="form">
              <div class="form-group">
                <label>Nombre de la Sucursal</label>
                <input name="nombre_sucursal" class="form-control" value="<?= set_value('nombre_sucursal');?>">
              </div>

               <div class="form-group">
                <label>Telefono</label>
                <input name="telefono_sucursal" class="form-control" value="<?= set_value('telefono_sucursal');?>">
              </div>

              <div class="form-group">
                <label>Direccion</label>
                <input name="direccion_sucursal" class="form-control" value="<?= set_value('direccion_sucursal');?>">
              </div>

              <div class="form-group">
                  <label for="disabledSelect">Dapartamento</label>
                  <select id="disabledSelect" name="departamento" class="form-control" value="<?= set_value('departamento');?>">
                  <option>Seleccione un Dapartamento</option>
                  <option>Ahuchapan</option>
                  <option>Santa Ana</option>
                  <option>La Libertad</option>
                  <option>Chalatenango</option>
                  <option>Cuscatlan</option>
                  <option>San Salvador</option>
                  <option>La Paz</option>
                  <option>Cabañas</option>
                  <option>San Vicente</option>
                  <option>Usulutan</option>
                  <option>San Miguel</option>
                  <option>Morazan</option>
                  <option>La Union</option>
                </select>
              </div>
 

              <div class="form-group">
                <input  type="hidden" name="post" value="1" />                
         <button type="submit" class="btn btn-primary" onclick="if(confirm('Exito en agregar registro'))
alert('ok!');
else alert('El registro no se ha eliminado')" >Guardar</button>
                <button type="button" onclick=location="<?php echo base_url().'crud/index'; ?>" class="btn btn-primary">Cancelar</button>
              </div>              
            </form>

           </div>
        </div><!-- /.row -->
      <?= validation_errors(); ?>