          <div class="row">
          <div class="col-lg-12">
            <br><br>
            <ol class="breadcrumb">
             
              <li class="active"></i><h4> Agregar Area</h4></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">

            <form method="post" role="form" name="area" >
              <div class="form-group">
                <label>Nombre del Area</label>
                <input name="nombre_area" class="form-control" required="required" value="<?= set_value('nombre_area');?>">
              </div>
             
              <div class="form-group">
                <input type="hidden" name="post" value="1" />                
             <button type="submit" class="btn btn-primary" value="Enviar" onclick="confirm('¿Estas seguro de enviar este formulario?');" >Guardar</button>

                <button type="button" onclick=location="<?php echo base_url().'crud_area'; ?>" class="btn btn-primary">Cancelar</button>                
              </div>              


            </form>

           </div>
        </div><!-- /.row -->

<?= validation_errors(); ?>
     
      