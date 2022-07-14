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
        
    </head>

    <script>
        var resizefunc = [];

        $(document).ready(function() {


        });

        function LimitaCalendarioMes()
        {
            date = new Date();
            var mes = date.getMonth();

            switch (mes) 
            {
                case 0:
                    $("#mes").html("Enero");
                    break;
                case 1:
                    $("#mes").html("Febrero");
                    $("#l6").hide();
                    $("#ma6").hide();
                    $("#mi6").hide();
                    break;
                case 2:
                    $("#mes").html("Marzo");
                    break;
                case 3:
                    $("#mes").html("Abril");
                    $("#mi6").hide();
                    break;
                case 4:
                    $("#mes").html("Mayo");
                    break;
                case 5:
                    $("#mes").html("Junio");
                    $("#mi6").hide();
                    break;
                case 6:
                    $("#mes").html("Julio");
                    break;
                case 7:
                    $("#mes").html("Agosto");
                    break;
                case 8:
                    $("#mes").html("Septiembre");
                    $("#mi6").hide();
                    break;
                case 9:
                    $("#mes").html("Octubre");
                    break;
                case 10:
                    $("#mes").html("Noviembre");
                    $("#mi6").hide();
                    break;
                case 11:
                    $("#mes").html("Diciembre");
                    break;
            }
        }

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
                                    <div class="panel-body">


                                    <!-- NUEVO SEGMENTO -->
                                        <div class="row col-lg-13">
                                            <div class="card-box">
                                                <div class="table-responsive">                                            
                                                <table id="datatable" class="table table-striped table-bordered table-responsive">
                                                    <thead>
                                                      <tr>
                                                        <!-- <th width="10%">Horas</th> -->
                                                        <th width="12%">Lunes</th>
                                                        <th width="12%">Martes</th>
                                                        <th width="12%">Miercoles</th>
                                                        <th width="12%">Jueves</th>
                                                        <th width="12%">Viernes</th>
                                                        <th width="12%">Sabado</th>
                                                        <th width="12%">Domingo</th>

                                                      </tr>
                                                    </thead>
                                                    <tbody align="center" style="color: black; font-weight: bolder; font-size: 15px">
                                                    
                                                      <tr>
                                                        <!-- <td>1</td> -->
                                                        <td id="l1"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(1);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">1</button></td>

                                                        <td id="ma1"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(2);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">2</button></td>

                                                        <td id=mi1><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(3);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">3</button></td>

                                                        <td id=j1><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(4);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">4</button></td>

                                                        <td id="v1"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(5);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">5</button></td>

                                                        <td id="s1"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(6);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">6</button></td>

                                                         <td id="d1"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(7);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">7</button></td>


                                                      </tr>
                                                      <tr>
                                                        <!-- <td>2</td> -->
                                                        <td id="l2"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(8);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">8</button></td>

                                                        <td id=ma2><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(9);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">9</button></td>

                                                        <td id=mi2><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(10);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">10</button></td>

                                                        <td id="j2"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(11);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">11</button></td>

                                                        <td id="v2"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(12);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">12</button></td>

                                                         <td id="s2"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(13);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">13</button></td>

                                                        <td id="d2"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(14);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">14</button></td>
                                                      </tr>
                                                      <tr>
                                                        <!-- <td>3</td> -->

                                                        <td id=l3><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(15);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">15</button></td>

                                                        <td id=ma3><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(16);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">16</button></td>

                                                        <td id="mi3"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(17);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">17</button></td>

                                                        <td id="j3"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(18);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">18</button></td>

                                                         <td id="v3"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(19);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">19</button></td>

                                                        <td id="s3"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(20);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">20</button></td>

                                                        <td id=d3><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(21);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">21</button></td>

                                                      </tr>
                                                      <tr>
                                                        <!-- <td>4</td> -->
                                                       
                                                        <td id=l4><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(22);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">22</button></td>

                                                        <td id="ma4"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(23);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">23</button></td>

                                                        <td id="mi4"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(24);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">24</button></td>

                                                         <td id="j4"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(25);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">25</button></td>

                                                        <td id="v4"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(26);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">26</button></td>

                                                        <td id=s4><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(27);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">27</button></td>

                                                        <td id=d4><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(28);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">28</button></td>
                                                      </tr>
                                                      <tr>
                                                        <!-- <td>5</td> -->

                                                        <td id="l6"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(29);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">29</button></td>

                                                        <td id="ma6"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(30);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">30</button></td>

                                                         <td id="mi6"><button type="button" id="activa" class="btn btn-primary btn-custom btn-rounded waves-effect waves-light" onclick="RellenaDatosDiaMes(31);" align="center" style="font-size: 120%" data-toggle="modal" data-target="#custom-width-modal">31</button></td>
                                                      </tr>       
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                        <!-- FIN DEL NUEVO SEGMENTO -->
                                      
                                      <!-- Inicia modal content -->
                                      <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                          <div class="modal-dialog" style="width:55%;">
                                              <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title" id="custom-width-modalLabel"></h4>
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