<?
header("Content-type: application/vnd.ms-excel; name='excel'");
header("Content-Disposition: attachment; filename=reporte_depreciacion.xls");
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
            <td style="font-weight: bold;text-align: center; font-size:25;  color: #000;" colspan="4">
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
<table  border="1">
      <thead>
            <tr>            
                  <th>Cuenta</th>
                  <th>Debe</th>
                  <th>Haber</th> 
            </tr>
      </thead>
      <tbody>
            <?php foreach ($reporte_total as $saldo):?>
            <tr>           
                  <td>Depreciacion Activo</td>
                  <td><?= $saldo->DEBE?></td>
                  <td></td>
            </tr>
            <tr>
                  <td align= "right">Propiedad, Planta y Equipo</td>
                  <td></td>
                  <td><?= $saldo->HABER?></td>
            </tr>
            <? endforeach ; ?>
            </tbody>
</table>

<br>
<br>

<table border="1">
      <thead>
            <tr>            
                  <th>Cuenta</th>
                  <th>Saldo Inicial</th>
                  <th>Depreciacion Acumulada</th> 
            </tr>
      </thead>
      <tbody>
            <?php foreach ($reporte_cuentas as $saldo):?>
            <tr>           
                  <td><?= $saldo->Cuenta?></td>
                  <td><?= $saldo->SaldoInicial?></td>
                  <td><?= $saldo->DepreciacionAcumulada?></td>
            </tr>            
            <? endforeach ; ?>
            </tbody>
</table>

<BR>
<BR>
<TABLE border="1">
      <CAPTION>PROPIEDAD PLANTA Y EQUIPO</CAPTION>
      <COLGROUP align="center">
      <COLGROUP align="center">
      <THEAD valign="top">
            <TR>
                  <TH>DEBE
                  <TH>HABER
      <TBODY>
            <?php foreach ($reporte_depre_acumulada as $saldo):?>
            <TR>
                  <TD><?= $saldo->DEBE?>
                  <TD><?= $saldo->HABER?>
            <TR>
                  <TD><BR><?= $saldo->TotalActivo?>
            <? endforeach ; ?>
</TABLE>