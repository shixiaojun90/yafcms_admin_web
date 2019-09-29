<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/3
 * Time: 11:29
 */
class CaselistController extends BasicController {
    private function init(){
        $this->m_caselist  = $this->load('caselist');
        $this->m_categrouy  = $this->load('categrouy');
    }

    public function indexAction(){
        $id=$page=$this->getRequest()->get("id");
        $sort='id desc';
        !empty($this->getRequest()->get("page")) ? $page=$this->getRequest()->get("page") : $page=1;
        !empty($this->getRequest()->get("limit")) ? $limit=$this->getRequest()->get("limit") : $limit=12;
        
        $where=" cid = {$id}";
        $data=$this->m_caselist->getListByPage($limit,$page,$sort,$where);
        
        $totalpage=ceil($data['total']/$limit);
        $data['totalpage']=$totalpage;
        $data['currentpage']=$page;
        $data['categroy']=$this->m_categrouy->getfiledById($id);
        //echo "<pre/>";
        //print_r($data);exit;
        
        //echo($page);
        $this->getView()->assign(array("data"=>$data));
    }

}
