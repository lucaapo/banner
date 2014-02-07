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
    /**
     * controlla se la pagina ha già dei banner
     * @param type $page
     * @param type $typo
     * 
     */
    public function checkPage($page, $typo){
        $this->db->select('*');
        $this->db->from('page');
        $this->db->join('banner','banner.page_id=page.page_id');
        $this->db->join('banner_typology','banner.banner_typology_id=banner_typology.banner_typology_id');       
        $this->db->where('page.active',1);
        $this->db->where('banner.active',1);
        $this->db->where('banner.banner_typology_id',$typo);
        $this->db->like('page.url', $page); 
        if($this->db->count_all_results()<1)return null;
        $this->db->select('*');
        $this->db->from('page');
        $this->db->join('banner','banner.page_id=page.page_id');
        $this->db->join('banner_typology','banner.banner_typology_id=banner_typology.banner_typology_id');       
        $this->db->where('page.active',1);
        $this->db->where('banner.active',1);
        $this->db->where('banner.banner_typology_id',$typo);
        $this->db->like('page.url', $page); 
        
        $res = $this->db->get();
        
        $ret = array();
        foreach ($res->result() as $row){
            $ret[]=$row;
        }
        return $ret;
    }
    
    
}
