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
use Illuminate\Support\Facades\DB;

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

    //登录
    public function login(Request $request){
        try{
            $result = DB::table('tbook_user')
                ->whereRaw('username= ? and pwd = ?',[$request->username,md5($request->password)])
                ->first();
            if($result){
                if($result->status <= 0){
                    return response()->json(array(
                        'status' => 0,
                        'msg' => '账号被禁用或者删除！',
                    ));
                }
                $request->session()->put('uid', $result->uid);
                return response()->json(array(
                    'status' => 1,
                    'msg' => 'ok',
                ));
            }
        }catch (\Exception $e){
            throw $e;
        }
    }

    public function register(Request $request){
        try{

        }catch (\Exception $e){
            throw $e;
        }
    }

    //首页2

    public function index2(){
        return view('home.index2');
    }

    public function index4(){
        return view('home.index4');
    }
}