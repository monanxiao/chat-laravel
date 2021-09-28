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

// Route::get('/', function () {
//     return view('welcome');
// });


// 首页
Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index')->name('home');

// 绑定用户
Route::get('bind/{user}/{clientId}', 'UsersMsgsController@bind')->name('bind');

// 发送消息 窗口
Route::get('chat/{user:name}-chat', 'UsersMsgsController@msg')->name('chat');

// 接收发送消息
Route::post('chat/send', 'UsersMsgsController@send')->name('chat.send');

// 用户首页
Route::get('users', 'UsersController@index')->name('users.index');

// 用户相关
Auth::routes();

