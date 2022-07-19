<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_cal extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $data['tabTitle'] = "Plantilla Base - Inicio";
        $data['pagecontent'] = "dashboard/dashboard_cal";

        $this->loadpageintotemplate($data);

   }

//    public function CheckDatosCitas()
//    {
//     $dia = $this->input->post('dia');
//     $mes = $this->input->post('mes');
//     $anio = $this->input->post('anio');
//     $fechacompleta = $anio . "-" . $mes . "-" . $dia;

//     $res = $this->Query_Model->CheckCitas($fechacompleta);
//     echo json_encode($res);

//    }
}
