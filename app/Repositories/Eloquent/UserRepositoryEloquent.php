<?php
namespace App\Repositories\Eloquent;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Repositories\Contracts\UserRepository;
use App\User;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * getUserList
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:
     * @param int $page
     * @param int $pageSize
     * @return array
     */
    public function getUserList($page=1,$pageSize=10)
    {
        $user = $this->model;

        $count = $user->count();

        $users = $user->forPage($page,$pageSize)->get();

        return compact('count','users');
    }
    
}
