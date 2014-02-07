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

        $typo = $this->fellSelectTypology();

        $typo['error'] = "";

        $this->load->view('templates/header');
        $this->load->view('banner/form_upload', $typo);
        $this->load->view('templates/footer');
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
            $typo = $this->fellSelectTypology();
            $error['typologies'] = $typo['typologies'];
            $this->load->view('templates/header');
            $this->load->view('banner/form_upload', $error);
            $this->load->view('templates/footer');
        } else {
            $page_id = 0;
            $page = $_POST['page_name'];
            $x = $_POST['dimx'];
            $y = $_POST['dimy'];
            $typo = $_POST['typology'];
            $uplaod_data = $this->upload->data();
            //caso file caricato dimensione diversa di quella del banner
            if ($x != $uplaod_data['image_width'] || $y != $uplaod_data['image_height']) {
                $error = array('error' => "il file caricato non corrisponde alle dimensioni del banner scelto!");
//                print_r($this->upload->data());
//                print_r($error);die();
                $typo = $this->fellSelectTypology();
                $error['typologies'] = $typo['typologies'];
                $this->load->view('templates/header');
                $this->load->view('banner/form_upload', $error);
                $this->load->view('templates/footer');
                return;
            }
            //caso ovverride: devo cancellare i banner sovrascritti
            if (isset($_POST['ovverride']) && $_POST['ovverride'] != "") {
                //carico le pagine simili
                $this->load->model('Page_model');
                $pages = $this->Page_model->getSimilarPages($page,$typo);
                foreach ($pages as $pag){
                    $this->Banner_model->deactivate($pag->banner_id);
                    if($page == trim($pag->url)){
                        $page_id = $pag->page_id;
                        continue;
                    }
                    else{
                        $this->Page_model->deactivate($pag->page_id);
                        
                    }
                }
            }
            //se la pagina non è ancora stata trovata la cerco o la inserisco
            if($page_id==0){
                
            }


            $data = array('upload_data' => $this->upload->data());
            $this->load->view('templates/header');
            $this->load->view('banner/uploaded', $data);
            $this->load->view('templates/footer');
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
