<?php

namespace App\Http\Controllers\DataServices;

use App\Http\Controllers\CacheServices\CacheService;
use Redis;
use App\Articles;

class ArticlesDataService{

	protected $cacheService;

	public function __construct(CacheService $cacheService){
       	$this->cacheService = $cacheService;
    }

	public function fetch($id){

		$data = $this->cacheService->fetch('article:'.$id);

		if($data == null){

			$article = Articles::where('id','=',$id)->first()->toArray();

			$key = 'article:'.$article['id'];

			$data = $this->cacheService->addData($article,$key);

			return $article;
		}else{

			return $data;

		}
	
	}


	public function bulkInsert(){
		$path = storage_path() . "/json/articles.json";
		$articleJson = json_decode(file_get_contents($path), true); 
		//dd(count($articleJson));
		foreach ($articleJson as $article) {
			//dd($user['id']);
			$data[] = [
      					'id' => $article['id'],
      					'user_id' => $article['user_id'],
      					'article_title'=>$article['article_title'],
      					'article_text'=>$article['article_text'],
      					'article_image'=>$article['article_image'],
      					'created_at'=>$article['created_at'],
      					'updated_at'=>$article['updated_at']
    				];
		}
		//dd($data);
		Articles::insert($data);

		return "Successfully loaded";


	}

    
}
