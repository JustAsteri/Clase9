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
                                        <!-- Tabla -->
                                        <div class="col-lg-8" style="margin-top: 1.2rem;">
                                            <div class="panel panel-border panel-info">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Listado de Clientes</h3>
                                                </div>
                                                <div class="table-responsive">
                                                  <div class="panel-body">
                                                    <table id="datatable" class="table table-striped table-bordered table-responsive">
                                                      <thead>
                                                        <tr>
                                                          <th>Nombre</th>
                                                          <th>Empresa</th>
                                                          <th>Estatus</th>
                                                          <th>Editar</th>
                                                          <th>Borrar</th>

                                                        </tr>
                                                      </thead>
                                                      <tbody>

                                                        <?php

                                                        $valores = count($clientesactivos);
                                                        for ($i=0; $i < $valores ; $i++) {
                                                          $res = $clientesactivos[$i];
                                                          $id = $res -> id_cliente;
                                                          $nombre = $res -> nombre;
                                                          $apaterno= $res -> apaterno;
                                                          $amaterno = $res -> amaterno;
                                                          $email = $res -> email;
                                                          $empresa = $res -> empresa;
                                                          $estatus = $res -> estado;


                                                          $nombre_completo = $nombre . ' ' .$apaterno. ' ' .$amaterno;

                                                          echo "
                                                          <tr>
                                                            <td>$nombre_completo</td>
                                                            <td>$empresa</td>";
                                                            if($estatus == 1) {
                                                              echo "<td><span class='label label-success'>Activo</span></td>";
                                                            }else{
                                                              echo "<td><span class='label label-danger'>Inactivo</span></td>";
                                                            }

                                                            echo "<td>";
                                                            echo "<a href='#' id='Editar' onclick='EditarCliente($id)'><i class='fa fa-pencil'></i> </a>
                                                            </td>";

                                                            echo "<td>";
                                                            echo "<a href='#' id='Borrar' onclick='BorrarCliente($id)'><i class='fa fa-close'></i> </a>
                                                            </td>";

                                                          echo "</tr>";
                                                        }
                                                      ?>

                                                      </tbody>
                                                    </table>
                                                  </div>
                                                </div>
                                              </div>
                                        </div>

                                        </div>

                                        <div class="form-group" style="margin-top: 50px;">
                                            <div id="preloader" hidden="true" align="center">
                                                <img src="<?php echo base_url('assets/myapp/img/preloader2.gif'); ?>" alt="validando...">
                                            </div>
                                        </div>

                                        <div class="col-md-12" style="margin: 20px auto;">
                                            <input type="button" value="PDF" name="" id="boton" class="btn btn-primary" onclick="CitasActivoCliente();" />
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