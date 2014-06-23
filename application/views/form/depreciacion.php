<div class="row">
          <div class="col-lg-12">
<br><br>
            <ol class="breadcrumb">
             
              <li class="active"><h4> Depreciacion Acomulada</h4></li>

            </ol>                     
             
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6" >
            <form name="fdeprecia" method="post" role="form">
              <div class="form-group">
                <label>Codigo Activo</label>
                <input name="id_activofijo" readonly class="form-control" value="<?= set_value('id_activofijo',$dato['id_activofijo']);?>">
              </div>
 <input  type="hidden" name="id_cuentacontable" readonly id="id_cuentacontable"  value="<?= set_value('id_cuentacontable',$dato['id_cuentacontable']);?>">
              
       <div class="form-group">
                <label>Cuota Mensual</label>
                <input name="cuota_mensual" class="form-control" readonly value="<?= set_value('cuota_mensual',$dato['cuota_mensual']);?>">
              </div>

              <input  type="hidden" name="importe_depreciable" readonly id="importe_depreciable"  value="<?= set_value('importe_depreciable',$dato['importe_depreciable']);?>">
                 <input  type="hidden" name="valor_residual" readonly id="valor_residual"  value="<?= set_value('valor_residual',$dato['valor_residual']);?>">

               <div class="form-group">
                <label>Depreciacion Acomulada</label>
                <input name="depreciacion_acomulada" class="form-control" value="">
              </div>

       
             

              <div class="form-group">
                <input type="hidden" name="post" value="1" />                
                <button type="submit" value="agregar" class="btn btn-primary">Guardar</button>
                <button type="button" onclick=location="<?php echo base_url().'crud_depreciacion'; ?>" class="btn btn-primary">Cancelar</button>
              </div>
            
            </form>
<script type="text/javascript">

function depreciacion_acomulada() {

var importe_depreciable = document.forms['fdeprecia'].importe_depreciable.value;
var valor_residual = document.forms['fdeprecia'].valor_residual.value;

var parte1 = (importe_depreciable) - (valor_residual);



var dep_acomulada =  (parte1) * (vida_util); 
 var dep_mensual =  (parte1) / (meses); 


document.forms["fdeprecia"].depreciacion_acomulada.value = dep_anual;


    } 


</script> 

           </div>
        </div><!-- /.row -->
      <?= validation_errors(); ?>



