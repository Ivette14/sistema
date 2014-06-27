<?php 
mysql_select_db("sys_activofijo");

?>

        <div class="row">
          <div class="col-lg-12">
           <br><br>

            
            <ol class="breadcrumb">
             
              <li class="active"><h4> Agregar Activo Fijo</h4></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-5">

            <form  name="fvalida" id="fvalida" method="post" role="form" border="0.5" >
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

            
              

  <p>
             <input type="hidden" name="estado" value="nuevo" 
 +          <?php echo set_radio('estado', 'nuevo', TRUE); ?>/>
           </p> 
           <p>
   <label>Valor del activo</label>  
             <input type="radio" name="tipo_valor" value="real" 
 +         <?php echo set_radio('tipo_valor', 'real'); ?>/>
          <label for = "sizeLarge">Real</label>
                  <input type="radio" name="tipo_valor" value="estimado" 
 +          <?php echo set_radio('tipo_valor', 'estimado'); ?>/>
          <label for = "sizeMed">Estimado</label>
          </p>
              <ol class="breadcrumb">
             
              <li class="active"></i><h4>Asignacion del Activo</h4></li>
              </ol>

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

             

              <ol class="breadcrumb">
             
              <li class="active"></i><h4>Depreciacion de Activo</h4></li>
              </ol>

    
<table>
<tr>
<td>
<div class="form-group">
                <label>Precio de Compra</label>
                <input class="form-control" name="valor_original" maxlength="6" placeholder="$"  onkeyUp="return ValNumero(this);"    value="<?= set_value('valor_original');?>">
                
              </div>

</td>
<td>
            &nbsp;
            &nbsp;
            &nbsp;
</td>
</tr>
<tr>

<td>

<div class="form-group">
                <label>Otros Gastos</label>
                 <input class="form-control" name="gastos" maxlength="6" placeholder="$"  onkeyUp="return ValNumero(this);"  value="<?= set_value('gastos');?>">

              </div>


</td>
<td>
            &nbsp;
            &nbsp;
            &nbsp;
</td>
<td>

<div class="form-group">
                
                 <label>Precio de compra + otros gastos</label>

                <input class="form-control" readonly  name="importe_depreciable"  placeholder="$"  id="importe_depreciable" value="<?= set_value('importe_depreciable');?>">
              
              </div>


</td>
</tr>


<tr>
<td>
<div class="form-group">
                <label>Valor Residual (Dolares)</label>
                <input class="form-control" name="valor_residual" maxlength="6"onkeyUp="return ValNumero(this);"  placeholder="$"  id="valor_residual" value="<?= set_value('valor_residual');?>">
                
              </div>


</td>
<td>
            &nbsp;
            &nbsp;
            &nbsp;
</td>
<td>

<div class="form-group">
                <label>Total a depreciar</label>
                <input class="form-control" name="parte1" readonly maxlength="6"onkeyUp="return ValNumero(this);"  placeholder="$"  id="parte1" value="<?= set_value('parte1');?>">
                
              </div>

</td>
</tr>
<tr>
<td>
<div class="form-group">
                <label>Cuota Anual (Dolares)</label>
                <input class="form-control" readonly  name="cuota_anual"  placeholder="$"      value="<?= set_value('cuota_anual');?>" >
                
              </div>
</td>
<td>
            &nbsp;
            &nbsp;
            &nbsp;
</td>
<td>
 <div class="form-group">
                <label>Cuota Mensual (Dolares)</label>
                <input class="form-control" readonly  name="cuota_mensual" placeholder="$"      value="<?= set_value('cuota_mensual');?>">
                
              </div>
</td>
</tr>

</table>
              

             
               
                <input  type="hidden" name="post" value="1" />                
                  <button type="submit" class="btn btn-primary" onclick="if(confirm('Esta a putno de agregar un activo'))
alert('ok!');
else alert('El registro no se ha eliminado')" >Guardar</button>
                  <button type="button"  class="btn btn-primary" value="Enviar" onClick="depreciacion()">Calcular</button>
                <button type="button"   onClick=location="<?php echo base_url().'crud_activo'; ?>" class="btn btn-primary">Cancelar</button>
     </fieldset>
</form>
<script type="text/javascript">

function depreciacion() {

var valor_original = document.forms['fvalida'].valor_original.value;
var gastos = document.forms['fvalida'].gastos.value;
var vida_util = document.forms['fvalida'].vida_util.value;
var valor_residual = document.forms['fvalida'].valor_residual.value;

if(valor_original==0) { //comprueba que no esté vacío
    document.forms['fvalida'].valor_original.focus();   
    alert('No as escrito el Valor Original'); 
    return false; //devolvemos el foco
  }


  if(valor_residual==0) { //comprueba que no esté vacío
    document.forms['fvalida'].valor_residual.focus();   
    alert('No as escrito el valor residual, Escribelo para poder Calcular Depreciacion'); 
    return false; //devolvemos el foco
  }

if(gastos==0)
{
var importe_original = document.forms['fvalida'].valor_original.value;
 document.forms["fvalida"].importe_depreciable.value =  importe_original;
  var meses = (vida_util) * 12;

var parte1 = (importe_original) - (valor_residual);


var dep_anual =  (parte1) / (vida_util); 
 var dep_mensual =  (parte1) / (meses); 

document.forms["fvalida"].cuota_anual.value =dep_anual;
document.forms["fvalida"].cuota_mensual.value = dep_mensual;
}



var importe = parseInt(valor_original) + parseInt(gastos); 
  document.forms["fvalida"].importe_depreciable.value =  importe;
  var meses = (vida_util) * 12;

var parte1 = (importe) - (valor_residual);


var dep_anual =  (parte1) / (vida_util); 
 var dep_mensual =  (parte1) / (meses); 

document.forms["fvalida"].cuota_anual.value =dep_anual;
document.forms["fvalida"].cuota_mensual.value = dep_mensual;
document.forms["fvalida"].parte1.value = parte1;
//alert(dep_anual);

//alert(dep_mensual);

    } 
</script> 

<script type="text/javascript">
var r={'special':/[\W]/g}
function valid(o,w){
o.value = o.value.replace(r[w],'');
}
</script> 
<script type="text/javascript">
  
  function Solo_Numerico(variable){
    Numer=parseInt(variable);
    if (isNaN(Numer)){
       return "";
       }
       return Numer;
    }
    function ValNumero(Control){
      Control.value=Solo_Numerico(Control.value);
    }
</script>
</div>
</div>
           
              <?= validation_errors(); ?>
     

      

