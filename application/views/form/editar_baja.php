        <div class="row">
          <div class="col-lg-12">
            <br><br>
            <ol class="breadcrumb">
             
              <li class="active"></i><h4> REALIZAR LA BAJA DE UN ACTIVO FIJO</h4></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">

            <form method="post" role="form">

              
              <div class="form-group">
                     <input type="hidden" name="activado" class="form-control" value="0">
              </div>

               <div class="form-group">
                <label>Codigo Activo</label>
                 <input name="id_activofijo" class="form-control" readonly value="<?= set_value('id_activofijo',$dato['id_activofijo']);?>">
              </div>

               <div class="form-group">
                <label>Motivo de baja</label>
                 <input name="motivo_baja"  class="form-control"  value="<?= set_value('motivo_baja');?>">
              </div>
              


              <div class="form-group">
                <input  type="hidden" name="post" value="1" />                
                <button type="submit" value="Editar" class="btn btn-primary">DAR DE BAJA</button>
                <button type="button" onclick=location="<?php echo base_url().'crud_baja/index'; ?>" class="btn btn-primary">Cancelar</button>
              </div>   
                
              </fieldset>

            </form>


           </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->
         <?= validation_errors(); ?>