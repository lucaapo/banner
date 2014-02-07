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
    }

    public function check() {
        if (isset($_POST['root']) && isset($_POST['typo'])) {
            $root = $_POST['root'];
            $numChars = preg_match_all("/\//", $root, $num);

            if ($numChars <= 0) {
                $root.="/";
            }
            $chunk = explode('/', $root);
            $dim = array();
            $base = $chunk[0];
            for ($i = 0; $i < count($chunk); $i++) {
                if($chunk[$i]=="")continue;
                if ($i == 0) {
                    $to_add = "";
                } else {
                    $to_add = "/" . $chunk[$i];
                }
                $base = $base . $to_add;
                $appo = $this->Page_model->checkPage($base, $_POST['typo']);
                if (!is_array($appo) || is_null($appo)) {
                    continue;
                }
                $dim = array_merge($dim, $appo);
            }
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
        $count=0;
        for ($j = 0; $j < (count($my)-1); $j++) {
            for ($i = ($j+1); $i < count($my); $i++) {
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

}