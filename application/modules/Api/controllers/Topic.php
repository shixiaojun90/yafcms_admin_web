<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class TopicController extends BasicController {
    private function init(){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        $this->m_topic=$this->load('topic');
        $this->m_topicgroup=$this->load('topicgroup');
    }
    
    
    public function groupnameAction(){
        try{
            
            $data=$this->m_topicgroup->getBylistgroupName();
            //print_r($data);exit;
            
            if(!empty($data)){
                $resouce['code']=1;
                $resouce['msg']='ok';
                $resouce['data']=$data;
            }else{
                $resouce['code']=1002;
                $resouce['msg']='error';
                $resouce['data']=array();
            }
            //print_r($list);exit;
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    public function listAction(){
        try{
            if(is_object(json_decode(file_get_contents("php://input")))){
                $json=json_decode(file_get_contents("php://input"));
                $userid=$json->userid;
                $gid=$json->gid;
                $page=$json->page;
                $limit=$json->limit;
            }elseif($this->getRequest()->isPost()){
                //post请求
                $userid=$this->getRequest()->getpost('userid');
                $gid=$this->getRequest()->getpost('gid');
                $page=$this->getRequest()->getpost('page');
                $limit=$this->getRequest()->getpost('limit');
            }elseif($this->getRequest()->isGet()){
                //get请求
                $userid=$this->getRequest()->get('userid');
                $gid=$this->getRequest()->get('gid');
                $page=$this->getRequest()->get('page');
                $limit=$this->getRequest()->get('limit');
            }else{
                $msg="请输入正确的参数";
                Helper::response($msg);
            }
            
            
            $sort='id desc';
            !empty($page) ? $page : $page=1;
            !empty($limit) ? $limit : $limit=10;
            
            //查询话题列表
            $data=$this->m_topic->Where(" userid={$userid}")->Conditions(" AND gid={$gid}")->getTopicListByPage($limit,$page,$sort,$this->getRequest()->get("searchPhrase"));
            
            $groupdata=$this->m_topicgroup->getByField($gid);
            
            foreach ($data['data'] as $key => $value) {
                if(!empty($value['fileurl'])){
                    $value['fileurl']=json_decode($value['fileurl'],true);
                }
                
                $list[$key]=quotes($value);
            }
            if(!empty($list)){
                $resouce['code']=1;
                $resouce['msg']='ok';
                $resouce['count']=$data['total'];
                $resouce['groupname']=$groupdata['groupname'];
                $resouce['data']=$list;
            }else{
                $resouce['code']=1002;
                $resouce['msg']='error';
                $resouce['data']=array();
            }
            //print_r($list);exit;
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    public function contentAction(){
       try{
            if(is_object(json_decode(file_get_contents("php://input")))){
                $json=json_decode(file_get_contents("php://input"));
                $id=$json->id;
                $userid=$json->userid;
            }elseif($this->getRequest()->isPost()){
                //post请求
                $id=$this->getRequest()->getpost('id');
                $userid=$this->getRequest()->getpost('userid');
            }elseif($this->getRequest()->isGet()){
                //get请求
                $id=$this->getRequest()->get('id');
                $userid=$this->getRequest()->get('userid');
            }else{
                $msg="请输入正确的参数";
                Helper::response($msg);
            }
            
            $data=$this->m_topic->Conditions(" AND userid={$userid}")->getfield($id,array('id','info','fileurl','c_time'));
            
            if(!empty($data)){
                $resouce['code']=1;
                $resouce['msg']='ok';
                $resouce['data']=$data;
            }else{
                $resouce['code']=1;
                $resouce['msg']='ok';
            }
            
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    
    public function topinsertAction(){
       try{
            if(is_object(json_decode(file_get_contents("php://input")))){
                $json=json_decode(file_get_contents("php://input"));
                $title=$json->title;
                $info=$json->info;
                $uid=$json->userid;
                $gid=$json->gid;
                $fileurl=$json->fileurl;
            }elseif($this->getRequest()->isPost()){
                //post请求
                $title=$this->getRequest()->getpost('title');
                $info=$this->getRequest()->getpost('info');
                $uid=$this->getRequest()->getpost('userid');
                $gid=$this->getRequest()->getpost('gid');
                $fileurl=$this->getRequest()->getpost('fileurl');
            }elseif($this->getRequest()->isGet()){
                //get请求
                $title=$this->getRequest()->get('title');
                $info=$this->getRequest()->get('info');
                $uid=$this->getRequest()->get('userid');
                $gid=$this->getRequest()->get('gid');
                $fileurl=$this->getRequest()->get('fileurl');
            }else{
                $msg="请输入正确的参数";
                Helper::response($msg);
            }
            
            $post['title']=filterStr($title);
            $post['info']=filterStr($info);
            $post['userid']=$uid;
            $post['gid']=$gid;
            $post['fileurl']=json_encode($fileurl);
            $post['c_time']=date("Y-m-d H:i:s");
            $res=$this->m_topic->Insert($post);
            if($res){
                $resouce['code']=1;
                $resouce['msg']='创建成功';
            }else{
                $resouce['code']=1002;
                $resouce['msg']='创建失败';
            }
            
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    /**
     * 上传图片
     */
    public function uploadimgAction(){
        try{
            if(is_object(json_decode(file_get_contents("php://input")))){
                $json=json_decode(file_get_contents("php://input"));
                $userid=$json->userid;
            }elseif($this->getRequest()->isPost()){
                $userid=$this->getRequest()->getpost('userid');
            }elseif($this->getRequest()->isGet()){
                $userid=$this->getRequest()->get('userid');
            }else{
                $msg="请输入正确的参数";
                Helper::response($msg);
            }
            
            $path="topic/{$userid}/";
            
            if(is_array($_FILES)){
                foreach($_FILES as $fkey => $fval){
                    $up = new Upload($fval, $path);
                    $extpos = strrpos($fval['name'],'.');//返回字符串filename中'.'号最后一次出现的数字位置
                    $ext = substr($fval['name'],$extpos+1);
                    $newFileName = md5(basename($fval['name'],$ext)); //文件名
                    
                    $reult=$up->upload($newFileName);
                    
                    $urllist='http://'.$_SERVER['HTTP_HOST'].'/'.$path.$reult['img'];
                    $resouce['code']=0;
                    $resouce['msg']="上传成功";
                    $resouce['imgurl'][]=$urllist;
                }
                //print_r($resouce);exit;
                Helper::response($resouce);
            }
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
                $result = $this->m_topic->DeleteByID($this->getRequest()->getpost('id'));
            }else{
                $result = $this->m_topic->Where("id in ({$this->getRequest()->getpost('id')})")->Delete();
            }
            
            if(!empty($result) || $result > 0){
                $resouce['code']=1;
                $resouce['msg']="已删除";
            }else{
                $resouce['code']=1002;
                $resouce['msg']="删除失败";
            }
            
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
}
