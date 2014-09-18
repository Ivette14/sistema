          <div class="row">
          <div class="col-lg-6">
            <br><br>
            <ol class="breadcrumb">
             
          
            </ol>
            
          </div>
        </div><!-- /.row -->
            
        <div class="row">
          <div class="col-lg-5">

            <form  name="fvalida" id="fvalida" method="post" role="form" border="0.5" >
              <div class="form-group">
<ul class="nav nav-tabs">
<li class="active" ><a href="#">Agregar Activos</a></li>
<li><a href="crud/ejemplo1/">Depreciacion De Activo</a></li>
	</ul>
<div class="form-group">
            
                  <label for="disabledSelect">Cuenta</label>
 <select required="required" autofocus="autofocus" value="<?= set_value('id_cuentacontable');?>" class="form-control" name="nombre_cuenta" id="nombre_cuenta" onChange="submit()"> 
  <option value='' selected> Seleccionar...</option>
                  <?php
                  $sql="SELECT * FROM cat_cuentas_contables";
                  $rec=mysql_query($sql);
                  
                   while ($row=mysql_fetch_array($rec))
                   {
            echo "<option value='".$row['id_cuentacontable']."' ";
                 if(@$_POST['nombre_cuenta']==$row['id_cuentacontable'])
                  echo "SELECTED";
                  echo ">";
                  
                  echo $row['nombre_cuenta'];
                  echo "</option>";
                  
                
                } 
                  
                   ?>   

                  </select>



</div>


           


<div class="form-group">

<?php 
$vida_util = @$_POST['nombre_cuenta'];
$sql1="SELECT vida_util FROM cat_cuentas_contables where id_cuentacontable = '$vida_util'";
$rec1=mysql_query($sql1);
  while ($row=mysql_fetch_array($rec1))
                   {
echo "<input type=\"hidden\"  name=\"vida_util\" id=\"vida_util\" value='".$row['vida_util']."' ";

echo ">";

 } 

?>      

<input type="hidden"  name="id_cuentacontable" id="id_cuentacontable" value="<?=  set_value('nombre_cuenta'); echo  @$_POST['nombre_cuenta'];?>">         
              </div>

 <div class="form-group">
                <label>Codigo de Activo</label>
                
                <input class="form-control" name="id_activofijo" onkeyup="valid(this,'special')" onblur="valid(this,'special')" required="required" maxlength="10"  min="1" max="10"  value="<?= set_value('id_activofijo');?>">
              </div>          
 
              <div class="form-group">
                <label>Nombre del Activo</label>
                <input class="form-control" name="nombre_activo_fijo" onkeyup="valid(this,'special')" onblur="valid(this,'special')" required="required"  value="<?= set_value('nombre_activo_fijo');?>">
                
              </div>

       
              <div class="form-group">
                  <label for="disabledSelect">Proveedor</label>
         
         <select name="id_proveedor" class="form-control" id="id_proveedor">
           <option value='' selected> Seleccionar...</option>
          <?php 
              foreach($proveedor as $fila)
              {
          ?>
            <option value="<?=$fila -> id_proveedor ?>"><?=$fila -> nombre_provee ?></option>
          <?php
              }
          ?>        
              </select>
              </div>

            <div class="form-group">
                <label>Fecha de Compra</label>
                <input class="date" type="date" required="required"  name="fecha_compra" value="<?= set_value('fecha_compra');?>">
                
              </div>

              <div class="form-group">
                <label>Fecha de Ingreso a la empresa</label>
                <input class="date" type="date" required="required"  name="fecha_ingreso" value="<?= set_value('fecha_ingreso');?>">
                
              </div>

              <div class="form-group">
                <label>Descripcion del Activo Fijo</label>
                <textarea class="form-control" name="descripcion" required="required"  rows="3" value="<?= set_value('descripcion');?>"></textarea>
              </div>

            
              


              <div class="form-group">
                  <label for="disabledSelect">Sucursal</label>
                         <select name="id_sucursal" class="form-control" id="id_sucursal">
  <option value='' selected> Seleccionar...</option>
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

             


 </form>
        </div>
    </div>