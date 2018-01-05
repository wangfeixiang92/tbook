<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\1\4 0004
 * Time: 23:07
 */
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\Home\UserService;
use Illuminate\Http\Request;

class LoginController extends Controller{
    /**
     * @var UserService
     */
    private $user;

    /**
     * LoginController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->user = $userService;
    }

    /**
     * login
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:登录方法
     */
    public function login(Request $request){
        $where['login_item'] = $request->get('login_item','U');
        $where['login_value'] = $request->get('login_value');
        $where['password'] = $request->get('password');

        $userinfo = $this->user->getUserByWhere($where);
        if(!empty($userinfo)){
            return response()->json(array(
                'code'=>'201',
                'status'=>'failed',
                'msg'=>'账号不正确!'
            ));
        }

        if($userinfo['password']!=md5($where['password'])){
            return response()->json(array(
                'code'=>'201',
                'status'=>'failed',
                'msg'=>'密码不正确!'
            ));
        }
        if(!$request->session()->has('userinfo')){
            $request->session()->put('userinfo',get_object_vars($userinfo));
        }
        return redirect('/');
    }

}