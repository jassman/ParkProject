<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mapa_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_markers() {
        //Cogemos todas las marcas de la tabla mapa
        $markers = $this->db->get('mapa');
        //Si devuelve alguna fila
        if ($markers->num_rows() > 0) {
            //Devolvemos los markers
            return $markers->result();
        } else {
            alert("No hay datos de merkers");
        }
    }

    public function add_marker($lat, $lng, $id_usuario) {
        //Dattos en array para insertar en las columnas
        if ($this->mira_marker($id_usuario)) {
            $data = array(
                'pos_x' => $lng,
                'pos_y' => $lat,
                'fecha'=> date('Y-m-d H:i:s'),
                'id_usuario' => $id_usuario
            );
            //aqui se realiza la inserción, si queremos devolver algo deberíamos usar delantre return
            $this->db->insert('mapa', $data);
            return true;
        } else {
            return false;
        }
    }
    
    private function mira_marker($id_usuario){
        
        $markers = $this->get_markers();
        $coincide = 0;
        foreach ($markers as $columna) {
            if ($columna->id_usuario == $id_usuario) {
                $coincide++;
            }
        }
        
        if ($coincide <= 3) {
            return true;
        }else{
            return false;
        }
        
    }

}
