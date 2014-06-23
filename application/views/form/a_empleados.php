
      <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            
            <ol class="breadcrumb">
             
              <li class="active"></i><h4> Agregar Empleadosksskaskj</h4></li>
            </ol>
             
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">



            <form action="<?php echo base_url().'empleados/insertar_empleado'; ?>" method="post" role="form">

              <div class="form-group">
                <label>Id empleado</label>
                <input name="id_empleado" class="form-control">
              </div>

              <div class="form-group">
                <label>Sucursal</label>
                <select class="form-control">
                <option></option>
                <option>La Bendicion</option>
                <option>Curacao</option>
                <option>Curacao SM</option>
                <option>Salgado SM</option>
                <option>Salgado Usulutan</option>

                </select>
              </div>

              <div class="form-group">
                <label>Nombre del empleado</label>
                <input name="nombre_empleado" class="form-control">
              </div>

              <div class="form-group">
                <label>Telefono</label>
                <input name="telefono_empleado" class="form-control">
              </div>

               <div class="form-group">
                <label>Email</label>
                <input name="email_empleado" class="form-control">
              </div>

              <div class="form-group">
                <label>Direccion</label>
                <textarea name="direccion_empleado"class="form-control" rows="3"></textarea>
              </div>
 

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="submit" class="btn btn-primary">Cancelar</button>
              </div>
                
              </fieldset>

            </form>


           </div>
        </div><!-- /.row -->

      </div><!-- /#page-wrapper -->


<!--
<?php $query = $this->db->get('cat_sucursal');
      foreach ($query->result() as $row)
        {
             echo $row->nombre_sucursal;
        }
?>

-->