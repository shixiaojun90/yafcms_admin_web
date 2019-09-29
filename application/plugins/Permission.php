<?php
/**
 * Created by PhpStorm.
 * User: hezhi
 * Date: 16/11/11
 * Time: 16:18
 */
class PermissionPlugin extends Yaf_Plugin_Abstract {
    
    public function checkPermission($must=false){
        session_start();
        $action=Yaf_Dispatcher::getInstance()->getRequest()->action;
        $controller=Yaf_Dispatcher::getInstance()->getRequest()->controller;
        
        $rolefile="session/roleinfo_{$_SESSION['user']['role_id']}.txt";
        if(file_exists($rolefile)){
            $filecontent = file_get_contents($rolefile);
        }
        
        if(!empty($filecontent)){
            $roleinfo= json_decode($filecontent,true);
        }else{
            $roleinfo=$_SESSION['user']['roleinfo'];
        }
        
        
        if($must){
        	if(!empty($roleinfo)){
        		if(array_key_exists($controller, $roleinfo)){
        			$actionlist=$roleinfo[$controller];
        			if(in_array($action,$actionlist)){
        				return true;
        			}else{
        			    $notrole=array("edit","addinsert","addhtml","treeinfo","treetable","preview","getmsg","msgbox","getmsgcount","chatopen");
        			    if(in_array($action,$notrole)){
        			        return true;
        			    }
        			    if($action=='index'){
        			        header('Location:/admin/error');    
        			    }else{
        			        Helper::response('10000');
        			    }
        			}
        		}else{
                    if($action=='index'){
    			        header('Location:/admin/error');    
    			    }else{
    			        Helper::response('10000');
    			    }
        		}
        	}else{
        		if($action=='index'){
			        header('Location:/admin/error');    
			    }else{
			        Helper::response('10000');
			    }
        	}
        }
        
    }
    protected function checkStr($test,$str){
        $rule="/^((?!$str).)*$/is";
        return preg_match($rule,$test);
    }
}