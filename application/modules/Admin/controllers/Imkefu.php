<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/3
 * Time: 11:29
 */
class ImkefuController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_imkefu  = $this->load('imkefu');
        $this->m_admin  = $this->load('admin');
    }

    public function indexAction(){
        
    }
    
    public function tabPageAction(){
        try{
            $sort='id desc';
            !empty($this->getRequest()->get("page")) ? $page=$this->getRequest()->get("page") : $page=1;
            !empty($this->getRequest()->get("limit")) ? $limit=$this->getRequest()->get("limit") : $limit=10;
            
            $data=$this->m_imkefu->getListByPage($limit,$page,$sort,'');
            if(!empty($data)){
                foreach ($data['data'] as $key => $value) {
                    $value['adminname']=$this->m_admin->getfiledById($value['adminid'])['adminname'];
                    $data['data'][$key]=$value;
                }
            }
            
			//print_r($list);
            $resouce['code']=0;
            $resouce['msg']='';
            $resouce['count']=$data['total'];
            $resouce['data']=$data['data'];
            
            Helper::response($resouce);
            
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    
    public function editAction(){
        $data=$this->m_imkefu->getfiled($this->getRequest()->get('id'));
        $data['userinfo']=$this->m_admin->getListrole();
        //echo "<pre>";
        //print_r($data);
        $this->getView()->assign(array("data"=>$data));
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
            $adminname=$this->m_imkefu->getfiledById($this->getRequest()->getpost('adminid'));
            if(!empty($adminname)){
                $resouce['code']=1002;
                $resouce['msg']='此账号已被其它客服关联';
                Helper::response($resouce);
            }
            
	    	$id=$this->getRequest()->getpost('id');
	    	$admin['kefunamem']=$this->getRequest()->getpost('kefunamem');
	    	$admin['adminid']=$this->getRequest()->getpost('adminid');
	    	$admin['kefulogo']=$this->getRequest()->getpost('kefulogo');
	    	$admin['c_time']=date("Y-m-d H:i:s");
            $res=$this->m_imkefu->Where("id={$id}")->Update($admin);
            $resouce['code']=0;
            $resouce['msg']='修改成功';
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }

    /**
     * Add new Userinfo
     */
    public function addAction(){
        try{
            Helper::response('0');
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    public function addhtmlAction(){
        $data['userinfo']=$this->m_users=getListrole();
        $this->getView()->assign(array("data"=>$data));
    }
    
    /**
     * Add new Userinfo
     */
    public function addinsertAction(){
        try{
            $adminname=$this->m_imkefu->getfiledById($this->getRequest()->getpost('adminid'));
            if(!empty($adminname)){
                $resouce['code']=1002;
                $resouce['msg']='此账号已被其它客服关联';
                Helper::response($resouce);
            }
            
	    	$admin['kefunamem']=$this->getRequest()->getpost('kefunamem');
	    	$admin['adminid']=$this->getRequest()->getpost('adminid');
	    	$admin['kefulogo']=$this->getRequest()->getpost('kefulogo');
	    	$admin['c_time']=date("Y-m-d H:i:s");
            $res=$this->m_imkefu->Insert($admin);
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
    
    
    public function uploadAction(){
    	try{
	    	$path='upload/kefu/';
	    	
	    	if(!empty($_FILES)){
	    		$up = new Upload($_FILES['upload'], $path);
	    		$extpos = strrpos($_FILES['upload']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
	    		$ext = substr($_FILES['upload']['name'],$extpos+1);
	    		$newFileName = pathinfo($_FILES['upload']['name'])['filename'].$ext;
	    		$src='http://'.$_SERVER['HTTP_HOST'].'/'.$path.$up->upload($newFileName)['img'];
	    	}
	    	if($up->upload($newFileName)['code']==0){
	    	    $resouce['code']=0;
                $resouce['msg']='文件上传成功';
                $resouce['src']=$src;
	    	}else{
	    	    $resouce['code']=1002;
                $resouce['msg']='文件上传失败';
	    	}
	    	Helper::response($resouce);
    	}catch (Exception $ex){
    		Helper::response('1006',$ex);
    	}
    	//Yaf_Dispatcher::getInstance()->autoRender(false);
    }
    

    /**
     * Delete
     */
    public function deleteAction(){
        try{
            $id=$this->getRequest()->getpost('id');
            if(is_numeric($id)){
                $result = $this->m_imkefu->Where("id in ({$this->getRequest()->getpost('id')})")->Delete();
            }else{
                $result = $this->m_imkefu->Where("id in ({$this->getRequest()->getpost('id')})")->Delete();
            }
            
            !empty($result) || $result > 0 ? $result = 1 : $result = 0;
            //pr($result);
            Helper::response($result);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
}
