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
        

        $config = array();
        $config['center'] = 'auto';
        $config['zoom'] = 'auto'; 
        $config['mapTypeControlStyle'] = 'DROPDOWN_MENU'; 
        $config['onboundschanged'] = 
                'if (!centreGot) {
                    var mapCentre = map.getCenter();
                    marker_0.setOptions({
                        position: new google.maps.LatLng(mapCentre.lat(), mapCentre.lng()) 
                    });
                }
                centreGot = true;';
        $this->googlemaps->initialize($config);
        
        $markers = $this->mapa_model->get_markers();
        foreach($markers as $info_marker)
        {
            $marker = array();
            //podemos elegir DROP o BOUNCE
            $marker ['animation'] = 'DROP';
            //posición de los markers
            $marker ['position'] = $info_marker->pos_y.','.$info_marker->pos_x;
            //infowindow de los markers(ventana de información)    
            $marker ['infowindow_content'] = $info_marker->infowindow;
            //la id del marker
            $marker['id'] = $info_marker->id; 
            $this->googlemaps->add_marker($marker);
 
            //podemos colocar iconos personalizados así de fácil
            //$marker ['icon'] = base_url().'imagenes/'.$fila->imagen;
 
            //si queremos que se pueda arrastrar el marker
            //$marker['draggable'] = TRUE;
            //si queremos darle una id, muy útil
        }
        
        $data = $this->mapa_model->get_markers();

        // set up the marker ready for positioning 
        // once we know the users location
        $marker = array();
        $this->googlemaps->add_marker($marker);
        
        $datos['map'] = $this->googlemaps->create_map();    
        $datos['contenido'] = "mapa_view";
        $datos['datos'] = $data;
        $usuario= $this->session->userdata('usuario');     
        $datos['datos_usuario'] = $this->usuario_model->get_by_username($usuario);

        $this->load->view('plantillas/plantilla', $datos);
        
        
    }
    
    
    
    
    public function cogeCoordenadas() {
        
         //creamos la configuración del mapa con un array
        $config = array();
        //la zona del mapa que queremos mostrar al cargar el mapa
        //como vemos le podemos pasar la ciudad y el país
        //en lugar de la latitud y la longitud
        $config['center'] = 'madrid,espana';
        // el zoom, que lo podemos poner en auto y de esa forma
        //siempre mostrará todos los markers ajustando el zoom    
        $config['zoom'] = '6';        
        //el tipo de mapa, en el pdf podéis ver más opciones
        $config['map_type'] = 'ROADMAP';  
        //inicializamos la configuración del mapa    
        $this->googlemaps->initialize($config);    
        
        //hacemos la consulta al modelo para pedirle 
        //la posición de los markers y el infowindow
        $markers = $this->mapa_model->get_markers();
        foreach($markers as $info_marker)
        {
            $marker = array();
            //podemos elegir DROP o BOUNCE
            $marker ['animation'] = 'DROP';
            //posición de los markers
            $marker ['position'] = $info_marker->pos_y.','.$info_marker->pos_x;
            //infowindow de los markers(ventana de información)    
            $marker ['infowindow_content'] = $info_marker->infowindow;
            //la id del marker
            $marker['id'] = $info_marker->id; 
            $this->googlemaps->add_marker($marker);
 
            //podemos colocar iconos personalizados así de fácil
            //$marker ['icon'] = base_url().'imagenes/'.$fila->imagen;
 
            //si queremos que se pueda arrastrar el marker
            //$marker['draggable'] = TRUE;
            //si queremos darle una id, muy útil
        }
        
        //en $data['datos'tenemos la información de cada marker para
        //poder utilizarlo en el sidebar en nuestra vista mapa_view
        $data = $this->mapa_model->get_markers();
        //en data['map'] tenemos ya creado nuestro mapa para llamarlo en la vista
        $map = $this->googlemaps->create_map(); 
        
        $datos['contenido'] = "mapa_view";
        $datos['datos'] = $data;
        $datos['map'] = $map;
        $usuario= $this->session->userdata('usuario');
        
        $datos['datos_usuario'] = $this->usuario_model->get_by_username($usuario);
        
        $this->load->view('plantillas/plantilla', $datos);
        
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

}
