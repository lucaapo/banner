<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of banner
 *
 * @author luckylauretta
 */
class banner extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    function form_upload() {
        
        $typo=$this->fellSelectTypology();

        $typo['error']="";

        $this->load->view('templates/header');
        $this->load->view('banner/form_upload', $typo);
//      $this->load->view('templates/footer');
    }

    function uploaded() {

        $config['upload_path'] = './uploaded/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10000';
        $config['max_width'] = '1024';
        $config['max_height'] = '768';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
//                print_r($this->upload->data());
//                print_r($error);die();
            $typo=$this->fellSelectTypology();
            $error['typologies']=$typo['typologies'];
            $this->load->view('banner/form_upload', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());

            $this->load->view('banner/uploaded', $data);
        }
    }

    /**
     * riempie un array con i valori da passare a una select
     */
    public function fellSelectTypology() {
        $this->load->model('Typology_model');
        $typo = array();

        $typologies = $this->Typology_model->getAll();

        foreach ($typologies as $typ) {
            $typo['typologies'][$typ->banner_typology_id] = $typ->typology;
        }
        return $typo;
    }

}
