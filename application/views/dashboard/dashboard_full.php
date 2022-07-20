    <!-- Content Wrapper. Contains page content -->
     
    <?php
     /* Dependencias requeridas para el funcionamiento de la DataTable */
    /* ==============================================================
            <---  CSS TEMPLATE  --->
            ============================================================== */
    
            echo link_tag('assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.css');
            echo link_tag('assets/darktemplate/plugins/fullcalendar/css/main.css');

            
    /* ==============================================================
            <---  JS TEMPLATE  --->
            ============================================================== */

            echo script_tag("assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.js");
            echo script_tag("assets/darktemplate/pages/jquery.sweet-alert.init.js");
            echo script_tag("assets/darktemplate/plugins/fullcalendar/js/main.js");
            echo script_tag("assets/darktemplate/plugins/fullcalendar/locale/es.js");


          
    /* ==============================================================
            <---  JS MYAPP  --->
            ============================================================== */
             echo script_tag("assets/myapp/js/MY_Functions.js");
            ?>


<html>
    <head>
        <meta charset="utf-8">
        
    </head>

    <script>
        var resizefunc = [];

        $(document).ready(function() {


        });

        // function LimitaCalendarioMes()
        // {
        //     date = new Date();
        //     var mes = date.getMonth();

        //     switch (mes) 
        //     {
        //         case 0:
        //             $("#mes").html("Enero");
        //             break;
        //         case 1:
        //             $("#mes").html("Febrero");
        //             $("#l6").hide();
        //             $("#ma6").hide();
        //             $("#mi6").hide();
        //             break;
        //         case 2:
        //             $("#mes").html("Marzo");
        //             break;
        //         case 3:
        //             $("#mes").html("Abril");
        //             $("#mi6").hide();
        //             break;
        //         case 4:
        //             $("#mes").html("Mayo");
        //             break;
        //         case 5:
        //             $("#mes").html("Junio");
        //             $("#mi6").hide();
        //             break;
        //         case 6:
        //             $("#mes").html("Julio");
        //             break;
        //         case 7:
        //             $("#mes").html("Agosto");
        //             break;
        //         case 8:
        //             $("#mes").html("Septiembre");
        //             $("#mi6").hide();
        //             break;
        //         case 9:
        //             $("#mes").html("Octubre");
        //             break;
        //         case 10:
        //             $("#mes").html("Noviembre");
        //             $("#mi6").hide();
        //             break;
        //         case 11:
        //             $("#mes").html("Diciembre");
        //             break;
        //     }
        // }

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth'
                },
                dateClick: function(info) {
                    RellenaDatosDiaMes(info.dateStr);
                }
            });

            calendar.render();
        })

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
                                <h4 class="page-title">Inicio</h4>
                               
                            </div>
                        </div>

                        <br>

                        <div class="col-lg-12">
                            <div class="panel panel-border panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title" id="mes"></h3>
                                </div>
                                <div class="table-responsive">
                                    <div id="calendar"></div>
                                        
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