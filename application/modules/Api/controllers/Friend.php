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
        set_time_limit(0);
        ini_set("memory_limit","64M");
        try{
            if(is_object(json_decode(file_get_contents("php://input")))){
                $json=json_decode(file_get_contents("php://input"));
                $userid=$json->userid;
                $page=$json->page;
                $limit=$json->limit;
            }elseif($this->getRequest()->isPost()){
                //post请求
                $userid=$this->getRequest()->getpost('userid');
                $page=$this->getRequest()->getpost('page');
                $limit=$this->getRequest()->getpost('limit');
            }elseif($this->getRequest()->isGet()){
                //get请求
                $userid=$this->getRequest()->get('userid');
                $page=$this->getRequest()->get('page');
                $limit=$this->getRequest()->get('limit');
            }else{
                $msg="请输入正确的参数";
                Helper::response($msg);
            }
            
            $friendsort="userid desc";
            $imfriendlist=$this->m_imsfriend->Where(" userid = {$userid}")->getListByPage($limit,$page,$friendsort,$this->getRequest()->get("searchPhrase"));
            
            if(!empty($imfriendlist)){
                $friendid='';
                foreach ($imfriendlist['data'] as $key => $value) {
                    //查找好友发布的朋友圈
                    $friendid.="'{$value['friendid']}'".",";
                    
                }
            }
            if(!empty($friendid)){
                $in=$friendid.$userid;
            }else{
                $in=$userid;
            }
            
            $msgsort="c_time desc";
            $friendmsglist=$this->m_friend->Where(" userid = in({$in})")->admingetListByPage($limit,$page,$msgsort,$this->getRequest()->get("searchPhrase"));
            
            if(!empty($friendmsglist['data'])){
                foreach ($friendmsglist['data'] as $userk => $userv) {
                    //查找好友发布的朋友圈
                    //var_dump($userv['fileurl']);
                    $nickname=$this->m_imusers->getfiledById($userv['userid']);
                    //var_dump($userv);exit;
                    //if(!empty($nickname)){
                        if(!empty($nickname['nickname'])){
                            $nickname['nickname']=$nickname['nickname'];
                        }else{
                            $nickname['nickname']=$nickname['username'];
                        }
                    //}else{
                    //    $nickname['nickname']="";    
                    //}
                    
                    if(!empty($nickname['pic'])){
                        $nickname['pic']=$nickname['pic'];
                    }else{
                        $nickname['pic']="";
                    }
                    
                    if(!empty($userv['fileurl']) && is_array(json_decode($userv['fileurl'],true))){
                        $fileurl=json_decode($userv['fileurl'],true);
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
                    
                    
                    $coommon=$this->commlistAction($userv['id']);
                    if(empty($coommon)){
                        $userv['common']=array();
                    }else{
                        $userv['common']=$coommon;
                    }
                    
                    $landinfo=$this->landlistAction($userv['id']);
                    if(empty($landinfo)){
                        $userv['landuser']=array();
                    }else{
                        $userv['landuser']=$landinfo;
                    }
                    
                    $userv['fileurl']=$fileurl;
                    $userv['desc']=userTextDecode($userv['desc']);
                    $friendmsg_list[$userk]=$userv;
                    $friendmsg_list[$userk]['nickname']=$nickname['nickname'];
                    $friendmsg_list[$userk]['pic']=$nickname['pic'];
                    
                }
                
                
                //print_r($coommon);exit;
                $resouce['code']=1;
                $resouce['message']='ok';
                $resouce['total']=$friendmsglist['total'];
                $resouce['data']=$friendmsg_list;
            }else{
                $resouce['code']=1;
                $resouce['message']='error';
                $resouce['data']=array();
            }
            
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    /**********回复评论**************/
    public function commlistAction($id){
        try{
            $list=$this->m_common->getCommonList($id);
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
    			$userfriend=$this->m_imusers->getfiledById($val['userid']);//对象用户自己的编号
    			$friendtree=$this->m_imusers->getfiledById($val['friendid']);//好友的编号
    			if(!empty($friendtree['nickname'])){
    			    $friendnickname=$friendtree['nickname'];
    			}else{
    			    $friendnickname=$friendtree['username'];
    			}
    			
    			if(!empty($userfriend['nickname'])){
    			    $userfriendnickname=$userfriend['nickname'];
    			}else{
    			    $userfriendnickname=$userfriend['username'];
    			}
    			
    			if($val['userid']==$val['friendid']){
    			    $val['nickname']="";
    			    $val['friend_nickname']="";
    			}else{
    			    $val['nickname']=$userfriendnickname;
    			    $val['friend_nickname']=$friendnickname;
    			}
    			
    			$arr[] = $val;
    			$arr = array_merge($arr,$this->gettreeAction($volist,$val['id']));
    		}
    	}
    	
    	return $arr;
    }
    
    public function landlistAction($id){
        try{
            
            $imlaudlist=$this->m_laud->getLaudList($id);
            
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
                $imglist=explode(',',$fileurl);
                
                if(is_array($imglist)){
                    if($type==1){
                        foreach($imglist as $imgk => $imgv){
                            $img=execCommandLine($imgv);
                            if(!empty($img)){
                                $image_size = getimagesize($img['host']);
                                $filelist[$imgk]['witch']=$image_size[0];
                                $filelist[$imgk]['height']=$image_size[1];
                                $filelist[$imgk]['img']=$img['host'];
                                $filelist[$imgk]['video']=$imgv;
                            }
                        }
                    }else{
                        foreach($imglist as $imgk => $imgv){
                            $pathParts = pathinfo($imgv);
                            $pathurl=$_SERVER['DOCUMENT_ROOT']."/upload/friend/".$pathParts['basename'];
                            $image_size = getimagesize($pathurl);
                            $filelist[$imgk]['witch']=$image_size[0];
                            $filelist[$imgk]['height']=$image_size[1];
                            $filelist[$imgk]['img']=$imgv;
                        }
                    }
                    
                }else{
                    if($type==1){
                        $img=execCommandLine($fileurl);
                        if(!empty($img)){
                            $image_size = getimagesize($img['host']);
                            $filelist[]['witch']=$image_size[0];
                            $filelist[]['height']=$image_size[1];
                            $filelist[]['img']=$img['host'];
                            $filelist[]['video']=$fileurl;
                        }
                    }else{
                        $pathParts = pathinfo($fileurl);
                        $pathurl=$_SERVER['DOCUMENT_ROOT']."/upload/friend/".$pathParts['basename'];
                        $image_size = getimagesize($pathurl);
                        $filelist[]['witch']=$image_size[0];
                        $filelist[]['height']=$image_size[1];
                        $filelist[]['img']=$fileurl;
                    }
                }
                
                $post['fileurl']=json_encode($filelist);
            }
            
            
            $post['desc']=userTextEncode(stripHTML($desc));
            $post['userid']=$uid;
            $post['type']=$type;
            $post['c_time']=date("Y-m-d H:i:s");
            $post['ip']=getClientIP();
            
            //print_r($post);exit;
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
            
            $type == 0 ? $file='friend' : $file='video';
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
