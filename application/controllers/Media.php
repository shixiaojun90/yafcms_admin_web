<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/3
 * Time: 11:29
 */
class MediaController extends BasicController {
    private function init(){
        $this->m_media  = $this->load('media');
    }

    public function indexAction(){
        $data=$this->m_media->getfiledall();
        //echo "<pre/>";
        //print_r($data);exit;
        
        //echo($page);
        $this->getView()->assign(array("data"=>$data));
    }

}
