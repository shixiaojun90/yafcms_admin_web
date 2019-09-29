<?php 
	function redis(){
		//$config = Yaf_Application::app()->getConfig();
		Yaf_loader::import(LIB_PATH . '/Redis/Redis.php');
		
		$redis=new Redisclient;
		$redis->setstring();
	}
?>