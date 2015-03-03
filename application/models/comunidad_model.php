<?php

class Comunidad_model extends CI_Model {

    var $table = 'mensaje';
    
    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
    }
    
    public function get_all() {
        //Cogemos las marcas del mapa
        $usuarios = array();
        $comentarios = $this->db->get($this->table);
        $usuarios['mensajes'] = $comentarios->result_array();
        //Si devuelve alguna fila
        if ($comentarios->num_rows() > 0) {
            //Devolvemos los markers
            $i=0;
            $hola = $comentarios->result();   
            foreach ($hola as $com){
                $comon = $this->usuario_model->get_by_id($com->id_usuario);
                $usuarios['mensajes'][$i]['usuario'] = $comon;
                $i++;
            }
            
            return $usuarios;
        } else {
            alert("No hay datos de merkers");
        }
    }
    
    

}