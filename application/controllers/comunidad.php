<?php

class Comunidad extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('comunidad_model');
    }

    public function index() {
        
        if (!$this->session->userdata('usuario')) {
            redirect('home', 'refresh');
        } else {
            $usuario = $this->session->userdata('usuario');

            $datos['datos_usuario'] = $this->usuario_model->get_by_username($usuario);
            $datos['comentario'] = $this->comunidad_model->get_all();

            $datos['contenido'] = "comunidad_view";
            $this->load->view('plantillas/plantilla', $datos);
        }
    }

}
