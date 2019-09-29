<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class TopicdirController extends BasicController {
    private function init(){
        $this->m_topicdir=$this->load('topicdir');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
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
            
            $data=$this->m_topicdir->getTopicdirListByPage($limit,$page,$sort,$this->getRequest()->get("searchPhrase"));
            
            foreach ($data['data'] as $key => $value) {
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
    
    
    public function readdirAction(){
       try{
            $dir=get_filenamesbydir("Topic");
            print_r($dir);exit;
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
}
