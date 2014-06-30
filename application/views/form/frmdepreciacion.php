   <div class="row">
          <div class="col-lg-12">
          <br><br>
            
            <ol class="breadcrumb">
             
              <li class="active"></i><center><h4> Saldos </h4></center></li>
            </ol>
            
          </div>
        </div><!-- /.row -->

            <!-- /.row -->
            <table>
                <tr>
                   
                    
                </tr>
            </table>
        <div class="form-group"> </div>       
                            <div class="form-group"> </div> 
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                      <form action="" id="tabla_sucursal" method="post" role="form">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                           
                                            <?php foreach ($saldo as $saldo):?>
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
                            </div>
                            <!-- /.table-responsive -->                           
                        </div>
                        <!-- /.panel-body -->
                     </form>
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
