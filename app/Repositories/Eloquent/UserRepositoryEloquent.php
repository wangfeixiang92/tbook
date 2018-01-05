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

    /**
     * getUserByItem
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:判断登录选项，查询用户信息
     * @param $where
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getUserByItem($where){
        $user = $this->model;
        $login_item = config('system.Login_Item');
        if(!in_array($where['login_item'],$login_item)){
            return null;
        }

        switch ($where['login_item']){
            case 'U':
                return $user->where("username",$where['login_value'])->first();
                break;
            case 'E':
                return $user->where("email",$where['login_value'])->first();
                break;
            case 'M':
                return $user->where("mobile",$where['login_value'])->first();
                break;
            case 'Q':
                //先去查询当前的app_id
                return $userinfo =  $user->whereHas('app', function($q) use($where)
                {
                    $q->where('app_id', $where['login_value']);
                })->first();
                break;
            case 'W':
                return $userinfo =  $user->whereHas('app', function($q) use($where)
                {
                    $q->where('app_id', $where['login_value']);
                })->first();
                break;
            default:return null;break;
        }
    }
    
}
