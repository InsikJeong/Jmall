<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
#
Route::get('/auth/init','LoginController@init');
#회원가입
Route::post('/auth/register','RegisterController@store');
#로그아웃
Route::post('/auth/logout','LoginController@logout');
#로그인
Route::post('/auth/login','LoginController@store');

#게시판
Route::post('/articles/store','ArticlesController@store');
Route::get('/articles/show/{id}','ArticlesController@show');
Route::get('/articles/edit/{id}','ArticlesController@edit');
Route::delete('articles/delete/{id}',"ArticlesController@destroy");
Route::get('/articles/index','ArticlesController@index');
Route::patch('articles/update/{id}','ArticlesController@update');

#게시판 댓글
Route::post('/articles/comments','ArticlesController@comments');
Route::get('/articles/comments_index/{id}','ArticlesController@comments_index');
Route::delete('articles/comments_delete/{id}',"ArticlesController@comments_destroy");

