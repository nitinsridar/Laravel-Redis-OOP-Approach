<?php

namespace App\Http\Controllers\CacheServices;
use Redis;
use App\User;

class CacheService{

	public function fetch($key){
	
		if(Redis::Exists($key)){
			$data = Redis::hGetAll($key);
			return $data;
		}else{
			return null;
		}

	}

	public function addData($data,$key){
		
		$add = Redis::hmset($key,$data);

		return 1;
	}
    
}
