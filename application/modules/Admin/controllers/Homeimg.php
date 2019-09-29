<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/3
 * Time: 11:29
 */
class HomeimgController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_homeimg  = $this->load('homeimg');
    }

    public function indexAction(){
        
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
        $data=$this->m_homeimg->getfiledall();
        //echo "<pre>";
        //print_r($data);exit;
        $this->getView()->assign(array("data"=>$data));
    }
    
    /**
     * Add new Userinfo
     */
    public function addinsertAction(){
        try{
            $imgarr=$this->getRequest()->getpost('urllogo');
            if(!empty($imgarr) && is_array($imgarr)){
                foreach ($imgarr as $key => $value) {
                    $post['c_time']=date('Y-m-d H:i:s');
	    	        $post['info']=$value;
	    	        $res=$this->m_homeimg->Insert($post);
                }
            }
	    	
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
                $result = $this->m_homeimg->Where("id in ({$this->getRequest()->getpost('id')})")->Delete();
            }else{
                $result = $this->m_homeimg->Where("id in ({$this->getRequest()->getpost('id')})")->Delete();
            }
            
            !empty($result) || $result > 0 ? $result = 1 : $result = 0;
            //pr($result);
            Helper::response($result);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    

    public function uploadAction(){
    	try{
	    	$path='upload/homeimg/';
	    	
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
}
