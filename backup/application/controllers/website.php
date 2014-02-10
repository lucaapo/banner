<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of website
 *
 * @author 
 * 
 */
class Website extends CI_Controller{
    
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Website_model');
    }
    /**
     * indice
     */
    public function index(){
        $data = $this->Website_model->getAll();
        
        $this->load->view('templates/header', $data);
        $this->load->view('website/index', $data);
    }
    
}
