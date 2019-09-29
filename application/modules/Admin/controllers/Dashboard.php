<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 2017/9/14
 * Time: 下午5:44
 */
class DashboardController extends BasicController {
    
    private function init(){
        Yaf_Registry::get('adminPlugin')->checkLogin();
       // Yaf_Registry::get('PermissionPlugin')->checkPermission(true);
    }

    public function indexAction(){
		$this->getView()->assign(array('username'=>$this->getsession('user')['username']));//总共 
    }
	
	public function toIndexArrAction($arr){
		$i=0;
		foreach($arr as $key => $value){
			$newArr[$i] = $value;
			$i++;
		}
		return $newArr;
	}
}