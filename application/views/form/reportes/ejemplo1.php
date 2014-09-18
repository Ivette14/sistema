   
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
<li  ><a href="crud/ejemplo/">Agregar Activos</a></li>
<li class="active"><a href="#">Depreciacion De Activo</a></li>
  </ul>
<table>
<tr>
<td>
<div class="form-group">
                <label>Precio de Compra</label>
                <input class="form-control" name="valor_original" maxlength="8" placeholder="$"     value="<?= set_value('valor_original');?>">
                
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
                 <input class="form-control" name="gastos" maxlength="8" placeholder="$"    value="<?= set_value('gastos');?>">

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
                <input class="form-control" name="valor_residual" maxlength="8"   placeholder="$"  id="valor_residual" value="<?= set_value('valor_residual');?>">
                
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
                  <button type="submit" class="btn btn-primary" onclick="if(confirm('Esta a punto de agregar un activo'))
alert('ok!');
else alert('ok')" >Guardar</button>
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
var r={'especial'/^[0-9]$/g}
//var r ={'special':/[\W]/g}
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