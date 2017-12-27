<?php
namespace App\Services\Home;
use App\Repositories\Eloquent\UserRepositoryEloquent;
use App\Services\Home\BaseService;

/**
 * Class UserService
 * @package App\Services\Home
 */
class UserService extends BaseService
{
    /**
     * @var UserRepositoryEloquent $user
     */
	private $user;

    /**
     * UserService constructor.
     * @param UserRepositoryEloquent $user
     */
	public function __construct(UserRepositoryEloquent $user)
	{
		$this->user =  $user;
	}

    /**
     * getUserList
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description: 获取用户列表
     * @param $params
     * @return array
     */
	public function getUserList($params){
        return $list = $this->user->getUserList($params['page'],$params['pageSize']);
    }



}