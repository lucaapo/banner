<?php

require APPPATH . '/libraries/REST_Controller.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of banner_rest
 *
 * @author 
 */
class Banner_rest extends REST_Controller {

    public function index_get() {

        $this->load->model('Banner_model');
        $this->load->model('Page_model');

        $typology = $this->get('banner');
        $page = $this->get('page');
        if ($page[0] != '/') {
            $page = '/' . $page;
        }
        if ($page[strlen($page) - 1] == '/') {
            $page = substr($page, 0, strlen($page) - 1);
        }
        $pageBan = $this->Page_model->getExactPageBanner($page, $typology);

        if (is_null($pageBan) || !$pageBan instanceof stdClass) {
            //ciclo sulla url per trovare il banner corretto
            if (mb_substr_count($page, '/') > 1) {
                $page_chunk = explode('/', $page);
                
                $tosearch = $page;
                for ($i = (count($page_chunk) - 1); $i > 0; $i--) {
                    $pageBan = $this->Page_model->getExactPageBanner($tosearch, $typology);
                    if (is_null($pageBan) || !$pageBan instanceof stdClass) {
                        if ($tosearch[strlen($tosearch) - 1] == '/') {
                            $tosearch2 = $tosearch . "%";
                            $toremove = "/";
                        } else {
                            $tosearch2 = $tosearch . "/%";
                            $toremove = "";
                        }
                       
                        $pageBan = $this->Page_model->getExactPageBanner($tosearch2, $typology);
                    }
                    $tosearch = str_replace($page_chunk[$i] . $toremove, '', $tosearch);
                    if ($pageBan != null && is_object($pageBan)) {
                        break;
                    }
                }
            } else {

                $pageBan = $this->Page_model->getExactPageBanner($page . '/%', $typology);
                if (is_null($pageBan) || !is_object($pageBan))
                    return;
            }
        }
//        $banner = $this->Banner_model->getBannerOnPage($pageBan->page_id, $typology);
//        $storage = $this->Banner_model->getBanner($user_id, $user_id);
//        $storage = $this->Banner_model->cleanStorage($pageBan->storage);
        $storage = $pageBan->storage;
//        die($storage);
        if ($storage == "" || is_null($storage)) {
            $this->response('erorre!!' . $id, 200);
            return;
        }
        if (strpos($storage, '.jpg') > 0 ||strpos($storage, '.jpeg') > 0 ) {
            header("Content-Type: image/jpg");
        } else if (strpos($storage, '.png') > 0) {
            header('Content-Type: image/png');
        }
        //header("Content-Disposition: attachment; filename=\"" .$storage . "\";");
        //header("Content-Length: " . filesize($storage));

        $fh = fopen($storage, 'r');
        $content = fread($fh, filesize($storage));
        fclose($fh);
        echo $content;
        $this->response($content, 200);
        return;
    }

}
