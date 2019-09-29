<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/3
 * Time: 11:29
 */
class ContactController extends BasicController {
    private function init(){
        $this->m_contact  = $this->load('contact');
    }

    public function indexAction(){
        //print_r($_SERVER);exit;
        $data=$this->m_contact->getfiledById();
        $this->getView()->assign(array("data"=>$data));
    }
    
}
