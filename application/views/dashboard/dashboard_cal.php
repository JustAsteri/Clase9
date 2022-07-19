    <!-- Content Wrapper. Contains page content -->
     
    <?php
     /* Dependencias requeridas para el funcionamiento de la DataTable */
    /* ==============================================================
            <---  CSS TEMPLATE  --->
            ============================================================== */
    
            echo link_tag('assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.css');
            
    /* ==============================================================
            <---  JS TEMPLATE  --->
            ============================================================== */

            echo script_tag("assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.js");
            echo script_tag("assets/darktemplate/pages/jquery.sweet-alert.init.js");
          
    /* ==============================================================
            <---  JS MYAPP  --->
            ============================================================== */
             echo script_tag("assets/myapp/js/MY_Functions.js");
            ?>


<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?= base_url('assets/myapp/css/calendar_js.css'); ?>">
        <script src="<?= base_url('assets/myapp/js/calendar_js.js'); ?>"></script>
        
    </head>

    <script>
        var resizefunc = [];

        $(document).ready(function() {


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
                                <h4 class="page-title">Inicio_JS</h4>
                            </div>
                        </div>

                        <br>

                        <div class="col-lg-12">
                            <div class="panel panel-border panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title" id="mes"></h3>
                                </div>
                                <div class="table-responsive">
                                    <div class="panel-body">
                                      
                                    <div id="calendario">
                                        <div id="anterior" onclick="mesantes()"></div>
                                        <div id="posterior" onclick="mesdespues()"></div>
                                        <h2 id="titulos"></h2>
                                        <table id="diasc">
                                            <tr id="fila0"><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>
                                            <tr id="fila1"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                                            <tr id="fila2"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                                            <tr id="fila3"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                                            <tr id="fila4"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                                            <tr id="fila5"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                                            <tr id="fila6"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                                        </table>
                                        <div id="fechaactual"><i onclick="actualizar()">HOY: </i></div>
                                        <div id="buscafecha">
                                            <form action="#" name="buscar">
                                            <p>Buscar ... MES
                                                <select name="buscames">
                                                <option value="0">Enero</option>
                                                <option value="1">Febrero</option>
                                                <option value="2">Marzo</option>
                                                <option value="3">Abril</option>
                                                <option value="4">Mayo</option>
                                                <option value="5">Junio</option>
                                                <option value="6">Julio</option>
                                                <option value="7">Agosto</option>
                                                <option value="8">Septiembre</option>
                                                <option value="9">Octubre</option>
                                                <option value="10">Noviembre</option>
                                                <option value="11">Diciembre</option>
                                                </select>
                                            ... AÑO ...
                                                <input type="text" name="buscaanno" maxlength="4" size="4" />
                                            ... 
                                                <input type="button" value="BUSCAR" onclick="mifecha()" />
                                            </p>
                                            </form>
                                        </div>
                                    </div>

                                      <!-- Inicia modal content -->
                                      <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                          <div class="modal-dialog" style="width:55%;">
                                              <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                <h4 class="modal-title" id="custom-width-modalLabel">
                                                    
                                                </h4>
                                              </div>
                                              <div class="modal-body">
                                                <table id="datatable" class="table table-striped table-bordered table-responsive">
                                                  <thead>
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Horario</th>
                                                        <th>Motivo</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody id="tablahorarios"> 
                                                  </tbody>
                                                </table>
                                              </div>
                                              <div class="modal-footer">
                                              
                                                  <button type="button" id="atras" class="btn btn-primary btn-custom waves-effect waves-light" data-dismiss="modal">Regresar</button>                                                                              
                                              </div>
                                            </div><!-- /.modal-content -->
                                          </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                                      
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