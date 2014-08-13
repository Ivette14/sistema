 <?php   
header("Content-Type: application/vnd.ms-excel");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("content-disposition: attachment;filename=activos.xls");
?>        
<h2>Tabla de pruebasss</h2>

                               <table>
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Nombre AF</th>
                                            <th>Cuenta</th>
                                            <th>Sucursal </th>
                                            <th>Area </th>
                                            <th>Responsable </th>
                                            <th>Fecha De ingreso</th>
                                            
                                            
                                        <!--    <th> Descripcion </th> -->
                                          
                                    <!--        <th>Editar</th>
                                            <th>Eliminar</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>


                                        
                                           
                                            <tr>
                                            <td><?= $activo->id_activofijo?></td> 
                                            <td><?= $activo->nombre_activo_fijo?></td>
                                            <td><?= $activo->nombre_cuenta?></td> 
                                            <td><?= $activo->nombre_sucursal?></td> 
                                            <td><?= $activo->nombre_area?></td>
                                            <td><?= $activo->nombre_empleado?></td>
                                            <td><?= $activo->fecha_ingreso?></td>
                                            

                                       <!-- <td><?= $activo->descripcion?></td>   -->
                                          
                                                                                      <!--  <td align="center"><button type="button" onclick=location="<?php echo base_url().'crud_activo/eliminar/'.$activo->id_activofijo; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i>&nbsp;Eliminar</button></td> 
                                            -->
                                               </tr>
                                           
                                           
                                    
                                    </tbody>
                                </table>
                           