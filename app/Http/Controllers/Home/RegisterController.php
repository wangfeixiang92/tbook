<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\1\4 0004
 * Time: 23:08
 */
namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\Home\UserService;
use Illuminate\Http\Request;

class RegisterController extends Controller{
    /**
     * @var UserService
     */
    private $user;
    /**
     * RegisterController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->user = $userService;
    }

    /**
     * register
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:注册
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(Request $request){
        $where['login_item'] = $request->get('login_item','U');
        $where['login_value'] = $request->get('login_value');
        $where['password'] = $request->get('password');

        $userinfo = $this->user->getUserByWhere($where);
        if(!empty($userinfo)){
            return response()->json(array(
                'code'=>'201',
                'status'=>'failed',
                'msg'=>'账号已经存在!'
            ));
        }
        $login_item = config('system.Login_Item');
        $userinfo = $this->user->addUser(array(
            'login_item'=>$where['login_item'],
            $login_item[$where['login_item']]=>$where['login_value'],
            'password'=>md5($where['password'])
        ));
        //注册成功，跳转登录页
        return redirect('/login');
    }
}