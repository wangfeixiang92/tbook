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

    $router->post('/login','LoginController@login');
    $router->post('/register','RegisterController@register');

    // 用户
    require(__DIR__ . '/home/book.php');
    require(__DIR__ . '/home/user.php');


    //安塔斯塔尼亚淘宝店铺专属路由
    $router->get('/antas/index','AntasController@index');
    $router->get('/antas/add','AntasController@add');
    $router->get('/antas/addshowimg','AntasController@addshowimg');
    $router->get('/antas/adddetails','AntasController@adddetails');
    $router->post('/antas/addAction','AntasController@addAction');
    $router->post('/antas/uploadImg','AntasController@uploadImg');
    $router->get('/antas/detail','AntasController@detail');
    $router->post('/antas/updatetaxsupplyprice','AntasController@updatetaxsupplyprice');

});
