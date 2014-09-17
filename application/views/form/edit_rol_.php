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
                <input name="rol" class="form-control" value="<?= $dato['rol'];?>">
                <input name="id_rol" class="form-control" value="<?= set_value('id_rol',$dato['id_rol']);?>">
              </div>

               <div class="form-group">
                <label>Asignacion De Roles</label>
     <table cellpadding="4" cellspacing="0" border="0">

              
<tr>

 
                        <td>
<select multiple size="10" name="opcion"  style="width:150" onDblClick="move(document.combo_box.opcion,document.combo_box.id_opcion)">
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
<input type="button" onClick="move(this.form.id_opcion,this.form.opcion)" value="<<" id="button1" name="button1">
<input type="button" onClick="move(this.form.opcion,this.form.id_opcion)" value=">>" id="button2" name="button2">
</td>
<td>
<select multiple size="10" name="id_opcion"  id="id_opcion" value="<?= set_value('id_opcion');?>" required="required" style="width:150" onDblClick="move(document.combo_box.id_opcion,document.combo_box.opcion)">
</select>
</td>
</tr>
<tr>
<input type="hidden" name="post" value="1" />
<td align="center" colspan="3"><input type="submit" name="submit_button" value="Submit" class="btn btn-primary" onClick="selectAll(document.combo_box.id_opcion);"> Guardar</td></tr>
</table>

              </div>
             
              <div class="form-group">
                <input type="hidden" name="post" value="1" />                
                <button type="submit" value="editar" class="btn btn-primary">Guardar</button>
                <button type="button" onclick=location="<?php echo base_url().'rol'; ?>" class="btn btn-primary">Cancelar</button>                
              </div>              


            </form>

           </div>
        </div><!-- /.row -->
      <?= validation_errors(); ?>
      <script type="text/javascript">

// PickList II script (aka Menu Swapper)- By Phil Webb (http://www.philwebb.com)
// Visit JavaScript Kit (http://www.javascriptkit.com) for this JavaScript and 100s more
// Please keep this notice intact

function move(fbox, tbox) {
     var arrFbox = new Array();
     var arrTbox = new Array();
     var arrLookup = new Array();
     var i;
     for(i=0; i<tbox.options.length; i++) {
          arrLookup[tbox.options[i].text] = tbox.options[i].value;
          arrTbox[i] = tbox.options[i].text;
     }
     var fLength = 0;
     var tLength = arrTbox.length
     for(i=0; i<fbox.options.length; i++) {
          arrLookup[fbox.options[i].text] = fbox.options[i].value;
          if(fbox.options[i].selected && fbox.options[i].value != "") {
               arrTbox[tLength] = fbox.options[i].text;
               tLength++;
          } else {
               arrFbox[fLength] = fbox.options[i].text;
               fLength++;
          }
     }
     arrFbox.sort();
     arrTbox.sort();
     fbox.length = 0;
     tbox.length = 0;
     var c;
     for(c=0; c<arrFbox.length; c++) {
          var no = new Option();
          no.value = arrLookup[arrFbox[c]];
          no.text = arrFbox[c];
          fbox[c] = no;
     }
     for(c=0; c<arrTbox.length; c++) {
        var no = new Option();
        no.value = arrLookup[arrTbox[c]];
        no.text = arrTbox[c];
        tbox[c] = no;
     }
}

function selectAll(box) {
     for(var i=0; i<box.length; i++) {
     box[i].selected = true;
     }
}
</script>