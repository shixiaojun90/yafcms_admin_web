<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class LaudController extends BasicController {
    private function init(){
        $this->m_laud=$this->load('laud');
        $this->m_friend=$this->load('friend');
        $this->m_imusers=$this->load('users');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
    }
    
    public function listAction(){
        try{
            if(is_object(json_decode(file_get_contents("php://input")))){
                $json=json_decode(file_get_contents("php://input"));
                $fid=$json->fid;
            }elseif($this->getRequest()->isPost()){
                //post请求
                $fid=$this->getRequest()->getpost('fid');
            }elseif($this->getRequest()->isGet()){
                //get请求
                $fid=$this->getRequest()->get('fid');
            }else{
                $msg="请输入正确的参数";
                Helper::response($msg);
            }
            
            
            $imlaudlist=$this->m_laud->getLaudList($fid);
            
            if(!empty($imlaudlist)){
                $imuserid='';
                foreach ($imlaudlist as $key => $value) {
                    //查找好友发布的朋友圈
                    $imuserid.="'{$value['userid']}'".",";
                }
                
                $friendid=substr($imuserid,0 ,-1);
                
                $userslist=$this->m_imusers->getselectByPage($friendid);
                
                if(!empty($userslist)){
                    $resouce['code']=0;
                    $resouce['message']='ok';
                    $resouce['data']=$userslist;
                }else{
                    $resouce['code']=1002;
                    $resouce['message']='没有数据';
                    $resouce['data']=array();
                }
            }else{
                $resouce['code']=1002;
                $resouce['message']='没有数据';
                $resouce['data']=array();
            }
            
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    public function followAction(){
       try{
            if(is_object(json_decode(file_get_contents("php://input")))){
                $json=json_decode(file_get_contents("php://input"));
                $id=$json->id;
                $uid=$json->userid;
            }elseif($this->getRequest()->isPost()){
                //post请求
                $id=$this->getRequest()->getpost('id');
                $uid=$this->getRequest()->getpost('userid');
            }elseif($this->getRequest()->isGet()){
                //get请求
                $id=$this->getRequest()->get('id');
                $uid=$this->getRequest()->get('userid');
            }else{
                $resouce['code']=1002;
                $resouce['message']="请输入正确的参数";
                Helper::response($resouce);
            }
            
            $friendres=$this->m_friend->getfield($id,array('id','desc','userid'));
            
            //if($friendres['userid'] == $uid){
            //    $resouce['code']=1002;
            //    $resouce['message']="不能给自己点赞";
            //    Helper::response($resouce);
            //}
            
            $lauddata=$this->m_laud->getByfield($uid,array('userid'));
            
            if(!empty($lauddata)){
                $resouce['code']=1002;
                $resouce['message']="您已经点过赞了";
                Helper::response($resouce);
            }
            
            $laud['userid']= $uid; //用户编号
            $laud['fid']= $id; //朋友圈话题编号
            $laud['c_time']= date("Y-m-d H:i:s");
            
            $laudbool=$this->m_laud->Insert($laud);
            if($laudbool){
                
                
                $resouce['code']=1;
                $resouce['message']="点赞成功";
                
            }else{
                $resouce['code']=1002;
                $resouce['message']="点赞失败";
            }
            
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    /**
     * Delete
     */
    public function deletelandAction(){
        try{
            $id=$this->getRequest()->getpost('id');
            $userid=$this->getRequest()->getpost('userid');
            $result = $this->m_laud->Conditions(" AND userid={$userid}")->Where("fid in ({$this->getRequest()->getpost('id')})")->Delete();
            
            !empty($result) || $result > 0 ? $result = 1 : $result = 0;
            //pr($result);
            Helper::response($result);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
}
