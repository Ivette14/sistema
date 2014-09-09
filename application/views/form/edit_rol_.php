          <div class="row">
          <div class="col-lg-12">
           <br><br>
            <ol class="breadcrumb">
             
              <li class="active"></i><h4> Editar Rol</h4></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-6">

            <form method="post" role="form">

              <div class="form-group">
                <label>Nombre Del Rol</label>
                <input name="rol" class="form-control" value="<?= set_value('rol',$dato['rol']);?>">
              </div>

               <div class="form-group">
                <label>Asignacion De Roles</label>

<select multiple size="10" name="opcion"  style="width:150" onDblClick="move(document.combo_box.opcion,document.combo_box.list2)">
 <?php 
              foreach($opcion as $fila)
              {
          ?>
            <option value="<?=$fila -> id_opcion ?>"><?=$fila -> opcion ?></option>
          <?php
              }
          ?>   

</select>
</td>
<td align="center" valign="middle">
<input type="button" onClick="move(this.form.list2,this.form.opcion)" value="<<" id="button1" name="button1">
<input type="button" onClick="move(this.form.opcion,this.form.list2)" value=">>" id="button2" name="button2">
</td>
<td>
<select multiple size="10" name="list2" style="width:150" onDblClick="move(document.combo_box.list2,document.combo_box.opcion)">
</select>
</td>
</tr> 
              </div>
             
              <div class="form-group">
                <input type="hidden" name="post" value="1" />                
                <button type="submit" value="editar" class="btn btn-primary">Guardar</button>
                <button type="button" onclick=location="<?php echo base_url().'crud_area'; ?>" class="btn btn-primary">Cancelar</button>                
              </div>              


            </form>

           </div>
        </div><!-- /.row -->
      <?= validation_errors(); ?>