<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/3
 * Time: 11:29
 */
class CasetreeController extends BasicController {
    private function init(){
        $this->m_caselist  = $this->load('caselist');
        $this->m_categrouy  = $this->load('categrouy');
    }

    public function indexAction(){
        $id=$page=$this->getRequest()->get("id");
        $data['caselist']=$this->m_caselist->getfiledById($id);
        $data['categroy']=$this->m_categrouy->getfiledById($data['caselist']['cid']);
        //echo "<pre/>";
        //print_r($data);exit;
        
        //echo($id);
        $this->getView()->assign(array("data"=>$data));
    }

}
