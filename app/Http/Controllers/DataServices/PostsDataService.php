<?php

namespace App\Http\Controllers\DataServices;

use App\Http\Controllers\CacheServices\CacheService;
use Redis;
use App\Posts;

class PostsDataService{

	protected $cacheService;

	public function __construct(CacheService $cacheService){
       	$this->cacheService = $cacheService;
    }

	public function fetch($id){
		
		$data = $this->cacheService->fetch('post:'.$id);

		if($data == null){

			$posts = Posts::where('id','=',$id)->first()->toArray();

			$key = 'post:'.$posts['id'];

			$data = $this->cacheService->addData($posts,$key);

			return $posts;

		}else{

			return $data;
		}
		
	}

	public function bulkInsert(){
		$path = storage_path() . "/json/posts.json";
		$postsJson = json_decode(file_get_contents($path), true); 
		//dd(count($postsJson));
		foreach ($postsJson as $post) {
			//dd($user['id']);
			$data[] = [
      					'id' => $post['id'],
      					'user_id' => $post['user_id'],
      					'text'=>$post['text'],
      					'image'=>$post['image'],
      					'created_at'=>$post['created_at'],
      					'updated_at'=>$post['updated_at']
    				];
		}
		//dd($data);
		Posts::insert($data);

		return "Successfully loaded";


	}

    
}
