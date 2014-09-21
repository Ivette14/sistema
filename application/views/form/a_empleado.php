<div class="row">

        <script type="text/javascript">
            $(document). ready(function() {
              $('#codigo'). load('crud_empleado/code_emp').show();

                $('#codigo_empleado'). keyup(function(){
                    $.post('crud_empleado/code_emp', {codigo_empleado: form.codigo_empleado.value},
                      function(result) {
                        $('#codigo').html(result),('<img src="<?php echo base_url().'seteo/logos/loader.gif'; ?>"/> verificando').show();
                      
                  });
              });
            });
        </script>
          <div class="col-lg-12">
            <br><br>
            <ol class="breadcrumb">
             
              <li class="active"><h4> Agregar Empleados</h4></li>

            </ol>                     
             
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6" >
            <form method="post" role="form" name="form" >
              <fieldset>    

              <div class="form-group">
                <label>Codigo de empleado</label>
                <input id="codigo_empleado" name="codigo_empleado" class="form-control" required="required" value="<?= set_value('codigo_empleado');?>">
                <div id="codigo"></div>
              </div>

              <div class="form-group">
                <label>Nombre del empleado</label>
                <input name="nombre_empleado" class="form-control" required="required" value="<?= set_value('nombre_empleado');?>" >
              </div>

              <div class="form-group">
                <label>Direccion</label>
                <input name="direccion_empleado" class="form-control" required="required" value="<?= set_value('direccion_empleado');?>">
              </div>

              <div class="form-group">
                <label>Telefono</label>
                <input name="telefono_empleado" class="form-control" required="required" value="<?= set_value('telefono_empleado');?>">
              </div>              

               <div class="form-group">
                <label>Email</label>
                <input name="email_empleado" class="form-control" required="required" value="<?= set_value('email_empleado');?>" placeholder="example@example.com">
              </div> 

              <div class="form-group">
                <input type="hidden" name="post" value="1" />                
                <button type="submit" class="btn btn-primary" onclick="if(confirm('Estas seguro de los Datos Ingresados'))
                alert('ok!');
                else alert('El registro no a sido Ingresado')" >Guardar</button>
                <button type="button" onclick=location="<?php echo base_url().'crud_empleado'; ?>" class="btn btn-primary">Cancelar</button>
              </div>
            
            </form>


           </div>
        </div><!-- /.row -->
      <?= validation_errors(); ?>