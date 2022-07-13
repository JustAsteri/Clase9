<?php

class Query_Model extends CI_Model{

/* START - MODEL: Usuarios */

function InsertUsuario($datosusuario){
    $this->db->insert('usuarios',$datosusuario);
}

function GetUserByName($usuario){
    $this->db->select('*');
    $this->db->from('usuarios');
    $this->db->where('username',$usuario);
    $query = $this->db->get();
    return $query->result();
}

function DatosUsuario(){

    $this->db->select('*');
    $this->db->from('usuarios');
    $this->db->where("(rol= 'A' OR rol = 'E')",NULL,FALSE);
    $query = $this->db->get();
    return $query->result();
}

function GetUserById($id){

    $this->db->select('*');
    $this->db->from('usuarios');
    $this->db->where('id_usuario',$id);
    $query = $this->db->get();
    return $query->result();

}

function UpdateUsuario($id,$datosusuario){

    $this->db->where('id_usuario',$id);
    $this->db->update('usuarios',$datosusuario);

}

function DeleteUsuario($id, $datosusuario){

    $this->db->where('id_usuario',$id);
    $this->db->update('usuarios', $datosusuario);

}


/* END - MODEL: Usuarios */

/* =============================================================================================================================================================================================================================== */

/* START - MODEL: Horarios */

    function HorariosPorCliente($cliente,$fecha1,$fecha2,$anio){
        $query= $this->db->query("
            SELECT horarios.id_horario, horarios.cliente, horarios.dia_visita, horarios.hora_visita, horarios.motivo_visita, clientes.id_cliente,
          clientes.nombre, clientes.apaterno, clientes.amaterno FROM horarios JOIN clientes ON clientes.id_cliente = horarios.cliente WHERE horarios.cliente = '$cliente'
          AND DATE(horarios.fecha_operacion) BETWEEN '$fecha1' AND '$fecha2' AND horarios.numero_anio = '$anio'");
        return $query->result();
    }

    function CheckHorarioDisponible($id, $dia, $tempo, $hora, $anio, $mes){

      $this->db->select('*');
      $this->db->from('horarios');
      $this->db->where('cliente',$id);
      $this->db->where('hora_visita',$hora);
      $this->db->where('dia_visita',$dia);
      $this->db->where('fecha_operacion',$tempo);
      $this->db->where('numero_mes',$mes);
      $this->db->where('numero_anio',$anio);
      $this->db->where('estado','0');
      $query = $this->db->get();
      return $query->result();

    }

    function InsertHorario($datoshorario){
      $this->db->insert('horarios', $datoshorario);
    }

    function GetHorarioById($id){

        $this->db->select('*');
        $this->db->from('horarios');
        $this->db->where('id_horario',$id);
        $this->db->where('estado', '1');
        $query = $this->db->get();
        return $query->result();

    }

    function UpdateHorario($id_cal, $datosusuario){

        $this->db->where('id_horario', $id_cal);
        $this->db->update('horarios',$datosusuario);

    }

    function DeleteHorario($id){

        $this->db->set('estado', '0');
        $this->db->where('id_horario', $id);
        $this->db->update('horarios');

    }

/* END - MODEL: Horarios */

/* =============================================================================================================================================================================================================================== */

/* START - MODEL: Clientes */

    function DatosClientes(){

        $this->db->select('*');
        $this->db->from('clientes');
        $query = $this->db->get();
        return $query->result();
    }

    function DatosClientesActivos(){

        $this->db->select('*');
        $this->db->from('clientes');
        $this->db->where('estado' ,'1');
        $query = $this->db->get();
        return $query->result();
    }

    function InsertClient($datoscliente){

        $this->db->insert('clientes', $datoscliente);
    }

    function GetClientById($id){

        $this->db->select('*');
        $this->db->from('clientes');
        $this->db->where('id_cliente',$id);
        $query = $this->db->get();
        return $query->result();

    }

    function UpdateClientes($id, $datoscliente){

        $this->db->where('id_cliente',$id);
        $this->db->update('clientes', $datoscliente);

    }

    function DeleteClientes($id, $datoscliente){

        $this->db->where('id_cliente',$id);
        $this->db->update('clientes', $datoscliente);

    }

/* END - CONTROLLER: clientes */

/* START - CONTROLLER: REPORTES */

function CitasClienteFecha($cliente,$inicio,$fin)
{
    $query= $this->db->query("
        SELECT horarios.id_horario, horarios.cliente, horarios.motivo_visita, clientes.id_cliente, clientes.nombre, clientes.apaterno, clientes.amaterno 
        FROM horarios 
        JOIN clientes ON clientes.id_cliente = horarios.cliente
        WHERE horarios.cliente = '$cliente' 
        AND horarios.fecha_operacion
        BETWEEN ('$inicio') AND ('$fin') 
        AND horarios.estado = '1';
        ");
    return $query->result();
}

function CitasClienteMes($cliente,$mes)
{
    $query= $this->db->query("
        SELECT horarios.id_horario, horarios.cliente, horarios.motivo_visita, clientes.id_cliente, clientes.nombre, clientes.apaterno, clientes.amaterno 
        FROM horarios 
        JOIN clientes ON clientes.id_cliente = horarios.cliente
        WHERE horarios.cliente = '$cliente' 
        AND horarios.numero_mes = '$mes' 
        AND horarios.estado = '1';
        ");
    return $query->result();
}

/* END - CONTROLLER: REPORTES */
}
?>
