<?php

/**
 * Description of login
 *
 * @author asus-pc
 */
class Login extends CI_Controller {

    var $data = array();

    function __construct() {
        // Call the Controller constructor
        parent::__construct();
        $this->load->model('usuario_model');
        $this->load->model('mapa_model');
    }

    public function index() { 
        
        $username = $this->input->post('login');
        $password = $this->input->post('password');
        
        $valid_login = $this->usuario_model->is_valid_user($username,$password);
        
        if ($valid_login) {
             $this->mapa_model->destroy_markers();
             $usuario = $this->usuario_model->get_by_username($username);
             $data_session = array('usuario'=>''.$username.'',
                                      'pass'=>''.$password.'',
                                        'id'=>''.$usuario[id].'');
                
               $this->session->set_userdata($data_session);
               redirect(base_url().'index.php/profile');
//            $estado = $this->usuario_model->is_active($username,$password);
//            if($estado) {
//                $data_session = array('usuario'=>''.$username.'',
//                                        'pass'=>''.$password.'');
//                
//                $this->session->set_userdata($data_session);
//                redirect(base_url().'index.php/profile');
//            } else {
//                $data = array('mensaje' => 'El usuario no esta activado, verifique el correo electronico');
//                $this->load->view('plantillas/home_view',$data);
          //  }
        } else {
            $data = array('mensaje' => 'El nombre de usuario o contraseña son incorrectos');
            $this->load->view('plantillas/home_view',$data);
        }
    }

    public function register() {

        $user = $this->input->post('user');     
        //Verificamos si el usuario ya existe
        if (!$this->usuario_model->username_exists($user)){
            //Verificamos si ha subido una foto
            if($_FILES['foto']['name'] !=''){
                $respuesta = $this->upload_image();
                //Si no es un array es que la imagen es correcta
                if(!is_array($respuesta)){ 
                    $this->usuario_model->add_user($respuesta);
                    $mensaje = "El usuario de registro correctamente";              
                }else{
                    $mensaje = $respuesta;
                }        
            }else{
                $this->usuario_model->add_user('anonymouse.png');
                $mensaje = "El usuario se registro correctamente";
            }
            }else{
                $mensaje = "El usuario ya existe";
        }
           
        $data = array('mensaje'=>$mensaje);
        $this->load->view('plantillas/home_view',$data);                    
        
    }
    
    public function confirmar($code) {
        
        $verificacion = $this->usuario_model->is_code($code, 'codigo');
        if ($verificacion == false){
            $mensaje = "El codigo de verificacion no es valido.";
        } else {
            $this->usuario_model->update_estado_user($code);
            $mensaje = "Usuario Confirmado Con Exito.";
        }
        
        $data = array('mensaje'=>$mensaje);
        $this->load->view('plantillas/home_view',$data);
        
    }
    // route /logout -- check settings in /application/config/routes.php
    public function logout() {
        // Destroy session data
        $this->session->sess_destroy();
        $mensaje = "Has salido del sistema";
        $data = array('mensaje'=>$mensaje);
        $this->load->view('plantillas/home_view', $data);

    }

    // noaccess to show no access message
    public function noaccess() {
        $this->data['login_error'] = 'You do not have access or your login has expired.';
        $this->load->view('front-end/home_view', $this->data);
    }
    
    
    private function upload_image() {
        
        $config['upload_path'] = 'files/img/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2*1024;
        $config['max_width'] = '1024';
        $config['max_height'] = '1024';
        $config['file_name'] = $this->input->post('user');
        $config['remove_spaces'] = TRUE;
        
        $this->load->library('upload', $config);
        $this->load->library('Image_lib');
        
        if (!$this->upload->do_upload()){
            $error = array('error' =>  $this->upload->display_errors());
            return $error;
        } else {
            $data = $this->upload->data();
            $this->create_thumb($data['file_name']);
            
            return $data['file_name'];
        }
    }
    
    function create_thumb($image){
        $config['image_library'] = 'g2d';
        $config['source_image'] = 'files/img/'.$image;
        $config['new_image'] = 'files/img/thumbs/';
        $config['thumb_marker'] = '';
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 150;
        $config['height'] = 150;
        
        $this->load->library('Image_lib', $config);
        $this->image_lib->resize();
    }
   
}
