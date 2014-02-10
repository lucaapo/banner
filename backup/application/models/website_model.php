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
class Website_model extends CI_Model {

    var $name = "";
    var $user_id = "";
    var $root = "";
    var $active = "";
    var $insert_date = "";

    /**
     * costruttore override
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * insert nuovo utente
     */
    public function insert_website() {


        $this->name = $_POST['name'];
        $this->user_id = $_POST['user_id'];
        $this->root = $_POST['root'];
        $this->active = $_POST['active'];
        $this->inserted_date = date('Y-m-d H:i:s', time());

        $this->db->insert('website', $this);
    }

    /**
     * update
     */
    public function update_website() {

        $this->name = $_POST['name'];
        $this->user_id = $_POST['user_id'];
        $this->root = $_POST['root'];
        $this->active = $_POST['active'];
        $this->db->update('website', $this, array('website_id' => $_POST['website_id']));
    }

    /**
     * torna i tutti i siti attivi
     */
    public function getAll() {
        $query = $this->db->get_where('website', array('active' => 1));
        $results = array();
        foreach ($query->result() as $row) {
            $results[] = $row;
        }
        return $results;
    }

    /**
     * 
     * @param type $user_id
     */
    public function getWebsiteByUser($user_id) {
        if (is_numeric($user_id) && $user_id > 0) {
            $query = $this->db->get_where('website', array('active' => 1, 'user_id' => $user_id));
            $results = array();
            foreach ($query->result() as $row) {
                $results[] = $row;
            }
            return $results;
        }
    }
    /**
     * torna i siti con il nome corrispondente alla stringa passata
     * @param type $to_search
     * @return type
     */
    public function getMatchinWebsite($to_search) {
        if ($to_search != "" && strlen($to_search) > 3) {
            $this->db->like('root',$to_search);
            $query= $this->db->get_where('website',array('active'=>1));
            $results = array();
            foreach ($query->result() as $row) {
                $results[] = $row;
            }
            return $results;
        }
    }

}
