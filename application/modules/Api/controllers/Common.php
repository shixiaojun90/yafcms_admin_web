<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class CommonController extends BasicController {
    private function init(){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        $this->m_common=$this->load('common');
        $this->m_imusers=$this->load('users');
        $this->m_friend=$this->load('friend');//朋友圈发布的消息
    }
    
    public function tabPageAction(){
        try{
            if(is_object(json_decode(file_get_contents("php://input")))){
                $json=json_decode(file_get_contents("php://input"));
                $page=$json->page;
                $limit=$json->limit;
            }elseif($this->getRequest()->isPost()){
                //post请求
                $page=$this->getRequest()->getpost('page');
                $limit=$this->getRequest()->getpost('limit');
            }elseif($this->getRequest()->isGet()){
                //get请求
                $page=$this->getRequest()->get('page');
                $limit=$this->getRequest()->get('limit');
            }else{
                $msg="请输入正确的参数";
                Helper::response($msg);
            }
            
            $sort='id desc';
            !empty($page) ? $page : $page=1;
            !empty($limit) ? $limit : $limit=10;
            
            $data=$this->m_common->getCommicListByPage($limit,$page,$sort,$this->getRequest()->get("searchPhrase"));
            
            foreach ($data['data'] as $key => $value) {
                !empty($value['nickname']) ? $value['nickname'] : $value['nickname']="";
                $list[$key]=quotes($value);
            }
            if(!empty($list)){
                $resouce['code']=1;
                $resouce['msg']='ok';
                $resouce['count']=$data['total'];
                $resouce['data']=$list;
            }else{
                $resouce['code']=1002;
                $resouce['msg']='error';
                $resouce['data']=array();
            }
            
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    
    
    public function comminsertAction(){
       try{
            if(is_object(json_decode(file_get_contents("php://input")))){
                $json=json_decode(file_get_contents("php://input"));
                $fid=$json->fid;
                $uid=$json->userid;
                $objid=$json->objid;
                $pid=$json->pid;
                $desc=$json->desc;
            }elseif($this->getRequest()->isPost()){
                //post请求
                $fid=$this->getRequest()->getpost('fid');//回复的内容编号
                $uid=$this->getRequest()->getpost('userid');//用户的编号
                $objid=$this->getRequest()->getpost('objid');//对象用户的编号
                $pid=$this->getRequest()->getpost('pid');//回复上级的编号
                $desc=$this->getRequest()->getpost('desc');//描述
            }elseif($this->getRequest()->isGet()){
                //get请求
                $fid=$this->getRequest()->get('fid');
                $uid=$this->getRequest()->get('userid');
                $objid=$this->getRequest()->get('objid');//对象用户的编号
                $pid=$this->getRequest()->get('pid');
                $desc=$this->getRequest()->get('desc');
            }else{
                $msg="请输入正确的参数";
                Helper::response($msg);
            }
            
            /********
            fid发布朋友圈话题编号、pid用户评论内容上级编号
            **********/
            $user_id=$this->m_friend->getfield($fid,array("userid"));
            $userinfo=$this->m_imusers->getfiledById($user_id['userid']);
            
            $post['fid']=$fid;
            $post['userid']=$objid;
            $post['nickname']=$userinfo['nickname'];
            $post['friendid']=$uid;
            $post['pid']=$pid;
            $post['desc']=filterStr($desc);
            $post['c_time']=date("Y-m-d H:i:s");
            
            $commbool=$this->m_common->Insert($post);
            if($commbool){
                $desc=$this->m_common->getfield($commbool,"*");
                $resouce['code']=1;
                $resouce['message']="评论成功";
                $friendinfo=$this->m_imusers->getfiledById($desc['friendid']);//发布评论用户信息
                $usercomminfo=$this->m_imusers->getfiledById($friendinfo['userid']);//发布评论用户信息
                if(!empty($friendinfo)){
                    if(!empty($friendinfo['nickname'])){
                        $list['friend_nickname']=$friendinfo['nickname'];
                    }else{
                        if($post['pid']==0 || empty($post['pid'])){
                            $list['friend_nickname']="";
                        }else{
                            $list['friend_nickname']=$friendinfo['username'];
                        }
                        
                    }
                }else{
                    $list['nickname']="";
                }
                
                if(!empty($usercomminfo)){
                    if(!empty($usercomminfo['nickname'])){
                        $list['nickname']=$usercomminfo['nickname'];
                    }else{
                        $list['nickname']=$usercomminfo['username'];
                    }
                }else{
                    $list['nickname']="";
                }
                
                $list['userid']=$usercomminfo['userid'];
                $list['friendid']=$friendinfo['userid'];
                $list['pid']=$desc['pid'];
                $list['desc']=$desc['desc'];
                $resouce['data']=$list;
            }
            
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
}
