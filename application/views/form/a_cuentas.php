        <div class="row">
          <div class="col-lg-12">
            <br><br>
            <ol class="breadcrumb">
             
              <li class="active"></i><h4> Agregar Nueva Cuenta Contable</h4></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">

            <form method="post" role="form">

              <div class="form-group">
                <label>Nombre de la Cuenta</label>
                <input name="nombre_cuenta" required="required"  class="form-control">
              </div>

               <div class="form-group">
                <label>Vida Util</label>
                <input name="vida_util" required="required"  class="form-control">
              </div>
 

              <div class="form-group">
                <input  type="hidden" name="post" value="1" />                
                 <button type="submit" class="btn btn-primary" onclick="if(confirm('Exito en agregar registro'))
alert('ok!');
else alert('No se a Ingresado los datos')" >Guardar</button>
                <button type="button" onclick=location="<?php echo base_url().'crud_cuenta'; ?>" class="btn btn-primary">Cancelar</button>
              </div>   
                
              </fieldset>

            </form>


           </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->
       <?= validation_errors(); ?>