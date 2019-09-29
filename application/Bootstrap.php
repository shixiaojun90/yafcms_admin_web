<?php

class Bootstrap extends Yaf_Bootstrap_Abstract{

    // Load libaray, MySQL model, function
    public function _initCore() {
        // 设置自动加载的目录
        ini_set('yaf.library', LIB_PATH);
        
        // 加载核心组件
        Yaf_Loader::import(CORE_PATH.'/Rsa.php');
        Yaf_Loader::import(CORE_PATH.'/C_Basic.php');
        Yaf_Loader::import(CORE_PATH.'/Helper.php');
        Yaf_Loader::import(CORE_PATH.'/Model.php');
        Yaf_Loader::import(CORE_PATH.'/Lang.php');
        Yaf_Loader::import(LIB_PATH.'/yar/Yar_Basic.php');

        // 导入 F_Basic.php 与 F_Network.php
        Helper::import('Basic');
        Helper::import('Network');
        Helper::import('File');
        Helper::import('String');
        //Helper::import('Redis');
    }

    // 这里我们添加三种路由，分别为 rewrite, rewrite_category, regex
    // 用于 url rewrite 的讲解
    public function _initRoute() {
        $router = Yaf_Dispatcher::getInstance()->getRouter();

        // rewrite
        $route = new Yaf_Route_Rewrite(
            '/caselist/:id',
            array(
                'controller' => 'caselist',
                'action'     => 'index',
            )
        );

        $router->addRoute('caselist', $route);

        // rewrite_category
        $route = new Yaf_Route_Rewrite(
            '/caselist/:id/:page/',
            array(
                'controller' => 'caselist',
                'action'     => 'index',
            )
        );

        $router->addRoute('rewrite_caselistpage', $route);

        // regex
        $route = new Yaf_Route_Rewrite(
            '/casetree/:id',
            array(
                'controller' => 'casetree', 
                'action' => 'index',
            )
        );

        $router->addRoute('rewrite_casetree', $route);
        
        // regex
        $route = new Yaf_Route_Rewrite(
            '/news-([0-9]+).html',
            array(
                'controller' => 'news', 
                'action' => 'index',
            )
        );

        $router->addRoute('rewrite_news', $route);
        
        // regex
        $route = new Yaf_Route_Rewrite(
            '/detailed-([0-9]+).html/',
            array(
                'controller' => 'news', 
                'action' => 'detailed',
            )
        );

        $router->addRoute('rewrite_detailed', $route);
        
        // regex
        $route = new Yaf_Route_Rewrite(
            '/mediatree/:id',
            array(
                'controller' => 'mediatree', 
                'action' => 'index',
            )
        );

        $router->addRoute('rewrite_mediatree', $route);
        
        // regex
        $route = new Yaf_Route_Regex(
            '#article/([0-9]+).html#',
            array('controller' => 'article', 'action' => 'detail'),
            array(1 => 'articleID')
        );

        $router->addRoute('regex', $route);
    }

    public function _initRedis() {
        if(extension_loaded('Redis')){
            $config = Yaf_Application::app()->getConfig();
            $queue = 'test_queue';
            $host  = $config['redis_host'];
            $port  = $config['redis_port'];

            $redis = new Redis();
            $redis->connect($host, $port);
            Yaf_Registry::set('redis', $redis);
        }
    }

    public function _initPlugin(Yaf_Dispatcher $dispatcher) {
        $router = new RouterPlugin();
        $dispatcher->registerPlugin($router);
        
        $admin = new AdminPlugin();
        $dispatcher->registerPlugin($admin);
        Yaf_Registry::set('adminPlugin', $admin);

        $permission=new PermissionPlugin();
        $dispatcher->registerPlugin($permission);
        Yaf_Registry::set('PermissionPlugin', $permission);

        $api=new ApiPlugin();
        $dispatcher->registerPlugin($api);
        Yaf_Registry::set('ApiPlugin', $api);
        
        $menu = new MenuPlugin();
        $dispatcher->registerPlugin($menu);
        Yaf_Registry::set('menuPlugin', $menu);
        
        $globar=new GlobarPlugin();
        $dispatcher->registerPlugin($globar);
        Yaf_Registry::set('GlobarPlugin', $globar);
    }

}
