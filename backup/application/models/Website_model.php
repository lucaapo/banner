<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Website_model
 *
 * @author 
 */
class Website_model extends CI_Model{ 

    var $name="";
    var $user_id="";
    var $root="";
    var $active="";
    var $insert_date="";
      /**
     * costruttore override
     */
    function __construct()
    {
        parent::__construct();
    }
    /**
     * insert nuovo utente
     */
    public function insert_website(){
        
        
        $this->name=$_POST['name'];
        $this->user_id=$_POST['user_id'];
        $this->root=$_POST['root'];
        $this->active=$_POST['active'];
        $this->inserted_date=date('Y-m-d H:i:s',time());
        
        $this->db->insert('website',$this);
        
    }
    /**
     * update
     */
    public function update_website(){
        
        $this->name=$_POST['name'];
        $this->user_id=$_POST['user_id'];
        $this->root=$_POST['root'];
        $this->active=$_POST['active'];
        $this->db->update('website', $this, array('website_id' => $_POST['website_id']));
    }
    
}
