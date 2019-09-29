<?php

class LoginController extends BasicController {

    private $m_adminrole;
    private $m_user;
    private $m_menu;

    private function init(){
        //session_unset('user');
        session_start();
        $this->m_user = $this->load('admin');
        $this->m_adminrole  = $this->load('adminrole');
        $this->homeUrl = '/admin/login';
    }

    public function indexAction(){
		
    }

    public function checkLoginAction(){
        $username = $this->getPost('username');
        $password = $this->getPost('password');
        $captcha  = $this->getPost('captcha');
        
        if(!$username || !$password){
            Helper::response('1002');
            if(ENV != 'DEV'){
                if(!$captcha){
                    Helper::response('1002');
                }
            }
        }

        /*if(ENV != 'DEV'){
            if(strtolower($captcha) != strtolower($_SESSION['adminCaptcha'])){
                $resource['code']=1002;
                $resource['msg']='验证码错误';
                Helper::response($resource);
            }
        }*/
        
        
        // 管理员登陆
        $data = $this->m_user->checkLogin($username, $password);
        
        if(empty($data)){
            $resource['code']=1002;
            $resource['msg']='登录失败，请检查账号和密码';
            Helper::response($resource);
        }else{
            $menus=$this->menu=require_once(MENU_PATH.'/menu.php');
            $actinc=$this->menu=require_once(MENU_PATH.'/act.inc.php');
            $this->setSession('menuini', $menus);
            $this->setSession('actinc', $actinc);
            
            $roleinfo=$this->m_adminrole->getfiledById($data['role_id'])['roleinfo'];
            //将权限存到文件中
            $path='session';
            $dirbool=createRDir($path);
            $file="{$path}/roleinfo_{$data['role_id']}.txt";
            if(file_exists($file)){
                unlink($file);
            }
            $p=fopen($file,'a+b');
            fwrite($p,print_r(json_encode(unserialize($roleinfo)),true));
            fclose($p);
            
            $userinfo=array('id'=>$data['adminid'],'username'=>$username,'role_id'=>$data['role_id'],'roleinfo'=>unserialize($roleinfo));
            
            $this->setSession('user', $userinfo);
            $resource['code']=0;
            $resource['msg']='登录成功';
            Helper::response($resource);
        }
    }

    public function logoutAction(){
        //session_unset('user');
        $this->unsetSession('user');
        $this->goHome('/admin/login');
        //redirect('/admin/login');
    }
}