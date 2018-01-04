<?php

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

Route::group(['namespace' => 'Home'],function ($router)
{
    $router->get('/','IndexController@index');
    $router->get('/index2','IndexController@index2');
    $router->get('/index4','IndexController@index4');
    $router->post('/login','IndexController@login');
    // 用户
    require(__DIR__ . '/home/user.php');

});
