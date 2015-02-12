<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mapa_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_markers() {
        $markers = $this->db->get('mapa');
        if ($markers->num_rows() > 0) {
            return $markers->result();
        }
    }

    public function add_marker($lat, $lng) {
        
        $data = array(
                'pos_x' => $lng,
                'pos_y' => $lat
                );
        //aqui se realiza la inserción, si queremos devolver algo deberíamos usar delantre return
        //y en el controlador despues de $nueva_insercion poner lo que queremos hacer, redirigir,
        //envíar un email, en fin, lo que deseemos hacer
        $this->db->insert('mapa',$data);
    }

}
