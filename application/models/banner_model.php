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
        $this->db->insert('banner', $this);
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
    public function getBanner($user_id, $banner_id) {
        if ($banner_id > 0 && $user_id > 0) {
            $this->db->join('page', 'page.page_id=banner.page_id');
            $query = $this->db->get_where('banner', array('banner_id' => $banner_id));
            $res = $query->result();
            $res = $res[0];
            if ($res != null && $res->page_id != null && $res->user_id == $user_id) {
//                if(file_exists($res->storage)){
                return $res->storage;
//                }
            }
        }
    }

    /**
     * disattiva il banner con l'id passato
     * @param type $banner_id
     */
    public function deactivate($banner_id) {
        $old = $this->db->get_where('banner',array('banner_id'=>$banner_id));
        $this->active = 0;
        $this->start_date = $old->start_date;
        $this->end_date = $old->end_date;
        $this->banner_typology_id = $old->banner_typology_id;
        $this->storage = $old->storage;
        $this->db->update('banner', $this, array('banner_id' => $banner_id));
    }

    /**
     * inserisce un banner
     * @param type $storage
     * @param type $page_id
     * @param type $banner_typology_id
     * @param type $start_date
     * @param type $end_date
     * @return type
     */
    public function insertBanner($storage, $page_id, $banner_typology_id, $start_date, $end_date) {
        $this->banner_typology_id = $banner_typology_id;
        $this->page_id = $page_id;
        $this->active = 1;
        $this->storage = $storage;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->db->insert('banner', $this);
        return $this->db->insert_id();
    }

    public function save($data) {
        $this->banner_typology_id = $data['banner_typology_id'];
        $this->page_id = $data['page_id'];
        $this->end_date = $data['end_date'];
        $this->active = 1;
        $this->storage = $data['storage'];

        $this->start_date = $data['start_date'];
        $this->insert_date = date('Y-m-d H:i:s', time());
        $this->db->insert('banner', $this);
    }

    /**
     * pulisce la stringa e torna il percorso completo
     * @param type $storage
     * @return <string>
     */
    public function cleanStorage($storage) {
        
        if (strpos($storage, 'ttp:') > 0) {
           
            return $storage;
        } else if (strpos($storage, '/upload') > 0) {
            
            $sub = substr($storage, strpos($storage, '/upload'));
        } else {
            
            $sub = $storage;
        }
        
        return 'http://localhost' . $sub;
    }

}
