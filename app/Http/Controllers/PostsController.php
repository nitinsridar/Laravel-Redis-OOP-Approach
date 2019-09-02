<?php

namespace App\Http\Controllers;
use Redis;
use App\User;
use App\Http\Controllers\DataServices\PostsDataService;

use Response;

class PostsController{


	protected $postsDataService;

	public function __construct(PostsDataService $postsDataService)
    {
       	$this->postsDataService = $postsDataService;
    }

	public function getPost($id){
		
		$post = $this->postsDataService->fetch($id);
			
		return Response::json(['status' => 200, 'data' => $post]);

	}

	public function loadPosts(){
 		
 		$this->postsDataService->bulkInsert();
		return "Successfully loaded";

	}
    
}