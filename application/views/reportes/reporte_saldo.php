<?php
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=reporte_saldo.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
?>
<table>
	<tr>
		<td style="font-weight: bold;text-align: center; font-size:1.5; background-color:#BA5A41; color: #fff;" colspan="6">
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
            <?php endforeach ;?>
            </tbody>
</table>