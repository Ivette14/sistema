<?php 
mysql_select_db("sys_activofijo");
?>
 <form  name="fvalida" id="fvalida" method="post" role="form" border="0.5" >
              <div class="form-group">
                  <label for="disabledSelect">Cuenta</label>
 <select value="<?= set_value('id_cuentacontable');?>" class="form-control" name="id_cuentacontable" id="id_cuentacontable" onChange="submit()"> 
  
                  <?php
                  $sql="SELECT * FROM cat_cuentas_contables";
                  $rec=mysql_query($sql);
           
                   while ($row=mysql_fetch_array($rec))
                   {
     echo "<option value='".$row['vida_util']."' ";
             if($_POST['id_cuentacontable']==$row['vida_util'])
       echo "SELECTED";
          echo ">";
          echo $row['nombre_cuenta'];
   echo "</option>";
                
                } 
                  
                   ?>   

                  </select> 
</div>
<div class="form-group">
                <label>Vida Util</label>
              <input type="text" name="vida_util" readonly id="vida_util"  value=" <?php echo $_POST['id_cuentacontable']; ?>" >
              </div>
</form>