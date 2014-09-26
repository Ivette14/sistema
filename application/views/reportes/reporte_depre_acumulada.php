<?
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reporte_saldo.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table>
<tr>
            <td ></td>
</tr>

<th>
      <td style="font-weight: bold;text-align: center; font-size:25;" colspan="0">                   
            <center><img src="C:\xampp\htdocs\sistema\seteo\logos\logo_peque.png"></center>           
            </td>
            <td style="font-weight: bold;text-align: center; font-size:25;  color: #000;" colspan="3">
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
            <th>Nombre Cuenta</th>
            <th>Depreciacion Acomulada</th>
            <th>Saldo Inicial</th> 
            </tr>
      </thead>
      <tbody>
            <?php foreach ($reporte_depre_acumulada as $saldo):?>
            <tr>           
            <td><?= $saldo->Cuenta?></td>
            <td><?= $saldo->DepreciacionAcumulada?></td>
            <td><?= $saldo->SaldoInicial?></td>
            </tr>
            <? endforeach ; ?>
            </tbody>
</table>