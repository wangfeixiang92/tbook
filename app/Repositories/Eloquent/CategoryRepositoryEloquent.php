<?php
namespace App\Repositories\Eloquent;
use App\Models\BookCategory;
use App\Repositories\Contracts\CategoryRepository;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories\Eloquent;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BookCategory::class;
    }

    public function getCategoryList(array $where,$page=1,$size=10,$order_by='id'){
        $book = $this->model;
        if(empty($where)){
            return null;
        }
        if(!is_array($where)){
            return null;
        }

        foreach ($where as $key=>$item){
            if (is_array($item)) {
                list($key, $condition, $val) = $item;
                $book = $book->where($key, $condition, $val);
            } else {
                $book = $book->where($key, '=', $item);
            }
        }
        $book->orderBy($order_by,'desc')->forPage($page,$size);

        return $book->get()->toArray();
    }

    /**
     * getCategoryBywhere
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:
     * @param array $where
     * @return array|null
     */
    public function getCategoryBywhere(array $where){
        $book = $this->model;
        if(empty($where)){
            return null;
        }
        if(!is_array($where)){
            return null;
        }

        foreach ($where as $key=>$item){
            if (is_array($item)) {
                list($key, $condition, $val) = $item;
                $book = $book->where($key, $condition, $val);
            } else {
                $book = $book->where($key, '=', $item);
            }
        }

        $data =  $book->first();
        if(!empty($data)){
            return $data->toArray();
        }
        return [];

    }

    /**
     * getChildrenCategory
     * @Author: Yume
     * @Date:   ${DATE} ${TIME}
     * @Description:获取子分类
     * @param $parent_id
     * @return array|null
     */
    public function getChildrenCategory($parent_id){
        $book = $this->model;
        if(empty($parent_id)){
            return null;
        }
        $book = $book->where('parenr_id', '=', $parent_id);
        return $book->get()->toArray();
    }
    
}
