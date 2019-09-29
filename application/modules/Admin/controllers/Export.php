<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/3
 * Time: 11:29
 */
class ExportController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_admin  = $this->load('admin');
        $this->m_admindomain  = $this->load('admindomain');
        $this->m_adminrole  = $this->load('adminrole');
    }

    public function indexAction(){
        
    }
    
    public function tabPageAction(){
        try{
            $sort='adminid desc';
            !empty($this->getRequest()->get("page")) ? $page=$this->getRequest()->get("page") : $page=1;
            !empty($this->getRequest()->get("limit")) ? $limit=$this->getRequest()->get("limit") : $limit=10;
            
            $data=$this->m_admin->getListByPage($limit,$page,$sort,$_POST['searchPhrase']);
            
	    	foreach ($data['data'] as $itemk =>$itemv){
                $itemv['domain_name']=$this->m_admindomain->getfiledById($itemv['domainid'])['domain_name'];
                $itemv['role_name']=$this->m_adminrole->getfiledById($itemv['role_id'])['name'];
                //$itemv['id']=$itemv['adminid'];
                $list[$itemk]=$itemv;
            }
            
            $resouce['code']=0;
            $resouce['msg']='';
            $resouce['count']=$data['total'];
            $resouce['data']=$list;
            Helper::response($resouce);
            
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public function editAction(){
        $data=$this->m_admin->getfiledById($this->getRequest()->get('adminid'));
        if(!empty($data)){
            $data['domainlist']=$this->m_admindomain->getListUser();
            $data['rolename']=$this->m_adminrole->getListUser();
        }
        
        //echo "<pre>";
        //print_r($data);exit;
        $this->getView()->assign(array("user"=>$data));
    }
    
    
    public  function getByIdAction(){
        try{
            Helper::response('0');
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public function updateByIdAction(){
        try{
            
		//查询
            if($this->getRequest()->getpost('isupass')){
                if(empty($this->getRequest()->getpost('adminpass'))){
                    $resouce['code']=1002;
                    $resouce['msg']='请填写密码';
                    Helper::response($resouce);
                }
                
            	 $adminpass=md5($this->getRequest()->getpost('adminpass'));
            	 $admin['adminpass']=$adminpass;
	    	}
	    	
	    	$admin['adminname']=$this->getRequest()->getpost('adminname');
	    	$admin['domainid']=$this->getRequest()->getpost('domainid');
	    	$admin['role_id']=$this->getRequest()->getpost('role_id');
	    	
            $res=$this->m_admin->updateAdmin($admin,$this->getRequest()->getpost('adminid'));
            if($res){
                $resouce['code']=0;
                $resouce['msg']='修改成功';
            }else{
                $resouce['code']=1002;
                $resouce['msg']='修改失败';
            }
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    /**
     * Add new Userinfo
     */
    public function addAction(){
        $data['domainlist']=$this->m_admindomain->getListUser();
        $data['rolename']=$this->m_adminrole->getListUser();
        
        $this->getView()->assign(array("user"=>$data));
    }
    
    /**
     * Add new Userinfo
     */
    public function userinsertAction(){
        try{
            
        	$adminpass=md5($this->getRequest()->getpost('adminpass'));
        	$admin['adminpass']=$adminpass;
	    	$admin['adminname']=filterStr($this->getRequest()->getpost('adminname'));
	    	$admin['domainid']=$this->getRequest()->getpost('domainid');
	    	$admin['role_id']=$this->getRequest()->getpost('role_id');
	    	
	    	$adminname=$this->m_admin->getByName($admin['adminname'])['adminname'];
	    	if(!empty($adminname) || $adminname == $admin['adminname']){
	    	    $resouce['code']=1002;
                $resouce['msg']='用户已经存在';
                Helper::response($resouce);
	    	}
	    	
            $res=$this->m_admin->Insert($admin);
            if($res){
                $resouce['code']=0;
                $resouce['msg']='添加成功';
            }else{
                $resouce['code']=1002;
                $resouce['msg']='添加失败';
            }
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    

    /**
     * Delete
     */
    public function deleteAction(){
        try{
            $id=$this->getRequest()->getpost('id');
            if(is_numeric($id)){
                $result = $this->m_admin->Where("adminid in ({$this->getRequest()->getpost('id')})")->Delete();
            }else{
                $result = $this->m_admin->Where("adminid in ({$this->getRequest()->getpost('id')})")->Delete();
            }
            
            !empty($result) || $result > 0 ? $result = 1 : $result = 0;
            //pr($result);
            Helper::response($result);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
}
