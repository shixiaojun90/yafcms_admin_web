<?php

class SecondaryController extends BasicController {

	public function init(){
//        Yaf_Registry::get('adminPlugin')->checkUser();
        $this->m_contact  = $this->load('contact');
	}

	public function indexAction() {
		$data=$this->m_contact->getfiledById();
        $this->getView()->assign(array("data"=>$data));
    }
    
    
}