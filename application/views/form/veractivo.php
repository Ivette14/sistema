<div class="row">
          <div class="col-lg-12">
            <br><br>
            <ol class="breadcrumb">
             
              <li class="active"></i><h4> Ficha del Activo Fijo</h4></li>
            </ol>
             
          </div>
        </div><!-- /.row -->        
        <div class="row">
          <div class="col-lg-4">
            <form method="post" role="form">

  <div class="form-group">
                <label>Codigo</label>
  

               <input name="codigo_activo" class="form-control" value="<?= set_value('id_activofijo',$dato['id_activofijo']);?>">
  
  </div>
   <div class="form-group">
                  <label>Nombre</label>
            <input name="nombre_activo" class="form-control" value="<?= set_value('nombre_activo',$dato['nombre_activo_fijo']);?>">

  
<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <div class="form-group">
                  <label>Cuenta</label>
 <input name="cuenta" class="form-control" value="<?= set_value('id_cuentacontable',$dato['id_cuentacontable']);?>">

  





 <div class="form-group">
                <label>Sucursal a la que pertenece</label>
                <input name="sucursal" class="form-control" value="<?= set_value('nombre_sucursal',$dato['nombre_sucursal']);?>">
            
              </div>
<div class="form-group">
                <label>Area actual </label>
                <input name="area" class="form-control" value="<?= set_value('id_area',$dato['id_area']);?>">
              </div>
<div class="form-group">
                <label>Responsable del bien</label>
                <input name="empleado" class="form-control" value="<?= set_value('id_empleado',$dato['id_empleado']);?>">
              </div>  

  <div class="form-group">
                <label>Fecha de compra</label>
                <input name="fecha_compra" class="form-control" value="<?= set_value('fecha_compra',$dato['fecha_compra']);?>">
              </div>  <div class="form-group">
                <label>Fecha de ingreso a la empresa</label>
                <input name="fecha_ingreso" class="form-control" value="<?= set_value('fecha_ingreso',$dato['fecha_ingreso']);?>">
              </div> 
<div class="form-group">
                <label>Precio de compra</label>
                <input name="precio_compra" class="form-control" value="<?= set_value('valor_original',$dato['valor_original']);?>">
              </div> 

              <div class="form-group">
                <label>Proveedor del bien</label>
                <input name="proveedor" class="form-control" value="<?= set_value('id_proveedor',$dato['id_proveedor']);?>">
              </div>




             

<div class="form-group">
                <label>Depreciacion Anual</label>
                <input name="cuota_anual" class="form-control" value="<?= set_value('cuota_anual',$dato['cuota_anual']);?>">
              </div> 
              <div class="form-group">
                <label>Depreciacion Mensual</label>
                <input name="cuota_mensual" class="form-control" value="<?= set_value('cuota_mensual',$dato['cuota_mensual']);?>">
              </div>
               <div class="form-group">
                <label>Depreciacion Acumulada</label>
                <input name="depreciacion_acumulada" class="form-control" value="<?= set_value('depreciacion_acumulada');?>">
              </div> 
              <div class="form-group">
                <label>Valor Actual</label>
                <input name="valor_actual" class="form-control" value="<?= set_value('');?>">
              </div> 




              <div class="form-group">
                <input type="hidden" name="post" value="1" />                
                <button type="submit" value="editar" class="btn btn-primary">Guardar</button>
                <button type="button" onclick=location="<?php echo base_url().'crud_empleado/index'; ?>" class="btn btn-primary">Cancelar</button>
              </div>

            </form>
           </div>
        </div><!-- /.row -->
        <?= validation_errors(); ?>