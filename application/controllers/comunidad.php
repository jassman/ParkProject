<?php

class Comunidad extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('comunidad_model');
        $this->load->library('pagination');
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

    public function mensajes() {
        
        if (!$this->session->userdata('usuario')) {
            redirect('home', 'refresh');
        }else{
            $usuario = $this->session->userdata('usuario');
            $datos['datos_usuario'] = $this->usuario_model->get_by_username($usuario);
            
            $pages = 8; //Número de registros mostrados por páginas
            $config['base_url'] = base_url().'comunidad/mensajes';
            $config['total_rows'] = $this->comunidad_model->get_pages(); //calcula el número de filas  
            $config['per_page'] = $pages; //Número de registros mostrados por páginas
            $config['num_links'] = 1; //Número de links mostrados en la paginación
            $config["uri_segment"] = 3; //el segmento de la paginación

            $this->pagination->initialize($config); //inicializamos la paginación        
            $datos["comentario"] = $this->comunidad_model->get_page($config['per_page'], $this->uri->segment(3));

            $datos['contenido'] = "comunidad_view";
            $this->load->view('plantillas/plantilla', $datos);
        }
    }
    
    public function add() {
        
         if (!$this->session->userdata('usuario')) {
            redirect('home', 'refresh');
        }else{
            $usuario = $this->session->userdata('usuario');
            $datos['datos_usuario'] = $this->usuario_model->get_by_username($usuario);
            
            $ciudad = $datos['datos_usuario']['ciudad'];
            $mensaje = $this->input->post('mensaje');
            $id = $datos['datos_usuario']['id'];
            
            $respuesta = $this->comunidad_model->add_mensaje($id, $mensaje, $ciudad);
            
            if($respuesta){
                $this->mensajes();              
            }
        }     
    }
    
    
    
    
    

}
