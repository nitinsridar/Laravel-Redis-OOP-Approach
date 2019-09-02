<?php

namespace App\Http\Controllers;
use Redis;
use App\User;
use App\Http\Controllers\DataServices\UserDataService;

use Response;

class UserController{

	protected $userDataService;

	public function __construct(UserDataService $userDataService)
    {
       	$this->userDataService = $userDataService;
    }


	public function getUser($id){
		
		

		$user = $this->userDataService->fetch($id);
		return Response::json(['status' => 200, 'data' => $user]);

	}

	public function loadUsers(){
		
		$this->userDataService->bulkInsert();

		return "Successfully loaded";


	}
    
}
