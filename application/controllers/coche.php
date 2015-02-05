<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Coche extends CI_Controller {

    public function index() {
        //cargo el helper de url, con funciones para trabajo con URL del sitio
        $this->load->helper('url_helper');
        //cargo el modelo de artículos
        $this->load->model('Coche_model');
        //pido los ultimos artículos al modelo
        $ultimosArticulos = $this->Coche_model->muestra_Todos();
        //cargo la vista pasando los datos de configuacion
        $datos['contenido'] = "coches_view";
        $datos['rs_articulos'] = $ultimosArticulos;
        
        $this->load->view('plantillas/plantilla', $datos);
    }

    function muestra($id) {
        //cargo el helper de url, con funciones para trabajo con URL del sitio
        $this->load->helper('url');
        //cargo el modelo de artículos
        $this->load->model('Coche_model');
        //pido al modelo el artículo que se desea ver
        $arrayArticulo = $this->Coche_model->dame_coche($id);
        //compruebo si he recibido un artículo
        if (!$arrayArticulo) {
            //no he recibido ningún artículo
            //voy a lanzar un error 404 de página no encontrada
            show_404();
        } else {
            //he encontrado el artículo
            //muestro la vista de la página de mostrar un artículo pasando los datos del array del artículo
            $this->load->view('muestraCoche', $arrayArticulo);
        }
    }

    function ordenadores() {
        echo 'Aquí se muestran los productos de ordenadores';
    }

    function monitores() {
        echo 'Aquí se muestran los productos de monitores';
    }

    function fconparametros($parametro) {
        echo 'Aqui se muestran los ' . $parametro;
    }

    function fcondosparametros($parametro1 = null, $parametro2 = null) {
        echo 'El primero pametro es ' . $parametro1 . ' y el segundo es ' . $parametro2;
    }

    function redirigevista() {
        $this->load->view('vista_prueba');
    }

}
