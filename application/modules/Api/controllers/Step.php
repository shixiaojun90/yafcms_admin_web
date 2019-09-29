<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class StepController extends BasicController {
    private function init(){
        $this->m_step=$this->load('step');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
    }
    
    public function followAction(){
       try{
            if(is_object(json_decode(file_get_contents("php://input")))){
                $json=json_decode(file_get_contents("php://input"));
                $id=$json->id;
                $uid=$json->uid;
            }elseif($this->getRequest()->isPost()){
                //post请求
                $id=$this->getRequest()->getpost('id');
                $uid=$this->getRequest()->getpost('uid');
            }elseif($this->getRequest()->isGet()){
                //get请求
                $id=$this->getRequest()->get('id');
                $uid=$this->getRequest()->get('uid');
            }else{
                $msg="请输入正确的参数";
                Helper::response($msg);
            }
            
            
            $stepdata=$this->m_step->getfield($id,array('uid'));
            
            if(!empty($stepdata)){
                $resouce['code']=1002;
                $resouce['msg']="error";
                Helper::response($resouce);
            }
            
            $laud['uid']= $uid; //用户编号
            $laud['fid']= $topicdata['id']; //朋友圈话题编号
            $laud['c_time']= date("Y-m-d H:i:s");
            $resouce=$this->m_laud->Insert($laud);
                
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
}
