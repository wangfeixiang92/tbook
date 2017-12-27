<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017\12\27 0027
 * Time: 14:26
 */

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\Home\UserService;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers\Home
 */
class UserController extends Controller{
    /**
     * @var UserService
     */
    private $user;

    const pageSize = 15;

    /**
     * UserController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->user = $userService;
    }

    /**
     * index
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:用户列表demo
     * @param Request $request
     * @return string
     * @throws \Exception
     */
    public function index(Request $request){
        $params['page'] = !empty($request->page)?(int)htmlspecialchars(trim($request->page),ENT_QUOTES,"UTF-8"):1;
        $params['pageSize'] = !empty($request->pageSize)?(int)htmlspecialchars(trim($request->pageSize),ENT_QUOTES,"UTF-8"):self::pageSize;
        try{
            $userList = $this->user->getUserList($params);
            return "index_method--".$userList;
        }catch (\Exception $e){
            throw $e;
        }



    }
}