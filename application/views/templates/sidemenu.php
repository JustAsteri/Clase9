<!-- ========== Left Sidebar Start ========== -->

            <?php $rol = ($this->session->userdata('tipo_user'));

            echo "<script languaje='JavaScript'>

                $( document ).ready(function() {
                var roles= '$rol';

                switch(roles) {

                    case 'SU':

                        break;

                    case 'A':



                        break;

                    case 'E':

                    break;

                }

            });

            </script>";
            ?>

            <div class="left side-menu" id="master" >
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu" >
                        <ul id="todo">
                            <li class="text-muted menu-title" style="color:black;">Menu</li>

                            <li class="has_sub" id="home">
                                <a href="<?= base_url('index.php/Dashboard/');?>" class="waves-effect waves-light"
                                  style="color:black;"><i class="fa fa-bank "></i><span> Inicio</span> </a>
                            </li>

                            <li class="has_sub" id="home">
                                <a href="<?= base_url('index.php/Dashboard_cal/');?>" class="waves-effect waves-light"
                                  style="color:black;"><i class="fa fa-bank "></i><span> Inicio_JS</span> </a>
                            </li>

                            <li class="has_sub" id="home">
                                <a href="<?= base_url('index.php/Dashboard_full/');?>" class="waves-effect waves-light"
                                  style="color:black;"><i class="fa fa-bank "></i><span> Inicio_Full</span> </a>
                            </li>

                            <li class="has_sub" id="usuarios">
                                <a href="<?= base_url('index.php/Usuarios/');?>" class="waves-effect waves-light"
                                  style="color:black;"><i class="fa fa-user-plus "></i><span> Usuarios</span> </a>
                            </li>

                            <li class="has_sub" id="calendariomenu">
                                <a href="<?= base_url('index.php/Calendario/');?>" class="waves-effect waves-light"
                                  style="color:black;"><i class="fa fa-calendar "></i><span> Calendario</span> </a>
                            </li>

                            <li class="has_sub" id="clientes">
                                <a href="<?= base_url('index.php/Clientes/');?>" class="waves-effect waves-light"
                                  style="color:black;"><i class="fa fa-user "></i><span> Clientes</span> </a>
                            </li>

                            <li class="has_sub" id="reportes">
                                <a href="#" class="waves-effect waves-light"
                                  style="color:black;"><i class="fa fa-user "></i><span> Reportes</span></a>

                                <ul class="list-unstyled">
                                    <li class="has_sub" id="reporte1">
                                      <a href="<?= base_url('index.php/Reportes/');?>" class="waves-effect waves-light"
                                        style="color:black;"><i class="fa fa-user "></i><span> Citas por Fecha</span> </a>
                                    </li>
                                    <li class="has_sub" id="reporte2">
                                      <a href="<?= base_url('index.php/Reportes2/');?>" class="waves-effect waves-light"
                                        style="color:black;"><i class="fa fa-user "></i><span> Citas por Mes</span> </a>
                                    </li>
                                    <li class="has_sub" id="reporte3">
                                      <a href="<?= base_url('index.php/Reportes3/');?>" class="waves-effect waves-light"
                                        style="color:black;"><i class="fa fa-user "></i><span> Citas por Cliente</span> </a>
                                    </li>
                                </ul>

                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->
