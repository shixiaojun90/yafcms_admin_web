<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class UplodefileController extends BasicController {
    private function init(){
        $this->m_cloud=$this->load('cloud');
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
    }
    
    /**
     * 上传图片
     */
    public function uplodefileAction(){
        if(is_object(json_decode(file_get_contents("php://input")))){
            $json=json_decode(file_get_contents("php://input"));
            $userid=$json->userid;
            $mid=$json->mid;
            $sharetype=$json->sharetype;
            $fileName=$json->fileName;
            $totalSize=$json->totalSize;
            $isLastChunk=$json->isLastChunk;
            $isFirstUpload=$json->isFirstUpload;
        }elseif($this->getRequest()->isPost()){
            //post请求
            $userid=$this->getRequest()->getpost('userid');
            $mid=$this->getRequest()->getpost('mid');
            $sharetype=$this->getRequest()->getpost('sharetype');
            $fileName=$this->getRequest()->getpost('fileName');
            $totalSize=$this->getRequest()->getpost('totalSize');
            $isLastChunk=$this->getRequest()->getpost('isLastChunk');
            $isFirstUpload=$this->getRequest()->getpost('isFirstUpload');
        }elseif($this->getRequest()->isGet()){
            //get请求
            $mid=$this->getRequest()->get('mid');
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
        
        //$userid=551255;
        //$mid=60;
        if(!empty($mid) || $mid > 0){
            $dirpath=$this->m_cloud->getdirname($mid,'path');
            $path=$dirpath['path'].'/';
        }else{
            $path='cloud/';
        }
        
        
        $up = new Upload($_FILES['file0'], $path);
        
        $status=$up->Bruplode($fileName,$totalSize,$isLastChunk,$isFirstUpload);
        
        
        if(filesize($path.$_REQUEST['fileName']) == $totalSize){
            $post['userid']=$userid;
            $post['pid']=$mid;
            $post['ext']=pathinfo($_REQUEST['fileName'])['extension'];
            $post['path']=$path.$_REQUEST['fileName'];
            $post['filename']=$fileName;
            $post['c_time']=date("Y-m-d H:i:s");
            
            $res=$this->m_cloud->Insert($post);
            if($res){
                echo json_encode(array(
                	'status' => $status,
                	'totalSize' => filesize($path.$_REQUEST['fileName']),
                	'isLastChunk' => $isLastChunk,
                	'message' => 'ok',
                	'fileurl' => 'http://'.$_SERVER['HTTP_HOST'].'/'.$post['path'],
                	'fileName' => $_REQUEST['fileName']
                ));
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
