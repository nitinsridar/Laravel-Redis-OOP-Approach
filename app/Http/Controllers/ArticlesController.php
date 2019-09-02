<?php

namespace App\Http\Controllers;
use Redis;
use App\User;
use App\Http\Controllers\DataServices\ArticlesDataService;

use Response;

class ArticlesController{

	protected $articlesDataService;
	
	public function __construct(ArticlesDataService $articlesDataService)
    {
       	$this->articlesDataService = $articlesDataService;
    }

	public function fetchArticle($id){
		
		$article = $this->articlesDataService->fetch($id);
		
		return Response::json(['status' => 200, 'data' => $article]);

	}



	public function loadArticles(){
 		$this->articlesDataService->bulkInsert();
		return "Successfully loaded";
	}
    
}