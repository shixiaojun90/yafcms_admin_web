<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/3
 * Time: 11:29
 */
class MediatreeController extends BasicController {
    private function init(){
        $this->m_media  = $this->load('media');
    }

    public function indexAction(){
        $id=$this->getRequest()->get("id");
        $data=$this->m_media->getfiledById($id);
        //echo "<pre/>";
        //print_r($data);exit;
        
        //echo($id);
        $this->getView()->assign(array("data"=>$data));
    }

}
