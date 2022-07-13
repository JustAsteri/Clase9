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

        function CountDays(){

          var inicio = moment($("#fecha1").val());
          var fin = moment($("#fecha2").val());

          var diferencia = (fin.diff(inicio, 'days'));

          var fecha = new Date(inicio);
          var fecha1 = new Date(fin);
          var options = { weekday: 'long'};

          var fechaini = fecha.toLocaleDateString("es-ES", options);
          var fechafin = fecha1.toLocaleDateString("es-ES", options);

          if (diferencia > 5 || diferencia < 5) {

            swal("Error","Los dias seleccionados son menores o mayores que 6, por favor seleccione 6 dias","error");
            $("#fecha2").val("");

          }else if(fechaini != "lunes"){

            swal("Error","La fecha de inicio es diferente a Lunes por favor seleccione una fecha inicial en dia Lunes","error");
            $("#fecha1").val("");

          }
        }

        function CountDays2(){

          var inicio = moment($("#fecha1").val());
          var fin = moment($("#fecha2").val());

          var diferencia = (fin.diff(inicio, 'days'));

          var fecha = new Date(inicio);
          var fecha1 = new Date(fin);
          var options = { weekday: 'long'};

          var fechaini = fecha.toLocaleDateString("es-ES", options);
          var fechafin = fecha1.toLocaleDateString("es-ES", options);

          if (diferencia > 5 || diferencia < 5) {

            swal("Error","Los dias seleccionados son menores o mayores que 6, por favor seleccione 6 dias","error");
            $("#fecha2").val("");

          }else if(fechafin != "sábado"){

            swal("Error","La fecha final es diferente a Sabado por favor seleccione una fecha final en dia Sabado","error");
            $("#fecha1").val("");

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
                                <h4 class="page-title">Calendario</h4>

                            </div>
                        </div>

                        <br>

                         <div class="col-lg-12">
                          <div class="panel panel-border panel-info">
                              <div class="panel-heading">
                                  <h3 class="panel-title">Calendario</h3>
                              </div>
                              <div class="table-responsive">
                                <div class="panel-body">

                                  <div class="card-box">
                                  <div class="col-lg-12">
                          <div class="panel panel-border panel-info">
                              <div class="panel-heading">
                                  <h3 class="panel-title">Horarios de clientes</h3>
                              </div>
                              <div class="table-responsive">
                                <div class="panel-body">

                                  <div class="card-box">
                                  <form role="form" method="POST" id="formMaterial">
                                      <div class="box-body">
                                        <label for="matricula">Seleccione el Horario a Modificar</label>
                                          <div class="row">

                                            <div class="col-md-2">
                                              <select id="cliente" name="cliente" class="form-control" style="width: 300px">
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

                                            <div class="col-md-2">

                                              <label for="fecha1">Inicio</label>
                                              <input type="text" class="form-control" id="fecha1" placeholder="yyyy/mm/dd " id="datepicker-autoclose" onchange="CountDays()">
                                              <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>

                                            </div>

                                            <div class="col-md-2">

                                              <label for="fecha2">Fin</label>
                                              <input type="text" class="form-control" id="fecha2" placeholder="yyyy/mm/dd " id="datepicker-autoclose" onchange="CountDays2()">
                                              <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>

                                            </div>

                                            <br/>
                                            <br/>
                                            <br/>

                                            <div class="col-md-4">
                                            <input type="button" value="Buscar" class="btn btn-primary" onclick="RellenaHorarioFunciones();"/>
                                            </div>
                                          </div>
                                      </div>
                                  </form>
                                </div>

                            </div>
                          </div>
                        </div>
                        </div>

                        <div class="col-lg-12" id="calendario">
                            <div class="panel panel-border panel-info">
                                <div class="panel-heading">
                                  <h3 class="panel-title" id="Materia">Agregar &nbsp;&nbsp;</h3>
                                </div>

                                <div class="panel-body">
                                    <div class="row col-lg-4">
                                        <div class="card-box">
                                            <div class="table-responsive">
                                                <!-- form start -->
                                              <form role="form" method="POST" id="formHorarios">
                                                <div class="box-body">

                                                    <input type="text" class="form-control" id="id_c" name="id_c" style="display: none">
                                                    <input type="text" class="form-control" id="id_cal" name="id_cal" style="display: none">

                                                    <div>

                                                      <label for="fecha">Fecha</label>
                                                      <input type="text" class="form-control" id="fecha" placeholder="yyyy/mm/dd" id="datepicker-autoclose">
                                                      <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>

                                                    </div>

                                                    <div class="form-group" id="divHorario">
                                                      <label for="horas">Elige Horario</label>
                                                      <select id="horas" name="horas" class="form-control">
                                                      <option value="" >Elige Horario</option>

                                                      <option value="8a-9a"> 8:00 a.m - 9:00 a.m. </option>
                                                      <option value="9a-10a"> 9:00 a.m - 10:00 a.m. </option>
                                                      <option value="10a-11a"> 10:00 a.m. - 11:00 a.m. </option>
                                                      <option value="11a-12p"> 11:00 a.m. - 12:00 p.m. </option>
                                                      <option value="12p-1p"> 12:00 p.m. - 1:00 p.m. </option>
                                                      <option value="1p-2p"> 1:00 p.m. - 2:00 p.m. </option>
                                                      <option value="2p-3p"> 2:00 p.m. - 3:00 p.m. </option>
                                                      <option value="3p-4p"> 3:00 p.m. - 4:00 p.m. </option>
                                                      <option value="4p-5p"> 4:00 p.m. - 5:00 p.m. </option>
                                                      <option value="5p-6p"> 5:00 p.m. - 6:00 p.m. </option>
                                                      <option value="6p-7p"> 6:00 p.m. - 7:00 p.m. </option>
                                                      <option value="7p-8p"> 7:00 p.m. - 8:00 p.m. </option>


                                                      </select>
                                                    </div>

                                                    <div class="form-group" id="">
                                                      <label for="motivo">Motivo de la visita</label>
                                                      <input type="text" class="form-control" id="motivo" name="motivo" placeholder="Inventarios, cobranza, etc...">
                                                    </div>

                                                    <div class="form-group" id="">
                                                      <label for="t1">Cliente</label>
                                                      <input type="text" class="form-control" id="t1" name="t1" disabled="true">
                                                    </div>

                                                    <input type="button" value="Guardar" id="botonAgregarHorario" class="btn btn-primary" onclick="AgregarHorario();"/>
                                                    <input type="button" style="display: none" value="Actualizar" id="botonActualizarHorario" class="btn btn-primary" onclick="ActualizaHorario();"/>
                                                  </div>
                                              </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row col-lg-8">
                                        <div class="card-box">
                                          <div class="table-responsive">
                                              <table id="datatable" class="table table-striped table-bordered table-responsive">
                                                <thead>
                                                  <tr>
                                                    <th width="10%">Horas</th>
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
                                                    <td>8:00 a.m - 9:00 a.m</td>
                                                    <td id="l2"></td>
                                                    <td id="ma2"></td>
                                                    <td id=mi2></td>
                                                    <td id=j2> </td>
                                                    <td id="v2"></td>
                                                    <td id="s2"></td>

                                                  </tr>
                                                  <tr>
                                                    <td>9:00 a.m - 10:00 a.m</td>
                                                    <td id="l3"></td>
                                                    <td id="ma3"></td>
                                                    <td id=mi3></td>
                                                    <td id=j3> </td>
                                                    <td id="v3"></td>
                                                    <td id="s3"></td>
                                                  </tr>
                                                  <tr>
                                                    <td>10:00 a.m - 11:00 a.m</td>
                                                    <td id="l4"></td>
                                                    <td id="ma4"></td>
                                                    <td id=mi4></td>
                                                    <td id=j4> </td>
                                                    <td id="v4"></td>
                                                    <td id="s4"></td>
                                                  </tr>
                                                  <tr>
                                                    <td>11:00 a.m - 12:00 p.m</td>
                                                    <td id="l5"></td>
                                                    <td id="ma5"></td>
                                                    <td id=mi5></td>
                                                    <td id=j5> </td>
                                                    <td id="v5"></td>
                                                    <td id="s5"></td>
                                                  </tr>
                                                  <tr>
                                                    <td>12:00 p.m - 1:00 p.m</td>
                                                    <td id="l6"></td>
                                                    <td id="ma6"></td>
                                                    <td id=mi6></td>
                                                    <td id=j6> </td>
                                                    <td id="v6"></td>
                                                    <td id="s6"></td>
                                                  </tr>
                                                  <tr>
                                                    <td>1:00 p.m - 2:00 p.m</td>
                                                    <td id="l7"></td>
                                                    <td id="ma7"></td>
                                                    <td id=mi7></td>
                                                    <td id=j7> </td>
                                                    <td id="v7"></td>
                                                    <td id="s7"></td>
                                                  </tr>
                                                  <tr>
                                                    <td>2:00 p.m - 3:00 p.m</td>
                                                    <td id="l8"></td>
                                                    <td id="ma8"></td>
                                                    <td id=mi8></td>
                                                    <td id=j8> </td>
                                                    <td id="v8"></td>
                                                    <td id="s8"></td>
                                                  </tr>
                                                  <tr>
                                                    <td>3:00 p.m - 4:00 p.m</td>
                                                    <td id="l9"></td>
                                                    <td id="ma9"></td>
                                                    <td id=m9></td>
                                                    <td id=j9> </td>
                                                    <td id="v9"></td>
                                                    <td id="s9"></td>
                                                  </tr>
                                                  <tr>
                                                    <td>4:00 p.m - 5:00 p.m</td>
                                                    <td id="l10"></td>
                                                    <td id="ma10"></td>
                                                    <td id=mi10></td>
                                                    <td id=j10> </td>
                                                    <td id="v10"></td>
                                                    <td id="s10"></td>
                                                  </tr>
                                                  <tr>
                                                    <td>5:00 p.m - 6:00 p.m</td>
                                                    <td id="l11"></td>
                                                    <td id="ma11"></td>
                                                    <td id=mi11></td>
                                                    <td id=j11> </td>
                                                    <td id="v11"></td>
                                                    <td id="s11"></td>
                                                  </tr>
                                                  <tr>
                                                    <td>6:00 p.m - 7:00 p.m</td>
                                                    <td id="l12"></td>
                                                    <td id="ma12"></td>
                                                    <td id=mi12></td>
                                                    <td id=j12> </td>
                                                    <td id="v12"></td>
                                                    <td id="s12"></td>
                                                  </tr>
                                                  <tr>
                                                    <td>7:00 p.m - 8:00 p.m</td>
                                                    <td id="l13"></td>
                                                    <td id="ma13"></td>
                                                    <td id=mi13></td>
                                                    <td id=j13> </td>
                                                    <td id="v13"></td>
                                                    <td id="s13"></td>
                                                  </tr>

                                                </tbody>
                                              </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
