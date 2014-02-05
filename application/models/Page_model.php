<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Page_model
 *
 * @author 
 */
class Page_model extends CI_Model{
    
    var $website_id="";
    var $url="";
    var $active="";
    
    /**
        * costruttore
     */
    function __construct() {
        parent::__construct();
    }
    
      /**
     * insert nuovo utente
     */
    public function insert_page(){
        
        
        
        $this->website_id=$_POST['website_id'];
        
        $this->active=$_POST['active'];
        $this->url=$_POST['url'];
        
        $this->db->insert('page',$this);
        
    }
    /**
     * update
     */
    public function update_page(){
        
        $this->website_id=$_POST['website_id'];
        $this->active=$_POST['active'];
        $this->url=$_POST['url'];
        
        
        $this->db->update('page', $this, array('page_id' => $_POST['page_id']));
    }
    
    
}
