<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_controller
 *
 * @author 
 */
class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('template');
    }

    public function index() {
        $data['user'] = $this->User_model->get_user(1);
//        $this->load->view('templates/header', $data);
//        $this->load->view('user/index', $data);
//        $this->load->view('templates/footer');
        $this->template->set('data',$data);
        $this->template->render();
    }

    public function view($id) {
        $data['user'] = $this->User_model->get_user($id);
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

}
