<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/3
 * Time: 11:29
 */
class SystemsetController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_version  = $this->load('version');
    }

    public function indexAction(){
        
    }
    
    public function tabPageAction(){
        try{
            $sort='id desc';
            !empty($this->getRequest()->get("page")) ? $page=$this->getRequest()->get("page") : $page=1;
            !empty($this->getRequest()->get("limit")) ? $limit=$this->getRequest()->get("limit") : $limit=10;
            
            $data=$this->m_version->getListByPage($limit,$page,$sort,'');
            
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
        $data=$this->m_version->getfiledById($this->getRequest()->get('id'));
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
            $admin['number']=filterStr($this->getRequest()->getpost('number'));
	    	$admin['dowloadurl']=filterStr($this->getRequest()->getpost('dowloadurl'));
	    	$admin['loginimg']=$this->getRequest()->getpost('loginimg');
	    	$admin['banner']=$this->getRequest()->getpost('banner');
	    	$number=$this->m_version->getfiledByname($admin['number'])['number'];
	    	if(!empty($number) || $number == $admin['number']){
	    	    $resouce['code']=1002;
                $resouce['msg']='版本号已经存在';
                Helper::response($resouce);
	    	}
	    	
	    	
            $res=$this->m_version->updateuser($admin,$this->getRequest()->getpost('id'));
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
        try{
            Helper::response('0');
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    public function addhtmlAction(){
        //$this->getView()->assign(array("data"=>$data));
    }
    
    /**
     * Add new Userinfo
     */
    public function addinsertAction(){
        try{
	    	$admin['number']=filterStr($this->getRequest()->getpost('number'));
	    	$admin['dowloadurl']=filterStr($this->getRequest()->getpost('dowloadurl'));
	    	$admin['loginimg']=$this->getRequest()->getpost('loginimg');
	    	$admin['banner']=$this->getRequest()->getpost('banner');
	    	
	    	$number=$this->m_version->getfiledByname($admin['number'])['number'];
	    	if(!empty($number) || $number == $admin['number']){
	    	    $resouce['code']=1002;
                $resouce['msg']='版本号已经存在';
                Helper::response($resouce);
	    	}
	    	
            $res=$this->m_version->Insert($admin);
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
	    	$path='upload/version/';
	    	
	    	if(!empty($_FILES)){
	    		$up = new Upload($_FILES['upload'], $path);
	    		$extpos = strrpos($_FILES['upload']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
	    		$ext = substr($_FILES['upload']['name'],$extpos+1);
	    		$newFileName = pathinfo($_FILES['upload']['name'])['filename'].'-'.trim($_POST['version']).$ext;
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
                $result = $this->m_version->Where("id in ({$this->getRequest()->getpost('id')})")->Delete();
            }else{
                $result = $this->m_version->Where("id in ({$this->getRequest()->getpost('id')})")->Delete();
            }
            
            !empty($result) || $result > 0 ? $result = 1 : $result = 0;
            //pr($result);
            Helper::response($result);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
}
