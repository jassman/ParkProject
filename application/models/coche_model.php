<?php

class Coche_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function muestra_Todos() {
        $ssql = "select * from coche";
        return mysql_query($ssql);
    }
    
    //nos devuleve un array con los coches
    function dame_coche($id){
      $ssql = "select * from coche where id=" . $id;
      $rs = mysql_query($ssql);
      if (mysql_num_rows($rs)==0){
         return false;
      }else{
         return mysql_fetch_array($rs);
      }
   }

}
