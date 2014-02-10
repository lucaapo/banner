<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BannnerTypology
 *
 * @author 
 */
class BannnerTypology_model extends CI_Model {

    var $dimension_x = "";
    var $dimension_y = "";
    var $typology = "";
    var $note = "";

    /**
     * costruttore
     */
    function __construct() {
        parent::__construct();
    }
    
      /**
     * insert nuovo utente
     */
    public function insert_banner_typology(){
        
        
        $this->typology=$_POST['typology'];
        $this->dimension_x=$_POST['dimension_x'];
        $this->dimension_y=$_POST['dimension_y'];
        $this->note=$_POST['note'];
                
        $this->db->insert('banner_typology',$this);
        
    }
    /**
     * update
     */
    public function update_banner_typology(){
        
       $this->typology=$_POST['typology'];
        $this->dimension_x=$_POST['dimension_x'];
        $this->dimension_y=$_POST['dimension_y'];
        $this->note=$_POST['note'];
        $this->db->update('banner_typology', $this, array('banner_typology_id' => $_POST['banner_typology_id']));
    }
    

}
