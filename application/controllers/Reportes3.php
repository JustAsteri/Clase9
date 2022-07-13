<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes3 extends MY_Controller {

	public function __construct() {
        parent::__construct();
    }

    public function index(){
        $data['tabTitle'] = "Plantilla Base - Inicio";
        $data['pagecontent'] = "reportes/reportes3";

        $data['clientesactivos'] = $this->Query_Model->DatosClientesActivos();
        $this->loadpageintotemplate($data);
   }

   public function CitasClienteActivo()
   {
        $res = $this->Query_Model->CitasClienteActivo();
        echo json_encode($res);
   }

   // public function Cliente()
   // {
   //      $cliente = $this->input->post("cliente");

   //      $res = $this->Query_Model->GetClientById($cliente);
   //      echo json_encode($res);
   // }

} ?>