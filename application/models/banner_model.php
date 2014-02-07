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
class Banner_model extends CI_Model {

    var $banner_typology_id = "";
    var $page_id = "";
    var $start_date = "";
    var $end_date = "";
    var $active = "";
    var $storage = "";
    var $insert_date = "";

    /**
     * costruttore
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * insert nuovo utente
     */
    public function insert_banner() {


        $this->banner_typology_id = $_POST['banner_typology_id'];
        $this->page_id = $_POST['page_id'];
        $this->end_date = $_POST['end_date'];
        $this->active = $_POST['active'];
        $this->storage = $_POST['storage'];

        $this->start_date = $_POST['start_date'];
        $this->insert_date = date('Y-m-d H:i:s', time());
        $this->db->insert('banner_typology', $this);
    }

    /**
     * update
     */
    public function update_banner() {

        $this->banner_typology_id = $_POST['banner_typology_id'];
        $this->page_id = $_POST['page_id'];
        $this->end_date = $_POST['end_date'];
        $this->active = $_POST['active'];
        $this->storage = $_POST['storage'];

        $this->start_date = $_POST['start_date'];
        $this->db->update('banner', $this, array('banner_id' => $_POST['banner_id']));
    }

    /**
     *  TOrna i banner di una pagina
     * @param type $page_id
     * @return type
     */
    public function getBannerFromPage($page_id) {
        if (is_numeric($page_id) && $page_id > 0) {
            $results = array();

            $query = $this->db->get_where('banner', array('page_id' => $page_id));
            foreach ($query->result() as $row) {
                $results[] = $row;
            }
            return $results;
        }
    }
    /**
     * ritorna il percorso di un banner a partire da 
     * @param type $user_id
     * @param type $banner_id
     * @return type
     */
    public function getBanner($user_id, $banner_id){
        if($banner_id>0 && $user_id>0){
            $this->db->join('page','page.page_id=banner.page_id');
            $query = $this->db->get_where('banner',array('banner_id'=>$banner_id));
            $res = $query->result();
            $res=$res[0];
            if($res!=null && $res->page_id!=null &&$res->user_id==$user_id){
//                if(file_exists($res->storage)){
                    return $res->storage;
//                }
            }
        }
        
    }
    
}
