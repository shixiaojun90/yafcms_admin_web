<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/10/23
 * Time: 上午10:42
 */
class CloudtxtController extends BasicController {
    private function init(){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST');
        $this->m_clouddir=$this->load('cloud');
    }
    
    
    /*********创建文件***********/
    public function opentxtAction(){
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
                    $path=$dirinfo['path'].'/'.$dirpath.'.txt';
                }
                //print_r($path);exit;
            }else{
                $dirpath=date('YmdHis');
                $path="cloud/{$uid}/{$dirpath}".".txt";
            }
            
            $dirbool=fileputcontents($path,'');
            
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
                    $resouce['dirurl']='http://'.$_SERVER['HTTP_HOST'].'/'.$path;
                }else{
                    $resouce['code']=1;
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
    
    /*********写入内容***********/
    public function writetxtAction(){
       try{
            if(is_object(json_decode(file_get_contents("php://input")))){
                $json=json_decode(file_get_contents("php://input"));
                $uid=$json->userid;//用户编号
                $id=$json->id;//文本编号
                $data=$json->data;//文本内容
            }elseif($this->getRequest()->isPost()){
                //post请求
                $uid=$this->getRequest()->getpost('userid');
                $id=$this->getRequest()->getpost('id');
                $data=$this->getRequest()->getpost('data');
            }elseif($this->getRequest()->isGet()){
                //get请求
                $uid=$this->getRequest()->get('userid');
                $id=$this->getRequest()->get('id');
                $data=$this->getRequest()->get('data');
            }else{
                $msg="请输入正确的参数";
                Helper::response($msg);
            }
            
            
            if(!empty($id) && $id > 0){
                $txtpath=$this->m_clouddir->getdirname($id,array('path','filename'));
                if(!empty($txtpath['path'])){
                    if(file_exists($txtpath['path'])){
                        $dirbool=fileputcontents($txtpath['path'],$data,'FILE_APPEND');
                    }
                }else{
                    $resouce['code']=1002;
                    $resouce['msg']='文件不存在，无法写入内容';
                    Helper::response($resouce);
                }
                
            }else{
                $resouce['code']=1002;
                $resouce['msg']='操作失败，请检查参数';
                Helper::response($resouce);
            }
            
            if($dirbool){
                $resouce['code']=1;
                $resouce['msg']='写入内容成功';
            }else{
                $resouce['code']=1002;
                $resouce['msg']='写入内容失败';
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
    
    
    
}
