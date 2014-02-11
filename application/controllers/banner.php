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

        $typo = $this->fillSelectTypology();

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
        $this->load->model('Page_model');
        $this->load->model('Banner_model');
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
//                print_r($this->upload->data());
//                print_r($error);die();
            $typo = $this->fillSelectTypology();
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
            $startdate = $_POST['start_date'];
            $enddate = $_POST['end_date'];
            $uplaod_data = $this->upload->data();
            //caso file caricato dimensione diversa di quella del banner
            if ($x != $uplaod_data['image_width'] || $y != $uplaod_data['image_height']) {
                $error = array('error' => "il file caricato non corrisponde alle dimensioni del banner scelto!");
//                print_r($this->upload->data());
//                print_r($error);die();
                $typo = $this->fillSelectTypology();
                $error['typologies'] = $typo['typologies'];
                $this->load->view('templates/header');
                $this->load->view('banner/form_upload', $error);
                $this->load->view('templates/footer');
                return;
            }
            //caso ovverride: devo cancellare i banner sovrascritti
            $pages = $this->Page_model->getSimilarPages($page, $typo);
            if (is_array($pages) && !is_null($pages)) {
                //carico le pagine simili

                foreach ($pages as $pag) {

                    $this->Banner_model->deactivate($pag->banner_id);
                    if ($page == trim($pag->url)) {
                        $page_id = $pag->page_id;
                        continue;
                    } else {
                        $this->Page_model->deactivate($pag->page_id);
                    }
                }
            }
            //se la pagina non è ancora stata trovata la cerco o la inserisco
            if ($page_id == 0) {
                $page_id = $this->Page_model->searchPage($page);
                if ($page_id == 0 || is_null($page_id)) {
                    $page_id = $this->Page_model->insertPage($page);
                }
            }

            //inserisce il banner
            $data['page_id'] = $page_id;
            $data['start_date'] = $startdate;
            $data['end_date'] = $enddate;
            $data['banner_typology_id'] = $typo;
            $data['dimension_x'] = $x;
            $data['dimension_y'] = $y;
            $data['storage'] = $uplaod_data['full_path'];
            $this->Banner_model->save($data);

            $data = array('upload_data' => $this->upload->data());
            $this->load->view('templates/header');
            $this->load->view('banner/uploaded', $data);
            $this->load->view('templates/footer');
        }
    }

    /**
     * riempie un array con i valori da passare a una select
     */
    public function fillSelectTypology() {
        $this->load->model('Typology_model');
        $typo = array();

        $typologies = $this->Typology_model->getAll();
        $typo['typologies'][0] = " --- ";
        foreach ($typologies as $typ) {
            $typo['typologies'][$typ->banner_typology_id] = $typ->typology;
        }
        return $typo;
    }

    public function delete() {
        $banner_id = $_POST['banner_id'];
        if ($banner_id >0) {
            
            $this->load->model('Banner_model');
            $this->load->model('Page_model');
            $ban = $this->Banner_model->getBannerFromId($banner_id);
            
            $this->Banner_model->deactivate($banner_id);
            $page = $this->Page_model->getPage($ban->page_id);
            $allbanner = $this->Banner_model->getBannerFromPage( $page->page_id);
            if (count($allbanner) == 0 || is_null($allbanner)) {
                $this->Page_model->deactivate($page->page_id);
            }
            header('Content-Type: application/json');
            header("HTTP/1.1 200 OK");
            echo json_encode("{'msg':'cancellato con successo'}");
        } else {
            header('Content-Type: application/xml');
            header("HTTP/1.1 404");
            echo xml_convert('<error>Impossibile eliminare il banner indicato</error>');
        }
    }

}
