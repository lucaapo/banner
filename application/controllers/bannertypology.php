<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bannertypology
 *
 * @author luckylauretta
 */
class bannertypology extends CI_Controller{

    //put your code here

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function typology() {
        if (isset($_POST['id'])) {
            header('Content-Type: application/json');
            header("HTTP/1.1 200 OK");
            $this->load->model('Typology_model');
            $dim = array();
            $dim = $this->Typology_model->getDimensions($_POST['id']);
            $res = array('x'=>$dim[0]->dimension_x,'y'=>$dim[0]->dimension_y);
            echo json_encode($res) ;//"{'x':" .  . ",'y':" . . "}";
            return;
        }
    }

}
