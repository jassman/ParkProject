<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mapajs
 *
 * @author asus-pc
 */
class Mapajs extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        $this->load->model('mapa_model');
        $this->load->model('usuario_model');
    }
    
    public function index() {
        
        
        
        $usuario= $this->session->userdata('usuario');     
        $datos['datos_usuario'] = $this->usuario_model->get_by_username($usuario);
        $datos['contenido'] = "mapa_view_js";
        
        $this->load->view('plantillas/plantilla', $datos);
    }
    
}