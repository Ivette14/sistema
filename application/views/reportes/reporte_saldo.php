<?
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=reporte_saldo.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table>   

<tr>
            <td style="font-weight: bold;text-align: center; font-size:25;  " colspan="6">
                   
            <center><img src="C:\xampp\htdocs\sistema\seteo\logos\logo_peque.png"></center>
            
            </td>
</tr>

<tr>
            <td >
                   
            
            
            </td>
</tr>

<th>
            <td style="font-weight: bold;text-align: center; font-size:25;  color: #000;" colspan="6">
                  Sistema de Control de Activos Fijos.
            </td>
</th> 

	<tr>
		<td style="font-weight: bold;text-align: center; font-size:25; background-color:#99CCFF; color: #fff;" colspan="6">
                  Reporte de Depreciacion
		</td>
	</tr>
	<tr>
		<td colspan="6"></td>
	</tr>
	<tr>
		<td></td>
		<td style="font-weight: bold;text-align: center;">Fecha Emision:</td>
		<td><?php echo date("Y-m-d H:i:s")?></td>
	</tr>
	<tr>
		<td colspan="8"></td>
	</tr>
</table>
<table border="1">
	<thead>
            <tr>
            <th>Codigo de Activo</th>
            <th>Nombre</th>
            <th>Nombre Cuenta</th>
            <th>Depreciacion Mensual</th>
            <th>Depreciacion Acomulada</th>
            <th>Valor En Libros</th> 
            </tr>
    </thead>
    <tbody>
            <?php foreach ($reporte_saldo as $saldo):?>
            <tr>
            <td><?= $saldo->id_activofijo?></td>   
            <td><?= $saldo->nombre_activo_fijo?></td> 
            <td><?= $saldo->nombre_cuenta?></td> 
            <td><?= $saldo->cuota_mensual?></td>
            <td><?= $saldo->depreciacion_acumulada?></td>
            <td><?= $saldo->saldo_restante?></td>
            </tr>
            <? endforeach ; ?>
            </tbody>
</table>