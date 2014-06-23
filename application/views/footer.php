                    <footer class="footer">
                        <br>
                        <br><br><center>Sistema de Control de Activo Fijo</center>

                        <center>Derechos Reservados 2014</center>

                    </footer>       
                    <!-- /.panel-footer -->
                </div>
                <!-- /#page-wrapper -->
            </div>
            <!-- /#wrapper -->
            

    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url().'seteo/js/jquery-1.10.2.js'; ?>"></script>
    <script src="<?php echo base_url().'seteo/js/bootstrap.min.js'; ?>"></script>
    <script src="<?php echo base_url().'seteo/js/plugins/metisMenu/jquery.metisMenu.js'; ?>"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="<?php echo base_url().'seteo/js/plugins/morris/raphael-2.1.0.min.js'; ?>"></script>
    <script src="<?php echo base_url().'seteo/js/plugins/morris/morris.js'; ?>"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?php echo base_url().'seteo/js/sb-admin.js'; ?>"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="<?php echo base_url().'seteo/js/demo/dashboard-demo.js'; ?>"></script>   

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="<?php echo base_url().'seteo/js/plugins/dataTables/jquery.dataTables.js'; ?>"></script>
    <script src="<?php echo base_url().'seteo/js/plugins/dataTables/dataTables.bootstrap.js'; ?>"></script>
    <script src="<?php echo base_url().'seteo/media/js/jquery.js'; ?>"></script>
    <script src="<?php echo base_url().'seteo/media/js/jquery.dataTables.js'; ?>"></script>


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>
    <script> 
            /** 
            * Muestra una ventana emergente 
            * con un mensaje especificado 
            */ 
            function dialogo(title ,message){ 
                $('.notify').html( message ); 
                $( "#dialogo" ).dialog({ 
                    autoOpen  : true, 
                    width     : 400, 
                    title     : title, 
                    "position": ['middle',30], 
                    modal     : true, 
                    resizable : false, 
                    buttons   : { 
                        "Cerrar": function() { 
                            $(  "#dialogo" ).dialog( "close" ); 
                        } 
                    }, 
                    open: function(){}, 
                    close: function(){} 
                }); 
            }; 
            /** 
            * Muestra una alerta 
            * Si recibe solo msj la alerta es amariila 
            * Si recibe msj y estado = true, la alerta es verde 
            * Si recibe msj y estado = false, la alerta es roja 
            * Si no recibe parametro limpia la alerta 
            */ 
            function alerta(msj, estado){ 
                if( msj == null && estado == null ){ $('#msj').empty(); return; } 
                if( estado == null ){ 
                    $('#msj').empty().html('<div class="alert alert-warning">'+ msj +'</div>'); 
                }else if( estado == true ){ 
                    $('#msj').empty().html('<div class="alert alert-success">'+ msj +'</div>'); 
                }else if ( estado == false ){ 
                    $('#msj').empty().html('<div class="alert alert-danger">'+ msj +'</div>'); 
                } 
            } 
        </script> 

 
   
</body>

</html>
