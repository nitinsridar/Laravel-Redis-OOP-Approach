<?php

namespace App\Http\Controllers\DataServices;

use App\Http\Controllers\CacheServices\CacheService;
use Redis;
use App\User;

class UserDataService{

	protected $cacheService;

	public function __construct(CacheService $cacheService){
       	$this->cacheService = $cacheService;
    }

	public function fetch($id){

		$data = $this->cacheService->fetch('user:'.$id);

		if($data == null){

			$user = User::where('id','=',$id)->first()->toArray();

			$key = 'user:'.$user['id'];

			$data = $this->cacheService->addData($user,$key);

			return $user;

		}else{

			return $data;		
		}
		
	}

	public function bulkInsert(){
		
		$path = storage_path() . "/json/users.json";
		$userJson = json_decode(file_get_contents($path), true); 
		//dd(count($userJson));
		foreach ($userJson as $user) {
			//dd($user['id']);
			$data[] = [
      					'id' => $user['id'],
      					'user_name' => $user['user_name'],
      					'email'=>$user['email'],
      					'password'=>$user['password'],
      					'created_at'=>$user['created_at'],
      					'updated_at'=>$user['updated_at']
    				];
		}
		//dd($data);
		User::insert($data);

		return "Successfully loaded";


	}
    
}
