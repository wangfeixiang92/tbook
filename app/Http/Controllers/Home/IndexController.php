<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\12\27 0027
 * Time: 21:52
 */
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * Class IndexController
 * @package App\Http\Controllers\Home
 */
class IndexController extends Controller{

    public function __construct()
    {

    }

    public function index(){
        return view('home.index');
    }

    //首页2

    public function index2(){
        return view('home.index2');
    }
}