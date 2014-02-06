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
    }

    public function index() {
        $data['user'] = $this->User_model->get_user(1);
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function view($id) {
        $data['user'] = $this->User_model->get_user($id);
        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    /**
     * login
     */
    public function login() {
        if (!$this->input->post('submit')) {
            $this->load->view('templates/header');
            $this->load->view('login');
            $this->load->view('templates/footer');
        }
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
//        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
//        $this->form_validation->set_rules('email', 'Email', 'required');


        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('login');
            $this->load->view('templates/footer');
        } else {
            $data = array('user' => $user, 'pass' => $pass);

            $this->load->view('templates/header');
            $this->load->view('success', $data);
            $this->load->view('templates/footer');
        }
    }

}
