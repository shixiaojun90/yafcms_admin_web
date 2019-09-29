<?php

class IndexController extends BasicController {

	public function init(){
	    $this->m_homeimg  = $this->load('homeimg');
	    $this->m_caselist  = $this->load('caselist');
	    $this->m_newlist  = $this->load('newlist');
	    $this->m_link  = $this->load('link');
	}

	public function indexAction() {
		$data=$this->m_homeimg->getfiledall();
		$data['caselist']=$this->m_caselist->getfiledtuijian();
		$data['newlist']=$this->m_newlist->getfiledtuijian();
		$data['link']=$this->m_link->getfiledall();
        //echo "<pre>";
        //print_r($data);exit;
        //if(!empty($data['newlist'])){
        //    foreach ($data['newlist'] as &$value) {
        //        $value=subString_UTF8($value['desc'],0,30);
        //    }
        //}
        $this->getView()->assign(array("data"=>$data));
    }
}