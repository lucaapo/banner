<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Classe modello per l'utente
 *
 * @author 
 */
class User_model extends CI_Model{
    
    var $username="";
    var $name="";
    var $surname="";
    var $contact_info="";
    var $is_super="";
    var $password="";
    var $active ="";
    var $inserted_date="";
    
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
    public function insert_user(){
        
        $this->surname=$_POST['surname'];
        $this->name=$_POST['name'];
        $this->password=$_POST['password'];
        $this->username=$_POST['username'];
        $this->active=$_POST['active'];
        $this->inserted_date=date('Y-m-d H:i:s',time());
        
        $this->db->insert('user',$this);
        
    }
    /**
     * update
     */
    public function update_user(){
        $this->surname=$_POST['surname'];
        $this->name=$_POST['name'];
        $this->password=$_POST['password'];
        $this->username=$_POST['username'];
        $this->active=$_POST['active'];
        $this->db->update('user', $this, array('user_id' => $_POST['user_id']));
    }
    /**
     * ottiene l'utente
     * @param type $id
     * @param type $username
     */
    public function get_user($id=NULL,$username=NULL){
        if($id!=NULL && $id>0){
            $query = $this->db->get_where('user', array('user_id' => $id));
            return $query->row_array();
        }
        else if($username!=NULL && strlen ($username)){
            $query = $this->db->get_where('user', array('username' => $username));
            return $query->row_array();
        }
        throw new Exception("Impossibile ritornare utente con i parametri passati", 1, 0);
    }
    
}
