<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/3
 * Time: 11:29
 */
class ChargingController extends BasicController {
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
        Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
        $this->m_dowdver  = $this->load('dowdver');
    }

    public function indexAction(){
        $data=$this->m_charging->getfiledById();
        $this->getView()->assign(array("data"=>$data));
    }
    
    public function updateByIdAction(){
        try{
            $admin['name']=filterStr($this->getRequest()->getpost('name'));
	    	$admin['him']=filterStr($this->getRequest()->getpost('him'));
	    	$admin['me']=filterStr($this->getRequest()->getpost('me'));
	    	
	    	$charging=$this->m_dowdver->getfiledById();
	    	if(!empty($charging)){
	    	    $res=$this->m_dowdver->updateuser($admin,$charging['id']);
	    	}else{
	    	    $res=$this->m_dowdver->Insert($admin);
	    	}
            
            if($res){
                $resouce['code']=0;
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

}
