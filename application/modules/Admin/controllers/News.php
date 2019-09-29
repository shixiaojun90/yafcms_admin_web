<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/3
 * Time: 11:29
 */
class NewsController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_news  = $this->load('news');
    }

    public function indexAction(){
        
    }
    
    public function tabPageAction(){
        try{
            $sort='id desc';
            !empty($this->getRequest()->get("page")) ? $page=$this->getRequest()->get("page") : $page=1;
            !empty($this->getRequest()->get("limit")) ? $limit=$this->getRequest()->get("limit") : $limit=10;
            
            $data=$this->m_news->getListByPage($limit,$page,$sort,$_POST['searchPhrase']);
            
            foreach ($data['data'] as $itemk =>$itemv){
                $list[$itemk]=quotes($itemv);
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
        $data=$this->m_news->getfiledById($this->getRequest()->get('id'));
        foreach ($data as $itemk =>$itemv){
            $list[$itemk]=quotes($itemv);
        }
        //echo "<pre>";
        //print_r($list);exit;
        $this->getView()->assign(array("msg"=>$list));
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
        
	    	$post['title']=filterStr($this->getRequest()->getpost('title'));
            $post['desc']=filterStr($this->getRequest()->getpost('desc'));
	    	$post['c_time']=date('Y-m-d H:i:s');
	    	$post['info']=$this->getRequest()->getpost('info');
	    	
	    	//print_r($_POST);exit;
            $res=$this->m_news->UpdateByID($post,$this->getRequest()->getpost('id'));
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
        
    }
    
    /**
     * Add new Userinfo
     */
    public function addinsertAction(){
        try{
            $post['title']=filterStr($this->getRequest()->getpost('title'));
            $post['desc']=filterStr($this->getRequest()->getpost('desc'));
	    	$post['c_time']=date('Y-m-d H:i:s');
	    	$post['info']=$this->getRequest()->getpost('info');
	    	
            $res=$this->m_news->Insert($post);
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
                $result = $this->m_news->Where("id in ({$this->getRequest()->getpost('id')})")->Delete();
            }else{
                $result = $this->m_news->Where("id in ({$this->getRequest()->getpost('id')})")->Delete();
            }
            
            !empty($result) || $result > 0 ? $result = 1 : $result = 0;
            //pr($result);
            Helper::response($result);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    
    /**
     * 上传图片
     */
    public function uploadAction(){
        $path='upload/news/';
        $up = new Upload($_FILES['file'], $path);
        $extpos = strrpos($_FILES['file']['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
        $ext = substr($_FILES['file']['name'],$extpos+1);
        $newFileName = md5(basename($_FILES['file']['name'],$ext)); //文件名
		
        $ret=$up->upload($newFileName);
        if($ret['code']===0){
            $img['code']=0;
            $img['msg']='success';
            $img['data']['src']='http://'.$_SERVER['HTTP_HOST'].'/'.$path.$ret['img'];
            $img['data']['title']='http://'.$_SERVER['HTTP_HOST'].'/'.$path.$ret['img'];
            Helper::response($img);
        }
    }
}
