<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendario extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $data['tabTitle'] = "Plantilla Base - Inicio";
        $data['pagecontent'] = "calendario/calendario";

        $data['clientesactivos'] = $this->Query_Model->DatosClientesActivos();
        $this->loadpageintotemplate($data);

    }

    public function HorariosClientes(){
      $cliente = $this->input->post("cliente");
      $fecha1  = $this->input->post("fecha1");
      $fecha2  = $this->input->post("fecha2");
      // $anio = $this->input->post("anio");

      $tempo = new DateTime($fecha1);
      $anio = $tempo->format("Y");

      $res = $this->Query_Model->HorariosPorCliente($cliente,$fecha1,$fecha2,$anio);
      echo json_encode($res);
    }

    public function SaveHorario(){

      $id = $this->input->post('id');
      $tempo = $this->input->post('fecha');
      $hora = $this->input->post('hora');
      $motivo = $this->input->post('motivo');
      $dia;
      $mes;

      $fecha = new DateTime($tempo);
      $tempodia = $fecha->format("l");
      $semana = $fecha->format("W");
      $anio = $fecha->format("Y");
      $tempomes = $fecha->format("F");

      switch ($tempodia) {
        case 'Monday':

        $dia = 'Lunes';

        break;

        case 'Tuesday':

        $dia = 'Martes';

        break;

        case 'Wednesday':

        $dia = 'Miercoles';

        break;

        case 'Thursday':

        $dia = 'Jueves';

        break;

        case 'Friday':

        $dia = 'Viernes';

        break;

        case 'Saturday':

        $dia = 'Sabado';

        break;
      }

      switch ($tempomes) {
        case 'January':

        $mes = 'Enero';

        break;

        case 'February':

        $mes = 'Febrero';

        break;

        case 'March':

        $mes = 'Marzo';

        break;

        case 'April':

        $mes = 'Abril';

        break;

        case 'May':

        $mes = 'Mayo';

        break;

        case 'June':

        $mes = 'Junio';

        break;

        case 'July':

        $mes = 'Julio';

        break;

        case 'August':

        $mes = 'Agosto';

        break;

        case 'September':

        $mes = 'Septiembre';

        break;

        case 'October':

        $mes = 'Octubre';

        break;

        case 'November':

        $mes = 'Noviembre';

        break;

        case 'December':

        $mes = 'Diciembre';

        break;
      }

      $msg;

      $res = $this->Query_Model->CheckHorarioDisponible($id, $dia, $tempo, $hora, $anio, $mes);

      if ($res != NULL) {

        $msg = "TRUE";
        echo json_encode($msg);

      }else {

        $datoshorario = array(
          'cliente' => $id,
          'hora_visita' => $hora,
          'dia_visita' => $dia,
          'motivo_visita' => $motivo,
          'numero_semana' => $semana,
          'fecha_operacion' => $tempo,
          'numero_mes' => $mes,
          'numero_anio' => $anio,
          'estado' => '1',
        );

        $this->Query_Model->InsertHorario($datoshorario);

        $msg = "FALSE";
        echo json_encode($msg);

      }

    }

    public function GetDatosHorario(){
      $id = $this->input->post('id_horario');
      $res = $this->Query_Model->GetHorarioById($id);
      echo json_encode($res);
    }

    public function UpdateHorario(){

      $id_c = $this->input->post('id_c');
      $id_cal = $this->input->post('id_cal');
      $tempo = $this->input->post('fecha');
      $hora = $this->input->post('hora');
      $motivo = $this->input->post('motivo');
      $dia;
      $mes;

      $fecha = new DateTime($tempo);
      $tempodia = $fecha->format("l");
      $semana = $fecha->format("W");
      $anio = $fecha->format("Y");
      $tempomes = $fecha->format("F");

      switch ($tempodia) {
        case 'Monday':

        $dia = 'Lunes';

        break;

        case 'Tuesday':

        $dia = 'Martes';

        break;

        case 'Wednesday':

        $dia = 'Miercoles';

        break;

        case 'Thursday':

        $dia = 'Jueves';

        break;

        case 'Friday':

        $dia = 'Viernes';

        break;

        case 'Saturday':

        $dia = 'Sabado';

        break;
      }

      switch ($tempomes) {
        case 'January':

        $mes = 'Enero';

        break;

        case 'February':

        $mes = 'Febrero';

        break;

        case 'March':

        $mes = 'Marzo';

        break;

        case 'April':

        $mes = 'Abril';

        break;

        case 'May':

        $mes = 'Mayo';

        break;

        case 'June':

        $mes = 'Junio';

        break;

        case 'July':

        $mes = 'Julio';

        break;

        case 'August':

        $mes = 'Agosto';

        break;

        case 'September':

        $mes = 'Septiembre';

        break;

        case 'October':

        $mes = 'Octubre';

        break;

        case 'November':

        $mes = 'Noviembre';

        break;

        case 'December':

        $mes = 'Diciembre';

        break;
      }

      $msg;

      $res = $this->Query_Model->CheckHorarioDisponible($id_c, $dia, $tempo, $hora, $anio, $mes);

      if ($res != NULL) {

        $msg = "TRUE";
        echo json_encode($msg);

      }else {

        $datoshorario = array(
          'hora_visita' => $hora,
          'dia_visita' => $dia,
          'motivo_visita' => $motivo,
          'numero_semana' => $semana,
          'fecha_operacion' => $tempo,
          'numero_mes' => $mes,
          'numero_anio' => $anio,
          'estado' => '1',
        );

        $this->Query_Model->UpdateHorario($id_cal, $datoshorario);

        $msg = "FALSE";
        echo json_encode($msg);

      }

    }

    public function DeleteHorario(){

      $id = $this->input->post('id_horario');
      $res = $this->Query_Model->DeleteHorario($id);

    }

}
?>
