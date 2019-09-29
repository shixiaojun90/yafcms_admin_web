<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午11:10
 */
class IndexController extends BasicController {
    private function init(){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        $this->m_clouddir=$this->load('cloud');
    }

    public function indexAction(){
       
    }
    
    
    /**
     * 上传图片
     */
    public function uplodefileAction(){
        if(is_object(json_decode(file_get_contents("php://input")))){
            $json=json_decode(file_get_contents("php://input"));
            $userid=$json->userid;
            $cid=$json->cid;
            $sharetype=$json->sharetype;
            $fileName=$json->fileName;
            $totalSize=$json->totalSize;
            $isLastChunk=$json->isLastChunk;
            $isFirstUpload=$json->isFirstUpload;
        }elseif($this->getRequest()->isPost()){
            //post请求
            $userid=$this->getRequest()->getpost('userid');
            $cid=$this->getRequest()->getpost('cid');
            $sharetype=$this->getRequest()->getpost('sharetype');
            $fileName=$this->getRequest()->getpost('fileName');
            $totalSize=$this->getRequest()->getpost('totalSize');
            $isLastChunk=$this->getRequest()->getpost('isLastChunk');
            $isFirstUpload=$this->getRequest()->getpost('isFirstUpload');
        }elseif($this->getRequest()->isGet()){
            //get请求
            $cid=$this->getRequest()->get('cid');
            $userid=$this->getRequest()->get('userid');
            $sharetype=$this->getRequest()->get('sharetype');
            $fileName=$this->getRequest()->get('fileName');
            $totalSize=$this->getRequest()->get('totalSize');
            $isLastChunk=$this->getRequest()->get('isLastChunk');
            $isFirstUpload=$this->getRequest()->get('isFirstUpload');
        }else{
            $msg="请输入正确的参数";
            Helper::response($msg);
        }
        
        !empty($userid) ? $userid : $userid=551255;
        !empty($cid) ? $cid : $cid=5;
        $dirpath=$this->m_cloud->getdirname($cid,'path');
        $path='cloud/'.$dirpath['path'].'/';
        $up = new Upload($_FILES['theFile'], $path);
        
        $status=$up->Bruplode($fileName,$totalSize,$isLastChunk,$isFirstUpload);
        
        /*echo json_encode(array(
        	'status' => $status,
        	'totalSize' => filesize($path.$_REQUEST['fileName']),
        	'isLastChunk' => $isLastChunk,
        ));*/
        
        
        if(filesize($path.$_REQUEST['fileName']) == $totalSize){
            $post['userid']=$userid;
            $post['pid']=$cid;
            $post['ext']='jpeg';
            $post['fileurl']='http://'.$_SERVER['HTTP_HOST'].'/'.$path.$_REQUEST['fileName'];
            $post['c_time']=date("Y-m-d H:i:s");
            
            $res=$this->m_cloud->Insert($post);
            if($res){
                /*echo json_encode(array(
                	'status' => $status,
                	'totalSize' => filesize($path.$_REQUEST['fileName']),
                	'isLastChunk' => $isLastChunk,
                ));*/
                $resouce['status']=$status;
                $resouce['totalSize']=filesize($path.$_REQUEST['fileName']);
                $resouce['isLastChunk']=$isLastChunk;
                $resouce['message']='上传成功';
                $resouce['fileurl']=$post['fileurl'];
                Helper::response($resouce);
            }else{
                $resouce['status']=0;
                $resouce['message']='上传失败';
                Helper::response($resouce);
            }
        }else{
            echo json_encode(array(
            	'status' => $status,
            	'totalSize' => filesize($path.$_REQUEST['fileName']),
            	'isLastChunk' => $isLastChunk,
            ));
        }
        Yaf_Dispatcher::getInstance()->autoRender(false);
    }
}
