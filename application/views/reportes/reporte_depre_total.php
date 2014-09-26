<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reporte_saldo.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table>   

<tr>
            <td style="font-weight: bold;text-align: center; font-size:25;" colspan="6">                   
            <center><img src="C:\xampp\htdocs\sistema\seteo\logos\logo_peque.png"></center>           
            </td>
</tr>

<tr>
            <td ></td>
</tr>

<th>
            <td style="font-weight: bold;text-align: center; font-size:25;  color: #000;" colspan="6">
                  Sistema de Control de Activos Fijos.
            </td>
</th> 

	<tr>
            <td></td>
		<td style="font-weight: bold;text-align: center; font-size:25; background-color:#99CCFF; color: #fff;" colspan="6">
                  Reporte de Depreciacion Acumulada
		</td>
	</tr>
	<tr>
		<td colspan="3"></td>
	</tr>
	<tr>
		<td></td>
            <td></td>
		<td style="font-weight: bold;text-align: center;">Fecha Emision:</td>
		<td><?php echo date("Y-m-d H:i:s")?></td>
	</tr>
	<tr>
		<td colspan="3"></td>
	</tr>
</table>
<table  border="1" >
      <thead>
            <tr>           
            <th>Activo Fijo</th>
            <th>Depreciacion Acomulada</th>
            <th>Total Activo</th> 
            </tr>
      </thead>
      <tbody>
            <?php foreach ($reporte_depre_total as $saldo):?>
            <tr>           
            <td><?= $saldo->ActivoFijo?></td>
            <td><?= $saldo->DepAcumuladaActivoFijo?></td>
            <td><?= $saldo->TotalActivo?></td>
            </tr>
            <? endforeach ; ?>
            </tbody>
</table>