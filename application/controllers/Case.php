<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/3
 * Time: 11:29
 */
class CaseController extends BasicController {
    private function init(){
        $this->m_categroy  = $this->load('categrouy');
        $this->m_caselist  = $this->load('caselist');
    }

    public function indexAction(){
        $data['categroy']=$this->m_categroy->getfiledall();
        if(!empty($data['categroy'])){
            $list=array();
            foreach ($data['categroy'] as $key => $value){
                $data['categroy'][$key]['caselist']=$this->m_caselist->getfiledcate($value['id']);
            }
        }
        //echo "<pre/>";
        //print_r($data);exit;
        $this->getView()->assign(array("data"=>$data));
    }
    
}
