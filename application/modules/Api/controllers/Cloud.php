<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class CloudController extends BasicController {
    private function init(){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        $this->m_clouddir=$this->load('cloud');
    }
    
    public function listAction(){
        try{
            if(is_object(json_decode(file_get_contents("php://input")))){
                $json=json_decode(file_get_contents("php://input"));
                $page=$json->page;
                $limit=$json->limit;
                $userid=$json->userid;
            }elseif($this->getRequest()->isPost()){
                //post请求
                $page=$this->getRequest()->getpost('page');
                $limit=$this->getRequest()->getpost('limit');
                $userid=$this->getRequest()->getpost('userid');
            }elseif($this->getRequest()->isGet()){
                //get请求
                $page=$this->getRequest()->get('page');
                $limit=$this->getRequest()->get('limit');
                $userid=$this->getRequest()->get('userid');
            }else{
                $msg="请输入正确的参数";
                Helper::response($msg);
            }
            
            $sort='id asc';
            !empty($page) ? $page : $page=1;
            !empty($limit) ? $limit : $limit=10;
            
            $data=$this->m_clouddir->Where(" userid ={$userid}")->getcloudListByPage($limit,$page,$sort,$this->getRequest()->get("searchPhrase"));
            
            foreach ($data['data'] as $key => $value) {
                if(is_dir($value['path'])){
                    $value['type']="dir";
                }else{
                    $value['type']="file";
                }
                $value['path']='http://'.$_SERVER['HTTP_HOST'].'/'.$value['path'];
                !empty($value['filename']) ? $value['filename'] : $value['filename']="";
                
                $list[$key]=quotes($value);
            }
            
            if(!empty($list)){
                $resouce['code']=1;
                $resouce['msg']='ok';
                $resouce['count']=$data['total'];
                $resouce['data']=$list;
            }else{
                $resouce['code']=1;
                $resouce['msg']='error';
                $resouce['data']=array();
            }
            
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    public function getdirinfoAction(){
        try{
            if(is_object(json_decode(file_get_contents("php://input")))){
                $json=json_decode(file_get_contents("php://input"));
                $page=$json->page;
                $limit=$json->limit;
                $userid=$json->userid;
                $id=$json->id;
            }elseif($this->getRequest()->isPost()){
                //post请求
                $page=$this->getRequest()->getpost('page');
                $limit=$this->getRequest()->getpost('limit');
                $userid=$this->getRequest()->getpost('userid');
                $id=$this->getRequest()->getpost('id');
            }elseif($this->getRequest()->isGet()){
                //get请求
                $page=$this->getRequest()->get('page');
                $limit=$this->getRequest()->get('limit');
                $userid=$this->getRequest()->get('userid');
                $id=$this->getRequest()->get('id');
            }else{
                $msg="请输入正确的参数";
                Helper::response($msg);
            }
            
            $sort='id desc';
            !empty($page) ? $page : $page=1;
            !empty($limit) ? $limit : $limit=10;
            
            $data=$this->m_clouddir->Conditions(" AND pid={$id}")->Where(" userid ={$userid}")->getcloudListByPage($limit,$page,$sort,$this->getRequest()->get("searchPhrase"));
            
            foreach ($data['data'] as $key => $value) {
                //$pathinfo=pathinfo($value['fileurl']);
                $filedir=$_SERVER['DOCUMENT_ROOT'].'/'.$value['path'];
                //print_r($_SERVER['DOCUMENT_ROOT']);exit;
                if(is_dir($filedir)){
                    $value['type']="dir";
                }else{
                    $value['type']="file";
                }
                
                !empty($value['filename']) ? $value['filename'] : $value['filename']="";
                
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
    
    /*********创建文件***********/
    public function opendirAction(){
       try{
            if(is_object(json_decode(file_get_contents("php://input")))){
                $json=json_decode(file_get_contents("php://input"));
                $uid=$json->userid;
                $pid=$json->pid;
                $filename=$json->filename;
            }elseif($this->getRequest()->isPost()){
                //post请求
                $uid=$this->getRequest()->getpost('userid');
                $pid=$this->getRequest()->getpost('pid');
                $filename=$this->getRequest()->getpost('filename');
            }elseif($this->getRequest()->isGet()){
                //get请求
                $uid=$this->getRequest()->get('userid');
                $pid=$this->getRequest()->get('pid');
                $filename=$this->getRequest()->get('filename');
            }else{
                $msg="请输入正确的参数";
                Helper::response($msg);
            }
            
            
            if(!empty($pid) || $pid > 0){
                $dirinfo=$this->m_clouddir->getdirname($pid,array('path','filename'));
                if(!empty($dirinfo['path'])){
                    $dirpath=date('YmdHis');
                    $path=$dirinfo['path'].'/'.$dirpath;
                }
                //print_r($path);exit;
            }else{
                $dirpath=date('YmdHis');
                $path="cloud/{$uid}/{$dirpath}";
            }
            
            $dirbool=createRDir($path);
            
            if($dirbool){
                $post['filename']=$filename;
                $post['path']=$path;
                $post['userid']=$uid;
                $post['pid']=$pid;
                $post['c_time']=date("Y-m-d H:i:s");
                
                $res=$this->m_clouddir->Insert($post);
                
                if($res){
                    $resouce['code']=1;
                    $resouce['msg']='ok';
                    $resouce['filename']=$filename;
                    $resouce['dirurl']='http://'.$_SERVER['HTTP_HOST'].'/'.$path;
                }else{
                    $resouce['code']=1002;
                    $resouce['msg']='error';
                    $resouce['dirurl']='';
                }
            }else{
                $resouce['code']=1002;
                $resouce['msg']='error';
            }
            
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    
    /*********文件重命名***********/
    public function dirrenameAction(){
       try{
            if(is_object(json_decode(file_get_contents("php://input")))){
                $json=json_decode(file_get_contents("php://input"));
                $uid=$json->userid;//用户编号
                $id=$json->id;//目录编号
                $filename=$json->filename;//文件名称
            }elseif($this->getRequest()->isPost()){
                //post请求
                $uid=$this->getRequest()->getpost('userid');
                $id=$this->getRequest()->getpost('id');
                $filename=$this->getRequest()->getpost('filename');
            }elseif($this->getRequest()->isGet()){
                //get请求
                $uid=$this->getRequest()->get('userid');
                $id=$this->getRequest()->get('id');
                $filename=$this->getRequest()->get('filename');
            }else{
                $msg="请输入正确的参数";
                Helper::response($msg);
            }
            
            $dirinfo=$this->m_clouddir->getdirname($id,array('path','filename'));
            if(!empty($dirinfo['path'])){
                $post['filename']=$filename;
                $res=$this->m_clouddir->Conditions(" AND userid={$uid}")->updateAdmin($post,$id);
            }
            
            if($res){
                $resouce['code']=1;
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
    
    /*********文件移动***********/
    /*public function dircopyAction(){
       try{
            if(is_object(json_decode(file_get_contents("php://input")))){
                $json=json_decode(file_get_contents("php://input"));
                $uid=$json->userid;//用户编号
                $id=$json->id;//原目录编号
                $pid=$json->pid;//文件名称
            }elseif($this->getRequest()->isPost()){
                //post请求
                $uid=$this->getRequest()->getpost('userid');
                $id=$this->getRequest()->getpost('id');
                $pid=$this->getRequest()->getpost('pid');
            }elseif($this->getRequest()->isGet()){
                //get请求
                $uid=$this->getRequest()->get('userid');
                $id=$this->getRequest()->get('id');
                $pid=$this->getRequest()->get('pid');
            }else{
                $msg="请输入正确的参数";
                Helper::response($msg);
            }
            
            $primary=$this->m_clouddir->getdirname($id,array('path','filename'));//查询原文件地址
            $target=$this->m_clouddir->getdirname($pid,array('path','filename'));//查询目标文件地址
            
            if(!empty($primary['path']) && !empty($target['path'])){
                if(file_exists($primary['path'])){
                    $child=0;     
                }elseif(is_dir($primary['path'])){
                    $child=1;
                }else{
                    $resouce['code']=1002;
                    $resouce['msg']='请输入正确的参数';
                    Helper::response($resouce);
                }
                
                $document=$_SERVER["DOCUMENT_ROOT"];
                
                $copy=xCopy($document.'/'.$primary['path'],$document.'/'.$target['path'],$child);
                
                if($copy){
                    $post['pid']=$pid;
                    $res=$this->m_clouddir->Conditions(" AND userid={$uid}")->updateAdmin($post,$id);
                }
                
            }else{
                $resouce['code']=1002;
                $resouce['msg']='目录或文件不存在';
                Helper::response($resouce);
            }
            
            if($res){
                $resouce['code']=1;
                $resouce['msg']='修改成功';
            }else{
                $resouce['code']=1002;
                $resouce['msg']='修改失败';
            }
            
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }*/
    
    /**
     * 递归查询Delete
     */
    public function gettreecloudAction($volist,$uid,$clpid=0){
        try{
            /*******查询数据然后删除文件*******/
            
            $arr=array();
            foreach($volist as $volistk => $volistv){
                $list=$this->m_clouddir->Conditions(" AND userid={$volistv['userid']}")->getparentByList($clpid);
            }
            //print_r($list);
            if(!empty($list)){
                foreach($list as $listk => $listv){
                    if(!empty($listv)){
                        if($listv['pid']==$clpid){
                            $arr[] = $listv;
                            $arr = array_merge($arr,$this->gettreecloudAction($list,$listv['userid'],$listv['id']));
                        }
                    }
                }
            }else{
                $arr=$volist;
            }
            
            return $arr;
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
            $uid=$this->getRequest()->getpost('userid');
            
            $cloudinfo[]=$this->m_clouddir->Conditions(" AND userid={$uid}")->getdirname($id,array('id','path','filename','pid','userid'));
            if(!empty($cloudinfo)){
                $clouddata=$this->gettreecloudAction($cloudinfo,$uid,$cloudinfo[0]['id']);
            }
            //exit;
            //print_r(array_unique($clouddata));exit;
            $strid='';
            if(!empty($clouddata) && is_array(array_merge($cloudinfo,$clouddata))){
                foreach(array_merge($cloudinfo,$clouddata) as $delk => $delv){
                    
                    $strid.="'{$delv['id']}',";
                }
            }
            $delstrid=substr($strid, 0, -1);
            
            if(is_numeric($delstrid)){
                $result = $this->m_clouddir->Conditions(" AND userid={$uid}")->DeleteByID($delstrid);
            }else{
                $result = $this->m_clouddir->Conditions(" AND userid={$uid}")->Where("id in ({$delstrid})")->Delete();
            }
            
            if(!empty($result) || $result > 0){
                $resouce['code']=1;
                $resouce['msg']='已删除';
                
                if(!empty($clouddata)){
                    foreach(array_merge($cloudinfo,$clouddata) as $delmk => $delmv){
                        if(!empty($delmv['path'])){
                            $deldocument=$_SERVER['DOCUMENT_ROOT'].'/'.$delmv['path'];
                            rrmdir($deldocument);
                        }
                    }
                }
                
            }else{
                $resouce['code']=1002;
                $resouce['msg']='操作失败';
            }
            //pr($result);
            Helper::response($resouce);
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
    
    /**
     * download
     */
    public function downloadAction(){
        try{
            if(is_object(json_decode(file_get_contents("php://input")))){
                $json=json_decode(file_get_contents("php://input"));
                $fileurl=$json->fileurl;//用户编号
            }elseif($this->getRequest()->isPost()){
                $fileurl=$this->getRequest()->getpost('fileurl');
            }elseif($this->getRequest()->isGet()){
                $fileurl=$this->getRequest()->get('fileurl');
            }else{
                $msg="请输入正确的参数";
                Helper::response($msg);
            }
            
            
            $fileName = basename($fileurl);  //获取文件名
            
            header('HTTP/1.1 200 OK');
            header( "Pragma: public" );
            header( "Expires: 0" );
            header("Content-Type:application/octet-stream");
            header("Accept-ranges:bytes");
            header("Accept-Length:".filesize($fileurl));
            header("Content-Disposition:attachment;filename=".$fileName);
            $fp = fopen($fileurl, 'r');//打开文件
            echo fread($fp, filesize($fileurl));
            fclose($fp);
            
            //Yaf_Dispatcher::getInstance()->autoRender(false);
            
            Helper::response('0');
        }catch (Exception $ex){
            Helper::response('1006',$ex);
        }
    }
    
}
