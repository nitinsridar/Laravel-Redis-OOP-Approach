<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/loadUsers','\App\Http\Controllers\UserController@loadUsers');
Route::get('/loadPosts','\App\Http\Controllers\PostsController@loadPosts');
Route::get('/loadArticles','\App\Http\Controllers\ArticlesController@loadArticles');

Route::get('/fetchUser/{id}','\App\Http\Controllers\UserController@getUser');
Route::get('/fetchPost/{id}','\App\Http\Controllers\PostsController@getPost');
Route::get('/fetchArticle/{id}','\App\Http\Controllers\ArticlesController@fetchArticle');

