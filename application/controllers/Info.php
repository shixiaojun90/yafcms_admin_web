<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/3
 * Time: 11:29
 */
class InfoController extends BasicController {
    private function init(){
        $this->m_categrouy  = $this->load('categrouy');
        $this->m_info  = $this->load('info');
        $this->m_technology  = $this->load('technology');
        $this->m_project  = $this->load('project');
        $this->m_auth  = $this->load('auth');
    }

    public function indexAction(){
        $data=$this->m_info->getfiledById();
        $data['categroy']=$this->m_categrouy->getfiledall();
        $data['technology']=$this->m_technology->getfiledall();
        $data['project']=$this->m_project->getfiledall();
        $data['auth']=$this->m_auth->getfiledall();
        //echo "<pre>";
        //print_r($data);exit;
        $this->getView()->assign(array("msg"=>$data));
    }
   
}
