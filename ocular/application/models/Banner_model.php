<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Banner_model
 *
 * @author 
 */
class Banner_model extends CI_Model{
    
    var $banner_typology_id="";
    var $website_id="";
    var  $start_date="";
    var $end_date="";
    var $active="";
    var $storage="";
    var $insert_date="";
    
       /**
     * costruttore
     */
    function __construct() {
        parent::__construct();
    }
    
      /**
     * insert nuovo utente
     */
    public function insert_banner(){
        
        
        $this->banner_typology_id=$_POST['banner_typology_id'];
        $this->website_id=$_POST['website_id'];
        $this->end_date=$_POST['end_date'];
        $this->active=$_POST['active'];
        $this->storage=$_POST['storage'];
        
        $this->start_date=$_POST['start_date'];
        $this->insert_date=date('Y-m-d H:i:s',time());
        $this->db->insert('banner_typology',$this);
        
    }
    /**
     * update
     */
    public function update_banner(){
        
        $this->banner_typology_id=$_POST['banner_typology_id'];
        $this->website_id=$_POST['website_id'];
        $this->end_date=$_POST['end_date'];
        $this->active=$_POST['active'];
        $this->storage=$_POST['storage'];
        
        $this->start_date=$_POST['start_date'];
        $this->db->update('banner', $this, array('banner_id' => $_POST['banner_id']));
    }
    
            
       
}