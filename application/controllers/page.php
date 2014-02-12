<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of page
 *
 * @author 
 */
class Page extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Page_model');
        $this->load->library('pagination');
    }

    public function check() {
        if (isset($_POST['root']) && isset($_POST['typo'])) {
            $root = $_POST['root'];
            $dim = $this->Page_model->getSimilarPages($root, $_POST['typo']);
//            $dim = $this->my_array_unique($dim);
            if ($dim != null) {
                header('Content-Type: application/json');
                header("HTTP/1.1 200 OK");
                $table = "<table id='pagetable'><tbody>";
                foreach ($dim as $line) {

                    $table.='<tr><td>' . $line->url . '</td>'
                            . '<td>' . $line->typology . '</td>'
                            . '<td>' . $line->banner_id . '</td></tr>';
                }
                $table.="</tbody></table>";

                $res = array('message' => 'Sono già presenti dei banner della stessa dimensione per la pagina ' . $_POST['root'], 'table' => $table);
                echo json_encode($res); //"{'x':" .  . ",'y':" . . "}";
                return;
            } else {
                header('Content-Type: application/xml');
                header("HTTP/1.1 404 OK");
            }
        }
    }

    function my_array_unique($my) {
        if (!is_array($my)) {
            return $my;
        }
        $final = array();
        $count = 0;
        for ($j = 0; $j < (count($my) - 1); $j++) {
            for ($i = ($j + 1); $i < count($my); $i++) {
                if ($my[$i]->url == $my[$j]->url && $my[$i]->typology == $my[$j]->typology && $my[$i]->banner_id == $my[$j]->banner_id) {
                    continue;
                } else {
                    $final[$count] = $my[$i];
                    $count++;
                }
            }
        }
        return $final;
    }

    public function table() {

        $config['base_url'] = site_url('page/table'); // base_url() .'/index.php/page/table';
        $config['total_rows'] = 50;
        $config['per_page'] = 1;
        $this->pagination->initialize($config);
        
        $pages = array();
        $this->load->model('Page_model');
        $this->load->model('Banner_model');
        $res = $this->Page_model->getAll();
        if ($res != null && is_array($res)) {
            foreach ($res as $key) {
                $appo = array();
                $appo['typology'] = $key->typology;
                $appo['page'] = $key->url;
                $appo['start_date'] = $key->start_date;
                $appo['end_date'] = $key->end_date;
                $appo['active'] = $key->active;
                $appo['storage'] = $this->Banner_model->cleanStorage($key->storage);
                $appo['url'] = $key->url;
                $appo['banner_id'] = $key->banner_id;
                $pages[] = $appo;
            }
        }
        $data['pages'] = $pages;
        $data['pagination']=$this->pagination->create_links();
        $this->load->view('templates/header');
        $this->load->view('page/table', $data);
        $this->load->view('templates/footer');
    }

//            
//
//        
//        
//      
//
//        
//
//        echo $this->
    
}
