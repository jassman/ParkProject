<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Mapa extends CI_Controller {

     public function __construct()
    {
        parent::__construct();
        $this->load->model('mapa_model');
        $this->load->model('usuario_model');
        $this->load->library('googlemaps');
    }
    
    public function index() {
        
        if (!$this->session->userdata('usuario')){
            redirect('home', 'refresh');      
        }else{
        
        $config = array();
        
        $config['zoom'] = 'auto'; 
        
        $config['mapTypeControlStyle'] = 'DROPDOWN_MENU'; 
        
        $this->googlemaps->initialize($config);
        
        $markers = $this->mapa_model->get_markers();
        
        foreach($markers as $info_marker) {
            $marker = array();
            //podemos elegir DROP o BOUNCE
            $marker ['animation'] = 'DROP';
            //posición de los markers
            $marker ['position'] = $info_marker->pos_y.','.$info_marker->pos_x;
            //infowindow de los markers(ventana de información)    
            $marker ['infowindow_content'] = $info_marker->infowindow;
            //la id del marker
            $marker['id'] = $info_marker->id;
            //Usuario del marker
            $marker['id_usuario'] = $info_marker->id_usuario;
            //la posicion y el id del marker envio a funcion ruta
            $marker['onclick'] = 'ruta(event.latLng.lat(), event.latLng.lng(),'. $info_marker->id .')';          
            //podemos colocar iconos personalizados así de fácil
            $marker ['icon'] = base_url().'assets/img/maps-icon-green.png';
            //añade el marker
            $this->googlemaps->add_marker($marker);        
        }
        
        $data = $this->mapa_model->get_markers();

        $marker = array();
        $this->googlemaps->add_marker($marker);
        
        $datos['map'] = $this->googlemaps->create_map();    
        $datos['contenido'] = "mapa_view";
        $datos['datos'] = $data;
        $usuario= $this->session->userdata('usuario');     
        $datos['datos_usuario'] = $this->usuario_model->get_by_username($usuario);

        $this->load->view('plantillas/plantilla', $datos);
        
    }
    }
    
   function muestra($id){
      //cargo el helper de url, con funciones para trabajo con URL del sitio
      $this->load->helper('url');     
      //cargo el modelo de artículos
      $this->load->model('Coche_model');   
      //pido al modelo el artículo que se desea ver
      $arrayArticulo = $this->Coche_model->dame_coche($id);     
      //compruebo si he recibido un artículo
      if (!$arrayArticulo){
         //no he recibido ningún artículo
         //voy a lanzar un error 404 de página no encontrada
         show_404();
      }else{
         //he encontrado el artículo
         //muestro la vista de la página de mostrar un artículo pasando los datos del array del artículo
         $this->load->view('muestraCoche', $arrayArticulo);
      }
   }
   
   function parkeasy(){
       
        if (!$this->session->userdata('usuario')){
            redirect('home', 'refresh');      
        }else{
        $lat = $this->input->post('latitud');
        $lng = $this->input->post('longitud');
        $id_usuario = $this->session->userdata('id');
        
        $can_put_markers = $this->mapa_model->add_marker($lat, $lng, $id_usuario);
        }
        if ($can_put_markers){
            echo "Añadido correctamente";
        }else{
            echo "No puedes añadir mas";
        }
   }
   
}
