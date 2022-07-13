    <!-- Content Wrapper. Contains page content -->
     
     <?php
     /* Dependencias requeridas para el funcionamiento de la DataTable */
    /* ==============================================================
            <---  CSS TEMPLATE  --->
            ============================================================== */

            echo link_tag('assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.css');
            echo link_tag('assets/darktemplate/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css');

    /* ==============================================================
            <---  JS TEMPLATE  --->
            ============================================================== */

            echo script_tag("assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.js");
            echo script_tag("assets/darktemplate/pages/jquery.sweet-alert.init.js");
            echo script_tag("assets/darktemplate/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js");

    /* ==============================================================
            <---  JS MYAPP  --->
            ============================================================== */

             echo script_tag("assets/myapp/js/MY_Functions.js");
            ?>


<html>
    <head>
        <meta charset="utf-8">
        
    </head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.3.0-beta.2/pdfmake.min.js" integrity="sha512-k9XKlDENMt9s19gEl+L6F/r+OWAR4pesbUd8/SKQVMt3b1ECqsRXgLA9XnJoq4J9mjlxLQabfTxf3268lzpFUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.3.0-beta.2/vfs_fonts.min.js" integrity="sha512-6RDwGHTexMgLUqN/M2wHQ5KIR9T3WVbXd7hg0bnT+vs5ssavSnCica4Uw0EJnrErHzQa6LRfItjECPqRt4iZmA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        
        var resizefunc = [];

        $(document).ready(function() {


            var resizefunc = [];

            $("#calendario").hide();
            $("#editar").hide();


            $('#fecha').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy/mm/dd'
          });

          $('#fecha1').datepicker({
            firstDay: 1,
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy/mm/dd'
          });

          $('#fecha2').datepicker({
            firstDay: 1,
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy/mm/dd'
          });


        });


    </script>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title">Reportes</h4>
                               
                            </div>
                        </div>

                        <br>

                        <div class="col-lg-12">
                            <div class="panel panel-border panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Clientes Reportes</h3>
                                </div>
                            <div class="table-responsive">
                                <div class="panel-body">

                                    <div class="card-box">
                                        <!-- Selector de cliente -->
                                        <div class="col">
                                            <label for="matricula">Seleccione el Cliente</label>
                                          <select id="cliente" name="cliente" class="form-control" style="width: 540px; margin: 0 auto;">
                                            <option value="" >Elije Cliente</option>

                                            <?php

                                            $valores = count($clientesactivos);
                                            for ($i=0; $i < $valores ; $i++) {
                                              $res = $clientesactivos[$i];
                                              $id = $res -> id_cliente;
                                              $nombre = $res -> nombre;
                                              $apaterno = $res -> apaterno;
                                              $amaterno = $res -> amaterno;
                                              $nombrecompleto;

                                              $nombrecompleto = $nombre . ' ' . $apaterno . ' ' . $amaterno;

                                              echo "<option value='$id' >$nombrecompleto</option>";
                                              }
                                              ?>
                                          </select>
                                        </div>

                                        <!-- Fechas -->
                                        <div class="col" style="margin-top: 20px;">

                                            <div class="col-md-6">
                                              <label for="fecha1">Inicio</label>
                                              <input type="text" class="form-control" id="fecha1" placeholder="yyyy/mm/dd " id="datepicker-autoclose" >
                                              <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                                            </div>

                                            <div class="col-md-6">
                                              <label for="fecha2">Fin</label>
                                              <input type="text" class="form-control" id="fecha2" placeholder="yyyy/mm/dd " id="datepicker-autoclose" >
                                              <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                                            </div>

                                        </div>

                                        </div>

                                        <div class="form-group" style="margin-top: 50px;">
                                            <div id="preloader" hidden="true" align="center">
                                                <img src="<?php echo base_url('assets/myapp/img/preloader2.gif'); ?>" alt="validando...">
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="margin: 20px auto;">
                                            <input type="button" value="PDF" name="" id="boton" class="btn btn-primary" onclick="CitasRangoCliente();" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div> <!-- container -->                               
                </div> <!-- content -->

                <footer class="footer">
                     <?= date('Y')?> &copy; 
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->



        </div>
        <!-- END wrapper -->

    </body>
</html>