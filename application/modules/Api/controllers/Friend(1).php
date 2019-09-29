<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class FriendController extends BasicController {
    private function init(){
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        $this->m_imsfriend=$this->load('imsfriend');
        $this->m_imusers=$this->load('users');
        $this->m_common=$this->load('common');//回复评论
        $this->m_friend=$this->load('friend');//朋友圈发布的消息
        $this->m_laud=$this->load('laud');
    }
    
    public function listAction(){
        try{
            if(is_object(json_decode(file_get_contents("php://input")))){
                $json=json_decode(file_get_contents("php://input"));
                $userid=$json->userid;
            }elseif($this->getRequest()->isPost()){
                //post请求
                $userid=$this->getRequest()->getpost('userid');
            }elseif($this->getRequest()->isGet()){
                //get请求
                $userid=$this->getRequest()->get('userid');
            }else{
                $msg="请输入正确的参数";
                Helper::response($msg);
            }
            
            
            $imfriendlist=$this->m_imsfriend->getImusersList($userid);
            
            if(!empty($imfriendlist)){
                $friendid='';
                foreach ($imfriendlist as $key => $value) {
                    //查找好友发布的朋友圈
                    $friendid.="'{$value['friendid']}'".",";
                    
                }
            }
            
            $friendmsglist=$this->m_friend->getFriendList($friendid."{$userid}");
            
            if(!empty($friendmsglist)){
                foreach ($friendmsglist as $userk => $userv) {
                    //查找好友发布的朋友圈
                    //var_dump($userv['fileurl']);
                    $nickname=$this->m_imusers->getfiledById($userv['userid']);
                    //var_dump($userv);exit;
                    if(!empty($nickname)){
                        if(!empty($nickname['nickname'])){
                            $nickname['nickname']=$nickname['nickname'];
                        }else{
                            $nickname['nickname']=$nickname['username'];
                        }
                    }else{
                        $nickname['nickname']="";    
                    }
                    
                    if(!empty($nickname['pic'])){
                        $nickname['pic']=$nickname['pic'];
                    }else{
                        $nickname['pic']="";
                    }
                    if(!empty($userv['fileurl']) && is_array(json_decode($userv['fileurl'],true))){
                        foreach(json_decode($userv['fileurl'],true) as $key => $val){
                            if($userv['type']==1){
                                $img=execCommandLine($val);
                                
                                if(!empty($img)){
                                    $image_size = getimagesize($img['host']);
                                    $fileurl[$key]['witch']=$image_size[1];
                                    $fileurl[$key]['height']=$image_size[0];
                                    $fileurl[$key]['img']=$img['host'];
                                    $fileurl[$key]['video']=$val;
                                }
                            }else{
                                $image_size = getimagesize($val);
                                $fileurl[$key]['witch']=$image_size[1];
                                $fileurl[$key]['height']=$image_size[0];
                                $fileurl[$key]['img']=$val;
                            }
                        }
                    }else{
                        $fileurl=array();
                    }
                    
                    /*****查找是否为好友点赞****/
                    $friendlaud=$this->m_laud->Conditions(" AND fid={$userv['id']}")->getByfield($userid);
                    if(!empty($friendlaud)){
                        $userv['ischecked']="ok";
                    }else{
                        $userv['ischecked']="error";
                    }
                    
                    
                    $coommon=$this->commlistAction($userv);
                    if(empty($coommon)){
                        $userv['common']=array();
                    }else{
                        $userv['common']=$coommon;
                    }
                    
                    $landinfo=$this->landlistAction($userv);
                    if(empty($landinfo)){
                        $userv['landuser']=array();
                    }else{
                        $userv['landuser']=$landinfo;
                    }
                    
                    $userv['fileurl']=$fileurl;
                    $friendmsglist[$userk]=$userv;
                    $friendmsglist[$userk]['nickname']=$nickname['nickname'];
                    $friendmsglist[$userk]['pic']=$nickname['pic'];
                    
                }
                
                
                //print_r($coommon);exit;
                $resouce['code']=1;
                $resouce['message']='ok';
                $resouce['data']=$friendmsglist;
            }else{
                $resouce['code']=1002;
                $resouce['message']='error';
                $resouce['data']=array();
            }
            
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    /**********回复评论**************/
    public function commlistAction($userinfo){
        try{
            $list=$this->m_common->getCommonList($userinfo['id']);
            $data=$this->gettreeAction($list);
            
            return $data;
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    public function gettreeAction($volist,$nan=0) {
        //print_r($volist);
    	$arr=array();
    	foreach($volist as $val) {
    		if ($val['pid'] == $nan) {
    			$userid=$this->m_imusers->getfiledById($val['userid']);
    			$friendtree=$this->m_imusers->getfiledById($val['friendid']);
    			if($val['pid']==0){
    			    $val['friend_nickname']="";
    			}else{
    			    $val['friend_nickname']=$friendtree['username'];
    			}
    			
    			//if($val['userid']==$val['friendid']){
    			//   $val['common']=$userid['username'].'回复了自己'; 
    			//}else{
    			//   $val['common']=$friendid['username'].'回复了'.$userid['username']; 
    			//}
    			
    			$arr[] = $val;
    			$arr = array_merge($arr,$this->gettreeAction($volist,$val['id']));
    		}
    	}
    	
    	return $arr;
    }
    
    public function landlistAction($userinfo){
        try{
            
            $imlaudlist=$this->m_laud->getLaudList($userinfo['id']);
            
            if(!empty($imlaudlist)){
                $imuserid='';
                foreach ($imlaudlist as $key => $value) {
                    //查找好友发布的朋友圈
                    $imuserid.="'{$value['userid']}'".",";
                }
                
                $friendlanduserid=substr($imuserid,0 ,-1);
                
                $userslist=$this->m_imusers->getselectByPage($friendlanduserid);
                
                if(!empty($userslist)){
                    foreach($userslist as $key => $val){
                        if(!empty($val['nickname'])){
                            $landinfo[$key]['nickname']=$val['nickname'];
                            $landinfo[$key]['userid']=$val['userid'];
                        }else{
                            $landinfo[$key]['nickname']=$val['username'];
                            $landinfo[$key]['userid']=""; 
                        }
                    }
                }else{
                    $landinfo[$key]['username']="";
                    $landinfo[$key]['userid']=""; 
                }
            }
            
            return $landinfo;
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    
    public function topinsertAction(){
       try{
            if(is_object(json_decode(file_get_contents("php://input")))){
                $json=json_decode(file_get_contents("php://input"));
                $uid=$json->userid;
                $desc=$json->desc;
                $fileurl=$json->fileurl;
                $type=$json->type;
            }elseif($this->getRequest()->isPost()){
                //post请求
                $uid=$this->getRequest()->getpost('userid');
                $desc=$this->getRequest()->getpost('desc');
                $fileurl=$this->getRequest()->getpost('fileurl');
                $type=$this->getRequest()->getpost('type');
            }elseif($this->getRequest()->isGet()){
                //get请求
                $uid=$this->getRequest()->get('userid');
                $desc=$this->getRequest()->get('desc');
                $fileurl=$this->getRequest()->get('fileurl');
                $type=$this->getRequest()->get('type');
            }else{
                $msg="请输入正确的参数";
                Helper::response($msg);
            }
            
            if(!empty($fileurl)){
                $post['fileurl']=json_encode(explode(',',$fileurl));
            }
            
            $post['desc']=filterStr($desc);
            $post['userid']=$uid;
            $post['type']=$type;
            $post['c_time']=date("Y-m-d H:i:s");
            $post['ip']=getClientIP();
            
            $res=$this->m_friend->Insert($post);
            if($res > 0){
                $resouce['code']=1;
                $resouce['message']='ok';
            }else{
                $resouce['code']=1002;
                $resouce['message']='没有数据';
            }
            
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    /*public function uploadimgAction(){
        try{
            $p=fopen('1.txt','a+b');
            fwrite($p,print_r($_FILES,true));
            fclose($p);
            print_r($_FILES);exit;
            
            Helper::response('0');
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }*/
    
    /**
     * 上传图片
     */
    public function uploadimgAction(){
        try{
            if(is_object(json_decode(file_get_contents("php://input")))){
                $json=json_decode(file_get_contents("php://input"));
                $type=$json->type;
            }elseif($this->getRequest()->isPost()){
                $type=$this->getRequest()->getpost('type');
            }elseif($this->getRequest()->isGet()){
                $type=$this->getRequest()->get('type');
            }else{
                $msg="请输入正确的参数";
                Helper::response($msg);
            }
            
            $type == 0 ? $file='file' : $file='video';
            $path="upload/{$file}/";
            
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
    public function deletedescAction(){
        try{
            $id=$this->getRequest()->getpost('id');
            if(is_numeric($id)){
                $result = $this->m_friend->DeleteByID($this->getRequest()->getpost('id'));
            }else{
                $result = $this->m_friend->Where("id in ({$this->getRequest()->getpost('id')})")->Delete();
            }
            
            !empty($result) || $result > 0 ? $result = 1 : $result = 0;
            //pr($result);
            Helper::response($result);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    public function deleteimgAction(){
        try{
            $url=$this->getRequest()->getpost('url');
            unlink($url);
            $resouce['code']=0;
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
}
