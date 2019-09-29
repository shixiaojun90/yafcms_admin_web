<?php

class Redisclient{
	
	private $redis;
	private $host;
	private $port;
	private $pwd;
	private $redislog;
	private $config;
	
	public function __construct(){
		try{
			$this->redis=new Redis();
			$this->redis->connect('127.0.0.1','6379');
			
			$this->redislog = APP_PATH. '/log/redis/'.CUR_DATE.'.log';
		}catch(Exception $e){
			echo 'Message: ' .$e->getMessage();
		}
		
	}
	
	public function setstring(){
		$this->redis->set("name","test redis string");
	}
	
	public function getstring(){
		$this->redis->get("name");
	}
	
	
}
