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

    /**
     * getUserByWhere
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:根据条件查询用户信息
     * @param $where
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getUserByWhere($where){
       return $this->user->getUserByItem($where);
    }

    public function addUser($data){
        $user =  $this->user->create($data);
        return $user->id;
    }



}