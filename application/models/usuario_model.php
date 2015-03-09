<?php

/**
 * Description of user_model
 *
 * @author asus-pc
 */
class Usuario_model extends CI_Model {

    var $table = 'usuario';
    var $max_idle_time = 300; //Segundo de sesion

    public function __construct() {
        parent::__construct();
    }

    //Se ejecuta cuando nos registramos
    public function add_user($image) {

        $code = rand(1000, 99999);
//        $code = $code.$this->input->post('user');
        $user = array(
            'nombre' => filter_input(INPUT_POST, 'nombre'),
            'login' => $this->input->post('user'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'ciudad' => $this->input->post('ciudad'),
            'codigo' => $code,
            'estado' => 0,
            'nivel' => 'registrado',
            'foto' => $image,
            'fecha_creacion' => date('Y-m-d H:i:s')
        );

        $this->db->insert($this->table, $user);
        //$this->send_email($code); //NO EN DESPLEGADO
    }

    //envia un email de confirmacion
    function send_email($code) {

        $this->load->library('email');

        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = 'html';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.googlemail.com'; //'ssl://smtp.googlemail.com';
        $config['smtp_port'] = 465; //465
        $config['smtp_user'] = 'parkeasing@gmail.com';
        $config['smtp_pass'] = 'metralla';
        $config['validation'] = TRUE;

        $this->email->initialize($config);
        $this->email->clear();

        $this->email->from('parkeasing@gmail.com', 'Parkeasy Company');
        $this->email->to($this->input->post('email'));

        $this->email->subject('Confirm account PARKEASY');
        $this->email->message('<h1>Bienvenido: ' . $this->input->post('nombre') . ' ' . $this->input->post('apellido') . '</h1>'
                . '<p>Para confirmar su registro apriete el siguiente enlace:'
                . '<a href="' . base_url() . 'index.php/login/confirmar/' . $code . '">Enlace de confirmacion</a></p>'
                . '<h3>Gracias por registrarte</h3>');

       if($this->email->send()){
           
       }else{
           show_error($this->email->print_debugger());
       }
    }

    //verifica si el codigo es correcto
    function is_code($valor, $columna) {
        $prepare_query = "select id from usuario where codigo =" . $valor;
        $query = $this->db->query($prepare_query);
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    //Verifica si el usuario es valido
    function is_valid_user($login, $pass) {
        $valores = array(
            'login' => $login,
            'password' => $pass);

        $query = $this->db->get_where('usuario', $valores);
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    //Verifica si el usuario esta activo(confimado correo)
    function is_active($login, $pass) {

        $valores = array(
            'login' => $login,
            'password' => $pass,
            'estado' => '1');

        $query = $this->db->get_where('usuario', $valores);

        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }

    //Cambia el usuario a activo 
    function update_estado_user($code) {
        $sql = "UPDATE usuario SET estado = 2 WHERE codigo=" . $code;
        $this->db->query($sql);
    }

    //Guarda un usuario
    function save($user_data) {
        $this->db->insert($this->table, $user_data);
        return $this->db->insert();
    }

    // Update an existing user
    function update($user_data) {
        if (isset($user_data['id'])) {
            $this->db->where('id', $user_data['id']);
            $this->db->update($this->table, $user_data);
            return $this->db->affected_rows();
        }
        return false;
    }

    // Devuelve el usuario segun su login
    function get_by_username($username) {
        $query = $this->db->get_where($this->table, array('login' => $username), 1);
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    //Mete el login en session
    function allow_pass($user_data) {
        $this->session->set_userdata(array('last_activity' => time(), 'logged_in' => 'yes', 'user' => $user_data));
    }

    //chequea si esta logeado
    function is_logged_in() {
        $last_activity = $this->session->userdata('last_activity');
        $logged_in = $this->session->userdata('logged_in');
        $user = $this->session->userdata('user');

        if (($logged_in == 'yes') && ((time() - $last_activity) < $this->max_idle_time )) {
            $this->allow_pass($user);
            return true;
        } else {
            $this->remove_pass();
            return false;
        }
    }

    //Borra todos los datos de sesion de usurario
    function remove_pass() {
        $array_items = array('last_activity' => '', 'logged_in' => '', 'user' => '');
        $this->session->unset_userdata($array_items);
    }

    //Usuario por id
    function get_by_id($id) {
        $query = $this->db->get_where($this->table, array('id' => $id), 1);
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return false;
        }
    }

    //Verifica que el email existe
    function email_exists($email) {
        $query = $this->db->get_where($this->table, array('email' => $email), 1);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Checkea si existe el usuario
    function username_exists($username) {
        $query = $this->db->get_where($this->table, array('login' => $username), 1);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Generate hashed password
    function hash_password($password) {
        $salt = $this->generate_salt();
        return $salt . '.' . md5($salt . $password);
    }

    // create salt for password hashing
    private function generate_salt($length = 10) {
        $characterList = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $i = 0;
        $salt = "";
        while ($i < $length) {
            $salt .= $characterList{mt_rand(0, (strlen($characterList) - 1))};
            $i++;
        }
        return $salt;
    }

}
