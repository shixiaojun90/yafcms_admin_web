<?php

class RoleinfoController extends BasicController {
	
	private $m_role;

	private function init(){
	    session_start();
		Yaf_Registry::get('adminPlugin')->checkLogin();
        //Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_admin  = $this->load('admin');
        //$this->m_admindomain  = $this->load('admindomain');
        $this->m_adminrole  = $this->load('adminrole');
	}
	
	/**
	 *  Index : list all roles
	 */
	public function indexAction(){
		
	}

    public function tabPageAction(){
        try{
            $sort='id desc';
            !empty($this->getRequest()->get("page")) ? $page=$this->getRequest()->get("page") : $page=1;
            !empty($this->getRequest()->get("limit")) ? $limit=$this->getRequest()->get("limit") : $limit=10;
            
            $data=$this->m_adminrole->getListByPage($limit,$page,$sort,$_POST['searchPhrase']);
            
            $resouce['code']=0;
            $resouce['msg']='';
            $resouce['count']=$data['total'];
            $resouce['data']=$data['data'];
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    public  function getByIdAction(){
        try{
            Helper::response('0');
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

	public function editAction(){
        $data=$this->m_adminrole->getfiledById($this->getRequest()->get('id'));
        $this->getView()->assign(array("roleinfo"=>$data));
    }
    
    public function checkedroleAction(){
        try{
            $data=$this->m_adminrole->getfiledById($this->getRequest()->get('id'));
            $resouce['code']= 0;
            $resouce['roleinfo']=unserialize($data['roleinfo']);
            
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    public function updateByIdAction(){
        try{
        	$post['name']=filterStr($this->getRequest()->getpost('name'));
        	$post['roleinfo']=serialize($this->getRequest()->getpost('roleinfo'));
            $res=$this->m_adminrole->UpdateByID($post,$this->getRequest()->getpost('id'));
            $resouce['code']= 0;
            $resouce['msg']='修改成功';
            
            $dirbool=createRDir('session');
            $roleid=$this->getRequest()->getpost('id');
            $file="session/roleinfo_{$roleid}.txt";
            if(file_exists($file)){
                unlink($file);
            }
            
            $p=fopen($file,'a+b');
            fwrite($p,print_r(json_encode(unserialize($post['roleinfo'])),true));
            fclose($p);
            
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
	
	
	/**
	 * Add new roleinfo
	 */
	public function addAction(){
        try{
            Helper::response('0');
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
	}
	
	public function addhtmlAction(){
        
    }
	
	/**
	 * Add new roleinfo
	 */
	public function addinsertAction(){
        try{
            $post['name']=filterStr($this->getRequest()->getpost('name'));
        	$post['roleinfo']=serialize($this->getRequest()->getpost('roleinfo'));
            $result=$this->m_adminrole->Insert($post);
            !empty($result) || $result > 0 ? $result = 0 : $result = 1002;
            
            Helper::response($result);
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
                $result = $this->m_adminrole->Where("id in ({$this->getRequest()->getpost('id')})")->Delete();
            }else{
                $result = $this->m_adminrole->Where("id in ({$this->getRequest()->getpost('id')})")->Delete();
            }
            
            !empty($result) || $result > 0 ? $result = 0 : $result = 1002;
            //pr($result);
            Helper::response($result);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
}