<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of profile
 *
 * @author asus-pc
 */
class Profile extends CI_Controller {
    //put your code here
        public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
    }
    
    public function index(){
        
        $usuario= $this->session->userdata('usuario');
        $pass = $this->session->userdata('pass');
        
        $datos['datos_usuario'] = $this->usuario_model->get_by_username($usuario);
        $datos['contenido'] = 'profile_view';
        
        $this->load->view('plantillas/plantilla', $datos);

    }
}
