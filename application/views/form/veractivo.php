<div class="row">
          <div class="col-lg-8">
            <br><br>
            <ol class="breadcrumb">
             
              <li class="active"></i><h4> Ficha del Activo Fijo</h4></li>
            </ol>
             
          </div>

</div><!-- /.row -->        
        <div class="row">
          <div class="col-lg-8">
            <form method="post" role="form">

<table>
<tr>
  <td>   
    
      <label>Codigo:</label> &nbsp;&nbsp;&nbsp;&nbsp;
  <br><br>
  </td>
 
  <td>               
      <?php echo ($dato['id_activofijo']);?>
  
    <br><br>
  </td>
  <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>  <td></td><td></td>

  <td>  
    
      <label>Fecha de compra:</label>&nbsp;&nbsp;&nbsp;&nbsp;
  <br><br>
  </td>
  
  <td>                
      <?php echo($dato['fecha_compra']);?>
<br><br>    
  </td>

</tr>

<tr>
  <td>   
            <label>Nombre:</label>&nbsp;&nbsp;&nbsp;&nbsp;
 <br><br>
  </td>
  <td>            
        <?php echo($dato['nombre_activo_fijo']);?>
    <br><br>
  </td>
  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>  <td></td><td></td>

  <td>         
    
        <label>Fecha de ingreso a la empresa:</label>&nbsp;&nbsp;&nbsp;&nbsp;
  <br><br>
  </td>
  <td>
       <?php echo($dato['fecha_ingreso']);?>
    <br><br>
  </td>
</tr>



<tr>
  <td>
    <label>Cuenta Contable:</label>&nbsp;&nbsp;&nbsp;&nbsp;
  <br><br>
  </td>
  <td>
      <?php echo($dato['nombre_cuenta']);?>
      <br><br>
  </td>
  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> <td></td><td></td>

  <td>
      <label>Sucursal actual:</label>&nbsp;&nbsp;&nbsp;&nbsp;
 <br><br>
  </td>
  <td>
        <?php echo($dato['nombre_sucursal']);?>
    <br><br>
  </td>
  
</tr>
</table>
<HR width=100% align="center">
<table>

<tr>
<td>
      <label>Descripcion del bien:</label>&nbsp;&nbsp;&nbsp;&nbsp;
<br><br>
</td>
<td>
      <?php echo($dato['descripcion']);?>
      <br><br>
</td>
</tr>
<tr>
    <td>
      <label>Responsable del bien:</label>&nbsp;&nbsp;&nbsp;&nbsp;
   <br><br>
    </td>
    <td> 
     <?php echo ($dato['nombre_empleado']);?>
  <br><br>
   </td>
</tr>

  
  
    <tr><td>
      <label>Area actual </label>&nbsp;&nbsp;&nbsp;&nbsp;
<br><br>
</td>
<td>
      <?php echo($dato['nombre_area']);?>
<br><br>
</td>
</tr>   
<tr>   
<td>
                <label>Proveedor del bien:</label>&nbsp;&nbsp;&nbsp;&nbsp;
  <br><br>
</td>
<td>
                <?php echo($dato['nombre_provee']);?>
  <br><br>  
</td>
</tr>
<tr>
  <td>
                <label>Precio de compra:</label>&nbsp;&nbsp;&nbsp;&nbsp;
  <br><br>
</td>
<td>
                <?php echo($dato['valor_original']);?>
                <br><br> 
  </td>
</tr>
<tr>
 <td>               <label>Fecha de inicio de uso:</label>&nbsp;&nbsp;&nbsp;&nbsp;
  <br><br>
</td>
<td>
                <?php echo($dato['fecha_inicio_uso']);?>
                <br><br> 
</td>
</tr>
</table>
            <ol class="breadcrumb">
             
              <li class="active"></i><h4> Depreciacion del activo</h4></li>
            </ol>

<table>
  <tr>
  <td>
                <label>Depreciacion Anual:</label>&nbsp;&nbsp;&nbsp;&nbsp;
  <br><br>
</td>
<td>
                <?php echo($dato['cuota_anual']);?>
 <br><br>
</td> 
</tr>           
    <tr>
  <td>          
                <label>Depreciacion Mensual:</label>&nbsp;&nbsp;&nbsp;&nbsp;
  <br><br>
</td>
<td>
                <?php echo($dato['cuota_mensual']);?>
        <br><br>
</td>
</tr>
<tr>
  <td>
 <label>Depreciacion Acumulada:</label>&nbsp;&nbsp;&nbsp;&nbsp;
  <br><br>
</td>
<td>
<?php echo($dato['depreciacion_acumulada']);?>
<br><br></td>
</tr>
</table>
<HR width=100% align="center">
  <table>
<tr>
<td><label>Valor Actual:</label></td>&nbsp;&nbsp;&nbsp;&nbsp;
  <br><br>   
  <td> <?php echo($dato['saldo_restante']);?>  <br><br></td>
</tr>
<tr>
  <td>           <label>Valor Residual:</label>&nbsp;&nbsp;&nbsp;&nbsp;
  <br><br>
     </td>
  <td>           <?php echo($dato['valor_residual']);?>
<br><br>
</td>
</tr>              
                
                 
</table>
        
        <?= validation_errors(); ?>