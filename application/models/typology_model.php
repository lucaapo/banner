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
class Typology_model extends CI_Model {

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
    public function insert_bannertypology() {


        $this->typology = $_POST['typology'];
        $this->dimension_x = $_POST['dimension_x'];
        $this->dimension_y = $_POST['dimension_y'];
        $this->note = $_POST['note'];

        $this->db->insert('banner_typology', $this);
    }

    /**
     * update
     */
    public function update_bannertypology() {

        $this->typology = $_POST['typology'];
        $this->dimension_x = $_POST['dimension_x'];
        $this->dimension_y = $_POST['dimension_y'];
        $this->note = $_POST['note'];
        $this->db->update('banner_typology', $this, array('banner_typology_id' => $_POST['banner_typology_id']));
    }

    /**
     * Torna tutte le tipologie
     */
    public function getAll() {
        $query = $this->db->get('banner_typology');
        $results = array();
        foreach ($query->result() as $row) {
            $results[] = $row;
        }
        return $results;
    }

    public function getDimensions($id){
        $query = $this->db->get_where('banner_typology',array('banner_typology_id'=>$id));
        return $query->result();
    }
    
}
