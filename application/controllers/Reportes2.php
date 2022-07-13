<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes2 extends MY_Controller {

	public function __construct() {
        parent::__construct();
    }

    public function index(){
        $data['tabTitle'] = "Plantilla Base - Inicio";
        $data['pagecontent'] = "reportes/reportes2";

        $data['clientesactivos'] = $this->Query_Model->DatosClientesActivos();
        $this->loadpageintotemplate($data);
   }

   public function CitasClienteMes()
   {
        $cliente = $this->input->post("cliente");
        $mes  = $this->input->post("mes");
        // $year  = $this->input->post("year");
        // echo var_dump($mes);

        $res = $this->Query_Model->CitasClienteMes($cliente,$mes);
        echo json_encode($res);
   }

   public function Cliente()
   {
        $cliente = $this->input->post("cliente");

        $res = $this->Query_Model->GetClientById($cliente);
        echo json_encode($res);
   }

} ?>