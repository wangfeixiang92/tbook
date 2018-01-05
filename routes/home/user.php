<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\12\27 0027
 * Time: 14:56
 */


/**
 * 判断登录设置
 */
$router->group(['middleware' => ['checkLogin']],function ($router)
{
    $router->resource('user','UserController');

});
