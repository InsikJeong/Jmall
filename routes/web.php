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

