<?php

use Illuminate\Http\Request;
use Illuminate\Http\PostRequest;
use Illuminate\Http\CommentRequest;
use App\Post;
use App\Comment;

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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('posts', 'PostController@index');
    Route::get('posts/{post_id}', 'PostController@show');
    Route::get('posts/{post_id}/comments', 'CommentController@index');
    Route::get('posts/{post_id}/comments/{comment_id}', 'CommentController@show');


    // Test ok
    Route::delete('posts/{post_id}', 'PostController@delete');
    Route::delete('posts/{post_id}/comments/{comment_id}', 'CommentController@delete');

    Route::put('posts/{post_id}', 'PostController@update');
    Route::put('posts/{post_id}/comments/{comment_id}', 'CommentController@update');

    Route::post('posts', 'PostController@create');
    Route::post('posts/{post_id}/comments', 'CommentController@create');

    // Laravel Passport register
    Route::post('register', 'Auth\RegisterController@register');
    Route::post('login', 'Auth\LoginController@login');
});

