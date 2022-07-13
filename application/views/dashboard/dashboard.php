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
                                  <h3 class="panel-title">Titulo</h3>
                              </div>
                              <div class="table-responsive">
                                <div class="panel-body">
                                     <!-- NUEVO SEGMENTO -->
                                    <div class="row">
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

                                                  </tr>
                                                </thead>
                                                <tbody align="center" style="color: black; font-weight: bolder; font-size: 15px">
                                                
                                                  <tr>
                                                    <!-- <td>1</td> -->
                                                    <td id="l1">1</td>
                                                    <td id="ma1">2</td>
                                                    <td id=mi1>3</td>
                                                    <td id=j1>4</td>
                                                    <td id="v1">5</td>
                                                    <td id="s1">6</td>

                                                  </tr>
                                                  <tr>
                                                    <!-- <td>2</td> -->
                                                    <td id="l2">7</td>
                                                    <td id="ma3">8</td>
                                                    <td id=mi3>9</td>
                                                    <td id=j3>10</td>
                                                    <td id="v3">11</td>
                                                    <td id="s3">12</td>
                                                  </tr>
                                                  <tr>
                                                    <!-- <td>3</td> -->
                                                    <td id="l3">13</td>
                                                    <td id="ma4">14</td>
                                                    <td id=mi4>15</td>
                                                    <td id=j4>16</td>
                                                    <td id="v4">17</td>
                                                    <td id="s4">18</td>
                                                  </tr>
                                                  <tr>
                                                    <!-- <td>4</td> -->
                                                    <td id="l4">19</td>
                                                    <td id="ma5">20</td>
                                                    <td id=mi5>21</td>
                                                    <td id=j5>22</td>
                                                    <td id="v5">23</td>
                                                    <td id="s5">24</td>
                                                  </tr>
                                                  <tr>
                                                    <!-- <td>5</td> -->
                                                    <td id="l5">25</td>
                                                    <td id="ma6">26</td>
                                                    <td id=mi6>27</td>
                                                    <td id=j6>28</td>
                                                    <td id="v6">29</td>
                                                    <td id="s6">30</td>
                                                  </tr>                                                 
                                                
                                                </tbody>
                                              </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- FIN DEL NUEVO SEGMENTO -->
                                  <div class="card-box">

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