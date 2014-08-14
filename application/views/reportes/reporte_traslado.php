<?php
	header("Content-type: application/octet-stream");
	header("Content-Disposition: attachment; filename=reporte_traslado.xls");
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
          	<th>Codigo Traslado Activo</th>
            <th>Codigo Activo</th>
            <th>Nombre del Activo</th>
            <th>Motivo de Traslado</th>
            <th>Fecha de Traslado</th>                                        
            <th>Receptor de Traslado</th>
            <th>Encargado</th>
			</tr>
    </thead>
    <tbody>
            <?php foreach ($reporte_traslado as $traslado):?>
            <tr>
                <td><?= $traslado->codigo_traslado?></td>   
              	<td><?= $traslado->id_activofijo?></td>
                <td><?= $traslado->nombre_activo_fijo?></td>                                             
                <td><?= $traslado->motivo_traslado?></td> 
                <td><?= $traslado->fecha_traslado?></td>                                           
                <td><?= $traslado->nombre_sucursal?></td>
                <td><?= $traslado->nombre_empleado?></td>
                </tr>
                <?php endforeach ;?>                                    
    </tbody>
</table>