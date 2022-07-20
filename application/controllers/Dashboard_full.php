<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_full extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $data['tabTitle'] = "Plantilla Base - Inicio";
        $data['pagecontent'] = "dashboard/dashboard_full";

        $this->loadpageintotemplate($data);

   }

   public function CheckDatosCitas()
   {
    $fechacompleta = $this->input->post('fecha');

    $res = $this->Query_Model->CheckCitas($fechacompleta);
    echo json_encode($res);

   }
}
