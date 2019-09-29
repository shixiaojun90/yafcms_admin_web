<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/3
 * Time: 11:29
 */
class NewsController extends BasicController {
    private function init(){
        $this->m_newlist  = $this->load('newlist');
        $this->m_newgrouy  = $this->load('newgroy');
    }

    public function indexAction(){
        $data['newgrouy']=$this->m_newgrouy->getfiledall();
        
        $sort='id desc';
        !empty($this->getRequest()->get("page")) ? $page=$this->getRequest()->get("page") : $page=1;
        !empty($this->getRequest()->get("limit")) ? $limit=$this->getRequest()->get("limit") : $limit=6;
        $queryid=$_SERVER['QUERY_STRING'];
        $requestid = explode('-',$queryid);
        $requestid =&explode('.',$requestid[1]);
        
        $requestid[0]==0 ? $id = $data['newgrouy'][0]['id'] : $id = $requestid[0]; 
        $where=" cid = {$id}";
        $data['newslist']=$this->m_newlist->getListByPage($limit,$page,$sort,$where);
        $data['cur']=$id;
        //echo "<pre/>";
        //print_r($data);exit;
        $this->getView()->assign(array("data"=>$data));
    }
    
    public function detailedAction(){
        $queryid=$_SERVER['QUERY_STRING'];
        $requestid = explode('-',$queryid);
        $requestid =&explode('.',$requestid[1]);
        $id = $requestid[0]; 
        $data['newslist']=$this->m_newlist->getfiledById($id);
        $data['newsgroy']=$this->m_newgrouy->getfiledById($data['newslist']['cid']);
        //echo "<pre/>";
        //print_r($data);exit;
        
        //echo($id);
        $this->getView()->assign(array("data"=>$data));
    }
    
}
