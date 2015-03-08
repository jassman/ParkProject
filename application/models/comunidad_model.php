<?php

class Comunidad_model extends CI_Model {

    var $table = 'mensaje';

    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
    }

    //Coge todos las filas y campos de la tabla
    public function get_all() {
        //Cogemos los menjsaes
        $mensajes = array();
        $comentarios = $this->db->get($this->table);
        $mensajes['mensajes'] = $comentarios->result_array();
        //Si devuelve alguna fila
        if ($comentarios->num_rows() > 0) {
            //variable para recorrer el araray
            $i = 0;
            foreach ($comentarios->result() as $com) {
                $comon = $this->usuario_model->get_by_id($com->id_usuario);
                $mensajes['mensajes'][$i]['usuario'] = $comon;
                $i++;
            }

            return $mensajes;
        } else {
            alert("No hay datos de merkers");
        }
    }

    //calcula el numero de filas 
    public function get_pages() {
        $consulta = $this->db->get($this->table);
        return $consulta->num_rows();
    }

    //retorna las filas paginadas 
    public function get_page($por_pagina, $segmento) {
        $mensajes = array();
        $this->db->order_by("fecha", "desc");
        $comentarios = $this->db->get($this->table, $por_pagina, $segmento);
        $mensajes['mensajes'] = $comentarios->result_array();
        if ($comentarios->num_rows() > 0) {
            $i = 0;
            foreach ($comentarios->result() as $com) {
                $usuario = $this->usuario_model->get_by_id($com->id_usuario);
                $mensajes['mensajes'][$i]['usuario'] = $usuario;
                $i++;
            }
            return $mensajes;
        } else {
            alert("No hay datos");
        }
    }
    
    public function add_mensaje($id, $mensaje, $ciudad) {
        
        $data = array(
                'contenido' => $mensaje,
                'ciudad' => $ciudad,
                'fecha'=> date('Y-m-d H:i:s'),
                'id_usuario' => $id
            );
        
        $this->db->insert($this->table, $data);
        
        return true;
        
    }
    
    

}
