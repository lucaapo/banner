<?php
require APPPATH.'/libraries/REST_Controller.php';
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
        $id= $this->get('id');
        $user_id = $this->get('user_id');
        $banner_id = $this->get('banner_id');
//        $user_id = $this->get('id');
//        $banner_id = $this->get('id');

        $storage = $this->Banner_model->getBanner($user_id, $user_id);
        if ($storage == "" || is_null($storage)) {
            $this->response('erorre!!'.$id,200);
            return;
        }
        header("Content-Type: image/jpg");
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
