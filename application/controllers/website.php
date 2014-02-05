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
class Website extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Website_model');
    }

    /**
     * indice
     */
    public function index() {
        $data = $this->Website_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('website/index', $data);
    }

    public function addone() {
        $this->load->library('Tank_auth');
        $auth = new Tank_auth();
        if (!$auth->is_loggedin()) {
            $this->load->view('auth/login');
            return;
        } else {
            if (!$this->input->post('submit')) {
                $this->load->view('templates/header');
                $this->load->view('website/addone');
                return;
            }

            $user_id = $auth->get_user_id();
            if (!is_null($user_id) && $user_id > 0) {
                $this->load->model('Users');
                $user = $this->Users->get_user_by_id($user_id);
                $this->load->helper(array('form', 'url'));

                $this->load->library('form_validation');
                $this->form_validation->set_rules('root', 'Root', 'required|min_length[5]|is_unique[website.root]');
                $this->form_validation->set_rules('name', 'Sito', 'required|min_length[3]|is_unique[website.name]');



                $root = $this->input->post('root');
                $name = $this->input->post('name');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('website/addone');
                } else {
                    //salva il sito nel db
                    $this->load->model('Website_model');
                    if(!$this->Website_model->addone($name,$root,$user)){
                        $data['error']="Impossibile salvare nel DB";
                        throw new Exception($data['error'], 0,1);
                    }
                    $data = array('user' => $user, 'pass' => $pass);
                    $this->load->view('success', $data);
                }
            }
        }
    }

}
