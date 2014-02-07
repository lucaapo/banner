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
class Page_model extends CI_Model {

    var $website_id = "";
    var $url = "";
    var $active = "";

    /**
     * costruttore
     */
    function __construct() {
        parent::__construct();
    }

    /**
     * insert nuovo utente
     */
    public function insert_page() {



        $this->website_id = $_POST['website_id'];

        $this->active = $_POST['active'];
        $this->url = $_POST['url'];

        $this->db->insert('page', $this);
    }

    /**
     * update
     */
    public function update_page() {

        $this->website_id = $_POST['website_id'];
        $this->active = $_POST['active'];
        $this->url = $_POST['url'];


        $this->db->update('page', $this, array('page_id' => $_POST['page_id']));
    }

    /**
     * controlla se la pagina ha già dei banner
     * @param type $page
     * @param type $typo
     * 
     */
    public function checkPage($page, $typo) {
        $this->db->select('*');
        $this->db->from('page');
        $this->db->join('banner', 'banner.page_id=page.page_id');
        $this->db->join('banner_typology', 'banner.banner_typology_id=banner_typology.banner_typology_id');
        $this->db->where('page.active', 1);
        $this->db->where('banner.active', 1);
        $this->db->where('banner.banner_typology_id', $typo);
        $this->db->like('page.url', $page);
        if ($this->db->count_all_results() < 1)
            return null;
        $this->db->select('*');
        $this->db->from('page');
        $this->db->join('banner', 'banner.page_id=page.page_id');
        $this->db->join('banner_typology', 'banner.banner_typology_id=banner_typology.banner_typology_id');
        $this->db->where('page.active', 1);
        $this->db->where('banner.active', 1);
        $this->db->where('banner.banner_typology_id', $typo);
        $this->db->like('page.url', $page);

        $res = $this->db->get();

        $ret = array();
        foreach ($res->result() as $row) {
            $ret[] = $row;
        }
        return $ret;
    }

    public function getSimilarPages($root, $typo) {
        $numChars = preg_match_all("/\//", $root, $num);

        if ($numChars <= 0) {
            $root.="/";
        }
        $chunk = explode('/', $root);
        $dim = array();
        $base = $chunk[0];
        for ($i = 0; $i < count($chunk); $i++) {
            if ($chunk[$i] == "")
                continue;
            if ($i == 0) {
                $to_add = "";
            } else {
                $to_add = "/" . $chunk[$i];
            }
            $base = $base . $to_add;
            $appo = $this->checkPage($base, $typo);
            if (!is_array($appo) || is_null($appo)) {
                continue;
            }
            $dim = array_merge($dim, $appo);
        }
        return $dim;
    }
    /**
     * disattiva la pagina con l'id passato
     * @param type $page_id
     */
    public function deactivate($page_id){
        $this->active=0;
        $this->db->update('page', $this, array('page_id' => $page_id));
    }

}
