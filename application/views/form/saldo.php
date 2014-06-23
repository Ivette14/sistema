        <div class="row">
          <div class="col-lg-12">
            <br><br>
            <ol class="breadcrumb">
             
              <li class="active"></i><center><h4> SALDOS</h4></center></li>
            </ol>
            
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">

    
           </div>
        </div><!-- /.row -->


            <!-- /.row -->
             <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                     
                        <div class="panel-body">
                                           <div>
                                
              
                            </div>
                            <div class="table-responsive">
                                 <form name="fvalida" id="fvalida" method="post" role="form" border="0.5">

                                 <ol class="breadcrumb">
             
              <li class="active"></i><h4>Calculo de Depreciacion</h4></li>
              </ol>



          <label for="disabledSelect">Seleccione la Cuenta</label>
 <select value="<?= set_value('id_cuentacontable');?>" class="form-control" name="nombre_cuenta" id="nombre_cuenta" onChange="submit()"> 
  
                  <?php
                  $sql="SELECT * FROM cat_cuentas_contables";
                  $rec=mysql_query($sql);
           
                   while ($row=mysql_fetch_array($rec))
                   {
            echo "<option value='".$row['id_cuentacontable']."' ";
                 if(@$_POST['nombre_cuenta']==$row['id_cuentacontable'])
                  echo "SELECTED";
                  echo ">";
                  echo $row['nombre_cuenta'];
                  echo "</option>";
                  
                
                } 
                  
                   ?>   

                  </select>

<input type="hidden" name="id_cuentacontable" id="id_cuentacontable" value="<? echo  @$_POST['nombre_cuenta']; ?>"> 

</div>
<p>
    

</p>
<p>
    
    
</p>
          <label for="disabledSelect">Periodo Mes/Año</label>
<input  name="fecha" type="text" readonly name"fecha_actual" id="fecha_actual" value="<?php echo date("m/d/Y"); set_value('fecha_actual'); ?>"  size="10" />

<p>
    

</p>
<p>
    
    
</p>
<input  type="hidden" name="post" value="1" /> 
<button type="submit" class="btn btn-primary" onclick="if(confirm('Esta a punto de Depreciar esta cuenta'))
alert('ok!');
else alert('No se Realizo Ninguna Depreciacion')">Depreciar Cuenta</button>
     </form>
                            </div>

                            <!-- /.table-responsive -->                           
                        </div>

                        <!-- /.panel-body -->
                
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
