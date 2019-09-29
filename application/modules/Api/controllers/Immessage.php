<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/3
 * Time: 11:29
 */
class ImmessageController extends BasicController {
    private function init(){
        $this->m_users  = $this->load('users');
        $this->m_immessage  = $this->load('immessage');
        $this->m_imkefufriend  = $this->load('imkefufriend');
    }
    
    public function tabPageAction(){
        try{
            $sort='id desc';
            !empty($this->getRequest()->get("page")) ? $page=$this->getRequest()->get("page") : $page=1;
            !empty($this->getRequest()->get("limit")) ? $limit=$this->getRequest()->get("limit") : $limit=10;
            
            $data=$this->m_imkefu->getListByPage($limit,$page,$sort,'');
            
            $resouce['code']=0;
            $resouce['msg']='';
            $resouce['count']=$data['total'];
            $resouce['data']=$data['data'];
            Helper::response($resouce);
            
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    /**
     * Add new Userinfo
     */
    public function addinsertAction(){
        try{
            //添加关联客服和用户为好友
            
            $friendid=$this->m_imkefufriend->getfiledById($this->getRequest()->getpost('userid'));
            
	    	if(empty($friendid)){
	    	    $frienddata['friend_id']=$this->getRequest()->getpost('userid');
                $frienddata['kefu_id']=$this->getRequest()->getpost('kefuid');
                $friendres=$this->m_imkefufriend->Insert($frienddata);
	    	}
	    	
	    	$mineuser=$this->m_users->getfiledById($this->getRequest()->getpost('userid'));
	    	$userinfo=array(
	    	    "nickname"=>$mineuser['nickname'],
	    	    "username"=>$mineuser['username'],
	    	    "userid"=>$mineuser['userid'],
	    	    "avatar"=>$mineuser['pic']
	    	 );
	    	
	    	//$admin['reqUserId']=filterStr($this->getRequest()->getpost('userid'));
	    	$admin['content']=filterStr($this->getRequest()->getpost('content'));
	    	$admin['dTime']=time();
	    	$admin['userinfo']=json_encode($userinfo);
	    	$admin['formid']=$this->getRequest()->getpost('userid');
	    	$admin['toid']=$this->getRequest()->getpost('kefuid');
	    	$admin['mine']=0;
            $res=$this->m_immessage->Insert($admin);
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
